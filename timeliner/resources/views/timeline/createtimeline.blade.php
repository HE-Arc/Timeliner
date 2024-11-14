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
                                <!-- TODO accecpt only people that are in the database -->
                                <!-- TODO accecpt several people  -->
                                <label for="inputStatus">Status (public/private)</label>
                                <select name="private" class="form-control" id="inputStatus">
                                    <option value="1">Private</option>
                                    <option value="0" {{ old('private')? "":"selected" }}>Public</option>
                                </select>
                            </div>
                            <!--
                            <div class="row mt-3">
                                <div class="form-group col-6">
                                    <label for="selectStartDate">Date de départ</label>
                                    <input type="date" name="startDate" value="{{date('d/m/y')}}" class="form-control" id="selectStartDate">
                                </div>
                                <div class="form-group col-6">
                                    <label for="selectEndDate">Date de fin</label>
                                    <input type="date" name="endDate" value="{{date('d/m/y')}}" class="form-control" id="selectEndDate">
                                </div>
                            </div>
                        -->
                            <div class="form-group col-6">
                                <!-- TODO button 'Ajouter' redirect to the detail of the newly created timeline -->
                                <button class="btn btn-primary" href={{ route('timeline.create') }} type="submit" class="btn btn-primary mt-3">Add</button>
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
