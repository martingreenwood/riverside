<?php
/**
 * Template part for displaying page content in page-our-rooms.php.
 *
 * @package riverside
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
