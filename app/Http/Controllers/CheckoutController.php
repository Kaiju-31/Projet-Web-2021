<?php

namespace App\Http\Controllers;


use App\Order;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Stripe::setApiKey('sk_test_51IDLtMCK5z95ADJxO0266kVibRkKZxBkhMOW8EIF78f1JEjTTvq9bYXgyfEsD9NCCVvm4CA4UjHBiU9eAV8sLtEl00fWKUL1HX');

        $intent = PaymentIntent::create([
           'amount' => round(Cart::total()) * 100,
           'currency' => 'eur',
           'receipt_email' => Auth::user()->email
        ]);
        $clientSecret = Arr::get($intent, 'client_secret');

//        $pdf = fopen('/path/to/a/file.jpg', 'r');
//        \Stripe\File::create([
//            'file' => $pdf,
//            'purpose' => 'tax_document_user_upload',
//        ]);

        return view('checkout.index', [
            'clientSecret' => $clientSecret,
        ]);
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
        $data = $request->json()->all();

        $order = new Order();

        $order->payment_intent_id = $data['paymentIntent']['id'];
        $order->amount = $data['paymentIntent']['amount'];

        $order->payment_created_at = (new DateTime())
            ->setTimestamp($data['paymentIntent']['created'])
            ->format('Y-m-d H:i:s');

        $products = [];
        $i = 0;

        foreach (Cart::content() as $product) {
            $products['product_' . $i][] = $product->model->name;
            $products['product_' . $i][] = $product->model->price;
            $products['product_' . $i][] = $product->quantity;
            $i += 1;
        }

        $order->products = serialize($products);
        $order->user_id = Auth::user()->id;
        $order->save();

        if ($data['paymentIntent']['status'] == 'succeeded') {
            Cart::destroy();
            return response()->json(['success' => 'Payment Intent Succeeded']);
        } else {
            return response()->json(['success' => 'Payment Intent Not Succeeded']);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
