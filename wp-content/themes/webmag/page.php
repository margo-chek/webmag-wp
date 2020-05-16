<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Webmag
 */

get_header('page');
?>
	<!-- section -->
	<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">

						<?php
							while ( have_posts() ) :
								the_post();
								the_comment();

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
						?>
 
					</div>
					<!-- aside -->
					<div class="col-md-4">
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/ad-1.jpg" alt="">
							</a>
						</div>
						<!-- /ad -->

						<!-- widgets -->
						<?php // get_template_part( 'template-parts/ad-300*250' ); ?>
						<?php get_sidebar( 'page' ); ?>
						<!-- /widgets -->
					</div>
					<!-- /aside -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

<?php
get_sidebar();
get_footer();
