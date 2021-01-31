@extends('layouts.template')

@section('title')
    Admin
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard <a>Admin</a></div>
                    <br>
                    @php($i = 0)
                    @foreach($users as $user)
                        @php($i += 1)
                    @endforeach
                    <div class="card-body">
                        <a style="color: #fde300">Number of member : {{$i}}</a>
                    </div>
                    <div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th> {{$user->id}} </th>
                                    <td> {{$user->name}} </td>
                                    <td> {{$user->email}} </td>
                                    <td class="dropdown with-arrow">
                                        <a class="btn btn-square btn-primary rounded-circle" data-toggle="dropdown" type="button" id="dropdown-toggle-btn-1" aria-haspopup="true" aria-expanded="false">&plus;</a>
                                        <div class="dropdown-menu dropdown-menu-center" aria-labelledby="dropdown-toggle-btn-1">
                                            <h6 class="dropdown-header" style="text-align: center"><i>SETTINGS</i></h6>
                                            <a href="{{ route('home.edit', $user->id) }}" class="dropdown-item">Name</a>
                                            <a href="{{ route('home.editEmail', $user->id) }}" class="dropdown-item">Email</a>
                                            <a href="{{ route('home.editPassword', $user->id) }}" class="dropdown-item">Password</a>
                                            <div class="dropdown-divider"></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <center>
                        <div>
                            <a class="btn btn-success" href="{{ route('game.create') }}"><i class="fas fa-gamepad"></i> <i class="fas fa-plus-circle"></i>
                            </a>
                        </div>
                    </center>
                    <div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($games as $game)
                                <tr>
                                    <th> {{$game->id}} </th>
                                    <td> {{$game->name}}
                                        <a href="{{ route('game.showAdmin', $game) }}"><i class="fas fa-search"></i></a>
                                    </td>
                                    <td> {{$game->quantity}} </td>
                                    <td> {{$game->price}} </td>
                                    <td>
                                        <a href="{{ route('game.edit', $game->id) }}" class="btn btn-secondary"><i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('game.destroy', $game) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
