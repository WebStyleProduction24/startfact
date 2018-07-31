<?php

$maintenance_toggle = get_option('realkit_maintenance_toggle');

add_action('init', 'realkit_default_maintenace_html', 1);
function realkit_default_maintenace_html() {
  $maintenance_html = get_option('realkit_maintenance_html');
  if (empty($maintenance_html)) {
    $maintenance_html = '<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>' . __('Site Maintenance', 'realkit') . '</title>
  </head>
  <body>
    <h1 style="position: absolute; top: 30%; left: 30%; font-family: Georgia; color: #222; font-size: 24px;">' . __('Site Maintenance', 'realkit') . '!</h1>
  </body>
</html>';
    update_option('realkit_maintenance_html', htmlentities(stripslashes($maintenance_html)));
  }
}

if ($maintenance_toggle == 'on') {
  add_action('init', 'realkit_start_maintenace_mode', 1);
  function realkit_start_maintenace_mode() {
    if (strpos($_SERVER['REQUEST_URI'], 'wp-admin') === FALSE
    and strpos($_SERVER['REQUEST_URI'], 'wp-login') === FALSE
    and !is_admin() and !is_super_admin()) {
      die(html_entity_decode(get_option('realkit_maintenance_html')));
    }
  }
}