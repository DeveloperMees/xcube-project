@extends('layout')
@section('content')
<div class="container">
	<div class="card mt-3">
		<div class="card-header text-white bg-dark">
			{{$user->name}}
		</div>
		<div class="card-body bg-light">
			<p>Name: {{$user->name}}</p>
			<p>Email: {{$user->email}}</p>
		</div>
	</div>
	<div class="card mt-3">
		<div class="card-header text-white bg-dark">
			Roles
		</div>
		<div class="card-body bg-light">
			<a class="btn btn-sm btn-primary" href="{{route('admin.users.addrole', ['user' => $user->id])}}">Add role</a>
			<table id="UsersTable" class="table table-striped display mt-2 mb-2">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Permissions</th>
						<th scope="col">Remove</th>
					</tr>
				</thead>
				<tbody>
					@foreach($user->roles as $role)
					<tr>
						<td scope="row">{{$loop->iteration}}</td>
						<td>{{$role->name}}</td>
						<td>
							@forelse ($role->permissions as $permission)
								{{$permission->name}}@if(!$loop->last){{', '}}@endif
							@empty
								No permission
							@endforelse
						</td>
						<td><a class="btn btn-sm btn-danger" href="{{route('admin.users.removerole', ['user' => $user->id, 'role' => $role->id])}}">Remove</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection