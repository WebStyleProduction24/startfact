<?php
            
            vc_map( array(
                "name"        => __( "Moving Image", 'asvc' ),
                "base"        => "asvc_moving_image",
                "icon"        => "asvc_moving_image_icon",
                "category" => __('VC Addons', 'js_composer'),
                "params"      => array(
                    
                    array(
                        "type" => "attach_image",
                        "heading" => __("Upload Your image", "asvc") ,
                        "param_name" => "image",
                        "value" => "",
                        "description" => __("", "asvc")
                    ) ,
                    array(
                        "type" => "dropdown",
                        "heading" => __("Animation Style", "asvc") ,
                        "param_name" => "animation_style",
                        "value" => array(
                            "Vertical" => "vertical",
                            "Horizontally" => "horizontal",
                            "Pulse" => "pulse",
                            "Tossing" => "tossing",
                        ) ,
                        "description" => __("", "asvc")
                    ) ,
                    array(
                        "type" => "dropdown",
                        "heading" => __("Align", "asvc") ,
                        "param_name" => "align",
                        "width" => 150,
                        "value" => array(
                            __('Left', "asvc") => "left",
                            __('Right', "asvc") => "right",
                            __('Center', "asvc") => "center"
                        ) ,
                        "description" => __("", "asvc")
                    ) ,
                    array(
                        "type" => "textfield",
                        "heading" => __("Title & Alt", "asvc") ,
                        "param_name" => "title",
                        "value" => "",
                        "description" => __("For SEO purposes you may need to fill out the title and alt property for this image", "asvc")
                    ),
                    array(
                        "type" => "dropdown",
                        "class" => "",
                        "heading" => __("On Click:", "asvc"),
                        "param_name" => "on_click",
                        "value" => array(
                            __("No Link","asvc") => "none",
                            __("Do Link","asvc") => "do",
                        ),
                    ),                    
                    array(
                        "type" => "vc_link",
                        "class" => "",
                        "heading" => __("Add Link", "asvc"),
                        "param_name" => "link",
                        "value" => "",
                        "description" => __("Add a custom link or select existing page. You can remove existing link as well.", "asvc"),
                        'dependency' => array(
                            'element' => 'on_click',
                            'value' => 'do',
                        ),
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
            
            function asvc_moving_image_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                
                    'image'     => '',
                    'animation_style' => 'vertical',
                    'title'         => '',
                    'align'     => 'left',
                    'on_click'     => '',
                    'link'     => '',
                    'extraclass' => '',
                    
                ), $atts ) );             
                
                wp_register_style( 'moving-image-css', plugins_url( '/css/moving-image.css',  __FILE__) );
                wp_enqueue_style( 'moving-image-css' );  
                
                $image = wp_get_attachment_image_src( $image, 'full' ); 
                $link   = vc_build_link( $link );              
                $output ='';
      
                            
                $output .='<div class="vca-moving-image align-'.$align.' '.$extraclass.'">';
                
                if( $on_click=='do' ) { 
                    $output .='<a class="href" href="'.$link['url'].'" title="'.$link['title'].'" target="'.$link['target'].'">';  
                }
                
                $output .='<img class="vca-floating-'.$animation_style.'" alt="'.$title.'" title="'.$title.'" src="'.$image[0].'" />';
     
                if( $on_click=='do' ) { 
                    $output .='</a>';  
                }

            $output .='</div><div class="clearboth"></div>'; 


            return $output;
            
            }


            add_shortcode( 'asvc_moving_image', 'asvc_moving_image_shortcode_function' );