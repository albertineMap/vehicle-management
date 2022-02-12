@extends('layouts.main')
@section('content')
    <div class="row main_menu main-form">
        <h2> Signup </h2>
        <h6><i>Please fill in this form to create an account.</i></h6>
        <hr>

        {{-- image --}}
        <div class="row">
            <div class="col-6 align-items-center">
                <img src="/images/vehicle.jpg">
            </div>

            {{-- form --}}
            <div class="col-6 p-2 register-form align-items-center">
                {{-- <form> --}}
                <form action="{{ route('signup') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label >Name</label>
                        <input type="text" class="form-control"  id ='name' name ='name' placeholder="Name" required autofocus>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" name = 'email' id='email' placeholder="Email" required>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name = 'password' placeholder="Password" required>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <br>
                    <button type="submit" id = 'btn_register_form' class="btn btn-dark btn-block">Submit</button>
                    <hr>

                    {{-- signin --}}
                    <div class="signup other_link">
                        <p>Already have an account? <a class='other_link' href="/login">Sign in</a>.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
