<?php if ( get_sub_field('main_title') ) { ?>
<section class="home-video <?php the_sub_field('padding_top'); ?> <?php the_sub_field('padding_bottom'); ?> anitrigger">
    <div class="container-max textcenter">
        <?php if ( get_sub_field('sub_text') ) { ?>
        <h3 class="simplefade simplefade-1" style="margin-bottom:15px;">
            <?php the_sub_field('main_title'); ?>
        </h3>
        <p class="simplefade simplefade-2 contentpadding_sm contentpadding_notop">
        <?php the_sub_field('sub_text'); ?>
        </p>
        <?php } else { ?>
        <h3 class="simplefade simplefade-1">
            <?php the_sub_field('main_title'); ?>
        </h3>
        <?php } ?>
    </div>
    <div class="container-max textcenter simplefade simplefade-2">
<?php } else { ?>
<section class="home-video anitrigger">
    <div class="container-max textpadding_lg contentpadding_lg">
<?php } ?>
        <div class="videoWrapper">
			<?php the_sub_field('url'); ?>
    </div>
		 </div>
</section>
