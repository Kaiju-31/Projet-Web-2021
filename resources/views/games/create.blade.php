@extends('layouts.template')

@section('title')
    Create Game
@endsection

@section('content')
    <h2 style="text-align: center">AJOUT DU JEU</h2>
    <form method="post" action="{{ route('game.store') }}">
        @csrf
        <div class="form-group container-md">
            <label for="name">Name :</label>
            <input type="text" class="form-control" id="name" name="name" >
            <label for="description">Descritpion :</label>
            <input type="text" class="form-control" id="description" name="description">
            <label for="photo">Image :</label>
            <input type="text" class="form-control" id="photo" name="photo">
            <label for="quantity">Quantity :</label>
            <input type="text" class="form-control" id="quantity" name="quantity">
            <label for="code">Activation code :</label>
            <input type="text" class="form-control" id="code" name="code">
            <label for="price">Price :</label>
            <input type="text" class="form-control" id="price" name="price">
            <label for="plateform">Plateform :</label>
            <select type="text" class="form-control" id="plateform" required="required" name="plateform">
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
            <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i></button>
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
