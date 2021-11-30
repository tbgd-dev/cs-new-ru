<?php
/**
 * The loop template file.
 *
 * Included on pages like index.php, archive.php and search.php to display a loop of posts
 * Learn more: https://codex.wordpress.org/The_Loop
 *
 * @package storefront
 */

do_action( 'storefront_loop_before' );

while ( have_posts() ) :
	the_post(); ?>

<div class="journal-list-item">
				  <div class="journal-list-item-padd">
				  <div class="col-md-12">
      					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
      				</div>
      				<div class="col-md-12 textcenter">
					<h2 class="journal-post-title textcenter"><a href="<?php the_permalink() ?>"><?php echo the_title(); ?></a></h2>
					<p><?php the_date('F Y')?></p>
					</div>
					</div>					
				</div>

<?php endwhile;

/**
 * Functions hooked in to storefront_paging_nav action
 *
 * @hooked storefront_paging_nav - 10
 */
do_action( 'storefront_loop_after' );
