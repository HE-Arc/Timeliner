<div class="timeline-for-list-template">
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-body">
                    @if( $timeline[1]) <!-- if public, show title with a globe icon -->
                    <h5 class="card-title bi bi-globe"> {{ $timeline[0] }}</h5>
                    @else
                    <h5 class="card-title bi bi-lock-fill"> {{ $timeline[0] }}</h5>
                    @endif
                    <p class="card-text">{{$timeline[2]}}</p>
                    <a href="#" class="btn btn-primary stretched-link">View</a>
                </div>
            </div>
        </div>
    </div>
</div>
