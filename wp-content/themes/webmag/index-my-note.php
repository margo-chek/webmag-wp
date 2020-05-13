<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Webmag
 */

get_header(); // если get_header(); то тут выводит файл header.php - нужно найти файл header.php и вставить его в разметку
// wp останавливается и ищет файл, находит и вставляет сюда
// если с параметром get_header(primary); то ищет файл header-primary.php -> если его не найдет, то выведет header.php
?>

<ul> // урок 8
	<!-- стороим цикл через https://wp-kama.ru/handbook/cheatsheet -->
	<?php		
		global $post; // создается глобальная переменная $post, в нее будут помещаться параметры постов

		$query = new WP_Query( [ // создается переменная $query, куда помещается новый класс WP_Query с разными параметрами-атрибутами
			'posts_per_page' => 5, // вывести 5 постов на странице
			'orderby'        => 'title', // сортировать посты по комментариям 'comment_count' или заголовкам 'title'
		] );

		if ( $query->have_posts() ) { // если в $query есть посты, то
			while ( $query->have_posts() ) { // пока в $query есть посты
				$query->the_post(); // мы будем их выводить при помощи функции the_post()
				?>
				<!-- Вывода постов, функции цикла: the_title() и т.д. // как мы будем их выводить, можем тут указать -->
				<!-- например мы используем тег li, в нем выводим с помощью php-разметки the_title() -->
				<!-- the_title() - это функция, которая позволяет вывести заголовок статьи -->
				<li><?php the_title() ?></li> <!-- // выведет список заголовков 5 статей -->
				<?php 
			}
		} else {
			echo "Постов нет"; // если постов не найдено - по таким параметрам постов нет
		}

		wp_reset_postdata(); // Сбрасываем $post
	?>
