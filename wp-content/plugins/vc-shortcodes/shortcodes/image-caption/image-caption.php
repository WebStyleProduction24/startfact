<?php

          vc_map(array(
            "name" => __("Image Caption", 'asvc'),
            "base" => "asvc_image_caption",
            "class" => "",
            "controls" => "full",
            "icon" => "asvc_image_caption_icon",
            "category" => __('VC Addons', 'js_composer'),
            "params" => array(
              array(
                "type" => "attach_images",
                "heading" => __("Thumbnail(s):", "asvc"),
                "param_name" => "images",
                "value" => "",
                "group" => "Thumbnail(s)",
                "description" => __("Select images from media library. You can specify a width for them under the General tab.", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Thumbnail height", "asvc"),
                "param_name" => "minheight",
                "value" => "150",
                "group" => "Thumbnail(s)",
                "description" => __("", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Thumbnail height in small screen device (like iPhone)", "asvc"),
                "param_name" => "smallheight",
                "value" => "100",
                "group" => "Thumbnail(s)",
                "description" => __("The thumbnail maybe too high in small screen view, we need a height for the small screen here to trigger the responsive feature.", "asvc")
              ),
              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "asvc",
                "heading" => __("Thumbnail position:", "asvc"),
                "param_name" => "imageposition",
                "value" => array(__("left", "asvc") => "left", __("right", "asvc") => "right", __("top", "asvc") => "top", __("bottom", "asvc") => "bottom"),
                "group" => "Thumbnail(s)",
                "description" => __("", "asvc")
              ),
              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "asvc",
                "heading" => __("Thumbnail on click", "asvc"),
                "param_name" => "onclick",
                "value" => array(__("Open lightbox", "asvc") => "lightbox", __("Do nothing", "asvc") => "", __("Open custom link", "asvc") => "customlink"),
                "group" => "Thumbnail(s)",
                "description" => __("", "asvc")
              ),
              array(
                "type" => "vc_link",
                "heading" => __("Custom link for the image:", "asvc"),
                "param_name" => "thumbnaillink",
                "dependency" => Array('element' => "onclick", 'value' => array('customlink')),
                "group" => "Thumbnail(s)",
                "description" => __("", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Optional caption title", "asvc"),
                "param_name" => "captiontitle",
                "group" => "Caption",
                "description" => __("", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Title font size", "asvc"),
                "param_name" => "titlesize",
                "group" => "Caption",
                "description" => __("CSS font-size for the title, default is 1.2em.", "asvc")
              ),
              array(
                "type" => "textarea",
                "heading" => __("Optional caption content", "asvc"),
                "param_name" => "caption",
                "group" => "Caption",
                "description" => __("", "asvc")
              ),
              array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => __("Optional font color for the caption:", 'asvc'),
                "param_name" => "captioncolor",
                "value" => '',
                "group" => "Caption",
                "description" => __("", 'asvc')
              ),
              array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => __("Optional background for the caption:", 'asvc'),
                "param_name" => "backgroundcolor",
                "value" => '#efefef',
                "group" => "Caption",
                "description" => __("Default is gray #efefef.", 'asvc')
              ),
              array(
                "type" => "textfield",
                "heading" => __("Optional button under caption", "asvc"),
                "param_name" => "captionbutton",
                "group" => "Caption",
                "description" => __("", "asvc")
              ),
              array(
                'type' => 'vc_link',
                'heading' => __( 'Button link', 'asvc' ),
                'param_name' => 'buttonlink',
                "group" => "Caption",
                'description' => __( 'Link for the button under caption.', 'asvc' )
              ),
              array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => __("Optional background color for the button:", 'asvc'),
                "param_name" => "buttonbg",
                "value" => '',
                "group" => "Caption",
                "description" => __("", 'asvc')
              ),
              array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => __("Optional hover background color for the button:", 'asvc'),
                "param_name" => "buttonhoverbg",
                "value" => '',
                "group" => "Caption",
                "description" => __("", 'asvc')
              ),
              array(
                "type" => "textfield",
                "heading" => __("Auto play speed of the thumbnail carousel.", "asvc"),
                "param_name" => "autoplayspeed",
                "value" => "4000",
                "description" => __("The speed of the auto play slideshow of the thumbnails, default is 4000, stands for 4 seconds.", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Resize the original image to this width for the thumbnail:", "asvc"),
                "param_name" => "imagewidth",
                "value" => "480",
                "description" => __("You can specify a larger value (for example, your container is 320, then 640 width here) to get retina view.", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Extra class name for the container", "asvc"),
                "param_name" => "extra_class",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it is in your css file.", "asvc")
              )

           )
        ));



      function asvc_image_caption_shortcode_function($atts, $content=null, $tag) {
          extract(shortcode_atts(array(
            'images' => '',
            'imageposition' => 'left',
            'captiontitle' => '',
            'caption' => '',
            'captionbutton' => '',
            'buttonlink' => '',
            'minheight' => '150',
            'imagewidth' => '480',
            'buttonbg' => '',
            'buttonhoverbg' => '',
            'thumbnaillink' => '',
            'smallheight' => '100',
            'backgroundcolor' => '#efefef',
            'captioncolor' => '',
            'autoplayspeed' => '4000',
            'onclick' => 'lightbox',
            'titlesize' => '',
            'extra_class' => ''
          ), $atts));


          wp_register_style('slick', plugins_url('/css/slick.css', __FILE__));
          wp_enqueue_style('slick');
          wp_register_style('fs.boxer', plugins_url('/css/jquery.fs.boxer.css', __FILE__));
          wp_enqueue_style('fs.boxer');

          wp_register_script('fs.boxer', plugins_url('/js/jquery.fs.boxer.min.js', __FILE__), array('jquery'));
          wp_enqueue_script('fs.boxer');
          wp_register_script('slick', plugins_url('/js/slick.min.js', __FILE__), array("jquery"));
          wp_enqueue_script('slick');

          wp_register_style('asvc-style', plugins_url('/css/style.css', __FILE__), array('fs.boxer'));
          wp_enqueue_style('asvc-style');

          wp_register_script('asvc-js', plugins_url('/js/init.min.js', __FILE__), array("jquery"));
          wp_enqueue_script('asvc-js');


          $i = -1;
          $content = wpb_js_remove_wpautop($content); // fix unclosed/unwanted paragraph tags in $content

          $imagesarr = explode(',', $images);
          // $image_ratio = 1;
          $buttonlink = vc_build_link($buttonlink);
          $thumbnaillink = vc_build_link($thumbnaillink);
          $container_start = $container_end = '';
          $link_start = $link_end = '';
          $image_content = $caption_content =  '';
          $output = '';
          $container_start .= '<div class="cq-cards-container '.$imageposition.'" data-imageposition="'.$imageposition.'" data-minheight="'.$minheight.'" data-smallheight="'.$smallheight.'" data-backgroundcolor="'.$backgroundcolor.'" data-captioncolor="'.$captioncolor.'" data-autoplayspeed="'.$autoplayspeed.'" data-buttonbg="'.$buttonbg.'" data-buttonhoverbg="'.$buttonhoverbg.'" data-titlesize="'.$titlesize.'">';
          $image_content .= '<div class="card-image-container '.$imageposition.'">';
          $image_content .= '<div class="card-image">';
            foreach ($imagesarr as $key => $image) {
                $return_img_arr = wp_get_attachment_image_src(trim($image), 'full');
                $img = $thumbnail = "";
                $fullimage = $return_img_arr[0];
                $thumbnail = $fullimage;
                if($imagewidth!=""){
                    if(function_exists('wpb_resize')){
                        $img = wpb_resize($image, null, $imagewidth, null, true);
                        $thumbnail = $img['url'];
                        if($thumbnail=="") $thumbnail = $fullimage;
                    }
                }


                $image_content .= '<div>';
                if($onclick=="lightbox"){
                  $image_content .= '<a href="'.$return_img_arr[0].'" class="cq-thumb-lightbox">';
                  $image_content .= '<img src="'.$thumbnail.'" />';
                  $image_content .= '</a>';
                }else if($onclick=="customlink"){
                  $image_content .= '<a href="'.$thumbnaillink['url'].'" title="'.$thumbnaillink['title'].'" target="'.$thumbnaillink['target'].'">';
                  $image_content .= '<img src="'.$thumbnail.'" />';
                  $image_content .= '</a>';
                }else{
                  $image_content .= '<img src="'.$thumbnail.'" />';
                }
                $image_content .= '</div>';
            }

          $image_content .= '</div>';
          $image_content .= '</div>';
          $caption_content .= '<div class="card-caption-container '.$imageposition.'">';
          $caption_content .= '<div class="caption-content">';
          if($captiontitle!="") $caption_content .= '<h3>'.$captiontitle.'</h3>';
          if($caption!="") $caption_content .= '<p class="caption">'.$caption.'</p>';
          if($captionbutton!="") {
            $caption_content .= '<a href="'.$buttonlink['url'].'" title="'.$buttonlink['title'].'" target="'.$buttonlink['target'].'">';
            $caption_content .= '<span class="cq-button">'.$captionbutton.'</span>';
            $caption_content .= '</a>';

          }
          $caption_content .= '</div>';
          $caption_content .= '</div>';
          // $link_end .= '</a>';
          $container_end .= '</div>';
          $output .= $container_start.$link_start;
          if($imageposition=="left" || $imageposition=="top"){
            $output .= $image_content.$caption_content;
          }else if($imageposition=="right" || $imageposition=="bottom"){
            $output .= $caption_content.$image_content;
          }
          $output .= $link_end.$container_end;

          return $output;

        }

        add_shortcode('asvc_image_caption', 'asvc_image_caption_shortcode_function');
