@extends('layout')
@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-header text-white bg-dark">Support</div>
        <div class="card-body bg-light">
            <h6 class="card-title font-weight-bold">Ticket</h6>
            <p class="card-text">This is the support page of x-cube.bkm.nl. May any errors or bugs occur during your visit to the site as a visitor, customer or administrator, then
                please fill out the ticket form below or send an email regarding your issue to <a href="mailto:xcubenederland@gmail.com">xcubenederland@gmail.com</a>.
                Our team will investigate and resolve your issue as soon as possible.</p>
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="post" action="{{route('admin.tickets.store')}}" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="issue_id">Issue</label>
                    <select name="issue_id" class="custom-select" id="inputGroupSelect01" required>
                        <option value="" selected>Choose...</option>
                        @foreach($issues as $issue)
                        <option value="{{$issue->id}}">{{$issue->name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <label for="description_id">Description</label>
                <div class="input-group">
                    <textarea class="form-control" name="description" id="description_id" placeholder="Issue description..."></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label for="supportName">You can add an image to support your ticket</label><br>
                    <input type="file" name="file">
                </div>
                <button name="start" id="start" type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>
@endsection