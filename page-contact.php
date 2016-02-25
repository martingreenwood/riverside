<?php
/**
 * The template for displaying the contact page.
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

				<?php get_template_part( 'template-parts/content', 'contact' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

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
