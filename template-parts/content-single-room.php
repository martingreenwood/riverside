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
	<a class="button" id="check_availability_button" data-modal-id="popup" href="#">Check Availability</a>
	</div>

</article>

<section id="room-details">

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

					<input class="button" name="commit" type="submit" value="Book Your Stay">

				</div>
				
			</form>
		
		</div>

		<div class="text">
			<?php the_field('content_block_two'); ?>
		</div>

		<div class="extras">

			<div class="amenities">
				<h3>Ammenities</h3>
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
				<h3><?php the_field('booking_text_line_one', 'option'); ?></h3>
				<h4><?php the_field('booking_text_line_one_two', 'option'); ?></h4>
			</div>

		</div>

	</div>
	
</section>


<div id="popup" class="modal-box">  
	<header>
		<a href="#" class="js-modal-close close">×</a>
		<h3>Quick Look Availability</h3>
	</header>
	<div class="modal-body">

		<script id="InnStyle-js" src="http://developer.innstyle.co.uk/calendar.js"></script>
		<script>InnStyle('riversideescape', {
			bookable: <?php the_field('room_id'); ?>,
			policy: 'hide',
			packages: 'hide',
			calender: 'show',
			secret: 'hide',
		});</script>

	</div>
	<footer>
		<a href="#" class="js-modal-close">Close Button</a>
	</footer>
</div>
