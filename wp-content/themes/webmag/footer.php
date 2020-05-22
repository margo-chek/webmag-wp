<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Webmag
 */

?>

	<!-- Footer  // из index.html -->
	<footer id="footer">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-5">
					<div class="footer-widget">
						<div class="footer-logo">
							<a href="index.html" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt=""></a>
						</div>
						<?php wp_nav_menu( [
							'theme_location'  => 'policy-footer-menu',
							'container'       => 'false',
							'menu_class'      => 'footer-nav',
						] ) ?>
						<!-- <ul class="footer-nav">  // было статическое меню в html
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Advertisement</a></li>
						</ul> -->
						<div class="footer-copyright">
							<span>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>

							<?php echo do_shortcode( '[email]' ); ?>
							<!-- do_shortcode(1параметр, 2параметр) просматривает текст на наличие в нем шорткодов и применяет зарегистрированные функции к найденным шорткодам. 
							Функция обработает только шорткоды, о которых WP знает, которые зарегистрированы как шорткоды с помощью функции add_shortcode() 
							1-ый параметр: '[email]' - текст в котором нужно преобразовать шорткоды
							2-ой параметр: true, то шорткоды внутри HTML обработаны не будут, по умолчанию: false  -->

						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="row">
						<div class="col-md-6">
							<div class="footer-widget">
								<h3 class="footer-title">About Us</h3>
								<?php wp_nav_menu( [
									'theme_location'  => 'about-us-footer-menu',
									'container'       => 'false',
									'menu_class'      => 'footer-links',
								] ) ?>
								<!-- <ul class="footer-links">  // было статическое меню в html
									<li><a href="about.html">About Us</a></li>
									<li><a href="#">Join Us</a></li>
									<li><a href="contact.html">Contacts</a></li>
								</ul> -->
							</div>
						</div>
						<div class="col-md-6">
							<div class="footer-widget">
								<h3 class="footer-title">Catagories</h3>
								<ul class="footer-links">
									<li><a href="category.html">Web Design</a></li>
									<li><a href="category.html">JavaScript</a></li>
									<li><a href="category.html">Css</a></li>
									<li><a href="category.html">Jquery</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Join our Newsletter</h3>
						<div class="footer-newsletter">
							<!-- <form> -->
								<?php echo do_shortcode('[contact-form-7 id="175" title="Newsletter"]') ?>
							<!-- </form> -->
						</div>
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
					</div>
				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /Footer -->

	<!-- <footer id="colophon" class="site-footer"> // старый footer удаляем
		<div class="site-info">
			<a href=" 
			.............
		</div>
	</footer> -->
	
</div><!-- #page -->

<?php wp_footer(); ?> <!--  это "дырка" для WP для динамического подключения стилей и скриптов указаных в functions.php -->

</body>
</html>
