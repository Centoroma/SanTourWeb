<div class="container">
    <h2>Modify category</h2>
        <div class="row">
            <form class="col s12" method="post">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="name" type="text" class="validate" name="name" required value="<?php echo $category->getName(); ?> ">
                        <label>POD category</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <a href="<?php echo ABSURL;?>/categories" class="btn waves-effect">CANCEL</a>
                        <button class="btn waves-effect right" name="submitUpdate" type="submit">SAVE</button>
                    </div>
                </div>

            </form>
        </div>
</div>