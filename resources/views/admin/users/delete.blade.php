@extends('layout')
@section('content')
<h1 class="m-5 text-center">Delete user</h1>
<div class="container">
    <nav>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.users.index')}}">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('admin.users.create')}}">Create</a>
            </li>
        </ul>
    </nav>
    <form method="POST" action="{{route('admin.users.update', ['user' => $user->id])}}">
        @method('delete')
        @csrf
        <div class="form-group">
            <label for="userName">user name</label>
            <input type="text" name="name" class="form-control" id="userName" value="{{$user->name}}" placeholder="Enter name" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Delete user</button>
    </form>
</div>
@endsection