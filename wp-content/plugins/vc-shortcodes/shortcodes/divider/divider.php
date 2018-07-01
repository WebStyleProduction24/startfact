<?php
            
            vc_map( array(
                "name"        => __( "Divider", 'asvc' ),
                "base"        => "asvc_divider",
                "icon"        => "asvc_divider_icon",
                "category" => __('VC Addons', 'js_composer'),
                "params"      => array(

                    array(
                        "type" => "dropdown",
                        "holder" => "",
                        "class" => "",
                        "heading" => __("Select Style:", "asvc"),
                        "param_name" => "style",
                        "value" => array(
                            "Line Simple" => 1,
                            "Line With Icon" => 2,
                            "Line With Text" => 3,
                        ),
                        "std" => 1,
                        "admin_label" => true,
                        "description" => __("", "asvc")
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'js_composer' ),
                        'param_name' => 'icon',
                        'value' => 'fa fa-heart',
                        'settings' => array(
                            'emptyIcon' => false,
                            'iconsPerPage' => 100,
                        ),
                        'dependency' => array(
                            'element' => 'style',
                            'value' => '2',
                        ),
                        'description' => __( 'Select icon from library for divider.', 'js_composer' ),
                    ),
                    array(
                        "type"        => "textfield",
                        "class"       => "",
                        "heading"     => __( "Text Line", 'asvc' ),
                        "param_name"  => "line_text",
                        "value"       => "",
                        "description" => __( "Text display center line.", "asvc" ),
                        'dependency' => array(
                            'element' => 'style',
                            'value' => '3',
                        ),                        
                    ),                                                         
                    array(
                        "type" => "textfield",
                        "heading" => __("Extra class name", "asvc"),
                        "param_name" => "extraclass",
                        "value" => "",
                        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "asvc")
                    ),
                    
                    

                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Line Color", "asvc" ),
                        "param_name"  => "line_color",
                        "group" => "Line"
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "",
                        "class" => "",
                        "heading" => __("Divider Style:", "asvc"),
                        "param_name" => "d_style",
                        "value" => array(
                            "Solid" => "solid",
                            "Dotted" => "dotted",
                            "Dashed" => "dashed",
                            "Double" => "double",
                            "Groove" => "groove",
                            "Ridge" => "ridge",
                            "Inset" => "inset",
                            "Outset" => "outset",
                            "Initial" => "initial",
                            "Inherit" => "inherit",

                        ),
                        "std" => "solid",
                        "group" => "Line"
                    ),
                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Line Width', 'asvc' ),
                        'param_name'       => 'line_width',
                        //"value" => "",
                        "min" => 1,
                        "max" => 500,
                        "step" => 1,
                        "unit" => "px",
                        "group" => "Line"
                    ),
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Color", "asvc" ),
                        "param_name"  => "icon_color",
                        "group" => "Icon"
                    ),
                    /*                                                            
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Background Color", "asvc" ),
                        "param_name"  => "icon_bg_color",
                        "group" => "Icon"
                    ),
                    */                     
                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Size', 'asvc' ),
                        'param_name'       => 'icon_size',
                        "value" => 20,
                        "min" => 1,
                        "max" => 500,
                        "step" => 1,
                        "unit" => "px",
                        "group" => "Icon"
                    ),
                    
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Color", "asvc" ),
                        "param_name"  => "text_color",
                        "group" => "Text"
                    ),                                                            
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Background Color", "asvc" ),
                        "param_name"  => "text_bg_color",
                        "group" => "Text"
                    ),                     
                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Font Size', 'asvc' ),
                        'param_name'       => 'text_f_size',
                        "value" => 16,
                        "min" => 1,
                        "max" => 500,
                        "step" => 1,
                        "unit" => "px",
                        "group" => "Text"
                    ),                    
                    



                )
            ) );
            
            function asvc_divider_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                
                    'style' => '1',
                    'icon' => 'fa fa-heart',
                    'line_text' => '',
                    'line_color' => '',
                    'd_style' => '',
                    'line_width' => '',
                    'icon_color' => '',
                    //'icon_bg_color' => '',
                    'icon_size' => '',
                    'text_color' => '',
                    'text_bg_color' => '',
                    'text_f_size' => '',
                    'extraclass' => '',
                    
                ), $atts ) );
                
                
                wp_register_style( 'divider-css', plugins_url( '/css/divider.css',  __FILE__) );
                wp_enqueue_style( 'divider-css' );
                
                
                $content = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content
                $output ='';
                
                $output .='<div class="divider_line '.$extraclass.'">
                    <div style="border-color:'.$line_color.'; border-style:'.$d_style.'" class="divider_inner divider_line'. $style.'">';
    
                switch ( $style ) {
                    case '2':
                        if ( !empty( $icon ) )
                            $output .='<i style="color:'.$icon_color.'; font-size:'.$icon_size.'px" class="'.$icon.'"></i>';
                    break;
                    case '3':
                        if ( !empty( $line_text ) )
                            $output .='<span style="color:'.$text_color.'; background-color:'.$text_bg_color.'; font-size:'.$text_f_size.'px" class="line_text">'.$line_text.'</span>';
                    break;
                    default:
                    
                    break;
                }    
    

                return $output;
            }


            add_shortcode( 'asvc_divider', 'asvc_divider_shortcode_function' );