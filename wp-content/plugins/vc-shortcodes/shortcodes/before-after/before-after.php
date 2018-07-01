<?php
            
            vc_map( array(
                "name"        => __( "Before After", 'asvc' ),
                "base"        => "asvc_before_after",
                "icon"        => "asvc_before_after_icon",
                "category" => __('VC Addons', 'js_composer'),
                //'description' => __('Info text box', 'js_composer'),
                "params"      => array(
            
                    
                    array(
                        "type" => "attach_image",
                        "heading" => __("Before Image", "asvc"),
                        "param_name" => "before_image",
                        "value" => "",
                        "description" => __("Select image from media library for before.", "asvc")
                    ),                    
                    array(
                        "type" => "attach_image",
                        "heading" => __("After Image", "asvc"),
                        "param_name" => "after_image",
                        "value" => "",
                        "description" => __("Select image from media library for after.", "asvc")
                    ),
                            
                    array(
                        "type" => "dropdown",
                        "class" => "",
                        "heading" => __("On Click:", "asvc"),
                        "param_name" => "on_click",
                        "value" => array(
                            __("Do Nothing","asvc") => "none",
                            __("Complete Box","asvc") => "box",
                        ),
                        "description" => __("Select whether to use color for icon or not.", "asvc")
                    ),
                    // Add link to existing content or to another resource
                    array(
                        "type" => "vc_link",
                        "class" => "",
                        "heading" => __("Add Link", "asvc"),
                        "param_name" => "link",
                        "value" => "",
                        "description" => __("Add a custom link or select existing page. You can remove existing link as well.", "asvc"),
                        'dependency' => array(
                            'element' => 'on_click',
                            'value' => 'box',
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
            
            function asvc_before_after_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                    'before_image'    => '',
                    'after_image'    => '',
                    'on_click'    => '',
                    'link'    => '',
                    'extraclass'       => '',
                    
                ), $atts ) );
                
                
                wp_register_style('asvc_ba_css', plugins_url( 'css/before-after.css' , __FILE__ ) );
                wp_register_script('asvc_event_move', plugins_url('js/jquery.event.move.js', __FILE__), array('jquery'), '', false);
                wp_register_script('asvc_twentytwenty_js', plugins_url('js/jquery.twentytwenty.js', __FILE__), array('jquery'), '', false );

                wp_enqueue_style( 'asvc_ba_css' );
                wp_enqueue_script( 'asvc_event_move' );
                wp_enqueue_script( 'asvc_twentytwenty_js' );

                
                
                $content = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content
                $before_image = wp_get_attachment_image_src( $before_image, 'full' );
                $after_image = wp_get_attachment_image_src( $after_image, 'full' );
                $link   = vc_build_link( $link );
                $output ='';

                $id = rand(1000, 100000);
                
                if ( $on_click == 'box' ) {
                        $output ='<a class="href" href="'.$link['url'].'" title="'.$link['title'].'" target="'.$link['target'].'">'; }            
                        
                $output .='<div class="'.$extraclass.'" id="container_'.$id.'">
                                <img src="'.$before_image[0].'">
                                <img src="'.$after_image[0].'">
                            </div>';
                            
                if ( $on_click == 'box' ) {
                        $output .='</a>';
                    }            
                
                $output .='<script>
                                jQuery(window).load(function() {
                                    jQuery("#container_'.$id.'").twentytwenty();
                                });
                            </script>';




                return $output;
            }


            add_shortcode( 'asvc_before_after', 'asvc_before_after_shortcode_function' );