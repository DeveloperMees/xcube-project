@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($cubes as $cube)
                <div class="col col-4 mt-3 mb-3">
                    <div class="card text-center">
                        <div class="card-header text-white bg-dark">{{$cube->name}}</div>
                        <img class="card-img-top" src="{{asset('storage/'.$cube->file_path)}}" alt="Card image cap">
                        <div class="card-body bg-light">
                            <h5 class="font-weight-bold">About this cube</h5>
                            <p class="card-text">This X-Cube is the most visited X-Cube in the Netherlands</p>
                            <a href="{{route('admin.cubes.show', ['cube' => $cube->id])}}" class="btn btn-primary">More details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
