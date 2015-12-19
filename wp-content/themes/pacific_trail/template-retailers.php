<?php
/*
 * Template Name: Retailers
 * Description: Retailers custom layout template
 */
?>

<?php get_header(); ?>

<?php get_template_part( 'partials/banner' ); ?>

<div id="content" class="site-content">
  <div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>

        	<div class="entry-header">
            <?php the_content() ?>
        	</div><!-- .entry-header -->

          <?php $logos = get_field('retailer_logos'); ?>

          <?php if ($logos) : ?>
            <div class="logo-container">
              <ul>
                <?php foreach( $logos as $logo ) : ?>
                  <li><img src="<?php echo $logo['url'] ?>" /></li>
                <?php endforeach ?>
              </ul>
            </div>
          <?php endif ?>
        	
          <div class="cta-container tall">
            <div class="cta retailers" onclick="<?php the_field('photo_box_onclick'); ?>">
              <div class="text-wrapper">
                <h2><?php the_field('photo_box_header'); ?></h2>
                <p><?php the_field('photo_box_lead-in'); ?></p>
              </div>
            </div>
          </div>
			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
