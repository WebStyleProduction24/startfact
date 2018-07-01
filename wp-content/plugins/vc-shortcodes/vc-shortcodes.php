<?php
/*
Plugin Name: Essential WPBakery Page Builder (formerly Visual Composer) Addons
Plugin URI: https://themebon.com/item/visual-composer-shortcodes-pro/
Description: Bundled with super useful Visual Composer elements with bunch of options to achieve any design with all the power of Visual Composer page builder for free.
Author: themebon
Author URI: https://themebon.com/
License: GPLv2 or later
Text Domain: asvc
Version: 1.9.2
*/

// Don't load directly
if (!defined('ABSPATH')){die('-1');}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'js_composer/js_composer.php' ) ){
    
/* Constants */
define( 'ASVC_URL', rtrim( plugin_dir_url( __FILE__ ), '/' ) );
define( 'ASVC_DIR', rtrim( plugin_dir_path( __FILE__ ), '/' ) );
if ( ! function_exists( 'prime_WordPressCheckup' ) ) {
    function prime_WordPressCheckup( $version = '3.8' ) {
        global $wp_version;
        if ( version_compare( $wp_version, $version, '>=' ) ) {
            return "true";
        } else {
            return "false";
        }
    }
}

// Admin Style CSS
function asvc_admin_enqeue() {
    
    wp_enqueue_style( 'asvc_admin_css', plugins_url( 'admin/admin.css', __FILE__ ) );
}
add_action( 'admin_enqueue_scripts', 'asvc_admin_enqeue' );


//params
require_once 'admin/params/index.php';



require_once( 'shortcodes/info-box/info-box.php' );
require_once( 'shortcodes/flip-box/flip-box.php' );
require_once( 'shortcodes/flip-box-two/flip-box-two.php' );
require_once( 'shortcodes/before-after/before-after.php' );
require_once( 'shortcodes/service-box/service-box.php' );
require_once( 'shortcodes/promo-box/promo-box.php' );
require_once( 'shortcodes/hover-effects/hover-effects.php' );
require_once( 'shortcodes/video-cover/video-cover.php' );
require_once( 'shortcodes/call-to-action/call-to-action.php' );
require_once( 'shortcodes/tooltip/tooltip.php' );
require_once( 'shortcodes/dropcaps/dropcaps.php' );
require_once( 'shortcodes/divider/divider.php' );
require_once( 'shortcodes/image-caption/image-caption.php' );
require_once( 'shortcodes/team/team.php' );
require_once( 'shortcodes/profile-card/profile-card.php' );
require_once( 'shortcodes/contact-info/contact-info.php' );
require_once( 'shortcodes/moving-image/moving-image.php' );
require_once( 'shortcodes/soundcloud/soundcloud.php' );
require_once( 'shortcodes/twitter_slider/twitter_slider.php' );
require_once( 'shortcodes/woo-slider/woo-slider.php' );
require_once( 'shortcodes/video-popup/video-popup.php' );
require_once( 'shortcodes/latest-posts-slider/latest-posts-slider.php' );
require_once( 'shortcodes/table/table.php' );
require_once( 'shortcodes/button-set/button-set.php' );
require_once( 'shortcodes/edd/edd.php' );
require_once( 'shortcodes/list-item/list-item.php' );
require_once( 'shortcodes/carousel-anything/carousel-anything.php' );
require_once( 'shortcodes/timeline/timeline.php' );
require_once( 'shortcodes/progressbar/progressbar.php' );
require_once( 'shortcodes/menu-card/menu-card.php' );
require_once( 'shortcodes/hotspot/hotspot.php' );
require_once( 'shortcodes/pricing-table/pricing-table.php' );
require_once( 'shortcodes/modal/modal.php' );
require_once( 'shortcodes/notification/notification.php' );
require_once( 'shortcodes/header-block/header-block.php' );
require_once( 'shortcodes/promo-block/promo-block.php' );
require_once( 'shortcodes/button/button.php' );
require_once( 'shortcodes/flip-box-advanced/flip-box-advanced.php' );
require_once( 'shortcodes/process/process.php' );
require_once( 'shortcodes/counter/counter.php' );
require_once( 'shortcodes/animate-text/animate-text.php' );
require_once( 'shortcodes/carousel/carousel.php' );





    }
// Check If VC is activate
else {
    function asvc_required_plugin() {
        if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'js_composer/js_composer.php' ) ) {
            add_action( 'admin_notices', 'asvc_required_plugin_notice' );

            deactivate_plugins( plugin_basename( __FILE__ ) ); 

            if ( isset( $_GET['activate'] ) ) {
                unset( $_GET['activate'] );
            }
        }

    }
add_action( 'admin_init', 'asvc_required_plugin' );

    function asvc_required_plugin_notice(){
        ?><div class="error"><p>Error! you need to install or activate the <a target="_blank" href="https://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431?ref=themebonwp">WPBakery Page Builder for WordPress (formerly Visual Composer)</a> plugin to run "<span style="font-weight: bold;">Essential WPBakery Page Builder (formerly Visual Composer) Addons</span>" plugin.</p></div><?php
    }
}
?>