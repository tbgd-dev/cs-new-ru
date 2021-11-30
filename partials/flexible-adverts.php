<section class="home-news <?php the_sub_field('padding_top'); ?> <?php the_sub_field('padding_bottom'); ?> <?php the_sub_field('button_style'); ?> <?php the_sub_field('hide_from_mobile'); ?> anitrigger" <?php if ( get_sub_field('background_image') ) { ?>style="background-image: url(<?php the_sub_field('background_image'); ?>); background-position: center; background-size: contain;"<?php } else { ?><?php } ?>>
    <div class="container-max textcenter">
        <?php if ( get_sub_field('sub_text') ) { ?>
        <h3 class="simplefade simplefade-1 <?php the_sub_field('script_title_font'); ?> <?php the_sub_field('padding_under_title'); ?>">
            <?php the_sub_field('main_title'); ?>
        </h3>
        <p class="simplefade simplefade-2 contentpadding_sm contentpadding_notop <?php the_sub_field('padding_under_title'); ?>">
            <?php the_sub_field('sub_text'); ?>
        </p>
        <?php } else { ?>
        <h3 class="simplefade simplefade-1 <?php the_sub_field('script_title_font'); ?> <?php the_sub_field('padding_under_title'); ?>">
            <?php the_sub_field('main_title'); ?>
        </h3>
        <?php } ?>
    </div>
    <div
        class="container textcenter <?php if ( get_sub_field('carousel') ) { ?>three-slider<?php } else { ?><?php } ?> simplefade simplefade-2">
        <div class="imageswipe">
        <?php if ( get_sub_field('carousel') ) { ?>

        <?php if( have_rows('advert_item') ): ?>
        <?php while( have_rows('advert_item') ): the_row(); 
		// vars
		$image = get_sub_field('image');
        $content = get_sub_field('title');
        $description = get_sub_field('description');
		$link = get_sub_field('link');
		?>
        <div class="advertitem hitbox">
            <div class="textpadding_sm"><a href="<?php echo $link; ?>" class="forcedimg-hold" style="height: 0; padding-bottom: 100%;"><img loading="lazy"
                        data-src="<?php echo $image['sizes']['homepage-thumb-sq']; ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="<?php echo $image['alt'] ?>"
                        class="lazy-hidden animate forcedimg lazyload" /><img
                        src="https://www.czechandspeake.com/fragrance/wp-content/themes/storefront-child-C%26S/images/square.png"
                        alt="<?php echo $image['alt'] ?>" class="respondimg" /></a>
                <p>
                    <?php echo $content; ?>
                </p>
                <?php if( $description ): ?>
                <p>
                    <?php echo $description; ?>
                </p>
                <?php endif; ?>
                <?php if( $link ): ?>
                        <a href="<?php echo $link; ?>"
                    class="button"><?php if ( get_sub_field('button_text') ) { ?><?php the_sub_field('button_text'); ?><?php } else { ?>READ
                    MORE<?php } ?><svg class="svg-inline--fa" aria-hidden="true" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg></a>
                    <?php endif; ?>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>

        <?php } else { ?>

        <?php if( have_rows('advert_item') ): ?>
        <?php while( have_rows('advert_item') ): the_row(); 
		// vars
		$image = get_sub_field('image');
        $content = get_sub_field('title');
        $description = get_sub_field('description');
		$link = get_sub_field('link');

		?>
        <div class="advertitem hitbox">
            <div class="textpadding_sm"><a href="<?php echo $link; ?>" class="forcedimg-hold" style="height: 0; padding-bottom: 100%;"><img loading="lazy"
                        data-src="<?php echo $image['sizes']['homepage-thumb-sq']; ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="<?php echo $image['alt'] ?>"
                        class="lazy-hidden animate forcedimg lazyload" /><img
                        src="https://www.czechandspeake.com/fragrance/wp-content/themes/storefront-child-C%26S/images/square.png"
                        alt="<?php echo $image['alt'] ?>" class="respondimg" /></a>
                <p>
                    <?php echo $content; ?>
                </p>
                <?php if( $description ): ?>
                <p>
                    <?php echo $description; ?>
                </p>
                <?php endif; ?>
                <?php if( $link ): ?>
                        <a href="<?php echo $link; ?>"
                    class="button"><?php if ( get_sub_field('button_text') ) { ?><?php the_sub_field('button_text'); ?><?php } else { ?>READ
                    MORE<?php } ?><svg class="svg-inline--fa" aria-hidden="true" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg></a>
                    <?php endif; ?>
            </div>
        </div>

        <?php endwhile; ?>
        <?php endif; ?>

        <?php } ?>
        </div>
    </div>
</section>