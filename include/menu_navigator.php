<div class="detail_bar_nav">
    <ul>
    <?php
		$getPage = $_GET['page'];
		echo '<a href="?page=index"><li>'.$rLanguage->text("Home").'</li></a>&raquo;';
		if($getPage=="store"){
			if($product->getProductCategoryParentId()!=0){
				echo '<a href="?page=index&category='.$product->getProductCategoryParentId().'"><li>'.$product->getProductCategoryParentName().'</li></a>&raquo;';	
			}
			echo '<a href="?page=index&category='.$product->getProductCategoryParentId().'&path='.$product->getProductCategoryId().'"><li>'.$product->getProductCategoryChildName().'</li></a>&raquo;';	
			echo '<a href="?page=productdetail&product='.$product_id.'"><li>'.$product->getProductName().'</li></a>';	
		}
		else{
			if($product->getProductCategoryParentId()!=0){
				echo '<a href="?page=index&category='.$product->getProductCategoryParentId().'"><li>'.$product->getProductCategoryParentName().'</li></a>&raquo;';	
			}
			echo '<a href="?page=index&category='.$product->getProductCategoryParentId().'&path='.$product->getProductCategoryId().'"><li>'.$product->getProductCategoryChildName().'</li></a>';	
			
		}
	?>
    </ul>
</div>