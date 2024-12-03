<div class = "milestone" data-date="{{ $milestone->date }}">

    <div class="milestone-icon">
        <!-- TODO: replace with more neutral bootrstrap icon ? -->
        <span class="icon">M</span>
    </div>
    <div class=" p-2 bg-white rounded shadow milestone-content milestone-info">
        <h4>{{ $milestone->description }}</h4>
        <p>{{ $milestone->date }}</p>
    </div>
</div>
