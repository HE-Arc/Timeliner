/*
Author: Brandt Mael
*/


let ni = window.ni || 0; // use global ni if set, else defaults to 0
let mi = 0; // milestone index

window.addMilestone = addMilestone; // makes the function available to the global scope

//add a row to a list of milestone creation form
function addMilestone(milestone_list_id, nodeIndex, nodeMilestoneCount) {
    const ms_id = `ms-${nodeIndex}-${nodeMilestoneCount}` // the id of the milestone depend of it's parent node

    // declare the component of the row
    let tr_ms = document.createElement("tr");
    tr_ms.setAttribute("id", ms_id);

    let td_label = document.createElement("td");
    let td_date = document.createElement("td");
    let td_desc = document.createElement("td");
    let td_delete = document.createElement("td");
    let ms_label = document.createElement("label");
    let date_input = document.createElement("input");
    let desc_input = document.createElement("input");

    // set attribute of ms_label
    ms_label.setAttribute("for", ms_id);
    ms_label.innerHTML += `Milestone for Node ${nodeIndex}`;

    // set attribute of the date_input
    date_input.setAttribute("type", "date");
    date_input.setAttribute("id", `milestone-datePicker-${nodeIndex}-${mi}`);
    //date_input.setAttribute("name", "datePicker");
    date_input.setAttribute("name", `nodes[${nodeIndex}][milestones][${nodeMilestoneCount}][date]`);
    date_input.setAttribute("class", "form-control");

    // set attribute of the desc_input
    desc_input.setAttribute("type", "text");
    desc_input.setAttribute("id", `milestone-description--${nodeIndex}-${mi}`);
    //desc_input.setAttribute("name", "description");
    desc_input.setAttribute("name", `nodes[${nodeIndex}][milestones][${nodeMilestoneCount}][description]`);
    desc_input.setAttribute("class", "form-control");

    // create delete button
    let delete_button = document.createElement('button');
    let delete_button_id = "ms-delete-button-" + mi;
    delete_button.setAttribute("class", "btn btn-danger bi bi-trash");
    delete_button.setAttribute("type", "button");
    delete_button.setAttribute("id", delete_button_id);
    delete_button.innerHTML += ' delete';

    // add listener to delete_button
    delete_button.addEventListener('click', function() {
        document.getElementById(ms_id).remove()
    });

    // insertion of the fields in the row
    td_label.append(ms_label);
    td_date.append(date_input);
    td_desc.append(desc_input);
    td_delete.append(delete_button);

    tr_ms.append(td_label);
    tr_ms.append(td_date);
    tr_ms.append(td_desc);
    tr_ms.append(td_delete);

    let ms_list = document.getElementById(milestone_list_id);
    if (!Object.is(ms_list, null)) {
        ms_list.append(tr_ms);
    }

    ++mi;
}

// add element to the list of milestone
const nodeCreateButton = document.getElementById("node-create-button");
if (nodeCreateButton) {
    nodeCreateButton.addEventListener('click', function() {

    // recover the node table
    let node_table = document.getElementById('node-list-body');

    // declare new row of milestone table
    let tr_node_form = document.createElement("tr"); // row holding the node form
    let tr_milestone_table = document.createElement("tr"); // row holding the milestone table

    let td_label = document.createElement("td");
    let td_name_field = document.createElement("td");
    let td_add_milestone = document.createElement("td");
    let td_delete = document.createElement("td");

    // set the attributes of the new row
    let row_id = "node-" + ni;
    let ms_table_id = "ms-table-" + ni;
    tr_node_form.setAttribute("id", row_id);
    tr_node_form.setAttribute("class", "form-row mt-3");
    tr_milestone_table.setAttribute("id", ms_table_id);
    tr_milestone_table.setAttribute("class", "form-group col-9");


    // create content of the table
    // create an input for the user to enter the name of the table
    let name_field = document.createElement("input");
    let name_field_ID = "nodeTitle-" + ni;
    name_field.setAttribute("type", "text");
    name_field.setAttribute("class", "form-control");
    name_field.setAttribute("id", name_field_ID);
    name_field.setAttribute("name", `nodes[${ni}][name]`); // Assign the correct name attribute for form submission


    // create label for the input
    // <label for="inputDescription">Description</label>
    let desc_label = document.createElement("label");
    desc_label.setAttribute("for", name_field_ID);
    desc_label.innerHTML += "Description";

    // create milestone table
    let milestone_list_id = "ms-list-" + ni;

    let ms_table = document.createElement("table");
    let ms_table_head  = document.createElement("thead");
    ms_table_head.setAttribute("class", "row mt-3");
    let ms_table_body = document.createElement("tbody");
    ms_table_body.setAttribute("id", milestone_list_id);

    ms_table.append(ms_table_head);
    ms_table.append(ms_table_body);

    // create 'add milestone' button
    let add_milestone_button = document.createElement('button');
    let milestone_create_button_id = "milestone-create-button-" + ni;
    add_milestone_button.setAttribute("class", "btn btn-primary bi bi-calendar-plus");
    add_milestone_button.setAttribute("type", "button");
    add_milestone_button.setAttribute("id", milestone_create_button_id);
    add_milestone_button.innerHTML += ' create milestone';

    let current_ni_number = ni;
    let nodeMilestoneCount = 0;

    // add listener to 'add milestone'
    add_milestone_button.addEventListener('click', function() {
        addMilestone(milestone_list_id, current_ni_number, nodeMilestoneCount++);
    });

    // create delete button
    let delete_button = document.createElement('button');
    let delete_button_id = "node-delete-button-" + ni;
    delete_button.setAttribute("class", "btn btn-danger bi bi-trash ");
    delete_button.setAttribute("type", "button");
    delete_button.setAttribute("id", delete_button_id);
    delete_button.innerHTML += ' delete';

    // add listener to delete_button
    delete_button.addEventListener('click', function() {
        document.getElementById(row_id).remove()
        document.getElementById(ms_table_id).remove()
    });

    // add element to field
    td_label.append(desc_label);
    td_name_field.append(name_field);
    td_add_milestone.append(add_milestone_button);
    td_delete.append(delete_button);

    // add field to row
    tr_node_form.append(td_label);
    tr_node_form.append(td_name_field);
    tr_node_form.append(td_add_milestone);
    tr_node_form.append(td_delete);

    // add milestone list to row
    tr_milestone_table.append(ms_table)

    // add row to the table
    node_table.append(tr_node_form);
    node_table.append(tr_milestone_table);
    ++ni;
})
};
