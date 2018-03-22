<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Construct
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.showOne', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'lastname' => 'required|string|min:3|max:255',
            'address' => 'required|min:3',
            'city' => 'required|min:3',
            'country' => 'required|min:3',
        ]);
        $input = $request->all();
        $user->update($input);

        return redirect()->back()->with('status', 'Succesfuly updated user profile in database.');
    }
    /**
     * Show the form for changing the password
     * @return |Illuminate\Http\Response
     */
    public function showPasswordResetForm()
    {
        return view('users.showPasswordResetForm');
    }

    /**
     * Change user password - update new in database
     * @param  \Illuminate\Http\Request $request
     * @return |Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {

        if (!(Hash::check($request->get('passwordold'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }

        if (strcmp($request->get('passwordold'), $request->get('password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'passwordold' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect()->back()->with("status", "Password changed successfully !");
    }

}
