<form> <!-- action="route("node.store")..." -->
    @csrf
    <div class="form-group ">

        <!-- add node to list -->
         <button id="node-create-button" type="button" class="btn btn-primary mt-3">Add Node</button>

        <div class="col-12">
            <table>
                <tbody id="node-list">
                </tbody>
            </table>
        </div>

        <script>
        </script>
    </div>
</form>
