<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit timeline ') . $timeline->name }}
        </h2>
    </x-slot>

    <form action="{{ route("timeline.update", $timeline->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12 col-lg-6 offset-0 offset-lg-3">
                <div class="card">
                    <div class="card-header">
                    Edit timeline
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="inputTitle">Name</label>
                                <input type="text" name="name" value="{{ $timeline->name }}" class="form-control" id="inputTitle">
                            </div>

                            <!-- TODO accecpt several people as owners (fields for adding owners) -->

                            <div class="form-group col-12">
                                <label for="inputDescription">Description</label>
                                <input type="text" name="description" value="{{ $timeline->description }}" class="form-control" id="inputDescription">
                            </div>
                            <div class="form-group col-12">
                                <div class="row mt-3">
                                </div>

                            </div>
                            <div id="node-edit-form" class="form-group col-12">
                                @include('timeline.partials.nodeedit', ['nodes' => $nodes])
                            </div>

                            <div class="form-group col-12">
                                <label for="accesibility">Status (public/private)</label>
                                <input id="accesibility" name="private" type="checkbox" data-toggle="toggle" data-offstyle="secondary" data-on="Public" data-off="Private" data-width="90"{{ $timeline->private ? '' : 'checked' }}>
                            </div>

                            <div class="form-group col-6">
                                <a href="{{ route('timeline.show', $timeline->id) }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-90deg-left"></i> Back</a>

                                <button class="btn btn-success mt-3" type="submit"><i class="bi bi-check2"></i> Confirm</button>
                            </div>
                            <div class="form-group col-6"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>