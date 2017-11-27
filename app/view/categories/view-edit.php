<div class="container">
    <div class="row">
        <form class="col s12" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input id="name" type="text" class="validate" name="name" value="Rocks">
                    <label>POD category</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="type" type="text" class="validate" name="type" value="graduation">
                    <label>type</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="degree" type="text" class="validate" name="degree" value="12">
                    <label>degree</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light resa-btn" name="submit" type="submit">Confirme</button>
            <a href="<?php echo ABSURL;?>/categories" class="btn waves-effect waves-light resa-btn">Cancel</a>
        </form>
    </div>
</div>