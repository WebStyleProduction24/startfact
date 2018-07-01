<?php

        vc_map(array(
            "name" => __("Video Cover", 'asvc'),
            "base" => "asvc_video_cover",
            "class" => "wpb_cq_vc_extension_videocover",
            "icon" => "videocover_icon",
            "category" => __('VC Addons', 'js_composer'),
            'description' => __('Lightbox video (premium addon)', 'js_composer'),
            "params" => array(
            
            
            array(
                "type" => "hvc_notice",
                "class" => "",
                'heading' => __('<h3 class="hvc_notice" align="center">This is premium addon, please buy the pro version here <a target="_blank" href="https://themebon.com/item/visual-composer-shortcodes-pro/">Visual Composer Addons Pro</a> for only $13</h3>', 'hvc'),
                "param_name" => "hvc_notice_param_1",
                "value" => '',
            ),            
            
              array(
                "type" => "attach_image",
                "heading" => __("Image", "asvc"),
                "param_name" => "videoimage",
                "value" => "",
                "group" => "Image",
                "description" => __("Select image from media library.", "asvc")
              ),
              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "asvc",
                "heading" => __("Image shape", "asvc"),
                "param_name" => "imageshape",
                "value" => array("square" => "square", "rounded (small)" => "roundsmall", "rounded (large)" => "roundlarge", "ellipse (or circle with square image)" => "ellipse"),
                "std" => "square",
                "group" => "Image",
                "description" => __("", "asvc")
              ),
              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "asvc",
                "heading" => __("Resize the image?", "asvc"),
                "param_name" => "resizecoverimage",
                "value" => array("no", "yes (specify the image width below)"=>"yes"),
                "std" => "no",
                "group" => "Image",
                "description" => __("", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Resize image to this width", "asvc"),
                "param_name" => "coverimagewidth",
                "value" => "",
                "dependency" => Array('element' => "resizecoverimage", 'value' => array('yes')),
                "group" => "Image",
                "description" => __("Default we will use the original image, specify a width here. For example, 800 will resize the image to width 800.", "asvc")
              ),
              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "asvc",
                "heading" => __("Icon (or text) button position:", "asvc"),
                "param_name" => "iconposition",
                "value" => array("center" => "center", "top left" => "top-left", "top center"=> "top-center", "top right" => "top-right", "left top" => "left-top", "left center" => "left-center", "left bottom" => "left-bottom", "right top" => "right-top", "right center" => "right-center", "right bottom" => "right-bottom", "bottom left" => "bottom-left", "bottom center" => "bottom-center", "bottom right" => "bottom-right"),
                "std" => "center",
                "group" => "Icon",
                "description" => __("Choose where to display the button. Default is center.", "asvc")
              ),
              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "asvc",
                "heading" => __("Display button with:", "asvc"),
                "param_name" => "overlaytype",
                "value" => array("Icon (select the icon below)" => "icon", "Text (customize the button text below)" => "text"),
                "std" => "icon",
                "group" => "Icon",
                "description" => __("", "asvc")
              ),
              array(
                'type' => 'dropdown',
                'heading' => __( 'Icon library', 'js_composer' ),
                'value' => array(
                  __( 'Font Awesome', 'js_composer' ) => 'fontawesome',
                  __( 'Open Iconic', 'js_composer' ) => 'openiconic',
                  __( 'Typicons', 'js_composer' ) => 'typicons',
                  __( 'Entypo', 'js_composer' ) => 'entypo',
                  __( 'Linecons', 'js_composer' ) => 'linecons',
                ),
                'admin_label' => true,
                'param_name' => 'covericon',
                'dependency' => array('element' => 'overlaytype', 'value' => 'icon',
                ),
                "group" => "Icon",
                'description' => __( 'Select icon library.', 'js_composer' ),
              ),
              array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'js_composer' ),
                'param_name' => 'icon_fontawesome',
                'value' => 'fa fa-youtube-play', // default value to backend editor admin_label
                'settings' => array(
                  'emptyIcon' => false, // default true, display an "EMPTY" icon?
                  'iconsPerPage' => 4000, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                ),
                'dependency' => array(
                  'element' => 'covericon',
                  'value' => 'fontawesome',
                ),
                "group" => "Icon",
                'description' => __( 'Select icon from library.', 'js_composer' ),
              ),
              array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'js_composer' ),
                'param_name' => 'icon_openiconic',
                'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
                'settings' => array(
                  'emptyIcon' => false, // default true, display an "EMPTY" icon?
                  'type' => 'openiconic',
                  'iconsPerPage' => 4000, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                  'element' => 'covericon',
                  'value' => 'openiconic',
                ),
                "group" => "Icon",
                'description' => __( 'Select icon from library.', 'js_composer' ),
              ),
              array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'js_composer' ),
                'param_name' => 'icon_typicons',
                'value' => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
                'settings' => array(
                  'emptyIcon' => false, // default true, display an "EMPTY" icon?
                  'type' => 'typicons',
                  'iconsPerPage' => 4000, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                  'element' => 'covericon',
                  'value' => 'typicons',
                ),
                "group" => "Icon",
                'description' => __( 'Select icon from library.', 'js_composer' ),
              ),
              array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'js_composer' ),
                'param_name' => 'icon_entypo',
                'value' => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
                'settings' => array(
                  'emptyIcon' => false, // default true, display an "EMPTY" icon?
                  'type' => 'entypo',
                  'iconsPerPage' => 4000, // default 100, how many icons per/page to display
                ),
                "group" => "Icon",
                'dependency' => array(
                  'element' => 'covericon',
                  'value' => 'entypo',
                ),
              ),
              array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'js_composer' ),
                'param_name' => 'icon_linecons',
                'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
                'settings' => array(
                  'emptyIcon' => false, // default true, display an "EMPTY" icon?
                  'type' => 'linecons',
                  'iconsPerPage' => 4000, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                  'element' => 'covericon',
                  'value' => 'linecons',
                ),
                "group" => "Icon",
                'description' => __( 'Select icon from library.', 'js_composer' ),
              ),
              array(
                "type" => "textfield",
                "heading" => __("Button text", "asvc"),
                "param_name" => "buttonlabel",
                "value" => "PLAY",
                'dependency' => array('element' => 'overlaytype', 'value' => 'text', ),
                "group" => "Icon",
                "description" => __("", "asvc")
              ),
              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "asvc",
                "heading" => __("Icon (or text) background shape", "asvc"),
                "param_name" => "iconshape",
                "value" => array("circle", "rounded (small)" => "roundsmall", "rounded (large)" => "roundlarge", "square"),
                "std" => "circle",
                "group" => "Icon",
                "description" => __("", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Font size of the button text", "asvc"),
                "edit_field_class" => "vc_col-xs-6 vc_column cqadmin-col-offset",
                "param_name" => "iconsize",
                "value" => "",
                "group" => "Icon",
                "description" => __("The icon default is <strong>2em</strong>, the button text default is <strong>1em</strong>. Specify other value as you like here.", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Size of the whole button", "asvc"),
                "edit_field_class" => "vc_col-xs-6 vc_column cqadmin-col-offset",
                "param_name" => "iconbgsize",
                "value" => "",
                "group" => "Icon",
                "description" => __("The icon default is <strong>64</strong> (in pixel). Specify other value as you like here, like <strong>80</strong>.", "asvc")
              ),
              array(
                "type" => "colorpicker",
                "edit_field_class" => "vc_col-xs-6 vc_column cqadmin-col-offset",
                "holder" => "div",
                "class" => "",
                "heading" => __("Icon (or text) color", 'asvc'),
                "param_name" => "iconcolor",
                "value" => '',
                "group" => "Icon",
                "description" => __("Default is white.", 'asvc')
              ),
              array(
                "type" => "colorpicker",
                "edit_field_class" => "vc_col-xs-6 vc_column cqadmin-col-offset",
                "holder" => "div",
                "class" => "",
                "heading" => __("Icon (or text) background color", 'asvc'),
                "param_name" => "iconbgcolor",
                "value" => '',
                "group" => "Icon",
                "description" => __("Default is transparent black.", 'asvc')
              ),
              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "asvc",
                "heading" => __("Clicking the image, open as", "asvc"),
                "param_name" => "linktype",
                "value" => array("lightbox (video, Youtube or Vimeo)" => "video", /* , "lightbox (image)" => "image", */ "link"),
                "std" => "video",
                'group' => 'Link',
                "description" => __("", "asvc")
              ),
              array(
                'type' => 'vc_link',
                'heading' => __( 'URL (Optional link for the header)', 'asvc' ),
                'dependency' => array('element' => 'linktype', 'value' => 'link',
                ),
                'param_name' => 'normallink',
                'group' => 'Link',
                'description' => __( '', 'asvc' )
              ),
              array(
                "type" => "textfield",
                "heading" => __("Video link", "asvc"),
                "param_name" => "videolink",
                "value" => "",
                'dependency' => array('element' => 'linktype', 'value' => 'video', ),
                'group' => 'Link',
                "description" => __("Just copy and paste the page URL of the <strong>YouTube</strong> or <strong>Vimeo</strong> video, something like <strong>https://www.youtube.com/watch?v=pNSKQ9Qp36M&autoplay=1</strong> or <strong>https://vimeo.com/127081676?autoplay=1</strong>. Add the <strong>autoplay=1</strong> in the URL to auto play the video.", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Video width", "asvc"),
                "param_name" => "videowidth",
                "value" => "",
                'dependency' => array('element' => 'linktype', 'value' => 'video', ),
                'group' => 'Link',
                "description" => __("The width of lightbox video. Default is <strong>800</strong>. You can specify other value here.", "asvc")
              ),
              array(
                "type" => "textarea",
                "heading" => __("Optional caption under the video in the lightbox", "asvc"),
                "param_name" => "videocaption",
                "value" => "",
                'dependency' => array('element' => 'linktype', 'value' => 'video', ),
                'group' => 'Link',
                "description" => __("", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Display the lightbox in this gallery:", "asvc"),
                "param_name" => "gallery",
                "value" => "",
                'group' => 'Link',
                'dependency' => array('element' => 'linktype', 'value' => 'video', ),
                "description" => __("If you wish to open the video lightbox as a gallery, you can specify a unique gallery string for each one here. For example, <strong>video_gallery_1</strong>.", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Tooltip (optional)", "asvc"),
                "param_name" => "imagetooltip",
                "value" => "",
                "description" => __("", "asvc")
              ),
              array(
                "type" => "textfield",
                "heading" => __("Extra class name", "asvc"),
                "param_name" => "extraclass",
                "value" => "",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "asvc")
              )

           )
        ));

      function asvc_videocover_func($atts, $content=null, $tag) {
          $covericon = $icon_fontawesome = $icon_openiconic = $icon_typicons = $icon_entypo = $icon_linecons = '';
          extract(shortcode_atts(array(
            "icon_fontawesome" => 'fa fa-youtube-play',
            "icon_openiconic" => 'vc-oi vc-oi-dial',
            "icon_typicons" => 'typcn typcn-adjust-brightness',
            "icon_entypo" => 'entypo-icon entypo-icon-note',
            "icon_linecons" => 'vc_li vc_li-heart',
            "videoimage" => '',
            "coverimagewidth" => '',
            "resizecoverimage" => 'no',
            "covericon" => 'fontawesome',
            "imageshape" => 'square',
            "iconshape" => 'circle',
            "iconsize" => '',
            "iconbgsize" => '',
            "iconcolor" => '',
            "iconbgcolor" => '',
            "iconposition" => 'center',
            "videolink" => '',
            "videocaption" => '',
            "overlaytype" => 'icon',
            "buttonlabel" => '',
            "linktype" => 'video',
            "normallink" => '',
            "headerheight" => '',
            "gallery" => '',
            "videowidth" => '',
            "imagetooltip" => '',
            "extraclass" => ""
          ), $atts));


          if(version_compare(WPB_VC_VERSION,  "4.4")>= 0){
            vc_icon_element_fonts_enqueue($covericon);
          }else{
            // wp_register_style( 'font-awesome', plugins_url('../faanimation/css/font-awesome.min.css', __FILE__) );
            // wp_enqueue_style( 'font-awesome' );
          }


          $output ='<h3>This addon for pro version. Please buy <a href="https://themebon.com/item/visual-composer-shortcodes-pro/">pro version from here</a></h3>';


          return $output;

        }
        add_shortcode( 'asvc_video_cover', 'asvc_videocover_func' );