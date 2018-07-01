<?php

                
        vc_map( 
            array(
                "name"                    => __( "Video Popup", "asvc" ),
                "description"            => __( "Show youtube/vemio videos.", 'asvc' ),
                "base"                    => "asvc_video_popup",
                "icon"                  => "asvc_video_popup_icon",
                "category"                => __( "VC Addons", "asvc" ),
                "params"                => array(

                    array(
                        "type" => "textfield",
                        "heading" => __("Enter the Url", "amz-composer-plugins"),
                        "param_name" => "url",
                        "value" => "",
                        "description" => __("Please Enter the You-Tube or Vimeo Url.", "amz-composer-plugins")
                        ),

                    array(
                        "type" => "textfield",
                        "heading" => __("Trigger Text", "amz-composer-plugins"),
                        "param_name" => "text",
                        "value" => "Title",
                        "description" => __("Enter the trigger text.", "amz-composer-plugins")
                        ),

                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'js_composer' ),
                        'param_name' => 'icon_name',
                        'value' => 'fa fa-camera', // default value to backend editor admin_label
                        'settings' => array(
                            'emptyIcon' => false, // default true, display an "EMPTY" icon?
                            'iconsPerPage' => 100, // default 100, how many icons per/page to display, we use (big prime_slider) to display all icons in single page
                        ),
                        'description' => __( 'Select icon from library.', 'js_composer' ),
                    ),

                    array(
                        "type" => "attach_image",
                        "heading" => __("Video Popup Image", "awed"),
                        "param_name" => "video_popup_bg",
                        "value" => "",
                        "description" => __("Select a image if you want to display image on Video Background.", "awed")
                        ),

                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Video Popup Image Width', 'amz-composer-plugins' ),
                        'param_name' => 'width',
                        'value' => '',
                        'description' => __( 'Enter the width ( Example: 300 ).', 'amz-composer-plugins' ),
                        "edit_field_class" => 'vc_col-xs-6'
                    ),

                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Video Popup Image Height', 'amz-composer-plugins' ),
                        'param_name' => 'height',
                        'value' => '',
                        'description' => __( 'Enter the height ( Example: 70px ).', 'amz-composer-plugins' ),
                        "edit_field_class" => 'vc_col-xs-6'
                    ),

                    array(
                        "type" => "textfield",
                        "heading" => __("Text Font Size", "amz-composer-plugins"),
                        "param_name" => "text_size",
                        "value" => "",
                        "description" => __("Enter the text font size in px(Ex: 50px)", "amz-composer-plugins"),
                        "group"    => __('Custom Style', 'amz-composer-plugins')
                        ),

                    array(
                        "type" => "textfield",
                        "heading" => __("Text Letter Spacing in px", "amz-composer-plugins"),
                        "param_name" => "text_letter_spacing",
                        "value" => "",
                        "description" => __("Enter text letter spacing in pixels.( eg: 50px )", "amz-composer-plugins"),
                        "group"    => __('Custom Style', 'amz-composer-plugins')
                        ),

                    array(
                        "type" => "textfield",
                        "heading" => __("Text Padding", "amz-composer-plugins"),
                        "param_name" => "text_padding",
                        "value" => "",
                        "description" => __("Enter the padding (in css format [top right bottom left]) in px(Ex: 50px 50px 50px 50px)", "amz-composer-plugins"),
                        "group"    => __('Custom Style', 'amz-composer-plugins')
                        ),

                    array(
                        "type" => "colorpicker",
                        "class" => "",
                        "heading" => __("Text Color", "amz-composer-plugins"),
                        "param_name" => "text_color", 
                        "value" => '', 
                        "description" => __("Choose text color", "amz-composer-plugins"),
                        "group"    => __('Custom Style', 'amz-composer-plugins')
                        ),

                    array(
                        "type" => "textfield",
                        "heading" => __("Icon Font Size", "amz-composer-plugins"),
                        "param_name" => "icon_size",
                        "value" => "",
                        "description" => __("Enter the text font size in px(Ex: 50px)", "amz-composer-plugins"),
                        "group"    => __('Custom Style', 'amz-composer-plugins')
                        ),

                    array(
                        "type" => "colorpicker",
                        "class" => "",
                        "heading" => __("Icon Background Color", "amz-composer-plugins"),
                        "param_name" => "icon_bg_color", 
                        "value" => '', 
                        "description" => __("Choose custom background color", "amz-composer-plugins"),
                        "group"    => __('Custom Style', 'amz-composer-plugins')
                        ),

                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Icon Border width', 'amz-composer-plugins' ),
                        'param_name' => 'icon_border_width',
                        'value' => '',
                        'description' => __( 'Enter the border width in (px)  Example: 1px.', 'amz-composer-plugins' ),
                        "group"    => __('Custom Style', 'amz-composer-plugins'),
                        "edit_field_class" => 'vc_col-xs-4'
                        ),

                    array(
                        "type" => "dropdown",
                        "heading" => __("Icon Border Style", "amz-composer-plugins"),
                        "param_name" => "icon_border_style",
                        "value" => array(__('None', "amz-composer-plugins") => "none", 
                                         __('Solid', "amz-composer-plugins") => "solid", 
                                         __('Dotted', "amz-composer-plugins") => "dotted", 
                                         __('Dashed', "amz-composer-plugins") => "dashed", 
                                         __('Double', "amz-composer-plugins") => "double", 
                                         __('Groove', "amz-composer-plugins") => "groove", 
                                         __('Ridge', "amz-composer-plugins") => "ridge", 
                                         __('Inset', "amz-composer-plugins") => "inset", 
                                         __('Outset', "amz-composer-plugins") => "outset"),
                        "description" => __("Select icon border style?", "amz-composer-plugins"),
                        "group"    => __('Custom Style', 'amz-composer-plugins'),
                        "edit_field_class" => 'vc_col-xs-4'
                        ),

                    array(
                        "type" => "colorpicker",
                        "class" => "",
                        "heading" => __("Icon Border Color", "amz-composer-plugins"),
                        "param_name" => "icon_border_color", 
                        "value" => '', 
                        "description" => __("Choose icon border color", "amz-composer-plugins"),
                        "group"    => __('Custom Style', 'amz-composer-plugins'),
                        "edit_field_class" => 'vc_col-xs-4'
                        ),

                    array(
                        "type" => "colorpicker",
                        "class" => "",
                        "heading" => __("Icon Color", "amz-composer-plugins"),
                        "param_name" => "icon_color", 
                        "value" => '', 
                        "description" => __("Choose icon color", "amz-composer-plugins"),
                        "group"    => __('Custom Style', 'amz-composer-plugins')
                        ),

                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Icon Width', 'amz-composer-plugins' ),
                        'param_name' => 'icon_width',
                        'value' => '',
                        'description' => __( 'Enter the width in (px)  Example: 70px.', 'amz-composer-plugins' ),
                        "group"    => __('Custom Style', 'amz-composer-plugins'),
                        "edit_field_class" => 'vc_col-xs-4'
                    ),

                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Icon Height', 'amz-composer-plugins' ),
                        'param_name' => 'icon_height',
                        'value' => '',
                        'description' => __( 'Enter the height in (px)  Example: 70px.', 'amz-composer-plugins' ),
                        "group"    => __('Custom Style', 'amz-composer-plugins'),
                        "edit_field_class" => 'vc_col-xs-4'
                    ),

                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Icon Line Height', 'amz-composer-plugins' ),
                        'param_name' => 'icon_line_height',
                        'value' => '',
                        'description' => __( 'Enter the line-height in (px)  Example: 70px.', 'amz-composer-plugins' ),
                        "group"    => __('Custom Style', 'amz-composer-plugins'),
                        "edit_field_class" => 'vc_col-xs-4'
                        ),

                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Icon Border Radius', 'amz-composer-plugins' ),
                        'param_name' => 'icon_border_radius',
                        'value' => '',
                        'description' => __( 'Enter the border radius in (px)  Example: 70px or 50%.', 'amz-composer-plugins' ),
                        "group"    => __('Custom Style', 'amz-composer-plugins')
                        ),

                    array(
                        "type" => "dropdown",
                        "heading" => __("Alignment", "amz-composer-plugins"),
                        "param_name" => "align",
                        "value" => array(__('Align Center', "amz-composer-plugins") => "center", 
                                         __('Align Left', "amz-composer-plugins") => "left", 
                                         __('Align Right', "amz-composer-plugins") => "right"),
                        "description" => __("Select alignment.", "amz-composer-plugins")
                        ),
                                        
                    array(
                        "type" => "textfield",
                        "heading" => __("Extra class name", "asvc"),
                        "param_name" => "extraclass",
                        "value" => "",
                        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "asvc")
                    ),
                    
                                        
                    
                )
            ) );


                function asvc_video_popup_shortcode( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                            'url'  => '',
                            'text' => esc_html__( 'Title', 'amz-composer-plugins' ),
                            'text_size' => '',
                            'text_letter_spacing' => '',
                            'text_padding' => '',
                            'text_color' => '',
                            'icon_name' => '',
                            'icon_size' => '',
                            'icon_bg_color' => '',
                            'icon_color' => '',
                            'icon_border_width' => '',
                            'icon_border_style' => '',
                            'icon_border_color' => '',
                            'icon_width' => '',
                            'icon_height' => '',
                            'icon_line_height' => '',
                            'icon_border_radius' => '',
                            'align' => 'center',
                            'video_popup_bg' => '',
                            'width' => 300,
                            'height' => 200,
                            'extraclass' => ''
                            ), $atts 
                        ) 
                    );

                wp_register_style( 'woo-font-awesome', plugins_url( '../info-box/css/font-awesome.min.css',  __FILE__) );
                wp_enqueue_style( 'woo-font-awesome' );

                //wp_register_style( 'woo-owl-carousel', plugins_url( 'css/owl.carousel.css',  __FILE__) );
                //wp_enqueue_style( 'woo-owl-carousel' );                

                
                wp_register_script('asvc_magnific_popup_js', plugins_url('js/magnific-popup.js', __FILE__), array('jquery'), '', false);
                wp_enqueue_script( 'asvc_magnific_popup_js' );
                


                wp_register_script('asvc_video_popup_js', plugins_url('js/video-popup.js', __FILE__), array('jquery'), '', false );
                wp_enqueue_script( 'asvc_video_popup_js' ); 

 
                           
        $text_title = $icon = $video_popup_img = $video_popup_class = $custom_text_style = $custom_icon_style = '';
        
        
        
        
        if( !empty( $video_popup_bg ) ) {
                $video_popup_bg = wp_get_attachment_image_src( $video_popup_bg, 'full' );
                $video_popup_class = ' video_center_image';

        }

        if ( !empty($text_size) || !empty($text_letter_spacing) || !empty($text_padding) ) {
            $custom_text_style .= ' style="';
            $custom_text_style .= ( !empty( $text_size ) ) ? ' font-size: '. $text_size .';': '';
            $custom_text_style .= ( !empty( $text_letter_spacing ) ) ? ' letter-spacing: '. $text_letter_spacing .';': '';
            $custom_text_style .= ( !empty( $text_padding ) ) ? ' padding: '. $text_padding .';': '';
            $custom_text_style .= ( !empty( $text_color ) ) ? ' color: '. $text_color .';': '';
            $custom_text_style .= '"';
        }

        if ( !empty($icon_size) || !empty($icon_bg_color) || !empty($icon_color) || !empty($icon_border_width) || !empty($icon_border_style) || !empty($icon_border_color) || !empty($icon_width) || !empty($icon_height) || !empty($icon_line_height) || !empty($icon_border_radius) ) {
            $custom_icon_style .= ' style="';
            $custom_icon_style .= ( !empty( $icon_size ) ) ? ' font-size: '. $icon_size .';': '';
            $custom_icon_style .= ( !empty( $icon_bg_color ) ) ? ' background-color: '. $icon_bg_color .';': '';
            $custom_icon_style .= ( !empty( $icon_color ) ) ? ' color: '. $icon_color .';': '';
            $custom_icon_style .= ( !empty( $icon_border_width ) ) ? ' border-width: '. $icon_border_width .';': '';
            $custom_icon_style .= ( !empty( $icon_border_style ) ) ? ' border-style: '. $icon_border_style .';': '';
            $custom_icon_style .= ( !empty( $icon_border_color ) ) ? ' border-color: '. $icon_border_color .';': '';
            $custom_icon_style .= ( !empty( $icon_width ) ) ? ' width: '. $icon_width .';': '';
            $custom_icon_style .= ( !empty( $icon_height ) ) ? ' height: '. $icon_height .';': '';
            $custom_icon_style .= ( !empty( $icon_line_height ) ) ? ' line-height: '. $icon_line_height .';': '';
            $custom_icon_style .= ( !empty( $icon_border_radius ) ) ? ' border-radius: '. $icon_border_radius .';': '';
            $custom_icon_style .= '"';
        }

        if( !empty( $icon_name ) ){
            $icon = '<span class="icon-popup"'. $custom_icon_style .'><i class="video-popup-icon '. esc_attr( $icon_name ) .'"></i></span>';
        }

        if ( !empty( $text ) ) {
            $text_title = '<span class="text-popup"'. $custom_text_style .'>'. esc_html( $text ) .'</span>';
        }
        
        $output  = '<div class="align-'. esc_attr( $align ) .' popup-icon '. esc_attr( $video_popup_class ) .'"><a href="'. esc_url( $url ) .'" class="video-icon popup-video">'. $video_popup_img .'<div class="video-content"><div class="video-content-inner">'. $icon .''. $text_title .'</div></div></a></div>';


 ?>              
<script>                
jQuery(document).ready(function($) {

    $('.video-icon').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'video_center_image',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: true
    });
    //$("body").css("display", "none");

});
</script>                            
 <?php
                    
                    return $output;
                }

                add_shortcode( 'asvc_video_popup', 'asvc_video_popup_shortcode' );          