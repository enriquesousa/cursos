<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function setLanguage(Request $request)
    {
        // Save selected Locale to current "Session"
        $locale = $request->locale ?? 'en';
        // App::setLocale($locale); --> There is no need for this here, as the middleware will run after the redirect() where it has already been set.
        $request->session()->put('locale', $locale);

        return redirect()->back();
    }
}
