<?php

namespace App\Http\Controllers;

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
            'address' => '',
            'address_postcode' => '',
            'address_city' => '',
            'email' => 'required',
            'phone' => '',
        ]);

        $user->update($validatedUser);

        // return redirect('/users/' . $user->id . '/edit');
        // return redirect(route('article.show', $article));
        return redirect(route('users.edit', $user));
        // return redirect($user->path());
    }
}
