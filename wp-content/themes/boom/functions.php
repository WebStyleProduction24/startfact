<?php

//$qode_startit_toolbar = true;

include_once get_template_directory().'/theme-includes.php';

if(!function_exists('qode_startit_styles')) {
    /**
     * Function that includes theme's core styles
     */
    function qode_startit_styles() {

        global $qode_startit_toolbar;

        wp_register_style('qode_startit_blog', QODE_ASSETS_ROOT.'/css/blog.min.css');

        //include theme's core styles
        wp_enqueue_style('qode_startit_default_style', QODE_ROOT.'/style.css');
        wp_enqueue_style('qode_startit_modules_plugins', QODE_ASSETS_ROOT.'/css/plugins.min.css');
        wp_enqueue_style('qode_startit_modules', QODE_ASSETS_ROOT.'/css/modules.min.css');

        qode_startit_icon_collections()->enqueueStyles();

        if(qode_startit_load_blog_assets()) {
            wp_enqueue_style('qode_startit_blog');
        }

        if(qode_startit_load_blog_assets() || is_singular('portfolio-item')) {
            wp_enqueue_style('wp-mediaelement');
        }

        //define files afer which style dynamic needs to be included. It should be included last so it can override other files
        $style_dynamic_deps_array = array();
        if(qode_startit_load_woo_assets()) {
            $style_dynamic_deps_array[] = 'qode_startit_woocommerce';
        }


        //is responsive option turned on?
        if(qode_startit_is_responsive_on()) {
            wp_enqueue_style('qode_startit_modules_responsive', QODE_ASSETS_ROOT.'/css/modules-responsive.min.css');
            wp_enqueue_style('qode_startit_blog_responsive', QODE_ASSETS_ROOT.'/css/blog-responsive.min.css');
            if(qode_startit_load_woo_assets()) {
                $style_dynamic_deps_array[] = 'qode_startit_woocommerce_responsive';
            }

            //include proper styles
            if(file_exists(QODE_ROOT_DIR.'/assets/css/style_dynamic_responsive.css') && qode_startit_is_css_folder_writable() && !is_multisite()) {
                wp_enqueue_style('qode_startit_style_dynamic_responsive', QODE_ASSETS_ROOT.'/css/style_dynamic_responsive.css', array(), filemtime(QODE_ROOT_DIR.'/assets/css/style_dynamic_responsive.css'));
            } else {
                wp_enqueue_style('qode_startit_style_dynamic_responsive', QODE_ASSETS_ROOT.'/css/style_dynamic_responsive.php');
            }
        }

         if(file_exists(QODE_ROOT_DIR.'/assets/css/style_dynamic.css') && qode_startit_is_css_folder_writable() && !is_multisite()) {
            wp_enqueue_style('qode_startit_style_dynamic', QODE_ASSETS_ROOT.'/css/style_dynamic.css', $style_dynamic_deps_array, filemtime(QODE_ROOT_DIR.'/assets/css/style_dynamic.css')); //it must be included after woocommerce styles so it can override it
        } else {
            wp_enqueue_style('qode_startit_style_dynamic', QODE_ASSETS_ROOT.'/css/style_dynamic.php', $style_dynamic_deps_array); //it must be included after woocommerce styles so it can override it
        }

        //is toolbar turned on?
        if (isset($qode_startit_toolbar)) {
            //include toolbar specific styles
            wp_enqueue_style("qode_startit_toolbar", get_home_url() . "/toolbar/toolbar.css");

        }

        //include Visual Composer styles
        if(class_exists('WPBakeryVisualComposerAbstract')) {
            wp_enqueue_style('js_composer_front');
        }
    }

    add_action('wp_enqueue_scripts', 'qode_startit_styles');
}

