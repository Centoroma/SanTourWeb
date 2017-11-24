<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/santourweb/assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/santourweb/assets/css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <!--  Scripts-->
    <script src="/santourweb/assets/js/jquery-3.2.1.min.js"></script>
    <script src="/santourweb/assets/js/materialize.js"></script>
    <script type="text/javascript"
            src="/santourweb/library/php/traduction.php?lang=<?php echo $_SESSION['lang'] ?>"></script>
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
                    $ctr = $this->currentController;
                    $role = $_SESSION['user']['idRole'];

                    echo '<li ';
                    if ($ctr == 'books') {
                        echo 'class="active"';
                    }
                    echo '><a href="' . DS . 'resabike' . DS . 'books">' . __("Books", true) . '</a></li>';
                    if ($role >= 3) {
                        echo '<li ';
                        if ($ctr == 'zones') {
                            echo 'class="active"';
                        }
                        echo '><a href="' . DS . 'resabike' . DS . 'zones">' . __("Zones", true) . '</a></li>';
                    }
                    if ($role >= 2) {
                        echo '<li ';
                        if ($ctr == 'lines') {
                            echo 'class="active"';
                        }
                        echo '><a href="' . DS . 'resabike' . DS . 'lines">' . __("Lines", true) . '</a></li>';
                    }
                    if ($role >= 3) {
                        echo '<li ';
                        if ($ctr == 'users') {
                            echo 'class="active"';
                        }
                        echo '><a href="' . DS . 'resabike' . DS . 'users">' . __("Users", true) . '</a></li>';
                    }
                    if ($role >= 3) {
                        echo '<li ';
                        if ($ctr == 'statistics') {
                            echo 'class="active"';
                        }
                        echo '><a href="' . DS . 'resabike' . DS . 'statistics">' . __("Statistics", true) . '</a></li>';
                    }
                    ?>
                    <li><a href="/resabike/login/logout"><?php __('Logout') ?></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <ul class="side-nav resa-side-nav show-on-medium-and-down" id="mobile-demo">
        <?php
        $ctr = $this->currentController;
        $role = $_SESSION['user']['idRole'];

        echo '<li ';
        if ($ctr == 'books') {
            echo 'class="nav-active"';
        }
        echo '><a href="' . DS . 'resabike' . DS . 'books">' . __("Book", true) . '</a></li>';
        if ($role >= 3) {
            echo '<li ';
            if ($ctr == 'zones') {
                echo 'class="nav-active"';
            }
            echo '><a href="' . DS . 'resabike' . DS . 'zones">' . __("Zones", true) . '</a></li>';
        }
        if ($role >= 2) {
            echo '<li ';
            if ($ctr == 'lines') {
                echo 'class="nav-active"';
            }
            echo '><a href="' . DS . 'resabike' . DS . 'lines">' . __("Lines", true) . '</a></li>';
        }
        if ($role >= 3) {
            echo '<li ';
            if ($ctr == 'users') {
                echo 'class="nav-active"';
            }
            echo '><a href="' . DS . 'resabike' . DS . 'users">' . __("Users", true) . '</a></li>';
            echo '<li ';
            if ($ctr == 'statistics') {
                echo 'class="nav-active"';
            }
            echo '><a href="' . DS . 'resabike' . DS . 'statistics">' . __("Statistics", true) . '</a></li>';
        }
        ?>
        <li><a href="/resabike/login/logout"><?php __('Logout') ?></a></li>
    </ul>
</header>
<main>
    <?php echo $html; ?>
</main>
<footer class="page-footer teal lighten-6">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text"><?php __('Who are we ?')?></h5>
                <p class="grey-text text-lighten-4">
                    <?php __('We are two students of the HES-SO in Sierre.
                    As part of our project course, we were asked to propose a new platform
                    for Resabike,
                    the company that manages the reservation of places for bicycles in the bus of Val d\'Anniviers.')?>
                </p>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text"><?php __("Languages"); ?></h5>
                <ul>
                    <?php
                    $ctr = $this->currentController;
                    $act = $this->currentAction;

                    if ($_SESSION['lang'] == 'de')
                        echo '<li class="resa-disabled">'.__("German", true).'</li>';
                    else
                        echo '<li><a class="white-text" href="/resabike/language?lang=de">'.__("German", true).'</a></li>';
                    if ($_SESSION['lang'] == 'en')
                        echo '<li class="resa-disabled">'.__("English", true).'</li>';
                    else
                        echo '<li><a class="white-text" href="/resabike/language?lang=en">'.__("English", true).'</a></li>';
                    if ($_SESSION['lang'] == 'fr')
                        echo '<li class="resa-disabled">'.__("French", true).'</li>';
                    else
                        echo '<li><a class="white-text" href="/resabike/language?lang=fr">'.__("French", true).'</a></li>';
                    ?>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text"><?php __("Navigation"); ?></h5>
                <ul>
                    <?php
                    $ctr = $this->currentController;
                    $role = $_SESSION['user']['idRole'];

                    if ($ctr == 'books')
                        echo '<li class="resa-disabled">'. __("Books", true) .'</li>';
                    else
                        echo '<li><a class="white-text" href="' . DS . 'resabike' . DS . 'books">' . __("Books", true) . '</a></li>';

                    if ($role >= 3) {
                        if ($ctr == 'zones')
                            echo '<li class="resa-disabled">'. __("Zones", true) .'</li>';
                        else
                            echo '<li><a class="white-text" href="' . DS . 'resabike' . DS . 'zones">' . __("Zones", true) . '</a></li>';
                    }
                    if ($role >= 2) {
                        if($ctr == 'lines')
                            echo '<li class="resa-disabled">'. __("Lines", true) .'</li>';
                        else
                            echo '<li><a class="white-text" href="' . DS . 'resabike' . DS . 'lines">' . __("Lines", true) . '</a></li>';
                    }
                    if ($role >= 3) {
                        if ($ctr == 'users')
                            echo '<li class="resa-disabled">'. __("Users", true) .'</li>';
                        else
                            echo '<li><a class="white-text" href="' . DS . 'resabike' . DS . 'users">' . __("Users", true) . '</a></li>';

                        if ($ctr == 'statistics')
                            echo '<li class="resa-disabled">'. __("Statistics", true) .'</li>';
                        else
                            echo '<li><a class="white-text" href="' . DS . 'resabike' . DS . 'statistics">' . __("Statistics", true) . '</a></li>';
                    }
                    ?>
                    <li><a class="white-text" href="/resabike/login/logout"><?php __('Logout') ?></a></li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</footer>
<?php
echo \ResaBike\Library\Utils\Toast::displayMessages();
?>
</body>
</html>
