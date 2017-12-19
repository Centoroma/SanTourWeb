<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo ABSURL;?>/assets/css/materialize.css" rel="stylesheet" media="screen,projection"/>
    <link href="<?php echo ABSURL;?>/assets/css/styles.css" rel="stylesheet" media="screen,projection"/>

    <!--  Scripts-->
    <script src="<?php echo ABSURL;?>/assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo ABSURL;?>/assets/js/materialize.js"></script>
    <script type="text/javascript" src="<?php echo ABSURL;?>/library/php/traduction.php"></script>
    <script src="<?php echo ABSURL;?>/assets/js/santourjs.js"></script>
</head>
<body>
<header>
    <div class="navbar-fixed">
        <nav class="navbar-color">
            <div class="nav-wrapper container">
                <span class="brand-logo">
                    <img src="/SanTourWeb/assets/images/logoBlanc.png" width="50px" height="45px" style="margin-top: 2%">
                    SanTour</span>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <?php
                    $act = $this->currentAction;

                    echo '<li ';
                    if ($act == 'index') {
                        echo '';
                    }
                    echo '><a href="'.ABSURL.'/tracks">Tracks</a></li>';

                    echo '<li ';
                    if ($act == 'index') {
                        echo '';
                    }
                    echo '><a href="'.ABSURL.'/categories">Categories</a></li>';

                    echo '<li ';
                    if ($act == 'index') {
                        echo '';
                    }

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
<footer class="page-footer navbar-color">
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

                <ul>
                    <?php
                    $ctr = $this->currentController;
                    $act = $this->currentAction;


                    ?>
                </ul>
            </div>
            <div class="col l3 s12" style="margin-top: 8%">
                Copyright ©2017 SanTour

            </div>
        </div>
    </div>
</footer>
<?php
echo \SanTourWeb\Library\Utils\Toast::displayMessages();
?>
</body>
</html>
