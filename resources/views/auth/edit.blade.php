@extends('layouts.template')

@section('title')
    Edit
@endsection

@section('content')
    <form method="POST" action="{{ route('home.update', $user->id) }}">
        @method('PATCH')
        @csrf
        @if($value == 1)
            <h2 style="text-align: center">Name's modification</h2>
            <div class="form-group container-md">
                <label for="name">Name :</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="{{ $user->name }}" value="{{ $user->name }}">
                <input type="hidden" class="form-control" id="password" name="password" value="{{ $user->password }}">
                <input type="hidden" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>

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
        @elseif($value == 2)
            <h2 style="text-align: center">Email's modification</h2>
            <div class="form-group container-md">
                <label for="email">Email :</label>
                <input type="hidden" class="form-control" id="name" name="name" value="{{ $user->name }}">
                <input type="hidden" class="form-control" id="password" name="password" value="{{ $user->password }}">
                <input type="text" class="form-control" id="email" name="email" placeholder="{{ $user->email }}" value="{{ $user->email }}">
            </div>

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
        @else
            <h2 style="text-align: center">Password's modification</h2>
            <div class="form-group container-md">
                <label for="password">Password :</label>
                <input type="hidden" class="form-control" id="name" name="name" value="{{ $user->name }}">
                <input type="text" class="form-control" id="password" name="password" placeholder="" value="">
                <input type="hidden" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>

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
        @endif
        <div class="form-group container-md">
            <input type="hidden" class="form-control" id="balance" name="balance" value="{{ $user->balance }}">
            <input type="hidden" class="form-control" id="is_admin" name="is_admin" value="{{ $user->is_admin }}">
            <input type="hidden" class="form-control" id="remember_token" name="remember_token" value="{{ $user->remember_token }}">
        </div>

        <center>
            <button type="submit" class="btn btn-success">Edit</button>
            <button href="{{ route('home.index')}}" type="submit" class="btn btn-light">Cancel</button>
        </center>
    </form>
@endsection
