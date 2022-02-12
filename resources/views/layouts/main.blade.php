<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')
    </head>
    <body>
        <div class="d-flex flex-column mb-3 ">
            {{-- header --}}
            <div class='p2'>
                @include('includes.navbar')
            </div>

            {{-- content --}}

            <div id = 'main' class="row p2 ">
                <div class="col-1"></div>
                <div class="col ">
                    <div id='notification'>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                        </div><br />
                      @endif
                    </div>
                    @yield('content')
                </div>
                <div class="col-1"></div>
            </div>

            {{-- footer --}}
            <div class='row p2'>
                @include('includes.footer')
            </div>
        </div>

    </body>
</html>
