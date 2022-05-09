@extends("templates.main")


@section("content")
    <h1>
        Hi from index
    </h1>
@endsection


<main class="container">

</main>

@section('auth')
aaa
    @if (Route::has('login'))
        @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif

        @endauth

    @endif

@endsection
