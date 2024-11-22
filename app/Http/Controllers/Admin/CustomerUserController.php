<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerUser;
use App\Http\Requests\StoreCustomerUserRequest;
use App\Http\Requests\UpdateCustomerUserRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class CustomerUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Admin::with('media')->where('id', '!=', auth('admin')->user()->id)->latest()->paginate(20);

        return view('pages.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerUser $customerUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($customerUserId)
    {

        $customerUser  = Admin::findOrFail($customerUserId);


        return view('pages.admin.users.edit', compact('customerUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $customerUserId)
    {
        // $request->validate([

        //     'username' => 'required|string|alpha_dash|max:255|unique:admins,username',
        //     'avatar' => 'nullable|mimes:jpeg,jpg',
        //     'full_name' => 'required|string',
        //     'email'     => 'required|email',
        //     'mobile_number' => 'nullable|string',
        // ]);
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png',
            'username' => 'required|string|alpha_dash|max:255|unique:admins,username,' . $customerUserId,
            'name' => 'required|string',
            'mobile_number'  => 'nullable|string',
            'email'  => 'required|email|unique:admins,email,' .  $customerUserId,
        ], [
            'avatar.mimes' => 'Please upload jpg or png',
            'name.required' => 'Full name is required.'
        ]);



        $customerUser = Admin::findOrFail($customerUserId);

        $customerUser->update([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
        ]);


        // avatar
        if ($request->hasFile('avatar'))
            $customerUser->addMediaFromRequest('avatar')
                ->toMediaCollection('avatar');

        return redirect()->back()->with('success-message', 'User updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($customerUser)
    {
        $customerUser =  Admin::findOrFail($customerUser);
        $customerUser->delete();

        return redirect()->back()->with('success-message', 'User deleted.');
    }
}
