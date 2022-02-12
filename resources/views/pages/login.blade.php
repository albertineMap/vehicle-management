@extends('layouts.main')
@section('content')
    <div class="row main_menu main-form">
        <p><h3>Welcome!</h3></p>
        <p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </p>
        <hr>

        {{-- image --}}
        <div class="row">
            <div class="col-6 align-items-center">
                <img src="/images/vehicle.jpg">
            </div>
            {{-- form --}}
            <div class="col-6 register-form align-items-center">
                <form method="POST" action="{{ route('signin') }}">
                {{-- <form method="post"> --}}
                    @csrf
                    <div class="form-group mb-3">
                        <label>Email address</label>
                        <input type="email" class="form-control" name = 'email' placeholder="Email" id="email" required
                        autofocus>
                        {{-- @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif --}}
                    </div>

                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" name = 'password' placeholder="Password" required>
                        {{-- @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif --}}
                    </div>
                    <br>
                    <button class = 'btn btn-dark btn-block' id = 'btn_login_form'>Submit</button>
                </form>
            </div>
        </div>
    </div>
@stop

