jQuery(document).ready(function($) {

    jQuery('.popup-video').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'video_center_image',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: true
    });
    jQuery("body").css("display", "none");

});