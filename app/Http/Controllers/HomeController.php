<?php

namespace App\Http\Controllers;

use App\Purchase;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $purchase = Purchase::all();
        return view('home', ["purchases" => $purchase]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }
}
