<?php if ( get_sub_field('text') ) { ?>

<section data-bg="<?php 
$image = get_sub_field('image');
if( !empty($image) ): ?><?php echo $image['url']; ?>
<?php endif; ?>" class="home-signup lazy-hidden animate anitrigger-">
                        <div class="textcenter">
                        <h2 class="simplefade simplefade-1"><?php the_sub_field('text'); ?></h2>
                                <p>
                                    <a class="button" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('button_text'); ?></a>
                                </p>
                        </div>
                    </section>

<?php } else { ?>

<section class="home-signup-simple animate anitrigger-">
    <a href="<?php the_sub_field('link'); ?>"><img data-src="<?php 
$image = get_sub_field('image');
if( !empty($image) ): ?><?php echo $image['sizes']['homepage-hero']; ?>
        <?php endif; ?>" alt="C&S" class="lazy-hidden" style="width:100%; height:auto; display:block;" /></a>
                    </section>

<?php } ?>