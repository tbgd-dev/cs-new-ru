<?php
/**
 * Template used to display post content on single pages.
 *
 * @package storefront
 */

?>

<?php if ( is_singular('cands_journal') ) { ?>
<div class="catlistjournal">
<p class="catlisttoggle">ジャーナル<span></span></p>
</div>

<?php } elseif (is_singular('post') ) { ?>
<div class="catlistjournal">
<p class="catlisttoggle">メディア掲載<span></span></p>
</div>

<?php } else { ?>

<?php } ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if( have_rows( 'flexible_journal' ) ) { ?>
    <div class="new-journal-style">

        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <small style="color: #666; font-weight: 300;"><?php the_date('F Y')?></small>
        </header>
        <?php
// check if the flexible content field has rows of data
if( have_rows( 'flexible_journal' ) ):

    // loop through the rows of data
    while ( have_rows( 'flexible_journal' ) ) : the_row();

        if ( get_row_layout() == 'productscarousel' ) : ?>
        <?php get_template_part( 'partialsnews/flexible', 'productscarousel' ); ?>

        <?php elseif ( get_row_layout() == 'adverts' ) : ?>
        <?php get_template_part( 'partialsnews/flexible', 'adverts' ); ?>

        <?php elseif ( get_row_layout() == 'title' ) : ?>
        <?php get_template_part( 'partialsnews/flexible', 'title' ); ?>

        <?php elseif ( get_row_layout() == 'image' ) : ?>
        <?php get_template_part( 'partialsnews/flexible', 'image' ); ?>

        <?php elseif ( get_row_layout() == 'fullwidthtext' ) : ?>
        <?php get_template_part( 'partialsnews/flexible', 'fullwidthtext' ); ?>

        <?php elseif ( get_row_layout() == 'summary' ) : ?>
        <?php get_template_part( 'partialsnews/flexible', 'summary' ); ?>

        <?php elseif ( get_row_layout() == 'onecolumnimage' ) : ?>
        <?php get_template_part( 'partialsnews/flexible', 'onecolumnimage' ); ?>

        <?php elseif ( get_row_layout() == 'twocolumntext' ) : ?>
        <?php get_template_part( 'partialsnews/flexible', 'twocolumntext' ); ?>

        <?php elseif ( get_row_layout() == 'imageslider' ) : ?>
        <?php get_template_part( 'partialsnews/flexible', 'imageslider' ); ?>

        <?php elseif ( get_row_layout() == 'spacerwithline' ) : ?>
        <?php get_template_part( 'partialsnews/flexible', 'spacerwithline' ); ?>


        <?php endif;

    endwhile;

else :

    // no layouts found

endif; 
?>

    </div>

    <?php } else { ?>

    <div class="old-journal-style">

        <?php
	do_action( 'storefront_single_post_top' );

	/**
	 * Functions hooked into storefront_single_post add_action
	 *
	 * @hooked storefront_post_header          - 10
	 * @hooked storefront_post_content         - 30
	 */
	do_action( 'storefront_single_post' );

	/**
	 * Functions hooked in to storefront_single_post_bottom action
	 *
	 * @hooked storefront_post_nav         - 10
	 * @hooked storefront_display_comments - 20
	 */
	do_action( 'storefront_single_post_bottom' );
	?>

    </div>

    <?php } ?>

</article><!-- #post-## -->