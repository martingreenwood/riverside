<?php
/**
 * Template part for displaying page content in page-contact.php.
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

				<?php $location = get_field('map'); ?>
				<div class="estilo-map">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
				</div>
			
			</div>

			<div class="column">

				<div class="form">
				<h2>Enquiry Form</h2>
				<?php 
					$form_object = get_field('form');
					gravity_form_enqueue_scripts($form_object['id'], true);
					gravity_form($form_object['id'], false, false, false, '', true, 1); 
				?>
				</div>

			</div>

		</div>

	</div>

</article>