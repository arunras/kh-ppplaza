<form action="#" method="get" style="margin-bottom:10px; display: none;">
    <input type="button" id="additem" value="Add Item" style="font-weight: bold;">
    <input type="button" id="hsort" value="Headline Sort">
    <input type="button" id="rsort" value="Random Sort">
    
    <span id="message1" style="display: inline-block; visibility: hidden; ">onStart</span>
    <span id="message2" style="display: inline-block; visibility: hidden; ">onFinish</span>
</form>
<div id="center_wrapper">
	<div id="iallcategory_label">
        <span><?php echo $rLanguage->text("Product Category"); ?></span>
    </div>
    <!--List Category-->
    <div id="ilist_allproduct">
        <?php 
            require_once(dirname(dirname(__FILE__)) .'/include/list_category.php');
        ?>
        <script> $(function() { eval($('#ilist_allproduct .tooltip_itemstyle').text()); }); </script>    	
        <div class="tooltip_styleblock">
            <code class="tooltip_itemstyle" style="display: none;">
                    $('#grid-content div.item').balloon({
                        tipSize: 10,
                        css: {
                        	font: 'Tahoma, Geneva, sans-serif, "Moulpali", cursive',
                            border: '1px #000 solid',
                            padding: '10px',
                            //width: '300px',
                            fontSize: '15px',
                            //fontWeight: 'bold',
                            lineHeight: '1.2',
                            backgroundColor: '#000',
                            color: '#fff',
                            textAlign: 'center',
                        }
                    });
            </code>
        </div>
    </div>
<!--TEST===========================================================================-->
<div id="container">
<?php
        if(isset($_GET['category'])){
            echo '<div id="grid-content" style="left:224px;">';
        }
        else{
            echo '<div id="grid-content">';
        }
        require_once($_SERVER['DOCUMENT_ROOT'] . "/" . ROOT . "/include/product_gallery.php");
        echo '</div>';
?>
<!--end TEST=======================================================================-->    
</div>
</div>

    <!-- Please do not copy | �?��?�スクリプト�?�コピー�?��?��?��?��??�?��?��?� -->
    <!-- Google Analytics -->

    
    <script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script><script src="application/photogallery/js/ga.js" type="text/javascript"></script>
    <script type="text/javascript">
    try {
    var pageTracker = _gat._getTracker("UA-179655-3");
    pageTracker._trackPageview();
    } catch(err) {}</script>
    
    
    <!-- /Google Analytics -->
    <!-- /Please do not copy | �?��?�スクリプト�?�コピー�?��?��?��?��??�?��?��?� -->
    
<!--
<span id="_vgridspan" style="display: none; "> </span>
-->