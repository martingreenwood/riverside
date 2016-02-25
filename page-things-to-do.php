<?php
/**
 * The template for displaying the things to do page.
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

<?php if( have_rows('ttd_blocks') ): ?>
<section id="blocks">
	
	<div class="wrapper">

		<div class="row">
			<?php while ( have_rows('ttd_blocks') ) : the_row(); ?>
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
							<a target="_blank" href="<?php the_sub_field('block_link'); ?>">Read More <i class="fa fa-long-arrow-right"></i></a>
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
					<a class="button" href="<?php the_field('pf_link'); ?>">Book Your Stay</a>
				</div>
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
