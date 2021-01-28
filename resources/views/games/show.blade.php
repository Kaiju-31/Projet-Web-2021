@extends('layouts.template')

@section('title')
    {{$game->name}}
@endsection

@section('content')
    <div class="mw-full"> <!-- w-600 = width: 60rem (600px), mw-full = max-width: 100% -->
        <div class="card p-1"> <!-- p-0 = padding: 0 -->
            <div class="row">
                <img src="{{ $game->image }}" width="25%" class="img-fluid rounded-top"> <!-- rounded-top = rounded corners on the top -->
                <!-- First content container nested inside card -->
                <div class="content right-0">
                    <h1 class="content-title">
                        {{$game->name}}
                    </h1>
                    <h6>
                        {{$game->description}}
                    </h6>
                    <div>
                    <span class="text-muted">
                        @if($game->plateform == "Playstation 5" || $game->plateform == "Playstation 4")
                            <i class="fab fa-playstation text-primary"></i>
                        @endif
                        @if($game->plateform == "Xbox Serie" || $game->plateform == "Xbox One")
                            <i class="fab fa-xbox text-success"></i>
                        @endif
                        @if($game->plateform == "Steam")
                            <i class="fab fa-steam"></i>
                        @endif
                        @if($game->plateform == "Nintendo Switch")
                            <i class="fas fa-gamepad text-danger"></i>
                        @endif
                    </span>
                        <span class="text-muted">
                         {{$game->plateform}}
                    </span>
                    </div>
                    <br>
                    <div>
                    <span class="badge">
                        <i class="fa fa-comments text-justify mr-3" aria-hidden="true"></i> 5 comments <!-- text-primary = color: primary-color, mr-5 = margin-right: 0.5rem (5px) -->
                    </span>
                        <span class="badge ml-5"> <!-- ml-5 = margin-left: 0.5rem (5px) -->
                        <i class="fas fa-star text-secondary mr-3"></i> 4<!-- text-danger = color: danger-color, mr-5 = margin-right: 0.5rem (5px) -->
                    </span>
                        <span class="badge ml-5"> <!-- ml-5 = margin-left: 0.5rem (5px) -->
                        <i class="fas fa-tag text-black-50 mr-3"> {{$game->price}}</i><!-- text-danger = color: danger-color, mr-5 = margin-right: 0.5rem (5px) -->
                    </span>
                    </div>
                    <br>
                    <div>
                        <label>Quantity :</label>
                        @if($game->quantity > 20)
                            <div class="progress h-25"> <!-- h-25 = height: 2.5rem (25px) -->
                                <div class="progress-bar rounded-0 bg-success" role="progressbar" style="width: {{$game->quantity}}%" aria-valuenow="{{$game->quantity}}" aria-valuemin="0" aria-valuemax="100">
                                    {{$game->quantity}}
                                </div> <!-- w-three-quarter = width: 75%, rounded-0 = border-radius: 0 -->
                            </div>
                        @else
                            <div class="progress h-25"> <!-- h-25 = height: 2.5rem (25px) -->
                                <div class="progress-bar rounded-0 bg-danger" role="progressbar" style="width: {{$game->quantity}}%" aria-valuenow="{{$game->quantity}}" aria-valuemin="0" aria-valuemax="100">
                                    {{$game->quantity}}
                                </div> <!-- w-three-quarter = width: 75%, rounded-0 = border-radius: 0 -->
                            </div>
                        @endif
                    </div>

                    @if(auth()->user())
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="game_id" value="{{ $game->id }}">
                            <button style="margin-top: 4%" class="btn btn-primary" type="submit">Add to cart</button>
                        </form>
                    @endif

                </div>
            </div>
            <hr />
            <!-- Second content container nested inside card (comments) -->

            <div class="content">
                <h2 class="content-title">
                    COMMENTS :
                </h2>
                {{--                @foreach ($users as $user)--}}
                {{--                    <div>--}}
                {{--                        <strong>{{$user->name}}</strong>--}}
                {{--                        <br />--}}
                {{--                        {{$comment->comment}}--}}
                {{--                    </div>--}}
                {{--                    <hr />--}}
                {{--                @endforeach--}}
                <div class="text-center mt-20"> <!-- text-center = text-align: center, mt-20 = margin-top: 2rem (20px) -->
                    <button class="btn btn-sm"><i class="fas fa-plus"></i></button>
                </div>
            </div>
        </div>
    </div>
@endsection
