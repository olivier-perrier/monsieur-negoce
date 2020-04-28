<?php

namespace App\Http\Controllers;

use App\Address;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->authorizeResource(USer::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return redirect(route('users.edit', $user));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\User  $user
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        // dd($request);
        $validatedUser = $request->validate([
            'firstname' => ['required'],
            'lastname' => 'required',
            'nationality' => '',
            'birthday' => '',
            'email' => 'required',
            'phone' => '',
        ]);

        $address = new Address([
            'street' => request('address'),
            'postcode' => request('address_postcode'),
            'city' => request('address_city'),
        ]);

        $address->save();

        $user->update($validatedUser);

        $user->address_id = $address->id;
        $user->save();

        return redirect(route('users.show', $user));
    }
}
