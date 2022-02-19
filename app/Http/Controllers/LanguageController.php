<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{

    /**
     * @param string $language
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switch(string $language)
    {
        if (array_key_exists($language, config('language'))) {
            Session::put('locale', $language);
        } else {
            Session::put('locale', 'ja');
        }

        return redirect()->back();
    }
}
