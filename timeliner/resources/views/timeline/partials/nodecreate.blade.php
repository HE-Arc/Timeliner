
@csrf
    <div class="form-group ">


        <h3>Nodes</h3>

        <div class="col-12">
            <table>
                <div id="node-list">
                    <table>
                        <tbody id="node-list-body">
                            @php
                                $oldNodes = old('nodes', []);
                                $lastNodeIndex = count($oldNodes) > 0 ? max(array_keys($oldNodes)) + 1 : 0;
                                $nodeMilestoneCounts = [];
                                foreach ($oldNodes as $nodeIndex => $node) {
                                    $nodeMilestoneCounts[$nodeIndex] = count($node['milestones'] ?? []);
                                }
                            @endphp
                            <script>
                                window.ni = {{ $lastNodeIndex }}; // Set global variable
                                window.nodeMilestoneCounts = @json($nodeMilestoneCounts);
                            </script>

                            @foreach ($oldNodes as $nodeIndex => $node)
                                <tr id="node-{{ $nodeIndex }}" class="form-row mt-3" data-index="{{ $nodeIndex }}">
                                    <td>
                                        <label for="nodeTitle-{{ $nodeIndex }}">Description</label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="nodeTitle-{{ $nodeIndex }}"
                                            name="nodes[{{ $nodeIndex }}][name]"
                                            value="{{ $node['name'] ?? '' }}">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary bi bi-calendar-plus"
                                                onclick="addMilestone('ms-list-{{ $nodeIndex }}', {{ $nodeIndex }}, {{ $nodeMilestoneCounts[$nodeIndex] ?? 0 }});">
                                             create milestone
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger bi bi-trash"
                                                onclick="document.getElementById('node-{{ $nodeIndex }}').remove();">
                                             delete
                                        </button>
                                    </td>
                                </tr>

                                <tr id="ms-table-{{ $nodeIndex }}">
                                    <td colspan="4">
                                        <table>
                                            <tbody id="ms-list-{{ $nodeIndex }}">
                                                @foreach ($node['milestones'] ?? [] as $milestoneIndex => $milestone)
                                                    <tr id="ms-{{ $nodeIndex }}-{{ $milestoneIndex }}">
                                                        <td>
                                                            <label>Milestone for Node {{ $nodeIndex }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control"
                                                                name="nodes[{{ $nodeIndex }}][milestones][{{ $milestoneIndex }}][date]"
                                                                value="{{ $milestone['date'] ?? '' }}">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="nodes[{{ $nodeIndex }}][milestones][{{ $milestoneIndex }}][description]"
                                                                value="{{ $milestone['description'] ?? '' }}">
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger danger bi bi-trash"
                                                                    onclick="document.getElementById('ms-{{ $nodeIndex }}-{{ $milestoneIndex }}').remove();">
                                                                 delete
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </table>

            <button id="node-create-button" type="button" class="btn btn-primary mt-3 bi bi-node-plus"> Add Node</button>

        </div>
    </div>
