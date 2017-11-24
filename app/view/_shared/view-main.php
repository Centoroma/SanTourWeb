<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/santourweb/assets/css/materialize.css" rel="stylesheet" media="screen,projection"/>
    <link href="/santourweb/assets/css/styles.css" rel="stylesheet" media="screen,projection"/>

    <!--  Scripts-->
    <script src="/santourweb/assets/js/jquery-3.2.1.min.js"></script>
    <script src="/santourweb/assets/js/materialize.js"></script>
    <script type="text/javascript" src="/santourweb/library/php/traduction.php"></script>
    <script src="/santourweb/assets/js/santourjs.js"></script>
</head>
<body>
<header>
    <div class="navbar-fixed">
        <nav class="teal lighten-2">
            <div class="nav-wrapper container">
                <span class="brand-logo">SanTour</span>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <?php
                    $act = $this->currentAction;

                    echo '<li ';
                    if ($act == 'index') {
                        echo '';
                    }
                    echo '><a href="/santourweb/tracks">Tracks</a></li>';

                    echo '<li ';
                    if ($act == 'index') {
                        echo '';
                    }
                    echo '><a href="/santourweb/Categories">Categories</a></li>';

                    echo '<li ';
                    if ($act == 'index') {
                        echo '';
                    }
                    echo '><a href="">About</a></li>';




                    echo '<li ';
                    ?>
                </ul>
            </div>
        </nav>
    </div>
</header>
<main>
    <?php echo $html; ?>
</main>
<footer class="page-footer teal lighten-6">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Who are we ?</h5>
                <p class="grey-text text-lighten-4">
                    We are five students of the HES-SO in Sierre.
                    As part of our project course, we were asked to propose a new platform
                    for SanTour.
                </p>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Languages</h5>
                <ul>
                    <?php
                    $ctr = $this->currentController;
                    $act = $this->currentAction;

                    if ($_SESSION['lang'] == 'de')
                        echo '<li class="resa-disabled">German</li>';
                    else
                        echo '<li><a class="white-text" href="/resabike/language?lang=de">German</a></li>';
                    if ($_SESSION['lang'] == 'en')
                        echo '<li class="resa-disabled">English</li>';
                    else
                        echo '<li><a class="white-text" href="/resabike/language?lang=en">English</a></li>';
                    if ($_SESSION['lang'] == 'fr')
                        echo '<li class="resa-disabled">French</li>';
                    else
                        echo '<li><a class="white-text" href="/resabike/language?lang=fr">French</a></li>';
                    ?>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Navigation</h5>
                <ul>
                    <?php
                    $act = $this->currentAction;

                    if ($act == 'index')
                        echo '<li class="resa-disabled">About</li>';
                    else
                        echo '<li><a class="white-text" href=""</a></li>';
                    ?>
                </ul>
            </div>
        </div>
    </div>
</footer>
<?php
echo \ResaBike\Library\Utils\Toast::displayMessages();
?>
</body>
</html>
