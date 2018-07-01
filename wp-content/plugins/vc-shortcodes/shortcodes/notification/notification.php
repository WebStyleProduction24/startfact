<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* Alert box
---------------------------------------------------------- */
vc_map( array(
  "name" => esc_attr__("Notification Box", 'asvc'),
  "base" => "asvc-alert",
  "icon" => "asvc_notification_icon",
  "category" =>array( esc_attr__('VC Addons', 'asvc'),esc_attr__('Content', 'asvc')),
  "description" => esc_attr__('Box with notifications', 'asvc'),
  "params" => array(
     array(
      "type" => "dropdown",
      "class" => "",
      "heading" => esc_attr__("Type", 'asvc'),
      "param_name" => "type",
       'save_always' => true,
            "value" => array(
                "Success" => "success",	
                "Warning" => "warning",
                "Error" => "error",
                "Notice" => "notice"
            ),
      "std" => "success",
      "description" =>  esc_attr__('Select box style', 'asvc')
    ),

    array(
      "type" => "textfield",
      "heading" => esc_attr__("Title", 'asvc'),
      "param_name" => "title",
      "value" => esc_attr__("Success!", 'asvc')
    ),
    
    array(
        'type' => 'iconpicker',
        'heading' => __( 'Icon', 'js_composer' ),
        'param_name' => 'icon',
        'value' => '', // default value to backend editor admin_label
        'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'iconsPerPage' => 100, // default 100, how many icons per/page to display, we use (big prime_slider) to display all icons in single page
        ),
        'description' => __( 'Select icon from library.', 'js_composer' ),
        "admin_label" => true,
    ),
                        	 
    array(
      "type" => "textarea_html",
      "holder" => "div",
      "heading" => esc_attr__("Content", 'asvc'),
      "param_name" => "content",
      "value" => esc_attr__("Your message comes here.", 'asvc')
    ),
     array(
      "type" => "dropdown",
      "class" => "",
      "heading" => esc_attr__("Sticky?", 'asvc'),
      "param_name" => "sticky",
      'save_always' => true,
      "value" => array(
                "No" => "no",	
                "Yes" => "yes"
            ),
      "std" => "no",
      "description" =>  esc_attr__('If selected yes box will be closeable', 'asvc')
    ),
    array(
      "type" => "textfield",
      "heading" => esc_attr__("Extra class name", 'asvc'),
      "param_name" => "el_class",
      "description" => esc_attr__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'asvc')
    )
  )
) );


	function asvc_typo_alert_box($atts, $content = null) {
		extract(shortcode_atts(array(
			'type' => 'error',
			'sticky' => 'no',
			'title' => '',
			'icon' => ''
			), $atts));
        

        wp_register_style( 'alert-font-awesome', plugins_url( '../info-box/css/font-awesome.min.css',  __FILE__) );
        wp_enqueue_style( 'alert-font-awesome' );
                
        wp_register_style('asvc-alert', plugins_url('/css/notification.css', __FILE__));
        wp_enqueue_style('asvc-alert');
        
       
                         
            
		$class = ' class="asvc-notification '.$type.'"';
		$html = '<div '.$class.'>';
        $html .='<p>';
		if ($icon != '') {
		$html .= '<i class="'.$icon.'"></i>';
		}
		if ($title != '') {
		$html .= '<span>'.$title.'</span>';
		}
		$html .= $content;
		$html .= '</p>';
		if ($sticky != 'no') {
		$html .= '<a class="close"><i class="fa fa-close"></i></a>';
		}
		$html .= '</div>';
        
        $js  = '<script type="text/javascript">';
        $js .= 'jQuery(document).ready(function(){';
        $js .= 'jQuery("a.close").removeAttr("href").click(function(){
                    jQuery(this).parent().fadeOut(200);
                });';
        $js .= '})</script>';        
        
		
		return $js.$html;
	}
    
add_shortcode('asvc-alert', 'asvc_typo_alert_box');
