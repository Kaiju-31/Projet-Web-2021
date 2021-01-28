@extends('layouts.template')

@section('title')
    Home
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1> Dashboard</h1></div>

                    <div class="card-body">
                        <div class=”panel-heading” style="color: #ae1c17"><h2> {{ ucwords(auth()->user()->name) }} </h2></div>
                        <span><b>Mail :</b> {{ auth()->user()->email }} </span>
                        <p><b>Solde :</b> {{ auth()->user()->balance }} €</p>

                        <div class=”panel-heading”>
                            <h5>Games purchases:</h5>
                            @php([$i = 0, $modif = 0])
                            @foreach($games as $g)
                                <p><i><a>{{$g[$i]->name}} ({{$g[$i]->price}} €)</a></i></p>
                            @endforeach
                        </div>
                        @php($id = (auth()->user()->id))
                        <center>
                            <div class="dropdown with-arrow" style="width: 100%">
                                <a class="btn btn-square btn-primary rounded-circle" data-toggle="dropdown" type="button" id="dropdown-toggle-btn-1" aria-haspopup="true" aria-expanded="false">&plus;</a>
                                <div class="dropdown-menu dropdown-menu-center" aria-labelledby="dropdown-toggle-btn-1">
                                    <h6 class="dropdown-header" style="text-align: center"><i>SETTINGS</i></h6>
                                    <a href="{{ route('home.edit', $id) }}" class="dropdown-item">Name</a>
                                    <a href="{{ route('home.editEmail', $id) }}" class="dropdown-item">Email</a>
                                    <a href="{{ route('home.editPassword', $id) }}" class="dropdown-item">Password</a>
                                    <div class="dropdown-divider"></div>
                                    <div class="dropdown-content">
                                        <a href="{{ route('home.balance', $id) }}" class="btn btn-danger" style="width: 100%" type="button">Add solde</a>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
