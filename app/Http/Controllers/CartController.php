<?php

namespace App\Http\Controllers;


use App\Game;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
           return $cartItem->id == $request->game_id;
        });

        if ($duplicata->isNotEmpty()) {
            return redirect()->route('games.index')->with('success', 'The product has already been added');
        }

        $game = Game::find($request->game_id);

        if ($game->quantity > 0) {
            Cart::add($game->id, $game->name, 1, $game->price)
                ->associate("App\Game");
        } else {
            return redirect()->route('games.index')->with('error', 'Sorry, This product is empty');
        }

        //Cart::instance(auth()->user()->id)->store(auth()->user()->name);

            return redirect()->route('games.index')->with('success', 'Product successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.cart');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        $data = $request->json()->all();

        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,10'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Quantity was not updated !']);
        }

        Cart::update($rowId, $data['quantity']);

        return response()->json(['success' => 'Quantity updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $rowId
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return back()->with('success', 'Product has been deleted');

        //Cart::destroy();
//        Cart::remove($rowId);
//        return view('auth.cart');
    }
}
