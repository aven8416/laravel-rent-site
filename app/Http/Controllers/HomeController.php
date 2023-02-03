<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct() {
        return view('front.home');
        //$this->middleware('auth');
    }

    public function index() {
        return view('front.home');
    }
}
