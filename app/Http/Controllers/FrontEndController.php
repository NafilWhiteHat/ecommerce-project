<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function Frontview(){
        return view('front_end.html_page');
    }
}
