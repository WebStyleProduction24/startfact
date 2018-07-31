<?php

if (is_admin()) {

  // CSS
  add_action('init', 'realkit_donate_common');
  function realkit_donate_common() {

    global $realkit;
    $url = $realkit['plugin_mod_url'];

    wp_register_style('donate', $url . '/donate/style.css');
    wp_enqueue_style('donate');

  }

}