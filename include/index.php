<?php
    ob_start();
    if(!isset($_SESSION))@session_start();

	require_once(dirname(dirname(__FILE__)) . "/module/module.php");

    define("HTTP_DOMAIN",(!empty($_SERVER['HTTPS'])) ? "https://" . $_SERVER['HTTP_HOST'].str_replace($_SERVER['DOCUMENT_ROOT'], '', "") : "http://" . $_SERVER['HTTP_HOST'].str_replace($_SERVER['DOCUMENT_ROOT'], '', "") . ROOT . "/");
	//Global-Declaration
	$rLanguage = CheckLanguageChange();
?>
<head>
	<!--Meta-->
	<meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="Plaza Phnom Penh">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <!--
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    -->
    <!--end Meta-->
    <link rel="shortcut icon" href="store/image/icon/plaza_icon.png" type="image/x-icon">
    <title>PlazaPhnomPenh.com</title>
    <!--
    <link rel="image_src" href="store/image/icon/plazaprofile.jpg" />
    -->
<!--=Imports==========================================================-->
<?php
	//Jquery Library
	echo '<script src="'.HTTP_DOMAIN.'js/jquery.min.js" type="text/javascript" charset="UTF-8"></script>';
	echo '<script src="'.HTTP_DOMAIN.'js/webfont.js" type="text/javascript" charset="UTF-8"></script>';
	//Style
	echo '<link rel="stylesheet" href="'.HTTP_DOMAIN.'css/style.css" />';
	echo '<link rel="stylesheet" href="'.HTTP_DOMAIN.'css/facebook.css" />';
	echo '<link rel="stylesheet" href="'.HTTP_DOMAIN.'css/store.css" />';
	echo "<link href='http://fonts.googleapis.com/css?family=Moulpali' rel='stylesheet' type='text/css'>";//Web Font
	//Photo Gallery
	echo '<link rel="stylesheet" href="'.HTTP_DOMAIN.'application/photogallery/css/c_style.css" />';
	echo '<script type="text/javascript" src="'.HTTP_DOMAIN.'application/photogallery/js/jquery.easing.1.3.js" type="text/javascript" charset="UTF-8"></script>';
	echo '<script type="text/javascript" src="'.HTTP_DOMAIN.'application/photogallery/js/jquery.vgrid.0.1.7.min.js" type="text/javascript" charset="UTF-8"></script>';
	echo '<script type="text/javascript" src="'.HTTP_DOMAIN.'application/photogallery/js/customize.js" type="text/javascript"></script>';
	//List Category Expand
	echo '<link rel="stylesheet" href="'.HTTP_DOMAIN.'application/expand/css/expand.css" />';
	echo '<script type="text/javascript" src="'.HTTP_DOMAIN.'application/expand/js/expand.js"></script>';
	//ToolTip
	echo '<script type="text/javascript" src="'.HTTP_DOMAIN.'application/tooltip/jquery.balloon.js"></script>';
	echo '<script type="text/javascript" src="'.HTTP_DOMAIN.'application/tooltip/jquery.tile.js"></script>';
	//Home Customize for Radom Photo Gallery
	echo '<script type="text/javascript" src="'.HTTP_DOMAIN.'js/home_customize.js"></script>';
	echo '<script type="text/javascript" src="'.HTTP_DOMAIN.'js/run_phsaez.js"></script>';
	/*echo '<script type="text/javascript" src="'.HTTP_DOMAIN.'js/facebook.js"></script>';*/

		
	require_once($_SERVER['DOCUMENT_ROOT'] . "/". ROOT. "/application/product/class/product.class.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/". ROOT. "/application/product/class/category.class.php");

?>    
<!--=end Imports======================================================-->

<?php
/*
    if(isset($_GET['category'])){
        echo '<script type="text/javascript">';
            echo 'trimContenWidth();';
        echo '</script>';
    }
*/
?>
</head>
<body>
<?php
	echo '<input type="hidden" id="rLanguage" value="' . $_SESSION['language_selected'] . '" />';
    echo '<input type="hidden" id="base_url" value="' . HTTP_DOMAIN . '" />';
	$page = "index";
	if(isset($_GET['page'])){
		$page = $_GET['page'];
		if(!array_key_exists($page, $path)){
			$page = "index";
		}
	}
	$include_path = $_SERVER['DOCUMENT_ROOT'] . "/" . ROOT . "/" . $path[$page];
?>
<div class="head"><?php require_once($_SERVER['DOCUMENT_ROOT'] . "/" . ROOT . "/include/header.php");?></div>
<div id="phsaEZ_wrapper">
	<?php include($include_path);?>
</div>
<div id="footer"><?php require_once($_SERVER['DOCUMENT_ROOT'] . "/" . ROOT . "/include/footer.php");?></div>
</body>