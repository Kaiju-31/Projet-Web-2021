@extends('layouts.template')

@section('title')
    EDIT
@endsection

@section('content')

    <h2 style="text-align: center">JEU #{{$game->id}}</h2>
    <form method="POST" action="{{ route('game.update', $game->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group container-md">
            <label for="name">Name :</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="{{ $game->name }}" value="{{ $game->name }}">
            <label for="description">Description :</label>
            <input type="text" class="form-control" name="description" placeholder="{{ $game->description }}" value="{{ $game->description }}">
            <label for="image">Image :</label>
            <input type="text" class="form-control" name="image" placeholder="{{ $game->image }}" value="{{ $game->image }}">
            <label for="quantity">Quantity :</label>
            <input type="text" class="form-control" name="quantity" placeholder="{{ $game->quantity }}" value="{{ $game->quantity }}">
            <label for="price">Price :</label>
            <input type="text" class="form-control" name="price" placeholder="{{ $game->price }}" value="{{ $game->price }}">
            <label for="code">Activation Code :</label>
            <input type="text" class="form-control" name="code" placeholder="{{ $game->code }}" value="{{ $game->code }}">
            <label for="plateform">Plateform :</label>
            <select type="text" class="form-control" id="plateform" required="required" name="plateform" value="{{ $game->plateform }}">
                <option value="" selected="selected" disabled="disabled">Select the plateform</option>
                <option value="Playstation 5">Playstation 5</option>
                <option value="Playstation 4">Playstation 4</option>
                <option value="Xbox Serie">Xbox Serie</option>
                <option value="Xbox One">Xbox One</option>
                <option value="Steam">Steam</option>
                <option value="Nintendo Switch">Nintendo Switch</option>
            </select>
        </div>

        <center>
            <button type="submit" class="btn btn-success">EDIT</button>
            <button href="{{ route('home.index')}}" type="submit" class="btn btn-danger"><i class="fas fa-ban"></i></button>
        </center>
    </form>

    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>!</strong> Problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
