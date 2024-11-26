<form> <!-- action="route("milestone.store")..." -->
    @csrf
    <div class="form-group col-12">
        <div class="form-group col-6">
            <label for="milestoneDate">due date</label>
            <input type="date" name="datePicker" class="form-control" id="milestoneDate">
            <label for="milestoneDesc">Description</label>
            <input type="text" name="Decription" class="form-control" id="milestoneDesc">
        </div>
        <!-- href= route('milestone.create') -->
            <button class="btn btn-primary" type="button" class="btn btn-primary mt-3">Create Milestone</button>
    </div>
</form>
