<form> <!-- action="route("node.store")..." -->
    @csrf
    <div class="form-group col-12">
        <label for="nodeTitle">Node name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="nodeTitle">

        <div class="form-group col-6">
            <div class="row mt-3">
                <!-- add node to list -->
                <button id="node-create-button" type="button" class="btn btn-primary mt-3">Add Node</button>
            </div>

            <div class="row mt-3">
                <div class="form-group col-12">
                    <label for="selectEndDate">add Milestone</label>
                    <button id="milestone-creation-button" type="button" class="btn btn-primary">+</button>
                    <div id="milestone-creation-form" class="row mt-3" style="display: none;">
                        @include('timeline.partials.milestonecreate')
                    </div>
                </div>
            </div>
        </div>
        <div id="test"></div>
        <script>
            addNode("test");
        </script>

        <div class="col-6">
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody id="node-list">
                </tbody>
            </table>
        </div>

        <script>
            // JavaScript to toggle the div visibility
            document.getElementById('milestone-creation-button').addEventListener('click', function() {
                var hiddenForm = document.getElementById('milestone-creation-form');
                hiddenForm.style.display = hiddenForm.style.display === 'none' ? 'block' : 'none';
            });
        </script>
        <script>
            // add element to the list of milestone
            let ni = 0; // node index
            document.getElementById("node-create-button").addEventListener('click', function() {
                // add a milestone to the milestone list

                // declare new row of milestone table
                let tr = document.createElement("tr");
                let td_name_field = document.createElement("td");
                let td_delete = document.createElement("td");

                // set the attribute of the new milestone
                let row_id = "node-" + ni;
                tr.setAttribute("id", row_id);

                // create content of the table
                // create an input for the user to enter the name of the table
                let name_field = document.createElement("input");
                name_field.setAttribute("type", "text");
                name_field.setAttribute("class", "form-control");
                name_field.setAttribute("id", "nodeTitle-" + ni);

                // create delete button
                let delete_button = document.createElement('button');
                let button_id = "node-delete-button-" + ni;
                delete_button.setAttribute("class", "btn btn-primary");
                delete_button.setAttribute("type", "button");
                delete_button.setAttribute("id", button_id);
                delete_button.innerHTML += 'delete';

                // add listener to delete_button
                delete_button.addEventListener('click', function() {
                    document.getElementById(row_id).remove()
                });

                td_name_field.append(name_field)
                td_delete.append(delete_button)

                tr.append(td_name_field)
                tr.append(td_delete)

                document.getElementById('node-list').append(tr);

                ++ni;
            });
        </script>
    </div>
</form>
