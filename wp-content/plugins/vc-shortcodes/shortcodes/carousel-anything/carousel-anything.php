<?php 
if ( ! function_exists( 'asvc_content_carousel_shortcode_map' ) ) {
    function asvc_content_carousel_shortcode_map() {
        
        vc_map( 
            array(
                "name"					=> __( "Carousel Anything", "asvc" ),
                "description"			=> __( "Show your contents in carousel slider.", 'asvc' ),
                "base"					=> "asvc_vc_content_carousel",
                "as_parent" 			=> array( 'only' => 'vc_row' ),
                "js_view" 				=> 'VcColumnView',
                "category"				=> __( "VC Addons", "asvc" ),
                "icon"					=> "asvc_carousel_anything_icon",
                "params"				=> array(
                
                    array(
                        "type" => "hvc_notice",
                        "class" => "",
                        'heading' => __('<h3 class="hvc_notice" align="center">This is premium addon, please buy the pro version here <a target="_blank" href="https://themebon.com/item/visual-composer-shortcodes-pro/">Essential WPBakery Page Builder (formerly Visual Composer) Addons</a> for only $13</h3>', 'hvc'),
                        "param_name" => "hvc_notice_param_1",
                        "value" => '',
                    ),                 
                    array(
                        'type'			=> 'textfield',
                        'heading'		=> __( 'Extra Class', "asvc" ),
                        'param_name'	=> 'classes',
                        'value' 		=> '',
                    ),

                    // Slider
                    array(
                        "type"			=> "textfield",
                        "heading"		=> __( "Items to Display", "asvc" ),
                        "param_name"	=> "items",
                        'admin_label'	=> true,
                        "group"			=> __( "Slider", "asvc" ),
                    ),
                    array(
                        "type"			=> "textfield",
                        "heading"		=> __( "Items to Scrollby", "asvc" ),
                        "param_name"	=> "items_scroll",
                        "group"			=> __( "Slider", "asvc" ),
                    ),
                    array(
                        'type'			=> 'dropdown',
                        'heading'		=> __( "Auto Play", 'asvc' ),
                        'param_name'	=> "auto_play",
                        'admin_label'	=> true,
                        'value'			=> array(
                            __( 'True', 'asvc' )	=> 'true',
                            __( 'False', 'asvc' )	=> 'false',
                        ),
                        "group"			=> __( "Slider", "asvc" ),
                    ),
                    array(
                        'type'			=> 'textfield',
                        'heading'		=> __( 'Timeout Duration (in milliseconds)', 'asvc' ),
                        'param_name'	=> "timeout_duration",
                        'value'			=> "5000",
                        'dependency'	=> array(
                            'element'	=> "auto_play",
                            'value'		=> 'true'
                        ),
                        "group"			=> __( "Slider", "asvc" ),
                    ),
                    array(
                        'type'			=> 'dropdown',
                        'heading'		=> __( "Infinite Loop", 'asvc' ),
                        'param_name'	=> "infinite_loop",
                        'value'			=> array(
                            __( 'False', 'asvc' )	=> 'false',
                            __( 'True', 'asvc' )	=> 'true',
                        ),
                        "group"			=> __( "Slider", "asvc" ),
                    ),
                    array(
                        "type"			=> "textfield",
                        "heading"		=> __( "Margin ( Items Spacing )", "asvc" ),
                        "param_name"	=> "margin",
                        'admin_label'	=> true,
                        "group"			=> __( "Slider", "asvc" ),
                    ),
                    array(
                        "type"			=> "textfield",
                        "heading"		=> __( "Items To Display in Tablet", "asvc" ),
                        "param_name"	=> "items_tablet",
                        "group"			=> __( "Slider", "asvc" ),
                    ),
                    array(
                        "type"			=> "textfield",
                        "heading"		=> __( "Items To Display In Mobile Landscape", "asvc" ),
                        "param_name"	=> "items_mobile_landscape",
                        "group"			=> __( "Slider", "asvc" ),
                    ),
                    array(
                        "type"			=> "textfield",
                        "heading"		=> __( "Items To Display In Mobile Portrait", "asvc" ),
                        "param_name"	=> "items_mobile_portrait",
                        "group"			=> __( "Slider", "asvc" ),
                    ),
                    array(
                        "type"			=> 'dropdown',
                        "heading"		=> __( "Navigation", "asvc" ),
                        "param_name"	=> "navigation",
                        "value"			=> array(
                            __( "Yes", "asvc" )	=> "true",
                            __( "No", "asvc" )	=> "false" ),
                        "group"			=> __( "Slider", "asvc" ),
                    ),
                    array(
                        "type"			=> 'dropdown',
                        "heading"		=> __( "Pagination", "asvc" ),
                        "param_name"	=> "pagination",
                        "value"			=> array(
                            __( "Yes", "asvc" )	=> "true",
                            __( "No", "asvc" )	=> "false" ),
                        "group"			=> __( "Slider", "asvc" ),
                    ),
                ),
                'default_content' => '[vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner]',
            ) 
        );
    }
}
add_action( 'vc_before_init', 'asvc_content_carousel_shortcode_map' );

/**
 * We need to define this so that VC will show our nesting container correctly
 */
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Asvc_Vc_Content_Carousel extends WPBakeryShortCodesContainer {
    }
}

if ( ! function_exists( 'asvc_content_carousel_shortcode' ) ) {
    function asvc_content_carousel_shortcode( $atts, $content = NULL ) {
        
        extract( 
            shortcode_atts( 
                array(
                    'classes'					=> '',
                    'css_animation'				=> '',
                    'items'						=> '1',
                    'items_scroll' 				=> '1',
                    'auto_play'					=> 'true',
                    'timeout_duration'			=> '5000',
                    'infinite_loop' 			=> 'false',
                    'margin' 					=> '0',
                    'items_tablet'				=> '1',
                    'items_mobile_landscape'	=> '1',
                    'items_mobile_portrait'		=> '1',
                    'navigation' 				=> 'true',
                    'pagination' 				=> 'true',
                ), $atts 
            ) 
        );


        $output ='<h3>This addon for pro version. Please buy <a href="https://themebon.com/item/visual-composer-shortcodes-pro/">pro version from here</a></h3>';
        
        return $output;
    }
}
add_shortcode( 'asvc_vc_content_carousel', 'asvc_content_carousel_shortcode' );