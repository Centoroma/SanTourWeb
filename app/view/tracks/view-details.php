<div class="container">
    <div class="row">
        <div class="resa-title">
            <div class="col s8">
                <h2>Details about the track <i> <?php echo '"' . $track->getName() . '"'; ?></i></h2>
            </div>
            <div class="col s4">
                <!-- waves-effect waves-light btn resa-btn -->
                <a href="<?php echo ABSURL; ?>/tracks/export?id=<?php echo $track->getId(); ?>"
                   class="waves-effect waves-light btn resa-btn">export</a>
            </div>
        </div>
    </div>
    <br/>
    <br/>

    <div class="row">
        <div class="col s12 resa-bold-span">
            <div class="row icon-align">
                <div class="col s4 ">
                    <i class="material-icons small">explore</i>
                    <?php echo $track->getName(); ?>
                </div>

                <div class="col s4">
                    <i class="material-icons small">alarm</i>
                    <?php echo round(($track->getTimer() / 1000) / 60, 2); ?>
                </div>

                <div class="col s4 ">
                    <i class="material-icons small">directions_walk</i>
                    <?php echo $track->getLength(); ?> km
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col m12">
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

                        zoom: 13,
                        center: mapFocus
                    });


                    console.log(coordinates);

                    function pinSymbol(color) {
                        return {
                            path: 'M 0,0 C -2,-20 -10,-22 -10,-30 A 10,10 0 1,1 10,-30 C 10,-22 2,-20 0,0 z M -2,-30 a 2,2 0 1,1 4,0 2,2 0 1,1 -4,0',
                            fillColor: color,
                            fillOpacity: 1,
                            strokeColor: '#000',
                            strokeWeight: 1,
                            scale: 0.8
                        };
                    }

                    for (var i = 0; i < poiCoord.length; i++) {
                        var mark = new google.maps.Marker({
                            position: poiCoord[i],
                            map: map,
                            icon: pinSymbol("#ffff00")

                        });
                    }

                    for (var i = 0; i < podCoord.length; i++) {
                        var mark = new google.maps.Marker({
                            position: podCoord[i],
                            map: map,
                            icon: pinSymbol("#ff0000")

                        });
                    }


                    var markerDebut = new google.maps.Marker({
                        position: coordinates[0],
                        map: map,
                        icon: pinSymbol("#66ff33")

                    });

                    var markerFin = new google.maps.Marker({
                        position: coordinates[coordinates.length - 1],
                        map: map,
                        icon: pinSymbol("#808080")

                    });


                    var flightPath = new google.maps.Polyline({
                        path: coordinates,
                        geodesic: true,
                        strokeColor: '#4245f4',
                        strokeOpacity: 10.0,
                        strokeWeight: 4
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
        <div class="col m6 vl">
            <div class="resa-title">
                <h4>POI List</h4>
            </div>


            <table class="bordered highlight">
                <thead>
                <tr>
                    <th>GPS</th>
                    <th>DESCRIPTION</th>
                    <th>NAME</th>
                    <th>PHOTO</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $html = "";
                $i = 0;
                foreach ($track->getPois() as $poi) {


                    $html .= '
                <tr>
                    <td>' . round($poi->getCoordinate()->getLongitude(),2) . ' / ' . round($poi->getCoordinate()->getLatitude(),2) . '</td>
                    <td>' . $poi->getDescription() . '</td>
                    <td style="width: 100px;">' . $poi->getName() . '</td> 
                    <td><img src="https://firebasestorage.googleapis.com/v0/b/santour-75cf5.appspot.com/o/images%2F' . $track->getId() . '%2FPOI%2Fpicture' . $i . '.jpg?alt=media" height="130px" width="130px"></td>
                              <!--https://firebasestorage.googleapis.com/v0/b/santour-75cf5.appspot.com/o/images%2F-L0yi3Z5sqLAfhhpHWXv%2FPOI%2Fpicture0.jpg?alt=media--> 
                    
            
                </tr>


     ';


                    $i++;


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

            <table class="bordered highlight ">
                <thead>
                <tr>
                    <th>GPS</th>
                    <th style="text-align: center">TYPE</th>
                    <th>DESCRIPTION</th>
                    <th>NAME</th>
                    <th>PHOTO</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $html = "";
                $d = 0;


                foreach ($track->getPods() as $pod) {

                    $html .= '
                    <tr>
                        <td style="width: 150px;">' . round($pod->getCoordinate()->getLongitude(),2) . ' / ' . round($pod->getCoordinate()->getLatitude(),2) . '</td><td style="text-align: center">';

                        foreach ($pod->getDifficulty() as $di) {
                            $html .=  $di->getName() .'<br/>';
                        }
                        $html .= '
                        </td>
                        <td style="text-align: center">' . $pod->getDescription() . '</td>
                        <td style="width: 100px;">' . $pod->getName() . '</td>
                        <td><img src="https://firebasestorage.googleapis.com/v0/b/santour-75cf5.appspot.com/o/images%2F' . $track->getId() . '%2FPOD%2Fpicture' . $d . '.jpg?alt=media" height="130px" width="130px"></td>
           
                    </tr>

                ';
                    $d++;
                }

                echo $html;
                ?>
                </tbody>
            </table>

        </div>

    </div>


</div>


</div>