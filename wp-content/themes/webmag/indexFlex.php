		<?php get_header(); ?>

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="post-container">

				<?php		
global $post;

$query = new WP_Query( [
	'posts_per_page' => 2,
	'orderby'        => 'title',
] );

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		?>
					<!-- post -->

						<div class="post post-thumb two-posts">
							<a class="post-img" href=<?php the_permalink();?>>
							<?php the_post_thumbnail('preview-middle');?>
							</a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-item-<?php echo get_the_category()[0] -> term_id;?>" href=<?php the_permalink();?>><?php echo get_the_category()[0] -> cat_name;?></a>
									<span class="post-date"><?php the_time('F j, Y');?></span>
								</div>
								<h3 class="post-title"><a href=<?php the_permalink();?>><?php the_title();?></a></h3>
							</div>
						</div>
					<!-- /post -->
								<?php 
							}
						} else {
							echo "Постов нет";
						}

						wp_reset_postdata(); // Сбрасываем $post
						?>
	</div>


				<!-- row -->
				<div class="post-container">
						<div class="section-title">
							<h2>Recent Posts</h2>
						</div>
				</div>

				<div class="post-container">
					<?php	
						$posts = get_posts( array(
							'numberposts' => 6,
							'category'    => 0,
							'orderby'     => 'date',
							) );
							
						foreach( $posts as $post ){
							setup_postdata($post);  ?>
				<!-- post -->
							
						<div class="post three-posts">
							<a class="post-img" href=<?php the_permalink();?>>
							<?php the_post_thumbnail('preview-small');?>
						</a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-item-<?php echo get_the_category()[0] -> term_id;?>" href=<?php the_permalink();?>><?php echo get_the_category()[0] -> cat_name;?></a>
									<span class="post-date"><?php the_time('F j, Y');?></span>
								</div>
								<h3 class="post-title"><a href=<?php the_permalink();?>><?php the_title();?></a></h3>
							</div>
						</div>
					<!-- /post -->				
						<?php
						}	
						wp_reset_postdata(); ?>
					</div>
				</div>
				<!-- container -->


			<div class="container">
				<div class="post-container">
					<div class="post-container-left">
									
						<?php	
						$posts = get_posts( array(
							'numberposts' => 7,
							'orderby'     => 'rand',
							) );
							$checker = $posts[0];
						
						foreach( $posts as $post ){
							setup_postdata($post);
							if ($checker) { ?>

								<div class="post post-thumb ">
									<a class="post-img" href="<?php the_permalink();?>">
									<?php the_post_thumbnail('preview-large');?>
								</a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-item-<?php echo get_the_category()[0] -> term_id;?>" href=<?php the_permalink();?>><?php echo get_the_category()[0] -> cat_name;?></a>
											<span class="post-date"><?php the_time('F j, Y');?></span>
										</div>
										<h3 class="post-title"><a href=<?php the_permalink();?>><?php the_title();?></a></h3>
									</div>
								</div>

							<?php 
							$checker = false;				
						} /* end if */ else { ?>

									<div class="post two-posts">
											<a class="post-img" href="<?php the_permalink();?>">
												<?php the_post_thumbnail('preview-small');?>
											</a>
												<div class="post-body">
													<div class="post-meta">
														<a class="post-category cat-item-<?php echo get_the_category()[0] -> term_id;?>" href=<?php the_permalink();?>><?php echo get_the_category()[0] -> cat_name;?></a>
														<span class="post-date"><?php the_time('F j, Y');?></span>
													</div>
													<h3 class="post-title"><a href=<?php the_permalink();?>><?php the_title();?></a></h3>
												</div>
											</div>
										<?php } /* end if */
							} /* end loop */
							wp_reset_postdata(); ?>
					
					</div>					
					
					<div class="post-container-right">

							<div class="section-title">
								<h2>Most Read</h2>
							</div>

							<div class="post-container post-container_column">
										<?php	
									$posts = get_posts( array(
										'numberposts' => 4,
										'category'    => 0,
										'orderby'     => 'date',
										) );

									foreach( $posts as $post ){
										setup_postdata($post);  ?>

										<div class="post post-widget">
											<a class="post-img" href=<?php the_permalink();?>>
											<?php the_post_thumbnail('widget-thumb');?>
											</a>
											<div class="post-body">
												<h3 class="post-title">
													<a href=<?php the_permalink();?>><?php the_title();?></a>
												</h3>
											</div>
										</div>
										
										<?php 
										}
										wp_reset_postdata(); // Сбрасываем $post
										?>
					</div>

						<!-- post widget -->
							
						<? 
						get_sidebar('featured');
						?>



							<!-- ad -->
							<div class="aside-widget text-center">
								<a href="#" style="display: inline-block;margin: auto;">
									<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/img/ad-1.jpg">
								</a>
							</div>
							<!-- /ad -->
					
					</div>	
				</div>	
			</div>	
		</div>	

		<!-- section -->
		<div class="section section-grey">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="post-container">
						<div class="section-title text-center">
							<h2>Featured Posts</h2>
						</div>
				</div>	

				<div class="post-container">
					<?php	
						$posts = get_posts( array(
							'numberposts' => 3,
							'category'    => 0,
							'orderby'     => 'date',
							) );

						foreach( $posts as $post ){
							setup_postdata($post);  ?>
					<!-- post -->
						<div class="post three-posts">
							<a class="post-img" href=<?php the_permalink();?>>
							<?php the_post_thumbnail('preview-small');?>
						</a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-item-<?php echo get_the_category()[0] -> term_id;?>" href=<?php the_permalink();?>><?php echo get_the_category()[0] -> cat_name;?></a>
									<span class="post-date"><?php the_time('F j, Y');?></span>
								</div>
								<h3 class="post-title"><a href=<?php the_permalink();?>><?php the_title();?></a></h3>
							</div>
						</div>
						<!-- /post -->
					
					<?php 
							}
							wp_reset_postdata(); // Сбрасываем $post
					?>
				</div>
			</div>
		</div>
		<!-- /section -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
					<div class="post-container">
						<div class="post-container-left">

							<div class="post-container">
								<div class="section-title">
									<h2>Most Read</h2>
								</div>
							</div>
							
							<div class="post-container post-container_column">
										<?php	
											$posts = get_posts( array(
												'numberposts' => 4,
												'category'    => 0,
												'orderby'     => 'date',
												) );

											foreach( $posts as $post ){
												setup_postdata($post);  ?>
												<!-- post -->
													<div class="post post-row">
														<a class="post-img" href=<?php the_permalink();?>>
														<?php the_post_thumbnail('preview-small');?>
													</a>
														<div class="post-body">
															<div class="post-meta">
																<a class="post-category cat-item-<?php echo get_the_category()[0] -> term_id;?>" href=<?php the_permalink();?>><?php echo get_the_category()[0] -> cat_name;?></a>
																<span class="post-date"><?php the_time('F j, Y');?></span>
															</div>
															<h3 class="post-title"><a href=<?php the_permalink();?>><?php the_title();?></a></h3>
															<p><?php the_truncated_post( 150 ); ?></p>
														</div>
													</div>
												
												<!-- /post -->
										<?php 
												}
												wp_reset_postdata(); // Сбрасываем $post
										?>
								</div>
						
								<div class="post-container">
									<div class="section-row">
										<button class="primary-button center-block">Load More</button>
									</div>
							</div>

							<div class="post-container post-container_column">
										<?php	
											$posts = get_posts( array(
												'post_type'   => 'lessons',
												'numberposts' => 4,
												'orderby'     => 'title',
												'order'       => 'ASC'
												) );

											foreach( $posts as $post ){
												setup_postdata($post);  ?>
												<!-- post -->
													<div class="post post-row">
														<a class="post-img" href=<?php the_permalink();?>>
														<?php the_post_thumbnail('preview-small');?>
													</a>
														<div class="post-body">
															<div class="post-meta">
															
															
															</div>
															<h3 class="post-title"><a href=<?php the_permalink();?>><?php the_title();?></a></h3>
															<p><?php the_truncated_post( 150 ); ?></p>
														</div>
													</div>
												
												<!-- /post -->
										<?php 
												}
												wp_reset_postdata(); // Сбрасываем $post
										?>
								</div>



						</div>

						<div class="post-container-right">
						
						<!-- ad -->
						<div class="aside-widget">
							<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/img/ad-1.jpg">
							</a>
						</div>
						<!-- /ad -->
					


						<?php the_widget( 'WP_Widget_Categories', 'title=Catagories' ); ?>



						
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
		
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
						</div>
					</div>	
		<?php get_footer(); ?>