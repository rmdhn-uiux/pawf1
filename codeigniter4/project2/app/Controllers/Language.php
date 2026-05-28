<?php

namespace App\Controllers;

class Language extends BaseController
{
    public function switch(string $locale)
    {
        $session = session();
        $supportedLocales = config('App')->supportedLocales;

        if (in_array($locale, $supportedLocales)) {
            $session->set('lang', $locale);
        }

        return redirect()->back();
    }
}
