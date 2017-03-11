<?php
ob_start();
if(!isset($_SESSION))session_start();
/*
* This class is used to design and access to database for tbl_performer
* Creator: Rith Phearun
* Date Created: Oct-01-2011
*/
class product{
	private $product_id;
    private $product_name;
	private $product_price;
    private $product_description;
	private $product_category;
	private $store_name;
	
	
    public function __construct($id = ""){
            $this->product_id = $id;
			$this->product_name = "";
			$this->product_price = "";
			$this->product_description = "";
			$this->product_category = "";
			
			$this->store_name = "";
    }
	
	private function getLanguageId(){
		if($_SESSION['language_selected']=="en"){return 1;}
		elseif($_SESSION['language_selected']=="kh"){return 2;}
    }
	
    private function initDb(){
    	require_once(dirname(dirname(dirname(dirname(__FILE__)))). "/module/module.php");
    }
/*==GET from DB=============================================================================================================*/
	//get Product_Name
	public function getProductName(){
		$this->initDb();
		if($this->product_id !=0){
			$this->product_name = getResultSet("SET NAMES UTF8");
			$this->product_name = getValue("SELECT name FROM ".DB_PREFIX."product_description WHERE product_id=".$this->product_id." AND language_id =".$this->getLanguageId());
		}
		return $this->product_name;	
	}	
	//get Product_Image
	public function getProductImage(){
		$this->initDb();
		if($this->product_id !=0){
			$this->product_image = getValue("SELECT image FROM ".DB_PREFIX."product WHERE product_id=".$this->product_id);
		}
		$img = HTTP_DOMAIN.'store/image/'.$this->product_image;

		if ($this->product_image==''){return HTTP_DOMAIN.'store/image/icon/noimage.jpg';}
		else{ return  $img;}

	}
	//get Product_Image
	public function getProductAllImage(){
		$this->initDb();
		if($this->product_id !=0){
			$ProAllImg = ''; 
			$q_productimage= getResultSet("SELECT image FROM ".DB_PREFIX."product_image WHERE product_id=".$this->product_id);
			while($ri=mysql_fetch_array($q_productimage)){
				$product_img = $ri['image'];
				//$img = 'store/image/'.$product_img;			
				$img = HTTP_DOMAIN.'store/image/'.$product_img;
				if ($product_img==''){$img=HTTP_DOMAIN.'store/image/icon/noimage.jpg';} // || !fopen($img,'r')
				$ProAllImg = $ProAllImg.'<li><a href="'.$img.'" rel="prettyPhoto[gallery2]" title=""><img src="'.$img.'"/></a></li> ';
			}
		}
		return $ProAllImg;
	}
	//get PRODUCT PRICE
	public function getProductPrice(){
		$this->initDb();
		if($this->product_id !=0){
			$this->product_price = getValue("SELECT price FROM ".DB_PREFIX."product WHERE product_id=".$this->product_id);
		}
		return $this->product_price;	
	}
	//get Product_Description
	public function getProductDescription(){
		$this->initDb();
		if($this->product_id !=0){
			$this->product_description = getValue("SELECT description FROM ".DB_PREFIX."product_description WHERE product_id=".$this->product_id." AND language_id =".$this->getLanguageId());
		}
		return html_entity_decode($this->product_description, ENT_QUOTES, 'UTF-8');
	}
	//get Product_CategoryID
	public function getProductCategoryId(){
		$this->initDb();	
		if($this->product_id !=0){
			$this->product_category_id = getValue("SELECT category_id FROM ".DB_PREFIX."product_to_category WHERE product_id=".$this->product_id);
		}
		return $this->product_category_id;	
	}
	//get Product_CategoryName
	public function getProductCategoryChildName(){
		$this->initDb();
		$this->product_category_name='';	
		if($this->product_id !=0 && $this->getProductCategoryId()!=''){
			$this->product_category_name = getValue("SELECT name FROM ".DB_PREFIX."category_description WHERE category_id=".$this->getProductCategoryId());
		}
		return $this->product_category_name;	
	}
	//get getProductCategoryIdForParent
	public function getProductCategoryIdForParent(){
		$this->initDb();
		$category_id = '';
		if($this->product_id !=0){
			$this->product_category_id = getResultSet("SELECT category_id FROM ".DB_PREFIX."product_to_category WHERE product_id=".$this->product_id);
			while($rc=mysql_fetch_array($this->product_category_id)){
				$category_id = $rc['category_id'];
			}
		}
		return $category_id;	
	}
	//get Product_CategoryParentId
	public function getProductCategoryParentId(){
		$this->initDb();
		$this->category_parent_id='';
		if($this->product_id !=0 && $this->getProductCategoryIdForParent()!=''){
			$this->category_parent_id = getValue("SELECT parent_id FROM ".DB_PREFIX."category WHERE category_id=".$this->getProductCategoryIdForParent());
		}
		return $this->category_parent_id;	
	}
	//get Product_CategoryParentName
	public function getProductCategoryParentName(){
		$this->initDb();
		$this->product_category_name='';
		if($this->product_id !=0 && $this->getProductCategoryParentId()!=''){
				$this->product_category_name = getValue("SELECT name FROM ".DB_PREFIX."category_description WHERE category_id=".$this->getProductCategoryParentId());	
		}
		return $this->product_category_name;	
	}
	//get Shop ID
	public function getShopId(){
		$this->initDb();
		if($this->product_id !=0){
			$this->store_id = getValue("SELECT store_id FROM ".DB_PREFIX."product_to_store WHERE product_id = ".$this->product_id." AND store_id!=0");
		}
		return $this->store_id;	
	}
	//get Shop Name
	public function getShopName(){
		$this->initDb();
		$this->store_name='';
		if($this->product_id !=0 && $this->getShopId()!=''){
			$this->store_name =  getValue("SELECT name FROM ".DB_PREFIX."store WHERE store_id=".$this->getShopId());
		}
		return $this->store_name;	
	}
	//get Shop URL
	public function getShopUrl(){
		$this->initDb();
		$this->store_url='';
		if($this->product_id !=0 && $this->getShopId()!=''){
			$this->store_url =  getValue("SELECT url FROM ".DB_PREFIX."store WHERE store_id=".$this->getShopId());
		}
		return $this->store_url;	
	}
/*==END GET from DB=============================================================================================================*/
/*==END DISPLAY=============================================================================================================*/
	//show Product Detail
	function showProductDetail(){
		$rLanguage =  CheckLanguageChange();
		/*$q_product_desc=getResultSet("SELECT product_id, model, image, price FROM ".DB_PREFIX."product WHERE product_id=".$product_id);*/
		echo '<meta name="title" content="'.$this->getProductName().'" />';
		echo '<meta name="description" content="'.$this->getShopName().' $'.$this->getProductPrice().': '.strip_tags($this->getProductDescription()).'" />';
		echo '<link rel="image_src" href="'.$this->getProductImage().'" />';
		echo '<table border="0" width="100%"><tr>';
			echo '<td><div class="photo_view">';
				echo '<ul id="gallery" class="gallery clearfix">';
					echo '<li><a href="'.$this->getProductImage().'" rel="prettyPhoto[gallery2]" title=""><img src="'.$this->getProductImage().'" /></a></li> ';
					echo $this->getProductAllImage();
				echo '</ul>';	
			echo '</div></td>';
			echo '<td valign="top">';
				echo '<div class="product_desc">';
					echo '<div class="product_name">'.$this->getProductName().'</div>';	
					//href="#" link to store profile
					//echo '<div class="shop_name"><span class="label">Store:</span> <a href="'.$this->getShopUrl().'"><span style="border: 1px #F00 solid;">'.$this->getShopName().'</span></a></div>';
					echo '<div class="shop_name"><a href="'.$this->getShopUrl().'"><span class="bg_icon" style="background-image: url('.HTTP_DOMAIN.'store/image/icon/store_icon.png);">'.$this->getShopName().'</span></a></div>';
					//echo ' <div class="price"><span class="label">Price:</span><span class="cost"> $'.$this->getProductPrice().'</span></div>';
					echo ' <div class="price"><span class="cost" style="background-image: url('.HTTP_DOMAIN.'store/image/icon/price_tag.png);"> $'.$this->getProductPrice().'</span></div>';
					//href="#" link to add to cart page of shop
					echo '<div class="row" style="text-align: right;height: 37px;"><a href="'.$this->getShopUrl().'index.php?route=product/product&product_id='.$this->product_id.'" style="text-decoration:none;"><img src="'.HTTP_DOMAIN.'store/image/icon/btn_gotobuy.png" style="border: none;"></img></a></div>';//'.$rLanguage->text("Go to buy").'
					echo '<div class="row" style="height: 33px;">';
						echo '<table border="0" cellpadding="0" cellspacing="0">';
							echo '<tr>';
								echo '<td>';
                    	echo '<div class="fb-like" data-href="'.HTTP_DOMAIN.'?page=productdetail&product='.$this->product_id.'" data-send="false" data-layout="button_count" data-width="30" data-show-faces="false" data-font="tahoma" style="width: 80px;margin-bottom: 8px;"></div>';
								echo '</td>';
								echo '<td>';
						echo '<div style="margin-bottom: 10px;"><a class="facebook fb-share-button" href="http://www.facebook.com/share.php?u='.HTTP_DOMAIN.'" onclick="return fbs_click()" target="_blank"><span>Share</span></a></div>';
								echo '</td>';
								echo '<td>';
						echo '<div style="padding-left: 10px;margin:0px;"><g:plusone size="medium" annotation="bubble" href="'.HTTP_DOMAIN.'?page=productdetail&product='.$this->product_id.'"></g:plusone></div>';
								echo '</td>';
							echo '</tr>';
						echo '</table>';
                    echo '</div>';
					echo '<div class="row shop_name" style="font-size: 12px;"><a href="?page=store&id='.$this->getShopId().'&product='.$this->product_id.'"><span style="background-image: url('.HTTP_DOMAIN.'store/image/icon/info.png);background-position: 0px center; background-repeat: no-repeat; padding: 2px 2px 2px 20px; border:0px #F00 solid; font-size: 12px;">'.$rLanguage->text("About Store").'</span></a></div>';
				echo '</div>';
			echo '</td>';
		echo '</tr></table>';
	}
/*==END Display=============================================================================================================*/	
}
?>