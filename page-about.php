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

				<?php get_template_part( 'template-parts/content', 'about' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
