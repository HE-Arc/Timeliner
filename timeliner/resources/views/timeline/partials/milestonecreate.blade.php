
<form> <!-- action="route("milestone.store")..." -->
    @csrf
    <div class="form-group col-12">
        <div class="form-group col-6">
            <label for="milestoneDate">due date</label>
            <input type="date" id="milestone-datePicker" name="datePicker" class="form-control" id="milestoneDate">
            <label for="milestoneDesc">Description</label>
            <input type="text" id="milestone-description-field" name="Decription" class="form-control" id="milestoneDesc">
        </div>
        <!-- href= route('milestone.create') -->
            <button class="btn btn-primary" id="milestone-create-button" type="button" class="btn btn-primary mt-3">Create Milestone</button>
    </div>
    <!-- TODO delete milestone -->
    <div id="milestone-list">
        <tr>
            <th>Description</th>
            <th>Date</th>
        </tr>
    </div>

    <div class="form-group col-6">
        <button class="btn btn-primary" id="milestone-delete-button" style="display: none;" type="button" class="btn btn-primary mt-3">delete Milestone</button>
    </div>
    <script>
        // JavaScript to toggle the div visibility
        document.getElementById('milestone-create-button').addEventListener('click', function() {

        });
    </script>
    <script>
        let id = 0;
        document.getElementById("milestone-create-button").addEventListener('click', function() {
            // add a milestone to the milestone list

            // declare new row of milestone table
            let tr = document.createElement("tr");
            let td_date = document.createElement("td");
            let td_desc = document.createElement("td");

            // set the attribute of the new milestone
            //tr.setAttribute("id", "row-" + i);

            let date = document.getElementById('milestone-datePicker').value;
            let description = document.getElementById('milestone-description-field').value;

            td_date.append(date)
            td_desc.append(description)

            tr.append(td_desc)
            tr.append(td_date)

            document.getElementById('milestone-list').append(tr);

            // show delete milestone button
            var hiddenForm = document.getElementById('milestone-delete-button');
            hiddenForm.style.display = 'block';
            });
    </script>
</form>
