// JavaScript Document

$(document).ready(function () {
	var getWidth = $('#ilist_allproduct').css('width');
	getWidth = parseInt(getWidth.replace('px',''));
	getWidth = parseInt(getWidth);
	var sidebarWidth = 210;
	var contentWidth = getWidth-sidebarWidth;
	
	var base_url = $('#base_url').val();
	
	$('#iallcategory_label').toggle(
		function() {
			$('#grid-content').css({
				'left':'13px',
				//'max-width': contentWidth + 'px',
				'width': 'auto'
			});
			$('#icategory').hide();
			$('#iallcategory_label').css('background-image','url('+ base_url +'store/image/icon/expand.png)');
			$('#rsort').trigger('click');
		}, 
		function() {
			$('#grid-content').css({
				'left': '203px',
				//'max-width': (getWidth-20) + 'px',
				'width': 'auto'
			});
			$('#icategory').show();
			$('#iallcategory_label').css('background-image','url('+ base_url +'store/image/icon/collapse.png)');
			$('#rsort').trigger('click');
		}
	);
	
	var base_url_1 =  document.location.href;
	if(base_url_1==base_url){
		$('#icategory').hide();	
		$('#iallcategory_label').trigger('click');
	}
	//$('#iallcategory_label').trigger('click');
});
/*
function trimContenWidth(){
    $(document).ready(function(){
        $('#iallcategory_label').trigger('click');
    })
}
*/
