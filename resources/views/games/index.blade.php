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
    @elseif(session('error'))
        <div style="margin-top: 1%" class="alert alert-danger" role="alert">
            <button class="close" data-dismiss="alert" type="button" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        @foreach($games as $game)
            <div class="w-400 mw-full col-3">
                <div class="card p-0 shadow-lg" style="height: 90%">
                    <a href="{{ route("game.show", $game) }}"><img style="height: 75%; width: 100%" src="{{ $game->image }}" class="img-fluid rounded-top" alt=""></a>
                    <div class="content">
                        <h2 class="content-title" style="text-align: center;">
                            <strong>
                            {{ $game->name }}
                            </strong>
                        </h2>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if($search)
        <br>
        <div>
            <div style="text-align: center;">
                <a href="{{route("game.index")}}" class="btn btn-danger">RESET SEARCH</a>
            </div>
        </div>
    @else
        <div>
            <div style="text-align: center; margin-top: 1%">
                {{ $games->links() }}
            </div>
        </div>
    @endif
@endsection

