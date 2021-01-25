@extends('layouts.template')

@section('title')
    Cart of {{ ucwords(auth()->user()->name) }}
@endsection

@section('content')

    @if(Cart::count() > 0)
        <div style="margin-top: 2%">
            <div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 p-5 rounded shadow-sm mb-5">

                            <!-- Shopping cart table -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="border-0">
                                            <div class="p-2 px-3 text-uppercase">Product</div>
                                        </th>
                                        <th scope="col" class="border-0">
                                            <div class="py-2 text-uppercase">Price</div>
                                        </th>
                                        <th scope="col" class="border-0">
                                            <div class="py-2 text-uppercase">Quantity</div>
                                        </th>
                                        <th scope="col" class="border-0">
                                            <div class="py-2 text-uppercase">Remove</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Cart::content() as $game)
                                        <tr>
                                            <th scope="row" class="border-0">
                                                <div class="p-2">
                                                    <img src="{{ $game->model->image }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0"> <a href="#" class="d-inline-block align-middle">{{ $game->name }}</a></h5><span class="text-muted font-weight-normal font-italic d-block">Category: Watches</span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="border-0 align-middle"><strong>{{ $game->price }}</strong></td>
                                            <td class="border-0 align-middle"><strong>{{ $game->qty }}</strong></td>
                                            <td class="border-0 align-middle">
                                                <form action="{{ route('cart.destroy', $game->rowId) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn" type="submit"><i class="fas fa-times-circle"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- End -->
                        </div>
                    </div>

                    <div class="row py-5 p-4 rounded shadow-sm">
                        <div class="col-lg-6">

                        </div>
                        <div class="col-lg-6">
                            <div class="rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                            <div class="p-4">
                                <ul class="list-unstyled mb-4">
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>{{ Cart::subtotal() }}</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>{{ Cart::tax() }}</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                        <h5 class="font-weight-bold">{{ Cart::total() }}</h5>
                                    </li>
                                </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <strong><h2>Ouups, your cart is empty...</h2></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
