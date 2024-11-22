<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermsOfServiceSection;
use Illuminate\Http\Request;

class TermsOfServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $termsOfServiceSection =  TermsOfServiceSection::first();
        if (!$termsOfServiceSection) {
            $termsOfServiceSection =
                TermsOfServiceSection::create([
                    'content' =>  ""
                ]);
        }

        return view('pages.admin.terms-of-services', compact('termsOfServiceSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $termsOfServiceSection =  TermsOfServiceSection::first();
        $termsOfServiceSection->content = $request->content;
        $termsOfServiceSection->save();

        return redirect()->back()->with('success-message', 'Terms of Service Updated.');
    }
}
