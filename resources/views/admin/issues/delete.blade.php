@extends('layout')
@section('content')
<h1 class="m-5 text-center">Delete category</h1>
<div class="container">
    <nav>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.issues.index')}}">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('admin.issues.create')}}">Create</a>
            </li>
        </ul>
    </nav>
    <form method="POST" action="{{route('admin.issues.update', ['issue' => $issue->id])}}">
        @method('delete')
        @csrf
        <div class="form-group">
            <label for="issueName">Issue name</label>
            <input type="text" name="name" class="form-control" id="issueName" value="{{$issue->name}}" placeholder="Enter name" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Delete issue</button>
    </form>
</div>
@endsection