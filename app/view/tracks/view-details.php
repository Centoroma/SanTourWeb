<div class="container">
    <div class="resa-title">
        <h3>Details about the track <?php echo '"' . $track->getName() . '"'; ?></h3>
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
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Coordintates</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>Cathédrale de Marmoud</td>
                    <td>Lieu de prière très connu par Audrey</td>
                    <td><img src="/SanTourWeb/assets/images/cathe.jpg" width="150" height="130"></td>
                    <td>x : 12 , y : 65</td>
                </tr>



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
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Coordintates</th>
                    <th>Difficulty</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td >Cathédrale de Marmoud</td>
                    <td>Lieu de prière très connu par Audrey</td>
                    <td><img src="/SanTourWeb/assets/images/caillou.jpg" width="150" height="130"></td>
                    <td>x_434 ; y_112</td>
                    <td>high</td>
                </tr>
                </tbody>
            </table>

            </div>

        </div>

    </div>
</div>


</div>