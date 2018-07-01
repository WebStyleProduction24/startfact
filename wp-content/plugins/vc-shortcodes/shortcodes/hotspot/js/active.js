
jQuery(document).ready(function($) {
    
var animateTooltips = function() {
    $('.asvc-hotspot-wrapper').each(function() {
        $(this).find('.HotspotPlugin_Hotspot').each(function(index) {
            var $self = $(this);
                if(!$self.hasClass('animation-completed')) {
                    $self.css('opacity', '1');
                }
                $self.waypoint(function () {
                    if(!$self.hasClass('animation-completed')) {
                        $self.addClass('animation-completed')
                            .velocity('transition.slideDownBigIn',{
                                display: 'block',
                                opacity: '1',
                                delay: index * 300,
                                complete: function(el) {
                                    $(el).css({
                                        '-webkit-transform': 'none',
                                        '-moz-transform': 'none',
                                        '-o-transform': 'none',
                                        'transform': 'none'
                                    });
                                }
                            });
                    }
                }, {offset: '90%'});
        });
    });
    $('.asvc-hotspot-wrapper .HotspotPlugin_Hotspot').each(function(index) {
        var $self = $(this),
            $tooltip = $self.find('> div'),
            selfWidth = $tooltip.outerWidth(),
            selfOffset = $tooltip.offset();
        
        $tooltip.removeClass('asvc-hotspot-left').removeClass('asvc-hotspot-right');
        
        if(selfOffset.left <= 0 && selfOffset.left + selfWidth > jQuery(window).windowWidth) {
            $tooltip.addClass('asvc-hotspot-outsite');
        } else if(selfOffset.left <= 0) {
            $tooltip.addClass('asvc-hotspot-left');
        } else if(selfOffset.left + selfWidth > jQuery(window).windowWidth) {
            $tooltip.addClass('asvc-hotspot-right');
        }
    });
};
$('.asvc-hotspot-wrapper').each(function() {
    var $self = $(this),
        hotspotClass = $self.data('hotspot-class') ? $self.data('hotspot-class') : 'HotspotPlugin_Hotspot',
        hotspotContent = $self.data('hotspot-content') ? $self.data('hotspot-content') : '',
        action = $self.data('action') ? $self.data('action') : 'hover';
    
    if(hotspotContent != '' && !$self.find('.asvc-hotspot-image-cover').hasClass('asvc-hotspot-initialized')) {
        $self.find('.asvc-hotspot-image-cover').addClass('asvc-hotspot-initialized').hotspot({
            hotspotClass: hotspotClass,
            interactivity: action,
            data: decodeURIComponent(hotspotContent)
        });
    }
});
$('body').on('asvc-hotspot-initialized', animateTooltips);
animateTooltips();
jQuery(window).on('resize', animateTooltips);
                
                
});



