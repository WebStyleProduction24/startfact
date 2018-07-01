<?php
      vc_map(array(
        "name" => __("Carousel & Gallery", 'asvc'),
        "base" => "asvc_carousel",
        "class" => "wpb_cq_vc_extension_carouselgallery",
        "controls" => "full",
        "icon" => "asvc_carousel_icon",
        "category" => __('VC Addons', 'js_composer'),
        'description' => __('with slideshow', 'js_composer'),
        "params" => array(
        
                    array(
                        "type" => "hvc_notice",
                        "class" => "",
                        'heading' => __('<h3 class="hvc_notice" align="center">This is premium addon, please buy the pro version here <a target="_blank" href="https://themebon.com/item/visual-composer-shortcodes-pro/">Essential WPBakery Page Builder (formerly Visual Composer) Addons</a> for only $13</h3>', 'hvc'),
                        "param_name" => "hvc_notice_param_1",
                        "value" => '',
                    ),         
        
              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "asvc",
                "heading" => __("Display the image as", "asvc"),
                "param_name" => "displaystyle",
                "value" => array(__("Carousel (you can choose lightbox below)", "asvc") => "carousel", __("Gallery (large image on the top, small thumbnail on the bottom)", "asvc") => "gallery"),
                "description" => __("You can how to display the images.", "asvc")
              ),
              array(
                "type" => "attach_images",
                "heading" => __("Images:", "asvc"),
                "param_name" => "images",
                "value" => "",
                "description" => __("Select images from media library.", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Display how many thumbnails in the row:", "asvc"),
                "param_name" => "slidestoshow",
                "value" => "5",
                "dependency" => Array('element' => "displaystyle", 'value' => array('carousel')),
                "description" => __("", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Display how many thumbnails in the row:", "asvc"),
                "param_name" => "thumbstoshow",
                "value" => "7",
                "dependency" => Array('element' => "displaystyle", 'value' => array('gallery')),
                "description" => __("", "asvc")
              ),
              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "asvc",
                "heading" => __("Resize the image?", "asvc"),
                "param_name" => "isresize1",
                "value" => array(__("Yes (customize the size below)", "asvc") => "yes", __("No", "asvc") => "no"),
                "std" => "no",
                "dependency" => Array('element' => "displaystyle", 'value' => array('carousel')),
                "description" => __("Note, the resize function may not compatible with some server, it will save resized image to the server.", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Resize image to this width in thumbnail", "asvc"),
                "param_name" => "thumbwidth1",
                "value" => "320",
                "dependency" => Array('element' => "isresize1", 'value' => array('yes')),
                "description" => __("The thumbnail size depends on how many thumbnails will be display in above setting, you can specify the size with larger value to get retina thumbnail.", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Resize image to this height in thumbnail", "asvc"),
                "param_name" => "thumbheight1",
                "value" => "200",
                // "dependency" => Array('element' => "displaystyle", 'value' => array('carousel')),
                "dependency" => Array('element' => "isresize1", 'value' => array('yes')),
                "description" => __("The thumbnail size depends on how many thumbnails will be display in above setting, you can specify the size with larger value to get retina thumbnail.", "asvc")
              ),
              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "asvc",
                "heading" => __("Resize the image?", "asvc"),
                "param_name" => "isresize2",
                "value" => array(__("Yes (customize the size below)", "asvc") => "yes", __("No", "asvc") => "no"),
                "std" => "no",
                "dependency" => Array('element' => "displaystyle", 'value' => array('gallery')),
                "description" => __("Note, the resize function may not compatible with some server, it will save resized image to the server.", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Resize image to this width in thumbnail", "asvc"),
                "param_name" => "thumbwidth2",
                "value" => "120",
                // "dependency" => Array('element' => "displaystyle", 'value' => array('gallery')),
                "dependency" => Array('element' => "isresize2", 'value' => array('yes')),
                "description" => __("The thumbnail size depends on how many thumbnails will be display in above setting, you can specify the size with larger value to get retina thumbnail.", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Resize image to this height in thumbnail", "asvc"),
                "param_name" => "thumbheight2",
                "value" => "80",
                // "dependency" => Array('element' => "displaystyle", 'value' => array('gallery')),
                "dependency" => Array('element' => "isresize2", 'value' => array('yes')),
                "description" => __("The thumbnail size depends on how many thumbnails will be display in above setting, you can specify the size with larger value to get retina thumbnail.", "asvc")
              ),
              array(
                "type" => "exploded_textarea",
                "holder" => "",
                "class" => "asvc",
                "heading" => __("Optional tooltip for each thumbnail", 'asvc'),
                "param_name" => "tooltips",
                "value" => __("", 'asvc'),
                "description" => __("Optional tooltip for each thumbnail, divide with linebreak (Enter). Leave it to be blank if you do not want it.", 'asvc')
              ),
              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "asvc",
                "heading" => __("Thumbnail on click", "asvc"),
                "param_name" => "onclick",
                "value" => array(__("Open lightbox", "asvc") => "lightbox", __("Do nothing", "asvc") => "", __("Open custom link", "asvc") => "customlink"),
                "std" => "lightbox",
                "dependency" => Array('element' => "displaystyle", 'value' => array('carousel')),
                "description" => __("", "asvc")
              ),
              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "asvc",
                "heading" => __("Select lightbox mode", "asvc"),
                "param_name" => "lightboxmode",
                "value" => array(__("prettyPhoto", "asvc") => "prettyphoto", __("none", "asvc") => "none"),
                "std" => "prettyphoto",
                "dependency" => Array('element' => "onclick", 'value' => array('lightbox')),
                "description" => __("", "asvc")
              ),
              array(
                "type" => "exploded_textarea",
                "holder" => "",
                "class" => "asvc",
                "heading" => __("Custom link for each thumbnail", 'asvc'),
                "param_name" => "customlinks",
                "value" => __("", 'asvc'),
                "dependency" => Array('element' => "displaystyle", 'value' => array('carousel')),
                "description" => __("Divide with linebreak (Enter), available with open custom link option.", 'asvc')
              ),
              array(
                "type" => "dropdown",
                "heading" => __("Custom link target", "asvc"),
                "param_name" => "customlinktarget",
                "description" => __('Select how to open custom link.', 'asvc'),
                "dependency" => Array('element' => "displaystyle", 'value' => array('carousel')),
                'value' => array(__("Same window", "asvc") => "_self", __("New window", "asvc") => "_blank")
              ),

              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "asvc",
                "heading" => __("Display dot navigation under thumbnails?", "asvc"),
                "param_name" => "dots",
                "value" => array(__("yes", "asvc") => "yes", __("no", "asvc") => "no"),
                "description" => __("", "asvc")
              ),
              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "asvc",
                "heading" => __("Display arrow navigation for the thumbnails?", "asvc"),
                "param_name" => "arrows",
                "value" => array(__("yes", "asvc") => "yes", __("no", "asvc") => "no"),
                "description" => __("", "asvc")
              ),
              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "asvc",
                "heading" => __("Display arrow navigation for the large image in gallery mode?", "asvc"),
                "param_name" => "largeimagearrows",
                "value" => array(__("yes", "asvc") => "yes", __("no", "asvc") => "no"),
                "dependency" => Array('element' => "displaystyle", 'value' => array('gallery')),
                "description" => __("", "asvc")
              ),
              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "asvc",
                "heading" => __("Auto delay slideshow?", "asvc"),
                "param_name" => "autoplay",
                "value" => array(__("no", "asvc") => "no", __("yes", "asvc") => "yes"),
                "description" => __("", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Autoplay speed in milliseconds", "asvc"),
                "param_name" => "autoplayspeed",
                "value" => "4000",
                "dependency" => Array('element' => "autoplay", 'value' => array('yes')),
                "description" => __("The speed of the auto delay slideshow, default is 4000, which stand for 4 seconds.", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Width of the container:", "asvc"),
                "param_name" => "containerwidth",
                "value" => "",
                "description" => __("The width of the whole container, defautl is 100%. You can specify a smaller value like 80%. It will be align center automatically.", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("max-width of the container:", "asvc"),
                "param_name" => "containermaxwidth",
                "value" => "",
                "description" => __("The max-width of the whole container, defautl is 960px.", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("CSS bottom of the dot navigation", "asvc"),
                "param_name" => "dotbottom",
                "value" => "",
                "description" => __("The CSS bottom value of the dot navigation, default is a value like -48px in VC4.3+, you can specify a different value to control it's position in some themes, otherwise leave it to be blank.", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Extra class name for the container", "asvc"),
                "param_name" => "extra_class",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "asvc")
             )

           )
       ));



      function asvc_carousel_function($atts, $content=null, $tag) {
          extract(shortcode_atts(array(
            'images' => '',
            'displaystyle' => 'carousel',
            'isresize1' => 'no',
            'isresize2' => 'no',
            'thumbwidth1' => '320',
            'thumbheight1' => '200',
            'thumbwidth2' => '80',
            'thumbheight2' => '80',
            'onclick' => 'lightbox',
            'imagewidth' => '',
            'slidestoshow' => '5',
            'thumbstoshow' => '7',
            'dots' => '',
            'arrows' => 'yes',
            'largeimagearrows' => 'yes',
            'customlinks' => '',
            'customlinktarget' => '',
            'autoplay' => '',
            'autoplayspeed' => '4000',
            'containerwidth' => '',
            'containermaxwidth' => '',
            'tooltips' => '',
            'dotbottom' => '',
            'lightboxmode' => 'prettyphoto',
            'extra_class' => ''
          ), $atts));

          $bottom_byversion = '';
          if (version_compare(WPB_VC_VERSION,  "4.3") == -1) {
              $bottom_byversion = "-24px";
          }

          $output ='';
          
          $output .= '<h3>This addon for pro version. Please buy <a href="https://themebon.com/item/visual-composer-shortcodes-pro/">pro version from here</a></h3>';
          return $output;

        }
        
add_shortcode('asvc_carousel', 'asvc_carousel_function');

?>
