<div class="container">
    <div class="resa-title">
        <h5 class="l6 s12">List of tracks</h5>
        <!--
        <form class="col l6 s12 resa-btn-title " method="post">
            <div class="input-field inline" id="resa-add-zone">
                <input id="name" maxlength="50" type="text" name="name" class="validate" required>
                <label for="name">Name od the track</label>
            </div>

            <button class="waves-effect waves-light btn btn-large resa-btn inline" type="submit"
                    name="submit">Add a new track
            </button>

        </form>
        -->
    </div>
    <table class="resa-table striped" id="resa-table-zone">
        <thead>
        <tr>
            <th>Name</th>
            <th>Duration</th>
            <th>Km</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $html = "";
        foreach ($tracks as $track) {
            $actions = '
            <a href="#btn-showZone-' . $track['id'] . '" id="btn-showZone-' . $track['id'] . '" class="waves-effect waves-light btn tooltipped resa-btn" data-tooltip="Détails">
                <i class="large material-icons">info_outline</i>
            </a>
            <!-- Modal Trigger EDIT -->
            <!-- Change the page -->
            <a href="#modalEdit' . $track['id'] . '" class="waves-effect waves-light btn tooltipped modal-trigger resa-btn" data-tooltip="Editer">
                <i class="large material-icons">edit</i>
            </a>
            
            <!-- Modal Structure EDIT -->
            <div id="modalEdit' . $track['id'] . '" class="modal">s
                <form method="post">
                    <div class="modal-content">
                        <h4>'.__("Edit the zone", true).' : ' . $track['name'] . '</h4>
                        <div class="input-field col s4">
                            <input type="hidden" name="editId" value="' . $track['id'] . '">
                            <input id="input-editZone" name="editName" type="text" class="validate" required>
                            <label for="input-EditZone">New track name</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="modal-action waves-effect waves-green btn-flat" type="submit" name="submitEdit">Update</button>
                        <a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                    </div>
                </form>
            </div>
            
            <!-- Modal Trigger DELETE -->
            <a class="waves-effect waves-light btn tooltipped modal-trigger resa-btn" data-tooltip="Supprimer" href="#modalDelete' . $track['id'] . '">
                <i class="large material-icons">delete</i>
            </a>                

            <!-- Modal Structure DELETE -->
            <div id="modalDelete' . $track['id'] . '" class="modal">
                <div class="modal-content">
                    <h4>Delete the track '. $track['name'] . '</h4>
                    <p>Do you really want to delete this zone ? All its POI-POD will be deleted aswell"</p>
                </div>
                <div class="modal-footer">
                    <a href="/resabike/zones/delete?id=' . $track['id'] . '" class="modal-action modal-close waves-effect waves-green btn-flat">Confirm</a>
                    <a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                </div>
            </div>
            
            <!-- Show details -->
            <script>
                $(document).ready(function() {
                    $("#btn-showZone-' . $track['id'] . '").click(function() {
                        $("#staggered-zone-' . $track['id'] . '").toggle();
                    });
                });
            </script>';

            $html .= '
            <tr>
                <td>' . $track['name'] . '</td>
                <td>' . $actions . '</td>
            </tr>
            <tr id="staggered-zone-' . $track['id'] . '">
                <td colspan="2" class="zone-details-td">
                <table>
                    <thead>
                    <tr>
                        <th>Info1</th>
                        <th>Info2</th>
                        <th>info3</th>
                    </tr>
                    </thead>
                    <tbody>
            ';
            $i = 0;
            foreach ($lines[$zone['id']] as $line) {
                $html .= '
                    <tr class="tr-not-resize">
                        <td>' . $line['lineNumber'] . '</td>
                        <td>' . $line['startStation'] . '</td>
                        <td>' . $line['endStation'] . '</td>
                    </tr>
                ';
            }
            $html .= '
                    </tbody>
                </table>
                </td>
            </tr>';
        }
        echo $html;
        ?>
        </tbody>
    </table>
</div>