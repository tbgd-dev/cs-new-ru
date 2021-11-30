<section class="home-text home-text-summary anitrigger <?php the_sub_field('padding'); ?> <?php the_sub_field('padding_bottom'); ?> <?php the_sub_field('hide_from_mobile'); ?> <?php the_sub_field('button_style'); ?>" style="background-color:<?php the_sub_field('background_colour'); ?>;">
    <div class="container-small">
    <div class="row">
        <div class="twelve columns">
        
        <?php if( get_sub_field('text') ): ?>
            <div class="textpadding_md">
                <?php the_sub_field('text'); ?>
                </div>
        <?php endif; ?>

        <?php if ( wp_is_mobile() ) { ?>
            <?php 
            $image = get_sub_field('mobile_image');
            if( !empty( $image ) ): ?>
                <img data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="animate lazy-hidden <?php the_sub_field('make_image_have_max_width'); ?>" />
            <?php endif; ?>
            <?php } else { ?>
                <?php 
            $image = get_sub_field('image');
            if( !empty( $image ) ): ?>
                <img data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="animate lazy-hidden <?php the_sub_field('make_image_have_max_width'); ?>" />
            <?php endif; ?>
                <?php } ?>
           
        </div>
    </div>
    </div>
</section>