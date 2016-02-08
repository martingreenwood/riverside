<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package riverside
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>

	<div class="entry-content">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php the_content(); ?>
	</div>

	<div class="from-price">
		<h2>From £<?php the_field('room_price'); ?></h2>
		<?php the_field('content_block_one'); ?>
	</div>

	<div class="special-package">
	<h2><?php the_field('sp_title'); ?></h2>
	<h3><?php the_field('sp_text'); ?></h3>
	<a class="button" href="#availability">Check Availability</a>
	</div>

</article>

<section id="extra">

	<div class="column">
		<div class="slick">
			<?php $room_images = get_field('room_gallery');
			if( $room_images ): ?>
			<?php foreach( $room_images as $image ): ?>
			<div>
				<img src="<?php echo $image['sizes']['room_slide']; ?>" alt="">
			</div>
			<?php endforeach;
			endif; ?>
		</div>
	</div>

	<div class="column">



		<div id="availability">

			<!--<script id="InnStyle-js" src="http://developer.innstyle.co.uk/calendar.js"></script>
			<script>InnStyle('riversideescape', {
				bookable: 11571,
				color: 'light',
				policy: 'hide',
				calendar: 'show',
				packages: 'show',
				datepicker: 'only'
			});</script>-->

			<form accept-charset="UTF-8" target="_blank" method="GET" action="https://riversideescape.innstyle.co.uk/enquiry">
				
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
						<option value="3">3</option>
						<option value="4">4</option>
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

		<div class="text">
			<?php the_field('content_block_two'); ?>
		</div>

		<div class="extras">

			<div class="amenities">
				<ul>
					<?php
					if( have_rows('room_amenities') ):
					while ( have_rows('room_amenities') ) : the_row(); ?>
					<li><?php the_sub_field('room_amenity'); ?></li>
					<?php endwhile;
					endif;
					?>
				</ul>
			</div>

			<div class="tripadvisor">

				<i class="fa fa-tripadvisor"></i>
				<div class="review review_<?php the_field('review_rating'); ?>"></div>
				<h3><?php the_field('review_text'); ?></h3>
				<p><?php the_field('reviewer_info'); ?></p>

			</div>

			<div class="assistance">
				<h3>Need to Speak to Someone?</h3>
				<h4>Book your stay over the phone by calling <?php the_field('phone_number', 'option'); ?></h4>
			</div>

		</div>

	</div>
	
</section>