<?php require_once 'Mobile_Detect.php'; $detect = new Mobile_Detect; ?>
<?php if( have_rows('slide') ): ?>
<section class="home-hero home-hero-alt flexslider <?php the_sub_field('hide_from_mobile'); ?>">
  <div class="slides">
        <?php while( have_rows('slide') ): the_row(); 

		// vars
		$image = get_sub_field('desktop_image');
		$image_mob = get_sub_field('mobile_image');
        $vid_link = get_sub_field('video');

        ?>
        <div class="home-slide home-slide-alt <?php the_sub_field('text_below_image_for_mobile'); ?>" >

        <?php if ( get_sub_field('media_type') == 'image' ) { ?>
        <div class="forcedimg-hold" style="background-color:<?php the_sub_field('background_colour'); ?>;">

        <?php if ( $detect->isTablet() ) { ?> 
            <?php 
                    $image = get_sub_field('desktop_image');
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)
                    if( $image ) {
                        echo wp_get_attachment_image( $image, $size );
                    } ?>
            <?php }elseif ( $detect->isMobile() ) { ?>
                <img src="<?php echo $image_mob['sizes']['large']; ?>" alt="<?php echo $image['alt'] ?>" class="respondimg" />
                <?php } else { ?>
                    <?php 
                    $image = get_sub_field('desktop_image');
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)
                    if( $image ) {
                        echo wp_get_attachment_image( $image, $size );
                    } ?>
            <?php } ?>

             <!-- TEXT BLOCK -->
        <?php if ( get_sub_field('title') ) { ?>
            <div class="hero-text-slide-hold">
            <div class="container-max" style="height: 100%;">
            <div class="row" style="height: 100%;">
            <div class="twelve columns" style="height: 100%;">
            <div class="hero-text-slide <?php the_sub_field('text_colour'); ?> <?php the_sub_field('text_position'); ?> <?php the_sub_field('text_align'); ?>" style="bottom:<?php the_sub_field('vertical_text_position'); ?>%;">
                <h2 class="<?php the_sub_field('title_size'); ?>"><?php the_sub_field('title'); ?></h2>
                       <p><?php the_sub_field('sub_text'); ?></p>
                       <?php if ( get_sub_field('link') ) { ?>
                        <a href="<?php the_sub_field('link'); ?>">
                            <?php the_sub_field('button_text'); ?><svg class="svg-inline--fa" aria-hidden="true" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg>
                        </a>
                        <?php } else { ?>
                            <a href="javascript:void(0)" class="zoomdown">
                            <?php the_sub_field('button_text'); ?>
                            <div class="loop-anim zoomdown"><span name="moveBottom" class="sc-AxgMl ewSVXJ"><svg aria-labelledby="" height="15" width="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" role="img"><path d="m15 5.41-7.5 7.91-7.5-7.91 1.95-1.95 5.55 5.83 5.55-5.83z"></path></svg></span></div>

                        </a>
                        <?php } ?>            
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
            <?php } else { ?><?php } ?>
        <!-- TEXT BLOCK -->
        
           </div>
        <?php } elseif ( get_sub_field('media_type') == 'video' ) { ?>
            <div class="forcedimg-hold" style="background-color:<?php the_sub_field('background_colour'); ?>;">
        
         <?php if ( wp_is_mobile() ) { ?>
            <img src="<?php echo $image_mob['sizes']['large']; ?>" alt="<?php echo $image['alt'] ?>" class="forcedimg" />
            <?php } else { ?>
             <video autoplay playsinline muted="" loop="" preload="none" id="bgvid" class="mainvideo" style="opacity:1 !important;">
				<source src="<?php echo $vid_link; ?>" type="video/mp4">
				</video><img src="https://www.czechandspeake.com/fragrance/wp-content/themes/storefront-child-C%26S/images/four-by-two.png" alt="<?php echo $image['alt'] ?>" class="respondimg" />
            <?php } ?>

             <!-- TEXT BLOCK -->
         <?php if ( get_sub_field('title') ) { ?>
            <div class="hero-text-slide-hold">
            <div class="container-max" style="height: 100%;">
            <div class="row" style="height: 100%;">
            <div class="twelve columns" style="height: 100%;">
            <div class="hero-text-slide <?php the_sub_field('text_colour'); ?> <?php the_sub_field('text_position'); ?> <?php the_sub_field('text_align'); ?>" style="bottom:<?php the_sub_field('vertical_text_position'); ?>%;">
                <h2 class="<?php the_sub_field('title_size'); ?>"><?php the_sub_field('title'); ?></h2>
                       <p><?php the_sub_field('sub_text'); ?></p>
                       <?php if ( get_sub_field('link') ) { ?>
                        <a href="javascript:void(0)" class="zoomdown">
                            <?php the_sub_field('button_text'); ?><svg class="svg-inline--fa" aria-hidden="true" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg>
                        </a>
                        <?php } else { ?>
                            <div class="loop-anim zoomdown"><span name="moveBottom" class="sc-AxgMl ewSVXJ"><svg aria-labelledby="" height="15" width="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" role="img"><path d="m15 5.41-7.5 7.91-7.5-7.91 1.95-1.95 5.55 5.83 5.55-5.83z"></path></svg></span></div>

                        <?php } ?>
                    
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
            <?php } else { ?><?php } ?>
        <!-- TEXT BLOCK -->
        </div>
        <?php } ?>

        </div>
        <?php endwhile; ?>
        </div>    
</section>
<?php endif; ?>