/* Modal Boxes JS */
jQuery(document).ready(function(){
    jQuery('.asvc-md-trigger').click(function(){
        var _id = jQuery(this).data('id');
        jQuery('#modal-'+_id).addClass("md-show");
        jQuery('#overlay-'+_id).addClass("active");
        return false;
    });
    jQuery('.asvc-md-overlay').click(function(){
        var _id = jQuery(this).data('id');
        jQuery('#modal-'+_id).removeClass("md-show");
        jQuery(this).removeClass("active");
        return false;
    });
    jQuery('.asvc-modal-close').click(function(){
        var _id = jQuery(this).data('id');
        jQuery('#modal-'+_id).removeClass("md-show");
        jQuery('#overlay-'+_id).removeClass("active");
        return false;
    });
});