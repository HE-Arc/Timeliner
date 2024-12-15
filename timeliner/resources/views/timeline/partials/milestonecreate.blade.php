
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
    </form>
</tr>
