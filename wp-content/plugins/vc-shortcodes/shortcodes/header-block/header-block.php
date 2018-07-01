<?php
            
            vc_map(array(
                "name" 			=> "Header Block",
                "category" 		=> 'VC Addons',
                "description"	=> "Add heading block with header and subheader text",
                "base" 			=> "asvc_header_block",
                "class" 			=> "",
                "icon" 			=> "asvc_header_block_icon",
                "params" 	=> array(
                		array(
                        "type"			=> "mgt_separator",
                        "param_name"	=> generate_separator_name(),
                        "heading"		=> "Layout and content settings",
                    ),
                    array(
                        "type"			=> "textfield",
                        //"holder"		=> "div",
                        "class" 		=> "hide_in_vc_editor",
                        "admin_label" 	=> true,
                        "heading"		=> "Title",
                        "param_name"	=> "title",
                        "std"			=> "Header",
                    ),
                    array(
                        "type"			=> "textfield",
                        //"holder"		=> "div",
                        "class" 		=> "hide_in_vc_editor",
                        "admin_label" 	=> true,
                        "heading"		=> "Subtitle",
                        "param_name"	=> "subtitle",
                        "std"			=> "",
                    ),
                    array(
                        "type"			=> "dropdown",
                        //"holder"		=> "div",
                        "class" 		=> "hide_in_vc_editor",
                        "admin_label" 	=> false,
                        "heading"		=> "Style",
                        "param_name"	=> "style",
                        "value"			=> array(
                            "Title + subtitle"	=> "1",
                            "Subtitle + title"	=> "2"
                        ),
                        "description"	=> "",
                        "std"			=> "1",
                        "edit_field_class" => "vc_col-xs-6",
                    ),
                    array(
                        "type"			=> "dropdown",
                        //"holder"		=> "div",
                        "class" 		=> "hide_in_vc_editor",
                        "admin_label" 	=> false,
                        "heading"		=> "Header font size",
                        "param_name"	=> "header_font_size",
                        "value"			=> array(
                            "H1"	=> "h1",
                            "H2"	=> "h2",
                            "H3"	=> "h3",
                            "H4"	=> "h4",
                            "H5"	=> "h5",
                            "H6"	=> "h6",
                        ),
                        "description"	=> "",
                        "std"			=> "h2",
                        "edit_field_class" => "vc_col-xs-6",
                    ),
                    array(
                        "type"			=> "dropdown",
                        //"holder"		=> "div",
                        "class" 		=> "hide_in_vc_editor",
                        "admin_label" 	=> false,
                        "heading"		=> "Text align",
                        "param_name"	=> "align",
                        "value"			=> array(
                            "Left"	=> "left",
                            "Center"	=> "center",
                            "Right"	=> "right"
                        ),
                        "std"			=> "left",
                        "edit_field_class" => "vc_col-xs-6",
                    ),
                    array(
                        "type"			=> "dropdown",
                        //"holder"		=> "div",
                        "class" 		=> "hide_in_vc_editor",
                        "admin_label" 	=> false,
                        "heading"		=> "Text tranform",
                        "param_name"	=> "texttransform",
                        "value"			=> array(
                            "Header uppercase"	=> "header",
                            "Subheader uppercase"	=> "subheader",
                            "Both uppercase"	=> "both",
                            "None"	=> "none"
                        ),
                        "description"	=> "",
                        "std"			=> "header",
                        "edit_field_class" => "vc_col-xs-6",
                    ),
                    array(
                        "type"			=> "dropdown",
                        //"holder"		=> "div",
                        "class" 		=> "hide_in_vc_editor",
                        "admin_label" 	=> false,
                        "heading"		=> "Title font weight",
                        "param_name"	=> "fontweight",
                        "value"			=> array(
                            "Normal"	=> "normal",
                            "Bold"	=> "bold",
                            "100"	=> "100",
                            "200"	=> "200",
                            "300"	=> "300",
                            "400"	=> "400",
                            "500"	=> "500",
                            "600"	=> "600",
                            "700"	=> "700",
                            "800"	=> "800",
                            "900"	=> "900"
                        ),
                        "description"	=> "Make sure you loaded font weight that you selected in Google Fonts settings for Header font in Theme Control Panel.",
                        "std"			=> "normal",
                        "edit_field_class" => "vc_col-xs-6",
                    ),
                    array(
                        "type"			=> "dropdown",
                        //"holder"		=> "div",
                        "class" 		=> "hide_in_vc_editor",
                        "admin_label" 	=> false,
                        "heading"		=> "Title font size",
                        "param_name"	=> "fontsize",
                        "value"			=> array(
                            "Regular (from H tag)"	=> "regular",
                            "Large"	=> "large",
                            "Medium"	=> "medium",
                        ),
                        "description"	=> "",
                        "std"			=> "regular",
                        "edit_field_class" => "vc_col-xs-6",
                    ),
                    array(
                        "type"			=> "dropdown",
                        //"holder"		=> "div",
                        "class" 		=> "hide_in_vc_editor",
                        "admin_label" 	=> false,
                        "heading"		=> "Text color",
                        "param_name"	=> "color",
                        "value"			=> array(
                            "Black"	=> "black",
                            "White"	=> "white",
                            "Custom (Select color)" 	=> "custom",
                        ),
                        "description"	=> "",
                        "std"			=> "black",
                        "edit_field_class" => "vc_col-xs-6",
                    ),
                    array(
                        "type"			=> "colorpicker",
                        //"holder"		=> "div",
                        "class" 		=> "hide_in_vc_editor",
                        "admin_label" 	=> false,
                        "heading"		=> "Custom text color",
                        "param_name"	=> "color_custom",
                        "description"	=> "Override text color. Leave empty to use default theme color from previous option.",
                        "std"			=> "",
                        'dependency' => array(
                            'element' => 'color',
                            'value' => 'custom',
                        ),
                        "edit_field_class" => "vc_col-xs-6",
                    ),
                    array(
                        "type"			=> "mgt_separator",
                        "param_name"	=> generate_separator_name(),
                        "heading"		=> "Line settings",
                    ),
                    array(
                        "type"			=> "dropdown",
                        //"holder"		=> "div",
                        "class" 		=> "hide_in_vc_editor",
                        "admin_label" 	=> false,
                        "heading"		=> "Show line below header block",
                        "param_name"	=> "line",
                        "value"			=> array(
                            "Yes"	=> "1",
                            "No"	=> "0"
                        ),
                        "description"	=> "",
                        "std"			=> "1",
                    ),
                    array(
                        "type"			=> "dropdown",
                        //"holder"		=> "div",
                        "class" 		=> "hide_in_vc_editor",
                        "admin_label" 	=> false,
                        "heading"		=> "Line top margin",
                        "param_name"	=> "line_margin",
                        "value"			=> array(
                            "Regular"	=> "regular",
                            "Large"	=> "large",
                            "Small"	=> "small"
                        ),
                        "description"	=> "Margin between line and header title.",
                        "std"			=> "large",
                        'dependency' => array(
                            'element' => 'line',
                            'value' => '1',
                        ),
                        "edit_field_class" => "vc_col-xs-6",
                    ),
                    // Line color
                    array(
                        "type"			=> "colorpicker",
                        //"holder"		=> "div",
                        "class" 		=> "hide_in_vc_editor",
                        "admin_label" 	=> false,
                        "heading"		=> "Line color",
                        "param_name"	=> "line_color",
                        "description"	=> "Override line color.",
                        "std"			=> "",
                        'dependency' => array(
                            'element' => 'line',
                            'value' => '1',
                        ),
                    ),
                    array(
                        'type' => 'checkbox',
                        'heading' => __( 'Add gradient to line color?', 'js_composer' ),
                        'param_name' => 'line_grad',
                        "description"	=> "Use this to add second gradient color for line.",
                        'dependency' => array(
                            'element' => 'line',
                            'value' => '1',
                        ),
                    ),
                    array(
                        "type"			=> "colorpicker",
                        //"holder"		=> "div",
                        "class" 		=> "hide_in_vc_editor",
                        "admin_label" 	=> false,
                        "heading"		=> "Line second color for gradient",
                        "param_name"	=> "line_color_grad",
                        "description"	=> "Override line second color for gradient.",
                        "std"			=> "",
                        'dependency' => array(
                            'element' => 'line_grad',
                            'value' => 'true',
                        ),
                    ),
                    array(
                        "type"			=> "mgt_separator",
                        "param_name"	=> generate_separator_name(),
                        "heading"		=> "Effects",
                    ),
                    // CSS Animations
                    vc_map_add_css_animation( true ),
                    
                    array(
                        "type" => "textfield",
                        "heading" => __("Extra class name", "asvc"),
                        "param_name" => "css_class",
                        "value" => "",
                        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "asvc")
                    ),
                    array(
                        'type' => 'css_editor',
                        'heading' => 'Css',
                        'param_name' => 'css',
                        'group' => 'Content Design options',
                    ),                    
                                        
                    
                )
                
            ));
            
        
        
            function mgt_shortcode_header_block_wp( $atts, $sc_content = null ) {
                global $mgt_custom_css;   
                extract(shortcode_atts(array(
                    'title' => 'Header',
                    'subtitle' => '',
                    'fontsize' => 'regular',
                    'line' => 1,
                    'line_margin' => 'large',
                    'line_color' => '',
                    'line_grad' => false,
                    'line_color_grad' => '',
                    'align' => 'left',
                    'style' => 1,
                    'texttransform' => 'header',
                    'color' => 'black',
                    'color_custom' => '',
                    'header_font_size' => 'h2',
                    'fontweight' => 'normal',
                    'css_animation' => 'none',
                    'css_class' => ''
                ), $atts));
                
                
                wp_register_style( 'asvc-header-block', plugins_url( '/css/header-block.css',  __FILE__) );
                wp_enqueue_style( 'asvc-header-block' );                             
             
                
                ob_start();

                // Default font-weight
                if($fontweight == 'normal') {
                    $fontweight = 'default';
                }

                $mgt_custom_css = '';

                // Custom CSS
                $unique_id = rand(1000000,90000000);

                $unique_class_name = 'mgt-header-block-'.$unique_id;

                // Custom color
                if($color_custom !== '') {
                    $mgt_custom_css .= "
                        .$unique_class_name.mgt-header-block .mgt-header-block-title {
                            color: $color_custom!important;
                        }
                    ";
                }

                // Line
                if($line == 1 && $line_color !== '') {
                	$mgt_custom_css .= "
                        .$unique_class_name.mgt-header-block .mgt-header-line {
                            background-color: $line_color!important;
                        }
                    ";
                }

                if($line == 1 && $line_color_grad !== '') {
                	$mgt_custom_css .= "
                        .$unique_class_name.mgt-header-block .mgt-header-line {
                            background-color: $line_color!important;
                            background: -moz-linear-gradient(left,  $line_color 0%, $line_color_grad 100%)!important;
                            background: -webkit-linear-gradient(left,  $line_color 0%, $line_color_grad 100%)!important;
                            background: linear-gradient(to right,  $line_color 0%, $line_color_grad 100%)!important;
                            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='$line_color', endColorstr='$line_color_grad',GradientType=1 )!important;

                        }
                    ";
                }
                
                // Subtitle
                if($subtitle !== '') {
                    $subtitle = '<p class="mgt-header-block-subtitle">'.$subtitle.'</p>';
                }

                // Line
                $line_html = '';

                if($line == 1) {
                    $line_html = '<div class="mgt-header-line mgt-header-line-margin-'.esc_attr($line_margin).'"></div>';
                }

                // Styles
                $addclass = " mgt-header-block-style-".$style;

                $addclass .= " mgt-header-block-fontsize-".$fontsize;

                $addclass .= " mgt-header-texttransform-".$texttransform;

                $addclass .= ' '.$unique_class_name;


                if($style == 1) {
                    $content = '<'.$header_font_size.' class="mgt-header-block-title text-font-weight-'.esc_attr($fontweight).'">'.wp_kses_post($title).'</'.$header_font_size.'>'.$subtitle;
                } else {
                    $content = $subtitle.'<'.$header_font_size.' class="mgt-header-block-title text-font-weight-'.esc_attr($fontweight).'">'.wp_kses_post($title).'</'.$header_font_size.'>';
                }

                // CSS Animation
                if($css_animation !== 'none') {

                    // Code from /wp-content/plugins/js_composer/include/classes/shortcodes/shortcodes.php:640, public function getCSSAnimation( $css_animation )
                    $animation_css_class = ' wpb_animate_when_almost_visible wpb_'.$css_animation.' '.$css_animation;

                    // Load animation JS
                    wp_enqueue_script( 'waypoints' );
                    wp_enqueue_style( 'animate-css' );

                } else {
                    $animation_css_class = '';
                }

                echo '<div class="mgt-header-block clearfix text-'.esc_attr($align).' text-'.esc_attr($color).esc_attr($animation_css_class).' wpb_content_element '.esc_attr($addclass).' '.esc_attr( $css_class ).'">'.wp_kses_post($content).wp_kses_post($line_html).'</div>';


    // Add custom styles to button
    if($mgt_custom_css !== '') {
        $mgt_custom_css = str_replace(array("\r", "\n", "  ", "	"), '', $mgt_custom_css);
        echo "<style scoped='scoped'>$mgt_custom_css</style>"; // This variable contains user Custom CSS code and can't be escaped with WordPress functions.
    }
                $sc_content = ob_get_contents();
                ob_end_clean();
                return $sc_content;
            }

            add_shortcode("asvc_header_block", "mgt_shortcode_header_block_wp");