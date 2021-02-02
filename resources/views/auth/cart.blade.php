@extends('layouts.template')

@section('extra-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

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
                                            <td class="border-0 align-middle"><strong>{{ $game->subtotal() }} €</strong></td>
                                            <td class="border-0 align-middle">
                                                <select name="quantity" id="quantity" data-id="{{ $game->rowId }}" class="form-control">
                                                    @for($i = 1; $i <= 10; $i++)
                                                        <option value="{{ $i }} {{ $i == $game->quantity ? 'selected' : '' }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </td>
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
                            <h4>Your funds : {{ Auth::user()->balance }} €</h4>
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
                                </ul><a href="{{ route('checkout.index') }}" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
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

@section('extra-js')
    <script>
        const selects = document.querySelectorAll('#quantity');
        Array.from(selects).forEach((element) => {
           element.addEventListener('change', function () {
              let rowId = this.getAttribute('data-id');
              let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
              fetch(
                  `/cart/${rowId}`,
                  {
                      headers: {
                          "Content-Type": "application/json",
                          "Accept": "application/json, text-plain, */*",
                          "X-Request-With": "XMLHttpRequest",
                          "X-CSRF-TOKEN": token
                      },
                      method: 'patch',
                      body: JSON.stringify({
                          quantity: this.value
                      })
                  }).then((data) => {
                        console.log(data);
                        location.reload();
              }).catch((error) => {
                  console.log(error);
              })
           });
        });


    </script>
@endsection
