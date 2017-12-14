<div class="container">
    <div class="row">
        <form class="col s12" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input id="name" type="text" class="validate" name="name" value="<?php echo $category->getName(); ?>">
                    <label>POD category</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light resa-btn" name="submitUpdate" type="submit">Confirme</button>
            <a href="<?php echo ABSURL;?>/categories" class="btn waves-effect waves-light resa-btn">Cancel</a>
        </form>
    </div>
</div>