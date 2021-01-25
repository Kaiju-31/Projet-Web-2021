@extends('layouts.template')

@section('title')
    Admin
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <br>
                    <div class="card-body">
                        <a href="{{url('admin/routes')}}">Admin</a>
                    </div>
                    <div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-right">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th> {{$user->id}} </th>
                                    <td> {{$user->name}} </td>
                                    <td> {{$user->email}} </td>
                                    <td class="text-right"></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th class="text-right">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($games as $game)
                                <tr>
                                    <th> {{$game->id}} </th>
                                    <td> {{$game->name}} </td>
                                    <td> {{$game->quantity}} </td>
                                    <td> {{$game->price}} </td>
                                    <td class="text-right"></td>
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
