=== real.Kit ===

Contributors: Realist
Donate link:
Tags: kit, real, real., real.kit, image, images, thumb, thumbnail, thumbnails, category, categories, taxonomy, taxonomies, admin, id, ids, reveal, post, page, media, user, l10n, translit, transliteration, slugs, russian, rustolat, cyrtolat, cyrillic, javascript, js, add, modal, modals, window, windows, views, views count, landing page, maintenance, набор, реалист, картинка, миниатюра, категории, рубрики, таксономии, метки, админ, пост, запись, страница, меди, пользователи, транслит, транслитерация, слаг, ярлык, русский, кириллица, модальные окна, просмотры, счетчик просмотров, лэндинг, целевая страница, сайт в разработке, ведутся работы
Requires at least: 4.1.1
Tested up to: 4.9
Stable tag: 4.2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Набор дополнений и улучшений WordPress | Kit of additions and improvements for WordPress

== Description ==

*English read below*

= Возможности плагина: =

1) Добавляет колонку ID на страницах админ панели.

А именно: 'Все записи', 'Все страницы', 'Рубрики', 'Метки', 'Медиафайлы', 'Пользователи', 'Комментарии', 'Пользовательские рубрики/метки', 'Пользовательские типы записей'

2) Позволяет задавать миниатюры для рубрик и меток.

Используйте PHP функцию `realkit_taxonomy_thumb($cat_id, $thumb_size)` для того чтобы получить URL миниатюры текущей таксономии. Вы можете передать в эту функцию два аргумента: первый - `ID` желаемой таксономии (по умолчанию `ID` текущей таксономии), второй - необходимый размер миниатюры: `thumbnail`, `medium`, `large`, `full` (по умолчанию `full`).

3) Заменяет кириллические символы на латинские (транслит) в ярлыках заголовков и названиях файлов.

4) Позволяет вставлять JavaScript в текст записи или страницы, используя шорткод `[js]`.

Все HTML теги внутри этого шорткода будут вырезаны. Если Вам нужно написать HTML тег внутри JS - нужно к угловым скобки тега `<` и `>` добавить круглые скобки `<(` и `)>` соответственно.

Пример:
`[js]
console.log('<(div class="test")><(a href="#")>Лог<(/a)><(/div)>');
[/js]`

Для того что бы подключить JS файл, нужно шорткоду `[js]` передать параметр `src`.

Пример:
`[js src="/url/address/script.js"][/js]`

5) Добавляет новый тип записей для создания модальных окон. Если данная возможность Вам не нужна - её можно отключить ("Настройки" > "Модальные окна"). После публикации нового модального окна будет сгенерирован шорткод который, в свою очередь, будет генерировать кнопку открытия модального окна. Шорткод может принимать один обязательный параметр `open` (ID записи модального окна) и два не обязательных (атрибуты кнопки) `id` и `class`.

Пример шорткода:
`[modal open="540" id="button_id" class="button_class"]Текст кнопки[/modal]`

6) Опционально добавляет на страницах админ панели колонку с количеством уникальных просмотров (страниц и записей). Получить количество просмотров можно через шорткод `[views id=123]`, где `id` - не обязательный аргумент, обозначающий ID записи или страницы (по умолчанию будет использован ID текущей страницы или записи).

7) Позволяет, при помощи шорткода `[post]`, вставлять контент указанной записи. Это может быть удобно при создании целевых страниц (Landing page).

Примеры:
`[post id="1"]`
`[post title="Заголовок записи"]`
`[post slug="слаг-записи"]`

8) Сохраняет древовидную структуру отмеченных рубрик.

9) Добавлен режим разработки. В нем все посетители, кроме администратора, будут видеть заглушку, которую можно настроить через админ панель.

*Machine translation:*

= The plugin: =

1) Reveal IDs on admin pages.

IDs can be revealed on following pages: 'All Posts', 'All Pages', 'Categories', 'tags', 'Media', 'Users', 'Comments', 'Custom Taxonomies', 'Custom Post types'

2) Allows you to specify a thumbnails for Categories and Tags.

Use PHP function `realkit_taxonomy_thumb($cat_id, $thumb_size)` to get the URL of the current taxonomy thumbnail. You can pass this function two arguments: the first - `ID` desired taxonomy (default: current taxonomy ID), the second - the desired thumbnail size: `thumbnail`, `medium`, `large`, `full` (default: `full`).

3) Converts Cyrillic characters in slugs and filenames.

4) Allows the include of JavaScript inside posts and pages, using shortcode `[js]`.

All HTML tags inside this shortcode will be removed. If You need to use HTML tag inside JS You need add round brackets to angle bracket of the tag, like this: `<(` and `)>`.

Example:
`[js]
console.log('<(div class="test")><(a href="#")>Some Text<(/a)><(/div)>');
[/js]`

To include JS file, You need shortcode `[js]` to pass a parameter `src`.

Example:
`[js src="/url/address/script.js"][/js]`

5) Adds a new post type to create modal windows. If this option You do not need - you can turn it off ("Settings" > "Modals"). After the publication of a new modal window will be generated shortcode which, in turn, will generate the button that opens the modal window. The shortcode can take one mandatory parameter `open` (ID of the modal window post) and two are not mandatory (buttons attributes) `id` and `class`.

Shortcode example:
`[modal open="540" id="button_id" class="button_class"]Button Title[/modal]`

6) Optional adds on the pages admin panel column with the unique views count (pages and posts). Get the views count you can use the shortcode `[views id=123]`, where `id` is not required argument indicating the ID of the post or page (default: ID of the current page or post).

7) Allows you to insert the content of a given post by using the shortcode `[post]`. This can be useful when creating a Landing page.

Examples:
`[post id="1"]`
`[post title="Post Title"]`
`[post slug="post-slug"]`

8) Keep the hierarchical order of categories.

9) Added a Maintenance mode. This way all visitors, except administrator will see the plug that you can configure through admin panel.

== Installation ==

Как и любой другой плагин WordPress.

**Machine translation:**

Like any other WordPress plugin.

== Screenshots ==

1. ID записей | Posts ID
1. ID рубрик | Categories ID
1. Миниатюра рубрики | Categories Thumbnail
1. Миниатюра рубрики | Categories Thumbnail
1. Транслит записи | Posts Translit
1. Транслит медиафайла | Media files Translit
1. Модальные окна | Modal windows
1. Сброс счетчика просмотров | Reset views counter
1. Древовидная структура отмеченных рубрик | Categories in hierarchical order
1. Режим разработки | Maintenance mode
1. Все настройки на одной странице | All settings on one page

== Changelog ==

= 4.2.2 =

* Мелкие правки.

*Machine translation:*

* Minor changes.

= 4.2.1 =

* Убрал поддержку сочетания клавиш `Ctrl` + `S` (много разных нюансов).
* Исправлена ошибка в работе модальных окон (real.Modals).
* Для центровки модального окна теперь используется CSS а не JS.
* Мелкие правки.

*Machine translation:*

* Removed the keyboard shortcuts `Ctrl` + `S` (many different nuances).
* Fixed bug with modal windows (real.Modals).
* Now I use CSS (but not JS) for centering modal window.
* Minor changes.

= 4.2 =

* Добавлена поддержка сочетания клавиш `Ctrl` + `S`.
* Все настройки плагина теперь на одной странице.
* Исправлена ошибка работы с миниатюрами уже созданных рубрик.

*Machine translation:*

* Added support for keyboard shortcuts `Ctrl` + `S`.
* All plugin settings are now on one page.
* Fixed bug with thumbnails already created categories.

= 4.1 =

* Древовидная структура отмеченных рубрик.
* Добавлен режим разработки.

*Machine translation:*

* Categories in hierarchical order.
* Added a Maintenance mode.

= 4 =

* Добавлен шорткод `[post]`.

*Machine translation:*

* Added shortcode `[post]`.

= 3.3 =

* Мелкие правки.

*Machine translation:*

* Minor changes.

= 3.2 =

* Добавлена ссылка для сброса количества просмотров.

*Machine translation:*

* Added a link to reset the views counter.

= 3.1 =

* Добавлен шорткод `[views]`.

*Machine translation:*

* Added shortcode `[views]`.

= 3.0 =

* Добавлен опциональный счетчик количества просмотров
* Исправленна ошибка вызывающая NOTICE на странице категорий в админ панели.

*Machine translation:*

* Added optional views counter
* Fixed bug causing NOTICE on the category page in the admin panel.

= 2.0 =

* Добавлена возможность создания модальных окон

*Machine translation:*

* Added the ability to create modal Windows

= 1.3 =

* Убрано подключение не существующего файла стилей.
* Налажена совместимость с WordPress 4.2

*Machine translation:*

* Removed the connection not an existing stylesheet.
* Established compatibility with WordPress 4.2

= 1.2.3 =

* Исправленна ошибка версии 1.2.2

*Machine translation:*

* Fixed bug from 1.2.2

= 1.2.2 =

* Исправленна ошибка при вызове функции `realkit_taxonomy_thumb()`
* Расширено описание данной функции

*Machine translation:*

* Fixed bug when calling the function `realkit_taxonomy_thumb()`
* Extended description this function

= 1.2.1 =

* В шорткод `[js]...[/js]` добавлен параметр `src`.
* Другие правки.

*Machine translation:*

* In the shortcode `[js]...[/js]` added parameter `src`.
* Other changes.

= 1.2 =

* Добавлена поддержка шорткода `[js]...[/js]`.

*Machine translation:*

* Added shortcode `[js]...[/js]`.

= 1.1 =

* Добавлен русский перевод интерфейса.
* Исправлена ошибка транслитерации.
* Другие правки.

*Machine translation:*

* Added Russian localization.
* Fixed Transliteration bug.
* Other changes.