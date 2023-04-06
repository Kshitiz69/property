<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginRedirect(\Illuminate\Http\Request $request)
    {
        //login controller
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $request->email)->first();
        $remember_me = (!empty($request->remember)) ? TRUE : FALSE;

        if ($user) {
            // dd(Hash::check($request->password,$user->password), $request->password, $user->password);

            if (!Hash::check($request->password, $user->password)) {

                return back()->withInput($request->input())->with('passwordError', 'Oops! You have entered an invalid password');
            } else {
                auth()->guard()->login($user, $remember_me);
                if($user->role == "admin")
                {
                    return redirect('/admin/dashboard');

                }
                else {
                    return redirect('/');
                }
            }

        } else {
            return back()
                ->withInput($request->input())
                ->with('emailError', 'Oops! You have entered an invalid username. Please try again.');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
