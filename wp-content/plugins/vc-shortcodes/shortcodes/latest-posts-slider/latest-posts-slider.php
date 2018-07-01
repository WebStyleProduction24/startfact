<?php

function asvc_dropdown_cats( ) {
    $categories_obj = get_categories('hide_empty=0');
    $categories = array();
    foreach ($categories_obj as $pn_cat){
        $categories[$pn_cat->cat_name] = $pn_cat->category_nicename;
    }  
    $categories=array("All Categories"=>"") + $categories;
    return $categories;
}
        
            
            vc_map( array(
                "name"        => __( "Latest Posts Slider", 'asvc' ),
                "description"   => __( "Show latest posts as news ticker.", 'asvc' ),
                "base"        => "asvc_latest_posts_slider",
                "icon"        => "asvc_latest_posts_icon",
                "category" => __('VC Addons', 'js_composer'),
                "params"      => array(

                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__("Title",'asvc'),
                        "param_name" => "title",
                        "value" => '',
                        "description" => esc_html__("type the title.",'asvc')
                     ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__("Category",'asvc'),
                        "param_name" => "cat",
                        "value" => asvc_dropdown_cats(),
                        "description" => esc_html__("type the item category.",'asvc')
                     ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__("Number of Post",'asvc'),
                        "param_name" => "post_number",
                        "value" => '',
                        "description" => esc_html__("enter how many posts you want to show.",'asvc')
                     ),
                    array(
                        "type" => "dropdown",
                        "holder" => "",
                        "class" => "",
                        "heading" => __("Link Open:", "asvc"),
                        "param_name" => "link_open",
                        "value" => array(
                            "Same Window" => "same",
                            "New Window" => "new",
                        ),
                    ),
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Title color", "asvc" ),
                        "param_name"  => "title_color",
                        "description" => __( "Choose title text color not post color", "asvc" ),
                        "group"       => "Styles"
                    ),
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Title Backgorund color", "asvc" ),
                        "param_name"  => "title_bg_color",
                        "group"       => "Styles"
                    ),
                    array(
                        "type"        => "colorpicker",
                        "class"       => "",
                        "heading"     => __( "Slider border color", "asvc" ),
                        "param_name"  => "border_color",
                        "group"       => "Styles"
                    ),                    
                    array(
                        'type'             => 'prime_slider',
                        'heading'          => __( 'Title Font Size', 'asvc' ),
                        'param_name'       => 'title_f_size',
                        "value" => 18,
                        "min" => 5,
                        "max" => 100,
                        "step" => 1,
                        "unit" => "px",
                        "group" => "Styles"
                    ),                                                                                                                       array(
                        "type" => "textfield",
                        "heading" => esc_html__("Extra class name", "js_composer"),
                        "param_name" => "extraclass",
                        "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
                    )  



                )
            ) );
            
            function asvc_latest_posts_slider_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                    'cat'               => '',
                    'title'             => '',
                    'title_color'       => '',
                    'title_bg_color'    => '',
                    'post_number'       => '5',
                    'link_open'         => 'same',
                    'border_color'      => '',
                    'title_f_size'      => '13',
                    'extraclass'        => '',
                    
                ), $atts ) );

                wp_register_style( 'latest-posts-font-awesome', plugins_url( '../info-box/css/font-awesome.min.css',  __FILE__) );
                wp_enqueue_style( 'latest-posts-font-awesome' );                
                
                wp_register_style( 'latest-posts-css', plugins_url( '/css/latest-posts.css',  __FILE__) );
                wp_enqueue_style( 'latest-posts-css' );
                
                wp_register_script('asvc_slick', plugins_url('/js/slick.min.js', __FILE__), array('jquery'), '', false);
                wp_enqueue_script('asvc_slick'); 
                
                
                wp_register_script('asvc_slick_active', plugins_url('/js/active.js', __FILE__), array('jquery'), '', false);
                wp_enqueue_script('asvc_slick_active'); 
                
                
                
                
                
                global $post;
                $posts = null;
                $args = array(
                    'category_name' => $cat,
                    'showposts'     => $post_number,
                    'ignore_sticky_posts' => 1,
                );     
                
                $q = new WP_Query( $args );
                $recent_posts = wp_get_recent_posts( $args );
                if($q->have_posts()):
                    $output = '<div style="border:1px solid '.$border_color.'" class="break-news '.$extraclass.'">';
                    $output .='<span style="background:'.$title_bg_color.'; color:'.$title_color.'; font-size:'.$title_f_size.'px" class="lbl">'.$title.'</span><div class="break-news-slider">';
                    $post = $posts[0]; $c=0;
                    while($q->have_posts()): $q->the_post();
                                   
                          $output .= '<div>';
                            if ( $link_open == 'same' ) {
                                $output .= '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
                            }
                            if ( $link_open == 'new' ) {
                                $output .= '<a target="_blank" href="'.get_the_permalink().'">'.get_the_title().'</a>';
                            }                            
                        $output .= '</div>';
                       
                    endwhile;
                    $output .= '</div></div>';        
                endif;
                wp_reset_postdata(); 
                 
                return $output;
            }


            add_shortcode( 'asvc_latest_posts_slider', 'asvc_latest_posts_slider_shortcode_function' );