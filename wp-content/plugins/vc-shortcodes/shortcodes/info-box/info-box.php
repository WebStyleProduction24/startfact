<?php
     
            vc_map( array(
                "name"        => __( "Info Box", 'asvc' ),
                "base"        => "asvc_infobox",
                "icon"        => "icon-wpb-information-white",
                "category" => __('VC Addons', 'js_composer'),
                //'description' => __('Info text box', 'js_composer'),
                "params"      => array(

                    array(
                        "type" => "dropdown",
                        "holder" => "",
                        "class" => "",
                        "heading" => __("Select Style", "asvc"),
                        "param_name" => "style",
                        "value" => array(
                            "Style 1" => "style-1",
                            "Style 2" => "style-2",
                            "Style 3" => "style-3",
                            "Style 4" => "style-4",
                            "Style 5" => "style-5",
                            "Style 6" => "style-6",
                        ),
                        "std" => "style-1",
                        "admin_label" => true,
                        "description" => __("", "asvc")
                    ),
                    
                    array(
                        'type' => 'dropdown',
                        'heading' => __( 'Display Icon as:', 'asvc' ),
                        'param_name' => 'display_as',
                        "value" => array(
                            "Circle" => "circle",
                            "Square" => "square",
                        ),
                        "std" => "circle",
                        'dependency' => array(
                            'element' => 'style',
                            'value' => 'style-6',
                        ),
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
                    
                    /*
                    array(
                        'type' => 'dropdown',
                        'heading' => __( 'Icon library', 'js_composer' ),
                        'value' => array(
                            __( 'Font Awesome', 'js_composer' ) => 'fontawesome',
                            __( 'Open Iconic', 'js_composer' ) => 'openiconic',
                            __( 'Typicons', 'js_composer' ) => 'typicons',
                            __( 'Entypo', 'js_composer' ) => 'entypo',
                            __( 'Linecons', 'js_composer' ) => 'linecons',
                        ),
                        "std" => "openiconic",
                        'admin_label' => true,
                        'param_name' => 'icon',
                        'dependency' => array('element' => 'icon_type', 'value' => 'icon',),
                        'description' => __( 'Select icon library.', 'js_composer' ),
                    ),  
                    */
                    
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
                            'iconsPerPage' => 100, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                        ),
                        'dependency' => array(
                            'element' => 'icon_type',
                            'value' => 'icon',
                        ),
                        'description' => __( 'Select icon from library.', 'js_composer' ),
                    ),
                    
                    /*
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'js_composer' ),
                        'param_name' => 'icon_openiconic',
                        'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
                        'settings' => array(
                            'emptyIcon' => false, // default true, display an "EMPTY" icon?
                            'type' => 'openiconic',
                            'iconsPerPage' => 100, // default 100, how many icons per/page to display
                        ),
                        'dependency' => array(
                            'element' => 'icon',
                            'value' => 'openiconic',
                        ),
                        'description' => __( 'Select icon from library.', 'js_composer' ),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'js_composer' ),
                        'param_name' => 'icon_typicons',
                        'value' => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
                        'settings' => array(
                            'emptyIcon' => false, // default true, display an "EMPTY" icon?
                            'type' => 'typicons',
                            'iconsPerPage' => 100, // default 100, how many icons per/page to display
                        ),
                        'dependency' => array(
                            'element' => 'icon',
                            'value' => 'typicons',
                        ),
                        'description' => __( 'Select icon from library.', 'js_composer' ),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'js_composer' ),
                        'param_name' => 'icon_entypo',
                        'value' => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
                        'settings' => array(
                            'emptyIcon' => false, // default true, display an "EMPTY" icon?
                            'type' => 'entypo',
                            'iconsPerPage' => 100, // default 100, how many icons per/page to display
                        ),
                        'dependency' => array(
                            'element' => 'icon',
                            'value' => 'entypo',
                        ),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'js_composer' ),
                        'param_name' => 'icon_linecons',
                        'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
                        'settings' => array(
                            'emptyIcon' => false, // default true, display an "EMPTY" icon?
                            'type' => 'linecons',
                            'iconsPerPage' => 100, // default 100, how many icons per/page to display
                        ),
                        'dependency' => array(
                            'element' => 'icon',
                            'value' => 'linecons',
                        ),
                        'description' => __( 'Select icon from library.', 'js_composer' ),
                    ),
                    */
                                       
                    array(
                        "type" => "prime_slider",
                        "class" => "",
                        "heading" => __("Icon Size", "asvc"),
                        "param_name" => "icon_size",
                        "value" => 42,
                        "min" => 16,
                        "max" => 100,
                        "step" => 1,
                        "unit" => "px",
                        "description" => __("Provide icon size", "asvc"),
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
                        "heading"     => __( "Icon Border Color", "asvc" ),
                        "param_name"  => "icon_border_color",
                        "value"       => "#343434",
                        "description" => __( "Choose icon border color", "asvc" ),
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
                        "value"       => "#ffffff",
                        "description" => __( "Choose icon bg color", "asvc" ),
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
                        "value"       => "#1293d4",
                        "description" => __( "Choose icon hover color", "asvc" ),
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
                        "description" => __("Provide the description for this icon box.", "asvc"),
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
                    
                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Title Font Size', 'asvc' ),
                        'param_name'       => 'title_f_size',
                        "value" => 18,
                        "min" => 10,
                        "max" => 50,
                        "step" => 1,
                        "unit" => "px",
                        "description" => __("Chose Title Font Size as Pixel. Default is 18px", "asvc"),
                        "group" => "Typography"
                    ),
                    // Description Font Size Field
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
                        'type' => 'css_editor',
                        'heading' => __( 'Css', 'asvc' ),
                        'param_name' => 'css_info_box',
                        'group' => __( 'Design ', 'asvc' ),
                        'edit_field_class' => 'asvc-info-box asvc-info-box-2 feature',
                    ),                    
                    
                    
                    
                    
                )
            ) );
            
            function asvc_infobox_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                    'style'    => '',
                    'display_as'    => '',
                    'icon_type'       => '',
                    'icon'            => '',
                    'icon_image'      => '',
                    'icon_fontawesome' => '',
                    'icon_openiconic' => '',
                    'icon_typicons' => '',
                    'icon_entypo' => '',
                    'icon_linecons' => '',
                    'icon_size' => '',
                    'icon_color' => '#343434',
                    'icon_border_color' => '#343434',
                    'icon_bg_color' => '#ffffff',
                    'icon_hover_color' => '#1293d4',
                    'title' => 'Title Here',
                    'on_click' => '',
                    'link' => '',
                    'bg_color' => '',
                    'title_f_size' => '18',
                    'desc_f_size' => '14',
                    'title_color' => '',
                    'descr_color' => '',
                    'extraclass' => '',
                    
                ), $atts ) );
                
                
                wp_register_style( 'infobox-css', plugins_url( '/css/info-box.css',  __FILE__) );
                wp_enqueue_style( 'infobox-css' );
                
                wp_register_style( 'infobox-font-awesome', plugins_url( '/css/font-awesome.min.css',  __FILE__) );
                wp_enqueue_style( 'infobox-font-awesome' );
                
                //wp_register_style( 'infobox-open-iconic', plugins_url( '/css/open-iconic.min.css',  __FILE__) );
                //wp_enqueue_style( 'infobox-open-iconic' );
                
                //wp_register_style( 'infobox-typicons', plugins_url( '/css/typicons.min.css',  __FILE__) );
                //wp_enqueue_style( 'infobox-typicons' );
                
                //wp_register_style( 'infobox-entypo', plugins_url( '/css/entypo.css',  __FILE__) );
                //wp_enqueue_style( 'infobox-entypo' );
                
                
                $content = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content
                $icon_image = wp_get_attachment_image_src( $icon_image, 'full' );
                $link   = vc_build_link( $link );

                
                if ( $style !== 'style-6' ) {
                
                    if ( $on_click == 'box' ) {
                        $output ='<a class="href" href="'.$link['url'].'" title="'.$link['title'].'" target="'.$link['target'].'">';      }
    
                    
                    $output .='<div class="services-list '.$extraclass.'">
                                    <div class="asvc-info-box asvc-info-box-'.$style.'">
                                        <div class="asvc-info-box-top">';
                                        
                    if ($icon_fontawesome) {                    
                        $output .='<span style="background-color:'.$icon_bg_color.';"><i style="font-size:'.$icon_size.'px; color:'.$icon_color.'; " class="'.$icon_fontawesome.'"></i></span>';
                    }
                    if ($icon_image) {
                        
                        $output .='<span><img style="box-shadow: none;" width="'.$icon_size.'px" src="'.$icon_image[0].'" alt=""></span>';
                    }
                    
                    $output .='<h4 style="font-size:'.$title_f_size.'px; color:'.$title_color.';" class="semi-title">'.$title.'</h4>
                                        </div>
                                    <div class="asvc-info-box-desc">';
                                            
                                        
                    $output .='<p style="font-size:'.$desc_f_size.'px; color:'.$descr_color.';">'.$content.'</p>                                               </div>
                                    </div>
                                </div>';
                                
                    if ( $on_click == 'box' ) {
                        $output .='</a>';
                    }
                    
                    $output .='<style>
                        .asvc-info-box:hover .asvc-info-box-top span i {
                            color:'.$icon_hover_color.' !important;
                        }

                    </style>';    
                              
                

                } //style 12345 end
            
                if ( $style == 'style-6' ) {
                    
                    if ( $on_click == 'box' ) {
                        $output ='<a class="href" href="'.$link['url'].'" title="'.$link['title'].'" target="'.$link['target'].'">';      }                
                    
                    $output .='<div class="asvc-info-box-2 '.$extraclass.'">
                                <div class="feature">
                                    <div class="icon parent">';
                                
                    
                    $output .='<div style="" class="circle parent">
                                    <div style="background:'.$icon_bg_color.'; " class="circle child-center">';
                                    
                                                            
                    if ($icon_fontawesome) {                    
                        $output .='<i style="font-size:'.$icon_size.'px; color:'.$icon_color.'; " class="'.$icon_fontawesome.' child-center"></i>';
                    }
                    if ($icon_image) {
                        
                        $output .='<img style="box-shadow: none;" class="child-center" width="'.$icon_size.'px" src="'.$icon_image[0].'" alt="">';
                    }
                                                
                    $output .= '</div>
                                </div>
                            </div>
                            <div class="content text-center">
                                <h3 style="font-size:'.$title_f_size.'px; color:'.$title_color.';">'.$title.'</h3>
                                <p style="font-size:'.$desc_f_size.'px; color:'.$descr_color.';">'.$content.'</p>
                            </div>
                        </div>
                    </div>';
                    
                    if ( $on_click == 'box' ) {
                        $output .='</a>';
                    }
                    
                    
                    $output .='<style>
                        .asvc-info-box-2 .feature:hover .icon .circle {
                            border-color: #bdc3c7 !important;
                        }
                        .asvc-info-box-2 .feature:hover .content h3 {
                            color: '.$icon_border_color.' !important;
                        }

                    </style>';                                       
                    
                    
                }





                return $output;
            }


            add_shortcode( 'asvc_infobox', 'asvc_infobox_shortcode_function' );