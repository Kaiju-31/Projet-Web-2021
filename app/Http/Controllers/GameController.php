<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Game;
use App\User;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get("search");
        if ($search) {
            $game = Game::where('name', 'like', '%'.$search.'%')->get();
        } else {
            $game = Game::paginate(4);
        }
        return view("games.index", ["games" => $game, "search" => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'photo'=>'required',
            'quantity'=>'required',
            'code'=>'required',
            'price'=>'required',
            'plateform'=>'required'
        ]);

        $game = new game([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'image'=>$request->input('photo'),
            'quantity'=>$request->input('quantity'),
            'code'=>$request->input('code'),
            'price'=>$request->input('price'),
            'plateform'=>$request->input('plateform')
        ]);
        $game->save();

        return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        $comment = Comment::where('id_game', 'like', $game->id)->get();
        //$user = User::where('id', 'like', $comment->id_user)->get();
        $note = 0;
        $user = [];
        $i = 0;
        foreach ($comment as $c) {
            $note += $c->note;
            $user[$i] = User::where('id', 'like', $c->id_user)->get();
            $i += 1;
        }
        if ($i == 0) {
            $i = 1;
        }
        $note_f = $note / $i;
        $n_comment = count($comment);
        return view("games.show", ["game" => $game, "comment" => $comment, "user" => $user, "note" => $note_f, "num_com" => $n_comment]);
    }

    public function showAdmin(Game $game)
    {
        $commentA = Comment::where('id_game', 'like', $game->id)->get();
        //$user = User::where('id', 'like', $comment->id_user)->get();
        $note = 0;
        $user = [];
        $i = 0;
        foreach ($commentA as $c) {
            $note += $c->note;
            $user[$i] = User::where('id', 'like', $c->id_user)->get();
            $i += 1;
        }
        if ($i == 0) {
            $i = 1;
        }
        $note_f = $note / $i;
        $n_comment = count($commentA);
        return view("games.showAdmin", ["game" => $game, "comment" => $commentA, "user" => $user, "note" => $note_f, "num_com" => $n_comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game = Game::find($id);

        return view('games.edit', ['game'=>$game]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'required',
            'description'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'plateform'=>'required',
            'code'=>'required'
        ]);

        $game = Game::find($id);

        $game->name = $request->input('name');
        $game->description = $request->input('description');
        $game->image = $request->input('image');
        $game->quantity = $request->input('quantity');
        $game->code = $request->input('code');
        $game->price = $request->input('price');
        $game->plateform = $request->input('plateform');

        $game->save();

        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('home.index');
    }
}
