@extends('templates.main')

@section('content')

<h1>Login</h1>

<form method="POST" action="{{route('login')}}">
    @csrf

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input
         type="email"
            class="form-control @error('email') is-invalid  @enderror"
         id="email"
         name="email"
         aria-describedby="emailHelp"
         value="{{old('email')}}"
    >
        @error('email')
        <span class='invalid-feedback' role='alert'>
            {{$message}}
        </span>
        @enderror
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input
        type="password"
        name="password"
        id="password"
            class="form-control @error('password') is-invalid  @enderror"
            "
        id="password"
    >
        @error('password')
        <span class='invalid-feedback' role='alert'>
            {{$message}}    
        </span>
        @enderror
    </span>
  </div>
    <div class="mb-3">
   <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection
