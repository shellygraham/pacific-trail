<?php
	$curr_term_id = get_queried_object()->term_id;
	$curr_top_cat_term = get_term_top_most_parent( $curr_term_id, 'product_cat' );
	$curr_top_cat_name = $curr_top_cat_term->name;
	$curr_top_cat_id = $curr_top_cat_term->term_id;

	$args = array(
		'hide_empty' => $hide_empty,
		'parent' => $curr_top_cat_id
	);

	$product_categories = get_terms( 'product_cat', $args );
?>

<div class="sidebar">
	<span class="btn"></span>
	<div class="sidebar-content">
		<aside class="sidebar-left">
			<h2><?php echo $curr_top_cat_name ?></h2>

			<?php
				$class = "";
				if ( $curr_term_id == $curr_top_cat_id ) {
					$class .= "current_page_item";
				}
				echo "<ul class='product-cats'>";
				echo "<li class='filter'><span>Filter</span></li>";
				echo "<li class='$class'><a href='" . get_term_link( $curr_top_cat_term ) . "'>All</a></li>";
				if ( count($product_categories) > 0 ){
					foreach ( $product_categories as $cat ) {
						$class = "";
						if ( $cat->term_id == $curr_term_id ) {
							$class .= "current_page_item";
						}
					    echo "<li class='$class'><a href='" . get_term_link( $cat ) . "'>" . $cat->name . "</li>";
				    }
				}
				echo "</ul>";
			?>
	    </aside>
	</div> <!-- sidebar-content -->
</div> <!-- sidebar -->