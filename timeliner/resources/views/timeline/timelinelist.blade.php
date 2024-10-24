<div>
     <!-- foreach timeline received show a clickable element with its title that redirects to the timeline with its ID
       reuse this element for index blade, user blade and my timelines blade -->

    @foreach ($timelines as $timeline)
        @include("timeline.partials.timeline")
    @endforeach
</div>
