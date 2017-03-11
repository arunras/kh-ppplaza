<?php
ob_start();
if(!isset($_SESSION))session_start();
    /*
    * This class is used to design and access to database for tbl_performer
    * Creator: Rith Phearun
    * Date Created: Oct-01-2011
    */
class store{
	private $store_id;
    private $store_name;
	
	
    public function __construct($id = ""){
            $this->store_id = $id;
			$this->store_name = "";
    }

    private function initDb(){
    	require_once(dirname(dirname(dirname(dirname(__FILE__)))) . "/module/module.php");
    }
/*==GET from DB=============================================================================================================*/
	//get Category Name
	public function getStoreName(){
		$this->initDb();
		$this->store_name='';
		if($this->store_id !=0){
			$this->store_name =  getValue("SELECT name FROM ".DB_PREFIX."store WHERE store_id=".$this->store_id);
		}
		return $this->store_name;	
	}
	//get Store_Image
	public function getStoreImage(){
		$this->initDb();
		/*
		if($this->store_id !=0){
			$this->store_image = getValue("SELECT image FROM ".DB_PREFIX."product WHERE product_id=".$this->product_id);
		}
		$img = HTTP_DOMAIN.'store/image/'.$this->product_image;
		//echo $img;	!file_exists($img)
		if ($this->product_image=='' || !fopen($img,'r')){return HTTP_DOMAIN.'store/image/icon/noimage.jpg';}
		else{ return  $img;}
		*/
		return HTTP_DOMAIN.'store/image/icon/noimage.jpg';
	}
	//get Store_Logo
	public function getStoreLogo(){
		$this->initDb();
		if($this->store_id !=0){
			$this->store_logo = getValue("SELECT value FROM ".DB_PREFIX."setting WHERE store_id=".$this->store_id." AND `key`='config_template'");
		}

		$img = HTTP_DOMAIN.'store/image/templates/'.$this->store_logo.'.png';
		if(@fopen($img,'r')){ return  $img;}
		else{return HTTP_DOMAIN.'store/image/icon/noimage.jpg';}
		
	}
	//get Store_Description
	public function getStoreDescription(){
		$this->initDb();
		if($this->store_id !=0){
			$this->store_desc = getValue("SELECT value FROM ".DB_PREFIX."setting WHERE store_id=".$this->store_id." AND `key`='config_meta_description'");
		}
		return $this->store_desc;
	}
	//get Store_Address
	public function getStoreAddress(){
		$this->initDb();
		if($this->store_id !=0){
			$this->store_address = getValue("SELECT value FROM ".DB_PREFIX."setting WHERE store_id=".$this->store_id." AND `key`='config_address'");
		}
		return $this->store_address;
	}
	//get Store_Email
	public function getStoreEmail(){
		$this->initDb();
		if($this->store_id !=0){
			$this->store_email = getValue("SELECT value FROM ".DB_PREFIX."setting WHERE store_id=".$this->store_id." AND `key`='config_email'");
		}
		return $this->store_email;
	}
	//get Store_Email
	public function getStoreTelephone(){
		$this->initDb();
		if($this->store_id !=0){
			$this->store_telephone = getValue("SELECT value FROM ".DB_PREFIX."setting WHERE store_id=".$this->store_id." AND `key`='config_telephone'");
		}
		return $this->store_telephone;
	}
	//get Store_Email
	public function getStoreFax(){
		$this->initDb();
		if($this->store_id !=0){
			$this->store_fax = getValue("SELECT value FROM ".DB_PREFIX."setting WHERE store_id=".$this->store_id." AND `key`='config_fax'");
		}
		return $this->store_fax;
	}
	//get Shop URL
	public function getStoreUrl(){
		$this->initDb();
		if($this->store_id !=0){
			$this->store_url =  getValue("SELECT url FROM ".DB_PREFIX."store WHERE store_id=".$this->store_id);
		}
		return $this->store_url;
	}
	//get Store Rate Average
	public function getStoreRate(){
		//$this->initDb();
		if($this->store_id !=0){
			$this->store_rate = getValue("SELECT AVG(store_rate_value) FROM ".DB_PREFIX."store_comment WHERE store_id=".$this->store_id);
		}
		return round($this->store_rate);	
	}
	//get Store Total Review
	public function getStoreTotalReview(){
		//$this->initDb();
		if($this->store_id !=0){
			$this->store_total_review = getValue("SELECT COUNT(comment_id) FROM ".DB_PREFIX."store_comment WHERE store_id=".$this->store_id);
		}
		return $this->store_total_review;	
	}
	//get Store Total Review1
	public function getStoreTotalReview1(){
		//$this->initDb();
		if($this->store_id !=0){
			$this->store_total_review1 = getValue("SELECT COUNT(comment_id) FROM ".DB_PREFIX."store_comment WHERE store_id=".$this->store_id." AND store_rate_value=1");
		}
		return $this->store_total_review1;	
	}
	//get Store Total Review2
	public function getStoreTotalReview2(){
		//$this->initDb();
		if($this->store_id !=0){
			$this->store_total_review2 = getValue("SELECT COUNT(comment_id) FROM ".DB_PREFIX."store_comment WHERE store_id=".$this->store_id." AND store_rate_value=2");
		}
		return $this->store_total_review2;	
	}
	//get Store Total Review3
	public function getStoreTotalReview3(){
		//$this->initDb();
		if($this->store_id !=0){
			$this->store_total_review3 = getValue("SELECT COUNT(comment_id) FROM ".DB_PREFIX."store_comment WHERE store_id=".$this->store_id." AND store_rate_value=3");
		}
		return $this->store_total_review3;	
	}
	//get Store Total Review4
	public function getStoreTotalReview4(){
		//$this->initDb();
		if($this->store_id !=0){
			$this->store_total_review4 = getValue("SELECT COUNT(comment_id) FROM ".DB_PREFIX."store_comment WHERE store_id=".$this->store_id." AND store_rate_value=4");
		}
		return $this->store_total_review4;	
	}
	//get Store Total Review5
	public function getStoreTotalReview5(){
		//$this->initDb();
		if($this->store_id !=0){
			$this->store_total_review5 = getValue("SELECT COUNT(comment_id) FROM ".DB_PREFIX."store_comment WHERE store_id=".$this->store_id." AND store_rate_value=5");
		}
		return $this->store_total_review5;	
	}
	public function getUserName($user_id){
		$user_firstname = getValue("SELECT firstname FROM ".DB_PREFIX."user WHERE user_id=".$user_id);
		$user_lastname = getValue("SELECT lastname FROM ".DB_PREFIX."user WHERE user_id=".$user_id);	
		$user_name = $user_firstname.' '.$user_lastname;
		return $user_name;
	}
/*==END GET from DB=============================================================================================================*/
/*==END DISPLAY=============================================================================================================*/
		//show Product Detail
	function showStoreDetail(){
		/*$q_product_desc=getResultSet("SELECT product_id, model, image, price FROM ".DB_PREFIX."product WHERE product_id=".$product_id);*/
		echo '<meta name="title" content="'.$this->getStoreName().'" />';
		echo '<meta name="description" content="'.$this->getStoreName().'" />';
		//echo '<link rel="image_src" href="'.$this->getStoreImage().'" />';
		echo '<table border="0" width="100%"><tr>';
			echo '<td valign="top" style="border-right: 1px #CCC solid; padding: 0px; width: 210px;">';
				echo '<img src="'.$this->getStoreLogo().'" style="width: 200px;" />';
			echo '</td>';
			echo '<td valign="top">';
				echo '<div class="product_desc" style="height: auto; width: 100%;">';
					echo '<div class="product_name"><a href="'.$this->getStoreUrl().'" class="shop_label">'.$this->getStoreName().'</a></div>';	
					echo '<div class="row">';
						echo '<table border="0" width="100%">';
							echo '<tr>';
								echo '<td valign="top" width="300px">';
						echo '
							<script type="text/javascript">
								var s5 = new Stars({
									maxRating: 5,
									value: '.$this->getStoreRate().',
									imagePath: "'.HTTP_DOMAIN.'application/starrating/images/",
									locked: true
								});		
							</script>';
						echo '<span class="total_review">'.$this->getStoreTotalReview().'Reviews</span>';
						echo '<div class="barChart">';							
							echo '<table border="0" cellpadding="0" cellspacing="0">';
								echo '<div class="rowbar">';
									echo '<tr>';
										echo '<td><span class="text">Excellent</span></td>';
										echo '<td><div class="line">';
											echo '	<script type="text/javascript">
												var s5 = new Stars({
													maxRating: 100,
													value: '.$this->getStoreTotalReview5().',
													imagePath: "'.HTTP_DOMAIN.'application/starrating/images/barchart/",
													locked: true
												});		
											</script>';
										echo '</div></td>';
										echo '<td><span class="count">'.$this->getStoreTotalReview5().'</span></td>';
									echo '</tr>';
								echo '</div>';
								echo '<div class="rowbar">';
									echo '<tr>';
										echo '<td><span class="text">Very Good</span></td>';
										echo '<td><div class="line">';
											echo '	<script type="text/javascript">
												var s5 = new Stars({
													maxRating: 100,
													value: '.$this->getStoreTotalReview4().',
													imagePath: "'.HTTP_DOMAIN.'application/starrating/images/barchart/",
													locked: true
												});		
											</script>';
										echo '</div></td>';
										echo '<td><span class="count">'.$this->getStoreTotalReview4().'</span></td>';
									echo '</tr>';
								echo '</div>';
								echo '<div class="rowbar">';
									echo '<tr>';
										echo '<td><span class="text">Average</span></td>';
										echo '<td><div class="line">';
											echo '	<script type="text/javascript">
												var s5 = new Stars({
													maxRating: 100,
													value: '.$this->getStoreTotalReview3().',
													imagePath: "'.HTTP_DOMAIN.'application/starrating/images/barchart/",
													locked: true
												});		
											</script>';
										echo '</div></td>';
										echo '<td><span class="count">'.$this->getStoreTotalReview3().'</span></td>';
									echo '</tr>';
								echo '</div>';
								echo '<div class="rowbar">';
									echo '<tr>';
										echo '<td><span class="text">Poor</span></td>';
										echo '<td><div class="line">';
											echo '	<script type="text/javascript">
												var s5 = new Stars({
													maxRating: 100,
													value: '.$this->getStoreTotalReview2().',
													imagePath: "'.HTTP_DOMAIN.'application/starrating/images/barchart/",
													locked: true
												});		
											</script>';
										echo '</div></td>';
										echo '<td><span class="count">'.$this->getStoreTotalReview2().'</span></td>';
									echo '</tr>';
								echo '</div>';
								echo '<div class="rowbar">';
									echo '<tr>';
										echo '<td><span class="text">Terrible</span></td>';
										echo '<td><div class="line">';
											echo '	<script type="text/javascript">
												var s5 = new Stars({
													maxRating: 100,
													value: '.$this->getStoreTotalReview1().',
													imagePath: "'.HTTP_DOMAIN.'application/starrating/images/barchart/",
													locked: true
												});		
											</script>';
										echo '</div></td>';
										echo '<td><span class="count">'.$this->getStoreTotalReview1().'</span></td>';
									echo '</tr>';
								echo '</div>';
							echo '</table>';
						echo '</div>';
							echo '</td>';
							echo '<td valign="top">';
								echo '<div class="contact_info">';
								echo '<table border="0" width="100%">';
									if($this->getStoreAddress()!=''){
									echo '<tr>';
										echo '<td  class="label" valign="top">Address:</td>';
										echo '<td class="info"  valign="top">'.$this->getStoreAddress().'</td>';
									echo '</tr>';
									}
									if($this->getStoreEmail()!=''){
									echo '<tr>';
										echo '<td  class="label">E-mail:</td>';
										echo '<td class="info">'.$this->getStoreEmail().'</td>';
									echo '</tr>';
									}
									if($this->getStoreTelephone()!=''){
									echo '<tr>';
										echo '<td class="label">Phone:</td>';
										echo '<td class="info">'.$this->getStoreTelephone().'</td>';
									echo '</tr>';
									}
									if($this->getStoreFax()!=''){
									echo '<tr>';
										echo '<td  class="label">Fax:</td>';
										echo '<td class="info">'.$this->getStoreFax().'</td>';
									echo '</tr>';
									}
									if($this->getStoreUrl()!=''){
									echo '<tr>';
										echo '<td  class="label">URL:</td>';
										echo '<td class="info"><a href="'.$this->getStoreUrl().'" style="font-size: 12px;">'.$this->getStoreUrl().'</a></td>';
									echo '</tr>';
									echo '<tr>';
										echo '<td  class="label"></td>';
										echo '<td class="info"><a href="'.$this->getStoreUrl().'"><img src="'.HTTP_DOMAIN.'store/image/icon/btn_gotostore.png" style="border: none;"></img></a></td>';
									echo '</tr>';
									}
								echo '</table>';
								echo '</div>';
							echo '</td>';
							echo '</tr>';
						echo '</table>';	
					echo '</div>';
					//href="#" link to add to cart page of store
					echo '<div class="row" style="height: 33px;">';
							echo '<table border="0" cellpadding="0" cellspacing="0">';
							echo '<tr>';
								echo '<td>';
                    	echo '<div class="fb-like" data-href="'.HTTP_DOMAIN.'?page=store&id='.$this->store_id.'&product='.$_GET['product'].'" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false" data-font="tahoma" style="width: 80px;margin-bottom: 8px;"></div>';
								echo '</td>';
								echo '<td>';
						echo '<div style="margin-bottom: 10px;"><a class="facebook fb-share-button" href="http://www.facebook.com/share.php?u='.HTTP_DOMAIN.'" onclick="return fbs_click()" target="_blank"><span>Share</span></a></div>';
								echo '</td>';
								echo '<td>';
						echo '<div style="padding-left: 10px;margin:0px;"><g:plusone size="medium" annotation="bubble" href="'.HTTP_DOMAIN.'?page=store&id='.$this->store_id.'&product='.$_GET['product'].'"></g:plusone></div>';
								echo '</td>';
							echo '</tr>';
						echo '</table>';
                    echo '</div>';
				echo '</div>';
			echo '</td>';
		echo '</tr></table>';
	}
	function showUserFeedback(){
		$q_ufeedback = getResultSet("SELECT comment_id, user_id, store_rate_value, comment_text, created_datetime FROM ".DB_PREFIX."store_comment WHERE store_id=".$this->store_id." ORDER BY comment_id DESC");
		while($rf=mysql_fetch_array($q_ufeedback)){
			$comment_id = $rf['comment_id'];
			$user_id = $rf['user_id'];
			$store_rate_value = $rf['store_rate_value'];
			$comment_text = $rf['comment_text'];
			$datetime = $rf['created_datetime'];
			
			echo '<div class="user_feedback">';
				if(getUserType()==ADMINISTRATOR  || getCurrentUser()==$user_id){
					//echo '<span id="ideletefeedback" class="delete_icon" onclick="delete_comment('.$comment_id.')">X</span>';
				}
				echo '<div class="name">';
					echo '<span>'.$this->getUserName($user_id).'<span>';
					echo '	<script type="text/javascript">
								var s5 = new Stars({
									maxRating: 5,
									value: '.$store_rate_value.',
									imagePath: "'.HTTP_DOMAIN.'application/starrating/images/feedback/",
									locked: true
								});		
							</script>';
				echo '</div>';
				echo '<div class="comment">'.$comment_text.'</div>';
				echo '<div class="datetime">'.$datetime.'</div>';
        	echo '</div>';	
		}
	}
	function showStoreProduct(){
		$q_product = getResultSet("SELECT product_id FROM ".DB_PREFIX."product_to_store WHERE store_id=".$this->store_id." ORDER BY product_id DESC");
		
		$count = 0;
		echo '<table border="0" width="100%"><tr>';
		while($rp=mysql_fetch_array($q_product)){
			$product_id=$rp['product_id'];
			$product = new product($product_id);
			$product_name = $product->getProductName();
			$product_price = $product->getProductPrice();
			$product_img = $product->getProductImage();
			if($count>2){echo '</tr><tr>'; $count=0;}
			echo '<td valign="top">';
				echo '<div class="item">';
					echo '<a href="?page=productdetail&product='.$product_id.'"><img src="'.$product_img.'" /></a>';
					echo '<div class="name"><a href="?page=productdetail&product='.$product_id.'">'.$product_name.'</a></div>';
					echo '<div class="price">$'.$product_price.'</div>';
				echo '</div>';
			echo '</td>';
			$count++;
		}
		echo '</tr></table>';
	}
/*==END Display=============================================================================================================*/
}
?>