<?php
            
            vc_map( array(
                "name"        => __( "Table", 'asvc' ),
                'description' => __('Add a different style table','asvc'),
                "base"        => "asvc_table",
                "icon"        => "asvc_table_icon",
                "category" => __('VC Addons', 'js_composer'),
                "params"      => array(

            array(
                'type'          => 'textarea',
                'heading'       => '',
                'param_name'    => 'content',
                'holder'        => 'div',
                'value'         => '<table>
                        <tr>
                    <th class="ts-center ts-min">ID</th>
                            <th>Month</th>
                            <th>Savings</th>
                        </tr>
                        <tr>
                    <td class="ts-center">1</td>
                            <td>January</td>
                            <td>$100</td>
                        </tr>
                        <tr>
                    <td class="ts-center">2</td>
                            <td>February</td>
                            <td>$120</td>
                        </tr>
                    </table>',
                'class'         => 'preview-table',
                'group'         => __('Table', 'asvc')
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => __('Color','asvc'),
                'param_name'    => 'color',
                'value'         => array(
                    __( 'Default', 'asvc' )     => '',
                    __( 'Dark Blue', 'asvc' )   => 'darkblue',
                    __( 'Ocean Blue', 'asvc' )  => 'blue',
                    __( 'Green', 'asvc' )       => 'green',
                    __( 'Orange', 'asvc' )      => 'orange',
                    __( 'Yellow', 'asvc' )      => 'yellow',
                    __( 'Custom', 'asvc' )      => 'custom'
                ),
                'description'   => __('Choose a defined color or a custom color','asvc'),
                'class'         => '',
                'group'         => __('Style', 'asvc')
            ),
            array(
                'type'          => 'colorpicker',
                'heading'       => __('Custom Color','asvc'),
                'param_name'    => 'custom_color',
                'value'         => '',
                'class'         => '',
                'dependency'    => array( 'element' => 'color', 'value' => array( 'custom' ) ),
                'group'         => __('Style', 'asvc')
            ),
                    array(
                        "type" => "textfield",
                        "heading" => __("Extra class name", "asvc"),
                        "param_name" => "class",
                        "value" => "",
                        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "asvc")
                    ),            



                )
            ) );
            
            function asvc_table_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                    'color'         => '',
                    'custom_color'  => '',
                    'class' => '',
                    
                ), $atts ) );
                
                
                wp_register_style( 'table-css', plugins_url( '/css/table.css',  __FILE__) );
                wp_enqueue_style( 'table-css' );
                
                
    $class = $class ? ' '.esc_attr( $class ) : '';
    $class.= ' ts-color-'.($color ? esc_attr( $color ) : 'default');
    $attrs = ' class="ts-table'.$class.'"';
    $attrs.= $custom_color && $color == 'custom' ? ' style="border-color: '.esc_attr( $custom_color ).';"' : '';

    return str_replace('<table>', '<table '.$attrs.'>', do_shortcode( $content ) );
                
            }


            add_shortcode( 'asvc_table', 'asvc_table_shortcode_function' );