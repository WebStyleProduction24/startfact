<?php

$views_toggle = get_option('realkit_views_toggle');

if (empty($views_toggle) or $views_toggle == 'on') {

  // Сбросить счетчик
  if (isset($_GET['realkit_clear_views']) and is_numeric($_GET['realkit_clear_views'])) {
    global $realkit;
    update_post_meta($_GET['realkit_clear_views'], $realkit['views_meta_key'], 0);
    unset($_SESSION[$realkit['views_meta_key']][$_GET['realkit_clear_views']]);
  }

  // Добавить колонку с количеством просмотров
  add_action('admin_init', 'realkit_views_admin_init');
  function realkit_views_admin_init() {

    //! Показать в таксономиях
    /*foreach(get_taxonomies() as $taxonomy) {
      add_action('manage_edit-' . $taxonomy . '_columns', 'realkit_views_add_column');
      add_filter('manage_' . $taxonomy . '_custom_column', 'realkit_views_column_value', 10, 3);
      add_filter('manage_edit-' . $taxonomy . '_sortable_columns', 'realkit_views_add_column');
    }*/

    // Показать в Постах
    foreach(get_post_types() as $post_type) {
      add_action('manage_edit-' . $post_type . '_columns', 'realkit_views_add_column');
      add_filter('manage_' . $post_type . '_posts_custom_column', 'realkit_views_column_value', 10, 3);
      add_filter('manage_edit-' . $post_type . '_sortable_columns', 'realkit_views_add_column');
    }

  }

  // Добавляет колонку с количеством просмотров
  function realkit_views_add_column($columns) {
    $columns['realkit_views'] = __('Views', 'realkit');
    return $columns;
  }

  // Добавляет количество просмотров в нужную колонку
  function realkit_views_column_value($column, $id) {
    global $post, $realkit;
    if ($column == 'realkit_views') {
      $views = get_post_meta($post->ID, $realkit['views_meta_key'], true);
      echo ($views == '' or !is_numeric($views)) ? 0 : $views;
      echo '<a href="?realkit_clear_views=' . $post->ID . '">Сбросить</a>';
    }
  }

  // CSS
  add_action('init', 'realkit_views_common');
  function realkit_views_common() {
    if (is_admin()) {

      global $realkit;
      $url = $realkit['plugin_mod_url'];

      wp_register_style('realviews', $url . '/views/style.css');
      wp_enqueue_style('realviews');

    }
  }

}

if (!is_admin()) {

  // Увеличить счетчик (если не админ)
  add_action('loop_start', 'change_views_counter');
  function change_views_counter() {
    global $realkit;
    if ((is_single() or is_page()) and get_current_user_id() !== 1) {
      $id = get_the_ID();
      if (!isset($_SESSION[$realkit['views_meta_key']][$id])) {
        $count = get_post_meta($id, $realkit['views_meta_key'], true);
        $count = ($count == '') ? 0 : ++$count;
        update_post_meta($id, $realkit['views_meta_key'], $count);
        $_SESSION[$realkit['views_meta_key']][$id] = true;
      }
    }
  }

}

if (shortcode_exists('views')) remove_shortcode('views');
add_shortcode('views','realkit_shortcode_views');
function realkit_shortcode_views($args) {

  global $realkit;

  $id    = (isset($args['id']) and is_numeric($args['id'])) ? $args['id'] : get_the_ID();
  $count = get_post_meta($id, $realkit['views_meta_key'], true);

  return ($count == '') ? 0 : $count;

}