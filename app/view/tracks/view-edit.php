<div class="container">
    <h2>Modify track</h2>
    <div class="row">
        <form class="col s12" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input id="nameTrack" type="text" class="validate" required name="nameTrack" value="<?php echo $track->getName(); ?>">
                    <label for="last_name">track's Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="duration" type="text" class="validate" name="duration" value="<?php echo $track->getTimer(); ?>" disabled>
                    <label>Duration</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="kilometers" type="text" class="validate" name="km" value="<?php echo $track->getLength(); ?>" disabled>
                    <label>Kilometers</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <a href="<?php echo ABSURL;?>/tracks" class="btn waves-effect">CANCEL</a>
                    <button class="btn waves-effect right" name="submitUpdate" type="submit">SAVE</button>
                </div>
            </div>


        </form>
    </div>
</div>