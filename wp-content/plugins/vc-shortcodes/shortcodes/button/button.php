<?php
vc_map(array(
    "name" 			=> "Button",
    "category" 		=> 'VC Addons',
    "description"	=> "Button with several styles and link",
    "base" 			=> "asvc_button",
    "class" 			=> "",
    "icon" 			=> "asvc_button_icon",
    
    "params" 	=> array(
    		// General settings
    		array(
            "type"			=> "mgt_separator",
            "param_name"	=> generate_separator_name(),
            "heading"		=> "Button settings",
        ),
    		array(
            "type"			=> "vc_link",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Button Text and Link",
            "description"	=> "",
            "param_name"	=> "button_link",
            "std"			=> "",
        ),
        array(
            "type"			=> "dropdown",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Button style",
            "param_name"	=> "button_style",
            "value"			=> array(
                "Default"	=> "solid",
                "Black"	=> "solid-invert",
                "Grey"	=> "grey",
                "Bordered"	=> "bordered",
                "Bordered Black"	=> "borderedblack",
                "Bordered Grey"	=> "borderedgrey",
                "Bordered White"	=> "borderedwhite",
                "Red"	=> "red",
                "Green"	=> "green",
                "Text link dark"	=> "text",
                "Text link light (use on dark backgrounds)"	=> "textwhite"
            ),
            "description"	=> "Change button predefined style.",
            "std"			=> "solid",
            "edit_field_class" => "vc_col-xs-6",
        ),
        array(
            "type"			=> "dropdown",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Button round edges",
            "param_name"	=> "button_round_edges",
            "value"			=> array(
                "Disable"	=> "disable",
                "Small"	=> "small",
                "Medium"	=> "medium",
                "Large"	=> "large",
                "Full"	=> "full"
            ),
            "description"	=> "Change button border radius (round edges).",
            "std"			=> "disable",
            "edit_field_class" => "vc_col-xs-6",
        ),
        array(
            "type"			=> "dropdown",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Button size",
            "param_name"	=> "button_size",
            "value"			=> array(
                "Small"	=> "small",
                "Normal"	=> "normal",
                "Large"	=> "large"
            ),
            "description"	=> "",
            "std"			=> "normal",
        ),
        array(
            "type"			=> "dropdown",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Button horizontal align",
            "param_name"	=> "button_align",
            "value"			=> array(
                "Left"	=> "left",
                "Center"	=> "center",
                "Right"	=> "right"
            ),
            "edit_field_class" => "vc_col-xs-6",
            "description"	=> "Change button horizontal align inside column.",
            "std"			=> "center",
        ),
        array(
            "type"			=> "dropdown",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Button display",
            "param_name"	=> "button_display",
            "value"			=> array(
                "Inline"	=> "inline",
                "New line"	=> "newline"
            ),
            "edit_field_class" => "vc_col-xs-6",
            "description"	=> "Use 'New Line' if you want to have only one this button on line, use 'Inline' to have this button near other buttons or other content in line.",
            "std"			=> "inline",
        ),
        array(
            "type"			=> "dropdown",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Text size",
            "param_name"	=> "text_size",
            "value"			=> array(
                "Small"	=> "small",
                "Normal"	=> "normal",
                "Large"	=> "large"
            ),
            "edit_field_class" => "vc_col-xs-6",
            "description"	=> "",
            "std"			=> "normal",
        ),
        array(
            "type"			=> "dropdown",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Text transform",
            "param_name"	=> "text_transform",
            "value"			=> array(
                "None"	=> "none",
                "UPPERCASE"	=> "uppercase"
            ),
            "edit_field_class" => "vc_col-xs-6",
            "description"	=> "",
            "std"			=> "none",
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Add top margin?', 'js_composer' ),
            'param_name' => 'button_top_margin',
            "description"	=> "Use this if you want to add additional space between button and your top content.",
            "edit_field_class" => "vc_col-xs-6",
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Add right margin?', 'js_composer' ),
            'param_name' => 'button_right_margin',
            "description"	=> "Use this if you have few buttons in one line and want to divide it.",
            "edit_field_class" => "vc_col-xs-6",
        ),
        // Icon
        array(
            "type"			=> "mgt_separator",
            "param_name"	=> generate_separator_name(),
            "heading"		=> "Icon settings",
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Add icon?', 'js_composer' ),
            'param_name' => 'button_icon',
            "edit_field_class" => "vc_col-xs-6",
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Add icon separator line?', 'js_composer' ),
            'param_name' => 'button_icon_separator',
            'dependency' => array(
                'element' => 'button_icon',
                'value' => 'true',
            ),
            "edit_field_class" => "vc_col-xs-6",
        ),
        array(
            "type"			=> "dropdown",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Icon alignment",
            "param_name"	=> "button_icon_position",
            "value"			=> array(
                "Left"	=> "left",
                "Right"	=> "right"
            ),
            "description"	=> "",
            "std"			=> "left",
            'dependency' => array(
                'element' => 'button_icon',
                'value' => 'true',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Icon library', 'js_composer' ),
            'value' => array(
                __( 'Font Awesome', 'js_composer' ) => 'fontawesome',
                __( 'Open Iconic', 'js_composer' ) => 'openiconic',
                __( 'Typicons', 'js_composer' ) => 'typicons',
                __( 'Entypo', 'js_composer' ) => 'entypo',
                __( 'Linecons', 'js_composer' ) => 'linecons',
                __( 'Mono Social', 'js_composer' ) => 'monosocial',
                __( 'Material', 'js_composer' ) => 'material',
            ),
            'dependency' => array(
                'element' => 'button_icon',
                'value' => 'true',
            ),
            //'admin_label' => true,
            'param_name' => 'icon_type',
            'description' => __( 'Select icon library.', 'js_composer' ),
            "std"		=> "fontawesome",
        ),

        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_fontawesome',
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
                'element' => 'icon_type',
                'value' => 'fontawesome',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_pe7stroke',
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
                'element' => 'icon_type',
                'value' => 'pe7stroke',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_openiconic',
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
                'element' => 'icon_type',
                'value' => 'openiconic',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_typicons',
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
                'element' => 'icon_type',
                'value' => 'typicons',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_entypo',
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
                'element' => 'icon_type',
                'value' => 'entypo',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_linecons',
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
                'element' => 'icon_type',
                'value' => 'linecons',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_monosocial',
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
                'element' => 'icon_type',
                'value' => 'monosocial',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_material',
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
                'element' => 'icon_type',
                'value' => 'material',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            "type"			=> "mgt_separator",
            "param_name"	=> generate_separator_name(),
            "heading"		=> "Button animation and effects",
        ),
        array(
            "type"			=> "dropdown",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Button hover effect",
            "param_name"	=> "hover_effect",
            "value"			=> array(
                "Default"	=> "default",
                "[Shape] Grow"	=> "grow",
                "[Shape] Shrink"	=> "shrink",
                "[Shape] Pulse"	=> "pulse",
                "[Shape] Pulse Grow"	=> "pulse-grow",
                "[Shape] Pulse Shrink"	=> "pulse-shrink",
                "[Shape] Push"	=> "push",
                "[Shape] Pop"	=> "pop",
                "[Shape] Bounce In"	=> "bounce-in",
                "[Shape] Bounce Out"	=> "bounce-out",
                "[Shape] Rotate"	=> "rotate",
                "[Shape] Grow Rotate"	=> "grow-rotate",
                "[Shape] Float"	=> "float",
                "[Shape] Sink"	=> "sink",
                "[Shape] Bob"	=> "bob",
                "[Shape] Hang"	=> "hang",
                "[Shape] Skew"	=> "skew",
                "[Shape] Skew Forward"	=> "skew-forward",
                "[Shape] Skew Backward"	=> "skew-backward",
                "[Shape] Wobble Horizontal"	=> "wobble-horizontal",
                "[Shape] Wobble Vertical"	=> "wobble-vertical",
                "[Shape] Wobble To Bottom Right"	=> "wobble-to-bottom-right",
                "[Shape] Wobble To Top Right"	=> "wobble-to-top-right",
                "[Shape] Wobble Top"	=> "wobble-top",
                "[Shape] Wobble Bottom"	=> "wobble-bottom",
                "[Shape] Wobble Skew"	=> "wobble-skew",
                "[Shape] Buzz"	=> "buzz",
                "[Shape] Buzz Out"	=> "buzz-out",

                "[Background] Sweep To Right"	=> "sweep-to-right",
                "[Background] Sweep To Left"	=> "sweep-to-left",
                "[Background] Sweep To Bottom"	=> "sweep-to-bottom",
                "[Background] Sweep To Top"	=> "sweep-to-top",
                "[Background] Bounce To Right"	=> "bounce-to-right",
                "[Background] Bounce To Left"	=> "bounce-to-left",
                "[Background] Bounce To Bottom"	=> "bounce-to-bottom",
                "[Background] Bounce To Top"	=> "bounce-to-top",

                "[Icon] Icon Back"	=> "icon-back",
                "[Icon] Icon Forward"	=> "icon-forward",
                "[Icon] Icon Down"	=> "icon-down",
                "[Icon] Icon Up"	=> "icon-up",
                "[Icon] Icon Spin"	=> "icon-spin",
                "[Icon] Icon Drop"	=> "icon-drop",
                "[Icon] Icon Grow"	=> "icon-grow",
                "[Icon] Icon Shrink"	=> "icon-shrink",
                "[Icon] Icon Pulse"	=> "icon-pulse",
                "[Icon] Icon Pulse Grow"	=> "icon-pulse-grow",
                "[Icon] Icon Pulse Shrink"	=> "icon-pulse-shrink",
                "[Icon] Icon Push"	=> "icon-push",
                "[Icon] Icon Pop"	=> "icon-pop",
                "[Icon] Icon Bounce"	=> "icon-bounce",
                "[Icon] Icon Rotate"	=> "icon-rotate",
                "[Icon] Icon Grow Rotate"	=> "icon-grow-rotate",
                "[Icon] Icon Float"	=> "icon-float",
                "[Icon] Icon Sink"	=> "icon-sink",
                "[Icon] Icon Bob"	=> "icon-bob",
                "[Icon] Icon Hang"	=> "icon-hang",
                "[Icon] Icon Wobble Horizontal"	=> "icon-wobble-horizontal",
                "[Icon] Icon Wobble Vertical"	=> "icon-wobble-vertical",
                "[Icon] Icon Buzz"	=> "icon-buzz",
                "[Icon] Icon Buzz Out"	=> "icon-buzz-out",
            ),
            "description"	=> "Change button hover effect (<a href='http://ianlunn.github.io/Hover/' target='_blank'>Preview effects</a>). Please note that some effects works only for regular button styles, without style overrides and round edges.",
            "std"			=> "default",
        ),
        // CSS Animations
        vc_map_add_css_animation( true ),
        /* Custom styles */
        array(
            "type"			=> "mgt_separator",
            "param_name"	=> generate_separator_name(),
            "heading"		=> "Custom styles override",
            "group"			=> "Custom Styles",
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Override this button styles?', 'js_composer' ),
            'param_name' => 'button_override',
            "description"	=> "Use this to apply settings below. This will disable current selected predefined button styles. Please note that custom styled buttons and gradients backgrounds does not support all Button hover effect styles.",
            "group"			=> "Custom Styles",
        ),
        array(
            "type"			=> "dropdown",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Button font weight",
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
            "group"			=> "Custom Styles",
            "description"	=> "Make sure you loaded font weight that you selected in Google Fonts settings for Header font in Theme Control Panel.",
            "std"			=> "normal",
        ),
        array(
            "type"			=> "colorpicker",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Button background color",
            "param_name"	=> "button_color_bg",
            "description"	=> "Override button background color.",
            "group"			=> "Custom Styles",
            "std"			=> "",
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Add gradient to button background color?', 'js_composer' ),
            'param_name' => 'button_bg_grad',
            "description"	=> "Use this to add second gradient color for button background.",
            "group"			=> "Custom Styles",
        ),
        array(
            "type"			=> "colorpicker",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Button background second color for gradient",
            "param_name"	=> "button_color_bggrad",
            "description"	=> "Override button background color for gradient.",
            "group"			=> "Custom Styles",
            "std"			=> "",
            'dependency' => array(
                'element' => 'button_bg_grad',
                'value' => 'true',
            ),
        ),
        array(
            "type"			=> "colorpicker",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Button hover background color",
            "param_name"	=> "button_color_bghover",
            "description"	=> "Override button hover background color.",
            "group"			=> "Custom Styles",
            "std"			=> "",
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Add gradient to button hover background color?', 'js_composer' ),
            'param_name' => 'button_bghover_grad',
            "description"	=> "Use this to add second gradient color for button hover background.",
            "group"			=> "Custom Styles",
        ),
        array(
            "type"			=> "colorpicker",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Button hover background second color for gradient",
            "param_name"	=> "button_color_bghovergrad",
            "description"	=> "Override button hover background color for gradient.",
            "group"			=> "Custom Styles",
            "std"			=> "",
            'dependency' => array(
                'element' => 'button_bghover_grad',
                'value' => 'true',
            ),
        ),
        array(
            "type"			=> "colorpicker",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Button text color",
            "param_name"	=> "button_color_text",
            "description"	=> "Override button text color.",
            "group"			=> "Custom Styles",
            "std"			=> "",
            "edit_field_class" => "vc_col-xs-6",
        ),
        array(
            "type"			=> "colorpicker",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Button hover text color",
            "param_name"	=> "button_color_texthover",
            "description"	=> "Override button hover text color.",
            "group"			=> "Custom Styles",
            "std"			=> "",
            "edit_field_class" => "vc_col-xs-6",
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Enable button border?', 'js_composer' ),
            'param_name' => 'button_border',
            "description"	=> "Use this to add solid border to button.",
            "group"			=> "Custom Styles",
        ),
        array(
            "type"			=> "textfield",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Border width (in pixels)",
            "description"	=> "Add border width here, for example: 3",
            "param_name"	=> "button_border_width",
            "group"			=> "Custom Styles",
            "std"			=> "2",
            'dependency' => array(
                'element' => 'button_border',
                'value' => 'true',
            ),
        ),
        array(
            "type"			=> "colorpicker",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Button border color",
            "param_name"	=> "button_color_border",
            "description"	=> "Override button border color.",
            "group"			=> "Custom Styles",
            "std"			=> "",
            'dependency' => array(
                'element' => 'button_border',
                'value' => 'true',
            ),
            "edit_field_class" => "vc_col-xs-6",
        ),
        array(
            "type"			=> "colorpicker",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Button hover border color",
            "param_name"	=> "button_color_borderhover",
            "description"	=> "Override button hover border color.",
            "group"			=> "Custom Styles",
            "std"			=> "",
            'dependency' => array(
                'element' => 'button_border',
                'value' => 'true',
            ),
            "edit_field_class" => "vc_col-xs-6",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__("Extra class name", 'asvc'),
            "param_name" => "el_class",
            "description" => esc_attr__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'asvc')
        ),        

    )
    
));

