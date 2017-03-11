<?php
echo '<script type="text/javascript" src="'.HTTP_DOMAIN.'js/jquery.min.js" charset="UTF-8"></script>';
//<!--PhotoScrolling-->
echo '<link rel="stylesheet" type="text/css" href="'.HTTP_DOMAIN.'application/photoscroll/css/skin.css">';
echo '<script type="text/javascript" src="'.HTTP_DOMAIN.'application/photoscroll/js/jquery.jcarousel.min.js"></script>';
echo '<script type="text/javascript" src="'.HTTP_DOMAIN.'js/detail_customize.js"></script>';

//<!--PhotoViewer-->
echo '<link rel="stylesheet" charset="utf-8" type="text/css" href="'.HTTP_DOMAIN.'application/photoviewer/css/style.css" />';
echo '<script type="text/javascript" charset="utf-8" src="'.HTTP_DOMAIN.'application/photoviewer/js/jquery-foxiswitch-0.2.js"></script>';

//<!--Photo Popup-->
echo '<link rel="stylesheet" href="'.HTTP_DOMAIN.'application/photopopup/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />';
echo '<script src="'.HTTP_DOMAIN.'application/photopopup/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>';
?>


<script type="text/javascript">
$(document).ready(function(){
  //$('#gallery').foxiswitch({textPrev:'&lt; Previous', textNext:'Next &gt;', textPlay:'Start Diashow'});
  $('#gallery').foxiswitch({});

	//Photo Popup
	/*
	$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
	$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:5000, hideflash: true});
	*/
	$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',slideshow:5000, hideflash: true});
});

//Facebook Share
function fbs_click(){
	u=location.href;
	t=document.title;
	window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');
	return false;
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
        	<?php $product->showProductDetail();?>
        </div>
        
        <div class="relativeproduct">
            <div class="label"><?php echo $rLanguage->text("Relative Product");?></div>
            <div class="gallery">
                <div class=" jcarousel-skin-tango">
                    <div class="jcarousel-container jcarousel-container-horizontal" style="position: relative; display: block; ">
                        <div class="jcarousel-clip jcarousel-clip-horizontal" style="position: relative; ">
                            <ul id="mycarousel" class="jcarousel-list jcarousel-list-horizontal">
                            <?php
								if($product->getProductCategoryId()!=''){
									$q_relative_product = getResultSet("SELECT product_id FROM ".DB_PREFIX."product_to_category WHERE category_id=".$product->getProductCategoryId()." AND product_id!=".$product_id." ORDER BY RAND()");	
								}
								$total = mysql_num_rows($q_relative_product);
								if($total==0){
									echo '<li class="item" style="border: none; display: none;">';
										echo '<img src="">';
                                        echo '<span class="product_name"></span>';
                                        echo '<span class="shop_name"></span>';
                                        echo '<span class="price"></span>';
									echo '</li>';
									echo '<span style="font-size:12px; color: #CCC;">No Relative product</span>';
								}
								while($rr=mysql_fetch_array($q_relative_product)){
									$productId = $rr['product_id'];
									$relative_product = new product($productId);
									echo '<li class="item">';
										echo '<a href="?page=productdetail&product='.$productId.'"><img src="'.$relative_product->getProductImage().'"></a>';
                                        echo '<span class="product_name"><a href="?page=productdetail&product='.$productId.'">'.$relative_product->getProductName().'aa</a></span>';
                                        echo '<span class="shop_name">'.$relative_product->getShopName().'</span>';
                                        echo '<span class="price">$'.$relative_product->getProductPrice().'</span>';
									echo '</li>';
								}
							?>
                            </ul>
                        </div>
                        <div class="jcarousel-prev jcarousel-prev-horizontal" style="display: block; " disabled="false"></div>
                        <div class="jcarousel-next jcarousel-next-horizontal" style="display: block; " disabled="false"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="product_description">
        	<div class="label"><?php echo $rLanguage->text("Item Description");?></div>
            <div class="desc">
                <?php
					echo $product->getProductDescription();
				?>
                <br clear="all" />
            </div>
        </div>
        
        <div class="product_review">
        	<div class="label"><?php echo $rLanguage->text("Product Review");?>(<span style="color: #3B5998;">Facebook</span>)</div>
            <div class="desc">
                <div class="fb-comments" data-href="<?php echo HTTP_DOMAIN.'?page=productdetail&product='.$product_id; ?>" data-num-posts="2" data-width="940"></div>
            </div>
        </div>
    </div>
</div>