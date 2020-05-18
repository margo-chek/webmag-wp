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



	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">	
				<!-- post динамический // Цикл на основе WP_Query() -->
				<!-- стороим цикл через https://wp-kama.ru/handbook/cheatsheet -->
				<?php		
					global $post; // создается глобальная переменная $post, в нее будут помещаться параметры постов

					$query = new WP_Query( [ // создается переменная $query, куда помещается новый класс WP_Query с разными параметрами-атрибутами
						'posts_per_page' => 2, // вывести 3 поста на странице - если не задать, выведется по умолчанию 5 постов
						'orderby'        => 'title', // сортировать посты по комментариям 'comment_count' или заголовкам 'title'
					] );

					if ( $query->have_posts() ) { // если в $query есть посты, то
						while ( $query->have_posts() ) { // пока в $query есть посты
							$query->the_post(); // мы будем их выводить при помощи функции the_post()
							?>
							<!-- Вывода постов, функции цикла: the_title() и т.д. // как мы будем их выводить, можем тут указать -->
							<!-- например мы используем тег li, в нем выводим с помощью php-разметки the_title() -->
							<!-- the_title() - это функция, которая позволяет вывести заголовок статьи -->
							<!-- post // вставка из index.html -->
							<div class="col-md-6">
								<div class="post post-thumb">
									<a class="post-img" href="<?php the_permalink() ?>"> <!--  the_permalink() выводит ссылку на пост -->
										<?php the_post_thumbnail( 'post-thumb-top-index' ) ?> <!-- the_post_thumbnail() - Выводит html код картинки-миниатюры текущего поста, 'post-thumb' - размер картинки, задан в function.php -->
									</a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-1" href="category.html"> <!-- href="category.html" // the_permalink() -->
												<?php echo get_the_category()[0]->cat_name ?> <!-- get_the_category возвращает массив категорий -->
												<!-- если несколько категорий:
												$all_categories = get_the_category();
												foreach ($all_categories as $category) {
												echo $category->cat_name;
												}  -->
											</a>
											<span class="post-date"><?php the_date('F j, Y') ?></span>
										</div>
										<h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
							<?php 
						}
					} else {
						echo "Постов нет"; // если постов не найдено - по таким параметрам постов нет
					}

					wp_reset_postdata(); // сбрасываем переменную $post
				?>
				<!-- /цикл posts_per_page -->

			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2>Lesson</h2>
					</div>
				</div>
				<!-- lesson -->
				<?php
					global $post;
					$myposts = get_posts( array(
						'post_type'   => 'lesson',
						'numberposts' => 4,
					) );

					if (!empty($myposts)) {
						
						foreach( $myposts as $post ){
							setup_postdata( $post ); 
							?>
							<!-- post -->
								<div class="col-md-6">
									<div class="post">
										<a class="post-img" href="<?php the_permalink() ?>">
											<?php the_post_thumbnail( 'post-thumb-top-index' ) ?>
										</a>
										<div class="post-body">
											<h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
										</div>
									</div>
								</div>
							<!-- /post -->															
						<?php 
						} 				
					} else {
						echo "Уроков нет";
					}
					wp_reset_postdata(); // сбрасываем переменную $post
				?>
				<!-- /lesson -->
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2>Video</h2>
					</div>
				</div>
				<!-- video -->
				<?php
					global $post;
					$myposts = get_posts( array(
						'post_type'   => 'video',
						'numberposts' => 2,
						'genre'       => 'урок',
					) );

					if (!empty($myposts)) {
						
						foreach( $myposts as $post ){
							setup_postdata( $post ); 
							?>
							<!-- post -->
								<div class="col-md-6">
									<div class="post">
										<a class="post-img" href="<?php the_permalink() ?>">
											<?php the_post_thumbnail( 'post-thumb-top-index' ) ?>
										</a>
										<div class="post-body">
											<h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
										</div>
									</div>
								</div>
							<!-- /post -->															
						<?php 
						} 				
					} else {
						echo "Уроков нет";
					}
					wp_reset_postdata(); // сбрасываем переменную $post
				?>
				<!-- /video -->
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2>Recent Posts</h2>
					</div>
				</div>

				<!-- post динамический // Цикл на основе WP_Query() -->
				<?php		
					global $post;

					$query = new WP_Query( [
						'posts_per_page' => 6,
						'orderby'        => 'comment_count',
					] );

					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();
							?>
							<!-- Вывода постов, функции цикла: the_title() и т.д. -->
							<!-- post // вставка из index.html -->
							<div class="col-md-4">
								<div class="post">
									<a class="post-img" href="<?php the_permalink() ?>">
										<?php the_post_thumbnail('post-thumb-index') ?>
									</a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-1" href="category.html">
												<?php echo get_the_category()[0]->cat_name ?>
											</a>
											<span class="post-date"><?php the_date('F j, Y') ?></span>
										</div>
										<h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
									</div>
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
				<!-- /post -->

				<div class="clearfix visible-md visible-lg"></div>  <!-- можно удалить -->

				<!-- Цикл posts на основе get_posts() -->
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
								<div class="col-md-4">
									<div class="post">
										<a class="post-img" href="<?php the_permalink() ?>"><?php the_post_thumbnail('post-thumb-index') ?></a>
										<div class="post-body">
											<div class="post-meta">
											<a class="post-category cat-1" href="category.html">
												<?php echo get_the_category()[0]->cat_name ?>
											</a>
											<span class="post-date"><?php the_date('F j, Y') ?></span>
											</div>
											<h3 class="post-title"><a href="blog-post.html"><?php the_title() ?></a></h3>
										</div>
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
				<!-- /Цикл posts на основе get_posts() -->

			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<!-- post // Цикл на основе query_posts() -->
						<?php
							query_posts('posts_per_page=1');
							if (have_posts()) {
								while (have_posts()) {
									the_post();
									// the_title();
									// the_content();
									?>
										<div class="col-md-12">
											<div class="post post-thumb">
											<a class="post-img" href="<?php the_permalink() ?>"><?php the_post_thumbnail('post-thumb-first') ?></a>
												<div class="post-body">
													<div class="post-meta">
														<a class="post-category cat-1" href="category.html">
															<?php echo get_the_category()[0]->cat_name ?>
														</a>
														<span class="post-date"><?php the_date('F j, Y') ?></span>
													</div>
													<h3 class="post-title"><a href="blog-post.html"><?php the_title() ?></a></h3>
												</div>
											</div>
										</div>
									<?php
								}
							} else echo 'Записей нет';
	
							wp_reset_query(); // сбрасываем глобальные переменные запроса на начальные
						?>
						<!-- /post // Цикл на основе query_posts() -->

						<!-- post // Цикл на основе query_posts() -->
						<?php
							query_posts('posts_per_page=2&order=ASC');
							if (have_posts()) {
								while (have_posts()) {
									the_post();
									// the_title();
									// the_content();
									?>
										<div class="col-md-6">
											<div class="post">
												<a class="post-img" href="<?php the_permalink() ?>"><?php the_post_thumbnail('post-thumb-index') ?></a>
												<div class="post-body">
													<div class="post-meta">
														<a class="post-category cat-1" href="category.html">
															<?php echo get_the_category()[0]->cat_name ?>
														</a>
														<span class="post-date"><?php the_date('F j, Y') ?></span>
													</div>
													<h3 class="post-title"><a href="blog-post.html"><?php the_title() ?></a></h3>
												</div>
											</div>
										</div>
									<?php
								}
							} else echo 'Записей нет';
	
							wp_reset_query(); // сбрасываем глобальные переменные запроса на начальные
						?>
						<!-- /post // Цикл на основе query_posts() -->

						<div class="clearfix visible-md visible-lg"></div>  <!-- можно удалить -->

						<!-- Цикл на основе get_posts() -->
						<?php
							global $post;

							$myposts = get_posts( array(
								'numberposts' => 2,
								// 'offset'=> 1,
							) );

							if (!empty($myposts)) {
								
								foreach( $myposts as $post ){
									setup_postdata( $post ); 

									// стандартный вывод записей?>
									<!-- post // вставка из index.html -->
										<div class="col-md-6">
											<div class="post">
												<a class="post-img" href="<?php the_permalink() ?>"><?php the_post_thumbnail('post-thumb-index') ?></a>
												<div class="post-body">
													<div class="post-meta">
													<a class="post-category cat-1" href="category.html">
														<?php echo get_the_category()[0]->cat_name ?>
													</a>
													<span class="post-date"><?php the_date('F j, Y') ?></span>
													</div>
													<h3 class="post-title"><a href="blog-post.html"><?php the_title() ?></a></h3>
												</div>
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
						<!-- /Цикл posts -->

						<div class="clearfix visible-md visible-lg"></div>  <!-- можно удалить -->

						<!-- Цикл posts на основе get_posts() -->
						<?php
							global $post;

							$myposts = get_posts( array(
								'numberposts' => 2,
								// 'offset'=> 1,
								'order'       => 'ASC',
							) );

							if (!empty($myposts)) {
								
								foreach( $myposts as $post ){
									setup_postdata( $post ); 

									// стандартный вывод записей?>
									<!-- post // вставка из index.html -->
										<div class="col-md-6">
											<div class="post">
												<a class="post-img" href="<?php the_permalink() ?>"><?php the_post_thumbnail('post-thumb-index') ?></a>
												<div class="post-body">
													<div class="post-meta">
														<a class="post-category cat-1" href="category.html">
															<?php echo get_the_category()[0]->cat_name ?>
														</a>
														<span class="post-date"><?php the_date('F j, Y') ?></span>
													</div>
													<h3 class="post-title"><a href="blog-post.html"><?php the_title() ?></a></h3>
												</div>
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
						<!-- /Цикл posts на основе get_posts() -->
 
					</div>
				</div>

				<div class="col-md-4">
					<!-- post widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2>Most Read</h2>
						</div>

						<!-- Цикл на основе get_posts() -->
						<?php
							global $post;

							$myposts = get_posts( array(
								'numberposts' => 4,
								// 'offset'=> 1,
							) );

							if (!empty($myposts)) {
								
								foreach( $myposts as $post ){
									setup_postdata( $post ); 

									// стандартный вывод записей?>
									<!-- post // вставка из index.html -->
										<div class="post post-widget">
											<a class="post-img" href="<?php the_permalink() ?>"><?php the_post_thumbnail('post-widget-thumb') ?></a>
											<div class="post-body">
												<h3 class="post-title"><a href="blog-post.html"><?php the_title() ?></a></h3>
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

					</div>
					<!-- /post widget -->

					<!-- post widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2>Featured Posts</h2>
						</div>

						<!-- Цикл posts widget на основе get_posts() -->
						<?php
							global $post;

							$myposts = get_posts( array(
								'numberposts' => 2,
								// 'offset'=> 1,
								'category'    => 4,
							) );

							if (!empty($myposts)) {
								
								foreach( $myposts as $post ){
									setup_postdata( $post ); 

									// стандартный вывод записей?>
									<!-- post // вставка из index.html -->
										<div class="post post-thumb">
											<a class="post-img" href="<?php the_permalink() ?>"><?php the_post_thumbnail('post-thumb-index') ?></a>
											<div class="post-body">
												<div class="post-meta">
													<a class="post-category cat-1" href="category.html">
														<?php echo get_the_category()[0]->cat_name ?>
													</a>
													<span class="post-date"><?php the_date('F j, Y') ?></span>
												</div>
												<h3 class="post-title"><a href="blog-post.html"><?php the_title() ?></a></h3>
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
						<!-- /Цикл posts widget -->

						<!-- <div class="post post-thumb">
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
						</div> -->
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

				<!-- Цикл posts на основе get_posts() -->
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
								<div class="col-md-4">
									<div class="post">
										<a class="post-img" href="<?php the_permalink() ?>"><?php the_post_thumbnail('post-thumb-index') ?></a>
										<div class="post-body">
											<div class="post-meta">
												<a class="post-category cat-1" href="category.html">
													<?php echo get_the_category()[0]->cat_name ?>
												</a>
												<span class="post-date"><?php the_date('F j, Y') ?></span>
											</div>
											<h3 class="post-title"><a href="blog-post.html"><?php the_title() ?></a></h3>
										</div>
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
				<!-- /Цикл posts на основе get_posts() -->

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

						<!-- Цикл posts на основе get_posts() -->
						<?php
							global $post;

							$myposts = get_posts( array(
								'numberposts' => 4,
								// 'offset'=> 1,
							) );

							if (!empty($myposts)) {
								
								foreach( $myposts as $post ){
									setup_postdata( $post ); 

									// стандартный вывод записей?>
									<!-- post // вставка из index.html -->
										<div class="col-md-12">
											<div class="post post-row">
												<a class="post-img" href="<?php the_permalink() ?>"><?php the_post_thumbnail('post-widget-thumb') ?></a>
												<div class="post-body">
													<div class="post-meta">
														<a class="post-category cat-1" href="category.html">
															<?php echo get_the_category()[0]->cat_name ?>
														</a>
														<span class="post-date"><?php the_date('F j, Y') ?></span>
													</div>
													<h3 class="post-title"><a href="blog-post.html"><?php the_title() ?></a></h3>
													<p><?php the_content() ?></p>
												</div>
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
						<!-- / Цикл posts -->
						
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
							<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/ad-1.jpg" alt="">
						</a>
					</div>
					<!-- /ad -->

					<!-- categories -->
					<?php
						get_sidebar('index'); // можно вызвать тут сайдбар sidebar-index, но у него не будет нужных стилей
						// the_widget('WP_Widget_Categories'); // вызов виджета вне сайдбара
						// dynamic_sidebar( 'sidebar-index' ); // можно сразу тут вызвать после регистрации в function.php - вызов сайдбара просто в определенном месте, например в footere
					?>
					<!-- /categories -->
					
					<!-- categories замененный статический код на любой из блока выше-->
					<!-- <div class="aside-widget">
						<div class="section-title">
							<h2>Categories</h2>
						</div>
						<div class="category-widget">
							<ul>
								<li><a href="#" class="cat-1">Web Design<span>340</span></a></li>
								<li><a href="#" class="cat-2">JavaScript<span>74</span></a></li>
								<li><a href="#" class="cat-4">JQuery<span>41</span></a></li>
								<li><a href="#" class="cat-3">CSS<span>35</span></a></li>
							</ul>
						</div>
					</div> -->
					<!-- /categories -->
					
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
