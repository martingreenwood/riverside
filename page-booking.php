<?php
/**
 * The template for displaying the about page.
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
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<section id="booking">

	<div class="wrapper">
		
		<div class="row">


		<div id="availability">

			<form accept-charset="UTF-8" target="_blank" method="GET" action="https://riversideescape.innstyle.co.uk/enquiry">
				
				<input type="text" hidden="hidden" id="room_id" value="<?php the_field('room_id'); ?>" name="room_id">

				<div class="row">
					<p>
						<label for="start_date">Arrive</label>
						<input type="text" id="start_date" name="start_date" class="form-control date-picker">
					</p>
					<p>
						<label for="departure_date">Depart</label>
						<input type="text" id="departure_date" name="departure_date" class="form-control date-picker">
					</p>
				</div>

				<div class="row">
					
					<div class="select">
					<label>Adults</label>
					<select class="form-control" id="occupancy_adults" name="occupancy[adults]">
						<option value="2">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
					</select>
					</div>

				</div>

				<div class="row">
					<input id="bo" name="bo" type="hidden" value="1886">
					<input name="utf8" type="hidden" value="✓">

					<input class="button" name="commit" type="submit" value="Check Availability">

				</div>
				
			</form>
		
		</div>

		</div>
	</div>
	
</section>

<?php if(get_field('show_bottom_block')): ?>
<section id="extra">
	
	<div class="wrapper">
		
		<div class="row">

			<header class="heading">
				<h2><?php the_field('additional_header'); ?></h2>
			</header>

			<div class="pagelinks">

				<div class="link">
					<h2><?php the_field('plo_heading'); ?></h2>
					<a href="<?php the_field('plo_link'); ?>"><?php the_field('plo_text'); ?></a>
				</div>

				<div class="link">
					<h2><?php the_field('plt_heading'); ?></h2>
					<a href="<?php the_field('plt_link'); ?>"><?php the_field('plt_text'); ?></a>
				</div>

			</div>
			
		</div>

	</div>

</section>
<?php endif; ?>

<?php get_footer(); ?>