if(!function_exists('qode_startit_google_fonts_styles')) {
    /**
     * Function that includes google fonts defined anywhere in the theme
     */
    function qode_startit_google_fonts_styles() {
        $font_simple_field_array = qode_startit_options()->getOptionsByType('fontsimple');
        if(!(is_array($font_simple_field_array) && count($font_simple_field_array) > 0)) {
            $font_simple_field_array = array();
        }

        $font_field_array = qode_startit_options()->getOptionsByType('font');
        if(!(is_array($font_field_array) && count($font_field_array) > 0)) {
            $font_field_array = array();
        }

        $available_font_options = array_merge($font_simple_field_array, $font_field_array);
        $font_weight_str        = '100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic';

        //define available font options array
        $fonts_array = array();
        foreach($available_font_options as $font_option) {
            //is font set and not set to default and not empty?
            $font_option_value = qode_startit_options()->getOptionValue($font_option);
            if(qode_startit_is_font_option_valid($font_option_value) && !qode_startit_is_native_font($font_option_value)) {
                $font_option_string = $font_option_value.':'.$font_weight_str;
                if(!in_array($font_option_string, $fonts_array)) {
                    $fonts_array[] = $font_option_string;
                }
            }
        }

        wp_reset_postdata();

        $fonts_array         = array_diff($fonts_array, array('-1:'.$font_weight_str));
        $google_fonts_string = implode('|', $fonts_array);

        //default fonts should be separated with %7C because of HTML validation
        $default_font_string = 'Raleway:'.$font_weight_str;

        //is google font option checked anywhere in theme?
        if (count($fonts_array) > 0) {

            //include all checked fonts
            $fonts_full_list = $default_font_string . '|' . str_replace('+', ' ', $google_fonts_string);
            $fonts_full_list_args = array(
                'family' => urlencode($fonts_full_list),
                'subset' => urlencode('latin,latin-ext'),
            );

            $qode_startit_fonts = add_query_arg( $fonts_full_list_args, 'https://fonts.googleapis.com/css' );
            wp_enqueue_style( 'qode_startit_google_fonts', esc_url_raw($qode_startit_fonts), array(), '1.0.0' );

        } else {
            //include default google font that theme is using
            $default_fonts_args = array(
                'family' => urlencode($default_font_string),
                'subset' => urlencode('latin,latin-ext'),
            );
            $qode_startit_fonts = add_query_arg( $default_fonts_args, 'https://fonts.googleapis.com/css' );
            wp_enqueue_style( 'qode_startit_google_fonts', esc_url_raw($qode_startit_fonts), array(), '1.0.0' );
        }

    }

    add_action('wp_enqueue_scripts', 'qode_startit_google_fonts_styles');
}

/*Because of the bug when Revolution slider, Layer Slider and Smooth Scroll are enabled together (greensock.js doesn't have included ScrollTo so it need to be included before)*/

if(!function_exists('qode_startit_scrollto_script')) {

    function qode_startit_scrollto_script(){
        wp_enqueue_script('scrollto', QODE_ASSETS_ROOT . '/js/scrolltoplugin.min.js', array("jquery"), false, false);
    }

    add_action('wp_enqueue_scripts', 'qode_startit_scrollto_script', 1);

}

if(!function_exists('qode_startit_scripts')) {
    /**
     * Function that includes all necessary scripts
     */
    function qode_startit_scripts() {
        global $wp_scripts;
        global $qode_startit_toolbar;

        //init theme core scripts
        wp_enqueue_script( 'jquery-ui-core');
        wp_enqueue_script( 'jquery-ui-tabs');
        wp_enqueue_script( 'jquery-ui-accordion');
        wp_enqueue_script( 'wp-mediaelement');
        wp_enqueue_script( 'jquery-ui-slider');



        wp_enqueue_script('qode_startit_third_party', QODE_ASSETS_ROOT.'/js/third-party.min.js', array('jquery'), false, true);
        wp_enqueue_script('isotope', QODE_ASSETS_ROOT.'/js/jquery.isotope.min.js', array('jquery'), false, true);



        if(qode_startit_is_smoth_scroll_enabled()) {
            wp_enqueue_script("qode_startit_smooth_page_scroll", QODE_ASSETS_ROOT . "/js/smoothPageScroll.js", array(), false, true);
        }

        //include google map api script
        if(qode_startit_options()->getOptionValue('google_maps_api_key') != '') {
            $google_maps_api_key = qode_startit_options()->getOptionValue('google_maps_api_key');
            wp_enqueue_script('google_map_api', '//maps.googleapis.com/maps/api/js?key=' . $google_maps_api_key, array(), false, true);
        } else {
            wp_enqueue_script('google_map_api', '//maps.googleapis.com/maps/api/js', array(), false, true);
        }

        //wp_enqueue_script('qode_default', QODE_ASSETS_ROOT.'/js/default.js', array(), false, true);
        wp_enqueue_script('qode_startit_modules', QODE_ASSETS_ROOT.'/js/modules.min.js', array('jquery'), false, true);

        if(qode_startit_load_blog_assets()) {
            wp_enqueue_script('qode_startit_blog', QODE_ASSETS_ROOT.'/js/blog.min.js', array('jquery'), false, true);
        }

        //include comment reply script
        $wp_scripts->add_data('comment-reply', 'group', 1);
        if(is_singular()) {
            wp_enqueue_script("comment-reply");
        }

        //include Visual Composer script
        if(class_exists('WPBakeryVisualComposerAbstract')) {
            wp_enqueue_script('wpb_composer_front_js');
        }

        if(isset($qode_startit_toolbar)){
            wp_enqueue_script("$qode_startit_toolbar", get_home_url() . "/toolbar/toolbar.js",array("jquery"),false,true);
        }
    }

    add_action('wp_enqueue_scripts', 'qode_startit_scripts');
}


//defined content width variable
if (!isset( $content_width )) $content_width = 1100;

