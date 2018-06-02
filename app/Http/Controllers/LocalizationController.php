<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
//
    public function index(Request $request){
//set’s application’s locale
//app()->setLocale($locale);

        if($request->lang) {
            Session::put('locale', $request->lang);
            App()->setLocale($request->lang);
        }

//Gets the translated message and displays it
        return back();

    }
}
