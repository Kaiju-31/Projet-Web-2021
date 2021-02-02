@extends('layouts.template')

@section('title')
    Home
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class=”panel-heading”>
                            <h5>Purchases :</h5>
                            @php([$i = 0, $modif = 0])
                            @foreach($games as $g)
                                <div>
                                    <i><a>{{$g[$i]->name}} ({{$g[$i]->price}} €)</a></i>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-key" style="color: #ae1c17"></i>&nbsp;&nbsp;<b>{{$g[$i]->code}}</b>
                                </div>
                            @endforeach
                        </div>
                        <br>
                        <div>
                            <a class="btn btn-danger" href=" {{route("home.index")}}"><i class="fas fa-hand-point-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
