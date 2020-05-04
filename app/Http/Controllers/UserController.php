<?php

namespace App\Http\Controllers;

use App\Address;
use App\Bank;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

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
        return view('users.edit', [
            'user' => $user,
            'bank' => $user->bank ?: new Bank(),
            'address' => $user->address ?: new Address()
        ]);
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

        // User
        $validatedUser = $request->validate([
            'firstname' => ['required'],
            'lastname' => 'required',
            'nationality' => '',
            'birthday' => '',
            'email' => 'required|email',
            'phone' => '',
        ]);

        $user->update($validatedUser);


        // Address
        $addressFields = [
            'street' => request('address_street'),
            'postcode' => request('address_postcode'),
            'city' => request('address_city'),
        ];

        if ($user->address)
            $user->address->update($addressFields);
        else {
            $address = Address::create($addressFields);
            $user->address_id = $address->id;
        }

        // Bank
        $bank_request = [
            'name' => request('bank_name'),
            'address' => request('bank_address'),
            'iban' => request('bank_iban'),
            'swift' => request('bank_iban'),
            'user_id' => $user->id,
        ];

        if ($user->bank)
            $user->bank->update($bank_request);
        else {
            $bank = new Bank($bank_request);
            $bank->save();
        }

        // Bank::firstOrCreate(['user_id' => $user->id], $bank_request);


        $user->save();

        return redirect(route('users.show', $user));
    }
}
