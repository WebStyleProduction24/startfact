<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

require_once ('hotspot_param.php');


class WPBakeryShortCode_asvc_Hotspot extends WPBakeryShortCode {}

vc_map(
    array(
       'name' => esc_html__('Image Hotspot','asvc'),
       'base' => 'asvc_hotspot',
       'class' => '',
       'icon'    => 'asvc_hotspot_icon',
       'admin_enqueue_js' => array( plugins_url( '/admin/jquery.hotspot.js', __FILE__ )),
       'admin_enqueue_css' => array( plugins_url( '/admin/hotspot.css', __FILE__ )),
       "category" =>array( esc_attr__('VC Addons', 'asvc'),esc_attr__('Content', 'asvc')),
       'description' => esc_html__('Display single image with markers and tooltips','asvc'),
       'params' => array(
       
                    array(
                        "type" => "hvc_notice",
                        "class" => "",
                        'heading' => __('<h3 class="hvc_notice" align="center">This is premium addon, please buy the pro version here <a target="_blank" href="https://themebon.com/item/visual-composer-shortcodes-pro/">Essential WPBakery Page Builder (formerly Visual Composer) Addons</a> for only $13</h3>', 'hvc'),
                        "param_name" => "hvc_notice_param_1",
                        "value" => '',
                    ),       
       
            array(
                'type'                => 'attach_image',
                'param_name'        => 'image',
                'heading'            => '<span class="asvc-vc-tip" data-balloon-length="medium" data-balloon="'.esc_html__('Select image from media library', 'asvc').'" data-balloon-pos="right"><span></span></span>'.esc_html__('Image', 'asvc'),
                'edit_field_class'    => 'vc_column vc_col-sm-12',
            ),
            array(
                'type'                => 'asvc_hotspot_param',
                'heading'            => '',
                'param_name'        => 'hotspot_data',
                'edit_field_class'    => 'vc_column vc_col-sm-12',
            ),
            array(
                'type'                => 'dropdown',
                'heading'            => '<span class="asvc-vc-tip" data-balloon-length="medium" data-balloon="'.esc_html__('Define the action at which the hotspot tooltip will be displayed on.', 'asvc').'" data-balloon-pos="right"><span></span></span>'.esc_html__('Tooltips display', 'asvc'),
                'param_name'        => 'hotspot_action',
                'edit_field_class'    => 'vc_column vc_col-sm-12',
                'default'                => 'hover',
                'value'            => array(
                    
                    esc_html__('On Hover','asvc')    => 'hover',
                    esc_html__('Allways','asvc')     => 'allways',
                    esc_html__('On Click','asvc')    => 'click',
                ),
            ),
            array(
                'type'                => 'textfield',
                'heading'            => esc_html__('Custom CSS Class', 'asvc'),
                'param_name'        => 'el_class',
            ),
            array(
                'type'                => 'dropdown',
                'heading'            => '<span class="asvc-vc-tip" data-balloon-length="medium" data-balloon="'.esc_html__('Select marker style. You can leave default style or upload your own image.', 'asvc').'" data-balloon-pos="right"><span></span></span>'.esc_html__('Marker style', 'asvc'),
                'param_name'        => 'marker_style',
                'default'                => 'default',
                'value'            => array(
                    esc_html__('Default', 'asvc')            => 'default',
                    esc_html__('Image', 'asvc')            => 'image',
                ),
                'group'                => esc_html__('Markers settings', 'asvc'),
            ),
            array(
                'type'                => 'colorpicker',
                'param_name'        => 'marker_bg',
                'heading'            => '<span class="asvc-vc-tip" data-balloon-length="medium" data-balloon="'.esc_html__('Change the background of hotspot markers.', 'asvc').'" data-balloon-pos="right"><span></span></span>'.esc_html__('Marker background', 'asvc'),
                'edit_field_class'    => 'vc_column vc_col-sm-6',
                'value'                => '#ff3368',
                'dependency'        => array('element' => 'marker_style', 'value_not_equal_to' => 'image'),
                'group'                => esc_html__('Markers settings', 'asvc'),
            ),
            array(
                'type'                => 'colorpicker',
                'param_name'        => 'marker_inner_bg',
                'heading'            => '<span class="asvc-vc-tip" data-balloon-length="medium" data-balloon="'.esc_html__('Change the background of the hotspot marker inner dot', 'asvc').'" data-balloon-pos="left"><span></span></span>'.esc_html__('Marker inner background', 'asvc'),
                'edit_field_class'    => 'vc_column vc_col-sm-6',
                'value'                => '#ffffff',
                'dependency'        => array('element' => 'marker_style', 'value_not_equal_to' => 'image'),
                'group'                => esc_html__('Markers settings', 'asvc'),
            ),
            array(
                'type'                => 'attach_image',
                'heading'            => '<span class="asvc-vc-tip" data-balloon-length="medium" data-balloon="'.esc_html__('Choose the image to use as marker.', 'asvc').'" data-balloon-pos="right"><span></span></span>'.esc_html__('Image', 'asvc'),
                'param_name'        => 'marker_image',
                'dependency'        => array('element' => 'marker_style', 'value' => 'image'),
                'edit_field_class'    => 'vc_column vc_col-sm-12',
                'group'                => esc_html__('Markers settings', 'asvc'),
            ),
            array(
                'type'                => 'dropdown',
                'heading'            => '<span class="asvc-vc-tip" data-balloon-length="medium" data-balloon="'.esc_html__('Select the tooltip position relative to the marker.', 'asvc').'" data-balloon-pos="right"><span></span></span>'.esc_html__('Tooltip position', 'asvc'),
                'param_name'        => 'tooltip_position',
                'default'                => 'top',
                'value'            => array(
                    esc_html__('Top', 'asvc')            => 'top',
                    esc_html__('Bottom', 'asvc')            => 'bottom',
                    esc_html__('Left', 'asvc')            => 'left',
                    esc_html__('Right', 'asvc')            => 'right',
                    esc_html__('Top Left', 'asvc')        => 'top-left',
                    esc_html__('Top Right', 'asvc')        => 'top-right',
                    esc_html__('Bottom Left', 'asvc')    => 'bottom-left',
                    esc_html__('Bottom Right', 'asvc')    => 'bottom-right',
                ),
                'group'                => esc_html__('Tooltips settings', 'asvc'),
                'edit_field_class'    => 'vc_column vc_col-sm-12',
            ),
            array(
                'type'                => 'dropdown',
                'heading'            => '<span class="asvc-vc-tip" data-balloon-length="medium" data-balloon="'.esc_html__('Set the tooltip text alignment.', 'asvc').'" data-balloon-pos="right"><span></span></span>'.esc_html__('Tooltip content alignment', 'asvc'),
                'param_name'        => 'tooltip_content_align',
                'default'                => 'left',
                'value'            => array(
                    esc_html__('Left', 'asvc')            => 'left',
                    esc_html__('Right', 'asvc')            => 'right',
                    esc_html__('Center', 'asvc')            => 'center',
                ),
                'group'                => esc_html__('Tooltips settings', 'asvc'),
                'edit_field_class'    => 'vc_column vc_col-sm-6',
            ),
            array(
                'type'                => 'prime_slider',
                'heading'            => '<span class="asvc-vc-tip" data-balloon-length="medium" data-balloon="'.esc_html__('Set the minimal width of item tooltip.', 'asvc').'" data-balloon-pos="left"><span></span></span>'.esc_html__('Tooltip min width', 'asvc'),
                'param_name'        => 'tooltip_width',
                "value" => 300,
                "min" => 100,
                "max" => 500,
                "step" => 1,
                "unit" => "px",
                'edit_field_class'    => 'vc_column vc_col-sm-6',
                'group'                => esc_html__('Tooltips settings', 'asvc'),
            ),
            array(
                'type'                => 'colorpicker',
                'param_name'        => 'tooltip_bg_color',
                'heading'            => '<span class="asvc-vc-tip" data-balloon-length="medium" data-balloon="'.esc_html__('Choose the color for the tooltip\'s background. The default value is #fff.', 'asvc').'" data-balloon-pos="right"><span></span></span>'.esc_html__('Tooltip Background Color', 'asvc'),
                'default'            => '#fff',
                'edit_field_class'    => 'vc_column vc_col-sm-6',
                'group'                => esc_html__('Tooltips settings', 'asvc'),
            ),
            array(
                'type'                => 'colorpicker',
                'param_name'        => 'tooltip_text_color',
                'heading'            => '<span class="asvc-vc-tip" data-balloon-length="medium" data-balloon="'.esc_html__('Choose the color for the tooltip\'s text. The default value is #555.', 'asvc').'" data-balloon-pos="left"><span></span></span>'.esc_html__('Tooltip Text Color', 'asvc'),
                'default'            => '#555',
                'edit_field_class'    => 'vc_column vc_col-sm-6',
                'group'                => esc_html__('Tooltips settings', 'asvc'),
            )
        ),
    )
);


add_shortcode('asvc_hotspot', 'asvc_hotspot_shortcode');

function asvc_hotspot_shortcode( $atts, $content = null ) {
    
    $atts = vc_map_get_attributes( 'asvc_hotspot', $atts );
        extract( $atts );
            
        
        $output ='<h3>This addon for pro version. Please buy <a href="https://themebon.com/item/visual-composer-shortcodes-pro/">pro version from here</a></h3>';

return $output;

}