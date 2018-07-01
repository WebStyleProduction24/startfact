<?php
            
            vc_map( array(
                "name"        => __( "Tooltip", 'asvc' ),
                "base"        => "asvc_tooltip",
                "icon"        => "asvc_tooltip_icon",
                "category" => __('VC Addons', 'js_composer'),
                "params"      => array(

                    array(
                        "type" => "dropdown",
                        "holder" => "",
                        "class" => "",
                        "heading" => __("Select Style", "asvc"),
                        "param_name" => "style",
                        "value" => array(
                            "With Text" => 'text',
                            "With Image" => 'image',
                        ),
                        "std" => 'text',
                        "admin_label" => true,
                        "description" => __("", "asvc")
                    ),
                    array(
                        "type"        => "textfield",
                        "class"       => "",
                        "heading"     => __( "Text", 'asvc' ),
                        "param_name"  => "text",
                        "admin_label" => true,
                        "value"       => "",
                        "description" => __("Text that display before tooltip", "asvc"),
                        'dependency' => array(
                            'element' => 'style',
                            'value' => 'text',
                        ),
                    ),
                    array(
                        "type" => "attach_image",
                        "heading" => __("Image", "asvc"),
                        "param_name" => "image",
                        "value" => "",
                        "dependency" => Array('element' => "style", 'value' => 'image'),
                        "description" => __("Select image from media library.", "asvc")
                    ),
                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Image Size', 'asvc' ),
                        'param_name'       => 'image_size',
                        "value" => 50,
                        "min" => 5,
                        "max" => 200,
                        "step" => 1,
                        "unit" => "px",
                        "dependency" => Array('element' => "style", 'value' => 'image'),
                    ),                                        
                    array(
                        "type" => "textarea_html",
                        "class" => "",
                        "heading" => __("Tooltip Text", "asvc"),
                        "param_name" => "content",
                        "value" => "",
                    ),
                    array(
                        "type" => "vc_link",
                        "class" => "",
                        "heading" => __("Link", "asvc"),
                        "param_name" => "link",
                        "value" => "",
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
                        "heading"     => __( "Background Color (Start)", "asvc" ),
                        "param_name"  => "bg_color_s",
                        "description" => __( "Choose tooltip background color", "asvc" ),
                        "group" => "Styles"
                    ),
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Background Color (End)", "asvc" ),
                        "param_name"  => "bg_color_e",
                        "description" => __( "Choose tooltip background color", "asvc" ),
                        "group" => "Styles"
                    ),
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Border Color", "asvc" ),
                        "param_name"  => "border_color",
                        "description" => __( "Choose tooltip border color", "asvc" ),
                        "group" => "Styles"
                    ),                     
                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Tooltip Font Size', 'asvc' ),
                        'param_name'       => 't_f_size',
                        "value" => 14,
                        "min" => 5,
                        "max" => 100,
                        "step" => 1,
                        "unit" => "px",
                        "description" => __("Chose Tooltip Font Size as Pixel. Default is 14px", "asvc"),
                        "group" => "Styles"
                    ),
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Tooltip Text color", "asvc" ),
                        "param_name"  => "t_text_color",
                        "description" => __( "Choose tooltip text color", "asvc" ),
                        "group"       => "Styles"
                    ),
                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Line Height', 'asvc' ),
                        'param_name'       => 'line_height',
                        "value" => 19,
                        "min" => 1,
                        "max" => 100,
                        "step" => 1,
                        "unit" => "px",
                        "description" => __("Provide paragraph line height", "asvc"),
                        "group" => "Styles"
                    ),




                )
            ) );
            
            function asvc_tooltip_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                    'style'    => '',
                    'text'    => 'hover me',
                    'image'      => '',
                    'image_size' => '50',
                    'link' => '',
                    'bg_color_s' => '#FBF5E6',
                    'bg_color_e' => '#FBF5E6',
                    'border_color' => '#CFB57C',
                    't_f_size' => '14',
                    'link' => '',
                    't_text_color' => '',
                    'line_height' => '19',
                    'extraclass' => '',
                    
                ), $atts ) );
                
                
                wp_register_style( 'tooltip-css', plugins_url( '/css/tooltip.css',  __FILE__) );
                wp_enqueue_style( 'tooltip-css' );
                
                
                $content = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content
                $image = wp_get_attachment_image_src( $image, 'full' );
                $link   = vc_build_link( $link );
                $output ='';
                
                $output .='<a href="'.$link['url'].'" title="'.$link['title'].'" target="'.$link['target'].'" class="tooltip '.$extraclass.'">';


            if ($style=='image') {
                $output .='<img src="'.$image[0].'" style="width:'.$image_size.'px;" alt="">';
            }   
            else{
                $output .=''.$text.'';
            }             
                
                $output .='<span style="border:1px solid '.$border_color.'; color: '.$t_text_color.'; font-size: '.$t_f_size.'px; line-height: '.$line_height.'px">
                                <b></b>
                                '.$content.'
                            </span>
                        </a>';


$output .='<style>a.tooltip > span {
        background: linear-gradient(top, '.$bg_color_s.', '.$bg_color_e.') !important;
        background: -webkit-linear-gradient(top, '.$bg_color_s.', '.$bg_color_e.') !important;
    }
        </style>';

                return $output;
            }


            add_shortcode( 'asvc_tooltip', 'asvc_tooltip_shortcode_function' );