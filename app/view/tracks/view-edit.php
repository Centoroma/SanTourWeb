<div class="container">
    <div class="row">
        <form class="col s12" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input id="nameTrack" type="text" class="validate" name="nameTrack" value="<?php echo $track->getName(); ?>">
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
            <button class="btn waves-effect waves-light resa-btn" name="submit" type="submit">Confirme</button>
            <a href="<?php echo ABSURL;?>/tracks" class="btn waves-effect waves-light resa-btn">Cancel</a>
        </form>
    </div>
</div>