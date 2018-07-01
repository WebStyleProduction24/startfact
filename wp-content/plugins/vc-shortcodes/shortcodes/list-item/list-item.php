<?php
if ( ! function_exists( 'asvc_list_item_shortcode_map' ) ) {
    function asvc_list_item_shortcode_map() {
        
        vc_map( 
            array(
                "name"					=> __( "List Item", "asvc" ),
                "description"			=> __( "List your items with Icons.", 'asvc' ),
                "base"					=> "asvc_list_item",
                "category"				=> __( "VC Addons", "asvc" ),
                "icon"					=> "asvc_list_item_icon",
                "params"				=> array(					
                    array(
                        'type'			=> 'textfield',
                        'admin_label' 	=> true,
                        'heading'		=> __( 'Extra Class', "asvc" ),
                        'param_name'	=> 'classes',
                        'value' 		=> '',
                    ),
                    array(
                        "type"			=> "textarea_html",
                        "holder"		=> "div",
                        "heading"		=> __( "Content", "asvc" ),
                        "param_name"	=> "content",
                        "value"			=> __( 'I am text block. Please change this dummy text in your page editor for this list item section.', "asvc" ),						
                    ),
                    array(
                        "type"			=> "textfield",
                        "heading"		=> __( "Content Font Size", "asvc" ),
                        "description" 	=> __( "Enter Font Size in px. Ex: 20px", "asvc" ),
                        "param_name"	=> "content_size",						
                    ),
                    array(
                        "type"			=> "colorpicker",
                        "heading"		=> __( "Content Text Color", "asvc" ),
                        "param_name"	=> "content_color",						
                    ),
                    // Icon
                    array(
                        "type"			=> 'dropdown',
                        "heading"		=> __( "Alignment", "asvc" ),
                        "param_name"	=> "icon_align",
                        "value"			=> array(
                            __( "Default", "asvc" )	=> "default",
                            __( "Left", "asvc" )		=> "left",
                            __( "Right", "asvc" )		=> "right",
                        ),
                        "group"			=> __( "Icon", "asvc" ),
                    ),
                    array(
                        "type" 			=> "dropdown",
                        "heading" 		=> __( "Choose from Icon library", "asvc" ),
                        "value" 		=> array(
                            __( "Font Awesome", "asvc" ) 		=> "fontawesome",
                            //__( "Lineicons", "asvc" ) 		=> "lineicons",
                            //__( "Flaticons", "asvc" ) 		=> "flaticons",
                            //__( "Icomoon Pack 1", "asvc" ) 	=> "icomoonpack1",
                            //__( "Icomoon Pack 2", "asvc" ) 	=> "icomoonpack2",
                            //__( "Icomoon Pack 3", "asvc" ) 	=> "icomoonpack3",
                        ),
                        "admin_label" 	=> true,
                        "param_name" 	=> "type",
                        "description" 	=> __( "Select icon library.", "asvc" ),
                        "group"			=> __( "Icon", "asvc" ),
                    ),					
                    array(
                        "type" 			=> 'iconpicker',
                        "heading" 		=> __( "Icon", "asvc" ),
                        "param_name" 	=> "icon_fontawesome",
                        "value" 		=> "fa fa-minus-circle",
                        "settings" 		=> array(
                            "emptyIcon" 	=> true,
                            "iconsPerPage" 	=> 4000,
                        ),
                        "dependency" 	=> array(
                            "element" 	=> "type",
                            "value" 	=> "fontawesome",
                        ),
                        "description" 	=> __( "Select icon from library.", "asvc" ),
                        "group"			=> __( "Icon", "asvc" ),
                    ),				
                    array(
                        "type" 			=> 'iconpicker',
                        "heading" 		=> __( "Icon", "asvc" ),
                        "param_name" 	=> "icon_lineicons",
                        "value" 		=> "",
                        "settings" 		=> array(
                            "emptyIcon" 	=> true,
                            "type" 			=> 'simplelineicons',
                            "iconsPerPage" 	=> 4000,
                        ),
                        "dependency" 	=> array(
                            "element" 	=> "type",
                            "value" 	=> "lineicons",
                        ),
                        "description" 	=> __( "Select icon from library.", "asvc" ),
                        "group"			=> __( "Icon", "asvc" ),
                    ),
                    array(
                        "type" 			=> 'iconpicker',
                        "heading" 		=> __( "Icon", "asvc" ),
                        "param_name" 	=> "icon_flaticons",
                        "value" 		=> "",
                        "settings" 		=> array(
                            "emptyIcon" 	=> true,
                            "type" 			=> 'flaticons',
                            "iconsPerPage" 	=> 4000,
                        ),
                        "dependency" 	=> array(
                            "element" 	=> "type",
                            "value" 	=> "flaticons",
                        ),
                        "description" 	=> __( "Select icon from library.", "asvc" ),
                        "group"			=> __( "Icon", "asvc" ),
                    ),
                    array(
                        "type" 			=> 'iconpicker',
                        "heading" 		=> __( "Icon", "asvc" ),
                        "param_name" 	=> "icon_icomoonpack1",
                        "value" 		=> "",
                        "settings" 		=> array(
                            "emptyIcon" 	=> true,
                            "type" 			=> 'icomoonpack1',
                            "iconsPerPage" 	=> 4000,
                        ),
                        "dependency" 	=> array(
                            "element" 	=> "type",
                            "value" 	=> "icomoonpack1",
                        ),
                        "description" 	=> __( "Select icon from library.", "asvc" ),
                        "group"			=> __( "Icon", "asvc" ),
                    ),
                    array(
                        "type" 			=> 'iconpicker',
                        "heading" 		=> __( "Icon", "asvc" ),
                        "param_name" 	=> "icon_icomoonpack2",
                        "value" 		=> "",
                        "settings" 		=> array(
                            "emptyIcon" 	=> true,
                            "type" 			=> 'icomoonpack2',
                            "iconsPerPage" 	=> 4000,
                        ),
                        "dependency" 	=> array(
                            "element" 	=> "type",
                            "value" 	=> "icomoonpack2",
                        ),
                        "description" 	=> __( "Select icon from library.", "asvc" ),
                        "group"			=> __( "Icon", "asvc" ),
                    ),
                    array(
                        "type" 			=> 'iconpicker',
                        "heading" 		=> __( "Icon", "asvc" ),
                        "param_name" 	=> "icon_icomoonpack3",
                        "value" 		=> "",
                        "settings" 		=> array(
                            "emptyIcon" 	=> true,
                            "type" 			=> 'icomoonpack3',
                            "iconsPerPage" 	=> 4000,
                        ),
                        "dependency" 	=> array(
                            "element" 	=> "type",
                            "value" 	=> "icomoonpack3",
                        ),
                        "description" 	=> __( "Select icon from library.", "asvc" ),
                        "group"			=> __( "Icon", "asvc" ),
                    ),
                    array(
                        "type"			=> 'colorpicker',
                        "heading"		=> __( "Icon Color", "asvc" ),
                        "param_name"	=> "icon_color",
                        "group"			=> __( "Icon", "asvc" ),
                    ),		
                    array(
                        "type"			=> "textfield",
                        "heading"		=> __( "Icon Font Size", "asvc" ),
                        "param_name"	=> "icon_size",
                        "description" 	=> __( "Enter Icon Size in px. Ex: 15px", "asvc" ),
                        "group"			=> __( "Icon", "asvc" ),
                    ),
                    array(
                        "type"			=> "textfield",
                        "heading"		=> __( "Icon Spacing", "asvc" ),
                        "param_name"	=> "icon_spacing",
                        "description" 	=> __( "Enter Icon Right Spacing in px. Ex: 30px", "asvc" ),
                        "group"			=> __( "Icon", "asvc" ),			
                    ),
                )
            ) 
        );
    }
}
add_action( 'vc_before_init', 'asvc_list_item_shortcode_map' );

 
if ( ! function_exists( 'asvc_list_item_shortcode' ) ) {
    function asvc_list_item_shortcode( $atts, $content = NULL ) {
        
        $atts = vc_map_get_attributes( 'asvc_list_item', $atts );
        extract( $atts );

        wp_register_style( 'asvc-font-awesome', plugins_url( '../info-box/css/font-awesome.min.css',  __FILE__) );
        wp_enqueue_style( 'asvc-font-awesome' );
                        
        wp_register_style( 'asvc-list-item-css', plugins_url( '/css/list-item.css',  __FILE__) );
        wp_enqueue_style( 'asvc-list-item-css' );

        $output = '';
        $extra_class = '';

        // Icon style		
        $icon_style = '';
        if( $icon_color ) {
            $icon_style .= 'color:'. $icon_color .';';
        }
        if( $icon_size ) {
            $icon_style .= 'font-size:'. $icon_size .';';
        }		
        if( $icon_style ) {
            $icon_style = ' style="'. $icon_style  .'"';
        }		
        
        // Content						
        if( isset( $content ) && $content != '' ) {
            $content_style = '';
            if ( $content_size ) {
                $content_style .= 'font-size:'. $content_size.';';
            }
            if ( $content_color ) {
                $content_style .= 'color:'. $content_color.';';
            }
            if( isset( $icon_align ) && ( $icon_align == "default" || $icon_align == "left" ) ) {
                if ( $icon_spacing ) {
                    $content_style .= 'margin-left:'. $icon_spacing.';';
                }
            } else if( isset( $icon_align ) && $icon_align == 'right' ) {
                if ( $icon_spacing ) {
                    $content_style .= 'margin-right:'. $icon_spacing.';';
                }
            }
            if ( $content_style ) {
                $content_style = ' style="'. $content_style .'"';
            }
            
        }
        
        // Classes
        $main_classes = 'asvc-features-list-wrapper vc-features-list';
        
        if( isset( $classes ) && $classes != '' ) {
            $main_classes .= ' ' . $classes;
        }
        
        $output .= '<div class="'. esc_attr( $main_classes ) .'">';
            $output .= '<div class="features-list">';
                
                $output .= '<div class="features-list-inner list-text-'.$icon_align.'">';
                    // Icon
                    $output .= '<div class="features-icon'.$extra_class.'">';
                        if( isset( ${'icon_'. $type} ) && ${'icon_'. $type} != '' ) {								
                            $output .= '<i class="'. esc_attr( ${'icon_'. $type} ) .' list-icon"'.$icon_style.'></i>';
                        }
                    $output .= '</div>';
                    
                    // Content						
                    if( isset( $content ) && $content != '' ) {
                        $output .= '<div class="list-desc"'. $content_style .'>';
                            $output .= wpb_js_remove_wpautop( $content, true );
                        $output .= '</div>';
                    }				
                $output .= '</div>';
    
            $output .= '</div>';
        $output .= '</div>';
        
        return $output;
    }
}
add_shortcode( 'asvc_list_item', 'asvc_list_item_shortcode' );