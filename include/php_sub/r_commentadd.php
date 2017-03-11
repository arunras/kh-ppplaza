<?php
require_once((dirname(dirname(dirname(__FILE__)))) . "/module/module.php");

$user_id = getCurrentUser();
$store_id = $_POST['myStoreId'];;
$rate_value = $_POST['myRating'];
$comment_text = trim(escapte_js_decrypt($_POST['myComment']));
$comment_text = nl2br($comment_text);
$datetime = getDateTime();

$product = $_POST['myProduct'];

if($comment_text==""){
	header('Location:../../'.$kh.'?page=shop&id='.$store_id);
	exit();
}
/*
$memo_text = trim(escapte_js_decrypt($_GET['memotext']));
$memo_text = nl2br($memo_text);
*/

runSQL("INSERT INTO ".DB_PREFIX."store_comment (user_id, store_id, comment_text, store_rate_value, created_datetime) 
		VALUES('".$user_id."', '".$store_id."', '".$comment_text."', '".$rate_value."', '".$datetime."')");
$kh = '';
if($_SESSION['language_selected']!='kh'){$kh=$_SESSION['language_selected'];}
header('Location:../../'.$kh.'?page=store&id='.$store_id.'&product='.$product);//$get_memoid = mysql_insert_id();
?>