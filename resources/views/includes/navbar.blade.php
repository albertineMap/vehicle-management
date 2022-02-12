<div class="row fixed-top fixed_div">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            @if(session()->has('current_user'))
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Welcome {{session()->get('current_user')->name}}!</a>
                </div>
            @else
                <div></div>
            @endif
            <ul class="navbar-nav mb-2 mb-lg-0 navbar-right">
                @if(session()->has('current_user'))
                    <div>
                        @if (Route::currentRouteName()=='create' || Route::currentRouteName()=='edit')
                            <a href="{{ route('user_vehicles_list') }}"><span class="glyphicon glyphicon-user"></span>List of vehicles</a>
                        @endif
                        @if (Route::currentRouteName()=='user_vehicles_list')
                            <a href="{{ route('create') }}"><span class="glyphicon glyphicon-user"></span>Add a vehicle</a>
                        @endif

                        <a href="{{ route('signout') }}"><span class="glyphicon glyphicon-user"></span>Logout</a>
                    </div>
                @else
                    <div>
                        <a href="{{ route('registration') }}"><span class="glyphicon glyphicon-user"></span>Sign Up</a>
                        <a href="{{ route('login') }}">Login</a>
                    </div>
                @endif
            </ul>
        </div>
    </nav>
</div>

