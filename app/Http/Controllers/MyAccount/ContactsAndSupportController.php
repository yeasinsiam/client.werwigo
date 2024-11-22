<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\Mail\ContactAndSupportMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsAndSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.my-account.contacts-and-support');
    }



    public function sendContactMail(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);


        Mail::to(env('MAIL_FROM_ADDRESS'))
            ->queue(new ContactAndSupportMail($request->full_name, $request->email, $request->message));


        return redirect()->back()->with('contact-success-message', __('Thank you for contacting with us.'));
    }
}
