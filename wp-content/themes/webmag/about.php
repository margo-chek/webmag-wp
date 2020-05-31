<?php
/*
Template Name: About Us
Template Post Type: page
*/

// … остальной код шаблона

		if (have_posts()) the_post();
		get_header('page'); ?>

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<?php the_content(); ?>
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="section-row">
							<p>Lorem ipsum dolor sit amet, ea eos tibique expetendis, tollit viderer ne nam. No ponderum accommodare eam, purto nominavi cum ea, sit no dolores tractatos. Scripta principes quaerendum ex has, ea mei omnes eruditi. Nec ex nulla mandamus, quot omnesque mel et. Amet habemus ancillae id eum, justo dignissim mei ea, vix ei tantas aliquid. Cu laudem impetus conclusionemque nec, velit erant persius te mel. Ut eum verterem perpetua scribentur.</p>
							<figure class="figure-img">
								<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/about-1.jpg" alt="">
							</figure>
							<p>Vix mollis admodum ei, vis legimus voluptatum ut, vis reprimique efficiendi sadipscing ut. Eam ex animal assueverit consectetuer, et nominati maluisset repudiare nec. Rebum aperiam vis ne, ex summo aliquando dissentiunt vim. Quo ut cibo docendi. Suscipit indoctum ne quo, ne solet offendit hendrerit nec. Case malorum evertitur ei vel.</p>
						</div>
						<div class="row section-row">
							<div class="col-md-6">
								<figure class="figure-img">
									<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/about-2.jpg" alt="">
								</figure>
							</div>
							<div class="col-md-6">
								<h3>Our Mission</h3>
								<p>Id usu mutat debet tempor, fugit omnesque posidonium nec ei. An assum labitur ocurreret qui, eam aliquid ornatus tibique ut.</p>
								<ul class="list-style">
									<li><p>Vix mollis admodum ei, vis legimus voluptatum ut.</p></li>
									<li><p>Cu cum alia vide malis. Vel aliquid facilis adolescens.</p></li>
									<li><p>Laudem rationibus vim id. Te per illum ornatus.</p></li>
								</ul>
							</div>
						</div>
					</div>
					
					<!-- aside -->
					<div class="col-md-4">

						<?php
							get_sidebar('page');
						?>


						<!-- ad -->
						<!-- <div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="<?php //echo get_template_directory_uri(); ?>/img/ad-1.jpg" alt="">
							</a>
						</div> -->
						<!-- /ad -->

						<!-- post widget -->
						<!-- <div class="aside-widget">
							<div class="section-title">
								<h2>Most Read</h2>
							</div> -->

							<?php
								// global $post;

								// $myposts = get_posts( array(
								// 	'numberposts' => 4,
								// 	'offset'=> 0,
								// ) );

								// if (!empty($myposts)) {
									
								// 	foreach( $myposts as $post ){
								// 		setup_postdata( $post ); 

										// стандартный вывод записей?>
										<!-- post // вставка из index.html -->
											<!-- <div class="post post-widget">
												<a class="post-img" href="<?php //the_permalink() ?>"><?php //the_post_thumbnail() ?></a>
												<div class="post-body">
													<h3 class="post-title"><a href="blog-post.html"><?php //the_title() ?></a></h3>
												</div>
											</div> -->
										<!-- /post -->															
									<?php 
								// 	} 
									
								// } else {
								// 	echo "Постов нет";
								// }
				
								// wp_reset_postdata(); // сбрасываем переменную $post
							?>
							<!-- <div class="post post-widget">
								<a class="post-img" href="blog-post.html"><img src="./img/widget-1.jpg" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
								</div>
							</div>

							<div class="post post-widget">
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
						<!-- /post widget -->
					</div>
					<!-- /aside -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
		
		<?php get_footer(); ?>

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
