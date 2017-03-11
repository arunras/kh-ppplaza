/**************************************************/
/* Created by : RITH PHEARUN
/* Date       : 2011-12-14
/* EMail      : run@camitss.com
/* Company    : http://camitss.com
/* 
/**************************************************/
//<![CDATA[
$(function(){
	var hsort_flg = false;

	//setup
	var vg = $("#grid-content").vgrid({
		easeing: "easeOutQuint",
		useLoadImageEvent: true,
		useFontSizeListener: true,
		time: 400,
		delay: 50,
		fadeIn: {
			time: 500,
			delay: 50
		},
		onStart: function(){
			$("#message1")
				.css("visibility", "visible")
				.fadeOut("slow",function(){
					$(this).show().css("visibility", "hidden");
				});
		},
		onFinish: function(){
			$("#message2")
				.css("visibility", "visible")
				.fadeOut("slow",function(){
					$(this).show().css("visibility", "hidden");
				});
		}
	});

	//add item
	$("#additem").click(function(e){
		var _height = Math.max(30, Math.min(300, Math.round(Math.random()*300)));
		var _item = $('<div>\
				<h3>New Item</h3>\
				<p><img src="http://dummyimage.com/150x'+ _height +'" alt="dummy" /></p>\
				<p><a href="#">DELETE</a></p>\
			</div>')
			.hide();
		vg.prepend(_item);
		vg.vgrefresh(null, null, null, function(){
			_item.fadeIn(300);
		});
		hsort_flg = true;
	});

	//delete
        /*
	vg.find("a").live('click', function(e){
		$(this).parent().parent().fadeOut(200, function(){
			$(this).remove();
			vg.vgrefresh();
		});
		return false;
	});
        */    
	//sort
	$("#hsort").click(function(e){
		hsort_flg = !hsort_flg;
		$("#grid-content").vgsort(function(a, b){
			var _a = $(a).find('h3').text();
			var _b = $(b).find('h3').text();
			var _c = hsort_flg ? 1 : -1 ;
			return (_a > _b) ? _c * -1 : _c ;
		}, "easeInOutExpo", 300, 0);
		return false;
	});
	$("#rsort").click(function(e){
		$("#grid-content").vgsort(function(a, b){
			return Math.random() > 0.5 ? 1 : -1 ;
		}, "easeInOutExpo", 300, 20);
		hsort_flg = true;
		return false;
	});
	
	$("#rsort").trigger('click');
});
//]]>