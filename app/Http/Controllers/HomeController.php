<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getAllProperties()
    {
        if(auth()->user())
        {
            $info['listings'] = Listing::whereNot('user_id', auth()->user()->id)->get();
        }
        else
        {
            $info['listings'] = Listing::all();
        }
        return view('properties.index', $info);
    }

}
