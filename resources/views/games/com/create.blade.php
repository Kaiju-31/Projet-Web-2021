@extends('layouts.template')

@section('title')
    create comment
@endsection

@section('content')
    <h2 style="text-align: center">Add comment</h2>
    <form method="post" action="{{ route('comment.store') }}">
        @csrf
        <div class="form-group container-md">
            <label for="comment">comment :</label>
            <input type="text" class="form-control" id="name" name="name" >

            <input type="hidden" class="form-control" id="id_user" name="id_user" value="{{ $user->id }}">
            <input type="hidden" class="form-control" id="id_game" name="id_game" value="{{ $game->id }}">

            <label for="note">Note :</label>
            <select type="text" class="form-control" id="plateform" required="required" name="plateform">
                <option value="" selected="selected" disabled="disabled">Note this game (1 to 5)</option>
                <option value="1">1/5</option>
                <option value="2">2/5</option>
                <option value="3">3/5</option>
                <option value="4">4</option>
                <option value="5">5/5</option>
            </select>
        </div>

        <center>
            <button type="submit" class="btn btn-success">Add comment</button>
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
