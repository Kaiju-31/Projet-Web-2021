@extends('layouts.template')

@section('title')
    Cart of {{ ucwords(auth()->user()->name) }}
@endsection

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Subtotal</th>
            <th></th>
        </tr>
        </thead>

        <tbody>

        @foreach(Cart::content() as $row)

            <tr>
                <td> {{ $row->id }} </td>
                <td>
                    <p><strong>{{ $row->name }}</strong></p>
                    <p>{{ ($row->options->has('size') ? $row->options->size : '') }}</p>
                </td>
                <td><input type="text" value="{{ $row->qty }}"></td>
                <td>$ {{ $row->price }}</td>
                <td>$ {{ $row->total }}</td>
                <td>
                    <form action="{{ route('cart.destroy', $row->id) }}" method="DELETE">
                        <button class="btn" type="submit"><i class="fas fa-times-circle"></i></button>
                    </form>
                </td>
            </tr>

        @endforeach

        </tbody>

        <tfoot>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>Subtotal</td>
            <td>{{ Cart::subtotal() }}</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>Tax</td>
            <td>{{ Cart::tax() }}</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>Total</td>
            <td>{{ Cart::total() }}</td>
        </tr>
        </tfoot>
    </table>
@endsection
