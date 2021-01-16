@extends('layouts.template')

@section('title')
    Home
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1> Dashboard </h1></div>

                    <div class="card-body">
                        @if(auth()->user()->is_admin == 1)
                            <a href="{{url('admin/routes')}}"> Admin {{ ucwords(auth()->user()->name) }} </a>
                        @else
                            <div class=”panel-heading”><h2> {{ ucwords(auth()->user()->name) }} </h2></div>
                            <span>Mail : {{ auth()->user()->email }} </span>
                            <p>Solde : {{ auth()->user()->balance }} €</p>

                            @foreach(auth()->user()->purchases as $u_purchase)
                                <p> {{ $u_purchase->date_purchase }} </p>
                                <p> {{ $u_purchase->game_id }} </p>
                            @endforeach
                            @if (is_array($game) || is_object($game))
                            @foreach($purchases->auth()->user()->games as $u_game)
                                <p> {{ $u_game->name }} </p>
                            @endforeach
                                @endif

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div
@endsection