if(!function_exists('qode_startit_theme_setup')) {
    /**
     * Function that adds various features to theme. Also defines image sizes that are used in a theme
     */
    function qode_startit_theme_setup() {
        //add support for feed links
        add_theme_support('automatic-feed-links');

        //add support for post formats
        add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));

        //add theme support for post thumbnails
        add_theme_support('post-thumbnails');

        //add theme support for title tag
        if(function_exists('_wp_render_title_tag')) {
            add_theme_support('title-tag');
        }

        //define thumbnail sizes
        add_image_size('qode_startit_square', 550, 550, true);
        add_image_size('qode_startit_landscape', 800, 600, true);
        add_image_size('qode_startit_portrait', 600, 800, true);
        add_image_size('qode_startit_large_width', 1000, 500, true);
        add_image_size('qode_startit_large_height', 500, 1000, true);
        add_image_size('qode_startit_large_width_height', 1000, 1000, true);

        add_filter('widget_text', 'do_shortcode');

        load_theme_textdomain( 'startit', get_template_directory().'/languages' );
    }

    add_action('after_setup_theme', 'qode_startit_theme_setup');
}


if(!function_exists('qode_startit_rgba_color')) {
    /**
     * Function that generates rgba part of css color property
     *
     * @param $color string hex color
     * @param $transparency float transparency value between 0 and 1
     *
     * @return string generated rgba string
     */
    function qode_startit_rgba_color($color, $transparency) {
        if($color !== '' && $transparency !== '') {
            $rgba_color = '';

            $rgb_color_array = qode_startit_hex2rgb($color);
            $rgba_color .= 'rgba('.implode(', ', $rgb_color_array).', '.$transparency.')';

            return $rgba_color;
        }
    }
}

if(!function_exists('qode_startit_wp_title_text')) {
    /**
     * Function that sets page's title. Hooks to wp_title filter
     *
     * @param $title string current page title
     * @param $sep string title separator
     *
     * @return string changed title text if SEO plugins aren't installed
     */
    function qode_startit_wp_title_text($title, $sep) {

        //is SEO plugin installed?
        if(qode_startit_seo_plugin_installed()) {
            //don't do anything, seo plugin will take care of it
        } else {
            //get current post id
            $id           = qode_startit_get_page_id();
            $sep          = ' | ';
            $title_prefix = get_bloginfo('name');
            $title_suffix = '';

            //is WooCommerce installed and is current page shop page?
            if(qode_startit_is_woocommerce_installed() && qode_startit_is_woocommerce_shop()) {
                //get shop page id
                $id = qode_startit_get_woo_shop_page_id();
            }

            //is WP 4.1 at least?
            if(function_exists('_wp_render_title_tag')) {
                //set unchanged title variable so we can use it later
                $title_array     = explode($sep, $title);
                $unchanged_title = array_shift($title_array);
            } //pre 4.1 version of WP
            else {
                //set unchanged title variable so we can use it later
                $unchanged_title = $title;
            }

            //is qode seo enabled?
            if(qode_startit_options()->getOptionValue('disable_seo') !== 'yes') {
                //get current post seo title
                $seo_title = esc_attr(get_post_meta($id, "qodef_meta_title_meta", true));

                //is current post seo title set?
                if($seo_title !== '') {
                    $title_suffix = $seo_title;
                }
            }

            //title suffix is empty, which means that it wasn't set by qode seo
            if(empty($title_suffix)) {
                //if current page is front page append site description, else take original title string
                $title_suffix = is_front_page() ? get_bloginfo('description') : $unchanged_title;
            }

            //concatenate title string
            $title = $title_prefix.$sep.$title_suffix;

            //return generated title string
            return $title;
        }
    }

    add_filter('wp_title', 'qode_startit_wp_title_text', 10, 2);
}

if(!function_exists('qode_startit_wp_title')) {
    /**
     * Function that outputs title tag. It checks if _wp_render_title_tag function exists
     * and if it does'nt it generates output. Compatible with versions of WP prior to 4.1
     */
    function qode_startit_wp_title() {
        if(!function_exists('_wp_render_title_tag')) { ?>
            <title><?php wp_title(''); ?></title>
        <?php }
    }
}

if(!function_exists('qode_startit_header_meta')) {
    /**
     * Function that echoes meta data if our seo is enabled
     */
    function qode_startit_header_meta() {

        if(qode_startit_is_seo_enabled() && !qode_startit_seo_plugin_installed()) {
            $seo_description = qode_startit_get_meta_field_intersect('qodef_meta_description');
            $seo_keywords    = qode_startit_get_meta_field_intersect('qodef_meta_keywords');
            ?>

            <?php if($seo_description) { ?>
                <meta name="description" content="<?php echo esc_html($seo_description); ?>">
            <?php } ?>

            <?php if($seo_keywords) { ?>
                <meta name="keywords" content="<?php echo esc_html($seo_keywords); ?>">
            <?php }
        } ?>

        <meta charset="<?php bloginfo('charset'); ?>"/>
        <link rel="profile" href="http://gmpg.org/xfn/11"/>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php }

    add_action('qode_startit_header_meta', 'qode_startit_header_meta');
}

