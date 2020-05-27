<?php
/*
Template Name: Contacts
Template Post Type: page
*/

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
					<div class="col-md-6">
						<div class="section-row">

							<?php
								while ( have_posts() ) :
									the_post();
									the_comment(); ?>

									<h3><?php the_title() ?></h3>
									<p><?php the_content() ?></p>

								<?php
								endwhile; // End of the loop.
							?>
 
 							<ul class="list-style">
								<li><p><strong>Email:</strong> <a href="#">Webmag@email.com</a></p></li>
								<li><p><strong>Phone:</strong> 213-520-7376</p></li>
								<li><p><strong>Address:</strong> 3770 Oliver Street</p></li>
							</ul>
 						</div>
					</div>
					<div class="col-md-5 col-md-offset-1">
						<div class="section-row">
							<h3>Send A Message</h3>

							<!-- form -->
							<?php
								// echo do_shortcode( '[contact-form-7 id="195" title="ContactPage"]' );
								// echo do_shortcode( '[ninja_form id=3]' );
							?>

							<!-- именно в файле admin-ajax.php находится обработчик ajax-запросов -->
							<!-- форму заполнять может как обычный пользователь, так и администратор, но обработчик все равно будет admin-ajax.php -->
							<!-- назовем нашу функцию send_mail, т.е. мы при помощи GET-запроса к ней указываем ее в action -->
							<!-- send_mail - это название той функции, которая должна располагаться в function.php, которая будет срабатывать,
								когда мы отправяем ajax-запрос по admin_url в файл admin-ajax.php -->
							<!-- атрибут action заносится автоматически в переменную action в файл main.js, и как только мы отправляем нашу форму
								form.on('submit', ) подставляется url с admin-ajax.php с GET-запросом с названием нашей функции send_mail -->
							<form name="contactForm" id="contactForm" method="post" action="<?php echo admin_url( 'admin-ajax.php?action=send_mail' ) ?>">

								<div class="row">
									<div class="col-md-7">
										<?php the_field('address'); ?>
									</div>
									<div class="col-md-7">
										<div class="form-group">
											<span>Name</span><span class="required">*</span>
											<input class="input" type="text" name="contactName" id="contactName" size="35" value="" />
										</div>
									</div>
									<div class="col-md-7">
										<div class="form-group">
											<span>Email</span><span class="required">*</span>
											<input class="input" type="email" name="contactEmail" id="contactEmail" size="35" value="" />
										</div>
									</div>
									<div class="col-md-7">
										<div class="form-group">
											<span>Subject</span>
											<input class="input" type="text" name="contactSubject" id="contactSubject" size="35" value="" />
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="input" name="contactMessage" id="contactMessage" placeholder="Message"></textarea>
										</div>
										<button class="primary-button">Submit</button>
									</div>
								</div>
							</form>
							<!-- /form -->
						</div>
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
