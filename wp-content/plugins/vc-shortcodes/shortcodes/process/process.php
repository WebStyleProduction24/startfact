<?php

vc_map(array(
    "name" 			=> "Process Steps",
    "category" 		=> 'VC Addons',
    "description"	=> "Process element with icon, title and text",
    "base" 			=> "asvc_process",
    "class" 			=> "",
    "icon" 			=> "asvc_process_icon",
    
    "params" 	=> array(
    
    
                    array(
                        "type" => "hvc_notice",
                        "class" => "",
                        'heading' => __('<h3 class="hvc_notice" align="center">This is premium addon, please buy the pro version here <a target="_blank" href="https://themebon.com/item/visual-composer-shortcodes-pro/">Essential WPBakery Page Builder (formerly Visual Composer) Addons</a> for only $13</h3>', 'hvc'),
                        "param_name" => "hvc_notice_param_1",
                        "value" => '',
                    ),    
    
    		array(
            "type"			=> "mgt_separator",
            "param_name"	=> generate_separator_name(),
            "heading"		=> "Content settings",
        ),
        array(
            "type"			=> "textfield",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> true,
            "heading"		=> "Process title (Optional)",
            "description"	=> "Title will be displayed below process icon.",
            "param_name"	=> "process_title",
            "std"			=> "",
        ),
        array(
            "type"			=> "colorpicker",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> true,
            "heading"		=> "Title color",
            "param_name"	=> "title_color",
            "std"			=> "",
        ),
        array(
            "type"			=> "textarea_html",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> true,
            "heading"		=> "Process text",
            "param_name"	=> "content",
            "std"			=> 'Nam liber tempor cum soluta nobis eleifend option congue nihil imper per tempor doming',
        ),
        array(
            "type"			=> "dropdown",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Text color",
            "param_name"	=> "text_color",
            "value"			=> array(
                "Black"	=> "black",
                "White"	=> "white"
            ),
            "description"	=> "Use white for usage on dark background.",
            "std"			=> "black",
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
                "Right"	=> "right",
            ),
            "description"	=> "",
            "std"			=> "center",
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
            "std"			=> "bold",
            "edit_field_class" => "vc_col-xs-6",
        ),
        array(
            "type"			=> "dropdown",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Process dots position",
            "param_name"	=> "dots_position",
            "value"			=> array(
                "None"	=> "none",
                "Left"	=> "left",
                "Right"	=> "right",
                "Both"	=> "both",
            ),
            "description"	=> "Use left for first process element in row, use right for latest, use both for middle elements.",
            "std"			=> "none",
            "edit_field_class" => "vc_col-xs-6",
        ),
        /* Icon */
        array(
            "type"			=> "mgt_separator",
            "param_name"	=> generate_separator_name(),
            "heading"		=> "Icon settings",
        ),
        array(
            "type"			=> "dropdown",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Process icon block size",
            "param_name"	=> "process_icon_size",
                "value"			=> array(
                "Regular"	=> "regular",
                "Small"	=> "small",
                "Large"	=> "large"
            ),
            "description"	=> "This option change size for block that contain icon.",
            "std"			=> "regular"
        ),
        array(
            "type"			=> "dropdown",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Process symbol type",
            "param_name"	=> "process_type",
            "value"			=> array(
                "Icon"	=> "icon",
                "Character"	=> "char",
            ),
            "description"	=> "Use icon to select icon, use character to input text value, for example digital.",
            "std"			=> "icon",
        ),
        array(
            "type"			=> "textfield",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> true,
            "heading"		=> "Character icon",
            "description"	=> "Add one character to display instead of icon. For example: 9",
            "param_name"	=> "char",
            "std"			=> "1",
            'dependency' => array(
                'element' => 'process_type',
                'value' => 'char',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Process icon library', 'js_composer' ),
            'value' => array(
                __( 'Font Awesome', 'js_composer' ) => 'fontawesome',
                __( 'Open Iconic', 'js_composer' ) => 'openiconic',
                __( 'Typicons', 'js_composer' ) => 'typicons',
                __( 'Entypo', 'js_composer' ) => 'entypo',
                __( 'Linecons', 'js_composer' ) => 'linecons',
                __( 'Mono Social', 'js_composer' ) => 'monosocial',
                __( 'Material', 'js_composer' ) => 'material',
            ),
            'admin_label' => true,
            'param_name' => 'process_icon_type',
            'description' => __( 'Select icon library.', 'js_composer' ),
            "std"		=> "fontawesome",
            'dependency' => array(
                'element' => 'process_type',
                'value' => 'icon',
            ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Process icon', 'js_composer' ),
            'param_name' => 'process_icon_fontawesome',
            'value' => 'fa fa-adjust',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                'type' => 'fontawesome',
            ),
            'dependency' => array(
                'element' => 'process_icon_type',
                'value' => 'fontawesome',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Process icon', 'js_composer' ),
            'param_name' => 'process_icon_pe7stroke',
            'value' => 'pe-7s-album',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'iconsPerPage' => 4000,
                'type' => 'pe7stroke',
                // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
            ),
            'dependency' => array(
                'element' => 'process_icon_type',
                'value' => 'pe7stroke',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Process icon', 'js_composer' ),
            'param_name' => 'process_icon_openiconic',
            'value' => 'vc-oi vc-oi-dial',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'process_icon_type',
                'value' => 'openiconic',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Process icon', 'js_composer' ),
            'param_name' => 'process_icon_typicons',
            'value' => 'typcn typcn-adjust-brightness',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'process_icon_type',
                'value' => 'typicons',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Process icon', 'js_composer' ),
            'param_name' => 'process_icon_entypo',
            'value' => 'entypo-icon entypo-icon-note',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'process_icon_type',
                'value' => 'entypo',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Process icon', 'js_composer' ),
            'param_name' => 'process_icon_linecons',
            'value' => 'vc_li vc_li-heart',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'process_icon_type',
                'value' => 'linecons',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Process icon', 'js_composer' ),
            'param_name' => 'process_icon_monosocial',
            'value' => 'vc-mono vc-mono-fivehundredpx',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'monosocial',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'process_icon_type',
                'value' => 'monosocial',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Process icon', 'js_composer' ),
            'param_name' => 'process_icon_material',
            'value' => 'vc-material vc-material-cake',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'material',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'process_icon_type',
                'value' => 'material',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            "type"			=> "colorpicker",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> true,
            "heading"		=> "Icon color",
            "param_name"	=> "icon_color",
            "std"			=> "",
            "edit_field_class" => "vc_col-xs-6",
        ),
        array(
            "type"			=> "colorpicker",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Icon background color",
            "param_name"	=> "icon_color_bg",
            "description"	=> "Override icon background color.",
            "std"			=> "",
            "edit_field_class" => "vc_col-xs-6",
        ),
        // Border
        array(
            "type"			=> "mgt_separator",
            "param_name"	=> generate_separator_name(),
            "heading"		=> "Border settings",
        ),
        array(
            "type"			=> "dropdown",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Border style",
            "param_name"	=> "border_style",
                "value"			=> array(
                "Circle"	=> "circle",
                "Rounded"	=> "rounded",
                "Square"	=> "square"
            ),
            "std"			=> "circle",
        ),
        array(
            "type"			=> "colorpicker",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Process border color",
            "param_name"	=> "process_border_color",
            "description"	=> "Override border color.",
            "std"			=> "",
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Add gradient to process border color?', 'js_composer' ),
            'param_name' => 'process_border_color_grad_enable',
            "description"	=> "Use this to add second gradient color for process border color.",
        ),
        array(
            "type"			=> "colorpicker",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Process border second color for gradient",
            "param_name"	=> "process_border_color_grad",
            "description"	=> "Override process border color for gradient.",
            "std"			=> "",
            'dependency' => array(
                'element' => 'process_border_color_grad_enable',
                'value' => 'true',
            ),
        ),
        array(
            "type"			=> "mgt_separator",
            "param_name"	=> generate_separator_name(),
            "heading"		=> "Effects and animations",
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Add mouse hover shadow effect?', 'js_composer' ),
            'param_name' => 'block_shadow_effect',
            "description"	=> "Use this to add shadow to process icon on block hover.",
        ),
        // CSS Animations
        vc_map_add_css_animation( true ),
        
        array(
            "type" => "textfield",
            "heading" => esc_attr__("Extra class name", 'asvc'),
            "param_name" => "el_class",
            "description" => esc_attr__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'asvc')
        ),        
        
    )
    
));




