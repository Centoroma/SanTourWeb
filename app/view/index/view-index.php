
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="/resabike/assets/css/icon.css" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="/resabike/assets/css/materialize.min.css" media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="/resabike/assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="/resabike/assets/css/login.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<div class="login-page">
    <div class="form">
        <form class="login-form col s12" method="POST">
            <div class="row">
                <div class="input-field col s12">
                    <input id="login" name="pseudo" type="text" class="validate">
                    <label class=active for="login">Username</label>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name="password" type="password" class="validate">
                        <label class="active" for="password">Password</label>
                    </div>
                </div>
                <a href="/resabike/" class="waves-effect waves-light btn btn-large resa-btn">
                    <!--<i class="material-icons right">undo</i>-->
                    Back
                </a>
                <button type="submit" name="submit" class="waves-effect waves-light btn btn-large resa-btn">
                    <!--<i class="material-icons right">send</i>-->
                    Enter
                </button>
            </div>
        </form>
    </div>
</div>

<!--Import jQuery before materialize.js-->
<script src="/resabike/assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/resabike/assets/js/materialize.min.js"></script>
<?php
echo \ResaBike\Library\Utils\Toast::displayMessages();
?>
</body>
</html>