/**
 * name:          jquery-foxiswitch-0.2.js
 * author:        Stefan Benicke - www.opusonline.at
 * version:       0.2
 * last update:   01.10.2009
 * category:      jQuery plugin
 * copyright:     (c) 2009 Stefan Benicke (www.opusonline.at)
 * license:       GNU GPLv3
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * documentation: http://www.opusonline.at/foxitools/foxiswitch/
 */
(function($) {
  $.fn.foxiswitch = function(settings){

    settings = jQuery.extend({
      fade: 0.3,
      speed: 1000,
      caption: true,
      externalImages: false,
      thumbWidth: 40,
	  thumbHeight: 30,
      slideSpeed: 5000,
      autoplay: false,
      textPrev: 'Previous',
      textNext: 'Next',
      textPlay: 'Play',
      textStop: 'Stop',
      textHelp: 'Help',
      helptext: 'Left Arrow: Go backward<br />Right Arrow: Go forward<br />Space-bar: Play, Stop<br />Up Arrow: Play faster<br />Down Arrow: Play slower',
      imageBeforeCaption: true,
      thumbsBeforeControls: true,
      imageBeforeThumbs: true
      }, settings
    );

    var foxiswitch_list = $(this);
    var playing = false;

    foxiswitch_list.find('li:first').addClass('first').addClass('active');
    foxiswitch_list.find('li:last').addClass('last');

    // fix ie6 bug with opacity
    var no_ie6 = true;
    if($.browser.msie) if($.browser.version <= 6) no_ie6 = false;

    // initiate the first image
    var div = '<div id="foxiswitch_container">';
    var img = '<div id="foxiswitch_image"><img id="foxiswitch_image_old" /><img id="foxiswitch_image_new" /></div>';
    if(settings.imageBeforeCaption) div += img;
    if(settings.caption) div += '<div id="foxiswitch_caption"></div>';
    if(!settings.imageBeforeCaption) div += img;
    div += '<div id="foxiswitch_helptext" style="display:none">' + settings.helptext + '</div></div>';

    (settings.imageBeforeThumbs) ? foxiswitch_list.before(div) : foxiswitch_list.after(div);

    var nav = '<div id="foxiswitch_controls"><span id="foxiswitch_prev">' + settings.textPrev +
      '</span> | <span id="foxiswitch_next">' + settings.textNext +
      '</span> | <span id="foxiswitch_slideshow">' + settings.textPlay +
      '</span> | <span id="foxiswitch_help">' + settings.textHelp + '</span></div>';
    
    //(settings.thumbsBeforeControls) ? foxiswitch_list.after(nav) : foxiswitch_list.before(nav);

		// keyboard events
    $(document).keydown(function(event){
      switch(event.keyCode){
        case 37: // left arrow
					prevImage();
          return false;
					break;
        case 39: // right arrow
					nextImage();
          return false;
					break;
        case 32: // spacebar
          (playing) ? stopSlideShow() : playSlideShow();
          return false;
          break;
        case 38: // up arrow
          if(playing){
            if(settings.slideSpeed >= 500) settings.slideSpeed -= 500;
            $('#foxiswitch_slideshow').text(settings.textStop + " (" + (settings.slideSpeed / 1000) + " sec.)");
            return false;
          }
          break;
        case 40: // down arrow
          if(playing){
            settings.slideSpeed += 500;
            $('#foxiswitch_slideshow').text(settings.textStop + " (" + (settings.slideSpeed / 1000) + " sec.)");
            return false;
          }
          break;
			};
    });

    // the previous link
    $('#foxiswitch_prev').bind('click', function(){
      if(playing) stopSlideShow();
      prevImage();
    });

    // the next link
    $('#foxiswitch_next').bind('click', function(){
      if(playing) stopSlideShow();
      nextImage();
    });

    // the slideshow link
    $('#foxiswitch_slideshow').bind('click', function(){
      (playing) ? stopSlideShow() : playSlideShow();
    });
    // the help link
    $('#foxiswitch_help').hover(function(){
      (no_ie6) ? $('#foxiswitch_helptext').fadeIn(settings.speed) : $('#foxiswitch_helptext').show();
    }, function(){
      (no_ie6) ? $('#foxiswitch_helptext').fadeOut(settings.speed) : $('#foxiswitch_helptext').hide();
    });

    // initiate the list
    foxiswitch_list.find('li').each(function(){
      $(this).find('img').each(function(){
        if(!settings.externalImages){
          // create thumbnails
          var ratio = ($(this).width() / $(this).height());
          $(this).width(settings.thumbWidth);
		  $(this).height(settings.thumbHeight);
          //$(this).height(Math.round(settings.thumbWidth / ratio));
        }
      })

      // mouseover animation
      .bind('mouseenter', function(){
        if(no_ie6) $(this).fadeTo(settings.speed, 1);
      })

      // mouseout animation
      .bind('mouseleave', function(){
        if(no_ie6) $(this).parents('li').not('.active').find('img').fadeTo(settings.speed, settings.fade);
      })

      // clicking on a thumbnail it becomes active and animate
      //.bind('click', function(){
	  .bind('mouseover', function(){
        if(playing) stopSlideShow();
        if(no_ie6) foxiswitch_list.find('li.active img').fadeTo(settings.speed, settings.fade);
        foxiswitch_list.find('li.active').removeClass('active');
        $(this).parents('li').addClass('active');
        showImage($(this).parents('li'));
      });

      // initial outfading of all thumbnails
      if(no_ie6) $(this).find('img').fadeTo(settings.speed, settings.fade);

      // hide every image text
      $(this).find('span').hide();

      // disable link clicks
      $(this).find('a').bind('click', function(){
        return false;
      });
    });

    // initial fading in of the first image
    if(no_ie6) foxiswitch_list.find('li.active img').fadeTo(settings.speed, 1);

    // initial autoplay
    if(settings.autoplay){
      playing = true;
      $('#foxiswitch_slideshow').text(settings.textStop);
    }

    // initial show the first image
    showImage(foxiswitch_list.find('li.active'));

    // main function
    function showImage(element){
      var preload_img = new Image();

      // actions after loading the main image
      preload_img.onload = function(){
        var preload_width = 'auto';//preload_img.width;
        var preload_height = 400;//preload_img.height;
        if(no_ie6){

          // crossfading with new and old image
          $('#foxiswitch_image_new').css('z-index',0).fadeOut(1, function(){
            $(this).attr('src',  preload_img.src).width(preload_width).height(preload_height).fadeIn(settings.speed);
          });
          $('#foxiswitch_image_old').css('z-index',1).fadeOut(settings.speed, function(){
            if(settings.caption){
              $('#foxiswitch_caption').fadeOut(1, function(){
                $(this).html(element.find('span').html()).fadeIn(settings.speed);
              });
            }
            $('#foxiswitch_image_new').css('z-index',1);
            $('#foxiswitch_image_old').css('z-index',0).attr('src',  preload_img.src).width(preload_width).height(preload_height).fadeIn(1);
          });
        }

        // same for ie6 without fading
        else{
          $('#foxiswitch_image_new').attr('src',  preload_img.src).width(preload_img.width).height(preload_img.height);
          if(settings.caption) $('#foxiswitch_caption').html(element.find('span').html());
        }

        // slideshow timer
        if(playing) slideShowTimer();
      }
      preload_img.src = (settings.externalImages) ? element.find('a').attr('href') : element.find('img').attr('src');
    }

    function prevImage(){
      if(no_ie6) foxiswitch_list.find('li.active img').fadeTo(settings.speed, settings.fade);
      if(foxiswitch_list.find('li.active').hasClass('first')){
        foxiswitch_list.find('li.active').removeClass('active');
        foxiswitch_list.find('li.last').addClass('active');
      }
      else
        foxiswitch_list.find('li.active').removeClass('active').prev().addClass('active');
      if(no_ie6) foxiswitch_list.find('li.active img').fadeTo(settings.speed, 1);
      showImage(foxiswitch_list.find('li.active'));
    }

    function nextImage(){
      if(no_ie6) foxiswitch_list.find('li.active img').fadeTo(settings.speed, settings.fade);
      if(foxiswitch_list.find('li.active').hasClass('last')){
        foxiswitch_list.find('li.active').removeClass('active');
        foxiswitch_list.find('li.first').addClass('active');
      }
      else
        foxiswitch_list.find('li.active').removeClass('active').next().addClass('active');
      if(no_ie6) foxiswitch_list.find('li.active img').fadeTo(settings.speed, 1);
      showImage(foxiswitch_list.find('li.active'));
    }

    function playSlideShow(){
      playing = true;
      $('#foxiswitch_slideshow').text(settings.textStop + " (" + (settings.slideSpeed / 1000) + " sec.)");
      slideShowTimer();
    }

    function stopSlideShow(){
      playing = false;
      $('#foxiswitch_slideshow').text(settings.textPlay);
      foxiswitch_list.stop();
    }

    function slideShowTimer(){
      foxiswitch_list.animate({'top':0}, settings.slideSpeed, function(){
        nextImage();
      });
    }
  }
})(jQuery);
