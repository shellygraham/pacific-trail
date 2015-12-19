<?php
/**
 * Harmonic Northwest Underscores Base Theme functions and definitions
 *
 * @package Harmonic Northwest Underscores Base Theme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'base_s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function base_s_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Harmonic Northwest Underscores Base Theme, use a find and replace
	 * to change 'base_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'base_s', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'base_s' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'base_s_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // base_s_setup
add_action( 'after_setup_theme', 'base_s_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
// function base_s_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => __( 'Sidebar', 'base_s' ),
// 		'id'            => 'sidebar-1',
// 		'description'   => '',
// 		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</aside>',
// 		'before_title'  => '<h1 class="widget-title">',
// 		'after_title'   => '</h1>',
// 	) );
// }
// add_action( 'widgets_init', 'base_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
/*
function base_s_scripts() {
	wp_enqueue_style( 'base_s-style', get_stylesheet_uri() );

	wp_enqueue_script( 'base_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'base_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'base_s_scripts' );
*/

function base_s_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'custom_plugins', get_template_directory_uri() . '/assets/js/plugins.min.js', array('jquery'), NULL, true );
	//wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/bower_components/bootstrap/dist/js/bootstrap.min.js', NULL);
	wp_enqueue_script( 'custom_scripts', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery', 'custom_plugins'), NULL );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function base_s_styles() {
	//wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bower_components/bootstrap/dist/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/bower_components/components-font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'foundation-icons', get_template_directory_uri() . '/fonts/foundation-icons.css' );
	wp_enqueue_style( 'owl-styles', get_template_directory_uri() . '/assets/bower_components/owlcarousel/owl-carousel/owl.carousel.css' );
	wp_enqueue_style( 'owl-base-theme', get_template_directory_uri() . '/assets/bower_components/owlcarousel/owl-carousel/owl.theme.css', array('owl-styles'));
	wp_enqueue_style( 'mmenu', get_template_directory_uri() . '/assets/bower_components/jQuery.mmenu/dist/core/css/jquery.mmenu.all.css', array(), false, 'screen');
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/styles/build/main.css', array(), false, 'screen');
	wp_enqueue_style( 'print-styles', get_template_directory_uri() . '/assets/styles/build/print.css', array(), false, 'print');
}

// Enqueue styles and scripts
add_action( 'wp_enqueue_scripts', 'base_s_styles' );
add_action( 'wp_enqueue_scripts', 'base_s_scripts' );

/**
 * Create custom post types.
 */

function custom_post_types() {
	$article_args = array(
		'labels' => label_array_maker('Product Carousel', 'Product Carousels', 'product_carousel'),
		'supports' => array(
			'title',
			//'editor',
			'revisions',
			//'thumbnail',
			'page-attributes',
			//'excerpt'
		),
		'capability_type' => 'post',
		'hierarchical' => false,
		'public' => false,
		'query_var' => 'product_carousel',
		'show_ui' => true,
		'rewrite' => true,
		'exclude_from_search' => false,
		'taxonomies' => array('tag'),
		'menu_icon' => 'dashicons-images-alt2'
	);
	register_post_type( 'product_carousel', $article_args );
}
add_action( 'init', 'custom_post_types');



/* ============================================
  WHIP OUT A CUSTOM POST TYPE'S LABEL ARRAY LIKE IT'S NO BIG DEAL
============================================ */

function label_array_maker($sing='Post', $plur='Posts', $type=NULL) {
	if (!$type) {$type = strtolower($sing);}
	$labels = array(
		'name' => __( $plur ), // option to show in menu
		'singular_name' => __( $sing ),
		'add_new_item' => __( 'Add New ' . $sing ),
		'edit_item' => __( 'Edit ' . $sing ),
		'new_item' => __( 'New ' . $sing ),
		'view' => __( 'View ' . $sing ),
		'view_item' => __( 'View ' . $sing ),
		'search_items' => __( 'Search ' . $plur ),
		'not_found' => __( "No " . $plur . " found - <a href='" . get_bloginfo('url') . "/wp-admin/post-new.php?post_type=" . $type . "' style='font-style: italic;'>create one</a>" ),
		'not_found_in_trash' => __( 'No ' . $plur . ' found in Trash' ),
		'parent' => __( 'Parent ' . $sing ),
	);
	return($labels);
}

// Register custom navigation walker
require_once('wp_bootstrap_navwalker.php');

