<?php
	/*echo '<script type="text/javascript" src="'.HTTP_DOMAIN.'js/jquery.min.js" charset="UTF-8"></script>';*/
	//Star Rating
	echo '<script type="text/javascript" charset="utf-8" src="'.HTTP_DOMAIN.'application/starrating/js/prototype.js"></script>';
	echo '<script type="text/javascript" charset="utf-8" src="'.HTTP_DOMAIN.'application/starrating/js/stars.js"></script>';
	
	require_once($_SERVER['DOCUMENT_ROOT'] . "/". ROOT. "/application/product/class/store.class.php");
?>


<script type="text/javascript">
//Facebook Share
function fbs_click(){
	u=location.href;
	t=document.title;
	window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');
	return false;
}
function check_commenttext(){
	var text= document.getElementById('imyComment').value;
	if(text.length<10){
		alert("Comment text must greater than 10 characters!");
		document.getElementById('imyComment').focus();
		return false;
	}
}
//Google Plus Button
<!-- Place this render call where appropriate -->
(function() {
	var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	po.src = 'https://apis.google.com/js/plusone.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
<!--end PhotoVier-->
<style type="text/css">
/**
 * Overwrite for having a carousel with dynamic width.
 */
.jcarousel-skin-tango .jcarousel-container-horizontal {
    width: 92%;
	border: none;
}
.jcarousel-skin-tango .jcarousel-clip-horizontal {
    width: 100%;
    height: 200px;
}
</style>
<?php
$store_id = $_GET['id'];
$store = new store($store_id);

$product_id = $_GET['product'];
$product = new product($product_id);
?>
<!--
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=287911227924206";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
-->
<div id="center_wrapper">
	<div id="detail_menubar">
		<?php require_once($_SERVER['DOCUMENT_ROOT'].'/'.ROOT.'/include/menu_navigator.php');?>
    </div>
    <div id="center_detail">
        <div class="top">
        	<?php $store->showStoreDetail();?>
        </div>
        <div class="product_description">
        	<div class="label"><?php echo $rLanguage->text("Store Description");?></div>
            <div class="desc">
            	<?php echo $store->getStoreDescription(); ?>
            </div>
        </div>
        <table border="0" width="100%">
        	<tr>
            	<td width="50%" valign="top">
              		<div class="product_description" style="border: 0px #F00 solid;">
                        <div class="label"><?php echo $rLanguage->text("Reviews");?></div>
                        <div class="desc">
                            <?php
                            if(getCurrentUser()!=0){
                            echo '<form name="feedback" action="'.HTTP_DOMAIN.'include/php_sub/r_commentadd.php" method="post" onsubmit="return check_commenttext();">';
                                echo '<input type="hidden" name="myRating" value="" id="myRating" readonly="readonly">';
                                echo '
                                <script type="text/javascript">
                                    var s1 = new Stars({
                                        maxRating: 5,
                                        bindField: "myRating",
                                        imagePath: "'.HTTP_DOMAIN.'application/starrating/images/",
                                    });
                                </script>
                                ';
                                echo '
                                <span style="color: #CCC; font-size: 11px;">Click here to rate this shop</span>
                                <textarea name="myComment" id="imyComment" placeholder="Add a comment...NOT AVAILABLE NOW!" cols="58" style="resize: none; margin-bottom: 0px;" readonly="readonly"></textarea>
                                <input type="hidden" name="myStoreId" value="'.$store_id.'"/>
                                <input type="hidden" name="myProduct" value="'.$product_id.'"/>
                                <div style="text-align:right; margin-top: 0px;">
                                    <input type="submit" name="btn_comment" value="Comment"/>
                                </div>';
                            echo '</form>';
                            }
                            $store->showUserFeedback();
                            ?>
                        </div>
                        <div class="label"></div>
                    </div>  
                </td>
                <td  class="store_listproduct" width="50%" align="center" valign="top">
                	<div class="label"><?php echo $rLanguage->text("Product");?></div>
                	<?php 
						$store->showStoreProduct();
					?>
                	<!--
                    <table border="0" width="100%">
                    	<tr>
                        	<td>
                            	<div class="item">
                                	<a href=""><img src="store/image/data/apple_logo.jpg" /></a>
                                    <div class="name"><a href="">AAAAAAAAAAAA</a></div>
                                    <div class="price">$13</div>
                                </div>
                            </td>
                            <td>
                            	<div class="item">
                                	<img src="store/image/data/apple_logo.jpg" />
                                    <div class="name"><a href="">AAAAAAAAAAAA</a></div>
                                    <div class="price">$13</div>
                                </div>
                            </td>
                            <td>
                            	<div class="item">
                                	<img src="store/image/data/apple_logo.jpg" />
                                    <div class="name"><a href="">AAAAAAAAAAAA</a></div>
                                    <div class="price">$13</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<div class="item">
                                	<a href=""><img src="store/image/data/apple_logo.jpg" /></a>
                                    <div class="name"><a href="">AAAAAAAAAAAA</a></div>
                                    <div class="price">$13</div>
                                </div>
                            </td>
                    </table>
                    -->
                </td>
            </tr>
        </table>
    </div>
    </div>
</div>