function asvc_shortcode_button_wp($atts, $sc_content = null) {
    extract(shortcode_atts(array(
        'button_link' => '',
        'button_link_lightbox' => false,
        'button_style' => 'solid',
        'button_round_edges' => 'disable',
        'button_size' => 'normal',
        'button_align' => 'center',
        'button_display' => 'inline',
        'text_size' => 'normal',
        'text_transform' => 'none',
        'button_top_margin' => false,
        'button_right_margin' => false,
        // Icon
        'button_icon' => false,
        'button_icon_position' => 'left',
        'button_icon_separator' => false,
        'icon_type' => 'fontawesome',
        'icon_fontawesome' => 'fa fa-adjust',
        'icon_pe7stroke' => 'pe-7s-album',
        'icon_openiconic' => 'vc-oi vc-oi-dial',
        'icon_typicons' => 'typcn typcn-adjust-brightness',
        'icon_entypo' => 'entypo-icon entypo-icon-note',
        'icon_linecons' => 'vc_li vc_li-heart',
        'icon_monosocial' => 'vc-mono vc-mono-fivehundredpx',
        'icon_material' => 'vc-material vc-material-cake',
        // Animations
        'hover_effect' => 'default',
        'css_animation' => 'none',
        // Custom styles
        'button_override' => false,
        'fontweight' => 'normal',
        'button_color_bg' => '',
        'button_bg_grad' => false,
        'button_color_bggrad' => '',
        'button_color_bghover' => '',
        'button_bghover_grad' => false,
        'button_color_bghovergrad' => '',
        'button_color_text' => '',
        'button_color_texthover' => '',
        'button_border' => false,
        'button_border_width' => 2,
        'button_color_border' => '',
        'button_color_borderhover' => '',
        'unique_button_id' =>'',
        'el_class' =>'',

    ), $atts));
    
    wp_register_style( 'button-css', plugins_url( '/css/button.css',  __FILE__) );
    wp_enqueue_style( 'button-css' ); 
    
    wp_register_style( 'btn-hover-css', plugins_url( '../promo-block/css/hover-min.css',  __FILE__) );
    wp_enqueue_style( 'btn-hover-css' );       
    
    ob_start();

    // Default font-weight
    if($fontweight == 'normal') {
        $fontweight = 'default';
    }

    if(!$button_top_margin) {
        $button_top_margin = 'false';
    }

    if(!$button_right_margin) {
        $button_right_margin = 'false';
    }

    $button_data = vc_build_link($button_link);

    $button_html = '';
    $mgt_custom_css = '';

    if($button_data['url'] !== '') {

        // CSS classes
        if($css_animation !== 'none') {
            // Code from /wp-content/plugins/js_composer/include/classes/shortcodes/shortcodes.php:640, public function getCSSAnimation( $css_animation )
            $animation_css_class = ' wpb_animate_when_almost_visible wpb_'.$css_animation.' '.$css_animation;

            // Load animation JS
            wp_enqueue_script( 'waypoints' );
            wp_enqueue_style( 'animate-css' );
            
        } else {
            $animation_css_class = '';
        }

        $add_class = 'btn hvr-'.$hover_effect.' mgt-button-icon-'.$button_icon.' mgt-button mgt-style-'.$button_style.' mgt-size-'.$button_size.' mgt-align-'.$button_align.' mgt-display-'.$button_display.' mgt-text-size-'.$text_size.' mgt-button-icon-separator-'.$button_icon_separator.' mgt-button-icon-position-'.$button_icon_position.' text-font-weight-'.esc_attr($fontweight).' mgt-text-transform-'.$text_transform;
        
        // Custom styles
        if($button_override == true) {

            $unique_id = rand(1000000,90000000);

            $unique_class_name = 'mgt-button-'.$unique_id;

            if($button_bg_grad == false && $button_color_bg !== '') {
            	$mgt_custom_css .= "
                    .$unique_class_name.mgt-button {
                        background-color: $button_color_bg!important;

                    }
                ";
            }

            if($button_bg_grad == true && $button_color_bggrad !== '') {
            	$mgt_custom_css .= "
                    .$unique_class_name.mgt-button {
                        
                        background: -moz-linear-gradient(left,  $button_color_bg 0%, $button_color_bggrad 100%)!important;
                        background: -webkit-linear-gradient(left,  $button_color_bg 0%, $button_color_bggrad 100%)!important;
                        background: linear-gradient(to right,  $button_color_bg 0%, $button_color_bggrad 100%)!important;
                        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='$button_color_bg', endColorstr='$button_color_bggrad',GradientType=1 )!important;

                        background-color: $button_color_bg!important;
                    }
                ";
            }	    

            if($button_color_bghovergrad == false && $button_color_bghover !== '') {
            	$mgt_custom_css .= "
                    .$unique_class_name.mgt-button:hover {
                    	background: none!important;
                        background-color: $button_color_bghover!important;
                    }
                ";
            }

            if($button_bghover_grad == true && $button_color_bghovergrad !== '') {
            	$mgt_custom_css .= "
                    .$unique_class_name.mgt-button:hover {
                        
                        background: -moz-linear-gradient(left,  $button_color_bghover 0%, $button_color_bghovergrad 100%)!important;
                        background: -webkit-linear-gradient(left,  $button_color_bghover 0%, $button_color_bghovergrad 100%)!important;
                        background: linear-gradient(to right,  $button_color_bghover 0%, $button_color_bghovergrad 100%)!important;
                        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='$button_color_bghover', endColorstr='$button_color_bghovergrad',GradientType=1 )!important;
                        background-color: $button_color_bghover!important;

                    }
                ";
            }	

            if($button_color_text !== '') {
            	$mgt_custom_css .= "
                    .$unique_class_name.mgt-button {
                        color: $button_color_text!important;
                    }
                ";
            }

            if($button_color_texthover !== '') {
            	$mgt_custom_css .= "
                    .$unique_class_name.mgt-button:hover {
                        color: $button_color_texthover!important;
                    }
                ";
            }

            // Animations support for custom style
            if($hover_effect !== 'default') {
            	$mgt_custom_css .= "
                   .$unique_class_name.mgt-button:before {
                        background: $button_color_bg!important;
                    }
                    .$unique_class_name.mgt-button.mgt-style-solid:before {
                        background: $button_color_bghover!important;
                    }
                    .$unique_class_name.mgt-button.hvr-sweep-to-right:hover,
                    .$unique_class_name.mgt-button.hvr-sweep-to-left:hover,
                    .$unique_class_name.mgt-button.hvr-sweep-to-bottom:hover,
                    .$unique_class_name.mgt-button.hvr-sweep-to-top:hover,
                    .$unique_class_name.mgt-button.hvr-bounce-to-right:hover,
                    .$unique_class_name.mgt-button.hvr-bounce-to-left:hover,
                    .$unique_class_name.mgt-button.hvr-bounce-to-bottom:hover,
                    .$unique_class_name.mgt-button.hvr-bounce-to-top:hover {
                        background: $button_color_bg!important;
                    }
                    .$unique_class_name.mgt-button.mgt-style-solid-invert.hvr-sweep-to-right:hover,
                    .$unique_class_name.mgt-button.mgt-style-solid-invert.hvr-sweep-to-left:hover,
                    .$unique_class_name.mgt-button.mgt-style-solid-invert.hvr-sweep-to-bottom:hover,
                    .$unique_class_name.mgt-button.mgt-style-solid-invert.hvr-sweep-to-top:hover,
                    .$unique_class_name.mgt-button.mgt-style-solid-invert.hvr-bounce-to-right:hover,
                    .$unique_class_name.mgt-button.mgt-style-solid-invert.hvr-bounce-to-left:hover,
                    .$unique_class_name.mgt-button.mgt-style-solid-invert.hvr-bounce-to-bottom:hover,
                    .$unique_class_name.mgt-button.mgt-style-solid-invert.hvr-bounce-to-top:hover {
                        background: $button_color_bghover!important;
                    }
                    .$unique_class_name.mgt-button.mgt-style-borderedblack:before {
                        background: $button_color_bghover!important;
                    }
                ";
            }

            // Button border
            if($button_border == true) {

            	$button_border_widthpx = $button_border_width.'px';

                $mgt_custom_css .= "
                    .$unique_class_name.mgt-button {
                        border: $button_border_widthpx solid $button_color_border!important;
                        height: auto;
                    }
                    .$unique_class_name.mgt-button:hover {
                        border: $button_border_widthpx solid $button_color_borderhover!important;
                    }
                ";
            }

            $add_class .= ' '.$unique_class_name;

        }

        // Button icon
        if($button_icon == true) {

            // Load VC icons libraries
            vc_iconpicker_editor_jscss();

            switch($icon_type) {
                case 'fontawesome':
                    $button_icon_html = '<i class="'.$icon_fontawesome.'"></i>';
                break;
                case 'openiconic':
                    $button_icon_html = '<i class="'.$icon_openiconic.'"></i>';
                break;
                case 'typicons':
                    $button_icon_html = '<i class="'.$icon_typicons.'"></i>';
                break;
                case 'entypo':
                    $button_icon_html = '<i class="'.$icon_entypo.'"></i>';
                break;
                case 'linecons':
                    $button_icon_html = '<i class="'.$icon_linecons.'"></i>';
                break;
                case 'monosocial':
                    $button_icon_html = '<i class="'.$icon_monosocial.'"></i>';
                break;
                case 'material':
                    $button_icon_html = '<i class="'.$icon_material.'"></i>';
                break;
               case 'pe7stroke':
                    $button_icon_html = '<i class="'.$icon_pe7stroke.'"></i>';
                break;
            }

        } else {
            $button_icon_html = '';
        }

        if($button_data['target'] !== '') {
            $target_html = ' target="'.$button_data['target'].'"';
        } else {
            $target_html = '';
        }

        if($button_data['title'] == '') {
            $add_class .= ' mgt-button-no-text';
        }

        if($button_link_lightbox) {
            $button_rel = ' rel="lightbox"';
        } else {
            $button_rel = '';
        }

        $button_html .= '<div class="mgt-button-wrapper mgt-button-wrapper-align-'.$button_align.' mgt-button-wrapper-display-'.$button_display.' mgt-button-top-margin-'.$button_top_margin.' mgt-button-right-margin-'.$button_right_margin.' mgt-button-round-edges-'.$button_round_edges.' '.esc_attr($animation_css_class).' '.$el_class.'">';

        if($button_icon_position == 'right') {

            $button_html .= '<a class="'.esc_attr($add_class).'"'.wp_kses_post($button_rel).' href="'.esc_url($button_data['url']).'"'.($target_html).'>'.esc_html($button_data['title']).wp_kses_post($button_icon_html).'</a>';
        } else {
            $button_html .= '<a class="'.esc_attr($add_class).'"'.wp_kses_post($button_rel).' href="'.esc_url($button_data['url']).'"'.($target_html).'>'.wp_kses_post($button_icon_html).esc_html($button_data['title']).'</a>';
        }

        $button_html .= '</div>';

    }

    // All data inside $button_html variable already correctly escaped and safe.
    echo $button_html;

    // Add custom styles to button
    if($mgt_custom_css !== '') {
        $mgt_custom_css = str_replace(array("\r", "\n", "  ", "	"), '', $mgt_custom_css);
        
        echo "<style scoped='scoped'>$mgt_custom_css</style>"; // This variable contains user Custom CSS code and can't be escaped with WordPress functions.

        // barrel_add_shortcodes_custom_css($mgt_custom_css);
    }

    $sc_content = ob_get_contents();
    ob_end_clean();
    return $sc_content;
}

add_shortcode("asvc_button", "asvc_shortcode_button_wp");