<?php
if (!defined('ABSPATH')) {
    exit;
}

vc_map(array(
    "name" => esc_attr__("Pricing Column", 'asvc'),
    "base" => "asvc_pricing_column",
    "icon" => "asvc_price_table",
    "category" => array(
        esc_attr__('VC Addons', 'asvc'),
        esc_attr__('Content', 'asvc')
    ),
    "description" => esc_attr__('Pricing column for Pricing Table ', 'asvc'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_attr__("Title", 'asvc'),
            "admin_label" => true,
            "param_name" => "title"
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__("Subitle", 'asvc'),
            "admin_label" => true,
            "param_name" => "subtitle"
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_attr__("Column style", 'asvc'),
            "param_name" => "column_style",
            'save_always' => true,
            "value" => array(
                "Default" => "",
                "Highlighted" => "premium",
                "Highlighted on hover" => "highlighted",
                "Custom" => "custom"
            ),
            "description" => ""
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_attr__('Highlight initialy?', 'asvc'),
            'param_name' => 'inistate',
            'value' => array(
                esc_attr__('Yes', 'asvc') => 'true'
            ),
            "description" => esc_attr__('Check this box if you will highlight this column on page load.', 'asvc'),
            "dependency" => Array(
                'element' => "column_style",
                'value' => array(
                    'highlighted'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__("Price background color", 'asvc'),
            "param_name" => "price_bgcolor",
            "value" => "",
            "description" => esc_attr__("Select price area background color", 'asvc'),
            "dependency" => Array(
                'element' => "column_style",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__("Price text color", 'asvc'),
            "param_name" => "price_txtcolor",
            "value" => "#fff",
            "description" => esc_attr__("Select price area text color", 'asvc'),
            "dependency" => Array(
                'element' => "column_style",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_attr__('Use image or icon?', 'asvc'),
            'param_name' => 'useimage',
            'group' => 'Additional Icon/Image Settings',
            'value' => array(
                esc_attr__('Yes', 'asvc') => 'true'
            ),
            "description" => esc_attr__('Check this box if you will use additional icon or image in this column', 'asvc')
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_attr__("Image type", 'asvc'),
            "param_name" => "image_type",
            'group' => 'Additional Icon/Image Settings',
            'save_always' => true,
            "value" => array(
                "Icon" => "selector",
                "Full width image" => "image"
            ),
            "std" => "selector",
            "description" => esc_attr__("Use an existing font icon or upload a custom image.", 'asvc'),
            "dependency" => Array(
                "element" => "useimage",
                "value" => array(
                    "true"
                )
            )
        ),
        array(
            'type' => 'iconpicker',
            "admin_label" => true,
            'heading' => __( 'Icon', 'asvc' ),
            'param_name' => 'icon',
            'value' => '', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 100, // default 100, how many icons per/page to display, we use (big prime_slider) to display all icons in single page
            ),
            'dependency' => array(
                'element' => 'image_type',
                'value' => 'selector',
            ),
            'description' => __( 'Select icon from library.', 'asvc' ),
            'group' => 'Additional Icon/Image Settings',
        ),        
        array(
            "type" => "prime_slider",
            "class" => "",
            "heading" => esc_attr__("Icon size", 'asvc'),
            "param_name" => "icon_size",
            'group' => 'Additional Icon/Image Settings',
            "value" => 48,
            "min" => 12,
            "max" => 72,
            "step" => 1,
            "unit" => "px",
            "dependency" => Array(
                "element" => "image_type",
                "value" => array(
                    "selector"
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__("Icon Color", 'asvc'),
            "param_name" => "icon_color",
            'group' => 'Additional Icon/Image Settings',
            "value" => "#2e2a27",
            "description" => esc_attr__("Select background color for icon.", 'asvc'),
            "dependency" => Array(
                "element" => "image_type",
                "value" => array(
                    "selector"
                )
            )
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_attr__("Icon Badge Style", 'asvc'),
            "param_name" => "icon_style",
            'save_always' => true,
            'group' => 'Additional Icon/Image Settings',
            "value" => array(
                "No badge" => "",
                "Circle" => "circle",
                "Square" => "square"
            ),
            "dependency" => Array(
                "element" => "image_type",
                "value" => array(
                    "selector"
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__("Badge Background Color", 'asvc'),
            "param_name" => "icon_badge_color",
            'group' => 'Additional Icon/Image Settings',
            "value" => "#ffffff",
            "description" => esc_attr__("Select background color for icon.", 'asvc'),
            "dependency" => Array(
                "element" => "icon_style",
                "value" => array(
                    "circle",
                    "square"
                )
            )
        ),
        array(
            "type" => "attach_image",
            "class" => "",
            "heading" => esc_attr__("Upload Image:", 'asvc'),
            "param_name" => "image",
            'group' => 'Additional Icon/Image Settings',
            "value" => "",
            "description" => esc_attr__("Upload the custom image icon.", 'asvc'),
            "dependency" => Array(
                "element" => "image_type",
                "value" => array(
                    "image"
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__("Price", 'asvc'),
            "param_name" => "price",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__("Currency", 'asvc'),
            "param_name" => "currency"
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_attr__("Currency position", 'asvc'),
            "param_name" => "currencypos",
            'save_always' => true,
            "value" => array(
                "After price" => "after",
                "Before price" => "before"
            ),
            "std" => "after",
            "description" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__("Price subtitle", 'asvc'),
            "param_name" => "price_sub"
        ),
        array(
            "type" => "textarea_html",
            "class" => "",
            "holder" => "div",
            "heading" => esc_attr__("Column content", 'asvc'),
            "param_name" => "content",
            "description" => "",
            "value" => esc_attr__("Enter column content here", 'asvc')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_attr__('Use arrowed style?', 'asvc'),
            'param_name' => 'arrowed',
            'value' => array(
                esc_attr__('Yes', 'asvc') => 'true'
            ),
            "description" => "Check this box if you will use down arrow bellow price block"
        ),
        array(
            'type'             => 'prime_slider',
            'heading'          => __( 'Adjust Arrowed Width', 'asvc' ),
            'param_name'       => 'arrow_width',
            "value" => 180,
            "min" => 0,
            "max" => 800,
            "step" => 1,
            "unit" => "px",
            "description" => __("Adjust arrow width. Default is 137px", "asvc"),
            'dependency' => array(
                'element' => 'arrowed',
                'value' => 'true',
            ),
        ),        
        array(
            'type' => 'checkbox',
            'heading' => esc_attr__('Use ribbon?', 'asvc'),
            'param_name' => 'ribbon',
            'value' => array(
                esc_attr__('Yes', 'asvc') => 'true'
            ),
            "description" => "Check this box if you will use additional ribbon in right top corner"
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__("Ribbon text", 'asvc'),
            "param_name" => "ribbon_text",
            "dependency" => Array(
                'element' => "ribbon",
                'value' => array(
                    'true'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__("Ribbon background color", 'asvc'),
            "param_name" => "ribbon_bgcolor",
            "value" => "#88B700",
            "description" => esc_attr__("Select ribbon background color", 'asvc'),
            "dependency" => Array(
                'element' => "ribbon",
                'value' => array(
                    'true'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__("Ribbon text color", 'asvc'),
            "param_name" => "ribbon_txtcolor",
            "value" => "#fff",
            "description" => esc_attr__("Select ribbon text color", 'asvc'),
            "dependency" => Array(
                'element' => "ribbon",
                'value' => array(
                    'true'
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__("Link", 'asvc'),
            "param_name" => "link",
            "description" => "Link for button. If you leave this field blank button will be not displayed."
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__("Button text", 'asvc'),
            "param_name" => "button_txt",
            "value" => esc_attr__("Buy Now", 'asvc')
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_attr__("Button style ", 'asvc'),
            "param_name" => "button_style",
            'save_always' => true,
            "value" => array(
                "Default" => "",
                "Dark" => "dark",
                "Light" => "light",
                "White" => "white",
                "Blue" => "blue",
                "Green" => "green",
                "Orange" => "orange",
                "Yellow" => "yellow",
                "Red" => "red",
                "Purple" => "purple",
                "Pink" => "pink",
                "Gray" => "gray",
                "Default Bordered" => "line",
                "White Bordered" => "line-white",
                "Dark Bordered" => "line-dark",
                "Blue Bordered" => "line-blue",
                "Green Bordered" => "line-green",
                "Orange Bordered" => "line-orange",
                "Yellow Bordered" => "line-yellow",
                "Red Bordered" => "line-red",
                "Purple Bordered" => "line-purple",
                "Pink Bordered" => "line-pink",
                "Gray Bordered" => "line-gray",
                "Gradient 1" => "gradient1",
                "Gradient 2" => "gradient2",
                "Gradient 3" => "gradient3",
                "Gradient 1  Bordered" => "gradient1 bordered",
                "Gradient 2  Bordered" => "gradient2 bordered",
                "Gradient 3  Bordered" => "gradient3 bordered",
                "Readmore only" => "readmore"
            ),
            "description" => esc_attr__("Select button style.", 'asvc')
        )
    )
));


add_shortcode('asvc_pricing_column', 'asvc_pricing_column');
function asvc_pricing_column( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'column_style' => '',
        'inistate' => '',
        'arrowed' => '',
        'arrow_width' => '',
        'price_bgcolor' => '',
        'price_txtcolor' => '',
        'useimage' => '',
        'image_type' =>'selector',
        'icon' => '',
        'icon_size' => '',
        'icon_color' => '',
        'icon_style' => '',
        'icon_badge_color' => '#fff',
        'image' => '',
        'title' => '',
        'subtitle' => '',
        'price' => '',
        'currency' => '',
        'currencypos' => '',
        'price_sub' => '',
        'ribbon' => '',
        'ribbon_text' => '',
        'ribbon_bgcolor' => '',
        'ribbon_txtcolor' =>'',
        'link' => '',
        'button_txt' => 'Buy Now',
        'button_style' => ''
        ), $atts));
        
        
        wp_register_style( 'pricing-table-font-awesome', plugins_url( '../info-box/css/font-awesome.min.css',  __FILE__) );
        wp_enqueue_style( 'pricing-table-font-awesome' );
        
        wp_register_style( 'pricing-table-css', plugins_url( '/css/pricing-table.css',  __FILE__) );
        wp_enqueue_style( 'pricing-table-css' );       
         
        
    if (is_numeric($image)) {
                        $image_src = wp_get_attachment_url($image);
                } else {
                        $image_src = $image;
                }
    $customstyle1 = $customstyle2 = $icon_style1 = '';
    if ($column_style == 'custom') {
    $customstyle1 = ' style="background-color:'.$price_bgcolor.'"';
    $customstyle2 = ' style="color:'.$price_txtcolor.'"';
    }	
    if(strtolower($arrowed) == 'true') { $column_style .= ' is_indicator'; }
    if ($column_style == 'highlighted' && strtolower($inistate) == 'true') {
        $column_style .= ' premium'; 
    }
    if ($image_type == 'selector') { 
    $icon_style1 = ' style="';
    $icon_style1 .= 'color:'.$icon_color.';';
    if ($icon_style != '') {
    $icon_style1 .=  'background-color:'.$icon_badge_color.';';
    }
    $icon_style1 .= 'font-size:'.$icon_size.'px;';
    $icon_style1 .= '"';
    }
    $html ='';
    $html .= '<div class="asvc-plan '.$column_style.'">';
    if(strtolower($ribbon) == 'true'){
    $html.= '<div class="ribbon" style="background-color:'.$ribbon_bgcolor.';color:'.$ribbon_txtcolor.';">'.$ribbon_text.'</div>';	
    }
    $html .= '<div class="asvc-plan-top"'.$customstyle1.'>';
        $html .= '<h3'.$customstyle2.'>'.$title;
    if ($subtitle != '') $html .= '<br/><span>'.$subtitle.'</span>';
    $html .= '</h3>';
    if (strtolower($useimage) == 'true' && $image_type == 'image' && $image_src != '') {
    $html .= '<img src="'.$image_src.'" />';
    }
    if (strtolower($useimage) == 'true' && $image_type == 'selector' && $icon != '') {
    $html .= '<div class="i-holder '.$icon_style.'"><i class ="'.$icon.'"'.$icon_style1.'></i></div>';
    }
    $html .= '<div class=" asvc-plan-price"'.$customstyle2.'>';
    if ($currencypos =='after') { 
    $html .= '<span class="value">'.$price.'<span class="asvc-plan-currency">'.$currency.'</span><span class="period">'.$price_sub.'</span></span>';
    }
    if ($currencypos == 'before') { 
    $html .= '<span class="value"><span class="asvc-plan-currency">'.$currency.'</span>'.$price.'<span class="period">'.$price_sub.'</span></span>';
    }
    $html .= '</div>';
    if(strtolower($arrowed) == 'true') {
    $html .= '<div class="down_indicator" style="border-top-color: '.$price_bgcolor.'; border-left-width: '.$arrow_width.'px; border-right-width: '.$arrow_width.'px;"></div>';
    }
    $html .= '</div>';
    $html .= '<div class="asvc-plan-features">'.wpb_js_remove_wpautop($content, true);
    if ($link != '') {
    $html .= ' <div class="button-area">
          <a href="'.$link.'" target="_self" class="button_dp small '.$button_style.'"><span>'.$button_txt.'</span></a>
          </div>';
    }
    $html .= '</div>
                    </div><div class="clearboth"></div>';
    
    return $html;
}        