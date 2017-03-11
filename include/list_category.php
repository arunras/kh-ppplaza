<?php
$category_id = "";
if(isset($_GET['category'])){
    $category_id = $_GET['category'];
    echo '<div id="icategory" style="display: block;">';
}
else{
    echo '<div id="icategory">';
}
echo '<a href="?page=index&category=0" title="expand/collapse"><h4 class="expand open" style="background-image: url('.HTTP_DOMAIN.'store/image/icon/all.gif);">All Categories</h4></a>';
    $q_parentcategory = getResultSet("SELECT category_id FROM ".DB_PREFIX."category WHERE parent_id=0");
    while($pc = mysql_fetch_array($q_parentcategory)){
        $parent_id = $pc['category_id'];
        //$parent_name = getValue("SELECT name FROM ".DB_PREFIX."category_description WHERE category_id=".$parent_id);
        $category = new category($parent_id);
		$parent_name = $category->getCategoryName();
        //echo '<a href="?page=index&category='.$parent_id.'" title="expand/collapse"><h4 class="expand open" style="background-image: url(store/image/icon/cat_list.png);">'.$parent_name.'</h4></a>';
		if($parent_id==$category_id){
			echo '<a href="?page=index&category='.$parent_id.'" title="expand/collapse"><h4 class="expand open current_parent" style="background-image: url('.HTTP_DOMAIN.$category->getListCategoryIcon().'); background-position: 1px center;background-repeat: no-repeat;background-color: #FF5500; border:none; color: #FFF;">'.$parent_name.'</h4></a>';	
		}
		else{
			echo '<a href="?page=index&category='.$parent_id.'" title="expand/collapse"><h4 class="expand open" style="background-image: url('.HTTP_DOMAIN.$category->getListCategoryIcon().');background-position: 1px center;background-repeat: no-repeat;">'.$parent_name.'</h4></a>';	
		}
        $sub_id = getValue("SELECT category_id FROM ".DB_PREFIX."category WHERE parent_id=".$parent_id);
        if($category_id==$parent_id || $category_id==$sub_id){
            echo '<ul class="collapse" style="display: block;">';
			$q_childcategory = getResultSet("SELECT category_id FROM ".DB_PREFIX."category WHERE parent_id=".$parent_id);
            while($cc=mysql_fetch_array($q_childcategory)){
                $child_id = $cc['category_id'];
				$child_category = new category($child_id);
			    $child_name = $child_category->getCategoryName();
                //$child_name = getValue("SELECT name FROM ".DB_PREFIX."category_description WHERE category_id=".$child_id);
                if(isset($_GET['path'])){
                    if($_GET['path']==$child_id){
                        echo '<a href="?page=index&category='.$parent_id.'&path='.$child_id.'"><li style="color: #000; border-left:2px #FF5500 solid; background-color: #e3e3e3;">'.$child_name.'</li></a>';
                    }
                    else{
                        echo '<a href="?page=index&category='.$parent_id.'&path='.$child_id.'"><li>'.$child_name.'</li></a>';
                    }
                }
                else{
                    echo '<a href="?page=index&category='.$parent_id.'&path='.$child_id.'"><li>'.$child_name.'</li></a>';
                }
            }
			echo '</ul>';
        }
    }
echo '</div>';
?>