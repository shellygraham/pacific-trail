<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Harmonic Northwest Underscores Base Theme
 */
?>

  </div><!-- #content (or .site-content for products) --> 

  <footer id="colophon" class="site-footer" role="contentinfo">
    <a href="<?php bloginfo( 'url') ?>"><img class="logo" src="<?php bloginfo('template_directory')?>/images/pacifictrail-text-white.png" alt="Pacific Trail" /></a>

    <?php // get_template_part( 'partials/social-icons' ) ?>

    <?php
      wp_nav_menu(array(
        'container_class' => 'menu-footer-container',
        'theme_location' => 'primary'
      ));
    ?>

  	<div class="site-info">
  		<span>&copy; <?php echo date('Y'); ?></span>
  		<span class="sep"> <?php bloginfo('name')?></span>
  	</div><!-- .site-info -->
  </footer><!-- #colophon -->

  <?php wp_footer(); ?>

</div><!-- end page-wrapper -->

</body>
</html>
