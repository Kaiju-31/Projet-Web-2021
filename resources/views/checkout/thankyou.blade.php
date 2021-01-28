@extends('layouts.template')

@section('title')
        Thank you
@endsection

@section('content')
    <div class="card w-half" style="margin-top: 2%; margin-left: 25%">
        <div class="card-header">
            <h1>Your order has been taken into account !</h1>
        </div>
        <div class="card-body">
            <a href="{{ route("game.index") }}" class="btn btn-primary">Return to Website</a>
        </div>
    </div>
@endsection
