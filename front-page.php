<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package riverside
 */

get_header(); ?>

	<div id="slider">
		<div class="slick fade">
		<?php 
		$slider_images = get_field('slider_images');
		if( $slider_images ): 
		$sc=0;
		foreach( $slider_images as $image ): $sc++; ?>
		<div class="slide" style="background-image: url('<?php echo $image['url']; ?>')">
			<div class="top-box">
				<div class="head">
					<?php if ($sc==1): ?>
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/logo-alt.svg'; ?>" width="600px">
					<?php else: ?>
					<h2><?php echo $image['title']; ?></h2>
					<h3><?php echo $image['caption']; ?></h3>
					<?php endif; ?>
				</div>
			</div>
			<span><?php echo $image['alt']; ?></span>
			<p><?php echo $image['description']; ?></p>
			<div class="ovrly"></div>
		</div>
		<?php endforeach; endif; ?>
		</div>
		<div class="arrow bounce"></div>
	</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'homepage' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if( have_rows('blocks') ): ?>
<section id="blocks">
	
	<div class="wrapper">

		<div class="row">
			<?php while ( have_rows('blocks') ) : the_row(); ?>
			<?php $blockImage = get_sub_field('block_image'); ?>
			<div class="block">

				<div class="img column" style="background-image: url(<?php echo $blockImage['url']; ?>)">
				</div>

				<div class="text column">

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


<section id="book" style="background-image: url(<?php the_field('pf_bg_image'); ?>)">

	<div class="wrapper">

		<div class="row">

			<div class="table">
				<div class="cell">
					<?php the_field('pf_content'); ?>
					<a class="button" href="<?php the_field('pf_link'); ?>">Book Your Stay</a>
				</div>
			</div>

		</div>

	</div>

</section>

<?php get_footer(); ?>