//Get Featured Image URL 
function wp_get_thumbnail_url($id){
	if(has_post_thumbnail($id)){
		$imgArray = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'single-post-thumbnail' );
		$imgURL = $imgArray[0];
		return $imgURL;
	}else{
		return false;	
	}
}

//****** FUNCTIONS TO MODIFY WOOCOMMERCE THEME ******

//Add sidebar before woocommerce archive content
add_action('woocommerce_before_main_content', 'add_archive_left_sidebar');

function add_archive_left_sidebar() {
	echo '<article class="main-woo-content">';
	if ( is_product_category() ) : ?>
		<?php get_sidebar('product-category') ?>
	<?php else : ?>
		<div class="back-wrapper"><a class="back" href="javascript:history.back()">back</a></div>
	<?php endif;
}

add_action('woocommerce_after_main_content', 'custom_after_main_content');

function custom_after_main_content(){
	echo '</article>';
}

// Custom Product Archive Display

if ( ! function_exists( 'woocommerce_show_archive_images' ) ) {

	/**
	 * Output the product image before the archive products display.
	 *
	 * @subpackage	Product
	 */
	function woocommerce_show_archive_images() {
		wc_get_template( 'single-product/archive-image.php' );
	}
}

// Custom WooCommerce hooks

// add_action( 'pacifictrail_before_shop_loop_item_title', 'woocommerce_show_archive_images', 10 );

add_action( 'pacifictrail_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'pacifictrail_single_product_summary', 'woocommerce_template_single_meta', 20 );
add_action( 'pacifictrail_single_product_summary', 'woocommerce_template_single_add_to_cart', 10 );
add_action( 'pacifictrail_single_product_summary', 'woocommerce_template_single_excerpt', 40 );

add_action( 'pacifictrail_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
//add_action( 'pacifictrail_after_single_product_summary', 'woocommerce_upsell_display', 15 );
//add_action( 'pacifictrail_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// Get Category images for archive pages
function woocommerce_category_image() {
    global $wp_query;
    $cat = $wp_query->get_queried_object();
    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
    $image = wp_get_attachment_url( $thumbnail_id );
    if ( $image ) {
	    return $image;
	}
}

// Add options page for ACF
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

// Declare gravity forms support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Split gravity forms into columns when a section is found
function gform_column_splits($content, $field, $value, $lead_id, $form_id) {
	if(!IS_ADMIN) { // only perform on the front end

		// target section breaks
		if($field['type'] == 'section') {
			$form = RGFormsModel::get_form_meta($form_id, true);

			// check for the presence of multi-column form classes
			$form_class = explode(' ', $form['cssClass']);
			$form_class_matches = array_intersect($form_class, array('two-column', 'three-column'));

			// check for the presence of section break column classes
			$field_class = explode(' ', $field['cssClass']);
			$field_class_matches = array_intersect($field_class, array('gform_column'));

			// if field is a column break in a multi-column form, perform the list split
			if(!empty($form_class_matches) && !empty($field_class_matches)) { // make sure to target only multi-column forms

				// retrieve the form's field list classes for consistency
				$form = RGFormsModel::add_default_properties($form);
				$description_class = rgar($form, 'descriptionPlacement') == 'above' ? 'description_above' : 'description_below';
				//var_dump($field);

				// close current field's li and ul and begin a new list with the same form field list classes
				return '</li></ul><ul class="gform_fields '.$form['labelPlacement'].' '.$description_class.' '.$field['cssClass'].'"><li class="gfield gsection empty gsection-header"><h1>' . $field['label'] . '</h1>';

			}
		}
	}

	return $content;
}
add_filter('gform_field_content', 'gform_column_splits', 10, 5);

// Set gravity forms default validation message
add_filter( 'gform_validation_message', 'change_message', 10, 2 );
function change_message( $message, $form ) {
    return '<div class="validation_error">There was a problem with your submission. Please fill in all required fields and resolve any errors noted below.</div>';
}

// Determine the topmost parent of a term
function get_term_top_most_parent($term_id, $taxonomy){
    // start from the current term
    $parent  = get_term_by( 'id', $term_id, $taxonomy);
    // climb up the hierarchy until we reach a term with parent = '0'
    while ($parent->parent != '0'){
        $term_id = $parent->parent;

        $parent  = get_term_by( 'id', $term_id, $taxonomy);
    }
    return $parent;
}

?>