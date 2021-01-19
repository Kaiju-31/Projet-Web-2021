@extends('layouts.template')

@section('title')
    Edit
@endsection

@section('content')
    <form method="POST" action="{{ route('home.update', $user->id) }}">
        @method('PATCH')
        @csrf

        <h2 style="text-align: center">Solde Account</h2>
        <div class="form-group container-md">
            <input type="hidden" class="form-control" id="name" name="name" value="{{ $user->name }}">
            <input type="hidden" class="form-control" id="password" name="password" placeholder="{{ $user->password }}" value="{{ $user->password }}">
            <input type="hidden" class="form-control" id="email" name="email" value="{{ $user->email }}">
            <input type="hidden" class="form-control" id="balance" name="balance" value="{{ $user->balance }}">
            <input type="hidden" class="form-control" id="is_admin" name="is_admin" value="{{ $user->is_admin }}">
            <input type="hidden" class="form-control" id="remember_token" name="remember_token" value="{{ $user->remember_token }}">
        </div>
        <div class="form-group container-md">
            <label for="CNumber">Card number :</label>
            <input type="number" class="form-control" id="CNumber" name="CNumber" minlength="12" maxlength="12">
            <label for="EDate">Expiration date :</label>
            <input type="date" class="form-control" id="EDate" name="EDate">
            <label for="ZIP">ZIP code :</label>
            <input type="number" class="form-control" id="ZIP" name="ZIP" minlength="3" maxlength="3">
            <label for="name">Add solde :</label>
            <input type="number" class="form-control" id="NewSold" name="NewSold" minlength="1" maxlength="5">
        </div>

        <center>
            <button type="submit" class="btn btn-success">Edit</button>
            <button href="{{ route('home.index')}}" type="submit" class="btn btn-light">Cancel</button>
        </center>

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
    </form>
@endsection
