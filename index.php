<?php
namespace SanTourWeb;

use SanTourWeb\Library\Router;

session_start();

//Define constant
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)));
define('APPPATH', realpath(ROOT.DS.'app'));
define('LIBPATH', realpath(ROOT.DS.'library'));
define('ASSETSPATH', realpath(ROOT.DS.'assets'));

define('DEBUG_LEVEL', 2);

define('ABSURL', 'http://localhost/SanTourWeb');

// LAISSE
define('FIREBASE_URL', 'https://santour-75cf5.firebaseio.com/');

require LIBPATH.DS.'autoload.php';
require LIBPATH.DS.'function.php';

$_SESSION['lang'] = (isset($_SESSION['lang'])) ? $_SESSION['lang'] : 'fr';

//Load Router
$rooter = new Router();
$rooter->SetErrorReporting();

//Run
$rooter->CallHook();