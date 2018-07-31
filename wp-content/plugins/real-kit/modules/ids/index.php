<?php

if (is_admin()) {

  // Инициализация
  add_action('admin_init', 'real_id_admin_init');
  function real_id_admin_init() {

    // Показать ID в библиотеке медиафайлов
    add_filter('manage_media_columns', 'real_id_add_column_order');
    add_action('manage_media_custom_column', 'real_id_column_value', 10, 2);

    // Показать ID в таксономиях
    foreach(get_taxonomies() as $taxonomy) {
      add_action('manage_edit-' . $taxonomy . '_columns', 'real_id_add_column');
      add_filter('manage_' . $taxonomy . '_custom_column', 'real_id_column_value_2', 10, 3);
      add_filter('manage_edit-' . $taxonomy . '_sortable_columns', 'real_id_add_column');
    }

    // Показать ID в Постах
    foreach(get_post_types() as $post_type) {
      add_action('manage_edit-' . $post_type . '_columns', 'real_id_add_column');
      add_filter('manage_' . $post_type . '_posts_custom_column', 'real_id_column_value', 10, 3);
      add_filter('manage_edit-' . $post_type . '_sortable_columns', 'real_id_add_column');
    }

    // Показать ID в Пользователях
    add_action('manage_users_columns', 'real_id_add_column');
    add_filter('manage_users_custom_column', 'real_id_column_value_2', 10, 3);
    add_filter('manage_users_sortable_columns', 'real_id_add_column');

    // Показать ID в Комментариях
    add_action('manage_edit-comments_columns', 'real_id_add_column');
    add_action('manage_comments_custom_column', 'real_id_column_value', 10, 2);
    add_filter('manage_edit-comments_sortable_columns', 'real_id_add_column');

  }

  // Добавляет колонку
  function real_id_add_column($columns) {
    $columns = array_slice($columns, 0, 1, true )
             + array('real_id' => 'ID')
             + array_slice($columns, 1, NULL, true);
    return $columns;
  }

  // Добавляет колонку с сылкой на сортировку (для медиафайлов)
  function real_id_add_column_order($columns) {

    $qstr = $_SERVER['QUERY_STRING'];
    $args = explode('&', $qstr);

    foreach ($args as $arg) {
      $arg = explode('=', $arg);
      if ($arg[0] != 'orderby' and $arg[0] != 'order' and isset($arg[1])) {
        $arr[$arg[0]] = $arg[1];
        foreach ($arr as $k => $v) {
          $href[] = $k . '=' . $v;
        }
      }
    }

    $order = 'ASC';
    if ((isset($_GET['orderby']) and $_GET['orderby'] == 'ID') and
        (isset($_GET['order'])   and $_GET['order']   == 'ASC')) {
      $order = 'DESC';
    }

    $href = (isset($href)) ? implode('&amp;', $href) . '&amp;' : '';
    $href = '?' . $href . 'orderby=ID&amp;order=' . $order;

    $columns = array_slice($columns, 0, 1, true) + array('real_id' => '<a href=' . $href . ' class="real_id-sortable ' . strtolower($order) . '"><span>ID</span></a>') + array_slice($columns, 1, NULL, true);

    return $columns;

  }

  // Добавляет ID в колонку
  function real_id_column_value($column, $id) {
    if ($column == 'real_id') echo $id;
  }

  // Добавляет ID в колонку Таксономиях и Пользователях
  function real_id_column_value_2($value, $column, $post_id) {
    if ($column === 'real_id') {
      $value .= $post_id;
    }
    return $value;
  }

  // Подключить CSS/JS
  add_action('admin_enqueue_scripts', 'realkit_id_require_assests');
  if (!function_exists('realkit_id_require_assests')) {
    function realkit_id_require_assests() {

      global $realkit;
      $url = $realkit['plugin_mod_url'];

      // CSS
      wp_register_style('real_ids', $url . '/ids/style.css');
      wp_enqueue_style('real_ids');

      // JS
      wp_register_script('real_id_js', $url . '/ids/script.js', array('jquery'));
      wp_enqueue_script('real_id_js');

    }
  }

}