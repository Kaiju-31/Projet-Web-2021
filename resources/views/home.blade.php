@extends('layouts.template')

@section('title')
    Home
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Dashboard</h1></div>

                    <div class="card-body">
                        @if(auth()->user()->is_admin == 1)
                            <a href="{{url('admin/routes')}}">Admin {{ auth()->user()->name }}</a>
                        @else
                            <div class=”panel-heading”><h2>{{ auth()->user()->name }}</h2></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div
@endsection
