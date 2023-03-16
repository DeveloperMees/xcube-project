@extends('layout')
@section('content')
<h1 class="m-5 text-center">Cube Details</h1>
<p class="m-5 text-center">{{$cube->name}}</p>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item">Parts</li>
        </ol>
    </nav>
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <nav class="mb-1">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.cubes.index')}}">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{route('admin.cubes.show', ['cube' => $cube->id])}}">Details</a>
            </li>
        </ul>
    </nav>
    <a class="btn btn-sm btn-primary mt-2 mb-2" href="{{route('admin.cubes.addparts', ['cube' => $cube->id])}}">Add part</a>
    <table class="table table-striped text-center" id="CubePartsTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Preview</th>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Measurement</th>
                <th scope="col">Weight</th>
                <th scope="col">Category</th>
                <th scope="col">Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cube->parts as $part)
            <tr>
                <td><img class="table_img" src="{{asset('storage/'.$part->file_path)}}"></td>
                <th scope="row">{{$part->id}}</th>
                <td>{{$part->name}}</td>
                <td>{{$part->measurement}}</td>
                <td>{{$part->weight}}</td>
                <td>{{$part->category->name}}</td>
                <td><a class="btn btn-sm btn-danger" href="{{route('admin.cubes.removepart', ['cube' => $cube->id, 'part' => $part->id])}}">Remove</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="{{asset('js/tables/cubeparts.table.js')}}"></script>
<script src="{{asset('js/image.js')}}"></script>
@endsection