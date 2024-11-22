<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.profile', [
            'profile' => auth('admin')->user()
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'avatar' => 'nullable|mimes:jpeg,jpg,png',
            'username' => 'required|string|alpha_dash|max:255|unique:admins,username,' . $admin->id,
            'name' => 'required|string',
            'email'  => 'required|email|unique:admins,email,' . $admin->id,
            'mobile_number'  => 'nullable|string',
            'password' => ['nullable', 'confirmed', Password::defaults()]
        ], [
            'avatar.mimes' => 'Please upload jpg or png',
            'name.required' => 'Full name is required.'
        ]);

        $data = [
            'username' => $request->username,
            'name' => $request->name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
        ];

        if ($request->password)
            $data =    array_merge($data, ['password' => $request->password]);




        $admin->update($data);


        if ($request->hasFile('avatar'))
            $admin->addMediaFromRequest('avatar')
                ->toMediaCollection('avatar');

        return redirect()->back()->with('success-message', 'Profile Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('home');
    }
}