if(!function_exists('qode_startit_user_scalable_meta')) {
    /**
     * Function that outputs user scalable meta if responsiveness is turned on
     * Hooked to qode_startit_header_meta action
     */
    function qode_startit_user_scalable_meta() {
        //is responsiveness option is chosen?
        if(qode_startit_is_responsive_on()) { ?>
            <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <?php } else { ?>
            <meta name="viewport" content="width=1200,user-scalable=no">
        <?php }
    }

    add_action('qode_startit_header_meta', 'qode_startit_user_scalable_meta');
}

if(!function_exists('qode_startit_ie9_stylesheet_meta')) {
    function qode_startit_ie9_stylesheet_meta() {
        echo '<!--[if IE 9]><link rel="stylesheet" type="text/css" href="' . QODE_ASSETS_ROOT . '/css/ie9_stylesheet.min.css" media="screen"><![endif]-->';
    }

    add_action('wp_head', 'qode_startit_ie9_stylesheet_meta');
}

if(!function_exists('qode_startit_get_page_id')) {
    /**
     * Function that returns current page / post id.
     * Checks if current page is woocommerce page and returns that id if it is.
     * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
     * page that is created in WP admin.
     *
     * @return int
     *
     * @version 0.1
     *
     * @see qode_startit_is_woocommerce_installed()
     * @see qode_startit_is_woocommerce_shop()
     */
    function qode_startit_get_page_id() {
        if(qode_startit_is_woocommerce_installed() && qode_startit_is_woocommerce_shop()) {
            return qode_startit_get_woo_shop_page_id();
        }

        if(is_archive() || is_search() || is_404() || (is_home() && is_front_page())) {
            return -1;
        }

        return get_queried_object_id();
    }
}


if(!function_exists('qode_startit_is_default_wp_template')) {
    /**
     * Function that checks if current page archive page, search, 404 or default home blog page
     * @return bool
     *
     * @see is_archive()
     * @see is_search()
     * @see is_404()
     * @see is_front_page()
     * @see is_home()
     */
    function qode_startit_is_default_wp_template() {
        return is_archive() || is_search() || is_404() || (is_front_page() && is_home());
    }
}

if(!function_exists('qode_startit_get_page_template_name')) {
    /**
     * Returns current template file name without extension
     * @return string name of current template file
     */
    function qode_startit_get_page_template_name() {
        $file_name = '';

        if(!qode_startit_is_default_wp_template()) {
            $file_name_without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename(get_page_template()));

            if($file_name_without_ext !== '') {
                $file_name = $file_name_without_ext;
            }
        }

        return $file_name;
    }
}

if(!function_exists('qode_startit_has_shortcode')) {
    /**
     * Function that checks whether shortcode exists on current page / post
     *
     * @param string shortcode to find
     * @param string content to check. If isn't passed current post content will be used
     *
     * @return bool whether content has shortcode or not
     */
    function qode_startit_has_shortcode($shortcode, $content = '') {
        $has_shortcode = false;

        if($shortcode) {
            //if content variable isn't past
            if($content == '') {
                //take content from current post
                $page_id = qode_startit_get_page_id();
                if(!empty($page_id)) {
                    $current_post = get_post($page_id);

                    if(is_object($current_post) && property_exists($current_post, 'post_content')) {
                        $content = $current_post->post_content;
                    }
                }
            }

            //does content has shortcode added?
            if(stripos($content, '['.$shortcode) !== false) {
                $has_shortcode = true;
            }
        }

        return $has_shortcode;
    }
}

if(!function_exists('qode_startit_rewrite_rules_on_theme_activation')) {
    /**
     * Function that flushes rewrite rules on deactivation
     */
    function qode_startit_rewrite_rules_on_theme_activation() {
        flush_rewrite_rules();
    }

    add_action('after_switch_theme', 'qode_startit_rewrite_rules_on_theme_activation');
}

if(!function_exists('qode_startit_get_dynamic_sidebar')) {
    /**
     * Return Custom Widget Area content
     *
     * @return string
     */
    function qode_startit_get_dynamic_sidebar($index = 1) {
        ob_start();
        dynamic_sidebar($index);
        $sidebar_contents = ob_get_clean();

        return $sidebar_contents;
    }
}

if(!function_exists('qode_startit_get_sidebar')) {
    /**
     * Return Sidebar
     *
     * @return string
     */
    function qode_startit_get_sidebar() {

        $id = qode_startit_get_page_id();

        $sidebar = "sidebar";

        if (get_post_meta($id, 'qodef_custom_sidebar_meta', true) != '') {
            $sidebar = get_post_meta($id, 'qodef_custom_sidebar_meta', true);
        } else {
            if (is_single() && qode_startit_options()->getOptionValue('blog_single_custom_sidebar') != '') {
                $sidebar = esc_attr(qode_startit_options()->getOptionValue('blog_single_custom_sidebar'));
            }elseif((qode_startit_is_product_category() || qode_startit_is_product_tag()) && qode_startit_get_woo_shop_page_id()) {
                $shop_id = qode_startit_get_woo_shop_page_id();
                if(get_post_meta($shop_id, 'qodef_custom_sidebar_meta', true) != '') {
                    $sidebar = esc_attr(get_post_meta($shop_id, 'qodef_custom_sidebar_meta', true));
                }
            } elseif ((is_archive() || (is_home() && is_front_page())) && qode_startit_options()->getOptionValue('blog_custom_sidebar') != '') {
                $sidebar = esc_attr(qode_startit_options()->getOptionValue('blog_custom_sidebar'));
            } elseif (is_page() && qode_startit_options()->getOptionValue('page_custom_sidebar') != '') {
                $sidebar = esc_attr(qode_startit_options()->getOptionValue('page_custom_sidebar'));
            }
        }

        return $sidebar;
    }
}



