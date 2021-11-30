<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage New Jun19
 *
 * @package storefront
 */

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php
// check if the flexible content field has rows of data
if( have_rows( 'flexible_home' ) ):

    // loop through the rows of data
    while ( have_rows( 'flexible_home' ) ) : the_row();

        if ( get_row_layout() == 'hero' ) : ?>
           <?php get_template_part( 'partials/flexible', 'hero' ); ?>

           <?php elseif ( get_row_layout() == 'heroalt' ) : ?>
         <?php get_template_part( 'partials/flexible', 'heroalt' ); ?>

         <?php elseif ( get_row_layout() == 'signupsmall' ) : ?>
         <?php get_template_part( 'partials/flexible', 'signupsmall' ); ?>

<?php elseif ( get_row_layout() == 'cs_strapline' ) : ?>
         <?php get_template_part( 'partials/flexible', 'csstrapline' ); ?>

         <?php elseif ( get_row_layout() == 'ctas' ) : ?>
         <?php get_template_part( 'partials/flexible', 'ctas' ); ?>

        <?php elseif ( get_row_layout() == 'products' ) : ?>
         <?php get_template_part( 'partials/flexible', 'products' ); ?>

         <?php elseif ( get_row_layout() == 'productscarousel' ) : ?>
         <?php get_template_part( 'partials/flexible', 'productscarousel' ); ?>

       <?php elseif ( get_row_layout() == 'adverts' ) : ?>
         <?php get_template_part( 'partials/flexible', 'adverts' ); ?>

         <?php elseif ( get_row_layout() == 'video' ) : ?>
         <?php get_template_part( 'partials/flexible', 'video' ); ?>

        <?php elseif ( get_row_layout() == 'signuplarge' ) : ?>
         <?php get_template_part( 'partials/flexible', 'signuplarge' ); ?>

    <?php elseif ( get_row_layout() == 'social' ) : ?>
         <?php get_template_part( 'partials/flexible', 'social' ); ?>

<?php elseif ( get_row_layout() == 'yopto' ) : ?>
         <?php get_template_part( 'partials/flexible', 'yopto' ); ?>

         <?php elseif ( get_row_layout() == 'image' ) : ?>
         <?php get_template_part( 'partials/flexible', 'image' ); ?>

         <?php elseif ( get_row_layout() == 'fullwidthtext' ) : ?>
         <?php get_template_part( 'partials/flexible', 'fullwidthtext' ); ?>

         <?php elseif ( get_row_layout() == 'twocolumntext' ) : ?>
         <?php get_template_part( 'partials/flexible', 'twocolumntext' ); ?>

         <?php elseif ( get_row_layout() == 'imageslider' ) : ?>
         <?php get_template_part( 'partials/flexible', 'imageslider' ); ?>

         <?php elseif ( get_row_layout() == 'klaviyoform' ) : ?>
         <?php get_template_part( 'partials/flexible', 'klaviyoform' ); ?>

         <?php elseif ( get_row_layout() == 'spacerwithline' ) : ?>
         <?php get_template_part( 'partials/flexible', 'spacerwithline' ); ?>

         <?php elseif ( get_row_layout() == 'html' ) : ?>
         <?php get_template_part( 'partials/flexible', 'html' ); ?>

         <?php elseif ( get_row_layout() == 'htmlbf' ) : ?>
         <?php get_template_part( 'partials/flexible', 'htmlbf' ); ?>

      <?php endif;

    endwhile;

else :

    // no layouts found

endif; 
?>
                                                                
    <?php endwhile; else : ?>
<?php endif; ?>

<?php
get_footer();