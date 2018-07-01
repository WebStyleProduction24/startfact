<?php
            
            vc_map( array(
                "name"        => __( "Call to Action", 'asvc' ),
                "base"        => "asvc_call_to_action",
                "icon"        => "asvc_call_to_action_icon",
                "category" => __('VC Addons', 'js_composer'),
                "params"      => array(

                    array(
                        "type" => "dropdown",
                        "holder" => "",
                        "class" => "",
                        "heading" => __("Select Style", "asvc"),
                        "param_name" => "style",
                        "value" => array(
                            "Style 1" => 2,
                            "Style 2" => 3,
                        ),
                        "std" => 2,
                        "admin_label" => true,
                        "description" => __("", "asvc")
                    ),
                    array(
                        "type"        => "textfield",
                        "class"       => "",
                        "heading"     => __( "Title", 'asvc' ),
                        "param_name"  => "title",
                        "admin_label" => true,
                        "value"       => "",
                    ),
                    array(
                        "type" => "textarea_html",
                        "class" => "",
                        "heading" => __("Description", "asvc"),
                        "param_name" => "content",
                        "value" => "",
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "",
                        "class" => "",
                        "heading" => __("Show Button:", "asvc"),
                        "param_name" => "button_show",
                        "value" => array(
                            "No" => "no-button",
                            "Yes" => "kc-is-button",
                        ),
                    ),
                    array(
                        "type"        => "textfield",
                        "class"       => "",
                        "heading"     => __( "Button Text", 'asvc' ),
                        "param_name"  => "button_text",
                        "value"       => "Start Now",
                        'dependency' => array(
                            'element' => 'button_show',
                            'value' => 'kc-is-button',
                        ),                        
                    ),
                    array(
                        "type" => "vc_link",
                        "class" => "",
                        "heading" => __("Button URL (Link)", "asvc"),
                        "param_name" => "button_link",
                        "value" => "",
                        "description" => __("Add link to button.. You can remove existing link as well.", "asvc"),
                        'dependency' => array(
                            'element' => 'button_show',
                            'value' => 'kc-is-button',
                        ),
                    ), 
                    array(
                        "type" => "dropdown",
                        "holder" => "",
                        "class" => "",
                        "heading" => __("Show Icon:", "asvc"),
                        "param_name" => "icon_show",
                        "value" => array(
                            "No" => "no",
                            "Yes" => "yes",
                        ),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'js_composer' ),
                        'param_name' => 'icon',
                        'value' => 'fa fa-hand-o-right',
                        'settings' => array(
                            'emptyIcon' => false,
                            'iconsPerPage' => 100,
                        ),
                        'dependency' => array(
                            'element' => 'icon_show',
                            'value' => 'yes',
                        ),
                        'description' => __( 'Select icon from library.', 'js_composer' ),
                    ),
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Background Color", "asvc" ),
                        "param_name"  => "bg_color",
                        "description" => __( "Choose background color", "asvc" ),
                    ),                                                            
                    array(
                        "type" => "textfield",
                        "heading" => __("Extra class name", "asvc"),
                        "param_name" => "extraclass",
                        "value" => "",
                        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "asvc")
                    ),
                    


                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Title Font Size', 'asvc' ),
                        'param_name'       => 'title_f_size',
                        "value" => 18,
                        "min" => 5,
                        "max" => 100,
                        "step" => 1,
                        "unit" => "px",
                        "description" => __("Chose Title Font Size as Pixel. Default is 18px", "asvc"),
                        "group" => "Typography"
                    ),
                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Description Font Size', 'asvc' ),
                        'param_name'       => 'desc_f_size',
                        "value" => 14,
                        "min" => 5,
                        "max" => 100,
                        "step" => 1,
                        "unit" => "px",
                        "description" => __("Chose Description Font Size as Pixel. Default is 14px", "asvc"),
                        "group" => "Typography"
                    ),

                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Title color", "asvc" ),
                        "param_name"  => "title_color",
                        "description" => __( "Choose text color", "asvc" ),
                        "group"       => "Typography"
                    ),
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Description color", "asvc" ),
                        "param_name"  => "descr_color",
                        "description" => __( "Choose text color", "asvc" ),
                        "group"       => "Typography"
                    ),
                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Line Height', 'asvc' ),
                        'param_name'       => 'line_height',
                        "value" => 1,
                        "min" => 1,
                        "max" => 100,
                        "step" => 1,
                        "unit" => "px",
                        "description" => __("Provide paragraph line height", "asvc"),
                        "group" => "Typography"
                    ),
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Button Color", "asvc" ),
                        "param_name"  => "btn_color",
                        "group" => "Button"
                    ),                                        
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Button Background Color", "asvc" ),
                        "param_name"  => "btn_bg_color",
                        "value"       => "",
                        "group" => "Button"
                    ),
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Button Hover Color", "asvc" ),
                        "param_name"  => "btn_hover_color",
                        "value"       => "",
                        "group" => "Button"
                    ),




                )
            ) );
            
            function asvc_asvc_call_to_action_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                    'style'    => '',
                    'desc'      => '',
                    'button_show' => '',
                    'icon' => 'fa fa-hand-o-right',
                    'button_text' => 'Start Now',
                    'button_link' => '',
                    'icon_show' => '',
                    'btn_color' => '',
                    'btn_bg_color' => '',
                    'btn_hover_color' => '',
                    'title' => '',
                    'link' => '',
                    'bg_color' => '#FAFAFA',
                    'title_f_size' => '18',
                    'desc_f_size' => '14',
                    'title_color' => '',
                    'descr_color' => '',
                    'extraclass' => '',
                    
                ), $atts ) );
                
                
                wp_register_style( 'calltoaction-css', plugins_url( '/css/calltoaction.css',  __FILE__) );
                wp_enqueue_style( 'calltoaction-css' );
                
                wp_register_style( 'calltoaction-font-awesome', plugins_url( '../info-box/css/font-awesome.min.css',  __FILE__) );
                wp_enqueue_style( 'calltoaction-font-awesome' );
            
                
                
                $content = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content
                //$icon_image = wp_get_attachment_image_src( $icon_image, 'full' );
                $button_link   = vc_build_link( $button_link );
                $output ='';
                
                if ( $icon_show == 'yes' ) {
                    $btn_icon = ' <span class="kc-cta-icon"><i style="color:'.$btn_color.'" class="'. $icon .'"></i></span>';
                }                
                
                  
                $output .='<div class="'.$extraclass.' kc-call-to-action kc-cta-'.$style.' '.$button_show.'" style="background: '.$bg_color.'">

                            <div class="kc-cta-desc"><h2 style="font-size:'.$title_f_size.'px; color:'.$title_color.';">'.$title.'</h2>
                                <div style="font-size:'.$desc_f_size.'px; color:'.$descr_color.';" class="kc-cta-text">'.$content.'</div>
                            </div>';
                            
                    if ( $button_show == 'kc-is-button' && !empty( $button_text ) ) {        
                            
                        $output .='<div class="kc-cta-button"><a style="color:'.$btn_color.'; background: '.$btn_bg_color.'"  class="href" href="'.$button_link['url'].'" title="'.$button_link['title'].'" target="'.$button_link['target'].'">'.$button_text.' '.$btn_icon.'</a></div>';

                    }

                    $output .='</div>';


                        
                    $output .='<style>.kc-cta-button a:hover {
                                background: '.$btn_hover_color.' !important;
                                }
                            </style>';


                return $output;
            }


            add_shortcode( 'asvc_call_to_action', 'asvc_asvc_call_to_action_shortcode_function' );