if( !function_exists('qode_startit_sidebar_columns_class') ) {

    /**
     * Return classes for columns holder when sidebar is active
     *
     * @return array
     */

    function qode_startit_sidebar_columns_class() {

        $sidebar_class = array();
        $sidebar_layout = qode_startit_sidebar_layout();

        switch($sidebar_layout):
            case 'sidebar-33-right':
                $sidebar_class[] = 'qodef-two-columns-66-33';
                break;
            case 'sidebar-25-right':
                $sidebar_class[] = 'qodef-two-columns-75-25';
                break;
            case 'sidebar-33-left':
                $sidebar_class[] = 'qodef-two-columns-33-66';
                break;
            case 'sidebar-25-left':
                $sidebar_class[] = 'qodef-two-columns-25-75';
                break;

        endswitch;

        $sidebar_class[] = 'qodef-content-has-sidebar  clearfix';

        return qode_startit_class_attribute($sidebar_class);

    }

}


if( !function_exists('qode_startit_sidebar_layout') ) {

    /**
     * Function that check is sidebar is enabled and return type of sidebar layout
     */

    function qode_startit_sidebar_layout() {

        $sidebar_layout = '';
        $page_id = qode_startit_get_page_id();

        $page_sidebar_meta = get_post_meta($page_id, 'qodef_sidebar_meta', true);

        if (($page_sidebar_meta !== '' && get_post_meta(qode_startit_get_page_id(), "qodef_sidebar_meta", true) != 'default') && $page_id !== -1) {
            if ($page_sidebar_meta == 'no-sidebar') {
                $sidebar_layout = '';
            } else {
                $sidebar_layout = $page_sidebar_meta;
            }
        } else {
            if (is_single() && qode_startit_options()->getOptionValue('blog_single_sidebar_layout')) {
                $sidebar_layout = esc_attr(qode_startit_options()->getOptionValue('blog_single_sidebar_layout'));
            } elseif ((qode_startit_is_product_category() || qode_startit_is_product_tag()) && qode_startit_get_woo_shop_page_id()) {
                $shop_id = qode_startit_get_woo_shop_page_id();
                if (get_post_meta($shop_id, 'qodef_sidebar_meta', true) != '') {
                    $sidebar_layout = esc_attr(get_post_meta($shop_id, 'qodef_sidebar_meta', true));
                }
            } elseif ((is_archive() || (is_home() && is_front_page())) && qode_startit_options()->getOptionValue('archive_sidebar_layout')) {
                $sidebar_layout = esc_attr(qode_startit_options()->getOptionValue('archive_sidebar_layout'));
            } elseif (is_page() && qode_startit_options()->getOptionValue('page_sidebar_layout')) {
                $sidebar_layout = esc_attr(qode_startit_options()->getOptionValue('page_sidebar_layout'));
            }
        }

        return $sidebar_layout;
    }

}


if( !function_exists('qode_startit_page_custom_style') ) {

    /**
     * Function that print custom page style
     */

    function qode_startit_page_custom_style() {
        $style = '';
        $html = '';
        $style = apply_filters('qode_startit_add_page_custom_style', $style);
        if($style !== '') {
            $html .= '<style type="text/css">';
            $html .= $style;
            $html .= '</style>';
        }
        print $html;
    }

    add_action('wp_head', 'qode_startit_page_custom_style');
}


if( !function_exists('qode_startit_container_style') ) {

    /**
     * Function that return container style
     */

    function qode_startit_container_style($style) {

        $id = qode_startit_get_page_id();

        $container_selector = array(
            '.page-id-' . $id . ' .qodef-content .qodef-content-inner > .qodef-container',
            '.page-id-' . $id . ' .qodef-content .qodef-content-inner > .qodef-full-width'
        );
        $container_class = array();

        $page_backgorund_color = get_post_meta($id, "qodef_page_background_color_meta", true);

        if($page_backgorund_color){
            $container_class['background-color'] = $page_backgorund_color;
        }

        $current_style = qode_startit_dynamic_css($container_selector, $container_class);

        $current_style = $current_style . $style;

        return $current_style;

    }
    add_filter('qode_startit_add_page_custom_style', 'qode_startit_container_style');
}

