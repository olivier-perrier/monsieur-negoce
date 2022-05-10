<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');

        return view('admin.users.index', [
            'negotiators' => User::where('role', 'negotiator')->get(),
            'clients' => User::where('role', 'client')->get()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('admin');

        $user->delete();
        
        return redirect(route('admin.users.index'));
    }

    /**
     * Validate the negotiator
     * 
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function validateUser(User $user)
    {
        $this->authorize('admin');

        $user->validated = true;
        $user->save();
        return redirect(route('admin.users.index'));
    }
}
