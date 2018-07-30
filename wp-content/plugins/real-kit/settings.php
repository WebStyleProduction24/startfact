<?php

if (is_admin()) {

  // Добавить страницу настроек
  add_action('admin_menu', 'realkit_settings_page');
  function realkit_settings_page() {
    add_options_page(__('real.Kit', 'realkit'), __('real.Kit', 'realkit'), 'manage_options', __FILE__, 'realkit_settings_page_content');
  }

  // Контент страницы настроек
  function realkit_settings_page_content() {

    global $realkit;

    $updated = (isset($_POST['submit']))
             ? '<div class="updated"><p><strong>' . __('Saved') . '</strong></p></div>'
             : '';

    echo '<div class="wrap"><h2>' . __('real.Kit', 'realkit') . '</h2>' . $updated;

    require_once $realkit['plugin_mod_path'] . '/donate/settings.php';

    echo '<form method="post" class="realkit_settings">';

    require_once $realkit['plugin_mod_path'] . '/translit/settings.php';
    echo '<hr>';
    require_once $realkit['plugin_mod_path'] . '/modals/settings.php';
    echo '<hr>';
    require_once $realkit['plugin_mod_path'] . '/views/settings.php';
    echo '<hr>';
    require_once $realkit['plugin_mod_path'] . '/maintenance/settings.php';

    echo '<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="' . __('Save Changes') . '"></p>';

    echo '</form></div>';

  }

}