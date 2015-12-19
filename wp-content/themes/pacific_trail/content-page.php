<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Harmonic Northwest Underscores Base Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'base_s' ),
				'after'  => '</div>',
			) );
		?>
		<?php get_template_part('partials/product-carousel') ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
