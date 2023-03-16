@extends('layout')
@section('content')
<h1 class="m-5 text-center">Update user</h1>
<div class="container">
    <nav>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.users.index')}}">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{route('admin.users.edit', ['user' => $user->id])}}">Edit</a>
            </li>
        </ul>
    </nav>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{route('admin.users.update', ['user' => $user->id])}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="userName">Username</label>
            <input type="text" name="name" class="form-control" id="userName" value="{{$user->name}}" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="userEmail">Email</label>
            <input type="text" name="email" class="form-control" id="userEmail" value="{{$user->email}}" placeholder="Enter measurments">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection