<?php
/**
 * Webmag functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Webmag
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

// чтобы тема была гибкой, есе функции, которые должны быть изменяемыми/гибкими надо проверять на наличие таких функций в дочерней теме
// если функция такая уже создана, то этот блок пропускается, а если нет - то создается
if ( ! function_exists( 'webmag_setup' ) ) : // если я хочу обновить или поменять функцию webmag_setup() - если эта функция не была создана до этого, то надо ее создать
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function webmag_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Webmag, use a find and replace
		 * to change 'webmag' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'webmag', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' ); // разрешает использовать миниатюры
		add_image_size( 'widget-thumb', 200, 200, false ); // создаем новую миниатюру, имя д.б. уникальным, размер и обрезаем (false - масштабируем, true - кадрируем)
		add_image_size( 'post-thumb-first', 750, 450, true );
		add_image_size( 'post-thumb', 670, 402, true );
		add_image_size( 'post-thumb-top-index', 555, 333, true );
		add_image_size( 'post-thumb-index', 360, 216, true );
		add_image_size( 'post-widget-thumb', 300, 180, true );
		add_image_size( 'post-thumb-sidebar', 90, 90, true );
		add_image_size( 'post-bg', 1920, 270, true );
		add_image_size( 'ad1-thumbnails', 300, 250, true );
		add_image_size( 'ad2-thumbnails', 728, 90, true );
		// https://wp-kama.ru/function/get_the_post_thumbnail_url — выводим миниатюру в верстке - н-р, the_post_thumbnail( 'post-thumb' )

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(  // отвечает за регистрацию нашего меню (регистрирует сразу несколько меню)
			array(  // в массиве мы регистрируем меню с неким слагом (меткой)
				// 'menu-1' => esc_html__( 'Primary', 'webmag' ), // так было
				/// menu-1 - метка меню, 'nav-aside-menu' - назовем мы наше меню
				/// Primary - название нашего меню, т.е. некое поле, в которое можно будет всавить меню, которое мы сделаем в админке
				/// 'Nav Aside' - это некое место, куда меню можно поместить (называется так, дырка, куда можем поместить меню)
				/// webmag - название нашей темы/шаблона
				'nav-aside-menu' => esc_html__( 'Nav Aside', 'webmag' ), // так стало
				'policy-footer-menu' => esc_html__( 'Policy', 'webmag' ),
				'about-us-footer-menu' => esc_html__( 'About Us', 'webmag' ),
				'social-links-aside-menu' => esc_html__( 'Social Aside', 'webmag' ),
				'social-links-footer-menu' => esc_html__( 'Social Footer', 'webmag' ),
				'social-links-post-menu' => esc_html__( 'Social Post', 'webmag' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'webmag_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 18,
				'width'       => 114,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'webmag_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function webmag_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'webmag_content_width', 640 );
}
add_action( 'after_setup_theme', 'webmag_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function webmag_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'webmag' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'webmag' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Index', 'webmag' ),
			'id'            => 'sidebar-index',
			'description'   => esc_html__( 'Add widgets here.', 'webmag' ),
			'before_widget' => '<div class="aside-widget %2$s" id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="section-title"><h2>',
			'after_title'   => '</h2></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Menu Aside', 'webmag' ),
			'id'            => 'sidebar-menu-aside',
			'description'   => esc_html__( 'Add widgets here.', 'webmag' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'webmag_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function webmag_scripts() {

	// подключим наши стили wp_enqueue_style(атрибуты: $handle - название скрипта/стиля, $src - путь, где лежит этот файл,
	// $deps - от каких других стилей зависит этот стиль, т.е. после каких стилей подключать этот файл со стилями,
	// $ver - версия, $media - на каких устройствах будет применяться этот файл со стилями) // из файла index.html
	wp_enqueue_style( 'nunito-sans', 'https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600' );
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/style.css' ); // изменения 07.05.
	wp_enqueue_style( 'webmag-style', get_stylesheet_uri() ); // подключаем главный файл стилей style.css - который в корне

	wp_style_add_data( 'webmag-style', 'rtl', 'replace' );

	// отменяем зарегистрированный jQuery  // вместо "jquery-core", можно вписать "jquery", тогда будет отменен еще и jquery-migrate
	wp_deregister_script( 'jquery' ); // отключаем старый (текущий) файл jquery, который работает в wp, чтобы не было никаких конфликтов
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js'); // регистрируем свой, новый jquery и указываем, где он лежит
	wp_enqueue_script( 'jquery' );

	// подключаем оставшиеся js-файлы, которые зависят от этого jquery
	// в атрибутах 'jquery' - после какого файла его подключать (зависит от jquery), null - версия, true - стоит ли подключать этот файл в footerе
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', null, true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', 'jquery', null, true );

	wp_enqueue_script( 'webmag-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'webmag-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_footer', 'webmag_animatecss' ); // объявляем имя функции с ее параметрами, как будто переменную, потом уже пишем саму функцию - что она должна сделать 

function webmag_animatecss() {
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
}

add_action( 'wp_enqueue_scripts', 'webmag_scripts' ); // ловим событие 'wp_enqueue_scripts' из ядра wp и говорим: выполни мою функцию 'webmag_scripts'

add_filter('show_admin_bar', '__return_false'); // отключить админ бар

add_filter( 'get_the_archive_title', function( $title ) { // Удаляет префикс "Рубрика: ", "Метка: " и т.д. из заголовка архива
	return preg_replace('~^[^:]+: ~', '', $title );
});

// разделитель заголовка страницы
function my_sep($sep) {
	return ' | ';
} // my_sep
add_filter('document_title_separator', 'my_sep');

// function add_span_cat_count($text) { // как-то модифицируем то, что нам прислали, и отправляем обратно измененным
// 	return $text . "123";
// }
// add_filter('wp_list_categories', 'add_span_cat_count'); // перехватываем хуком wp_list_categories вывод списка категорий
function add_span_cat_count($text) {
	$str = str_replace('</a> (', '<span>', $text); // что - </a> (, на что - <span>, где меняем - $text
	$str = str_replace(')', '</span></a>', $str);
	return $str;
}
add_filter('wp_list_categories', 'add_span_cat_count');

function my_widget_title($input) {
	if (substr($input, 0, 1) != "!") // substr() - функция, возвращает подстроку в строке (в какой строке, начиная с какой позиции - с нулевого символа, в количестве - один символ)
		return $input;
	else return null;
}
add_filter( 'widget_title', 'my_widget_title' ); // в параметрах сначала сам хук - название, затем название функции, которую нуно выполнить во время срабатывания этого хука

remove_filter('the_content', 'wptexturize'); // решение при проблеме с кавычками,  при копировании теста, ковычки заменялись на другие...


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function show_email() {
	return 'mail@mail.ru';
}
add_shortcode( 'email', 'show_email' ); // 'email' - tag, как называется наш шорткод, 'show_email' - функция, которая будет показывать/выводить этот шорткод

function generate_iframe( $atts ) { // функция отсеивает все лишнее и передает параметры по умолчанию, если они необходимы
	$atts = shortcode_atts( array( // параметры по умолчанию - если не передали
		'href'   => 'http://www.youtube.com', // заглушка, если ссылка не сработает
		'height' => '480px',
		'width'  => '640px', // 640px - со скролом, 720px - полный экран виден
	), $atts );

	// проверим переданные параметры
	if (is_numeric($atts['width']) && $atts['width'] > 1 && $atts['width'] < 1000) {
		$att_width = $atts['width'];
	} else {
		$att_width = '640px'; // если переданный параметр некорректен - взять параметр по умолчанию
	}
	if (is_numeric($atts['height']) && $atts['height'] > 1 && $atts['height'] < 1000) {
		$att_height = $atts['height'];
	} else {
		$att_height = '480px'; // если переданный параметр некорректен - взять параметр по умолчанию
	}
	if (!empty($atts['href']) && substr($atts['href'], 0, 4) == 'http') {
		$att_src = $atts['href'];
	} else {
		$att_src =' http://www.youtube.com';
	}

	// return '<iframe src="'. $atts['href'] .'" width="'. $atts['width'] .'" height="'. $atts['height'] .'"> <p>Your Browser does not support Iframes.</p></iframe>';
	return "<iframe src='{$att_src}' width='{$att_width}' height='{$att_height}'> <p>Your Browser does not support Iframes.</p></iframe>";
}
add_shortcode('video-iframe', 'generate_iframe');
// использование: [iframe href="http://www.youtube.com" height="480" width="640"]
// [iframe src="https://www.youtube.com/embed/S8VuUv4hwEo" height="315"  width="560"] // вот это вставляю в админке
// [iframe href="https://www.youtube.com/embed/OOED6Bb9nV8"  height="480" width="640"]

add_action('init', 'my_custom_init'); // прицепляем хук action во время события init мы вызываем функцию my_custom_init
function my_custom_init(){
	register_post_type('lesson', array(
		'labels'             => array(
			'name'               => 'Уроки', // Основное название типа записи
			'singular_name'      => 'Урок', // отдельное название записи типа Book
			'add_new'            => 'Добавить новый',
			'add_new_item'       => 'Добавить новый урок',
			'edit_item'          => 'Редактировать урок',
			'new_item'           => 'Новый урок',
			'view_item'          => 'Посмотреть урок',
			'search_items'       => 'Найти урок',
			'not_found'          => 'Уроков не найдено',
			'not_found_in_trash' => 'В корзине уроков не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Уроки'
			),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'menu_icon'			 => 'dashicons-welcome-learn-more',
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 22,
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
	) );
}


add_action('init', 'my_video_init');
function my_video_init(){
	register_post_type('video', array(
		'labels'             => array(
			'name'               => 'Видео',
			'singular_name'      => 'Видео',
			'add_new'            => 'Добавить новое',
			'add_new_item'       => 'Добавить новое видео',
			'edit_item'          => 'Редактировать видео',
			'new_item'           => 'Новое видео',
			'view_item'          => 'Посмотреть видео',
			'search_items'       => 'Найти видео',
			'not_found'          => 'Видео не найдено',
			'not_found_in_trash' => 'В корзине видео не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Видео'
			),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'menu_icon'			 => 'dashicons-video-alt',
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 23,
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
	) );
}


// хук, через который подключается функция
// регистрирующая новые таксономии (create_video_taxonomies)
add_action( 'init', 'create_video_taxonomies' );

// функция, создающая 2 новые таксономии "genres" и "authors" для постов типа "video"
function create_video_taxonomies(){

	// Добавляем древовидную таксономию 'genre' (как категории)
	register_taxonomy('genre', array('video'), array(
		'hierarchical'  => true,
		'labels'        => array(
			'name'              => _x( 'Жанры', 'taxonomy general name' ),
			'singular_name'     => _x( 'Genre', 'taxonomy singular name' ),
			'search_items'      =>  __( 'Search Genres' ),
			'all_items'         => __( 'All Genres' ),
			'parent_item'       => __( 'Parent Genre' ),
			'parent_item_colon' => __( 'Parent Genre:' ),
			'edit_item'         => __( 'Edit Genre' ),
			'update_item'       => __( 'Update Genre' ),
			'add_new_item'      => __( 'Добавить новый жанр' ),
			'new_item_name'     => __( 'New Genre Name' ),
			'menu_name'         => __( 'Жанры' ),
		),
		'show_ui'       => true,
		'query_var'     => true,
		'rewrite'       => array( 'slug' => 'the_genre' ), // есть свой собственный слаг в URL
	));

	// Добавляем НЕ древовидную таксономию 'author' (как метки)
	register_taxonomy('author', 'video', array(
		'hierarchical'  => false,
		'labels'        => array(
			'name'                        => _x( 'Авторы', 'taxonomy general name' ),
			'singular_name'               => _x( 'Author', 'taxonomy singular name' ),
			'search_items'                =>  __( 'Search Authors' ),
			'popular_items'               => __( 'Popular Authors' ),
			'all_items'                   => __( 'All Authors' ),
			'parent_item'                 => null,
			'parent_item_colon'           => null,
			'edit_item'                   => __( 'Edit Author' ),
			'update_item'                 => __( 'Update Author' ),
			'add_new_item'                => __( 'Add New Author' ),
			'new_item_name'               => __( 'New Author Name' ),
			'separate_items_with_commas'  => __( 'Separate authors with commas' ),
			'add_or_remove_items'         => __( 'Add or remove authors' ),
			'choose_from_most_used'       => __( 'Choose from the most used authors' ),
			'menu_name'                   => __( 'Авторы' ),
		),
		'show_ui'       => true,
		'query_var'     => true,
		'rewrite'       => array( 'slug' => 'the_author' ), // свой слаг в URL
	));
}

// add_filter('the_title', 'filter_symbol_the_title'); // мы подключаемся к хуку-событию the_title, выполняем функцию echo_the_title, дальше могут стоять приоритет или параметры, которые попадают в этот фильтр внутри функции
function filter_symbol_the_title($title, $length=30) { // обрезаем строку-заголовок по количеству символов
	if ( mb_strlen($title) <= $length)
		return $title ;

		$string = mb_substr( $title, 0, $length ); // функцией mb_substr() мы обрезаем наш $title на $length символах
		$string = rtrim($string, "?!,.-");
		$pos = strrpos($string, " ");
		$string = mb_substr($string, 0, $pos);

		$string .= ' ...';

		return $string; // возвращаем измененное значение
}

add_filter('the_title', 'echo_trim_words'); // заодно обрезает вывод иконок соцсетей???
function echo_trim_words($title) { // обрезаем строку-заголовок по количеству слов
	if (substr($title, 0, 2) !== "<i") {
		return wp_trim_words( $title, 5, ' ...' );
	} else {
		return $title;
	}
}

// add_filter('the_content', 'social_after_content');
function social_after_content($title) { // добавляем иконки соцсетей после контента
	return $content .=
	'<div class="nav-aside-social">
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-google-plus"></i></a>
		<a href="#"><i class="fa fa-pinterest"></i></a>
	</div>';
}

// Contact Form 7 remove auto added p tags
add_filter('wpcf7_autop_or_not', '__return_false');


// цепляемся к кастомайзеру
// add_action( 'customize_register', 'customizer_init' );

// function customizer_init( WP_Customize_Manager $wp_customize ) {
	
// 	$transport = 'postMessage'; // 'postMessage' - обновлять превью сайта: отправкой AJAX запроса

// 	// секция
// 	if ( $section = 'advanced_options' ) {

// 		// Добавляем ещё одну секцию - Настройки фона // Код аналитики
// 		$wp_customize->add_section( $section, [
// 			'title'    => 'Код аналитики', // ввести название, например, 'Настройки фона'
// 			'priority' => 10, // приоритет установим: 10 - в самом верху ( 201 - внизу списка выводит)
// 		] );

// 		// настройка
// 		$setting = 'analytics_code'; // меняем название - его передаем параметром в функцию передачи данных

// 		$wp_customize->add_setting( $setting, [
// 			'default'      => '', // по умолчанию - фоновое изображение не установлено
// 			'transport'    => $transport
// 		] );

// 		$wp_customize->add_control(
// 			new WP_Customize_Image_Control( $wp_customize, $setting, [
// 				'label'    => 'Вставьте код сюда', // 'Фон сайта'
// 				'type'     => 'textarea', // добавляем тип поля
// 				'settings' => $setting, // 'bg_image' - при помощи переменной подставляем (из // настройки)
// 				'section'  => $section // 'advanced_options' - так же при помощи переменной
// 			] )
// 		);

// 	}

// }

add_action( 'customize_register', 'customizer_init' );

function customizer_init( WP_Customize_Manager $wp_customize ) {
	
	$transport = 'postMessage';

	// секция
	if ( $section = 'advanced_options' ) {

		// Добавляем ещё одну секцию - Код аналитики
		$wp_customize->add_section( $section, [
			'title'    => 'Код аналитики',
			'priority' => 10,
		] );

		// настройка
		$setting = 'analytics_code';

		$wp_customize->add_setting( $setting, [
			'default'      => '',
			'transport'    => $transport
		] );

		$wp_customize->add_control(
			new WP_Customize_Image_Control( $wp_customize, $setting, [
				'label'    => 'Вставьте код сюда',
				'type'     => 'textarea',
				'settings' => $setting,
				'section'  => $section
			] )
		);

	}

}
