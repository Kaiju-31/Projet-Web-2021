<?php

namespace App\Http\Controllers;

use App\Game;
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

    public function edit($value)
    {
        return view('auth.edit', ['value'=>$value]);
    }

    public function update(Request $request, $id)
    {
//        $request->validate([
//            'name'=>'required',
//            'specialite'=>'required'
//        ]);
//
//        $promotion = promotion::find($id);
//
//
//        $promotion->name = $request->input('name');
//        $promotion->specialite=$request->input('specialite');
//
//
//        $promotion->save();
        return redirect()->route('home');
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
