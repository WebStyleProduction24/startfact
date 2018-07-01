<?php
            
            vc_map( array(
                "name"        => __( "Progress Bar", 'asvc' ),
                "base"        => "asvc_progressbar",
                "icon"        => "asvc_progressbar_icon",
                "category" => __('VC Addons', 'js_composer'),
                "params"      => array(
                    
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_attr__( 'Bar style', 'bruno-functions' ),
                        'param_name' => 'style',
                        'save_always' => true,
                        'value' => array(
                            esc_attr__( 'Default', 'bruno-functions' ) => '',
                            esc_attr__( 'Big compact', 'bruno-functions' ) => 'compact'
                        ),
                        'description' => esc_attr__( 'Select bar background type.', 'bruno-functions' )
                    ),
                    array(
                        "type" => "textfield",
                        "class" => "",
                        "heading" => esc_attr__("Title", 'bruno-functions'),
                        "admin_label" => true,
                        "param_name" => "title",
                        "description" => ""
                    ),
                    array(
                        "type" => "colorpicker",
                        "class" => "",
                        "heading" => esc_attr__("Title Color", 'bruno-functions'),
                        "param_name" => "titlecolor",
                        "description" => ""
                    ),
                    array(
                        "type" => "textfield",
                        "class" => "",
                        "heading" => esc_attr__("Percentage", 'bruno-functions'),
                        "admin_label" => true,
                        "param_name" => "percent",
                        "description" => ""
                    ),

                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_attr__("Bar color", 'bruno-functions'),
                        "param_name" => "barcolor",
                        "dependency" => Array('element' => "bartype", 'value' => array('solid')),
                        "description" => ""
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
            
            function asvc_progressbar_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                
                    "style" => "",
                    "title"=>"Title",
                    "titlecolor"=>"",
                    "percent"=>"50",
                    "bartype" => "solid",
                    "barcolor"=> "",
                    "bargradient" => "",
                    'extraclass' => '',
                    
                ), $atts ) );
                
                wp_register_style( 'team-font-awesome', plugins_url( '../info-box/css/font-awesome.min.css',  __FILE__) );
                wp_enqueue_style( 'team-font-awesome' );
                                
                wp_register_style( 'progressbar-css', plugins_url( '/css/progressbar.css',  __FILE__) );
                wp_enqueue_style( 'progressbar-css' );
                
                
                wp_register_script('progressbar-js', plugins_url('/js/progressbar.js', __FILE__), array('jquery'));
                wp_enqueue_script('progressbar-js');                
                
 
                $titlestyle = "";
                $barstyle = "";
                if ($titlecolor != "") $titlestyle = ' style ="color:'.$titlecolor.';"';
                if ($barcolor != "" && $bartype == 'solid') $barstyle = ' style ="background-color:'.$barcolor.';"';
                if ($bargradient != "" && $bartype == 'gradient') $barstyle = ' style ="'.dpgradientToCSS($bargradient).'"';
                $output = "";
                $output .=  '<div class="skill-bar '.$style.'">';
                if ($style != 'compact') $output .= '<h5'.$titlestyle.'>'.$title.'</h5>';
                $output .= '<div class="bar-wrap">';
                $output .= '<span data-width="'.$percent.'"'.$barstyle.'>';
                if ($style == 'compact') $output .= '<h5'.$titlestyle.'>'.$title.'</h5>';
                if ($style == 'compact') $output .= '<strong'.$titlestyle.'>'.$percent.'%</strong>';
                $output .= '</span>';
                if ($style != 'compact') $output .= '<strong'.$titlestyle.'>'.$percent.'%</strong>';
                $output .= '</div></div>';
                
                return $output;
            }


            add_shortcode( 'asvc_progressbar', 'asvc_progressbar_shortcode_function' );