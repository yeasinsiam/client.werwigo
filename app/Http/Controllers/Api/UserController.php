<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * User Login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);


        $user = Admin::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return [
            'token' => $user->createToken('auth-token')->plainTextToken
        ];
    }

    /**
     * Register user.
     */
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|alpha_dash|max:255|unique:admins,username',
            'name' => 'required|string',
            'mobile_number'  => 'nullable|string',
            'email'  => 'required|email|unique:admins,email',
            'password' => ['nullable', 'confirmed', Password::defaults()]
        ], [
            'name.required' => 'Full name is required.'
        ]);


        $admin = Admin::create([
            'username' => $request->username,
            'name' => $request->name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $admin->addMedia(public_path('/demo/avatar.png'))
            ->preservingOriginal()
            ->toMediaCollection('avatar');


        return response()->json($admin);
    }

    /**
     * remove all tokes
     */
    public function revokeAllTokens(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        return response()->json([
            'message' => 'User authentication token removed.'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // $admin = Auth::guard('admin')->user();

        // $request->validate([
        //     'avatar' => 'nullable|mimes:jpeg,jpg,png',
        //     'username' => 'required|string|alpha_dash|max:255|unique:admins,username,' . $admin->id,
        //     'name' => 'required|string',
        //     'email'  => 'required|email|unique:admins,email,' . $admin->id,
        //     'mobile_number'  => 'nullable|string',
        //     'password' => ['nullable', 'confirmed', Password::defaults()]
        // ], [
        //     'avatar.mimes' => 'Please upload jpg or png',
        //     'name.required' => 'Full name is required.'
        // ]);

        // $data = [
        //     'username' => $request->username,
        //     'name' => $request->name,
        //     'mobile_number' => $request->mobile_number,
        //     'email' => $request->email,
        // ];

        // if ($request->password)
        //     $data =    array_merge($data, ['password' => $request->password]);




        // $admin->update($data);


        // if ($request->hasFile('avatar'))
        //     $admin->addMediaFromRequest('avatar')
        //         ->toMediaCollection('avatar');

        // return redirect()->back()->with('success-message', 'Profile Updated.');
    }
}