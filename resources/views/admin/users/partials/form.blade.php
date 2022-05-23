@csrf
<div class="mb-3">
  <label for="name" class="form-label">Name</label>
  <input
       type="text"
       Register      class="form-control @error('name') is-invalid  @enderror"
      name="name"
       id="name"
       value="{{old('name')}}@isset($user){{$user->name}}@endisset"
  >
      @error('name')
      <span class='invalid-feedback' role='alert'>
          {{$message}}
      </span>
      @enderror
</div>
<div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">Email address</label>
  <input
       type="email"
          class="form-control @error('email') is-invalid  @enderror"
       id="email"
       name="email"
       aria-describedby="emailHelp"
       value="{{old('email')}}@isset($user){{$user->email}}@endisset"
  >
      @error('email')
      <span class='invalid-feedback' role='alert'>
          {{$message}}
      </span>
      @enderror
  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
</div>
@isset($create)

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
@endisset
<div class="something">

    @foreach ($roles as $role)
      <div class="form-check">
          <input
              class="form-check-input"
              type="checkbox"
              value="{{$role->id}}"
              id="{{$role->name}}"
              name="roles[]"
              @isset($user)
                @if (in_array($role->id, $user->roles->pluck('id')->toArray()))
                  @checked(true)
                @endif
              @endisset
          >
          <label class="form-check-label" for="flexCheckDefault">
              {{$role->name}}
          </label>
      </div>
    @endforeach
</div>

<div class="mb-3">
 <button type="submit" class="btn btn-primary">Submit</button>
