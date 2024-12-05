
<!-- TODO : make width be fetched and calculated proportionately -->
<div class="node w-[100%] space-x-4" style="--line-color: {{$node->color}};" data-milestones="{{$node->milestones}}">
    <div class="p-4 w-[100px] rounded" style="background-color: {{$node->color}}">{{$node->name}}</div>

    <div class="milestones-container" data-min-date="{{ $node->milestones->min('date') }}" data-max-date="{{ $node->milestones->max('date') }}">

    @foreach($node->milestones as $milestone)
            @include("timeline.partials.milestone", ["milestone"=>$milestone])
    @endforeach

    </div>
</div>
