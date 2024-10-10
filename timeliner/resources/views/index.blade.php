@extends('layout.app')

@section('content')
<h1>Timelines</h1>
<p class="lead">Timeliner dashboard. Here you can access view timelines available to you, whether public or yours.</p>
<div class="row">
    <div class="col">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title bi bi-globe"> Timeline 1</h5>
                <p class="card-text">This is a timeline about something.</p>
                <a href="#" class="btn btn-primary stretched-link">View</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title bi bi-lock-fill"> Timeline 2</h5>
                <p class="card-text">This is a timeline about something.</p>
                <a href="#" class="btn btn-primary stretched-link">View</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title bi bi-globe"> Timeline 3</h5>
                <p class="card-text">This is a timeline about something.</p>
                <a href="#" class="btn btn-primary stretched-link">View</a>
            </div>
        </div>
    </div>
</div>
@endsection
