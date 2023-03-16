@extends('layout')
@section('content')
<h1 class="m-5 text-center">Add role</h1>
<div class="container">
    <form method="POST" action="{{route('admin.users.assignuserrole', ['user' => $user->id])}}">
        @csrf
        <div class="form-group">
            <label for="roles">Select role</label>
            <select name="role_id" class="custom-select" id="roles">
                <option selected>Choose...</option>
                @foreach($roles as $role)
					@unless ($user->hasRole($role->name))
					<option value="{{$role->id}}">{{$role->name}}</option>
					@endunless
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection