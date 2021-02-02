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

        $comments = Comment::where('id_user', 'like', $id_user, 'and', 'id_game', 'like', $id_game)->get();
        $nbr = $comments->Count();

        foreach ($comments as $com) {
            $comment = $com;
        }

        //dd($comments);

        if ($nbr == 0) {
            return view('games.com.create', ['game'=>$game, 'user'=>$user]);
        } else {
            return view('games.com.edit', ['game'=>$game, 'user'=>$user, "comment"=>$comment]);
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
        $request->validate([
            'comment'=>'required',
            'id_user'=>'required',
            'id_game'=>'required',
            'note'=>'required'
        ]);

        $comment = new comment([
            'comment'=>$request->input('comment'),
            'id_user'=>$request->input('id_user'),
            'id_game'=>$request->input('id_game'),
            'note'=>$request->input('note')
        ]);
        $comment->save();

        return redirect()->route('home.index');
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'comment'=>'required',
            'id_user'=>'required',
            'id_game'=>'required',
            'note'=>'required'
        ]);

        $comment = Comment::find($id);

        $comment->comment = $request->input('comment');
        $comment->id_user = $request->input('id_user');
        $comment->id_game = $request->input('id_game');
        $comment->note = $request->input('note');

        $comment->save();

        return redirect()->route('home.index');
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
