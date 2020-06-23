<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Alert;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        toast('Signed in successfully','success')->autoClose(5000);
        return view('frontend.pages.home');
    }
}
