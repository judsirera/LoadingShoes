<?php
/*
 * Archivo de configuraci�n de las clases que usaremos
 * Se llama desde Configure::getClass('NombreClase');
 */

/**
 * Engine:  Don't modify.
 */
//$config['factory']						=  PATH_ENGINE . 'factory.class.php';
//$config['sql']							=  PATH_ENGINE . 'sql.class.php';


$config['mail']							=  PATH_ENGINE . 'mail.class.php';
$config['session']						=  PATH_ENGINE . 'session.class.php';
$config['user']							=  PATH_ENGINE . 'user.class.php';
$config['url']							=  PATH_ENGINE . 'url.class.php';
$config['uploader']						=  PATH_ENGINE . 'uploader.class.php';


$config['dispatcher']					=  PATH_ENGINE . 'dispatcher.class.php';


/** 
 * Controllers & Models
 *
 */

// 404 Controller
$config['ErrorError404Controller']		= PATH_CONTROLLERS . 'error/error404.ctrl.php';

// Home Controller
$config['HomeHomeController']			= PATH_CONTROLLERS . 'home/home.ctrl.php';
$config['HomeWelcomeController']		= PATH_CONTROLLERS . 'home/welcome.ctrl.php';


// pages Controller
$config['PagesSignupController']		= PATH_CONTROLLERS . 'pages/signup.ctrl.php';
$config['PagesLoginController']		    = PATH_CONTROLLERS . 'pages/login.ctrl.php';

$config['PagesActiveuserController']    = PATH_CONTROLLERS . 'pages/activeuser.ctrl.php';
$config['PagesNewProductController']    = PATH_CONTROLLERS . 'pages/newproduct.ctrl.php';



$config['PagesLoggedController']        = PATH_CONTROLLERS . 'pages/logged.ctrl.php';
$config['PagesMyPurchasesController']   = PATH_CONTROLLERS . 'pages/myPurchases.ctrl.php';
$config['PagesMyProductsController']    = PATH_CONTROLLERS . 'pages/myProducts.ctrl.php';

$config['PagesLogoutController']        = PATH_CONTROLLERS . 'pages/logout.ctrl.php';
$config['imgUpldr']                     = PATH_CONTROLLERS . 'pages/imageSettings.ctrl.php';



// Shared controllers
$config['SharedHeadController']			= PATH_CONTROLLERS . 'shared/head.ctrl.php';
$config['SharedFooterController']		= PATH_CONTROLLERS . 'shared/footer.ctrl.php';

// Pages models

$config['PagesUserModel']		        = PATH_MODELS . 'pages/user.model.php';
$config['PagesProductModel']		    = PATH_MODELS . 'pages/product.models.php';

