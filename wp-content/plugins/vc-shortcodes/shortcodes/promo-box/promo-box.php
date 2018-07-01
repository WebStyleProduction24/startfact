<?php
            
            vc_map( array(
                "name"        => __( "Promo Box", 'asvc' ),
                "base"        => "asvc_promobox",
                "icon"        => "asvc_promobox_icon",
                "category" => __('VC Addons', 'js_composer'),
                //'description' => __('Info text box', 'js_composer'),
                "params"      => array(
                                     
                    array(
                        "type" => "dropdown",
                        "holder" => "",
                        "class" => "",
                        "heading" => __("Background as:", "asvc"),
                        "param_name" => "bg_as",
                        "value" => array(
                            "Color" => "back_color",
                            "Image (choose the icon image below)" => "image"),
                        "std" => "bg_color",
                        "description" => __("", "asvc")
                    ),                    
                    
                    array(
                        "type" => "attach_image",
                        "heading" => __("Background Image", "asvc"),
                        "param_name" => "bg_image",
                        "value" => "",
                        "dependency" => Array('element' => "bg_as", 'value' => 'image'),
                        "description" => __("Select image from media library.", "asvc")
                    ),
                    array(
                        "type" => "dropdown",
                        "heading" => __("Image Overlay Color:", "asvc"),
                        "param_name" => "overlay_color",
                        "value" => array(
                            "Dark" => "dark",
                            "Light" => "light",
                            "Blue" => "blue",
                            "Red" => "red",
                            "Orange" => "orange",
                            "Gray" => "gray"),
                        "std" => "dark",
                        "dependency" => Array('element' => "bg_as", 'value' => 'image'),
                    ),                    
                                        
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Background Color", "asvc" ),
                        "param_name"  => "bg_color",
                        "value"       => "",
                        "description" => __( "Choose icon color", "asvc" ),
                        'dependency' => array(
                            'element' => 'bg_as',
                            'value' => 'back_color',
                        ),
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
                        "description" => __("Provide the description for this box.", "asvc"),
                    ),
                    
                    array(
                        "type" => "dropdown",
                        "holder" => "",
                        "class" => "",
                        "heading" => __("Button Style:", "asvc"),
                        "param_name" => "btn_style",
                        "value" => array(
                            "Gray" => "gray",
                            "Orange" => "orange",
                            "Dark" => "dark"),
                        "std" => "gray",
                        "description" => __("", "asvc")
                    ),                    
                    array(
                        "type" => "textfield",
                        "heading" => __("Button Text", "asvc"),
                        "param_name" => "btn_text",
                        "value" => "",
                        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "asvc")
                    ),                    
                    array(
                        "type" => "vc_link",
                        "class" => "",
                        "heading" => __("Add Link", "asvc"),
                        "param_name" => "link",
                        "value" => "",
                        "description" => __("Add a custom link or select existing page. You can remove existing link as well.", "asvc"),
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
                        "value" => 22,
                        "min" => 1,
                        "max" => 100,
                        "step" => 1,
                        "unit" => "px",
                        "description" => __("Provide paragraph line height", "asvc"),
                        "group" => "Typography"
                    ),                    
                    
                    
                    
                    
                )
            ) );
            
            function asvc_promobox_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                    //'style'    => '1',
                    'bg_as'    => '',
                    'bg_image' => '',
                    'overlay_color' => 'dark',
                    'title' => '',
                    'link' => '',
                    'btn_style' => 'gray',
                    'btn_text' => 'Sign Up',
                    'bg_color' => '',
                    'title_f_size' => '18',
                    'desc_f_size' => '14',
                    'title_color' => '',
                    'descr_color' => '',
                    'line_height' => '22',
                    'extraclass' => '',
                    
                ), $atts ) );
                
                
                wp_register_style( 'promobox-css', plugins_url( '/css/promo-box.css',  __FILE__) );
                wp_enqueue_style( 'promobox-css' );
                
                wp_register_style( 'servicebox-font-awesome', plugins_url( '../info-box/css/font-awesome.min.css',  __FILE__) );
                wp_enqueue_style( 'servicebox-font-awesome' );
                
                wp_register_script('asvc_jarallax', plugins_url('js/jarallax.js', __FILE__), array('jquery'), '', true );
                wp_enqueue_script('asvc_jarallax');
            
                
                
                $content = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content
                $bg_image = wp_get_attachment_image_src( $bg_image, 'full' );
                $link   = vc_build_link( $link );

                $output ='';
                
                    
                    if ( $bg_as=='image' ) {
                  
                    $output .='<div class="call-box-1 pad-t-50 pad-b-50 asvc-overlay overlay-'.$overlay_color.' '.$extraclass.'"  style="background-image:url('.$bg_image[0].'); background-size: 100% auto;">';
                    }
                    
                    if ( $bg_color ) {
                  
                    $output .='<div class="call-box-1 pad-t-50 pad-b-50 '.$extraclass.'" style="background: '.$bg_color.'; ">';
                    }

                    $output .='<h3 style="font-size:'.$title_f_size.'px; color:'.$title_color.';">'.$title.'</h3>
                               <p style="font-size:'.$desc_f_size.'px; color:'.$descr_color.'; line-height: '.$line_height.'px;">'.$content.'</p>
                               <a class="promo-btn btn-l btn-'.$btn_style.'" href="'.$link['url'].'" title="'.$link['title'].'" target="'.$link['target'].'">'.$btn_text.'</a>
                                </div>';
                           
                

                return $output;
            }


            add_shortcode( 'asvc_promobox', 'asvc_promobox_shortcode_function' );