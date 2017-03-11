////////////////////////////
// http://www.adipalaz.com/experiments/jquery/accordion.html
///////////////////////////
(function($) {
//http://www.mail-archive.com/jquery-en@googlegroups.com/msg43851.html
$.fn.orphans = function(){
    var txt = [];
    this.each(function(){$.each(this.childNodes, function() {
        if (this.nodeType == 3 && $.trim(this.nodeValue)) txt.push(this)
    })}); 
    return $(txt);
};
//http://www.learningjquery.com/2008/02/simple-effects-plugins:
$.fn.fadeToggle = function(speed, easing, callback) {
    return this.animate({opacity: 'toggle'}, speed, easing, callback);
};
$.fn.slideFadeToggle = function(speed, easing, callback) {
    return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
};
})(jQuery);
////////////////////////////
$(function() {
    $('#content div#icategory .collapse').hide(); 
    $('#content div#icategory .expand').orphans().wrap('<a href="#" title="expand/collapse"></a>');
    /*
    //demo 1 - div.demo:eq(0) - show/hide effects:
    $('div.demo:eq(0) .expand').click(function() {
        $(this).toggleClass('open').siblings().removeClass('open').end()
        .next('.collapse').toggle().siblings('.collapse:visible').toggle();
        return false;
    });
    
    //demo 2 - div.demo:eq(1) - show/hide (slow) effects:
    $('div.demo:eq(1) .expand').click(function() {
        $(this).toggleClass('open').siblings().removeClass('open').end()
        .next('.collapse').toggle('slow').siblings('.collapse:visible').toggle('slow');
        return false;
    });
    */
    //demo 3 - div.demo:eq(2) - slide effects:
//    $('div#icategory .expand').click(function() {
//        $(this).toggleClass('open').siblings().removeClass('open').end()
//        .next('.collapse').slideToggle().siblings('.collapse:visible').slideUp();
//        return false;
//    });
});
