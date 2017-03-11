/**************************************************/
/* Created by : RITH PHEARUN
/* Date       : 2011-12-26
/* EMail      : run@camitss.com
/* Company    : http://camitss.com
/**************************************************/

function filter_category(category_id){
	var base_url =  document.domain + window.location.pathname;
	//var base_url =  $('#base_url').val();
	
	document.location.href = 'http://' + base_url + '?page=index&category=' + category_id;	
	/*
	if(category_id!=0){
		document.location.href = 'http://' + base_url + '?page=index&category=' + category_id;	
	}
	else if(category_id==0){
		document.location.href = 'http://' + base_url;
	}
	*/
}

function searchProduct(){
	//alert('cat='+category_id+', key='+ keyword);
	var e = document.getElementById("ifilter_category");
	var category_id = e.options[e.selectedIndex].value;

	//var keyword = $('#itxt_search').val();
	var keyword = document.getElementById('itxt_search').value;
	//alert(keyword);
	
	var base_url =  document.domain + window.location.pathname;
	document.location.href = 'http://' + base_url + '?page=index&category=' + category_id + '&q=' + keyword;
}


function searchKeyPress(e)
{
	// look for window.event in case event isn't passed in
	if (window.event) { e = window.event; }
	if (e.keyCode == 13)
	{
			document.getElementById('ibtn_search').click();
	}
}
//Load JS fil
function loadScript(url, callback)
{
    // adding the script tag to the head as suggested before
   var head = document.getElementsByTagName('head')[0];
   var script = document.createElement('script');
   script.type = 'text/javascript';
   script.src = url;

   // then bind the event to the callback function 
   // there are several events for cross browser compatibility
   script.onreadystatechange = callback;
   script.onload = callback;

   // fire the loading
   head.appendChild(script);
}
/*==Delete Comment===========================================================================================================================*/
function delete_comment(comment_id){
	loadScript("js/jquery.min.js");
	var base_url =  document.domain + window.location.pathname;	
	
	var isDelete = confirm("Are you sure you want to delete this?");	
	if(isDelete==true){	
		$.ajax({
			url: 'http://'+ base_url +'include/php_sub/r_commentdelete.php?action=commentdelete&commentid=' + comment_id,
			success: function(data){
				location.reload(true);
			}
		});
	}
}
/*==END Delete Comment===========================================================================================================================*/
/*==get Computer Time===========================================================================================================================*/
function getTime()
{
var d = new Date();
var c_hour = d.getHours();
var c_min = d.getMinutes();
var c_sec = d.getSeconds();
var t = Date() + c_hour + ":" + c_min + ":" + c_sec;
alert(t);
//return t;
}
/*==END get Computer Time===========================================================================================================================*/