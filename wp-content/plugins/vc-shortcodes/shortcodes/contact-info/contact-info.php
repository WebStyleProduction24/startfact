<?php

            vc_map( array(
                "name"        => __( "Contact Info", 'asvc' ),
                "base"        => "asvc_contact_info",
                "icon"        => "asvc_contact_info_icon",
                "category" => __('VC Addons', 'js_composer'),
                "params"      => array(
                    
                    array(
                        "type" => "textfield",
                        "heading" => __("Title", "asvc"),
                        "param_name" => "title",
                        "value" => ""
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => __("Phone", "asvc"),
                        "param_name" => "phone",
                        "value" => ""
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => __("Fax", "asvc"),
                        "param_name" => "fax",
                        "value" => ""
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => __("Email", "asvc"),
                        "param_name" => "email",
                        "value" => ""
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => __("Address", "asvc"),
                        "param_name" => "address",
                        "value" => ""
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => __("Person", "asvc"),
                        "param_name" => "person",
                        "value" => ""
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => __("Company", "asvc"),
                        "param_name" => "company",
                        "value" => ""
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => __("Skype Username", "asvc"),
                        "param_name" => "skype",
                        "value" => ""
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => __("Website", "asvc"),
                        "param_name" => "website",
                        "value" => ""
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => __("Extra class name", "asvc"),
                        "param_name" => "extraclass",
                        "value" => "",
                        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "asvc")
                    ),
                    
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Icon Color", "asvc" ),
                        "param_name"  => "icon_color",
                        "value"  => "#777777",
                        "group" => "Styles"
                    ),                    


                )
            ) );
            
            function asvc_contact_info_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                
                    'title'     => '',
                    'phone'     => '',
                    'fax'         => '',
                    'email'     => '',
                    'address'     => '',
                    'website'     => '',
                    'company'     => '',
                    'person'     => '',
                    'skype'        => '',
                    'icon_color' => '#777777',
                    'extraclass' => '',
                    
                ), $atts ) );
                
                wp_register_style( 'contact_info-font-awesome', plugins_url( '../info-box/css/font-awesome.min.css',  __FILE__) );
                wp_enqueue_style( 'contact_info-font-awesome' );                
                
                wp_register_style( 'contact_info-css', plugins_url( '/css/contact-info.css',  __FILE__) );
                wp_enqueue_style( 'contact_info-css' );  
                
                
                $output ='';
      
                            
                $output .='<ul class="contact_info '.$extraclass.'">';
                
                
            if(!empty( $person)) {
                $output .='<li><i class="fa fa-user"></i><span>'.$person.'</span></li>';
            }
            if(!empty( $company)) {
                $output .='<li><i class="fa fa-building-o"></i><span>'.$company.'</span></li>';
            }         
            if(!empty( $address)) {
                $output .='<li><i class="fa fa-home"></i><span>'.$address.'</span></li>';
            }
            if(!empty( $phone)) {
                $output .='<li><i class="fa fa-phone"></i><span>'.$phone.'</span></li>';
            }
            if(!empty( $fax)) {
                $output .='<li><i class="fa fa-print"></i><span>'.$fax.'</li></span>';
            }
            if(!empty( $email)) {
                $output .='<li><i class="fa fa-envelope"></i><span><a href="mailto:'.$email.'">'.$email.'</a></span></li>';
            }
            if(!empty( $website)) {
                $output .='<li><i class="fa fa-globe"></i><span><a href="'.$website.'" >'.$website.'</a></span></li>';
            }
            if(!empty( $skype)) {
                $output .='<li><i class="fa fa-skype"></i><span><a href="skype:'.$skype.'?call">'.$skype.'</a></span></li>';
            }        


            $output .='</ul>'; 
            
            $output .='<style>.contact_info i {
                            color: '.$icon_color.';
                        }</style>';


            return $output;
            
            }


            add_shortcode( 'asvc_contact_info', 'asvc_contact_info_shortcode_function' );