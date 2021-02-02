@extends('layouts.template')

@section('title')
    GAME {{$game->id}}
@endsection

@section('content')
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Plateform</th>
                    <th>Code</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <th>{{ $game->name }}</th>
                <td>{{ $game->quantity }}</td>
                <td>{{ $game->price }}</td>
                <td>{{ $game->plateform }}</td>
                <td>{{ $game->code }}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="mw-full">
        <div class="card p-1">
            <div class="row">
                <div class="content right-0">
                    <div>
                        <span class="badge">
                            <p> Comment : <b>{{$num_com}}</b></p> <!-- text-primary = color: primary-color, mr-5 = margin-right: 0.5rem (5px) -->
                        </span>
                        <br><br>
                        <span class="badge"> <!-- ml-5 = margin-left: 0.5rem (5px) -->
                            <p> Note : <b>{{$note}}</b> </p><!-- text-danger = color: danger-color, mr-5 = margin-right: 0.5rem (5px) -->
                        </span>
                    </div>
                    <br>
                </div>
                <div class="content">
                    <h6> All comments :</h6>
                    @php($i = 0)
                    @foreach ($comment as $com)
                        <div>
                            {{--                        <strong>{{$user[$i]}}</strong> // ne marche pas avec $user[$i]->name et jsp pk--}}
                            <br> <i>{{$com->note}}/5</i> <i class="fas fa-arrow-right"></i>  {{$com->comment}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
