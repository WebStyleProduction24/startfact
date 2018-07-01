<?php
            
            vc_map( array(
                "name"        => __( "Team", 'asvc' ),
                "base"        => "asvc_team",
                "icon"        => "asvc_team_icon",
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
                        "heading" => __("Team Image", "asvc"),
                        "param_name" => "image",
                        "value" => "",
                        "description" => __("Select image from media library.", "asvc"),
                    ),                    
                    array(
                        "type"        => "textfield",
                        "class"       => "",
                        "heading"     => __( "Team Name", 'asvc' ),
                        "param_name"  => "name",
                        "value"       => "John Doe",                      
                    ),                     
                    array(
                        "type"        => "textfield",
                        "class"       => "",
                        "heading"     => __( "Team Position", 'asvc' ),
                        "param_name"  => "position",
                        "value"       => "Web designer",                      
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
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Image Width', 'asvc' ),
                        'param_name'       => 'img_width',
                        "value" => 270,
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
                        "value" => 281,
                        "min" => 1,
                        "max" => 500,
                        "step" => 1,
                        "unit" => "px",
                        "group" => "Styles"
                    ),                     
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Team Color", "asvc" ),
                        "param_name"  => "color",
                        "value"  => "#fb3e76",
                        "group" => "Styles"
                    ),




                )
            ) );
            
            function asvc_team_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                
                    //'style' => 'style1',
                    'image' => '',
                    'name' => 'John Doe',
                    'position' => 'Web designer',
                    'f_link' => '',
                    't_link' => '',
                    'g_link' => '',
                    'i_link' => '',
                    'img_width' => '270',
                    'img_height' => '281',
                    'color' => '#fb3e76',
                    'extraclass' => '',
                    
                ), $atts ) );
                
                wp_register_style( 'team-font-awesome', plugins_url( '../info-box/css/font-awesome.min.css',  __FILE__) );
                wp_enqueue_style( 'team-font-awesome' );
                                
                wp_register_style( 'team-css', plugins_url( '/css/team.css',  __FILE__) );
                wp_enqueue_style( 'team-css' );
                
                //wp_register_script('team_js', plugins_url('/js/team.js', __FILE__), array('jquery'));
                //wp_enqueue_script('team_js');                
                
                $image = wp_get_attachment_image_src( $image, 'full' );
                $output ='';
                $social_links ='';
                
                
                if ( !empty( $f_link ) ) {
                    $social_links .='<li><a href="'.$f_link.'"><i class="fa fa-facebook"></i></a></li>'; 
                }
                if ( !empty( $t_link ) ) {
                    $social_links .='<li><a href="'.$t_link.'"><i class="fa fa-twitter"></i></a></li>';                
                }
                if ( !empty( $g_link ) ) {
                    $social_links .='<li><a href="'.$g_link.'"><i class="fa fa-google-plus"></i></a></li>';                 
                }                
                if ( !empty( $i_link ) ) {
                    $social_links .='<li><a href="'.$i_link.'"><i class="fa fa-instagram"></i></a></li>';               
                }                
                            
                $output .='<div class="team-member '.$extraclass.'">
                        <div class="team-photo">
                            <img src="'.$image[0].'" style="width:'.$img_width.'px; height:'.$img_height.'px" alt="">
                            <div class="team-hover" style="background:'.$color.'">
                                <ul>
                                '.$social_links.'
                                </ul>
                            </div>
                        </div>
                        <div class="designation">
                            <h3 class="subtitle">'.$name.'</h3>
                            <p class="text-muted" style="color:'.$color.'">'.$position.'</p>
                        </div>
                    </div>';  


                return $output;
            }


            add_shortcode( 'asvc_team', 'asvc_team_shortcode_function' );