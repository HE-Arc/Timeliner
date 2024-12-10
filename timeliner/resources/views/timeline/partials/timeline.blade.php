<div class="timeline-for-list-template">
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-body">
                    @if(! $timeline->private) <!-- if public, show title with a globe icon -->
                    <h5 class="card-title bi bi-globe"> {{ $timeline->name}}</h5>
                    @else
                    <h5 class="card-title bi bi-lock-fill"> {{ $timeline->name }}</h5>
                    @endif
                    <p class="card-text">{{$timeline->description}}</p>
                    <a href="timeline/{{ $timeline->id }}" class="btn btn-primary stretched-link bi bi-eye"> View</a>
                </div>
            </div>
        </div>
    </div>
</div>
