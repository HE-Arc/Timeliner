<form> <!-- action="route("node.store")..." -->
    @csrf
    <div class="form-group col-12">
        <label for="nodeTitle">Node name</label>
        <input type="text" name="node_name" value="{{ old('name') }}" class="form-control" id="nodeTitle">
        <div class="row mt-3">
            <div class="form-group col-6">
                <label for="selectEndDate">add Milestone</label>
                <button class="btn btn-primary" id="milestone-creation-button" type="button" class="btn btn-primary mt-3">+</button>
            </div>
        </div>
        <div id="milestone-creation-form" style="display: none;">
            @include('timeline.partials.milestonecreate')
        </div>
        <script>
            // JavaScript to toggle the div visibility
            document.getElementById('milestone-creation-button').addEventListener('click', function() {
                var hiddenForm = document.getElementById('milestone-creation-form');
                hiddenForm.style.display = hiddenForm.style.display === 'none' ? 'block' : 'none';
            });
        </script>
        <!-- href= route('node.create') -->
        <button class="btn btn-primary" type="submit" class="btn btn-primary mt-3">Add Node</button>
    </div>
</form>
