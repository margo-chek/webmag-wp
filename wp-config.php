<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'wordpress_admin' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'GdhchVRV4z07ny8w' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'uN^y<rfX]Oluw9(8 1-b,Y;lViW)mTb/U*z,F&gQW~*A&Z.D.V79d9Xpid0sKq.J' );
define( 'SECURE_AUTH_KEY',  '4OFD/S$XE5xE=S|ze>/==C6Qz|-e1W4yPQZ86i{Tx%))RihowXnD+.rXj>*4/|^3' );
define( 'LOGGED_IN_KEY',    'v{g3KWho<t*Yk{m_^GVD#ht$/B>${cBx^k)On`iA,)A*(65rP}}hVbIg.qr(]C%2' );
define( 'NONCE_KEY',        'yZLfHaI!#vk)~;Q|kc5uoqV!-{n{Jrns|PhZi;`t.4/fKW}B!Hp.|KNy{2w(V>+y' );
define( 'AUTH_SALT',        't;m~zVC`J&>/o0{-|8gWd/0zg~{Lqqc2?;naL&g?>6UAP,1KIxv2E?0/BsfP#a,s' );
define( 'SECURE_AUTH_SALT', ')(H$m/W(|V9~$j3cAIaTAP$v5O]5.&{{*CrZZ36YqS/76Wf%%.j?rf$,X?.L79l ' );
define( 'LOGGED_IN_SALT',   '0o<#e,pb`h>+Kk}.=@a~2t59^/I&BsA;.Ir2W/$_=l9j9W.FD,uu,Uf,/s=HvZh^' );
define( 'NONCE_SALT',       ':=E<<Z$m!}yb#ygXyny!,$jI-f95K~vHufcaw{(lw<?Ypzf>r;=bVXDKuj#PG$Ft' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
