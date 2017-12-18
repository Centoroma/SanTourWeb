<div class="container">
    <div class="resa-title">
        <h3>Details about the track <i> <?php echo '"' . $track->getName() . '"'; ?></i></h3>
    </div>
    <br/>
    <br/>

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
        </div>
    </div>

    <div class="row">
        <div class="col m2">

            <h5>Coordonnées : </h5>

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

        <div class="col m10">
            <!DOCTYPE html>


            <html>
            <head>
                <style>
                    #map {
                        height: 400px;
                        width: 100%;
                    }
                </style>
            </head>
            <body>

            <div id="map"></div>
            <script>
                function initMap() {

                    var podCoord = [

                        <?php  foreach ($track->getPods() as $pod) {

                        echo '{lat:' . $pod->getCoordinate()->getLatitude() . ', lng:' . $pod->getCoordinate()->getLongitude() . '},';
                    }      ?>

                    ];

                    console.log(podCoord);

                    var poiCoord = [

                        <?php  foreach ($track->getPois() as $poi) {

                        echo '{lat:' . $poi->getCoordinate()->getLatitude() . ', lng:' . $poi->getCoordinate()->getLongitude() . '},';
                    }      ?>

                    ];

                    console.log(poiCoord);


                    var coordinates = [
                        <?php foreach ($track->getCoordinate() as $coord) {
                        echo '{lat:' . $coord->getLatitude() . ', lng:' . $coord->getLongitude() . '},';
                    } ?>

                    ];


                    var mapFocus = coordinates[0];

                    var map = new google.maps.Map(document.getElementById('map'), {

                        zoom: 16,
                        center: mapFocus
                    });


                    console.log(coordinates);

                    for (var i = 0; i < poiCoord.length; i++) {
                        var mark = new google.maps.Marker({
                            position: poiCoord[i],
                            map: map

                        });
                    }

                    for (var i = 0; i < podCoord.length; i++) {
                        var mark = new google.maps.Marker({
                            position: podCoord[i],
                            map: map

                        });
                    }


                    var markerDebut = new google.maps.Marker({
                        position: coordinates[0],
                        map: map

                    });

                    var markerFin = new google.maps.Marker({
                        position: coordinates[coordinates.length - 1],
                        map: map

                    });


                    var flightPath = new google.maps.Polyline({
                        path: coordinates,
                        geodesic: true,
                        strokeColor: '#4245f4',
                        strokeOpacity: 10.0,
                        strokeWeight: 8
                    });

                    flightPath.setMap(map);

                }
            </script>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDy8PTk9AjlPiRUnx8imS4R0hbWrYdPtbQ&callback=initMap">
            </script>
            </body>
            </html>
        </div>
    </div>

    <br/>
    <hr>


    <div class="row">
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