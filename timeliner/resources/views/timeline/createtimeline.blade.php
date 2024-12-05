

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create timeline') }}
        </h2>
    </x-slot>

<!-- TODO fixe timeline.store -->
    <form action="{{ route("timeline.store") }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-12 col-lg-6 offset-0 offset-lg-3">
                <div class="card">
                    <div class="card-header">
                    New timeline
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="inputTitle">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="inputTitle">
                            </div>
                            <div class="form-group col-12">
                                <!-- TODO accecpt only people that are in the database -->
                                <!-- TODO accecpt several people  -->
                                <label for="inputDescription">Description</label>
                                <input type="text" name="description" value="{{ old('description') }}" class="form-control" id="inputDescription">
                            </div>
                            <div class="form-group col-12">
                                <div class="row mt-3">
                                    <div class="form-group col-6">
                                        <label for="node-creation-button">add node</label>
                                        <button class="btn btn-primary" name="node-creation-button" id="node-creation-button" type="button" class="btn btn-primary mt-3">+</button>
                                    </div>
                                </div>
                                <div id="node-creation-form" style="display: none;">
                                    @include('timeline.partials.nodecreate')
                                </div>
                                <script>
                                    // JavaScript to toggle the div visibility
                                    document.getElementById('node-creation-button').addEventListener('click', function() {
                                        let hiddenForm = document.getElementById('node-creation-form');
                                        hiddenForm.style.display = hiddenForm.style.display === 'none' ? 'block' : 'none';
                                    });
                                </script>
                            </div>

                            <div class="form-group col-12">
                                <label for="accesibility">Status (public/private)</label>
                                <input id="accesibility" name="private" type="checkbox" checked data-toggle="toggle" data-offstyle="secondary" data-on="Public" data-off="Private" data-width="90">
                                <!-- the following hidden field converts the checkbox 'accesibility' value to boolean -->
                                <input type="hidden" id="toBoolean-field" value/>
                                <!-- script>
                                    $('accesibility').change(function() {
                                        document.getElementById('toBoolean-field') = document.getElementById('accesibility').checked;
                                    })
                                </script -->
                            </div>

                            <div class="form-group col-6">
                                <button class="btn btn-primary" href={{ route('timeline.create') }} type="submit" class="btn btn-primary mt-3">Add</button>
                            </div>
                            <div class="form-group col-6">
                            </div>
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                <div class="alert alert-danger mt-3 col-12">
                    <strong>Oops!</strong> There's a problem with your entries.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
        </div>
    </form>


</x-app-layout>


