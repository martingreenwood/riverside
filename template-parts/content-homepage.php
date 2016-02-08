<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package riverside
 */

?>

<div id="slider">
	<?php 
	$slider_images = get_field('slider_images');
	if( $slider_images ): 
	$sc=0;
	foreach( $slider_images as $image ): $sc++; ?>
	<div class="slide" style="background-image: url('<?php echo $image['url']; ?>')">
		<div class="top-box">
			<div class="head">
				<?php if ($sc==1): ?>
				<img src="<?php echo get_stylesheet_directory_uri() . '/assets/logo-alt.svg'; ?>" width="200px">
				<?php endif; ?>
				<h2><?php echo $image['title']; ?></h2>
				<h3><?php echo $image['caption']; ?></h3>
			</div>
		</div>
		<p><?php echo $image['description']; ?></p>
		<div class="ovrly"></div>
	</div>
	<?php endforeach; endif; ?>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<div class="row">
			<?php the_content(); ?>

			<div class="left">
				<?php the_field('left_content'); ?>	
			</div>
			<div class="right">
				<?php the_field('right_content'); ?>	
			</div>
		</div>
	</div>

</article>

<?php if( have_rows('blocks') ): ?>
<section id="blocks">
	
	<div class="wrapper">

		<div class="row">
			<?php while ( have_rows('blocks') ) : the_row(); ?>
			<?php $blockImage = get_sub_field('block_image'); ?>
			<div class="block" style="background-image: url(<?php echo $blockImage['url']; ?>)">

				<div class="text">

					<div class="table">
						<div class="cell">
							<span><?php the_sub_field('block_title'); ?></span>
							<h3><?php the_sub_field('block_heading'); ?></h3>
							<p><?php the_sub_field('block_text'); ?></p>
							<a href="<?php the_sub_field('block_link'); ?>">Read More <i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>

				</div>

			</div>
			<?php endwhile; ?>
		</div>

	</div>

</section>
<?php endif; ?>

<section id="book" style="background-image: url(<?php the_field('pf_bg_image'); ?>)">

	<div class="wrapper">

		<div class="row">

			<div class="table">
				<div class="cell">
					<?php the_field('pf_content'); ?>
					<a class="button" href="#book">Book Your Stay</a>
				</div>
			</div>

		</div>

	</div>

</section>