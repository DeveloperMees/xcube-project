@extends('layout')
@section('content')
<h1 class="m-5 text-center">Tickets handled</h1>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item">Handled</li>
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
                <a class="nav-link" href="{{route('admin.tickets.index')}}">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{route('admin.tickets.handled')}}">Handled</a>
            </li>
        </ul>
    </nav>
    <div class="card mt-3">
        <div class="card-header text-white bg-dark">
            Tickets
        </div>
        <div class="card-body bg-light">
            <div class="row">
                @foreach($tickets as $ticket)
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-header bg-dark p-0">
                            <a data-toggle="collapse" href="#ticketcardbody{{$ticket->id}}" aria-expanded="true" aria-controls="ticketcardbody{{$ticket->id}}" id="ticketcardhead{{$ticket->id}}" class="text-decoration-none text-white d-block p-2">
                                {{$ticket->created_at}}
                            </a>
                        </div>
                        <div id="ticketcardbody{{$ticket->id}}" class="collapse" aria-labelledby="ticketcardhead{{$ticket->id}}">
                            <div class="card-body bg-light">
                                <a class="btn btn-primary btn-sm float-right" href="{{route('admin.tickets.show', ['ticket' => $ticket->id])}}">Details</a>
                                <p><span class="font-weight-bold">Issue: </span>{{$ticket->issue->name}}</p>
                                <hr>
                                <p><span class="font-weight-bold">Description: </span><br>{{$ticket->description}}</p>
                                <hr>
                                <p><span class="font-weight-bold">Additional image:</span></p>
                                <img class="ticket_img img-thumbnail" src="{{asset('storage/'.$ticket->file_path)}}">
                            </div>
                            <div class="card-footer">
                                <p><span class="font-weight-bold">Updated by: </span>@empty ($ticket->updatedBy) Deleted @else {{$ticket->updatedBy->name}} @endempty <span class="font-weight-bold">At: </span>{{$ticket->updated_at}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('js/image.js')}}"></script>
@endsection