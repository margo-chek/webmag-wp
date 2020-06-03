<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Webmag
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php
		wp_head();  //  это "дырка" для WP для динамического подключения стилей и скриптов указаных в functions.php

		echo get_theme_mod( 'analytics_code' ); // функция получает значения добавленных настроек в Customizer - если хочу вывести код в панель разработчика на сайте
	?>
</head>

<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<div id="page" class="site">
	<!-- <a class="skip-link screen-reader-text" href="#primary"><?php //esc_html_e( 'Skip to content', 'webmag' ); ?></a> -->

	<!-- Header // из index.html -->
	<header id="header">
		<!-- Nav -->
		<div id="nav">
			<!-- Main Nav -->
			<div id="nav-fixed">
				<div class="container">
					<!-- logo -->
					<div class="nav-logo">
					<?php the_custom_logo( $blog_id ); ?>
						<!-- <a href="index.html" class="logo"><img src="./img/logo.png" alt=""></a> -->
					</div>
					<!-- /logo -->

					<!-- nav -->
					<!-- заменяем на динамический вывод в верхнее меню категорий (рубрик) при помощи https://wp-kama.ru/function/wp_list_categories -->
					<ul class="nav-menu nav navbar-nav">
						<?php wp_list_categories( [
							'hide_empty'         => 0, // показывать пустые категории (в которых нет записей)
							'include'            => '15, 16, 17, 18, 19, 20', // id категорий, которые хотим вывести
							'orderby'            => 'ID', // сортировка категорий по их id
							'title_li'           => '', // не выводить заголовок списка совсем
						] ); ?>
					</ul>
					<!-- <ul class="nav-menu nav navbar-nav">  // статический вариант категорий (рубрик) из html
						<li><a href="category.html">News</a></li>
						<li><a href="category.html">Popular</a></li>
						<li class="cat-1"><a href="category.html">Web Design</a></li>
						<li class="cat-2"><a href="category.html">JavaScript</a></li>
						<li class="cat-3"><a href="category.html">Css</a></li>
						<li class="cat-4"><a href="category.html">Jquery</a></li>
					</ul> -->
					<!-- /nav -->

					<!-- search & aside toggle -->
					<div class="nav-btns">
						<button class="aside-btn"><i class="fa fa-bars"></i></button>
						<?php get_search_form(); ?> <!--  вместо закомментированного кода ниже  -->
						<!-- <button class="search-btn"><i class="fa fa-search"></i></button>  // вырезаем тут и переносим в отдельный файл searchform.php
						<div class="search-form">
							<input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
							<button class="search-close"><i class="fa fa-times"></i></button>
						</div> -->
					</div>
					<!-- /search & aside toggle -->
				</div>
			</div>
			<!-- /Main Nav -->

			<!-- Aside Nav -->
			<div id="nav-aside">
				<!-- nav -->
				<!-- // в любом месте шаблона можем вызвать наше 'nav-aside-menu'// для этого вызываю функцию wp_nav_menu -->
				<?php 
					wp_nav_menu( [ // Выводит произвольное меню, созданное в панели: "внешний вид > меню" 
						'theme_location'  => 'nav-aside-menu', // указывается при регистрации меню функцией register_nav_menu() - какое именно меню навигации выводить
						// 'menu'            => 'nav-aside-menu',
						'container'       => 'div', // наш container завернут в div
						'container_class' => 'section-row', // класс контейнера из html <div class="section-row">
						'menu_class'      => 'nav-aside-menu', // класс меню (ul) из html <ul class="nav-aside-menu">
					] );

					// the_widget( 'WP_Widget_Pages', array('nav_menu' => 'sidebar-menu') );
					// the_widget( 'WP_Nav_Menu_Widget', array('nav_menu' => 'sidebar-menu') );
				?>
				<!-- <div class="section-row"> // было статическое меню в html
					<ul class="nav-aside-menu">
						<li><a href="index.html">Home</a></li>
						<li><a href="about.html">About Us</a></li>
						<li><a href="#">Join Us</a></li>
						<li><a href="#">Advertisement</a></li>
						<li><a href="contact.html">Contacts</a></li>
					</ul>
				</div> -->
				<!-- /nav -->

				<?php the_field('address', 53); ?>

				<!-- widget posts -->
				<div class="section-row">

					<?php get_sidebar( 'menu' ); ?>

					<h3>Recent Posts</h3>

					<?php
						global $post;

						$myposts = get_posts( array(
							'numberposts' => 3,
							// 'offset'=> 1,
						) );

						if (!empty($myposts)) {
							
							foreach( $myposts as $post ){
								setup_postdata( $post ); 

								// стандартный вывод записей?>
								<!-- post // вставка из index.html -->
									<div class="post post-widget">
										<!-- <a class="post-img" href="blog-post.html"><img src="./img/widget-2.jpg" alt=""></a> -->
										<a class="post-img" href="<?php the_permalink() ?>"> <!--  the_permalink() выводит ссылку на пост -->
											<?php the_post_thumbnail('post-thumb-sidebar') ?> <!-- the_post_thumbnail() - Выводит html код картинки-миниатюры текущего поста -->
										</a>
										<div class="post-body">
											<h3 class="post-title"><a href="blog-post.html"><?php the_title() ?></a></h3> <!-- the_title() - это функция, которая позволяет вывести заголовок статьи -->
										</div>
									</div>
								<!-- /post -->															
							<?php 
							} 
							
						} else {
							echo "Постов нет";
						}
		
						wp_reset_postdata(); // сбрасываем переменную $post
					?>
					<!-- /цикл widget posts -->

					<!-- <div class="post post-widget">
						<a class="post-img" href="blog-post.html"><img src="./img/widget-2.jpg" alt=""></a>
						<div class="post-body">
							<h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
						</div>
					</div>

					<div class="post post-widget">
						<a class="post-img" href="blog-post.html"><img src="./img/widget-3.jpg" alt=""></a>
						<div class="post-body">
							<h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
						</div>
					</div>

					<div class="post post-widget">
						<a class="post-img" href="blog-post.html"><img src="./img/widget-4.jpg" alt=""></a>
						<div class="post-body">
							<h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
						</div>
					</div> -->
				</div>
				<!-- /widget posts -->

				<!-- social links -->
				<?php 
					wp_nav_menu( [ // Выводит произвольное меню, созданное в панели: "внешний вид > меню" 
						'theme_location'  => 'social-links-aside-menu', // указывается при регистрации меню функцией register_nav_menu() - какое именно меню навигации выводить
						'container'       => 'div', // наш container завернут в div
						'container_class' => 'section-row', // класс контейнера из html <div class="section-row">
						'menu_class'      => 'nav-aside-social', // класс меню (ul) из html <ul class="nav-aside-social">
					] );

					// the_widget( 'WP_Widget_Pages', array('nav_menu' => 'sidebar-menu') );
					// the_widget( 'WP_Nav_Menu_Widget', array('nav_menu' => 'sidebar-menu') );
				?>
				<!-- <div class="section-row">
					<h3>Follow us</h3>
					<ul class="nav-aside-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
					</ul>
				</div> -->
				<!-- /social links -->

				<!-- aside nav close -->
				<button class="nav-aside-close"><i class="fa fa-times"></i></button>
				<!-- /aside nav close -->
			</div>
			<!-- Aside Nav -->
		</div>
		<!-- /Nav -->
	</header>
	<!-- /Heade		r -->

	<!-- <header id="masthead" class="site-header"> // старый header удаляем
		<div class="site-branding">
			.........
		</nav>
	</header>#masthead -->
