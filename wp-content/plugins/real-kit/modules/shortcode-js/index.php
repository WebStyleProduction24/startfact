<?php

if (shortcode_exists('js')) remove_shortcode('js');
add_shortcode('js','realkit_shortcode_js');

function realkit_shortcode_js($args, $content = '') {

  if (isset($args['src'])) {
    $return = '<script type="text/javascript" src="' . $args['src'] . '"></script>';
  }

  elseif (!empty($content)) {

    $content = strip_tags($content);
    $content = htmlspecialchars($content);

    $content = str_replace('&amp;#8216;', '\'', $content);
    $content = str_replace('&amp;#8217;', '\'', $content);
    $content = str_replace('&amp;#8242;', '\'', $content);
    $content = str_replace('&amp;#8220;', '"',  $content);
    $content = str_replace('&amp;#8221;', '"',  $content);
    $content = str_replace('&amp;#8243;', '"',  $content);
    $content = str_replace('&amp;#171;',  '"',  $content);
    $content = str_replace('&amp;#187;',  '"',  $content);
    $content = str_replace("&amp;#039;",  "'",  $content);
    $content = str_replace("&amp;#038;",  "&",  $content);
    $content = str_replace("&amp;#38;",   "&",  $content);
    $content = str_replace("&amp;lt;(",   "<",  $content);
    $content = str_replace(")&amp;gt;",   ">",  $content);

    $return  = '<script type="text/javascript">' . $content . '</script>';

  }

  return (isset($return)) ? $return : false;

}