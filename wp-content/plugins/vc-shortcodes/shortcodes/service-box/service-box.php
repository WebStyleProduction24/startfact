<?php
            
            vc_map( array(
                "name"        => __( "Service Box", 'asvc' ),
                "base"        => "asvc_servicebox",
                "icon"        => "asvc_servicebox_icon",
                "category" => __('VC Addons', 'js_composer'),
                'description' => __('premium addon', 'js_composer'),
                "params"      => array(
                
                    array(
                        "type" => "hvc_notice",
                        "class" => "",
                        'heading' => __('<h3 class="hvc_notice" align="center">This is premium addon, please buy the pro version here <a target="_blank" href="https://themebon.com/item/visual-composer-shortcodes-pro/">Visual Composer Addons Pro</a> for only $13</h3>', 'hvc'),
                        "param_name" => "hvc_notice_param_1",
                        "value" => '',
                    ),                

                    array(
                        "type" => "dropdown",
                        "holder" => "",
                        "class" => "",
                        "heading" => __("Box Style", "asvc"),
                        "param_name" => "style",
                        "value" => array(
                            "Style 1" => 1,
                            "Style 2" => 2,
                            "Style 3" => 3,
                            "Style 4" => 4,
                            "Style 5" => 5,
                        ),
                        "std" => 1,
                        "admin_label" => true,
                        "description" => __("", "asvc")
                    ),
                    
                    array(
                        "type" => "dropdown",
                        "holder" => "",
                        "class" => "",
                        "heading" => __("Direction", "asvc"),
                        "param_name" => "direction",
                        "value" => array(
                            "Up" => "up",
                            "Down" => "down",
                            "Left" => "left",
                            "Right" => "right",

                        ),
                        "std" => "up",
                        'dependency' => array(
                            'element' => 'style',
                            'value' => '1',
                        ),
                        "description" => __("Select animation direction", "asvc")
                    ),                    
                                        
                    array(
                        "type" => "dropdown",
                        "holder" => "",
                        "class" => "",
                        "heading" => __("Icon Type:", "asvc"),
                        "param_name" => "icon_type",
                        "value" => array(
                            "Icon (select the icon below)" => "icon",
                            "Image (choose the icon image below)" => "image"),
                        "std" => "icon",
                        "description" => __("", "asvc")
                    ),                    
                    
                    array(
                        "type" => "attach_image",
                        "heading" => __("Icon Image", "asvc"),
                        "param_name" => "icon_image",
                        "value" => "",
                        "dependency" => Array('element' => "icon_type", 'value' => 'image'),
                        "description" => __("Select image from media library.", "asvc")
                    ),                    
                                       
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'js_composer' ),
                        'param_name' => 'icon_fontawesome',
                        'value' => 'fa fa-camera', // default value to backend editor admin_label
                        'settings' => array(
                            'emptyIcon' => false, // default true, display an "EMPTY" icon?
                            'iconsPerPage' => 100, // default 100, how many icons per/page to display, we use (big prime_slider) to display all icons in single page
                        ),
                        'dependency' => array(
                            'element' => 'icon_type',
                            'value' => 'icon',
                        ),
                        'description' => __( 'Select icon from library.', 'js_composer' ),
                    ),

                                       
                    array(
                        "type" => "prime_slider",
                        "class" => "",
                        "heading" => __("Image Icon Size", "asvc"),
                        "param_name" => "image_icon_size",
                        "value" => 32,
                        "min" => 5,
                        "max" => 100,
                        "step" => 1,
                        "unit" => "px",
                        "description" => __("Provide icon size", "asvc"),
                        'dependency' => array(
                            'element' => 'icon_type',
                            'value' => 'image',
                        ),
                    ),
                    
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Icon Color", "asvc" ),
                        "param_name"  => "icon_color",
                        "value"       => "#343434",
                        "description" => __( "Choose icon color", "asvc" ),
                        'dependency' => array(
                            'element' => 'icon_type',
                            'value' => 'icon',
                        ),
                    ),                    
                   
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Icon Background Color", "asvc" ),
                        "param_name"  => "icon_bg_color",
                        "value"       => "",
                        "description" => __( "Choose icon bg color. Works with style 4 and 5", "asvc" ),
                        'dependency' => array(
                            'element' => 'icon_type',
                            'value' => 'icon',
                        ),
                    ),                                       
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Icon Hover Color", "asvc" ),
                        "param_name"  => "icon_hover_color",
                        "value"       => "",
                        "description" => __( "Choose icon hover color. Works with style 4 and 5", "asvc" ),
                        'dependency' => array(
                            'element' => 'icon_type',
                            'value' => 'icon',
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
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Box Color", "asvc" ),
                        "param_name"  => "box_color",
                        "description" => __( "Choose box color", "asvc" ),
                        'dependency' => array(
                            'element' => 'style',
                            'value' => '1',
                        ),
                    ),
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Box Border Color", "asvc" ),
                        "param_name"  => "border_color",
                        "description" => __( "Choose border color", "asvc" ),
                        'dependency' => array(
                            'element' => 'style',
                            'value' => '2',
                        ),
                    ),                                        
                    
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Line Color", "asvc" ),
                        "param_name"  => "line_color",
                        "description" => __( "Choose title bottom line color", "asvc" ),
                        'dependency' => array(
                            'element' => 'style',
                            'value' => '3',
                        ),
                    ),                    
                    array(
                        "type" => "dropdown",
                        "class" => "",
                        "heading" => __("On Click:", "asvc"),
                        "param_name" => "on_click",
                        "value" => array(
                            __("No Link","asvc") => "none",
                            __("Complete Box","asvc") => "box",
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
                "type" => "hvc_notice",
                "class" => "",
                'heading' => __('<h3 class="hvc_notice" align="center">To get this powerful addon, please buy the pro version here <a target="_blank" href="https://themebon.com/item/visual-composer-shortcodes-pro/">Visual Composer Addons Pro</a> for only $21</h3>', 'hvc'),
                "param_name" => "hvc_notice_param_1",
                "value" => '',
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
                    
                    
                    
                    
                )
            ) );
            
            function asvc_servicebox_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                    'style'    => '',
                    'direction'    => 'up',
                    'icon_type'       => '',
                    'icon'            => '',
                    'icon_image'      => '',
                    'icon_fontawesome' => '',
                    'icon_size' => '42',
                    'image_icon_size' => '42',
                    'icon_color' => '',
                    'icon_bg_color' => '',
                    'icon_hover_color' => '',
                    'title' => '',
                    'box_color' => '',
                    'border_color' => '',
                    'line_color' => '#e5b63c',
                    'on_click' => '',
                    'link' => '',
                    'bg_color' => '',
                    'title_f_size' => '18',
                    'desc_f_size' => '14',
                    'title_color' => '',
                    'descr_color' => '',
                    'extraclass' => '',
                    
                ), $atts ) );
                
                
                $output ='<h3>This addon for pro version. Please buy <a href="https://themebon.com/item/visual-composer-shortcodes-pro/">pro version from here</a></h3>';

                return $output;
            }


            add_shortcode( 'asvc_servicebox', 'asvc_servicebox_shortcode_function' );