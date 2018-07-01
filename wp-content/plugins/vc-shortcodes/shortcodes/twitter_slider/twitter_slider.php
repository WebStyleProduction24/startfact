<?php

		
		vc_map( 
			array(
				"name"			=> __( "Twitter Slider", "asvc" ),
				"description"   => __( "Show your twitter feeds in Slider.", 'asvc' ),
				"base"			=> "asvc_twitter_slider",
                "icon"          => "asvc_twitter_slider_icon",
				"category"	    => __( "VC Addons", "asvc" ),
				"params"		=> array(

					array(
						"type"			=> 'dropdown',
						"heading"		=> __( "CSS Animation", "asvc" ),
						"param_name"	=> "css_animation",
						"value"			=> array(
							__( "No", "asvc" )					=> '',
							__( "Top to bottom", "asvc" )			=> "top-to-bottom",
							__( "Bottom to top", "asvc" )			=> "bottom-to-top",
							__( "Left to right", "asvc" )			=> "left-to-right",
							__( "Right to left", "asvc" )			=> "right-to-left",
							__( "Appear from center", "asvc" )	=> "appear" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> __( "Consumer Key", "asvc" ),
						"param_name"	=> "consumer_key",
						"value" 		=> "",
					),
					array(
						"type"			=> "textfield",
						"heading"		=> __( "Consumer Secret", "asvc" ),
						"param_name"	=> "consumer_secret",
						"value" 		=> "",
					),
					array(
						"type"			=> "textfield",
						"heading"		=> __( "Access Token", "asvc" ),
						"param_name"	=> "access_token",
						"value" 		=> "",
					),
					array(
						"type"			=> "textfield",
						"heading"		=> __( "Access Token Secret", "asvc" ),
						"param_name"	=> "access_token_secret",
						"value" 		=> "",
					),
					array(
						"type"			=> "textfield",
						"heading"		=> __( "Twitter Screen Name", "asvc" ),
						"param_name"	=> "screen_name",
						"value" 		=> "",
					),
					array(
						"type"			=> "textfield",
						"heading"		=> __( "Number of Tweets", "asvc" ),
						'admin_label'	=> true,
						"param_name"	=> "twitter_count",
						"value" 		=> "",
					),
					// Slider
					array(
						'type'			=> 'dropdown',
						'heading'		=> __( "Auto Play", 'asvc' ),
						'param_name'	=> "auto_play",
						'admin_label'	=> true,
						'value'			=> array(
							__( 'True', 'asvc' )	=> 'true',
							__( 'False', 'asvc' )	=> 'false',
						),
						"group"			=> __( "Slider", "asvc" ),
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> __( 'Timeout Duration (in milliseconds)', 'asvc' ),
						'param_name'	=> "timeout_duration",
						'value'			=> "5000",
						'dependency'	=> array(
							'element'	=> "auto_play",
							'value'		=> 'true'
						),
						"group"			=> __( "Slider", "asvc" ),
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> __( "Infinite Loop", 'asvc' ),
						'param_name'	=> "infinite_loop",
						'value'			=> array(
							__( 'False', 'asvc' )	=> 'false',
							__( 'True', 'asvc' )	=> 'true',
						),
						"group"			=> __( "Slider", "asvc" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> __( "Navigation", "asvc" ),
						"param_name"	=> "navigation",
						'admin_label'	=> true,
						"value"			=> array(
							__( "Yes", "asvc" )	=> "true",
							__( "No", "asvc" )	=> "false" ),
						"group"			=> __( "Slider", "asvc" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> __( "Pagination", "asvc" ),
						"param_name"	=> "pagination",
						'admin_label'	=> true,
						"value"			=> array(
							__( "Yes", "asvc" )	=> "true",
							__( "No", "asvc" )	=> "false" ),
						"group"			=> __( "Slider", "asvc" ),
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


            function asvc_twitter_slider_shortcode( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                
                        'extraclass'				=> '',
                        'css_animation'				=> '',
                        'consumer_key' 				=> '',
                        'consumer_secret' 			=> '',
                        'access_token'				=> '',
                        'access_token_secret' 		=> '',
                        'screen_name' 				=> '',					
                        'twitter_count' 			=> '6',
                        'auto_play'					=> 'true',
                        'timeout_duration'			=> '5000',
                        'infinite_loop' 			=> 'false',
                        'navigation' 				=> 'true',
                        'pagination' 				=> 'true',
                            
                ), $atts ) );
                    
                    
                wp_register_style('asvc_twitter_slider_css', plugins_url( 'css/twitter_slider.css' , __FILE__ ) );
                
                wp_register_script('owl_carousel', plugins_url('js/jquery.carousel.min.js', __FILE__), array('jquery'), '', false);
                wp_register_script('carousel-custom', plugins_url('js/jquery.carousel-custom.js', __FILE__), array('jquery'), '', false );

                wp_enqueue_style( 'asvc_twitter_slider_css' );
                wp_enqueue_script( 'owl_carousel' );
                wp_enqueue_script( 'carousel-custom' );                   
                    
                    

                $output = '';
                static $twitter_id = 1;
                
                // Slider Configuration
                $data_attr = '';
                
                $data_attr .= ' data-items="1" ';
                $data_attr .= ' data-slideby="1" ';
                $data_attr .= ' data-items-tablet="1" ';
                $data_attr .= ' data-items-mobile-landscape="1" ';
                $data_attr .= ' data-items-mobile-portrait="1" ';
                
                if( isset( $auto_play ) && $auto_play != '' ) {
                    $data_attr .= ' data-autoplay="' . $auto_play . '" ';
                }
                if( isset( $timeout_duration ) && $timeout_duration != '' ) {
                    $data_attr .= ' data-autoplay-timeout="' . $timeout_duration . '" ';
                }
                if( isset( $infinite_loop ) && $infinite_loop != '' ) {
                    $data_attr .= ' data-loop="' . $infinite_loop . '" ';
                }
                if( isset( $pagination ) && $pagination != '' ) {
                    $data_attr .= ' data-pagination="' . $pagination . '" ';
                }
                if( isset( $navigation ) && $navigation != '' ) {
                    $data_attr .= ' data-navigation="' . $navigation . '" ';
                }
                
                
                if( $screen_name && $consumer_key && $consumer_secret && $access_token && $access_token_secret && $twitter_count ) {
                
                    require_once('/twitter-class/TweetPHP.php');
                    
                    $TweetPHP = new TweetPHP(array(
                        'consumer_key'          => $consumer_key,
                        'consumer_secret'       => $consumer_secret,
                        'access_token'          => $access_token,
                        'access_token_secret'   => $access_token_secret,
                        'twitter_screen_name'   => $screen_name,
                        'enable_cache'          => true,
                        'cachetime'             => 60, // Seconds to cache feed
                        'tweets_to_retrieve'    => 20, // How many tweets to fetch
                        'tweets_to_display'     => $twitter_count, // Number of tweets to display
                        'ignore_replies'        => true, // Ignore @replies
                        'ignore_retweets'       => true, // Ignore retweets
                        'twitter_style_dates'   => true, // Use twitter style dates e.g. 2 hours ago
                        'twitter_date_text'     => array('seconds', 'minutes', 'about', 'hour', 'ago'),
                        'date_format'           => '%I:%M %p %b %d%O', // The defult date format e.g. 12:08 PM Jun 12th. See: http://php.net/manual/en/function.strftime.php
                        'date_lang'             => get_locale(), // Language for date e.g. 'fr_FR'. See: http://php.net/manual/en/function.setlocale.php
                        'twitter_template'      => '{tweets}',
                        'tweet_template'        => '<div class="tweet-list"><span class="status">{tweet}</span> <span class="meta"><a href="{link}">{date}</a></span></div>',
                        'error_template'        => '<div class="tweet-error"><span class="status">Our twitter feed is unavailable right now.</span> <span class="meta"><a href="{link}">Follow us on Twitter</a></span></div>',
                        'debug'                 => false
                    ));
                    
                    $tweets_list = $TweetPHP->get_tweet_list();
                    
                    if( $tweets_list != '' ) {
                        $output = '<div class="asvc-twitter-slider-wrapper '.$extraclass.'">';
                        $output .= '<div id="asvc-twitter-slider'.$twitter_id.'" class="asvc-owl-carousel owl-carousel twitter-carousel-slider"'.$data_attr.'>';
                            $output .= $tweets_list;
                        $output .= '</div>';
                        $output .= '</div>';
                    }
                } else {
                    $output .= '<p>' . __('Please configure twitter options to get it work.', 'asvc') . '</p>';
                }
                
                $twitter_id++;
                
                return $output;
            }

            add_shortcode( 'asvc_twitter_slider', 'asvc_twitter_slider_shortcode' );