function asvc_shortcode_process_wp($atts, $sc_content = null) {
    extract(shortcode_atts(array(
        'process_title' => '',
        'title_color' => '',
        'text_color' => 'black',
        'align' => 'center',
        'fontweight' => 'bold',
        'dots_position' => 'none',
        'process_icon_size' => 'regular',
        'process_type' => 'icon',
        'char' => '1',
        'process_icon_type' => 'fontawesome',
        'process_icon_fontawesome' => 'fa fa-adjust',
        'process_icon_pe7stroke' => 'pe-7s-album',
        'process_icon_openiconic' => 'vc-oi vc-oi-dial',
        'process_icon_typicons' => 'typcn typcn-adjust-brightness',
        'process_icon_entypo' => 'entypo-icon entypo-icon-note',
        'process_icon_linecons' => 'vc_li vc_li-heart',
        'process_icon_monosocial' => 'vc-mono vc-mono-fivehundredpx',
        'process_icon_material' => 'vc-material vc-material-cake',
        'icon_color' => '',
        'icon_color_bg' => '',
        'border_style' => 'circle',
        'process_border_color' => '',
        'process_border_color_grad_enable' => false,
        'process_border_color_grad' => '',
        'block_shadow_effect' => false,
        'css_animation' => 'none',
        'el_class' => ''
    ), $atts));
    

    ob_start();

    echo '<h3>This addon for pro version. Please buy <a href="https://themebon.com/item/visual-composer-shortcodes-pro/">pro version from here</a></h3>';

    $sc_content = ob_get_contents();
    ob_end_clean();
    return $sc_content;
}

add_shortcode("asvc_process", "asvc_shortcode_process_wp");
