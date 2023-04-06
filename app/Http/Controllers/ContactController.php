<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Listing;
use App\Models\User;
use App\Notifications\ContactNotification;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View;
     */
    public function index(Request $request)
    {

        $info['user'] = User::findOrFail($request->user_id);
        $info['property'] = Listing::findOrFail($request->property_id);
        return view('contact-us', $info);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_id' => $request->user_id,
            'listing_id' => $request->property_id,
            'message' => $request->message,
        ];


        $owner = User::findOrFail($request->property_owner);

        $admin = User::where('name', 'Admin')->first();
        $contact = new Contact($data);
        $contact->save();

        $property = Listing::findOrFail($request->property_id);

        $user = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ];

//        $details = [
//            'user_id' => $request->user_id,
//            'property_id' => $request->property_id,
//        ];
        $owner->notify(new ContactNotification($user, $property, $owner));
        $admin->notify(new ContactNotification($user, $property, $admin));

        return view('user.success');

//        return redirect()->back()->with('success', 'Contact Submitted Successfully!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
