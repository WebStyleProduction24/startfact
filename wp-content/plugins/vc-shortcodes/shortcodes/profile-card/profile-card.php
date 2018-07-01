<?php

            
            vc_map( array(
                "name"        => __( "Profile Card", 'asvc' ),
                "base"        => "asvc_profile_card",
                "icon"        => "asvc_profile_card_icon",
                "category" => __('VC Addons', 'js_composer'),
                "params"      => array(
                    
                /*
                    array(
                        "type" => "dropdown",
                        "holder" => "",
                        "class" => "",
                        "heading" => __("Select Style:", "asvc"),
                        "param_name" => "style",
                        "value" => array(
                            "Style 1" => 'style1',
                            "Style 2" => 'style2',
                        ),
                        "std" => 'style1',
                        "admin_label" => true,
                        "description" => __("", "asvc")
                    ),
                */    
                    array(
                        "type" => "attach_image",
                        "heading" => __("Card Image", "asvc"),
                        "param_name" => "image",
                        "value" => "",
                        "description" => __("Select image from media library.", "asvc"),
                    ),                    
                    array(
                        "type"        => "textfield",
                        "class"       => "",
                        "heading"     => __( "Profile Name", 'asvc' ),
                        "param_name"  => "name",
                        "value"       => "John Doe",                      
                    ),                     
                    array(
                        "type"        => "textfield",
                        "class"       => "",
                        "heading"     => __( "Profile Position", 'asvc' ),
                        "param_name"  => "position",
                        "value"       => "Web designer",                      
                    ),
                    array(
                        "type" => "textarea_html",
                        "class" => "",
                        "heading" => __("Profile Description", "asvc"),
                        "param_name" => "content",
                        "value" => "",
                        "description" => __("Provide the description for this box.", "asvc"),
                    ),
                    array(
                        "type" => "dropdown",
                        "class" => "",
                        "heading" => __("Link:", "asvc"),
                        "param_name" => "add_link",
                        "value" => array(
                            __("No","asvc") => "no",
                            __("Yes","asvc") => "yes",
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
                            'element' => 'add_link',
                            'value' => 'yes',
                        ),
                    ),
                    array(
                        "type"        => "textfield",
                        "class"       => "",
                        "heading"     => __( "Link Text", 'asvc' ),
                        "param_name"  => "link_text",
                        "value"       => "Read More",
                        'dependency' => array(
                            'element' => 'add_link',
                            'value' => 'yes',
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
                        "type"        => "textfield",
                        "class"       => "",
                        "heading"     => __( "Facebook Link", 'asvc' ),
                        "param_name"  => "f_link",
                        "value"       => "#",
                        "description" => __("Leave empty if do not want.", "asvc"),
                        "group" => "Social Link(s)"                      
                    ),                    
                    array(
                        "type"        => "textfield",
                        "class"       => "",
                        "heading"     => __( "Twitter Link", 'asvc' ),
                        "param_name"  => "t_link",
                        "value"       => "#",
                        "description" => __("Leave empty if do not want.", "asvc"),
                        "group" => "Social Link(s)"                      
                    ),                    
                    array(
                        "type"        => "textfield",
                        "class"       => "",
                        "heading"     => __( "Goolge+ Link", 'asvc' ),
                        "param_name"  => "g_link",
                        "value"       => "#",
                        "description" => __("Leave empty if do not want.", "asvc"),
                        "group" => "Social Link(s)"                      
                    ),                    
                    array(
                        "type"        => "textfield",
                        "class"       => "",
                        "heading"     => __( "Instagram Link", 'asvc' ),
                        "param_name"  => "i_link",
                        "value"       => "#",
                        "description" => __("Leave empty if do not want.", "asvc"),
                        "group" => "Social Link(s)"                      
                    ),
                    array(
                        "type"        => "textfield",
                        "class"       => "",
                        "heading"     => __( "Pinterest Link", 'asvc' ),
                        "param_name"  => "p_link",
                        "value"       => "#",
                        "description" => __("Leave empty if do not want.", "asvc"),
                        "group" => "Social Link(s)"                      
                    ),
                    array(
                        "type"        => "textfield",
                        "class"       => "",
                        "heading"     => __( "Linkedin Link", 'asvc' ),
                        "param_name"  => "l_link",
                        "value"       => "#",
                        "description" => __("Leave empty if do not want.", "asvc"),
                        "group" => "Social Link(s)"                      
                    ),                                        
                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Image Width', 'asvc' ),
                        'param_name'       => 'img_width',
                        "value" => 236,
                        "min" => 1,
                        "max" => 500,
                        "step" => 1,
                        "unit" => "px",
                        "group" => "Styles"
                    ),                    
                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Image Height', 'asvc' ),
                        'param_name'       => 'img_height',
                        "value" => 236,
                        "min" => 1,
                        "max" => 500,
                        "step" => 1,
                        "unit" => "px",
                        "group" => "Styles"
                    ),                     
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Color", "asvc" ),
                        "param_name"  => "color",
                        "value"  => "#fb3e76",
                        "group" => "Styles"
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
                        "group" => "Styles"
                    ),
                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Line Height', 'asvc' ),
                        'param_name'       => 'line_height',
                        "value" => 24,
                        "min" => 1,
                        "max" => 100,
                        "step" => 1,
                        "unit" => "px",
                        "description" => __("Provide description line height", "asvc"),
                        "group" => "Styles"
                    ),                    



                )
            ) );
            
            function asvc_profile_card_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                
                    //'style' => 'style1',
                    'image' => '',
                    'name' => 'John Doe',
                    'position' => 'Web designer',
                    'f_link' => '',
                    't_link' => '',
                    'g_link' => '',
                    'i_link' => '',
                    'p_link' => '',
                    'l_link' => '',
                    'add_link' => '',
                    'link' => '',
                    'link_text' => 'Read More',
                    'desc_f_size' => '14',
                    'line_height' => '24',
                    'img_width' => '236',
                    'img_height' => '236',
                    'color' => '#fb3e76',
                    'extraclass' => '',
                    
                ), $atts ) );
                
                
                wp_register_style( 'profile-card-css', plugins_url( '/css/profile-card.css',  __FILE__) );
                wp_enqueue_style( 'profile-card-css' );
                
                //wp_register_script('team_js', plugins_url('/js/team.js', __FILE__), array('jquery'));
                //wp_enqueue_script('team_js');                
                
                $image = wp_get_attachment_image_src( $image, 'full' );
                $link   = vc_build_link( $link );
                $output ='';
                $social_links ='';
                $addlink ='';
                
                
                if ( !empty( $f_link ) ) {
                    $social_links .='<li><a href="'.$f_link.'"><i class="fa fa-facebook"></i></a></li>'; 
                }
                if ( !empty( $t_link ) ) {
                    $social_links .='<li><a href="'.$t_link.'"><i class="fa fa-twitter"></i></a></li>';                               }
                if ( !empty( $g_link ) ) {
                    $social_links .='<li><a href="'.$g_link.'"><i class="fa fa-google-plus"></i></a></li>';                           }                
                if ( !empty( $i_link ) ) {
                    $social_links .='<li><a href="'.$i_link.'"><i class="fa fa-instagram"></i></a></li>';                             }                
                if ( !empty( $p_link ) ) {
                    $social_links .='<li><a href="'.$p_link.'"><i class="fa fa-pinterest"></i></a></li>';                             }                       
                if ( !empty( $l_link ) ) {
                    $social_links .='<li><a href="'.$l_link.'"><i class="fa fa-linkedin"></i></a></li>';                              }
                
                
                if ( $add_link=='yes' ){
                    $addlink .='<a class="href" href="'.$link['url'].'" title="'.$link['title'].'" target="'.$link['target'].'">'.$link_text.'</a>';
                }
                                      
                $output .='<div class="teachers teachers-page '.$extraclass.'">
                            <div class="teacher-item" style="background:'.$color.';">
                            <div class="teacher-image">
                                <img src="'.$image[0].'" alt="'.$name.'" style="width:'.$img_width.'px; height:'.$img_height.'px" class="img-responsive">
                            </div>
                            <div class="teacher-content">
                                <h4>'.$name.' <span>'.$position.'</span></h4>
                                <ul>
                                    '.$social_links.'
                                </ul>
                                <p style="font-size:'.$desc_f_size.'px; line-height:'.$line_height.'px;">'.$content.'</p>
                                '.$addlink.'
                            </div>
                            </div>
                        </div>'; 
                                      


                return $output;
            }


            add_shortcode( 'asvc_profile_card', 'asvc_profile_card_shortcode_function' );