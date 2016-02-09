<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package riverside
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="wrapper">
		<div class="row">

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_content(); ?>
			</div><!-- .entry-content -->

		</div>
	</div>

</article><!-- #post-## -->

<?php if (get_field('show_columns')): ?>
<div class="columns">

	<div class="wrapper">
		<div class="row">

			<div class="column">
			<?php the_field('left_content'); ?>
			</div>

			<div class="column">
			<?php the_field('right_content'); ?>
			</div>

		</div>
	</div>

</div>
<?php endif; ?>
