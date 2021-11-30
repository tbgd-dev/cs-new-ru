<section class="home-text anitrigger <?php the_sub_field('padding'); ?> <?php the_sub_field('padding_bottom'); ?> <?php the_sub_field('hide_from_mobile'); ?> <?php the_sub_field('button_style'); ?>" style="background-color:<?php the_sub_field('background_colour'); ?>;">
    <div class="container-max">
        <div class="row">
        <div class="five columns <?php the_sub_field('column_width'); ?> <?php if ( get_sub_field('image_right') ) { ?>reverseorder<?php } else { ?>normalorder<?php } ?>">
        
        <?php if( get_sub_field('text_left') ): ?>
            <div class="textpadding_md">
                <?php the_sub_field('text_left'); ?>
                </div>
        <?php endif; ?>
        <?php if ( wp_is_mobile() ) { ?>
            <?php 
            $image = get_sub_field('mobile_image_left');
            if( !empty( $image ) ): ?>
                <img loading="lazy" data-src="<?php echo esc_url($image['url']); ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="<?php echo esc_attr($image['alt']); ?>" class="animate lazy-hidden lazyload home-text-imgpad <?php the_sub_field('make_image_have_max_width'); ?>" />
            <?php endif; ?>
            <?php } else { ?>
                <?php 
            $image = get_sub_field('image_left');
            if( !empty( $image ) ): ?>
                <img loading="lazy" data-src="<?php echo esc_url($image['url']); ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="<?php echo esc_attr($image['alt']); ?>" class="animate lazy-hidden lazyload home-text-imgpad <?php the_sub_field('make_image_have_max_width'); ?>" />
            <?php endif; ?>
                <?php } ?>
            
        </div>
        <div class="five columns <?php the_sub_field('column_width'); ?> <?php if ( get_sub_field('image_right') ) { ?>reverseorder<?php } else { ?>normalorder<?php } ?>">
        <?php if( get_sub_field('text_right') ): ?>
            <div class="textpadding_md">
                <?php the_sub_field('text_right'); ?>
                </div>
        <?php endif; ?>

        <?php if ( wp_is_mobile() ) { ?>
            <?php 
            $image = get_sub_field('mobile_image_right');
            if( !empty( $image ) ): ?>
                <img loading="lazy" data-src="<?php echo esc_url($image['url']); ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="<?php echo esc_attr($image['alt']); ?>" class="animate lazy-hidden lazyload home-text-imgpad <?php the_sub_field('make_image_have_max_width'); ?>" />
            <?php endif; ?>
            <?php } else { ?>
                <?php 
            $image = get_sub_field('image_right');
            if( !empty( $image ) ): ?>
                <img loading="lazy" data-src="<?php echo esc_url($image['url']); ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="<?php echo esc_attr($image['alt']); ?>" class="animate lazy-hidden lazyload home-text-imgpad <?php the_sub_field('make_image_have_max_width'); ?>" />
            <?php endif; ?>
                <?php } ?>

        </div>
        </div>
    </div>
</section>
