<html>
<div class="container">

<body>
<div class="login-page">
    <div class="form">
        <form class="login-form col s12" method="POST">
            <div class="row">
                <div class="input-field col s4">
                    <input id="login" name="pseudo" type="text" class="validate" required value="kevin">
                    <label class=active for="login">Username</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <input id="password" name="password" type="password" class="validate" required value="kevin">
                    <label class="active" for="password">Password</label>
                </div>
            </div>
            <button type="submit" name="submit" class="waves-effect waves-light btn btn-large resa-btn">
                <!--<i class="material-icons right">send</i>-->
                Connect
            </button>
            <a href="<?php echo ABSURL; ?>/" class="waves-effect waves-light btn btn-large resa-btn">
                <!--<i class="material-icons right">undo</i>-->
                Back
            </a>

        </form>
    </div>
</div>

<!--Import jQuery before materialize.js-->
<script src="<?php echo ABSURL; ?>/assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo ABSURL; ?>/assets/js/materialize.min.js"></script>
<?php
echo \SanTourWeb\Library\Utils\Toast::displayMessages();
?>
</body>
</div>
</html>