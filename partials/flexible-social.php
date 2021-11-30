<section class="home-social">
    <div class="container-fluid textcenter">
        <?php if( have_rows('social_items') ): ?>
        <?php while( have_rows('social_items') ): the_row(); 

		// vars
		$image = get_sub_field('image');
		$content = get_sub_field('text');
		$link = get_sub_field('link');

		?>
             
        <div class="one-quarter columns <?php if( $link ): ?>hitbox<?php endif; ?>"><div class="home-social-holder"><?php if( $link ): ?><a href="<?php echo $link; ?>"><?php endif; ?>
            <?php if( $link ): ?><div class="home-social-cover"></div><?php endif; ?>
                <p>
                    <?php echo $content; ?>
                </p><div class="forcedimg-hold" style="position:relative; z-index:1;"><img data-src="<?php echo $image['sizes']['medium']; ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="<?php echo $image['alt'] ?>" class="forcedimg lazy-hidden animate lazyload" /><img src="https://www.czechandspeake.com/fragrance/wp-content/themes/storefront-child-C%26S/images/four-by-three.png" alt="<?php echo $image['alt'] ?>" class="respondimg" /></div>
            <?php if( $link ): ?></a><?php endif; ?></div></div>
        <?php endwhile; ?>
        <?php endif; ?>

    </div>
</section>