<?php
            vc_map( array(
                "name"        => __( "Button Set", 'asvc' ),
                'description' => __('Add modern style button set','asvc'),
                "base"        => "asvc_button_set",
                "icon"        => "asvc_button_set_icon",
                "category" => __('VC Addons', 'js_composer'),
                "params"      => array(

                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'Title', 'asvc' ),
                        'param_name'    => 'title_left',
                        'value'         => __( 'Title', 'asvc' ),
                        'class'         => '',
                        'group'         => __('Left Button', 'asvc')
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'URL', 'asvc' ),
                        'param_name'    => 'url',
                        'value'         => '#',
                        'class'         => '',
                        'group'         => __('Left Button', 'asvc')
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Target', 'asvc' ),
                        'param_name'    => 'target',
                        'value'         => array(
                            ''          => '',
                            __( '_blank', 'asvc' )  => '_blank',
                            __( '_self', 'asvc' )   => '_self',
                            __( '_parent', 'asvc' ) => '_parent',
                            __( '_top', 'asvc' )    => '_top',
                        ),
                        'description'   => __( '(Optional)', 'asvc' ),
                        'class'         => '',
                        'group'         => __('Left Button', 'asvc')
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'Title', 'asvc' ),
                        'param_name'    => 'center_text',
                        'value'         => __( 'or', 'asvc' ),
                        'description'   => __( 'Write a small text for buttons center', 'asvc' ),
                        'class'         => '',
                        'group'         => __('Center Text', 'asvc')
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'Title', 'asvc' ),
                        'param_name'    => 'title_right',
                        'value'         => __( 'Title', 'asvc' ),
                        'class'         => '',
                        'group'         => __('Right Button', 'asvc')
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'URL', 'asvc' ),
                        'param_name'    => 'url2',
                        'value'         => '#',
                        'class'         => '',
                        'group'         => __('Right Button', 'asvc')
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Target', 'asvc' ),
                        'param_name'    => 'target2',
                        'value'         => array(
                            ''          => '',
                            __( '_blank', 'asvc' )  => '_blank',
                            __( '_self', 'asvc' )   => '_self',
                            __( '_parent', 'asvc' ) => '_parent',
                            __( '_top', 'asvc' )    => '_top',
                        ),
                        'description'   => __( '(Optional)', 'asvc' ),
                        'class'         => '',
                        'group'         => __('Right Button', 'asvc')
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Color', 'asvc' ),
                        'param_name'    => 'color',
                        'value'         => array(
                            __( 'Dark Blue', 'asvc' )   => 'darkblue',
                            __( 'Ocean Blue', 'asvc' )  => 'blue',
                            __( 'Green', 'asvc' )       => 'green',
                            __( 'Orange', 'asvc' )      => 'orange',
                            __( 'Yellow', 'asvc' )      => 'yellow',
                            __( 'White', 'asvc' )       => 'white',
                        ),
                        'description'   => __( 'Choose a defined color', 'asvc' ),
                        'class'         => '',
                        'group'       => __('Style', 'asvc')
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Align', 'asvc' ),
                        'param_name'    => 'align',
                        'value'         => array(
                            'Left'   => '', 
                            'Right'  => 'right', 
                            'Center' => 'center', 
                            
                        ),
                        'std'       => '',
                        'class'         => '',
                        'group'       => __('Style', 'asvc')
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'Extra Class', 'asvc' ),
                        'param_name'    => 'class',
                        'value'         => '',
                        'class'         => '',
                        'group'         => __('Style', 'asvc')
                    )           



                )
            ) );
            
            function asvc_button_set_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                
                    'title_left'  => __( 'Title', 'asvc' ),
                    'title_right' => __( 'Title', 'asvc' ),
                    'title_attr'  => 'off',
                    'color'       => 'darkblue',
                    'url'         => '#',
                    'target'      => '',
                    'url2'        => '#',
                    'target2'     => '',
                    'align'       => 'left',
                    'center_text' => 'or',
                    'border'      => 'off',
                    'class'       => ''
                    
                ), $atts ) );
                
                
                wp_register_style( 'asvc-button-set-css', plugins_url( '/css/button-set.css',  __FILE__) );
                wp_enqueue_style( 'asvc-button-set-css' );
                
                
                $output = '';

                if( strpos( $center_text, 'fa-' ) !== false ) {
                    $center_text = '<i class="fa '.$center_text.'"></i>';
                }

                $attrs = ' class="ts-buttons-init ts-buttons ts-color-'.$color.' ts-align-'.$align.' '.$class.'"';

                $output.= $align == 'center' ? '<div class="text-center">' : '';

                $output.= '<span'.$attrs.'>';

                $attrs = ' href="'.esc_url( $url ).'"';
                $attrs.= $target ? ' target="'.esc_attr( $target ).'"':'';
                $attrs.= $title_attr == 'on' ? ' title="'.esc_attr( $title_left ).'"' : '';

                $output.= '<a'.$attrs.' class="ts-button-left ts-buttons-btn">'.$title_left.'</a>';

                $output.= '<span class="ts-button-center">'.$center_text.'</span>';

                $attrs = ' href="'.esc_url( $url2 ).'"';
                $attrs.= $target2 ? ' target="'.esc_attr( $target2 ).'"':'';
                $attrs.= $title_attr == 'on' ? ' title="'.esc_attr( $title_right ).'"' : '';

                $output.= '<a'.$attrs.' class="ts-button-right ts-buttons-btn">'.$title_right.'</a>';

                $output.= '</span>';


                return $output;
                
            }


            add_shortcode( 'asvc_button_set', 'asvc_button_set_shortcode_function' );