<?php

namespace App\Http\Controllers;

use App\Models\TermsOfServiceSection;

class TermsOfServiceSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $termsOfServiceSection = TermsOfServiceSection::first();

        return view('pages.terms-of-service', compact('termsOfServiceSection'));
    }
}
