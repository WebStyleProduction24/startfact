<?php

// Инициализация
add_action('admin_init', 'realkit_admin_init');
function realkit_admin_init() {
  $taxonomies = get_taxonomies();
  if (is_array($taxonomies)) {
    foreach ($taxonomies as $taxonomy) {

      // Добавить поле в форму добавления таксономии
      add_action($taxonomy . '_add_form_fields', 'realkit_add_texonomy_field');
      if (!function_exists('realkit_add_texonomy_field')) {
        function realkit_add_texonomy_field() {
          wp_enqueue_media();
          echo '
            <div class="form-field">
              <label for="taxonomy_thumb">' . __('Thumbnail') . '</label>
              <input type="text" name="taxonomy_thumb" id="taxonomy_thumb" value="" />
              <button type="button" class="realkit_upload_thumb_button button">
                ' . __('Upload/Add', 'realkit') . '
              </button>
            </div>
          ';
        }
      }

      // Добавить поле в форму редактирования таксономии
      add_action($taxonomy . '_edit_form_fields', 'relkit_edit_texonomy_field');
      if (!function_exists('relkit_edit_texonomy_field')) {
        function relkit_edit_texonomy_field($taxonomy) {
          wp_enqueue_media();
          $src   = realkit_taxonomy_thumb($taxonomy->term_id, null);
          $thumb = (empty($src)) ? '' : '<img class="taxonomy-thumb edit" src="' . $src . '"/>';
          echo '
            <tr class="form-field">
              <th scope="row" valign="top">
                <label for="taxonomy_thumb">
                  ' . __('Thumbnail') . '
                  <br>
                  ' . $thumb . '
                </label>
              </th>
              <td>
                <input type="text" name="taxonomy_thumb" id="taxonomy_thumb" value="' . $src . '" />
                <button type="button" class="realkit_upload_thumb_button button">
                  ' . __('Upload/Add', 'realkit') . '
                </button>
                <button class="realkit_remove_thumb_button button">
                  ' . __('Remove', 'realkit') . '
                </button>
              </td>
            </tr>
          ';
        }
      }

      // Добавить колонку в таблицы таксономий
      add_filter('manage_edit-' . $taxonomy . '_columns', 'realkit_taxonomy_thumb_column');
      if (!function_exists('realkit_taxonomy_thumb_column')) {
        function realkit_taxonomy_thumb_column($columns) {
          $new          = array();
          $new['cb']    = $columns['cb'];
          $new['thumb'] = __('Thumbnail');
          unset($columns['cb']);
          return array_merge($new, $columns);
        }
      }

      // Вставить миниатюру в колонку в таблицы таксономий
      add_filter('manage_' . $taxonomy . '_custom_column', 'realkit_taxonomy_thumb_column_value', 10, 3);
      if (!function_exists('realkit_taxonomy_thumb_column_value')) {
        function realkit_taxonomy_thumb_column_value($columns, $column, $id) {
          $thumb = ($column == 'thumb') ? realkit_taxonomy_thumb($id, null) : '';
          return (empty($thumb)) ? '' : '
            <span>
              <img src="' . $thumb . '" alt="" class="taxonomy-thumb wp-post-image" />
            </span>
          ';
        }
      }

    }
  }
}

// Сохранить миниатюру таксономии
add_action('edit_term',   'realkit_save_taxonomy_thumb');
add_action('create_term', 'realkit_save_taxonomy_thumb');
function realkit_save_taxonomy_thumb($term_id) {
  if (isset($_POST['taxonomy_thumb'])) {
    update_option('realkit_taxonomy_thumb_' . $term_id, $_POST['taxonomy_thumb']);
  }
}

// Добавить поле в форму быстрого редактирования
add_action('quick_edit_custom_box', 'realkit_taxonomy_thumb_quick_edit', 10, 1);
if (!function_exists('realkit_taxonomy_thumb_quick_edit')) {
  function realkit_taxonomy_thumb_quick_edit($column_name) {
    if ($column_name == 'thumb') {
      echo '
        <fieldset>
          <div class="thumb inline-edit-col">
            <label>
              <span class="title">' . __('Thumbnail') . '</span>
              <span class="input-text-wrap">
                <input type="text" name="taxonomy_thumb" value="" class="tax_list" />
              </span>
              <span class="input-text-wrap">
                <button type="button" class="realkit_upload_thumb_button button">
                  ' . __('Upload/Add', 'realkit') . '
                </button>
                <button class="realkit_remove_thumb_button button">
                  ' . __('Remove') . '
                </button>
              </span>
            </label>
          </div>
        </fieldset>
      ';
    }
  }
}

// Подключить CSS/JS
$cond_1 = (strpos($_SERVER['SCRIPT_NAME'], 'edit-tags.php') !== false);
$cond_2 = (strpos($_SERVER['SCRIPT_NAME'], 'term.php') !== false);
if ($cond_1 or $cond_2) {
  add_action('admin_enqueue_scripts', 'realkit_thumbnails_require_assests');
  if (!function_exists('realkit_thumbnails_require_assests')) {
    function realkit_thumbnails_require_assests() {

      global $realkit;
      $url = $realkit['plugin_mod_url'];

      // CSS
      wp_register_style('real_thumbnails', $url . '/thumbnails/style.css');
      wp_enqueue_style('real_thumbnails');

      // JS
      wp_register_script('real_thumbnails', $url . '/thumbnails/script.js', array('jquery'));
      wp_enqueue_script('real_thumbnails');

    }
  }
}

// Получает URL миниатюры таксономии
if (!function_exists('realkit_taxonomy_thumb')) {
  function realkit_taxonomy_thumb($term_id = null, $size = null) {

    if (!$term_id) {
      if (is_category())
        $term_id = get_query_var('cat');
      elseif (is_tax()) {
        $current_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
        $term_id = $current_term->term_id;
      }
    }

    $thumb = get_option('realkit_taxonomy_thumb_' . $term_id);

    if (!empty($thumb)) {

      global $wpdb;
      $query     = "SELECT `ID` FROM `{$wpdb->posts}` WHERE `guid` = '$thumb'";
      $attach_id = $wpdb->get_var($query);

      if (!empty($attach_id)) {
        $size = (empty($size)) ? 'full' : $size;
        $thumb = wp_get_attachment_image_src($attach_id, $size);
        $thumb = $thumb[0];
      }

    }

    return $thumb;

  }
}