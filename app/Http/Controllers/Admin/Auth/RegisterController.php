<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.auth.register');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png',
            'username' => 'required|string|alpha_dash|max:255|unique:admins,username',
            'name' => 'required|string',
            'mobile_number'  => 'nullable|string',
            'email'  => 'required|email|unique:admins,email',
            'password' => ['nullable', 'confirmed', Password::defaults()]
        ], [
            'avatar.mimes' => 'Please upload jpg or png',
            'name.required' => 'Full name is required.'
        ]);


        $admin = Admin::create([
            'username' => $request->username,
            'name' => $request->name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($request->hasFile('avatar')) {
            $admin->addMediaFromRequest('avatar')
                ->toMediaCollection('avatar');
        } else {
            $admin->addMedia(public_path('/demo/avatar.png'))
                ->preservingOriginal()
                ->toMediaCollection('avatar');
        }


        // // Assign roles
        // $admin->assignRole('ambassador');


        Auth::guard('admin')->login($admin, true);
        Session::regenerate();


        return redirect()->route('admin.hotels.index');
    }
}
