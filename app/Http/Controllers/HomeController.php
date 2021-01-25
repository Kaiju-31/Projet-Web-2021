<?php

namespace App\Http\Controllers;

use App\Game;
use App\Purchase;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use function GuzzleHttp\Psr7\uri_for;

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
        $all_games = Game::all();
        $all_users = User::all();
        if ($user->is_admin == 1) {
            return view('admin', ["games" => $all_games, "users" => $all_users]);
        } else {
            return view('home', ["games" => $game]);
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('auth.edit', ['value'=>1, 'user'=>$user]);
    }

    public function editEmail($id)
    {
        $user = User::find($id);
        return view('auth.edit', ['value'=>2, 'user'=>$user]);
    }

    public function editPassword($id)
    {
        $user = User::find($id);
        return view('auth.edit', ['value'=>3, 'user'=>$user]);
    }

    public function balance($id)
    {
        $user = User::find($id);
        return view('auth.SoldeManagement', ['user'=>$user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'balance'=>'required',
            'is_admin',
            'remember_token'=>'required'
        ]);

        $user = User::find($id);


        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->balance = $request->input('balance');
        $user->is_admin = $request->input('is_admin');
        $user->remember_token = $request->input('remember_token');


        $user->save();
        return redirect()->route('home.index');
    }

    public function updateBalance(Request $request, $id)
    {
        $request->validate([
            'CardNumber'=>['required', 'min:16', 'max:16'],
            'Cvv'=>['required', 'min:3', 'max:3'],
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'NewSold'=>['required', 'string', 'max:10'],
            'balance'=>'required',
            'is_admin',
            'remember_token'=>'required'
        ]);

        $userS = User::find($id);

        $userS->name = $request->input('name');
        $userS->email = $request->input('email');
        $userS->password = $request->input('password');
        $userS->balance = $request->input('balance') + $request->input('NewSold');
        $userS->is_admin = $request->input('is_admin');
        $userS->remember_token = $request->input('remember_token');

        $userS->save();
        return redirect()->route('home.index');
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
