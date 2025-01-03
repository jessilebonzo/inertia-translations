<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function switch(Request $request)
    {
        App::setLocale($request->language);
        session()->put('language', $request->language);
        
        return redirect()->back();
    }
}
