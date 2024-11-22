<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\CustomerUser;
use Illuminate\Foundation\Auth\User;
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
        return view('pages.my-account.profile');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {


        $customer = Auth::guard('customer')->user();


        $request->validate([
            'avatar' => 'nullable|mimes:jpeg,jpg',
            'full_name' => 'required|string',
            'email'  => 'required|email|unique:customer_users,email,' . $customer->id,
            'mobile_number'  => 'nullable|string',
            'password' => ['nullable', 'confirmed', Password::defaults()]
        ]);



        $data = [
            'full_name' => $request->full_name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
        ];

        if ($request->password)
            $data =    array_merge($data, ['password' => $request->password]);



        $customer->update($data);


        if ($request->hasFile('avatar'))
            $customer->addMediaFromRequest('avatar')
                ->toMediaCollection('avatar');

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function destroy(Request $request)
    {


        Admin::find(Auth::guard('admin')->user()->id)->delete();

        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('home');
    }
}
