@extends('layout')
@section('content')
<h1 class="m-5 text-center">User index</h1>
<div class="container">
	@if (session('message'))
	<div class="alert alert-success">
		{{ session('message') }}
	</div>
	@endif
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
			<li class="breadcrumb-item">Users</li>
		</ol>
	</nav>
	<table id="UsersTable" class="table table-striped display mb-5">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Username</th>
				<th scope="col">Email</th>
				<th scope="col">Show</th>
				<th scope="col">Edit</th>
				<th scope="col">Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td scope="row">{{$loop->iteration}}</td>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td><a class="btn btn-sm btn-primary" href="{{route('admin.users.show', ['user' => $user->id])}}">Details</a></td>
				<td><a class="btn btn-sm btn-primary" href="{{route('admin.users.edit', ['user' => $user->id])}}">Edit</a></td>
				<td><a class="btn btn-sm btn-danger" href="{{route('admin.users.delete', ['user' => $user->id])}}">Delete</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/tables/users.table.js')}}"></script>
@endsection