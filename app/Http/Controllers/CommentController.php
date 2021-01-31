<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Game;
use App\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * choose between create a new comment or modify the actual one
     *
     * @param $id_game
     * @param $id_user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createEdit($id_game, $id_user)
    {
        $user = User::find($id_user);
        $game = Game::find($id_game);
        $comment = Comment::where('id_user', 'like', $user->id, 'and', 'id_game', 'like', $game->id)->get();
//        dd($comment);
        $nbr=$comment->Count();
        if ($nbr == 0) {
            return view('games.com.create', ['game'=>$game, 'user'=>$user]);
        } else {
            return view('games.com.edit', ['game'=>$game, 'user'=>$user]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
