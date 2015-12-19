<?php
  global $product, $woocommerce, $post;

  $carousel_ids = get_field('carousels');
?>
<?php foreach($carousel_ids as $carousel_id) : ?>
  <div class="category-container" style="opacity:0">
    <div class="category-info">
      <h3><?php echo get_the_title($carousel_id); ?></h3>
      <p><?php the_field('description', $carousel_id); ?></p>
      <?php
        $links = get_field('category_links', $carousel_id);
        $products = get_field('products', $carousel_id);
      ?>
      <?php if ($links) : foreach($links as $link) : ?>
        <?php
          $term_obj = $link['category'];
          $parent_term_id = $term_obj->parent;
          $parent_term_obj = get_term($term_obj->parent, 'product_cat');
        ?>
        <a href="<?php echo get_term_link($term_obj->term_id, 'product_cat'); ?>"><?php echo $parent_term_obj->name ?></a>
      <?php endforeach; endif; ?>
    </div>

    <div class="category-carousel outerwear">
      <div class="owl-wrapper">
        <div class="customNavigation">
          <div class="btn-holder prev"><a class="btn prev"></a></div>
        </div>

        <div id="owl-slider" class="owl-carousel owl-theme">

          <?php if ($products) : foreach($products as $prod_id) : ?>
            <?php
              $product = new WC_Product_Variable( $prod_id );
              $variation_params = woocommerce_swatches_get_variation_form_args();
              $available_variations = $variation_params['available_variations'];
            ?>
            <a href='<?php echo get_permalink($prod_id) ?>'>
              <div class='item'>

                <?php echo get_the_post_thumbnail($prod_id, 'medium'); ?>
                
                <span class='title'><?php echo get_the_title($prod_id) ?></span>
                <span class='sku-title'>Style# <span class='sku' itemprop='sku'><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span></span>

                  <?php if ( !empty( $available_variations ) ) : ?>

                    <form action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" 
                          class="variations_form cart swatches" 
                          method="post" 
                          enctype='multipart/form-data' 
                          data-product_id="<?php echo $post->ID; ?>" 
                          data-product_variations="<?php echo esc_attr( json_encode( $available_variations ) ) ?>"
                          data-product_attributes="<?php echo esc_attr( json_encode( $variation_params['attributes_renamed'] ) ); ?>"
                          data-product_variations_flat="<?php echo esc_attr( json_encode( $variation_params['available_variations_flat'] ) ); ?>"
                          data-variations_map="<?php echo esc_attr( json_encode( $variation_params['variations_map'] ) ); ?>"
                          >

                      <div class="variation_form_section">
                        <?php
                          // reformat color value into array for WC_Swatch_Picker
                          $attributes = array_map('trim', explode( "|", $product->product_attributes['color']['value'] ));
                          $woocommerce_variation_control_output = new WC_Swatch_Picker( $prod_id, array( 'Color' => $attributes ), array() );
                          $woocommerce_variation_control_output->picker();
                        ?>
                      </div>

                    </form>

                  <?php endif; ?>

                </form>

              </div>
            </a>
          <?php endforeach; endif; ?>

        </div>

        <div class="customNavigation">
          <div class="btn-holder next"><a class="btn next"></a></div>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>