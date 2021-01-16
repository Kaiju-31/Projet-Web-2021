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
        $user = auth()->user();
        $purchase = Purchase::where('user_id', 'like', $user->id)->get();
        $game = [];
        $i = 0;
        foreach ($purchase as $p) {
            $game[$i] = Game::where('id', 'like', $p->game_id)->get();
            $i += 1;
        }
        return view('home', ["games" => $game]);
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
