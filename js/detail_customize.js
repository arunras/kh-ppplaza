/**************************************************/
/* Created by : RITH PHEARUN
/* Date       : 2011-12-24
/* EMail      : run@camitss.com
/* Company    : http://camitss.com
/**************************************************/

function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    /*
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });
    */
    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        scroll: 1,
        //auto: 2,
        visible: 5,
        animation: 'slow',
        //wrap: 'last',
        initCallback: mycarousel_initCallback
    });
});