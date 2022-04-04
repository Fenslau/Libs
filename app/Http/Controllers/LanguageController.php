<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use \App\Models\User;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
            if (auth()->user()) {
              User::find(auth()->user()->id)->fill(['user_lang' => $lang])->save();
            }
        }
        return back();
    }
}
