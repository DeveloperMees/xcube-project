@extends('layout')
@section('content')
<h1 class="m-5 text-center">Update issue</h1>
<div class="container">
    <nav>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.issues.index')}}">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.issues.edit', ['issue' => $issue->id])}}">Edit</a>
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
    <form method="POST" action="{{route('admin.issues.update', ['issue' => $issue->id])}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="issueName">Issue name</label>
            <input type="text" name="name" class="form-control" id="issueName" value="{{$issue->name}}" placeholder="Enter name">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection