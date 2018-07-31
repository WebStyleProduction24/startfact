<?php

if (is_admin()) {

  // Словари
  $realkit_translit_dic = array(
    'iso' => array(
      'А' => 'A',  'Б' => 'B',  'В' => 'V',  'Г' => 'G',  'Д' => 'D',  'Е' => 'E',   'Ё' => 'YO',
      'Ж' => 'ZH', 'З' => 'Z',  'И' => 'I',  'Й' => 'J',  'К' => 'K',  'Л' => 'L',   'М' => 'M',
      'Н' => 'N',  'О' => 'O',  'П' => 'P',  'Р' => 'R',  'С' => 'S',  'Т' => 'T',   'У' => 'U',
      'Ф' => 'F',  'Х' => 'X',  'Ц' => 'C',  'Ч' => 'CH', 'Ш' => 'SH', 'Щ' => 'SHH', 'Ъ' => '\'',
      'Ы' => 'Y',  'Ь' => '',   'Э' => 'E',  'Ю' => 'YU', 'Я' => 'YA', 'а' => 'a',   'б' => 'b',
      'в' => 'v',  'г' => 'g',  'д' => 'd',  'е' => 'e',  'ё' => 'yo', 'ж' => 'zh',  'з' => 'z',
      'и' => 'i',  'й' => 'j',  'к' => 'k',  'л' => 'l',  'м' => 'm',  'н' => 'n',   'о' => 'o',
      'п' => 'p',  'р' => 'r',  'с' => 's',  'т' => 't',  'у' => 'u',  'ф' => 'f',   'х' => 'x',
      'ц' => 'c',  'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shh','ъ' => '',   'ы' => 'y',   'ь' => '',
      'э' => 'e',  'ю' => 'yu', 'я' => 'ya', 'Є' => 'YE', 'І' => 'I',  'Ѓ' => 'G',   'і' => 'i',
      'Ї' => 'Yi', 'ї' => 'yi', 'є' => 'ye',  'ѓ' => 'g'
    ),
    'gost' => array(
      'А' => 'A',  'Б' => 'B',  'В' => 'V',  'Г' => 'G',  'Д' => 'D',  'Е' => 'E',  'Ё' => 'JO',
      'Ж' => 'ZH', 'З' => 'Z',  'И' => 'I',  'Й' => 'JJ', 'К' => 'K',  'Л' => 'L',  'М' => 'M',
      'Н' => 'N',  'О' => 'O',  'П' => 'P',  'Р' => 'R',  'С' => 'S',  'Т' => 'T',  'У' => 'U',
      'Ф' => 'F',  'Х' => 'KH', 'Ц' => 'C',  'Ч' => 'CH', 'Ш' => 'SH', 'Щ' => 'SHH','Ъ' => '\'',
      'Ы' => 'Y',  'Ь' => '',   'Э' => 'EH', 'Ю' => 'YU', 'Я' => 'YA', 'а' => 'a',  'б' => 'b',
      'в' => 'v',  'г' => 'g',  'д' => 'd',  'е' => 'e',  'ё' => 'jo', 'ж' => 'zh', 'з' => 'z',
      'и' => 'i',  'й' => 'jj', 'к' => 'k',  'л' => 'l',  'м' => 'm',  'н' => 'n',  'о' => 'o',
      'п' => 'p',  'р' => 'r',  'с' => 's',  'т' => 't',  'у' => 'u',  'ф' => 'f',  'х' => 'kh',
      'ц' => 'c',  'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shh','ъ' => '',   'ы' => 'y',  'ь' => '',
      'э' => 'eh', 'ю' => 'yu', 'я' => 'ya', 'Є' => 'EH', 'І' => 'I',  'і' => 'i',  'є' => 'eh',
      'Ї' => 'Yi', 'ї' => 'yi', 'ѓ' => 'g',  'Ѓ' => 'G'
    )
  );

  // Преобразовать
  add_filter('sanitize_title', 'realkit_translit_url', 0);
  add_filter('sanitize_file_name', 'realkit_translit', 0);
  if (!function_exists('realkit_translit')) {
    function realkit_translit($string) {

      global $realkit_translit_dic;
      $standard = get_option('realkit_translit_standard');
      $standard = ($standard) ? $standard : 'iso';

      $string = urldecode($string);

      // Транслитерация
      $string = strtr($string, $realkit_translit_dic[$standard]);

      // В нижний регистр
      $string = strtolower($string);

      // Заменить все лишние символы на дефис
      $string = preg_replace('~[^a-z0-9\_\-\.]+~u', '-', $string);

      // Удалить больше одного дефиса подряд
      $string = preg_replace('~[-]+~u', '-', $string);

      // Удалить начальные и конечные дефисы
      $string = trim($string, '-');

      return $string;

    }
  }
  if (!function_exists('realkit_translit_url')) {
    function realkit_translit_url($string) {
      $string = realkit_translit($string);
      $string = str_replace('.', '-', $string);
      return $string;
    }
  }

}