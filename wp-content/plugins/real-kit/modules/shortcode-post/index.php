<?php

if (shortcode_exists('post')) remove_shortcode('post');
add_shortcode('post','realkit_shortcode_post');

function realkit_shortcode_post($args) {

  // Получить пост по ID
  if (isset($args['id']) and is_numeric($args['id'])) {
    $post = get_post($args['id']);
  }

  // Получить пост по заголовку
  elseif (isset($args['title'])) {
    $post = get_page_by_title($args['title'], OBJECT, 'post');
  }

  // Получить пост по слагу
  elseif (isset($args['slug'])) {
    $post = get_page_by_path($args['slug'], OBJECT, 'post');
  }

  // Обернуть полученый пост
  if (isset($post)) {
    $class  = (isset($args['cover_class'])) ? esc_html($args['cover_class']) : '';
    $return = '<div class="' . implode(' ', get_post_class($class, $post->ID)) . '">'
            . apply_filters('the_content', $post->post_content)
            . '</div>';
  }

  return (isset($return)) ? $return : FALSE;

}