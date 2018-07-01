<?php
vc_map(array(
    "name" 			=> "Counter",
    "category" 		=> 'VC Addons',
    "description"	=> "Animated counter with title",
    "base" 			=> "asvc_counter",
    "class" 		=> "",
    "icon" 			=> "asvc_counter_icon",
    
    "params" 	=> array(

        array(
            "type"			=> "textfield",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> true,
            "heading"		=> "Counter start value",
            "description"	=> "Integer. Usualy leave 0.",
            "param_name"	=> "counter_value_from",
            "std"			=> "0",
        ),
        array(
            "type"			=> "textfield",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> true,
            "heading"		=> "Counter end value",
            "description"	=> "Integer. Counter will count to this value.",
            "param_name"	=> "counter_value_to",
            "std"			=> "100",
        ),
        array(
            "type"			=> "textfield",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> true,
            "heading"		=> "Counter title (Optional)",
            "description"	=> "Title will be displayed below counter.",
            "param_name"	=> "counter_title",
            "std"			=> "",
        ),
        array(
            "type"			=> "textfield",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> true,
            "heading"		=> "Counter animation duration (msec)",
            "description"	=> "How long it should take to count between the target numbers. 1000 = 1 second.",
            "param_name"	=> "speed",
            "std"			=> "2000",
        ),
        array(
            "type"			=> "textfield",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> true,
            "heading"		=> "Decimals number",
            "description"	=> "Number of decimals after comma. For example - use 1 if you want to show counter from 1.0 to 9.5, use 2 if you want to show counter from 1.25 to 9.45, etc.",
            "param_name"	=> "decimals",
            "std"			=> "0",
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
                "White"	=> "white"
            ),
            "description"	=> "",
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
            "std"			=> "left",
            "edit_field_class" => "vc_col-xs-6",
        ),
        array(
            "type"			=> "dropdown",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Text font weight",
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
        /* Icon */
        array(
            'type' => 'checkbox',
            'heading' => __( 'Add counter icon?', 'js_composer' ),
            'param_name' => 'counter_icon',
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Counter icon library', 'js_composer' ),
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
                'element' => 'counter_icon',
                'value' => 'true',
            ),
            'admin_label' => true,
            'param_name' => 'counter_icon_type',
            'description' => __( 'Select icon library.', 'js_composer' ),
            "std"		=> "fontawesome",
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Counter icon', 'js_composer' ),
            'param_name' => 'counter_icon_fontawesome',
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
                'element' => 'counter_icon_type',
                'value' => 'fontawesome',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Counter icon', 'js_composer' ),
            'param_name' => 'counter_icon_pe7stroke',
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
                'element' => 'counter_icon_type',
                'value' => 'pe7stroke',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Counter icon', 'js_composer' ),
            'param_name' => 'counter_icon_openiconic',
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
                'element' => 'counter_icon_type',
                'value' => 'openiconic',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Counter icon', 'js_composer' ),
            'param_name' => 'counter_icon_typicons',
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
                'element' => 'counter_icon_type',
                'value' => 'typicons',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Counter icon', 'js_composer' ),
            'param_name' => 'counter_icon_entypo',
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
                'element' => 'counter_icon_type',
                'value' => 'entypo',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Counter icon', 'js_composer' ),
            'param_name' => 'counter_icon_linecons',
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
                'element' => 'counter_icon_type',
                'value' => 'linecons',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Counter icon', 'js_composer' ),
            'param_name' => 'counter_icon_monosocial',
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
                'element' => 'counter_icon_type',
                'value' => 'monosocial',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Counter icon', 'js_composer' ),
            'param_name' => 'counter_icon_material',
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
                'element' => 'counter_icon_type',
                'value' => 'material',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            "type"			=> "dropdown",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> false,
            "heading"		=> "Icon position",
            "param_name"	=> "icon_position",
            "value"			=> array(
                "Top"	=> "top",
                "Left"	=> "left"
            ),
            "description"	=> "Icon position related to counter.",
            "std"			=> "top",
            'dependency' => array(
                'element' => 'counter_icon',
                'value' => 'true',
            ),
        ),
        array(
            "type"			=> "colorpicker",
            //"holder"		=> "div",
            "class" 		=> "hide_in_vc_editor",
            "admin_label" 	=> true,
            "heading"		=> "Icon color",
            "param_name"	=> "icon_color",
            "std"			=> "",
            'dependency' => array(
                'element' => 'counter_icon',
                'value' => 'true',
            ),
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


function asvc_shortcode_counter_wp($atts, $sc_content = null) {
    extract(shortcode_atts(array(
        'counter_value_from' => '0',
        'counter_value_to' => '100',
        'counter_title' => '',
        'speed' => '2000',
        'decimals' => '0',
        'align' => 'left',
        'fontweight' => 'normal',
        'color' => 'black',
        'counter_icon' => false,
        'counter_icon_type' => 'fontawesome',
        'counter_icon_fontawesome' => 'fa fa-adjust',
        'counter_icon_pe7stroke' => 'pe-7s-album',
        'counter_icon_openiconic' => 'vc-oi vc-oi-dial',
        'counter_icon_typicons' => 'typcn typcn-adjust-brightness',
        'counter_icon_entypo' => 'entypo-icon entypo-icon-note',
        'counter_icon_linecons' => 'vc_li vc_li-heart',
        'counter_icon_monosocial' => 'vc-mono vc-mono-fivehundredpx',
        'counter_icon_material' => 'vc-material vc-material-cake',
        'icon_position' => 'top',
        'icon_color' => '',
        'css_animation' => 'none',
        'el_class' => ''
    ), $atts));


    wp_register_style( 'asvc-counter-css', plugins_url( '/css/counter.css',  __FILE__) );
    wp_enqueue_style( 'asvc-counter-css' );
    
    wp_register_script('appear_js', plugins_url('/js/jquery.appear.js', __FILE__), array('jquery'));
    wp_enqueue_script('appear_js');  
    
    wp_register_script('countto_js', plugins_url('/js/jquery.countTo.js', __FILE__), array('jquery'));
    wp_enqueue_script('countto_js');      
    

    ob_start();

    // Default font-weight
    if($fontweight == 'normal') {
        $fontweight = 'default';
    }

    if($icon_color !== '') {
        $add_icon_style = ' style="color: '.esc_attr($icon_color).'"';
    }

    // Counter icon
    if($counter_icon == true) {

        // Load VC icons libraries
        vc_iconpicker_editor_jscss();

        switch($counter_icon_type) {
            case 'fontawesome':
                $counter_icon_html = '<i class="'.$counter_icon_fontawesome.'"></i>';
            break;
            case 'openiconic':
                $counter_icon_html = '<i class="'.$counter_icon_openiconic.'"></i>';
            break;
            case 'typicons':
                $counter_icon_html = '<i class="'.$counter_icon_typicons.'"></i>';
            break;
            case 'entypo':
                $counter_icon_html = '<i class="'.$counter_icon_entypo.'"></i>';
            break;
            case 'linecons':
                $counter_icon_html = '<i class="'.$counter_icon_linecons.'"></i>';
            break;
            case 'monosocial':
                $counter_icon_html = '<i class="'.$counter_icon_monosocial.'"></i>';
            break;
            case 'material':
                $counter_icon_html = '<i class="'.$counter_icon_material.'"></i>';
            break;
           case 'pe7stroke':
                $counter_icon_html = '<i class="'.$counter_icon_pe7stroke.'"></i>';
            break;
        }

        $icon_html = '<div class="mgt-counter-icon" '.$add_icon_style.'>'.$counter_icon_html.'</div>';

    } else {
        $icon_html = '';
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

    echo '<div class="mgt-counter-wrapper mgt-counter-icon-position-'.esc_attr($icon_position).' wpb_content_element text-'.esc_attr($color).' text-font-weight-'.esc_attr($fontweight).' text-'.esc_attr($align).esc_attr($animation_css_class).' '.$el_class.'">';
    echo wp_kses_post($icon_html);
    echo '<span class="mgt-counter-value" data-from="'.esc_attr($counter_value_from).'" data-to="'.esc_attr($counter_value_to).'" data-speed="'.esc_attr($speed).'" data-decimals="'.esc_attr($decimals).'">'.esc_html($counter_value_to).'</span>';
    if(trim($counter_title) !== '') {
        echo '<h5 class="mgt-counter-title">'.esc_html($counter_title).'</h5>';
    }
    echo '</div>';

    $sc_content = ob_get_contents();
    ob_end_clean();
    return $sc_content;
}

add_shortcode("asvc_counter", "asvc_shortcode_counter_wp");