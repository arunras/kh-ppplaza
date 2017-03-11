<div class="header">
	<div class="banner">
		<?php
            $kh = '';
            if($_SESSION['language_selected']!='kh'){$kh=$_SESSION['language_selected'];}
            //echo '<a href="'.substr(HTTP_DOMAIN,0,-1).'/'.$kh.'"><div class="logo"></div></a>';
			echo '<a href="'.HTTP_DOMAIN.$kh.'"><div class="logo"></div></a>';
        ?>
    	
        <div class="log">
        	<ul>
            	<li id="register"><a href="<?php echo HTTP_DOMAIN; ?>store/index.php?route=account/register"><?php echo $rLanguage->text("Register");?></a></li>
                <!--
                php echo substr(HTTP_DOMAIN,0,-1); ?>store/index.php?route=account/login
                -->
                <li id="login"><a href="?page=login"><?php echo $rLanguage->text("Login");?></a></li>
                <li id="logout" style="display:none;"><a href="<?php echo HTTP_DOMAIN; ?>store/index.php?route=account/logout"><?php echo $rLanguage->text("Logout");?></a></li>
                <!--
                <li style="border:none;"><a href="#" id="fb-auth">Login with Facebook</a></li>
                --
                <li style="border:none;"><button id="fb-auth">Login</button></li>
                -->
                <!--FACEBOOK
                <li id="logout" style="background-image:url(<?php echo HTTP_DOMAIN;?>store/image/icon/fb.gif);background-position: 1px center; background-repeat: no-repeat; padding-left: 20px; border: none;">
                	<a href="#" id="fb-auth"></a>
    			</li>
                -->
                <li style="border: none;">
                	<div id="fb-root"></div>
			        <!--<div id="user-info" style="color:#006EC3;"></div>-->
                </li>
        	</ul>
        </div>  
        <?php echo '<script type="text/javascript" src="'.HTTP_DOMAIN.'js/facebook.js"></script>';?>
        <!--==--
		<div class="fb-login-button" data-scope="email,user_checkins" style="text-align:right;">
        	Login
        </div>
        <!--==-->
<!--=Info=--
<div style="text-align:right; width: 100px; float: right;"><button id="fb-auth">Login</button></div> 
<div id="user-info" style="text-align:right; width: 100px;"></div>
<!--=end Info=-->
	</div>
</div>
<div class="menu_bar">
<?php
    $q_category = getResultSet("SELECT category_id FROM ".DB_PREFIX."category WHERE parent_id=0");
	if(isset($_GET['page']) && isset($_GET['product'])){
		echo '<select id="ifilter_category" name="filter_category" class="select_filter">';	
	}else{
		echo '<select id="ifilter_category" name="filter_category" class="select_filter" onChange="filter_category(this.options[this.selectedIndex].value)">';		
	}
		echo '<option value="0">All Categories</option>';
    while($rc=mysql_fetch_array($q_category)){
        $category_id = $rc['category_id'];
		$category = new category($category_id);
		if(isset($_GET['category']) && $category_id==$_GET['category']){
				echo '<option selected="selected" value="'.$category_id.'">'.$category->getCategoryName().'</option>';
		}	
		else{
				echo '<option value="'.$category_id.'">'.$category->getCategoryName().'</option>';	
		}
    }
    echo '</select>';
	
	if(isset($_GET['q'])){
		echo '<input class="txt_search" type="text" id="itxt_search" name="txt_search" placeholder="'.$_GET['q'].'" onkeypress="searchKeyPress(event);"/>';
	}
	else{
		echo '<input class="txt_search" type="text" id="itxt_search" name="txt_search" placeholder="Product Search" onkeypress="searchKeyPress(event);"/>';	
	}
?>    
    <input class="btn_search" type="button" id="ibtn_search" name="btn_search" value="<?php echo $rLanguage->text("Search");?>" onclick="searchProduct('','2');" />
    <span style="border: 0px #F00 solid; width: 50px;padding: 5px 5px 5px 5px;"><a href="?liststore=all" style="color: #FFF;"><?php echo $rLanguage->text("Store Search");?></a></span>
</div>
