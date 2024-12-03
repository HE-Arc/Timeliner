
<!-- TODO : make width be fetched and calculated proportionately -->
<div class="node w-[100%] flex space-x-4" style="--line-color: {{$node->color}};" data-milestones="{{$node->milestones}}">
    <div class="p-4 w-[100px] rounded" style="background-color: {{$node->color}}">{{$node->name}}</div>
    <!-- TODO : make milestones evenly distributed over the node and aligned -->
    <div class="milestones-container flex" data-min-date="{{ $node->milestones->min('date') }}" data-max-date="{{ $node->milestones->max('date') }}">

    @foreach($node->milestones as $milestone)
            @include("timeline.partials.milestone", ["milestone"=>$milestone])
    @endforeach

    </div>
</div>
