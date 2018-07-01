<?php
				
		vc_map( 
			array(
				"name"					=> __( "Woo Product Slider", "asvc" ),
				"description"			=> __( "Show latest products in Slider. (premium addon)", 'asvc' ),
				"base"					=> "asvc_woo_slider",
                "icon"                  => "asvc_woo_slider_icon",
				"category"				=> __( "VC Addons", "asvc" ),
				"params"				=> array(
                
                
                
            array(
                "type" => "hvc_notice",
                "class" => "",
                'heading' => __('<h3 class="hvc_notice" align="center">This is premium addon, please buy the pro version here <a target="_blank" href="https://themebon.com/item/visual-composer-shortcodes-pro/">Visual Composer Addons Pro</a> for only $13</h3>', 'hvc'),
                "param_name" => "hvc_notice_param_1",
                "value" => '',
            ),
                            
            array(
                "type" => "hvc_notice",
                "class" => "",
                'heading' => __('<h3 class="hvc_notice" align="center">Checkout our Latest Free Multipurpose WordPress Theme <a target="_blank" href="https://themebon.com/noor/">Noor - Free Responsive Multipurpose WordPress Theme</a></h3>', 'hvc'),
                "param_name" => "hvc_notice_param_10",
                "value" => '',
            ),
            
                	array(
						"type"			=> "textfield",
						"heading"		=> __( "Number Of Products", "asvc" ),
						"param_name"	=> "products",
						'admin_label' 	=> true,
						'value' 		=> '',
					),
                    array(
						"type"			=> "textfield",
						"heading"		=> __( "Products Category Slug", "asvc" ),
						"param_name"	=> "categories_id",
						'admin_label' 	=> true,
						'value' 		=> '',
                        "description" => __("Type products category slug to get specific category products into carousel. Leave empty for all categories products", "asvc")
					),                    
					// Slider
					array(
						"type"			=> "textfield",
						"heading"		=> __( "Items to Display", "asvc" ),
						"param_name"	=> "items",
						'admin_label'	=> true,
						"group"			=> __( "Slider", "asvc" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> __( "Items to Scrollby", "asvc" ),
						"param_name"	=> "items_scroll",
						"group"			=> __( "Slider", "asvc" ),
					),
            array(
                "type" => "hvc_notice",
                "class" => "",
                'heading' => __('<h3 class="hvc_notice" align="center">To get this powerful addon, please buy the pro version here <a target="_blank" href="https://themebon.com/item/visual-composer-shortcodes-pro/">Visual Composer Addons Pro</a> for only $21</h3>', 'hvc'),
                "param_name" => "hvc_notice_param_1",
                "value" => '',
                "group"			=> __( "Slider", "asvc" ),
            ),                    
					array(
						'type'			=> 'dropdown',
						'heading'		=> __( "Auto Play", 'asvc' ),
						'param_name'	=> "auto_play",
						'admin_label'	=> true,				
						'value'			=> array(
							__( 'True', 'asvc' )	=> 'true',
							__( 'False', 'asvc' )	=> 'false',
						),
						"group"			=> __( "Slider", "asvc" ),
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> __( 'Timeout Duration (in milliseconds)', 'asvc' ),
						'param_name'	=> "timeout_duration",
						'value'			=> "5000",
						'dependency'	=> array(
							'element'	=> "auto_play",
							'value'		=> 'true'
						),
						"group"			=> __( "Slider", "asvc" ),
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> __( "Infinite Loop", 'asvc' ),
						'param_name'	=> "infinite_loop",
						'value'			=> array(
							__( 'False', 'asvc' )	=> 'false',
							__( 'True', 'asvc' )	=> 'true',
						),
						"group"			=> __( "Slider", "asvc" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> __( "Margin ( Items Spacing )", "asvc" ),
						"param_name"	=> "margin",
						'admin_label'	=> true,
						"group"			=> __( "Slider", "asvc" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> __( "Items To Display in Tablet", "asvc" ),
						"param_name"	=> "items_tablet",
						"group"			=> __( "Slider", "asvc" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> __( "Items To Display In Mobile Landscape", "asvc" ),
						"param_name"	=> "items_mobile_landscape",
						"group"			=> __( "Slider", "asvc" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> __( "Items To Display In Mobile Portrait", "asvc" ),
						"param_name"	=> "items_mobile_portrait",
						"group"			=> __( "Slider", "asvc" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> __( "Navigation", "asvc" ),
						"param_name"	=> "navigation",
						"value"			=> array(
							__( "Yes", "asvc" )	=> "true",
							__( "No", "asvc" )	=> "false" ),
						"group"			=> __( "Slider", "asvc" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> __( "Pagination", "asvc" ),
						"param_name"	=> "pagination",
						"value"			=> array(
							__( "Yes", "asvc" )	=> "true",
							__( "No", "asvc" )	=> "false" ),
						"group"			=> __( "Slider", "asvc" ),
					),
                    array(
                        "type" => "dropdown",
                        "holder" => "",
                        "class" => "",
                        "heading" => __("Custom Image Height", "asvc"),
                        "param_name" => "image_size",
                        "value" => array(
                            "No" => 'no',
                            "Yes" => 'yes',
                        ),
                        "description" => __("custom image height for product image", "asvc"),
                        "group"		  => __( "Image Size", "asvc" ),
                    ),                    
                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Image Height', 'asvc' ),
                        'param_name'       => 'image_height',
                        "value" => 260,
                        "min" => 5,
                        "max" => 500,
                        "step" => 1,
                        "unit" => "px",
                        "dependency" => Array('element' => "image_size", 'value' => 'yes'),
                        "group"		  => __( "Image Size", "asvc" ),
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


                function asvc_woo_product_slider_shortcode( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                                'extraclass'				=> '',
                                'css_animation'				=> '',
                                'image_size'				=> '',
                                'image_height'				=> '',
                                'products' 					=> '-1',
                                'categories_id' 			=> 'all',
                                'items'						=> '6',
                                'items_scroll' 				=> '1',
                                'auto_play' 				=> 'true',					
                                'timeout_duration' 			=> '5000',
                                'infinite_loop' 			=> 'false',
                                'margin' 					=> '30',
                                'items_tablet'				=> '4',
                                'items_mobile_landscape'	=> '2',
                                'items_mobile_portrait'		=> '1',
                                'navigation' 				=> 'true',
                                'pagination' 				=> 'true',
                            ), $atts 
                        ) 
                    );


                    $output ='<h3>This addon for pro version. Please buy <a href="https://themebon.com/item/visual-composer-shortcodes-pro/">pro version from here</a></h3>';
                    
                    return $output;
                }

                add_shortcode( 'asvc_woo_slider', 'asvc_woo_product_slider_shortcode' );        