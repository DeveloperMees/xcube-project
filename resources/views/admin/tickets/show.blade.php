@extends('layout')
@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-header text-white bg-dark">
            {{$ticket->created_at}}
        </div>
        <div class="card-body bg-light">
            {{$ticket->description}}
            <form method="post" action="{{route('admin.tickets.update', ['ticket' => $ticket->id])}}">
                @method('put')
                @csrf
                <input class="mt-2" type="checkbox" id="updateStatus" name="update_status" @if($ticket->status)checked @endif>
                <label for="updateStatus">Handled</label>
                <br>
                <button type="submit" class="btn btn-primary">Update status</button>
            </form>
        </div>
    </div>
</div>
@endsection