@extends('layout')
@section('content')
<div class="container-fluid">
    <div class="row float-left p-2">
        <div class="card text-white" style="max-width: 25rem; max-height: 25rem;">
            <div class="card-header text-center font-weight-bold bg-dark">Configuration</div>
            <div class="card-body bg-light">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active link_color" href="#">
                            <span data-feather="home"></span>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link link_color" href="{{route('admin.cubes.index')}}">
                            <span data-feather="box"></span>
                            Cubes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link_color" href="{{route('admin.issues.index')}}">
                            <span data-feather="alert-octagon"></span>
                            Issues
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link_color" href="{{route('admin.parts.index')}}">
                            <span data-feather="tool"></span>
                            Parts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link_color" href="{{route('admin.users.index')}}">
                            <span data-feather="users"></span>
                            Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link_color" href="{{route('admin.themes.index')}}">
                            <span data-feather="edit-2"></span>
                            Themes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link_color" href="{{route('admin.tickets.index')}}">
                            <span data-feather="file-text"></span>
                            Tickets
                        </a>
                    </li>
                    <li class="divider"></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        </ol>
    </nav>
    <div class="card mb-3">
        <div class="card-header text-white font-weight-bold bg-dark">Recently added parts</div>
        <div class="card-body bg-light">
            <canvas class="bg-light my-4" id="myBarChart" width="900" height="380"></canvas>
        </div>
    </div>
    <h2>Parts</h2>
    <div class="table-responsive mb-5">
        <table class="table table-striped text-center" id="PartsTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Preview</th>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Measurement</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Category name</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($parts as $part)
                <tr>
                    <td><img class="table_img " src="{{asset('storage/'.$part->file_path)}}"></td>
                    <th scope="row">{{$part->id}}</th>
                    <td>{{$part->name}}</td>
                    <td>{{$part->measurement}}</td>
                    <td>{{$part->weight}}</td>
                    <td>{{$part->category->name}}</td>
                    <td><a class="btn btn-sm btn-primary" href="{{route('admin.parts.edit', ['part' => $part->id])}}">edit</a></td>
                    <td><a class="btn btn-sm btn-danger" href="{{route('admin.parts.delete', ['part' => $part->id])}}">delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
</div>
</div>

@section('scripts')
<script src="{{asset('js/tables/parts.table.js')}}"></script>
<script src="{{asset('js/image.js')}}"></script>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script>
    new Chart(document.getElementById("myBarChart"), {
        type: 'bar',
        data: {
            labels: ["Jan", "Feb", "Mar", "April", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "DecS"],
            datasets: [{
                label: "X-Cube Sessions",
                backgroundColor: [],
                data: [2478, 5267, 734, 784, 433, 2478, 5267, 734, 784, 433, 784, 433]
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Recently added parts'
            }
        }
    });
</script>
</script>
@endsection
@endsection
