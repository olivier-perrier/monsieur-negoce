<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
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
            'firstname' => ['required', 'min:3', 'max:255'],
            'lastname' => 'required',
            'birthdate' => 'required',
            'adress' => 'required',
            'adress_postcode' => 'required',
            'adress_city' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $user->update($this->validateArticle());

        // var_dump($article->path());
        // return redirect('/articles/' . $article->id);
        // return redirect(route('article.show', $article));
        return redirect($user->path());
    }
}
