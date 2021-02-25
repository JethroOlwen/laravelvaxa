<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function aboutus(){
        return view('aboutus');
    }

    public function webdesign(){
        return view('services/webdesign');
    }
}
