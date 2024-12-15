
<tr> <!-- action="route("milestone.store")..." -->
    <form>
        @csrf
        <!-- label for=""milestone-datePicker">due date</label TODO put in <th> -->
        <td>
            <input type="date" id="milestone-datePicker" name="datePicker" class="form-control">
        </td>
        <!-- label for="milestone-description-field">Description</label -->
        <td>
            <input type="text" id="milestone-description-field" name="Decription" class="form-control">
        </td>

        <!-- div class="col-12">
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody id="milestone-list">
                </tbody>
            </table>
        </div -->
    </form>
    <!-- script language="javascript">
        // add element to the list of milestone
        let i = 0; // milestone index
        document.getElementById("milestone-create-button").addEventListener('click', function() {
                // add a milestone to the milestone list

            // declare new row of milestone table
            let tr = document.createElement("tr");
            let td_date = document.createElement("td");
            let td_desc = document.createElement("td");
            let td_delete = document.createElement("td");

            // set the attribute of the new milestone
            let row_id = "milestone-" + i;
            tr.setAttribute("id", row_id);

            // create content of the table --------------- \\

            // create fields for the user to enter the milestone values
            // <input type="date" id="milestone-datePicker" name="datePicker" class="form-control" id="milestoneDate">
            let date = document.getElementById('milestone-datePicker').value;
            let description = document.getElementById('milestone-description-field').value;

            // create delete button
            let delete_button = document.createElement('button');
            let button_id = "milestone-delete-button-" + i;
            delete_button.setAttribute("type", "button");
            delete_button.setAttribute("class", "btn btn-primary mt-2");
            delete_button.setAttribute("id", button_id);
            delete_button.innerHTML += 'delete';

            // add listener to delete_button
            delete_button.addEventListener('click', function() {
                document.getElementById(row_id).remove()
            });

            td_date.append(date)
            td_desc.append(description)
            td_delete.append(delete_button)

            tr.append(td_desc)
            tr.append(td_date)
            tr.append(td_delete)

            document.getElementById('milestone-list').append(tr);

            ++i;
        });
    </script -->
</tr>