if(!function_exists('qode_startit_print_custom_css')) {
    /**
     * Prints out custom css from theme options
     */
    function qode_startit_print_custom_css() {
        $custom_css = qode_startit_options()->getOptionValue('custom_css');
        $output = '';

        if($custom_css !== '') {
            $output .= '<style type="text/css" id="qode_startit-custom-css">';
            $output .= $custom_css;
            $output .= '</style>';
        }

        print $output;
    }

    add_action('wp_head', 'qode_startit_print_custom_css', 1000);
}

if(!function_exists('qode_startit_print_custom_js')) {
    /**
     * Prints out custom css from theme options
     */
    function qode_startit_print_custom_js() {
        $custom_js = qode_startit_options()->getOptionValue('custom_js');
        $output = '';

        if($custom_js !== '') {
            $output .= '<script type="text/javascript" id="qode_startit-custom-js">';
            $output .= '(function($) {';
            $output .= $custom_js;
            $output .= '})(jQuery)';
            $output .= '</script>';
        }

        print $output;
    }

    add_action('wp_footer', 'qode_startit_print_custom_js', 1000);
}


if(!function_exists('qode_startit_get_global_variables')) {
    /**
     * Function that generates global variables and put them in array so they could be used in the theme
     */
    function qode_startit_get_global_variables() {

        $global_variables = array();
        $element_appear_amount = -150;

        $global_variables['qodefAddForAdminBar'] = is_admin_bar_showing() ? 32 : 0;
        $global_variables['qodefElementAppearAmount'] = qode_startit_options()->getOptionValue('element_appear_amount') !== '' ? qode_startit_options()->getOptionValue('element_appear_amount') : $element_appear_amount;
        $global_variables['qodefFinishedMessage'] = esc_html__('No more posts', 'startit');
        $global_variables['qodefMessage'] = esc_html__('Loading new posts...', 'startit');

        $global_variables = apply_filters('qode_startit_js_global_variables', $global_variables);

        wp_localize_script('qode_startit_modules', 'qodefGlobalVars', array(
            'vars' => $global_variables
        ));

    }

    add_action('wp_enqueue_scripts', 'qode_startit_get_global_variables');
}

if(!function_exists('qode_startit_per_page_js_variables')) {
    function qode_startit_per_page_js_variables() {
        $per_page_js_vars = apply_filters('qode_startit_per_page_js_vars', array());

        wp_localize_script('qode_startit_modules', 'qodefPerPageVars', array(
            'vars' => $per_page_js_vars
        ));
    }

    add_action('wp_enqueue_scripts', 'qode_startit_per_page_js_variables');
}

if(!function_exists('qode_startit_content_elem_style_attr')) {
    /**
     * Defines filter for adding custom styles to content HTML element
     */
    function qode_startit_content_elem_style_attr() {
        $styles = apply_filters('qode_startit_content_elem_style_attr', array());

        qode_startit_inline_style($styles);
    }
}

if(!function_exists('qode_startit_is_woocommerce_installed')) {
    /**
     * Function that checks if woocommerce is installed
     * @return bool
     */
    function qode_startit_is_woocommerce_installed() {
        return function_exists('is_woocommerce');
    }
}

if(!function_exists('qode_startit_visual_composer_installed')) {
    /**
     * Function that checks if visual composer installed
     * @return bool
     */
    function qode_startit_visual_composer_installed() {
        //is Visual Composer installed?
        if(class_exists('WPBakeryVisualComposerAbstract')) {
            return true;
        }

        return false;
    }
}

if(!function_exists('qode_startit_seo_plugin_installed')) {
    /**
     * Function that checks if popular seo plugins are installed
     * @return bool
     */
    function qode_startit_seo_plugin_installed() {
        //is 'YOAST' or 'All in One SEO' installed?
        if(defined('WPSEO_VERSION') || class_exists('All_in_One_SEO_Pack')) {
            return true;
        }

        return false;
    }
}

if(!function_exists('qode_startit_contact_form_7_installed')) {
    /**
     * Function that checks if contact form 7 installed
     * @return bool
     */
    function qode_startit_contact_form_7_installed() {
        //is Contact Form 7 installed?
        if(defined('WPCF7_VERSION')) {
            return true;
        }

        return false;
    }
}

if(!function_exists('qode_startit_is_wpml_installed')) {
    /**
     * Function that checks if WPML plugin is installed
     * @return bool
     *
     * @version 0.1
     */
    function qode_startit_is_wpml_installed() {
        return defined('ICL_SITEPRESS_VERSION');
    }
}


if(!function_exists('qode_startit_is_live_search_installed')) {
    /**
     * Function that checks if Dave's WordPress Live Search plugin is installed
     * @return bool
     *
     * @version 0.1
     */
    function qode_startit_is_live_search_installed() {
        return function_exists('daves_wp_live_search_init');
    }
}

