<section class="home-images <?php the_sub_field('padding_top'); ?> <?php the_sub_field('padding_bottom'); ?> <?php the_sub_field('hide_from_mobile'); ?>" style="background-color:<?php the_sub_field('background_colour'); ?>; background-image:url(<?php the_sub_field('background_image'); ?>); background-repeat:no-repeat; background-position:center; background-size:cover; ">

        <?php if ( get_sub_field('sub_text') ) { ?>
            <div class="container-max textcenter">
        <h3 class="simplefade simplefade-1 <?php the_sub_field('script_title_font'); ?>" style="margin-bottom:15px;">
            <?php the_sub_field('main_title'); ?>
        </h3>
        <p class="simplefade simplefade-2 contentpadding_sm contentpadding_notop">
            <?php the_sub_field('sub_text'); ?>
        </p>
        </div>   
        <?php } else { ?>
            <div class="container-max textcenter">
        <h3 class="simplefade simplefade-1 <?php the_sub_field('script_title_font'); ?>">
            <?php the_sub_field('main_title'); ?>
        </h3>
        </div>   
        <?php } ?>
     
<div class="home-img-slider imageswipe" data-slick='{"slidesToShow": <?php the_sub_field('number_of_slides_to_show'); ?>, "slidesToScroll": <?php the_sub_field('number_of_slides_to_scroll'); ?>}'>
    <?php 
$images = get_sub_field('images');
if( $images ): ?>
        <?php foreach( $images as $image ): ?>
            <div class="forcedimg-hold">
                     <img src="https://www.czechandspeake.com/fragrance/wp-content/themes/storefront-child-C%26S/images/four-by-two.png" alt="<?php echo $image['alt'] ?>" class="respondimg" />
                     <img loading="lazy" data-src="<?php echo $image['sizes']['large']; ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="<?php echo esc_attr($image['alt']); ?>" class="animate lazy-hidden lazyload forcedimg" />
                     
        </div>
        <?php endforeach; ?>
<?php endif; ?>

    </div>
</section>