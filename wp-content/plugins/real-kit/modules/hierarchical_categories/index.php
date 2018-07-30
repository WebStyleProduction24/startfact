<?php

add_filter('wp_terms_checklist_args', 'realkit_hierarchical_catedories', 10, 2);
function realkit_hierarchical_catedories($args, $post_id) {
  if (isset($args['taxonomy']))
    $args['checked_ontop'] = false;
  return $args;
}