if(!function_exists('qode_starit_remove_admin_menu_items')) {
    function qode_starit_remove_admin_menu_items() {
        if (qode_startit_is_live_search_installed()) {
            remove_submenu_page("options-general.php", "daves-wordpress-live-search/class-daves-wordpress-live-search.php");
        }
    }

    add_action('admin_menu', 'qode_starit_remove_admin_menu_items', 999);
}


function my_jquery_scripts() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js');
    wp_enqueue_script( 'jquery' );
}    

add_action( 'wp_enqueue_scripts', 'my_jquery_scripts' );






/**
* Добавляем новый тег select_optgroup
*
* @return void
*/
function wpcf7_add_form_tag_select_group(){
    wpcf7_add_form_tag( array('select_optgroup','select_optgroup*'), 'wpcf7_select_optgroup_form_tag_handler', true );
}
add_action( 'wpcf7_init', 'wpcf7_add_form_tag_select_group', 9 ); // 9 - до регистрации остальных тегов формы

/**
* Создание html версии выпадающего списка с группировкой option
*
* @param array $tag Атрибуты поля [select_optgroup]
*
* @return string html код поля
*/
function wpcf7_select_optgroup_form_tag_handler( $tag ){
    $tag = new WPCF7_FormTag( $tag );

    if( empty( $tag->name ) ){
        return '';
    }

    $validation_error = wpcf7_get_validation_error( $tag->name );

    $class            = wpcf7_form_controls_class( $tag->type );

    if( $validation_error ){
        $class .= ' wpcf7-not-valid';
    }

    $atts = array();

    $atts['class'] = $tag->get_class_option( $class );
    $atts['id'] = $tag->get_id_option();
    $atts['tabindex'] = $tag->get_option( 'tabindex', 'int', true );

    if( $tag->is_required() ){
        $atts['aria-required'] = 'true';
    }

    $atts['aria-invalid'] = $validation_error ? 'true' : 'false';

    $multiple       = $tag->has_option( 'multiple' );
    $include_blank  = $tag->has_option( 'include_blank' );
    $first_as_label = $tag->has_option( 'first_as_label' );

    $values = $tag->values;
    $labels = $tag->labels;

    if( $data = (array) $tag->get_data_option() ){
        $values = array_merge( $values, array_values( $data ) );
        $labels = array_merge( $labels, array_values( $data ) );
    }

    $defaults = array();

    $default_choice = $tag->get_default_option( null, 'multiple=1' );

    foreach( $default_choice as $value ){
        $key = array_search( $value, $values, true );

        if( false !== $key ){
            $defaults[] = (int) $key + 1;
        }
    }

    if( $matches = $tag->get_first_match_option( '/^default:([0-9_]+)$/' ) ){
        $defaults = array_merge( $defaults, explode( '_', $matches[1] ) );
    }

    $defaults = array_unique( $defaults );

    $shifted  = false;

    if( $include_blank || empty( $values ) ){
        array_unshift( $labels, '---' );
        array_unshift( $values, '' );
        $shifted = true;
    }
    elseif( $first_as_label ){
        $values[0] = '';
    }

    $html     = '';
    $hangover = wpcf7_get_hangover( $tag->name );

    foreach( $values as $key => $value ){
        $selected = false;

        if( $hangover ){
            if( $multiple ){
                $selected = in_array( esc_sql( $value ), (array) $hangover );
            }
            else{
                $selected = ( $hangover == esc_sql( $value ) );
            }
        }
        else{
            if( ! $shifted && in_array( (int) $key + 1, (array) $defaults ) ){
                $selected = true;
            }
            elseif( $shifted && in_array( (int) $key, (array) $defaults ) ){
                $selected = true;
            }
        }

        $item_atts = array(
            'value'   => $value,
            'selected'=> $selected ? 'selected' : ''
        );

        $item_atts = wpcf7_format_atts( $item_atts );

        $label = isset($labels[$key]) ? $labels[$key] : $value;

        // Если в лейбле содержится текст 'optgroup-', то открываем группу
        if( $label{0} == '{' ){
            $html .= '<optgroup label="'. substr( $label, 1 ) .'">';
        }
        // Если в лейбле содержится текст 'endoptgroup', то закрываем группу
        elseif( $label == '}' ){
            $html .= '</optgroup>';
        }
        // Если в лейбле не нашлись теги открытия или закрыия группы, значит это обычный лейб и не обрабатываем его
        else {
            $html .= sprintf( '<option %1$s>%2$s</option>', $item_atts, esc_html( $label ) );
        }

    }

    if( $multiple ) $atts['multiple'] = 'multiple';

    $atts['name'] = $tag->name . ( $multiple ? '[]' : '' );

    $atts = wpcf7_format_atts( $atts );

    $html = sprintf('<span class="wpcf7-form-control-wrap %1$s"><select %2$s>%3$s</select>%4$s</span>',
        sanitize_html_class($tag->name), $atts, $html, $validation_error );

    return $html;
}

