<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
    ob_start();
    if(!isset($_SESSION))@session_start();
    $_SESSION['language_selected'] = "kh";
    include("../include/index.php");
?>
</html>