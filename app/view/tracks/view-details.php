<div class="container">
    <div class="resa-title">
        <h3>Details about the track <i> <?php echo '"' . $track->getName() . '"'; ?></i></h3>
    </div>
    <br/>
    <br/>
    <div class="row">
        <div class="row">
            <div class="col m12 resa-bold-span">
                <div class="row">
                    <div class="col s12 m6 l3">
                        <span>Name :</span>
                        <?php echo $track->getName(); ?>
                    </div>

                </div>
                <div class="row">
                    <div class="col s12 m6 l3">
                        <span>Duration : </span>
                        <?php echo $track->getTimer(); ?>
                    </div>

                </div>
                <div class="row">
                    <div class="col s12 m6 l3">
                        <span>Length :</span>
                        <?php echo $track->getLength(); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12 m6 l3">
                        <span>Coordonnées : </span>

                        <?php
                        $html = "";
                        '<ul>';
                        foreach ($track->getCoordinate() as $coord) {

                            $html .= '
                
                                   <li style="list-style-type: none"><i class="material-icons">location_on</i>' . $coord->getLongitude() . ' / ' . $coord->getLatitude() . '</li>
               
                            ';
                        }

                        echo $html;
                        '</ul>';
                        ?>

                    </div>
                </div>

                <br/>
                <hr>
                <br/>
                <br/>
            </div>
            <div class="col m6">
                <div class="resa-title">
                    <h4>POI List</h4>
                </div>


                <table class="bordered">
                    <thead>
                    <tr>
                        <th>Coordinates</th>
                        <th>Description</th>
                        <th>Name</th>
                        <th>Picture</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $html = "";

                    foreach ($track->getPois() as $poi) {


                        $html .= '
                <tr>
                    <td>' . $poi->getCoordinate()->getLongitude() . ' / ' . $poi->getCoordinate()->getLatitude() . '</td>
                    <td>' . $poi->getDescription() . '</td>
                    <td>' . $poi->getName() . '</td>
                    <td>picture</td>
                   
                </tr>

     ';
                    }

                    echo $html;
                    ?>

                    </tbody>
                </table>
            </div>

            <div class="col m6 vl">

                <div class="resa-title">
                    <h4>POD List</h4>
                </div>

                <table class="bordered">
                    <thead>
                    <tr>
                        <th>Coordinate</th>
                        <th>Description</th>
                        <th>Name</th>
                        <th>Picture</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $html = "";

                    foreach ($track->getPods() as $pod) {


                        $html .= '
                <tr>
                    <td>' . $pod->getCoordinate()->getLongitude() . ' / ' . $pod->getCoordinate()->getLatitude() . '</td>
                    <td>' . $pod->getDescription() . '</td>
                    <td>' . $pod->getName() . '</td>
                    <td>picture</td>
                   
                </tr>

                ';
                    }

                    echo $html;
                    ?>
                    </tbody>
                </table>

            </div>

        </div>

    </div>
</div>


</div>