/**
* Создаем кнопку "Сгрупированный выпадающий список" в панели составления шаблона формы
*
* Значение "menu" можно изменить на любое, оно будет поставлено в генераторе тега в поле "Имя"
*
* @return void
*/
function wpcf7_add_tag_generator_select_optgroup(){
    $tag_generator = WPCF7_TagGenerator::get_instance();
    $tag_generator->add( 'selectgroup', 'Выпадающий список (с группами)', 'wpcf7_tag_generator_select_optgroup' );
}
add_action( 'wpcf7_admin_init', 'wpcf7_add_tag_generator_select_optgroup', 25 );

/**
*   Формирование кнопки и модального окна для удобного создания тега поля
*
* @param object     $contact_form   объект формы со всеми настройками и параметрами
* @param array      $args                       массив с параметрами кнопки id, title, content
*
*/
function wpcf7_tag_generator_select_optgroup( $contact_form, $args = '' ){
    $args = wp_parse_args( $args, array() );

    $description = "Можно создавать группы, для этого оберните опции в конструкцию: '{Название_группы ...опции... }' (все на новой строке). Подробнее см. %s.";
    $desc_link   = wpcf7_link( '//wp-kama.ru/met/contact-form-7', 'всё о плагине Contact Form 7' );
    $description = sprintf( $description, $desc_link );

    ?>
    <div class="control-box">
        <fieldset>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">
                            <?php echo esc_html( __( 'Field type', 'contact-form-7' ) ); ?>
                        </th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <?php echo esc_html( __( 'Field type', 'contact-form-7' ) ); ?>
                                </legend>
                                <label>
                                    <input type="checkbox" name="required" /> <?php echo esc_html( __( 'Required field', 'contact-form-7' ) ); ?>
                                </label>
                            </fieldset>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="<?php echo esc_attr( $args['content'] . '-name' ); ?>">
                                <?php echo esc_html( __( 'Name', 'contact-form-7' ) ); ?>
                            </label>
                        </th>
                        <td>
                            <input type="text" name="name" class="tg-name oneline" id="<?php echo esc_attr( $args['content'] . '-name' ); ?>" />
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <?php echo esc_html( __( 'Options', 'contact-form-7' ) ); ?>
                        </th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <?php echo esc_html( __( 'Options', 'contact-form-7' ) ); ?>
                                </legend>
                                <textarea name="values" class="values" id="<?php echo esc_attr( $args['content'] . '-values' ); ?>"></textarea>
                                <label for="<?php echo esc_attr( $args['content'] . '-values' ); ?>">
                                    <span class="description">
                                        <?php echo esc_html( __( "One option per line.", 'contact-form-7' ) ) .'<br>'. $description; ?>
                                    </span>
                                </label><br />
                                <label>
                                    <input type="checkbox" name="multiple" class="option" /> <?php echo esc_html( __( 'Allow multiple selections', 'contact-form-7' ) ); ?>
                                </label><br />
                                <label>
                                    <input type="checkbox" name="include_blank" class="option" /> <?php echo esc_html( __( 'Insert a blank item as the first option', 'contact-form-7' ) ); ?>
                                </label>
                            </fieldset>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="<?php echo esc_attr( $args['content'] . '-id' ); ?>">
                                <?php echo esc_html( __( 'Id attribute', 'contact-form-7' ) ); ?>
                            </label>
                        </th>
                        <td>
                            <input type="text" name="id" class="idvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-id' ); ?>" />
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="<?php echo esc_attr( $args['content'] . '-class' ); ?>">
                                <?php echo esc_html( __( 'Class attribute', 'contact-form-7' ) ); ?>
                            </label>
                        </th>
                        <td>
                            <input type="text" name="class" class="classvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-class' ); ?>" />
                        </td>
                    </tr>

                </tbody>
            </table>
        </fieldset>
    </div>

    <div class="insert-box">
        <!-- Обязательно вписываем в значение name название поля, в нашем случае  select_optgroup, чтобы оно подставлялось по клику автоматически -->
        <input type="text" name="select_optgroup" class="tag code" readonly="readonly" onfocus="this.select()" />

        <div class="submitbox">
            <input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr( __( 'Insert Tag', 'contact-form-7' ) ); ?>" />
        </div>

        <br class="clear" />

        <p class="description mail-tag">
            <label for="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>">
                <?php echo sprintf( esc_html( __( "To use the value input through this field in a mail field, you need to insert the corresponding mail-tag (%s) into the field on the Mail tab.", 'contact-form-7' ) ), '<strong><span class="mail-tag"></span></strong>' ); ?><input type="text" class="mail-tag code hidden" readonly="readonly" id="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>" />
            </label>
        </p>
    </div>
    <?php
}



// add_filter( 'walker_nav_menu_start_el', 'filter_walker_nav_menu_start_el', 10, 4 );

// function filter_walker_nav_menu_start_el( $item_output, $item, $depth, $args ) {
//     return '<div class="wrap-link">test</div>';
// }


add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );

function your_custom_menu_item ( $items, $args ) {

    if (is_single() && $args->theme_location == 'main-navigation') {

        $items .= '<li>Что угодно</li>';

    }

    return $items;
}
