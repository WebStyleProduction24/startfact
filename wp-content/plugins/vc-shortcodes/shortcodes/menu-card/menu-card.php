<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

vc_map( array(
        "name" => __("Menu Card", 'asvc'),
        "base" => "asvc_menu_list",
        "icon" => "asvc_menu_card_icon",
        "as_parent" => array('only' => 'asvc_menu_list_item'),
    	"category" =>array( __('VC Addons', 'asvc'),__('Content', 'asvc')),
        "content_element" => true,
        "show_settings_on_create" => false,
        "description" =>  __('Restaurant style menu list', 'asvc'),
        "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("List", 'asvc'),
            "param_name" => "style",
    			'save_always' => true,
            "value" => array(
                    "Default" => "",
                    "Light" => "light"	
                )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'asvc'),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'asvc')
        )
        ),
        "js_view" => 'VcColumnView'
) );

vc_map( array(
        "name" => __("Menu Card Item", 'asvc'),
        "base" => "asvc_menu_list_item",
        "icon" => "asvc_menu_card_item_icon",
        "content_element" => true,
        "description" =>  __('Restaurant menu list item', 'asvc'),
        "as_child" => array('only' => 'asvc_menu_list'), 
        "params" => array(	
        	
        array(
          "type" => "textfield",
          "heading" => __("Title", 'asvc'),
          "admin_label" => true,
          "param_name" => "title"
        ),
        array(
          "type" => "textfield",
          "heading" => __("Price", 'asvc'),
          "param_name" => "price",
          "admin_label" => true
        ),
        array(
          "type" => "attach_image",
          "heading" => __("Menu item image", 'asvc'),
          "param_name" => "image",
          "value" => "",
          "description" => __("Select image from media library.", 'asvc')
        ),
        array(
            "type" => "checkbox",
            "class" => "",
            "heading" => "Use lightbox for image?",
            "value" => array("Yes, please" => "true" ),
            "param_name" => "uselightbox",
        ),
        array(
          "type" => "attach_image",
          "heading" => __("Menu item big image", 'asvc'),
          "param_name" => "bigimage",
          "value" => "",
          "description" => __("Select image from media library to display in lightbox.", 'asvc'),
          'dependency' => array( 'element' => 'uselightbox', 'value' => 'true')
        ),
        array(
          "type" => "textarea_html",
          "heading" => __("Description", 'asvc'),
          "holder"      => "div",
          "value" => "",
          "param_name" => "content"
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __("Description color", 'asvc'),
            "param_name" => "descriptioncolor",
            "value" => "",
            "description" => __("Select color for description", 'asvc')
        ),
        array(
            "type" => "checkbox",
            "class" => "",
            "heading" => "Display badge?",
            "value" => array("Yes, please" => "true" ),
            "param_name" => "usebadge",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Badge text", 'asvc'),
            "param_name" => "badge_text",
            "description" => __("Text displayed in badge", 'asvc'),
            "value" => "",
            'dependency' => array( 'element' => 'usebadge', 'value' => 'true')
        ),
    array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Badge color", 'asvc'),
        "param_name" => "badgecolor",
        "value" => "",
        "description" => __("Select color for badge", 'asvc'),
        'dependency' => array( 'element' => 'usebadge', 'value' => 'true')
        ),
    array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Badge text color", 'asvc'),
        "param_name" => "badgetextcolor",
        "value" => "",
        "description" => __("Select color for badge text", 'asvc'),
        'dependency' => array( 'element' => 'usebadge', 'value' => 'true')
        )
        )
) );

class WPBakeryShortCode_asvc_menu_list extends WPBakeryShortCodesContainer {
}
class WPBakeryShortCode_asvc_menu_list_item extends WPBakeryShortCode {
}

add_shortcode('asvc_menu_list', 'asvc_menu_list');
add_shortcode('asvc_menu_list_item', 'asvc_menu_list_item');


function asvc_menu_list( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'style' => '',
		"el_class" => ""
		), $atts));
        
    $output ='';
        
	$output .='<div class="asvc-rest-menu-list '.$el_class.' '.$style.'"><ul class="asvc-rest-menu-holder">';
	$output .= do_shortcode(strip_tags($content));
	$output .='</ul></div><div class="clearboth"></div>';
	return $output;
}
function asvc_menu_list_item( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'title' => '',
		'price' =>'',
		'image' => '',
		'uselightbox' => '',
		'bigimage' => '',
		'descriptioncolor' => '',
		'usebadge' => '',
		'badge_text' => '',
		'badgecolor' => '',
		'badgetextcolor' => ''
		), $atts));
        
    wp_register_style( 'menu-card-css', plugins_url( '/css/menu-card.css',  __FILE__) );
    wp_enqueue_style( 'menu-card-css' );        
        
    $output ='';
	$addclass = '';
	$badgestyle = 'style="';
	if ($badgecolor != '') $badgestyle .= 'background-color:'.$badgecolor.';';
	if ($badgetextcolor != '') $badgestyle .= 'color:'.$badgetextcolor.';';
	$badgestyle .= '"';
	$descstyle = 'style="';
	if ($descriptioncolor != '') $descstyle .= 'color:'.$descriptioncolor.';';
	$descstyle .= '"';

	$el_id =uniqid("bruno-custom-");
	if (is_numeric($image)) {
            $image_src = wp_get_attachment_url($image);
        } else {
            $image_src = $image;
        }
	if (is_numeric($bigimage)) {
            $bigimage_src = wp_get_attachment_url($bigimage);
        } else {
            $bigimage_src = $bigimage;
        }
	if ($image_src !='') $addclass = 'asvc-rest-menu-with-featured-image';
	$output .='<li class="asvc-rest-menu-item '.$addclass.' clearboth">';
	if ($image_src !='') {
	if (strtolower($uselightbox) == 'true' && $bigimage != '') 	$output .= '<a href="'.$bigimage_src.' "data-rel="bruno_lightbox">';
	$output .= "<div class='asvc-rest-menu-item-image'>";
	$output .= "<img src='".$image_src."' alt=''>";
	$output .= '</div>';
	if (strtolower($uselightbox) == 'true' && $bigimage != '') 	$output .= '</a>';
	}
	$output .= '<div class="asvc-rest-menu-item-content">';
	$output .= '<div class="asvc-rest-menu-top-holder">';
	$output .= '<div class="asvc-rest-menu-title-holder"><h3 class="asvc-rest-menu-title">'.$title.'</h3></div>';
	$output .= '<div class="asvc-rest-menu-line"></div>';
	$output .= '<div class="asvc-rest-menu-price-holder">	<h3 class="asvc-rest-menu-price">'.$price.'</h3></div>';
	$output .= '</div>';
	$output .= '<div class="asvc-rest-menu-bottom-holder">';
	$output .= '<div class="asvc-rest-menu-description-holder" '.$descstyle.'>'.wpb_js_remove_wpautop($content, true).'</div>';
	if (strtolower($usebadge) == 'true') { 
	$output .= '<div class="asvc-rest-menu-label-holder"><span class="asvc-rest-menu-label" '.$badgestyle.'><span>'.$badge_text.'</span></span></div>';
	}
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</li>';
	
	return $output;
	
}