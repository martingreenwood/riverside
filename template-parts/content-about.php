<?php
/**
 * Template part for displaying page content in page-about.php.
 *
 * @package riverside
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="wrapper">
		
		<div class="row">
		
			<div class="column">

				<div class="entry-content">
					<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
					<?php the_content(); ?>
				</div>

				<div class="slick">
					<?php $feature_gallery = get_field('feature_gallery');
					if( $feature_gallery ): ?>
					<?php foreach( $feature_gallery as $image ): ?>
					<div>
						<img src="<?php echo $image['sizes']['room_slide']; ?>" alt="">
					</div>
					<?php endforeach;
					endif; ?>
				</div>
			
			</div>

			<div class="column">

				<div class="story">
					<h2><?php the_field('second_column_heading'); ?></h2>
					<?php the_field('second_column_content'); ?>
				</div>

				<div class="assistance">
					<h3>Need to Speak to Someone?</h3>
					<h4>Book your stay over the phone by calling <?php the_field('phone_number', 'option'); ?></h4>
				</div>

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
			</div>

		</div>

	</div>

</article>