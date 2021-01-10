@extends('layouts.template')

@section('title')
    Acceuil
@endsection

@section('content')

    @foreach($games as $game)
        <p> {{ $game->name }} </p>
    @endforeach

@endsection

