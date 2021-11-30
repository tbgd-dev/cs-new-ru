<section class="home-text-img anitrigger <?php the_sub_field('hide_from_mobile'); ?>">
    <div class="container-max">
        <?php if ( get_sub_field('text') ) { ?>
        <?php 
$image = get_sub_field('image');
if( !empty( $image ) ): ?>
        <div class="imageWrapper" style="background-image:url('<?php echo esc_url($image['url']); ?>');">
            <div class="container-small textWrapper textpadding_lg <?php the_sub_field('padding'); ?>">
                <?php the_sub_field('text'); ?>
            </div>
        </div><?php endif; ?>

        <?php } else { ?>

        <?php if ( wp_is_mobile() ) { ?>
        <?php 
            $image = get_sub_field('mobile_image');
            if( !empty( $image ) ): ?>
        <div class="imageWrapper">
            <div class="<?php the_sub_field('padding'); ?>">
                <img loading="lazy" data-src="<?php echo esc_url($image['url']); ?>"
                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                    alt="<?php echo esc_attr($image['alt']); ?>"
                    class="animate lazy-hidden lazyload home-text-imgpad <?php the_sub_field('make_image_have_max_width'); ?>" />
            </div>
        </div>
        <?php endif; ?>
        <?php } else { ?>
        <?php 
            $image = get_sub_field('image');
            if( !empty( $image ) ): ?>
        <div class="imageWrapper">
            <div class="<?php the_sub_field('padding'); ?>">
                <img loading="lazy" data-src="<?php echo esc_url($image['url']); ?>"
                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                    alt="<?php echo esc_attr($image['alt']); ?>"
                    class="animate lazy-hidden lazyload home-text-imgpad <?php the_sub_field('make_image_have_max_width'); ?>" />
            </div>
        </div>
        <?php endif; ?>
        <?php } ?>

        <?php } ?>
    </div>
</section>