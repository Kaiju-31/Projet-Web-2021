@extends('layouts.template')

@section('title')
    Acceuil
@endsection

@section('content')

    @if(session('success'))
        <div style="margin-top: 1%" class="alert alert-success" role="alert">
            <button class="close" data-dismiss="alert" type="button" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
    @foreach($games as $game)
        <div class="w-400 mw-full col-3">
            <div class="card p-0 shadow-lg">
                <a href="{{ route("game.show", $game) }}"><img src="{{ $game->image }}" class="img-fluid rounded-top" alt=""></a>
                <div class="content">
                    <h2 class="content-title">
                        {{ $game->name }}
                    </h2>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    @if($search)
        <br>
        <div>
            <center>
                <a href="{{route("game.index")}}" class="btn btn-danger">RESET SEARCH</a>
            </center>
        </div>
    @endif
@endsection

