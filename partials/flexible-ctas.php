                <?php $count = 0;
                $locations = get_sub_field('cta');
                if (is_array($locations)) {
                $count = count($locations);
                } ?> 
			 <section class="home-ctas-main">
					<div class="home-ctas home-ctas-<?php echo $count; ?>">
					<?php while( have_rows('cta') ): the_row(); 
					// vars
					$title = get_sub_field('title');
                    $sub_text = get_sub_field('sub_text');
                    $link = get_sub_field('link');
                    $image = get_sub_field('image');
					?>
                    <a href="<?php echo $link; ?>" class="simplefade- simplefade-1-<?php echo get_row_index(); ?>"><div class="home-ctas-holder">
            <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" />
                <div class="home-ctas-content"><h6><?php echo $title; ?></h6><p><?php echo $sub_text; ?></p></div>
            </div></a>
					<?php endwhile; ?>
					</div>
            	</section>
