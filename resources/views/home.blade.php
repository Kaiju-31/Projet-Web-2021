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
                        @if(auth()->user()->is_admin == 1)
                            <a style="color: #ae1c17" href="{{url('admin/routes')}}"> Admin {{ ucwords(auth()->user()->name) }} </a>
                        @else
                            <div class=”panel-heading” style="color: #ae1c17"><h2> {{ ucwords(auth()->user()->name) }} </h2></div>
                            <span><b>Mail :</b> {{ auth()->user()->email }} </span>
                            <p><b>Solde :</b> {{ auth()->user()->balance }} €</p>


{{--                            @foreach(auth()->user()->purchases as $u_purchase)--}}
{{--                                <p> {{ $u_purchase->date_purchase }} </p>--}}
{{--                            @endforeach--}}

                            <div class=”panel-heading”>
                                <h5>Games purchases:</h5>
                                @php([$i = 0, $modif = 0])
                                @foreach($games as $g)
                                    <p><i><a>{{$g[$i]->name}} ({{$g[$i]->price}} €)</a></i></p>
                                @endforeach
                            </div>
                        @endif
                            <center>
                            <div class="dropdown with-arrow" style="width: 100%">
                                <a class="btn btn-square btn-primary rounded-circle" data-toggle="dropdown" type="button" id="dropdown-toggle-btn-1" aria-haspopup="true" aria-expanded="false">&plus;</a>
                                <div class="dropdown-menu dropdown-menu-center" aria-labelledby="dropdown-toggle-btn-1">
                                    <h6 class="dropdown-header" style="text-align: center"><i>SETTINGS</i></h6>
                                    <a href="{{ route('home.edit', 1) }}" class="dropdown-item">Name</a>
                                    <a href="#" class="dropdown-item">Email</a>
                                    <a href="#" class="dropdown-item">Password</a>
                                    <div class="dropdown-divider"></div>
                                    <div class="dropdown-content">
                                        <button class="btn btn-danger" style="width: 100%" type="button">Add solde</button>
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
