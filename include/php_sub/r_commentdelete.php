<?php
require_once((dirname(dirname(dirname(__FILE__)))) . "/module/module.php");	 
$comment_id = $_GET['commentid'];

runSQL("DELETE FROM ".DB_PREFIX."store_comment WHERE comment_id=". $comment_id);
?>


