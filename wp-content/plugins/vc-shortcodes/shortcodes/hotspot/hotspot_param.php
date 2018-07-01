<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function asvc_hotspot($settings, $value)
		{
			$dependency = (function_exists('vc_generate_dependencies_attributes')) ? vc_generate_dependencies_attributes($settings) : '';
			$param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
			$type = isset($settings['type']) ? $settings['type'] : '';
			$class = isset($settings['class']) ? $settings['class'] : '';
			$uni = uniqid('asvc-hotspot-'.rand());
			$output = '<div class="asvc-hotspot-param-container clearboth">';
			$output .= '<div class="asvc-hotspot-image-holder" data-popup-title="'.esc_attr__('Hotspot Tooltip Content', 'bruno-functions').'" data-save-text="'.esc_attr__('Save changes', 'bruno-functions').'" data-close-text="'.esc_attr__('Close','bruno-functions').'"></div>';
			$output .= '<input type="hidden" id="'.esc_attr($uni).'" name="'.$settings['param_name'].'" class="wpb_vc_param_value asvc_hotspot_var '.$settings['param_name'].' '.$settings['type'].'_field" value=\''.$value.'\' />';
			$output .= '</div>';
			return $output;
		}

if ( function_exists('vc_add_shortcode_param'))
			{
				vc_add_shortcode_param('asvc_hotspot_param' , 'asvc_hotspot', plugins_url( '/admin/asvc.hotspot.js', __FILE__ ) );
				
			}


