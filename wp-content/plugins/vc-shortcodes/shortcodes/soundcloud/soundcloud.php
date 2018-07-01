<?php
            
            vc_map( array(
                "name"        => __( "SoundCloud", 'asvc' ),
                "base"        => "asvc_soundcloud",
                "icon"        => "asvc_soundcloud_icon",
                "category" => __('VC Addons', 'js_composer'),
                "params"      => array(

                    array(
                        "type"        => "textfield",
                        "class"       => "",
                        "heading"     => __( "SoundCloud Url", 'asvc' ),
                        "param_name"  => "url",
                        "admin_label" => true,
                        "value"       => "",
                        "description" => __("Enter SoundCloud url, Ex: https://soundcloud.com/travisscott-2/butterfly-effect", "asvc"),
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "",
                        "class" => "",
                        "heading" => __("Show Comments", "asvc"),
                        "param_name" => "comments",
                        "value" => array(
                            "Yes" => 'yes',
                            "No" => 'no',
                        ),
                        "description" => __("Choose to display comments", "asvc")
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "",
                        "class" => "",
                        "heading" => __("Autoplay", "asvc"),
                        "param_name" => "autoplay",
                        "value" => array(
                            "No" => 'no',
                            "Yes" => 'yes',
                        ),
                        "description" => __("Select to autoplay the track", "asvc")
                    ),                    
                    array(
                        "type" => "dropdown",
                        "holder" => "",
                        "class" => "",
                        "heading" => __("Show Buy & Like Buttons", "asvc"),
                        "param_name" => "buy_like_buttons",
                        "value" => array(
                            "Yes" => 'yes',
                            "No" => 'no',
                        ),
                        "description" => __("Select to show/hide buy & like buttons", "asvc")
                    ),                    
                    array(
                        "type" => "dropdown",
                        "holder" => "",
                        "class" => "",
                        "heading" => __("Show Artwork", "asvc"),
                        "param_name" => "show_artwork",
                        "value" => array(
                            "Yes" => 'yes',
                            "No" => 'no',
                        ),
                        "description" => __("Select to show/hide artwork", "asvc")
                    ),                    
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Color", "asvc" ),
                        "param_name"  => "color",
                        "value"  => "#FF5500",
                        "description" => __( "Select the color for play button and other controls", "asvc" ),
                    ), 
                    
                    array(
                        "type"        => "textfield",
                        "class"       => "",
                        "heading"     => __( "SoundCloud Url", 'asvc' ),
                        "param_name"  => "width",
                        "value"       => "100%",
                        "description" => __("Enter player width in percentage", "asvc"),                                                  ), 
                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Height', 'asvc' ),
                        'param_name'       => 'height',
                        "value" => 110,
                        "min" => 5,
                        "max" => 500,
                        "step" => 1,
                        "unit" => "px",
                        "description" => __( "Enter player height in pixels", "asvc" ),

                    ),                    
                    array(
                        "type" => "textfield",
                        "heading" => __("Extra class name", "asvc"),
                        "param_name" => "extraclass",
                        "value" => "",
                        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "asvc")
                    ),


                )
            ) );
            
            function asvc_soundcloud_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                    'url' 			=> 'https://soundcloud.com/travisscott-2/butterfly-effect',
                    'comments' 		=> '',
                    'autoplay' 		=> 'no',
                    'buy_like' 		=> 'no',
                    'show_artwork' 	=> 'yes',
                    'color' 		=> '#FF5500',				
                    'width' 		=> '100%',
                    'height' 		=> '81',
                    'extraclass' => '',
                    
                ), $atts ) );
                
                
                 if( $comments == 'yes' ) {
                    $comments = 'true';
                } elseif( $comments == 'no' ) {
                    $comments = 'false';
                }

                if( $autoplay == 'yes' ) {
                    $autoplay = 'true';
                } elseif( $autoplay == 'no' ) {
                    $autoplay = 'false';
                }
                
                if( $buy_like == 'yes' ) {
                    $buy_like = 'true';
                } elseif( $buy_like == 'no' ) {
                    $buy_like = 'false';
                }
                
                if( $show_artwork == 'yes' ) {
                    $show_artwork = 'true';
                } elseif( $show_artwork == 'no' ) {
                    $show_artwork = 'false';
                }

                if( $color != '' ) {
                    $color = str_replace('#', '', $color);
                }               
                
                
                
              $output ='<div class="soundcloud-shortcode '.$extraclass.'"><iframe width="'.$width.'" height="'.$height.'px" scrolling="no" src="https://w.soundcloud.com/player/?url=' . urlencode($url) . '&amp;show_comments=' . $comments . '&amp;auto_play=' . $autoplay . '&amp;color=' . $color . '&amp;buying=' . $buy_like . '&amp;liking=' . $buy_like . '&amp;show_artwork=' . $show_artwork . '"></iframe></div>';


                return $output;
            }


            add_shortcode( 'asvc_soundcloud', 'asvc_soundcloud_shortcode_function' );