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
            'bank' => $user->bank ?? new Bank(),
            'address' => $user->address ?? new Address()
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

        $validation = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => '',
            'siren' => '',
            'address[street]' => '',
            'address[postcode]' => '',
            'address[city]' => '',
            'bank[iban]' => '',
            'bank[swift]' => '',
            'bank[name]' => '',
            'bank[address]' => '',
        ]);

        $user->update($validation);

        // Adresse
        if ($user->address) {
            $user->address->update($request->get('address'));
        } else {
            if ($request->get('address')) {
                // dd($request->get('address'));
                $address = new Address($request->get('address'));
                $address->save();

                $user->address()->associate($address);
                $user->save();
            }
        }

        // Bank
        if ($user->bank)
            $user->bank->update($request->get('bank'));
        else {
            if ($request->get('bank')) {
                $bank = new Bank($request->get('bank'));
                $user->bank()->save($bank);
            }
        }

        return back();
    }
}
