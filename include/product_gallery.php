<?php
$rLanguage = CheckLanguageChange();
    if(isset($_GET['category']) && !isset($_GET['path']) && !isset($_GET['q'])){
		if($_GET['category']!=0){
			getProductByCategory($_GET['category']);
		}
		elseif($_GET['category']==0){
			getProductAllCategory();	
		}
    }
    elseif(isset($_GET['category']) && isset($_GET['path']) && !isset($_GET['q'])){
        getProductByCategoryPath($_GET['path']);
    }
    elseif(isset($_GET['category']) && isset($_GET['q'])){
        getProductByCategorySearch($_GET['category'], $_GET['q']);
    }
	elseif(!isset($_GET['category']) && !isset($_GET['path']) && !isset($_GET['q']) && !isset($_GET['liststore'])){
		getProductAllCategory();
		//getProductByCategoryRand();
	}

	if(isset($_GET['liststore'])){
		require_once($_SERVER['DOCUMENT_ROOT'] . "/". ROOT. "/application/product/class/store.class.php");
		getListStore();
	}
	
/*TEST
    if(isset($_GET['category']) && isset($_GET['path']) && !isset($_GET['q'])){
        getProductByCategoryPath($_GET['path']);
    }
    elseif(isset($_GET['category']) && isset($_GET['q'])){
        getProductByCategorySearch($_GET['category'], $_GET['q']);
    }
	elseif(!isset($_GET['category']) && !isset($_GET['path']) && !isset($_GET['q'])){
		getProductAllCategory();
	}
*/	
	//get Product by Category Parent
	function getProductByCategory($cat_parentId){
		$q_category = getResultSet("SELECT category_id FROM ".DB_PREFIX."category WHERE parent_id=".$cat_parentId);
			//Parent Product
			$q_parent_product_id=getResultSet("SELECT product_id FROM ".DB_PREFIX."product_to_category WHERE category_id=".$cat_parentId);
			$count_category = mysql_num_rows($q_category);
			$total_product = mysql_num_rows($q_parent_product_id);
			if($total_product==0 && $count_category==0){
				echo '<div class="no_item" style="height:200px;padding: 10px 10px 10px 20px; color: #CCC; font-size: 20px;">';
					echo 'No Item!';	
				echo '</div>';
			}
			while($rp=mysql_fetch_array($q_parent_product_id)){
				$product_id=$rp['product_id'];
				$product = new product($product_id);
				
				echo '<div class="item">';	
					echo '<div class="desc">';
						echo '<div class="item_name">'.$product->getProductName().'</div>';
						echo '<div class="shop_name"><span style="padding: 5px 20px 5px 20px; background-image: url('.HTTP_DOMAIN.'store/image/icon/store.png);background-repeat: no-repeat;background-position: 0px center;">'.$product->getShopName().'</span></div>';
						echo '<div class="price">$'.$product->getProductPrice().'</div>';
					echo '</div>';
					echo '<a href="?page=productdetail&product='.$product_id.'">';
						echo '<img src="'.$product->getProductImage().'">';
					echo '</a>';
				echo '</div>';
			}
			////////
			
			while($rc=mysql_fetch_array($q_category)){
				$category_id=$rc['category_id'];
				$category = new category($category_id);

				$q_product_id=getResultSet("SELECT product_id FROM ".DB_PREFIX."product_to_category WHERE category_id=".$category_id);
				while($rp=mysql_fetch_array($q_product_id)){
					$product_id=$rp['product_id'];
					$product = new product($product_id);
					
					echo '<div class="item">';	
						echo '<div class="desc">';
							echo '<div class="item_name">'.$product->getProductName().'</div>';
							echo '<div class="shop_name"><span style="padding: 5px 20px 5px 20px; background-image: url('.HTTP_DOMAIN.'store/image/icon/store.png);background-repeat: no-repeat;background-position: 0px center;">'.$product->getShopName().'</span></div>';
							echo '<div class="price">$'.$product->getProductPrice().'</div>';
						echo '</div>';
						echo '<a href="?page=productdetail&product='.$product_id.'">';
							echo '<img src="'.$product->getProductImage().'">';
						echo '</a>';
					echo '</div>';
				}
			}
	}
	
	//get Product by Category Path
	function getProductByCategoryPath($path){
		$q_product_id=getResultSet("SELECT product_id FROM ".DB_PREFIX."product_to_category WHERE category_id=".$path);
		while($rp=mysql_fetch_array($q_product_id)){
			$product_id = $rp['product_id'];
			$product = new product($product_id);
			
			echo '<div class="item">';
				echo '<div class="desc">';
					echo '<div class="item_name" >'.$product->getProductName().'</div>';
					echo '<div class="shop_name"><span style="padding: 5px 20px 5px 20px; background-image: url('.HTTP_DOMAIN.'store/image/icon/store.png);background-repeat: no-repeat;background-position: 0px center;">'.$product->getShopName().'</span></div>';
					echo '<div class="price" >$'.$product->getProductPrice().'</div>';
				echo '</div>';
				echo '<a href="?page=productdetail&product='.$product_id.'">';
					echo '<img src="'.$product->getProductImage().'">';
				echo '</a>';
			echo '</div>';
		}		
	}
	
	//get Product by Category Search
	function getProductByCategorySearch($category_id, $keyword){
		$unix_product = array();
		//$has_printed = false;
		$total_product_1 = 0;
		$total_product_2 = 0;
		$keyword=strtolower($keyword);
		
		if($category_id!=0){
			$q_category = getResultSet("SELECT DISTINCT(category_id) FROM ".DB_PREFIX."category WHERE parent_id=".$category_id);	
		}
		elseif($category_id==0){
			$q_category = getResultSet("SELECT DISTINCT(category_id) FROM ".DB_PREFIX."category");	
		}
		while($rc=mysql_fetch_array($q_category)){
			$cat_id = $rc['category_id'];
			//if($category_id!=0){
			$q_product_id=getResultSet("SELECT DISTINCT(C.product_id) FROM ".DB_PREFIX."product_to_category AS C
									INNER JOIN ".DB_PREFIX."product_description AS D ON C.product_id = D.product_id 
									WHERE C.category_id=".$cat_id." AND lower(D.name) LIKE '%$keyword%'");	
									
			$total_product_1 = mysql_num_rows($q_product_id);									
			while($rp=mysql_fetch_array($q_product_id)){
				$product_id = $rp['product_id'];
				$product = new product($product_id);
				if(!in_array($product_id, $unix_product)){
				echo '<div class="item">';
					echo '<div class="desc">';
						echo '<div class="item_name" >'.$product->getProductName().'_'.$total_product_1.'</div>';
						echo '<div class="shop_name"><span style="padding: 5px 20px 5px 20px; background-image: url('.HTTP_DOMAIN.'store/image/icon/store.png);background-repeat: no-repeat;background-position: 0px center;">'.$product->getShopName().'</span></div>';
						echo '<div class="price" >$'.$product->getProductPrice().'</div>';
					echo '</div>';
					echo '<a href="?page=productdetail&product='.$product_id.'">';
					echo '<img src="'.$product->getProductImage().'">';
					echo '</a>';
				echo '</div>';
				}
				$unix_product[] = $rp['product_id'];
				$unix_product = array_unique($unix_product);
			}
		}
		
		//Search Child Category
		$q_child_product_id=getResultSet("SELECT DISTINCT(C.product_id) FROM ".DB_PREFIX."product_to_category AS C
										INNER JOIN ".DB_PREFIX."product_description AS D ON C.product_id = D.product_id 
										WHERE C.category_id=".$category_id." AND lower(D.name) LIKE '%$keyword%'");
		$total_product_2 = mysql_num_rows($q_child_product_id);
		while($rp=mysql_fetch_array($q_child_product_id)){
			$product_id = $rp['product_id'];
			$product = new product($product_id);
			if(!in_array($product_id, $unix_product)){
			echo '<div class="item">';
				echo '<div class="desc">';
					echo '<div class="item_name" >'.$product->getProductName().$total_product_2.'</div>';
					echo '<div class="shop_name"><span style="padding: 5px 20px 5px 20px; background-image: url('.HTTP_DOMAIN.'store/image/icon/store.png);background-repeat: no-repeat;background-position: 0px center;">'.$product->getShopName().'</span></div>';
					echo '<div class="price" >$'.$product->getProductPrice().'</div>';
				echo '</div>';
				echo '<a href="?page=productdetail&product='.$product_id.'">';
				echo '<img src="'.$product->getProductImage().'">';
				echo '</a>';
			echo '</div>';
			}
			$unix_product[] = $rp['product_id'];
			$unix_product = array_unique($unix_product);
		}
		//Info if Search No Result 
		/*
		if($total_product_1==0 && $total_product_2==0){
			echo '<div class="no_item" style="height:200px;padding: 10px 10px 10px 20px; color: #CCC; font-size: 20px;">';
				echo 'No Result! RUn'.$total_product_1.'_'.$total_product_2;
				//echo ':)'.$rLanguage->text("Logout");	
			echo '</div>';
		}
		*/
	}
	
	function getProductAllCategory(){
		$q_product_id=getResultSet("SELECT product_id FROM ".DB_PREFIX."product ORDER BY date_added DESC LIMIT 100");
		//by Category
		//$q_product_id=getResultSet("SELECT DISTINCT(product_id) FROM ".DB_PREFIX."product_to_category GROUP BY category_id");
		$i = 0;
		$medium_index = 3;
		$big_index = 2;
		while($rp = mysql_fetch_array($q_product_id)){
			$product_id = $rp['product_id'];
			$product = new product($product_id);

			//echo '<a href="?page=productdetail&product='.$product_id.'">';
			/*
			if($i%$big_index==0){echo '<div class="item" style="width: 200px;">';}
			elseif($i%$medium_index==0){echo '<div class="item" style="width: 300px;">';}
			else{ echo '<div class="item" style="width: 100px;">';}
			*/
			echo '<div class="item" style="width: 200px;">';
				echo '<div class="desc">';
					echo '<div class="item_name" >'.$product->getProductName().'</div>';
					echo '<div class="shop_name"><span style="padding: 5px 20px 5px 20px; background-image: url('.HTTP_DOMAIN.'store/image/icon/store.png);background-repeat: no-repeat;background-position: 0px center;">'.$product->getShopName().'</span></div>';
					echo '<div class="price" >$'.$product->getProductPrice().'</div>';
				echo '</div>';
				
				echo '<a href="?page=productdetail&product='.$product_id.'">';
				/*
				if($i%$big_index==0){echo '<img src="'.$product->getProductImage().'" style="width: 200px;">';}
				elseif($i%$medium_index==0){echo '<img src="'.$product->getProductImage().'" style="width: 300px;">';}
				else{ echo '<img src="'.$product->getProductImage().'" style="width: 100px;">';}
				*/
				echo '<img src="'.$product->getProductImage().'" style="width: 200px;">';
				echo '</a>';
			echo '</div>';
			//echo '</a>';
			$i++;
		}
	}
	
	function getProductByCategoryRand(){
		$q_parent_category = getResultSet("SELECT category_id FROM ".DB_PREFIX."category WHERE parent_id=0");
		$parentIdSet = array();
		while($pc=mysql_fetch_array($q_parent_category)){
			$parent_id = $pc['category_id'];
			//echo $parent_id."__";	
			$parentIdSet[] = $pc['category_id'];
		}
		$id_rand = array_rand($parentIdSet, 1);
		$cat_parentId = $parentIdSet[$id_rand];
		
	$q_category = getResultSet("SELECT category_id FROM ".DB_PREFIX."category WHERE parent_id=".$cat_parentId);
		//Parent Product
		$q_parent_product_id=getResultSet("SELECT product_id FROM ".DB_PREFIX."product_to_category WHERE category_id=".$cat_parentId);
		$count_category = mysql_num_rows($q_category);
		$total_product = mysql_num_rows($q_parent_product_id);
		if($total_product==0 && $count_category==0){
			echo '<div class="no_item" style="height:200px;padding: 10px 10px 10px 20px; color: #CCC; font-size: 20px;">';
				echo 'No Item!';	
			echo '</div>';
		}
		while($rp=mysql_fetch_array($q_parent_product_id)){
			$product_id=$rp['product_id'];
			$product = new product($product_id);
			
			echo '<div class="item">';	
				echo '<div class="desc">';
					echo '<div class="item_name">'.$product->getProductName().'</div>';
					echo '<div class="shop_name"><span style="padding: 5px 20px 5px 20px; background-image: url('.HTTP_DOMAIN.'store/image/icon/store.png);background-repeat: no-repeat;background-position: 0px center;">'.$product->getShopName().'</span></div>';
					echo '<div class="price">$'.$product->getProductPrice().'</div>';
				echo '</div>';
				echo '<a href="?page=productdetail&product='.$product_id.'">';
					echo '<img src="'.$product->getProductImage().'">';
				echo '</a>';
			echo '</div>';
		}
		////////
		
		while($rc=mysql_fetch_array($q_category)){
			$category_id=$rc['category_id'];
			$category = new category($category_id);

			$q_product_id=getResultSet("SELECT product_id FROM ".DB_PREFIX."product_to_category WHERE category_id=".$category_id);
			while($rp=mysql_fetch_array($q_product_id)){
				$product_id=$rp['product_id'];
				$product = new product($product_id);
				
				echo '<div class="item">';	
					echo '<div class="desc">';
						echo '<div class="item_name">'.$product->getProductName().'</div>';
						echo '<div class="shop_name"><span style="padding: 5px 20px 5px 20px; background-image: url('.HTTP_DOMAIN.'store/image/icon/store.png);background-repeat: no-repeat;background-position: 0px center;">'.$product->getShopName().'</span></div>';
						echo '<div class="price">$'.$product->getProductPrice().'</div>';
					echo '</div>';
					echo '<a href="?page=productdetail&product='.$product_id.'">';
						echo '<img src="'.$product->getProductImage().'">';
					echo '</a>';
				echo '</div>';
			}
		}
	}
//List Store	
	function getListStore(){
		$q_store=getResultSet("SELECT store_id, name, url FROM ".DB_PREFIX."store");
		while($rs = mysql_fetch_array($q_store)){
			$store_id = $rs['store_id'];
			$store_name = $rs['name'];
			$store_url = $rs['url'];
			$q_product_id = getValue("SELECT product_id FROM ".DB_PREFIX."product_to_store WHERE store_id=".$store_id." GROUP BY product_id ORDER BY RAND()");
			$store = new store($store_id);
			
			echo '<div class="item" style="width: 150px;">';
				/*echo '<div class="desc">';
					echo '<div class="item_name" >'.$store->getStoreName().'</div>';
				echo '</div>';*/
				
				echo '<a href="?page=store&id='.$store_id.'&product='.$q_product_id.'">';
					echo '<img src="'.$store->getStoreLogo().'" style="width: 150px;">';
				echo '</a>';
				echo '<div style="text-align:center;color: #2554C7;">'.$store_name.'</div>';
			echo '</div>';
		}
	}
?>