<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    function set_locale($locale){
        Session::put('locale', $locale);
        return Redirect::back();
    }
}
