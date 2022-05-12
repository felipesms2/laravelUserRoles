<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/bundle.js') }}"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}

        <title>Laravel</title>

        <!-- Fonts -->

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    </div>
    <body class="antialiased">
<div class="container">
        <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    @yield('side-left')
                </div>
              @yield('auth')
            </div>
          </nav>

          <div class="mt-5">
              @yield('content')
          </div>
        </div>
        </body>
</html>
