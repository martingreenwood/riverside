<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package riverside
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="top-footer">

			<div class="wrapper">

				<div class="row">
				
					<div class="weather">
						<?php 
							$weatherkey = file_get_contents("http://api.openweathermap.org/data/2.5/weather?id=2645756&appid=e3db0ccaeae256f11a5dfb6fadf3de49"); 
							$weatherJson = json_decode($weatherkey);

							$weather = $weatherJson->weather[0];
								$type = $weather->main;
								$typeDesc = $weather->description;
								$typeicon = $weather->icon;

									if ($typeicon == "01d"):
										$weatherIcon = "B";
									elseif ($typeicon == "02d"):
										$weatherIcon = "H";
									elseif ($typeicon == "03d" || $typeicon == "03n"):
										$weatherIcon = "N";
									elseif ($typeicon == "04d" || $typeicon == "04n"):
										$weatherIcon = "Y";
									elseif ($typeicon == "09d" || $typeicon == "09n"):
										$weatherIcon = "Q";
									elseif ($typeicon == "10d" || $typeicon == "10n"):
										$weatherIcon = "R";
									elseif ($typeicon == "11d" || $typeicon == "11n"):
										$weatherIcon = "0";
									elseif ($typeicon == "13d" || $typeicon == "13n"):
										$weatherIcon = "W";
									elseif ($typeicon == "50d" || $typeicon == "50n"):
										$weatherIcon = "M";

									elseif ($typeicon == "01n"):
										$weatherIcon = "C";
									elseif ($typeicon == "02n"):
										$weatherIcon = "I";

									else:
										$weatherIcon = ")";

									endif;

							$main = $weatherJson->main;
								$temp = $main->temp; 
								$tempC = floor($temp - "273.15");
							$wind = $weatherJson->wind;
								$windS = $wind->speed;
								$windd = $wind->deg;
							if (isset($weatherJson->rain->{'3h'})) {
								$rain3h = $weatherJson->rain->{'3h'} * 100;
							} else {
								$rain3h = 0;
							}
							$info = $weatherJson->sys;
							$nae = $weatherJson->name;
						?>
						
						<div class="icon <?php echo $typeicon; ?>">
							<i class="weather-icon" data-icon="<?php echo $weatherIcon; ?>"></i>
						</div>
						<h3>Current Weather</h3>
						<p><?php echo $tempC; ?> &deg;C | <?php echo ucwords($typeDesc); ?></p>
						<p><?php echo $rain3h; ?>% chance of perciperation</p>
					</div>

					<div class="contact-info">
						<h3>Contact Us</h3>
						<p><?php the_field('address', 'option'); ?></p>

						<p>
						T.	<span><?php the_field('phone_number', 'option'); ?></span><br>
						F.	<span><?php the_field('fax', 'option'); ?></span><br>
						E.	<span><?php antispambot( the_field('primary_email', 'option') ); ?></span>
						</p>
					</div>

					<div class="rooms">
						<h3>Rooms</h3>
						<ul>
							<?php
							$args = array( 'post_type' => 'rooms', 'posts_per_page' => 10 );
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<li>- <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php endwhile; ?>
						</ul>
					</div>

					<div class="newsletter">
						<h3>Newsletter signup</h3>
						<p>Signup for special offers</p>
						<div id="mc_embed_signup">
							<form action="//riversideescape.us12.list-manage.com/subscribe/post?u=bc71204308f3e60c28e530c80&amp;id=bbe11c8a9c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
								<div id="mc_embed_signup_scroll">
									<div class="mc-field-group">
										<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
									</div>
									<div id="mce-responses" class="clear">
										<div class="response" id="mce-error-response" style="display:none"></div>
										<div class="response" id="mce-success-response" style="display:none"></div>
									</div>
									<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_bc71204308f3e60c28e530c80_bbe11c8a9c" tabindex="-1" value=""></div>
									<div class="clear"><button type="submit" name="subscribe" id="mc-embedded-subscribe" class="button"><i class="fa fa-long-arrow-right"></i></button></div>
								</div>
							</form>
						</div>
					</div>

				</div>

			</div>

		</div>

		<aside class="subfooter">

			<div class="wrapper">

				<div class="row">

					<div class="reviews">
						<a href="http://www.tripadvisor.co.uk/ShowUserReviews-g186327-d4551924-r197815859-Riverside_cottage-Keswick_Lake_District_Cumbria_England.html" class="blue trip"><i class="fa fa-tripadvisor"></i><span>Read Our Reviews</span></a>
					</div>

					<div class="social">
						<ul>
							<li><a href=""><i class="fa fa-twitter"></i></a></li>
							<li><a href=""><i class="fa fa-facebook"></i></a></li>
							<li><a href=""><i class="fa fa-instagram"></i></a></li>
						</ul>
					</div>

					<div class="copyright">
						<p>&copy; Riverside Escape <?php echo date('Y'); ?></p>
					</div>

					<div class="sub-menu">
						<nav id="sub-footer-navigation" class="sub-footer-navigation" role="navigation">
							<?php wp_nav_menu( array( 'theme_location' => 'sub-footer', 'menu_id' => 'sub-footer-menu' ) ); ?> 
						</nav>
					</div>

					<div class="credit">
						<p><a href="http://www.carneand.co.uk" rel="nofollow" target="_blank">Design and Build / Carne &amp; Co</a></p>
					</div>

				</div>

			</div>
			
		</aside>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
