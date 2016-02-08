<?php
/**
 * The template for displaying our rooms
 *
 * @package riverside
 */

get_header(); ?>

<?php if ( has_post_thumbnail() ): ?>
	<?php $post_thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
	<div id="feature-image" style="background-image: url(<?php echo $post_thumbnail_url[0]; ?>)">
		<div class="table">
			<div class="cell">
				<h2><?php the_post_thumbnail_caption(); ?></h2>
				<h3><?php the_post_thumbnail_description(); ?></h3>
			</div>
		</div>
	</div>
<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main wrapper" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'our-rooms' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<section id="rooms">
		<div class="wrapper">
			<div class="row">

				<?php
				$args = array( 'post_type' => 'rooms', 'posts_per_page' => 10 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
					
					<?php $room_images = get_field('room_gallery');
					if( $room_images ): $c=0; ?>
					<?php foreach( $room_images as $image ): $c++; ?>
					<div class="room" style="background-image: url(<?php echo $image['sizes']['room_overview']; ?>);">	
					<?php if ($c > 0) break; endforeach; else: ?>
					<div class="room">
					<?php endif; ?>
						<div class="content">
							<div class="table">
								<div class="cell">
									<h4>Rooms &amp; Suites</h4>
									<h3><?php the_title(); ?></h3>
									<p><?php the_field('room_intro'); ?></p>
									<a class="more" href="<?php the_permalink(); ?>">Room Details</a>
									<div class="price_avail">
										<h3>FROM £<?php the_field('room_price'); ?></h3>
										<a class="button" href="<?php the_permalink(); ?>#availability">Check Availability</a>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				
				<?php endwhile; ?>

			</div>
		</div>
	</section>

<?php get_footer(); ?>
