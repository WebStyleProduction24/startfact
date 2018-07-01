<?php
if (!defined('ABSPATH')) {
    exit;
}

/* Modal Box */

vc_map(array(
    "name" => esc_attr__("Modal Box", 'asvc'),
    "base" => "asvc_modal",
    "controls" => "full",
    "icon" => "asvc_modal_icon",
    "category" => array(
        esc_attr__('VC Addons', 'asvc'),
        esc_attr__('Content', 'asvc')
    ),
    'description' => esc_attr__('Modal boxes displayed in overlay', 'asvc'),
    "params" => array(
        array(
            "type" => "textarea_raw_html",
            "class" => "",
            "heading" => esc_attr__("Modal box trigger", 'asvc'),
            "param_name" => "trigger",
            "value" => esc_attr__("Modal box link label", 'asvc'),
            "description" => esc_attr__("In this field place link for modal box content. Any HTML code and shortcodes is accepted.", 'asvc')
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__("Modal box content", 'asvc'),
            "param_name" => "content",
            "value" => esc_attr__("I am test modal box text block.", 'asvc'),
            "description" => esc_attr__("", 'asvc')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_attr__('Use popup box title?', 'asvc'),
            'param_name' => 'usetitle',
            'value' => array(
                esc_attr__('Yes', 'asvc') => 'true'
            ),
            "description" => "Check this box if you will use modal box title"
        ),
        array(
            "type" => "textfield",
            "holder" => "",
            "heading" => esc_attr__("Title", 'asvc'),
            "param_name" => "title",
            "save_always" => true,
            "value" => esc_attr__("Modal Box Title", 'asvc'),
            "dependency" => Array(
                'element' => "usetitle",
                'value' => array(
                    'true'
                )
            )
        ),
        array(
            'type' => 'prime_slider',
            'heading' => __('Popup width', 'asvc'),
            'param_name' => 'width',
            "value" => 640,
            "min" => 320,
            "max" => 900,
            "step" => 1,
            "unit" => "px"
        ),
        
        
        array(
            "type" => "colorpicker",
            "class" => "",
            "group" => "Color Options",
            "heading" => esc_attr__("Text color", 'asvc'),
            "param_name" => "textcolor",
            "value" => '#555',
            "description" => esc_attr__("Set modal box text color", 'asvc')
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "group" => "Color Options",
            "heading" => esc_attr__("Background color", 'asvc'),
            "param_name" => "bgcolor",
            "value" => '#f7f7f7',
            "description" => esc_attr__("Set modal box background color", 'asvc')
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "group" => "Color Options",
            "heading" => esc_attr__("Overlay color", 'asvc'),
            "param_name" => "overlay_bgcolor",
            "value" => 'rgba(0,0,0,.7)',
            "description" => esc_attr__("Set overlay background color", 'asvc')
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "group" => "Color Options",
            "heading" => esc_attr__("Title text color", 'asvc'),
            "param_name" => "title_textcolor",
            "value" => '#fff',
            "description" => esc_attr__("Set modal box title text color", 'asvc'),
            "dependency" => Array(
                'element' => "usetitle",
                'value' => array(
                    'true'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "group" => "Color Options",
            "heading" => esc_attr__("Title background color", 'asvc'),
            "param_name" => "title_bgcolor",
            "value" => 'rgba(0,0,0,.45)',
            "description" => esc_attr__("Set modal box title background color", 'asvc'),
            "dependency" => Array(
                'element' => "usetitle",
                'value' => array(
                    'true'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "holder" => "",
            "heading" => esc_attr__("Animation type", 'asvc'),
            "param_name" => "animation",
            "value" => array(
                "Fade in scale" => "md-style-1",
                "Slide in right" => "md-style-2",
                "Slide in bottom" => "md-style-3",
                "Rotate in" => "md-style-4",
                "Fall in" => "md-style-5",
                "Fall from side" => "md-style-6",
                "Sticky up" => "md-style-7",
                "Flip horizontal" => "md-style-8",
                "Flip vertical" => "md-style-9",
                "Sign" => "md-style-10",
                "Super scaled" => "md-style-11"
            ),
            "description" => esc_attr__("Select notification position on screen", 'asvc')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__("Extra class name", 'asvc'),
            "param_name" => "el_class",
            "description" => esc_attr__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'asvc')
        )
    )
));



/* asvc Modal Box */

function asvc_modal($atts, $content = null)
{
    extract(shortcode_atts(array(
        'trigger' => '<a href="#">Modal Box Link</a>',
        'usetitle' => '',
        'title' => '',
        'width' => '640',
        'textcolor' => '#555',
        'bgcolor' => '#f7f7f7',
        'overlay_bgcolor' => '',
        'title_textcolor' => '#fff',
        'title_bgcolor' => 'rgba(0,0,0,.45)',
        'animation' => '',
        'el_class' => ''
    ), $atts));
    
    
    wp_register_style('modal-bootstrap', plugins_url('../edd/css/bootstrap.min.css', __FILE__));
    wp_enqueue_style('modal-bootstrap');
    
    wp_register_style('modal-font-awesome', plugins_url('../info-box/css/font-awesome.min.css', __FILE__));
    wp_enqueue_style('modal-font-awesome');
    
    wp_register_style('asvc-modal', plugins_url('/css/modal.css', __FILE__));
    wp_enqueue_style('asvc-modal');
    
    wp_register_script('asvc-modal-js', plugins_url('/js/modal.js', __FILE__), array('jquery'));
    wp_enqueue_script('asvc-modal-js');
    
    
    $el_id    = uniqid();
    $addclass = '';
    $trigger  = rawurldecode(base64_decode(strip_tags($trigger)));
    if (strtolower($usetitle) == 'true') {
        $addclass = ' modhavetitle';
    }
    $output       = '<div class="asvc-md-trigger" data-id="' . $el_id . '">' . do_shortcode($trigger) . '</div>';
    $modalcontent = "<div class='asvc-modal " . $animation . $addclass . "' id='modal-" . $el_id . "' style='width:" . $width . "px'>";
    $modalcontent .= "<div class='asvc-md-content' style='color:" . $textcolor . "; background-color:" . $bgcolor . "'>";
    if (strtolower($usetitle) == 'true') {
        $modalcontent .= "<h3 style='color:" . $title_textcolor . "; background-color:" . $title_bgcolor . "'>" . $title . "</h3>";
    }
    $modalcontent .= "<div>";
    
    $modalcontent .= $content;
    $modalcontent .= "</div>";
    $modalcontent .= "</div>";
    $modalcontent .= "<div class='asvc-modal-close' data-id='" . $el_id . "'><i class='fa fa-close icon-close1'></i></div>";
    $modalcontent .= "</div>";
    $modalcontent .= "<div class='asvc-md-overlay' id='overlay-" . $el_id . "' data-id='" . $el_id . "' style='background-color:" . $overlay_bgcolor . "'></div>";
    $js = '<script type="text/javascript">';
    $js .= 'jQuery(document).ready(function(){';
    $js .= 'jQuery("' . $modalcontent . '").prependTo("body")';
    $js .= '})</script>';
    return $js . $output;
}

add_shortcode('asvc_modal', 'asvc_modal');