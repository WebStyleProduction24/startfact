<?php
/*
Plugin Name: real.Kit
Version: 4.2.2
Plugin URI:
Description: Набор дополнений и улучшений WordPress | <a target="_blank" href="https://wordpress.org/plugins/real-kit/">English Description.</a>
Author: Realist
Author URI:
Text Domain: realkit
Domain Path: /lng/
*/

$realkit = array(
  'plugin_dir_path'  => plugin_dir_path(__FILE__),
  'plugin_mod_path'  => plugin_dir_path(__FILE__) . 'modules',
  'plugin_dir_url'   => plugin_dir_url(__FILE__),
  'plugin_mod_url'   => plugin_dir_url(__FILE__) . 'modules',
  'modals_post_type' => 'modal_window',
  'views_meta_key'   => 'views_count'
);

if (!session_id()) session_start();

// Локализация
add_action('plugins_loaded', 'realkit_load_locale');
function realkit_load_locale() {
  if (defined('REALKIT_LOAD_LOCALE')) return;
  load_plugin_textdomain('realkit', false, dirname(plugin_basename(__FILE__)) . '/lng/');
  define('REALKIT_LOAD_LOCALE', true);
}

// "Сайт в разработке"
require_once $realkit['plugin_mod_path'] . '/maintenance/index.php';

// Древовидная структура выбранных категорий записи в админке
require_once $realkit['plugin_mod_path'] . '/hierarchical_categories/index.php';

// Миниатюры
require_once $realkit['plugin_mod_path'] . '/thumbnails/index.php';

// Donate
require_once $realkit['plugin_mod_path'] . '/donate/index.php';

// ID
require_once $realkit['plugin_mod_path'] . '/ids/index.php';

// Транслитерация
require_once $realkit['plugin_mod_path'] . '/translit/index.php';

// Шорткод с JS
require_once $realkit['plugin_mod_path'] . '/shortcode-js/index.php';

// Шорткод вставки постов
require_once $realkit['plugin_mod_path'] . '/shortcode-post/index.php';

// Модальные окна
require_once $realkit['plugin_mod_path'] . '/modals/index.php';

// Количество просмотров
require_once $realkit['plugin_mod_path'] . '/views/index.php';

// Страница настроек плагина
require_once $realkit['plugin_dir_path'] . 'settings.php';