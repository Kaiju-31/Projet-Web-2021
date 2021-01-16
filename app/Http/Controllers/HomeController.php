<?php

namespace App\Http\Controllers;

use App\Game;
use App\Purchase;
use Illuminate\Contracts\Support\Renderable;

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
        $game = Game::all();
        $purchases = Purchase::all();
        return view('home', ["game" => $game, "purchases" => $purchases]);
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
