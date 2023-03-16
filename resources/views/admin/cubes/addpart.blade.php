@extends('layout')
@section('content')
<h1 class="m-5 text-center">Add part</h1>
<div class="container">
    <div class="card mt-3">
        <div class="card-header text-white bg-dark">Add part</div>
        <div class="card-body bg-light">
            <form method="POST" action="{{route('admin.cubes.storeparts', ['cube' => $cube->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="parts">Select part</label>
                    <select name="part_id[]" class="custom-select" id="parts" required multiple>
                        <option value="" selected>Choose...</option>
                        @foreach($parts as $part)
                        @unless ($cube->parts->contains($part))
                        <option value="{{$part->id}}">{{$part->name}}</option>
                        @endunless
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection