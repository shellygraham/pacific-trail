<?php
/*
 * Template Name: Homepage
 * Description: Homepage custom layout template
 */
?>

<?php get_header(); ?>

<?php get_template_part( 'partials/banner' ); ?>

<div id="content" class="site-content">
  <div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

        	<div class="entry-header">
            <img class="entry-header-img" src="<?php bloginfo('template_directory')?>/images/pacifictrail-gradient.png" alt="Pacific Trail logo mark" />

          	<?php the_content() ?>
        		
        		<?php if ( 'post' == get_post_type() ) : ?>
        		<div class="entry-meta">
        			<?php base_s_posted_on(); ?>
        		</div><!-- .entry-meta -->
        		<?php endif; ?>
        	</div><!-- .entry-header -->

          <div class="entry-content">
            <?php get_template_part( 'partials/product-carousels' ); ?>
          </div><!-- .entry-content -->

          <div class="secondary-hero">
            <img src="<?php the_field('secondary_image'); ?>" />
          </div>
          <div class="secondary-header">
            <?php the_field('secondary_copy'); ?>
          </div>

          <div class="cta-container">
            <div class="cta half find-retailer" onclick="window.location='<?php the_field('button_1_linked_page'); ?>'">
              <div class="text-wrapper">
                <h2><?php the_field('button_1_text'); ?></h2>
              </div>
            </div>
            <div class="cta half get-pacific-trail" onclick="<?php the_field('button_2_onclick'); ?>">
              <div class="text-wrapper">
                <h2><?php the_field('button_2_text'); ?></h2>
              </div>
            </div>
          </div>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
  
<?php get_footer(); ?>
