<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Press
 *
 * @package storefront
 */

get_header(); ?>

<div class="catlistjournal" style="margin-top:20px;">
<h1 class="catlisttoggle">メディア掲載<span></span></h1>
</div>

<div class="container">
    <div class="row journal">
        <div class="col-md-12 contentpadding_exsm textcenter">
            <?php
				  $query_args = array(
				    'post_type' => 'post',				    
				    'posts_per_page' => 200,
				    'paged' => $paged
				  );
				  $wp_query = new WP_Query( $query_args );
				?>
            <?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); // run the loop ?>
            <div class="journal-list-item">
                <div class="journal-list-item-padd">
                    <div class="col-md-12">
                        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                    </div>
                    <div class="col-md-12 textcenter">
                        <h2 class="journal-post-title textcenter"><a
                                href="<?php the_permalink() ?>"><?php echo the_title(); ?></a></h2>
                        <i><?php the_date('d F Y')?></i>
                        <p><a class="btn" href="<?php the_permalink() ?>">Read More</a></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php else: ?>
            <article>
                <h1>Sorry...</h1>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            </article>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
get_footer();