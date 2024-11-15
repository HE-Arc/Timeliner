<form> <!-- action="route("node.store")..." -->
    @csrf
    <div class="form-group col-12">
        <label for="nodeTitle">Node name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="nodeTitle">
        <div class="row mt-3">
            <div class="form-group col-6">
                <label for="selectEndDate">add Milestone</label>
                <button class="btn btn-primary" type="button" class="btn btn-primary mt-3">+</button>
            </div>
        </div>
        <!-- href= route('node.create') -->
        <button class="btn btn-primary" type="submit" class="btn btn-primary mt-3">Add Node</button>
    </div>
</form>

