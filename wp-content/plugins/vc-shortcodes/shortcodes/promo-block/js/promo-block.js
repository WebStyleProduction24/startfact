jQuery(document).ready(function($) {
    
    $('.mgt-promo-block').each(function( index ) {
        $(this).attr('style', ($(this).attr('data-style')));
    });
    $('.mgt-promo-block-wrapper .mgt-promo-block-top-image').each(function( index ) {
        $(this).attr('style', ($(this).attr('data-style')));
    });
                
                
});