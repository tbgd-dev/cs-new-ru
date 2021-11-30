<section class="home-products <?php the_sub_field('padding_top'); ?> <?php the_sub_field('padding_bottom'); ?> <?php the_sub_field('button_style'); ?> <?php the_sub_field('hide_from_mobile'); ?> anitrigger">
    
<div class="container-max textcenter">
         <?php if ( get_sub_field('sub_text') ) { ?>
        <h3 class="simplefade simplefade-1" style="margin-bottom:15px;">
            <?php the_sub_field('main_title'); ?>
        </h3>
        <div style="max-width:700px; margin:auto;">
        <p class="simplefade simplefade-2 contentpadding_sm contentpadding_notop">
        <?php the_sub_field('sub_text'); ?>
        </p></div>
        <?php } else { ?>
        <h3 class="simplefade simplefade-1">
            <?php the_sub_field('main_title'); ?>
        </h3>
        <?php } ?>
    </div>
    <div class="container textcenter simplefade simplefade-2">
        <?php $row_count = count(get_sub_field('product_item')); ?>
            <?php if( have_rows('product_item')): // check for repeater fields ?>
                <div class="home-products-slider products-alt-slide products-nos-<?php echo $row_count; ?> rowflex">
                <div class="slides" style="display: flex;">
            <?php while ( have_rows('product_item')) : the_row(); // loop through the repeater fields ?>
<div class="product hitbox <?php if ( get_sub_field('hide_price') ) { ?>product-hide-price<?php } else { ?><?php } ?> <?php if ( get_sub_field('hide_button') ) { ?>product-hide-button<?php } else { ?><?php } ?>">
            <?php // set up post object
                                        $post_object = get_sub_field('product_select');
                                        if( $post_object ) :
                                        $post = $post_object;
                                        setup_postdata($post);
                                        ?>
            
                <div class="textpadding_sm"><a href="<?php the_permalink(); ?>" class="forcedimg-hold" style="height: 0; padding-bottom: 100%;"><img loading="lazy" data-src="<?php the_post_thumbnail_url('large'); ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="C&S popular product" class="forcedimg animate lazy-hidden lazyload respondimg" /><img src="https://www.czechandspeake.com/fragrance/wp-content/themes/storefront-child-C%26S/images/square.png" alt="C&S" /></a>
                    <p>
                        <?php the_title(); ?>
                    </p>
                    <p class="prod-price">
                        <?php 
                    global $post;
                    $product = new WC_Product($post->ID); 
                    echo     wc_price($product->get_price_including_tax(1,$product->get_price()));
                    ?>
                    </p>
                    <p class="prod-button"><a href="<?php the_permalink(); ?>">BUY</a></p>
					
					 <div class="add-to-cart "><?php woocommerce_template_loop_add_to_cart(); //ouptput the woocommerce loop add to cart button ?></div>
					
                </div>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
     </div>
            <?php endif; ?>
            <?php endwhile; ?>
            </div>
            <?php endif; ?>
         </div>

         <!-- View all link-->
         <?php if ( get_sub_field('view_all_link') ) { ?><a href="<?php the_sub_field('view_all_link'); ?>" class="viewall"><?php the_sub_field('view_all_text'); ?></a><?php } else { ?><?php } ?>
    </div>
</section>