</ul>

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">	
				<!-- post -->
				<div class="col-md-6">
					<div class="post post-thumb">
						<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/post-1.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-2" href="category.html">JavaScript</a>
								<span class="post-date">March 27, 2018</span>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
						</div>
					</div>
				</div>
				<!-- /post -->

				<!-- post -->
				<div class="col-md-6">
					<div class="post post-thumb">
						<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/post-2.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-3" href="category.html">Jquery</a>
								<span class="post-date">March 27, 2018</span>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
						</div>
					</div>
				</div>
				<!-- /post -->
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2>Recent Posts</h2>
					</div>
				</div>

				<!-- post -->
				<div class="col-md-4">
					<div class="post">
						<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/post-3.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-1" href="category.html">Web Design</a>
								<span class="post-date">March 27, 2018</span>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
						</div>
					</div>
				</div>
				<!-- /post -->

				<!-- post -->
				<div class="col-md-4">
					<div class="post">
						<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/post-4.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-2" href="category.html">JavaScript</a>
								<span class="post-date">March 27, 2018</span>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
						</div>
					</div>
				</div>
				<!-- /post -->

				<!-- post -->
				<div class="col-md-4">
					<div class="post">
						<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/post-5.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-3" href="category.html">Jquery</a>
								<span class="post-date">March 27, 2018</span>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
						</div>
					</div>
				</div>
				<!-- /post -->

				<div class="clearfix visible-md visible-lg"></div>

				<!-- post -->
				<div class="col-md-4">
					<div class="post">
						<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/post-6.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-2" href="category.html">JavaScript</a>
								<span class="post-date">March 27, 2018</span>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
						</div>
					</div>
				</div>
				<!-- /post -->

				<!-- post -->
				<div class="col-md-4">
					<div class="post">
						<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/post-1.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-4" href="category.html">Css</a>
								<span class="post-date">March 27, 2018</span>
							</div>
							<h3 class="post-title"><a href="blog-post.html">CSS Float: A Tutorial</a></h3>
						</div>
					</div>
				</div>
				<!-- /post -->

				<!-- post -->
				<div class="col-md-4">
					<div class="post">
						<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/post-2.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-1" href="category.html">Web Design</a>
								<span class="post-date">March 27, 2018</span>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
						</div>
					</div>
				</div>
				<!-- /post -->
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<!-- post -->
						<div class="col-md-12">
							<div class="post post-thumb">
								<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/post-2.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-3" href="category.html">Jquery</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
								</div>
							</div>
						</div>
						<!-- /post -->

						<!-- post -->
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/post-1.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-4" href="category.html">Css</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">CSS Float: A Tutorial</a></h3>
								</div>
							</div>
						</div>
						<!-- /post -->

						<!-- post -->
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/post-2.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-1" href="category.html">Web Design</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
								</div>
							</div>
						</div>
						<!-- /post -->

						<div class="clearfix visible-md visible-lg"></div>

						<!-- post -->
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/post-4.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-2" href="category.html">JavaScript</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
								</div>
							</div>
						</div>
						<!-- /post -->

						<!-- post -->
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/post-5.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-3" href="category.html">Jquery</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
								</div>
							</div>
						</div>
						<!-- /post -->

						<div class="clearfix visible-md visible-lg"></div>

						<!-- post -->
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/post-3.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-1" href="category.html">Web Design</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
								</div>
							</div>
						</div>
						<!-- /post -->

						<!-- post -->
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/post-4.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-2" href="category.html">JavaScript</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
								</div>
							</div>
						</div>
						<!-- /post -->
					</div>
				</div>

				<div class="col-md-4">
					<!-- post widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2>Most Read</h2>
						</div>

						<div class="post post-widget">
							<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/widget-1.jpg" alt=""></a>
							<div class="post-body">
								<h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
							</div>
						</div>

						<div class="post post-widget">
							<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/widget-2.jpg" alt=""></a>
							<div class="post-body">
								<h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
							</div>
						</div>

						<div class="post post-widget">
							<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/widget-3.jpg" alt=""></a>
							<div class="post-body">
								<h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
							</div>
						</div>

						<div class="post post-widget">
							<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/widget-4.jpg" alt=""></a>
							<div class="post-body">
								<h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
							</div>
						</div>
					</div>
					<!-- /post widget -->

					<!-- post widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2>Featured Posts</h2>
						</div>
						<div class="post post-thumb">
							<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/post-2.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-3" href="category.html">Jquery</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
							</div>
						</div>

						<div class="post post-thumb">
							<a class="post-img" href="blog-post.html"><img src="<?php echo get_template_directory_uri(); ?>/img/post-1.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="category.html">JavaScript</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
							</div>
						</div>
					</div>
					<!-- /post widget -->
					
					<!-- ad -->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/ad-1.jpg" alt="">
						</a>
					</div>
					<!-- /ad -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
	
	<!-- section -->
	<div class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2>Featured Posts</h2>
					</div>
				</div>

				<!-- post -->
				<div class="col-md-4">
					<div class="post">
						<a class="post-img" href="blog-post.html"><img src="./img/post-4.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-2" href="category.html">JavaScript</a>
								<span class="post-date">March 27, 2018</span>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
						</div>
					</div>
				</div>
				<!-- /post -->

				<!-- post -->
				<div class="col-md-4">
					<div class="post">
						<a class="post-img" href="blog-post.html"><img src="./img/post-5.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-3" href="category.html">Jquery</a>
								<span class="post-date">March 27, 2018</span>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
						</div>
					</div>
				</div>
				<!-- /post -->

				<!-- post -->
				<div class="col-md-4">
					<div class="post">
						<a class="post-img" href="blog-post.html"><img src="./img/post-3.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-1" href="category.html">Web Design</a>
								<span class="post-date">March 27, 2018</span>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
						</div>
					</div>
				</div>
				<!-- /post -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2>Most Read</h2>
							</div>
						</div>
						<!-- post -->
						<div class="col-md-12">
							<div class="post post-row">
								<a class="post-img" href="blog-post.html"><img src="./img/post-4.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-2" href="category.html">JavaScript</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
								</div>
							</div>
						</div>
						<!-- /post -->

						<!-- post -->
						<div class="col-md-12">
							<div class="post post-row">
								<a class="post-img" href="blog-post.html"><img src="./img/post-6.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-2" href="category.html">JavaScript</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
								</div>
							</div>
						</div>
						<!-- /post -->

						<!-- post -->
						<div class="col-md-12">
							<div class="post post-row">
								<a class="post-img" href="blog-post.html"><img src="./img/post-1.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-4" href="category.html">Css</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">CSS Float: A Tutorial</a></h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
								</div>
							</div>
						</div>
						<!-- /post -->
						
						<!-- post -->
						<div class="col-md-12">
							<div class="post post-row">
								<a class="post-img" href="blog-post.html"><img src="./img/post-2.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-3" href="category.html">Jquery</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
								</div>
							</div>
						</div>
						<!-- /post -->
						
						<div class="col-md-12">
							<div class="section-row">
								<button class="primary-button center-block">Load More</button>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<!-- ad -->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="./img/ad-1.jpg" alt="">
						</a>
					</div>
					<!-- /ad -->
					
					<!-- catagories -->
					<div class="aside-widget">
						<div class="section-title">
							<h2>Catagories</h2>
						</div>
						<div class="category-widget">
							<ul>
								<li><a href="#" class="cat-1">Web Design<span>340</span></a></li>
								<li><a href="#" class="cat-2">JavaScript<span>74</span></a></li>
								<li><a href="#" class="cat-4">JQuery<span>41</span></a></li>
								<li><a href="#" class="cat-3">CSS<span>35</span></a></li>
							</ul>
						</div>
					</div>
					<!-- /catagories -->
					
					<!-- tags -->
					<div class="aside-widget">
						<div class="tags-widget">
							<ul>
								<li><a href="#">Chrome</a></li>
								<li><a href="#">CSS</a></li>
								<li><a href="#">Tutorial</a></li>
								<li><a href="#">Backend</a></li>
								<li><a href="#">JQuery</a></li>
								<li><a href="#">Design</a></li>
								<li><a href="#">Development</a></li>
								<li><a href="#">JavaScript</a></li>
								<li><a href="#">Website</a></li>
							</ul>
						</div>
					</div>
					<!-- /tags -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

<?php
// get_sidebar();
get_footer();
