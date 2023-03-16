@extends('layout')
@section('content')
<div class="container">
    <div class="d-flex justify-content-around">
        <div class="row">
            <div class="card mt-3">
                <div class="card-header text-white bg-dark">About</div>
                <div class="card-body bg-light">
                    <h6 class="font-weight-bold">What is this site for?</h6>
                    <p class="card-text">This is site has been developed to maintain and have an overview on the parts of the X-Cube project.</p>
                    <h6 class="font-weight-bold">Where can I maintain the parts?</h6>
                    <p class="card-text">You must have an administrator account to be able to alter anything regarding the X-Cube parts.</p>
                    <h6 class="font-weight-bold">Can I see the parts anywhere as a viewer/customer?</h6>
                    <p class="card-text">As of this moment not. We are still working on implementing all the necessary tools and functionalities for the administrators.</p>
                    <h6 class="font-weight-bold">I have a question regarding your project, can I contact you in any way?</h6>
                    <p class="card-text">Most certainly, navigate to the support page <a href="{{route('support')}}">here</a> and select "<b>question</b>" at the selection menu.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection