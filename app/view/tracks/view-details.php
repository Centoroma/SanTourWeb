<div class="container">
    <div class="resa-title">
        <h5>Details about the track
            <?php echo '"' . $track->getName() . '"'; ?></h5>
    </div>
    <div class="row">
        <div class="row">
            <div class="col s12 resa-bold-span">
                <div class="row">
                     <div class="col s12 m6 l3">
                          <span>Name : </span><?php echo $track->getName(); ?>
                     </div>
                      <div class="col s12 m6 l3">
                          <span>Duration : </span><?php echo $track->getTimer(); ?>
                      </div>
                      <div class="col s12 m6 l3">
                           <span>Length : </span><?php echo $track->getLength(); ?>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>