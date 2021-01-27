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
