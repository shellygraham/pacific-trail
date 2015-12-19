<?php
	if ( is_product_category()  ) {
		$banner_src = woocommerce_category_image();
	} else if ( has_post_thumbnail() ) {
		$thumb_id = get_post_thumbnail_id();
	    $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
	    $banner_src = $thumb_url[0];
	}
?>

<?php if ( $banner_src ) : ?>

	<div class="parallax-image-wrapper" data-anchor-target="#parallax-top + .gap" data-bottom-top="transform:translate3d(0px, 200%, 0px)" data-top-bottom="transform:translate3d(0px, 0%, 0px)">
	    <div class="parallax-image" style="background-image:url(<?php echo $banner_src ?>)" data-anchor-target="#parallax-top + .gap" data-bottom-top="transform: translate3d(0px, -80%, 0px);" data-top-bottom="transform: translate3d(0px, 80%, 0px);"></div>
	    <!--the +/-80% translation can be adjusted to control the speed difference of the image-->
	</div>
	<div class="header" id="parallax-top"></div>
	<div class="gap"></div>

<?php else : ?>

	<div class="gap-no-banner"></div>

<?php endif ?>