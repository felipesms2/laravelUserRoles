 @extends('templates.main')

@section('content')

<h1>Register</h1>

<form method="POST" action="{{route('register')}}">
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input
         type="text"
            class="form-control @error('name') is-invalid  @enderror"
        name="name"
         id="name"
         value="{{old('name')}}"
    >
        @error('name')
        <span class='invalid-feedback' role='alert'>
            {{$message}}
        </span>
        @enderror
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
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
  <label for="password_confirmation" class="form-label">Password</label>
    <input
        type="password"
        name="password_confirmation"
        class="form-control"
        id="password_confirmation"
        class="form-control @error('password_confirmation') is-invalid  @enderror"
    >
        @error('password_confirmation')
        <span class='invalid-feedback' role='alert'>
            {{$message}}
        </span>
        @enderror
  </div>

<div class="mb-3">
   <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
