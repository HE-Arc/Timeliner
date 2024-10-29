@extends('layouts.app')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <!-- TODO fix route('timeline.fetchAllAvailable') -->
        <a class="btn btn-primary" href= "TODO"> Retour</a>
    </div>
</div>


<!-- TODO fixe timeline.store -->
<form action="{{ route("timeline.store") }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-12 col-lg-6 offset-0 offset-lg-3">
            <div class="card">
                <div class="card-header">
                Nouveau livre
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="inputTitle">Titre</label>
                            <input type="text" name="title" class="form-control" id="inputTitle">
                        </div>
                        <div class="form-group col-12">
                            <!-- TODO accecpt only people that are in the database -->
                            <!-- TODO accecpt several people  -->
                            <label for="inputOwner">Propriétaire</label>
                            <input type="text" name="title" class="form-control" id="inputOwner">
                        </div>
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
                        <div class="form-group col-6">
                            <!-- TODO button 'Ajouter' redirect to the detail of the newly created timeline -->
                            <button class="btn btn-primary" href={{ route('timeline.create') }} type="submit" class="btn btn-primary mt-3">Ajouter</button>
                        </div>
                    </div>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger mt-3 col-12">
                <strong>Whoops!</strong> Il y a un problème avec vos entrées.<br><br>
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
@endsection
