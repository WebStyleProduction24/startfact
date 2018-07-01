<?php
vc_map(array(
    "name" 			=> "Animate Text",
    "category" 		=> 'VC Addons',
    "description"	=> "Animated typing text effect",
    "base" 			=> "asvc_animate_text",
    "class" 			=> "",
    "icon" 			=> "asvc_animate_text_icon",
    'params' => array(
    
                    array(
                        "type" => "hvc_notice",
                        "class" => "",
                        'heading' => __('<h3 class="hvc_notice" align="center">This is premium addon, please buy the pro version here <a target="_blank" href="https://themebon.com/item/visual-composer-shortcodes-pro/">Essential WPBakery Page Builder (formerly Visual Composer) Addons</a> for only $13</h3>', 'hvc'),
                        "param_name" => "hvc_notice_param_1",
                        "value" => '',
                    ),    
    
	array(
		'type' => 'textfield',
		'heading' => __( 'Animated Text', 'asvc' ),
		'param_name' => 'text_mid',
		'value' => __( 'Typing, Text, Effects', 'asvc' ),
		'description' => __( 'The text that has the animation effect', 'asvc' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Text Effect', 'asvc' ),
		'param_name' => 'text_effect',
		'value' => array(
			__( 'Text Scrambled', 'asvc' ) => 'text-scrambled',
			__( 'Typing', 'asvc' ) => 'typing',
			__( 'Fade', 'asvc' ) => 'fade',
			__( 'Top To Bottom', 'asvc' ) => 'top-to-bottom',
			__( 'Vertical Flip', 'asvc' ) => 'vertical-flip',
			__( 'Random Letters', 'asvc' ) => 'random-letters',
		),
		'description' => __( 'Select the animation for your text effect.', 'asvc' ),
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Prepend Text', 'asvc' ),
		'param_name' => 'text_before',
		'value' => '',
		'description' => __( 'Text that appears before the animated text', 'asvc' ),
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Append Text', 'asvc' ),
		'param_name' => 'text_after',
		'value' => '',
		'description' => __( 'Text that appears after the animated text', 'asvc' ),
	),

	array(
		'type' => 'dropdown',
		'heading' => __( 'Text Style', 'asvc' ),
		'param_name' => 'text_style',
		'value' => array(
			__( 'H1', 'asvc' ) => 'h1',
			__( 'H2', 'asvc' ) => 'h2',
			__( 'H3', 'asvc' ) => 'h3',
			__( 'H4', 'asvc' ) => 'h4',
			__( 'H5', 'asvc' ) => 'h5',
			__( 'H6', 'asvc' ) => 'h6',
			__( 'Body Text', 'asvc' ) => 'div',
		),
		'std' => 'h2',
		'description' => __( 'Size/text style', 'asvc' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Alignment', 'asvc' ),
		'param_name' => 'text_align',
		'value' => array(
			__( 'Center', 'asvc' ) => 'center',
			__( 'Left', 'asvc' ) => 'left',
			__( 'Right', 'asvc' ) => 'right',
		),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Animation Speed', 'asvc' ),
		'param_name' => 'animation_speed',
		'value' => array(
			__( 'Fast', 'asvc' ) => 'fast',
			__( 'Normal', 'asvc' ) => 'normal',
			__( 'Slow', 'asvc' ) => 'slow',
		),
		'std' => 'normal',
		'description' => __( 'The speed of the text animation.', 'asvc' ),
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Animation Delay', 'asvc' ),
		'param_name' => 'animation_delay',
		'value' => __( '2000', 'asvc' ),
		'description' => __( 'The pause duration between animations (in milliseconds)', 'asvc' ),
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Font Size', 'asvc' ),
		'param_name' => 'font_size',
		'value' => '40',
		'description' => __( 'Font size in pixels', 'asvc' ),
	),
	array(
		'type' => 'colorpicker',
		'heading' => __( 'Font Color', 'asvc' ),
		'param_name' => 'font_color',
		'description' => __( 'The color of the text including appended and prepended text', 'asvc' ),
	),
	array(
		'type' => 'colorpicker',
		'heading' => __( 'Middle Text Background Color', 'asvc' ),
		'param_name' => 'middle_bg_color',
		'description' => __( 'Pick a color to add a solid background to the animated text. Leave blank if you don\'t want any background.', 'asvc' ),
	),
	array(
		'type' => 'colorpicker',
		'heading' => __( 'Middle Text Color', 'asvc' ),
		'param_name' => 'middle_text_color',
		'description' => __( 'Select color for the animated text.', 'asvc' ),
	),
	array(
		'type' => 'colorpicker',
		'heading' => __( 'Scrambled Character Color', 'asvc' ),
		'param_name' => 'char_color',
		'description' => __( 'The color of the scrambled characters for the text-scrambled animation.', 'asvc' ),
		'value' => '#b7b7b7',
		'dependency' => array(
			'element' => 'text_effect',
			'value' => 'text-scrambled',
		),
	),
),
) );


    function asvc_animate_text_shortcode_function( $atts, $content = '' ) {

	    $defaults = array(
				'text_before' => '',
				'text_after' => '',
				'text_mid' => 'Typing, Text, Effects',
				'text_effect' => 'text-scrambled',
				'char_color' => '#b7b7b7',
				'animation_delay' => '2000',
				'animation_speed' => 'normal',
				'font_size' => '40',
				'font_color' => '',
				'middle_bg_color' => '',
				'middle_text_color' => '',
				'text_align' => 'center',
				'text_style' => 'h2',
	        );

			if ( empty( $atts ) ) {
				$atts = array();
			}
	        $atts = array_merge( $defaults, $atts );


            $output ='';

			$output .= '<h3>This addon for pro version. Please buy <a href="https://themebon.com/item/visual-composer-shortcodes-pro/">pro version from here</a></h3>';

			return $output;
		}
add_shortcode( 'asvc_animate_text', 'asvc_animate_text_shortcode_function' );