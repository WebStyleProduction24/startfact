<?php
            
            vc_map( array(
                "name"        => __( "Dropcaps", 'asvc' ),
                "base"        => "asvc_dropcaps",
                "icon"        => "asvc_dropcaps_icon",
                "category" => __('VC Addons', 'js_composer'),
                "params"      => array(
                                       
                    array(
                        "type" => "textarea_html",
                        "class" => "",
                        "heading" => __("Dropcaps Text", "asvc"),
                        "param_name" => "content",
                        "value" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry is standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
                        "admin_label" => true,
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
                        "heading"     => __( "Color", "asvc" ),
                        "param_name"  => "color",
                        "description" => __( "Dropcap color", "asvc" ),
                        "group" => "Styles"
                    ), 
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Background Color", "asvc" ),
                        "param_name"  => "bg_color",
                        "description" => __( "Choose dropcap background color", "asvc" ),
                        "group" => "Styles"
                    ),                     
                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Width', 'asvc' ),
                        'param_name'       => 'width',
                        "value" => 45,
                        "min" => 1,
                        "max" => 500,
                        "step" => 1,
                        "unit" => "px",
                        "group" => "Styles"
                    ),
                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Height', 'asvc' ),
                        'param_name'       => 'height',
                        "value" => 45,
                        "min" => 1,
                        "max" => 500,
                        "step" => 1,
                        "unit" => "px",
                        "group" => "Styles"
                    ),
                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Font Size', 'asvc' ),
                        'param_name'       => 'f_size',
                        "value" => 40,
                        "min" => 1,
                        "max" => 500,
                        "step" => 1,
                        "unit" => "px",
                        "group" => "Styles"
                    ),                                        
                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Line Height', 'asvc' ),
                        'param_name'       => 'line_height',
                        "value" => 45,
                        "min" => 1,
                        "max" => 100,
                        "step" => 1,
                        "unit" => "px",
                        "description" => __("Provide paragraph line height", "asvc"),
                        "group" => "Styles"
                    ),




                )
            ) );
            
            function asvc_dropcaps_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                    'color' => '#fff',
                    'bg_color' => '#42bce2',
                    'width' => '45',
                    'height' => '45',
                    'f_size' => '40',
                    'line_height' => '45',
                    'extraclass' => '',
                    
                ), $atts ) );
                
                
                wp_register_style( 'dropcaps-css', plugins_url( '/css/dropcaps.css',  __FILE__) );
                wp_enqueue_style( 'dropcaps-css' );
                
                
                $content = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content
                $output ='';
                
                $check = trim(strip_tags($content));

                if(  !empty( $check ) ){
                    $ch = mb_substr($check, 0,1);
                    $pos = strpos($content, $ch);
                    $str_re = '<span style="color:'.$color.'; background:'.$bg_color.'; width:'.$width.'px; height: '.$height.'px; font-size:'.$f_size.'px; line-height:'.$line_height.'px" class="dropcaps-text">' . $ch .'</span>';
                    $content = substr_replace($content, $str_re, $pos, $pos+1);
                }
                else
                    $content = __('Dropcap: Text not found', 'asvc');
    
                $output .='<div class="kc-dropcaps '.$extraclass.'">
                            '.$content.'
                        </div>';
    
    
    

                return $output;
            }


            add_shortcode( 'asvc_dropcaps', 'asvc_dropcaps_shortcode_function' );