@extends('layouts.template')

@section('title')
    Edit
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('home.updateBalance', $user->id) }}">
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
                            <div class="form-row row-eq-spacing-md">
                                <div class="col-md-12">
                                    <label for="CardNumber" class="text-center">Card number :</label>
                                    <input type="number" class="form-control" id="CardNumber" name="CardNumber">
                                </div>

                            </div>
                            <div class="form-row row-eq-spacing-sm">
                                <div class="col-sm">
                                    <label for="EDate">Expiration date :</label>
                                    <input type="date" class="form-control" id="EDate" name="EDate">
                                </div>
                                <div class="col-sm">
                                    <label for="Cvv">Cvv code :</label>
                                    <input type="number" class="form-control" id="Cvv" name="Cvv">
                                </div>
                            </div>
                            <div class="form-row row-eq-spacing-sm">
                                <div class="col-sm">
                                    <label for="name">Add solde :</label>
                                    <input type="number" class="form-control" id="NewSold" name="NewSold">
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <button type="submit" class="btn btn-success">Add credit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
