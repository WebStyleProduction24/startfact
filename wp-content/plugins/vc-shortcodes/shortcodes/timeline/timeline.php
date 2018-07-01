<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

vc_map( array(
        "name" => __("Timeline", 'asvc'),
        "base" => "timeline",
        "icon" => "asvc_timeline_icon",
        "as_parent" => array('only' => 'timeline_item, timeline_sep'),
    	"category" =>array( __('VC Addons', 'asvc'),__('Content', 'asvc')),
        "content_element" => true,
        "show_settings_on_create" => false,
        "description" =>  __('Timeline container', 'asvc'),
        "params" => array(
    array(
      "type" => "dropdown",
      "class" => "",
      "heading" => __("Line type", 'asvc'),
      "param_name" => "type",
    		'save_always' => true,
            "value" => array(
                "Solid" => "solid",	
                "Dotted" => "dotted",	
                "Dashed" => "dashed"
            ),
      "std" => "solid",
      "description" => "Select type of timeline axe"
    ),
    array(
      "type" => "colorpicker",
      "class" => "",
      "heading" => __("Line color", 'asvc'),
      "param_name" => "line_color",
      "description" => "Select color of timeline axe"
    ),
                array(
                        "type" => "textfield",
                        "heading" => __("Extra class name", 'asvc'),
                        "param_name" => "el_class",
                        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'asvc')
                )
        ),
        "js_view" => 'VcColumnView'
) );
vc_map( array(
        "name" => __("Timeline Item", 'asvc'),
        "base" => "timeline_item",
        "icon" => "asvc_timeline_item",
        "content_element" => true,
        "description" =>  __('Single timeline item', 'asvc'),
        "as_child" => array('only' => 'timeline'), 
        "params" => array(
        array(
          "type" => "dropdown",
          "class" => "",
          "heading" => __("Item position", 'asvc'),
          "param_name" => "position",
        	  'save_always' => true,
                "value" => array(
                    "Right" => "right",	
                    "Left" => "left",	
                ),
          "std" => "right",
          "description" => "Select type of timeline axe"
        ),
        array(
          "type" => "colorpicker",
          "class" => "",
          "heading" => __("Node color", 'asvc'),
          "param_name" => "node_color",
          "description" => "Select color of timeline node"
        ),
        array(
          "type" => "textfield",
          "heading" => __("Date", 'asvc'),
          "param_name" => "date"
        ),
        array(
          "type" => "colorpicker",
          "class" => "",
          "heading" => __("Date background color", 'asvc'),
          "param_name" => "date_color",
          "description" => "Select background color for date"
        ),
         array(
          "type" => "colorpicker",
          "class" => "",
          "heading" => __("Date text color", 'asvc'),
          "param_name" => "date_text_color",
          "description" => "Select text color for date"
        ),
        array(
          "type" => "textfield",
          "heading" => __("Title", 'asvc'),
          "param_name" => "title",
          "admin_label" => true,
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => __("Content", 'asvc'),
            "param_name" => "content",
            "value" => __("Item content.", 'asvc')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'asvc'),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'asvc')
        )
        )
) );
vc_map( array(
        "name" => __("Timeline Seprator", 'asvc'),
        "base" => "timeline_sep",
        "icon" => "asvc_timeline_separator",
        "content_element" => true,
        "description" =>  __('Timeline item separator', 'asvc'),
        "as_child" => array('only' => 'timeline'), 
        "params" => array(
    array(
          "type" => "textfield",
          "heading" => __("Separator text", 'asvc'),
          "param_name" => "sep_text",
          "admin_label" => true,
        ),
    array(
          "type" => "colorpicker",
          "class" => "",
          "heading" => __("Separator background color", 'asvc'),
          "param_name" => "sep_color",
          "description" => "Select background color for separator"
        ),
    array(
          "type" => "colorpicker",
          "class" => "",
          "heading" => __("Separator text color", 'asvc'),
          "param_name" => "sep_text_color",
          "description" => "Select text color for separator"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", 'asvc'),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'asvc')
        )
        )
) );

class WPBakeryShortCode_timeline extends WPBakeryShortCodesContainer {
}
class WPBakeryShortCode_timeline_item extends WPBakeryShortCode {
}
class WPBakeryShortCode_timeline_sep extends WPBakeryShortCode {
}



add_shortcode('timeline', 'dp_timeline');
add_shortcode('timeline_item', 'dp_timeline_item');
add_shortcode('timeline_sep', 'dp_timeline_sep');

function dp_timeline( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'type' => '',
		'line_color' => '',
		"el_class"=>""
		), $atts));
	//[time_container]
	$linecolor = '';
	if ($line_color != '') $line_color = 'style ="border-color:'.$line_color.'"';
	$dp_timeline ='<div class="timeline '.$el_class.'">';
	$dp_timeline .='<div class="central_line '.$type.'" '.$line_color.'></div>';
	$dp_timeline .= do_shortcode($content);
	$dp_timeline.='</div><div class="clearboth"></div>';
	return $dp_timeline;
}

function dp_timeline_item( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'node_color' => '',
		'date_color' =>'',
		'position' => 'right',
		'date_text_color' => '',
		'title' => '',
		'date' => '',
		'dp_animation' => "",
		"el_class"=>""
		), $atts));
        
        
    wp_register_style( 'timeline-css', plugins_url( 'css/timeline.css',  __FILE__) );
    wp_enqueue_style( 'timeline-css' );        
        
        
	//[time_line_item]
	$date_style = '';
	if ($dp_animation != "") $dp_animation = ' data-animated ="'.$dp_animation.'"';
	if ($node_color !='') $node_color = 'style = "border-color:'.$node_color.'"';
	if (($date_color !='') || ($date_text_color != '')) {
	$date_style = 'style="';
	if ($date_color !='') $date_style .='background-color:'.$date_color.';';
	if ($date_color !='') $date_style .='color:'.$date_text_color.';';
	$date_style .= '"';
	}
	$dp_timeline_item ='<div class="timeline_item '.$position.' '.$el_class.'"><div class="inner">';
	$dp_timeline_item .='<div class="timeline_node" '.$node_color.'></div>';
	$dp_timeline_item .='<div class="item_date_container"><div class="item_date" '.$date_style.'>'.$date.'</div></div>';
	$dp_timeline_item .='<div class="item_content" '.$dp_animation.'><div class="item_content_inner">';
	if ($title != '') $dp_timeline_item .='<h4 class="item_title">'.$title.'</h4>';
	$dp_timeline_item .=wpb_js_remove_wpautop($content, true).'</div></div>';
	$dp_timeline_item .='</div><div class="clearboth"></div></div>';
	return $dp_timeline_item;
}			

function dp_timeline_sep( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'sep_color' => '',
		'sep_text_color' => '',
		'sep_text' => '',
		"el_class"=>""
		), $atts));
	//[time_line_item]
	$sep_style = '';
	if (($sep_color !='') || ($sep_text_color != '')) {
	$sep_style = 'style="';
	if ($sep_color !='') $sep_style .='background-color:'.$sep_color.';';
	if ($sep_color !='') $sep_style .='color:'.$sep_text_color.';';
	$sep_style .= '"';
	}
	$dp_timeline_sep = '<div class="timeline_sep '.$el_class.'"><div class="timeline_sep_inner"><span '.$sep_style.'>'.$sep_text.'</span></div></div>';
	return $dp_timeline_sep;
}			