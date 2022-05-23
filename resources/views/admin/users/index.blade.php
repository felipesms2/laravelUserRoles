@extends('index')


@section('content')
<a
    class="btn btn-success"
    href="{{route('admin.users.create')}}"
>Create</a>
<div class="card">
<table class="table text-center">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

        {{-- {{dd($users)}} --}}
        @foreach ($users as $user)

        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a
                    class="btn btn-sm btn-primary"
                    href="{{route('admin.users.edit', $user->id)}}"
                    role="button"
                >Edit</a>
                <button
                    class ="btn btn-sm btn-danger
                    d-inline"
                    type="submit"
                    onclick="$('#delete-user-form-{{$user->id}}').submit()"
                >Delete</button>

                 <form
                    id="delete-user-form-{{$user->id}}"
                    action="{{route('admin.users.destroy',$user->id)}}"
                    method="POST"
                    style="display: none"
                >
                    @csrf
                    @method("DELETE")
                </form>
                {{-- <form  id = "delete-user-form-{{$user->id}}" action="{{route('admin.users.destroy',$user->id)}}" method="POST" >
                    @csrf
                    @method("DELETE")
                    <button class = "btn btn-sm btn-danger d-inline" type="submit">Delete</button>
                </form> --}}
            </td>
          </tr>

        @endforeach

    </tbody>
</table>
{{$users->links()}}
</div>
@endsection




