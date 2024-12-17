@php
use App\Models\Ownership;
@endphp
<div class="timeline-for-list-template">
    <div class="row align-items-stretch d-flex">
        <div class="col-11 p-0">
            <div class="card mb-4">
                <div class="card-body">
                    @if(! $timeline->private) <!-- if public, show title with a globe icon -->
                    <h5 class="card-title bi bi-globe"> {{ $timeline->name }}</h5>
                    @else
                    <h5 class="card-title bi bi-lock-fill"> {{ $timeline->name }}</h5>
                    @endif
                    <p class="card-text">{{ $timeline->description }}</p>
                    <a href="{{ route("timeline.show", $timeline->id) }}" class="btn btn-primary stretched-link bi bi-eye"> View</a>
                </div>
            </div>
        </div>

        @auth
        @if (Ownership::find($timeline->id . Auth::user()->id))
            <form class="d-flex align-items-stretch mb-4" action="{{ route('timeline.destroy', $timeline->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this timeline?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger bi bi-trash d-flex align-items-center justify-content-center"></button>
            </form>
        @endif
        @endauth
    </div>
</div>
