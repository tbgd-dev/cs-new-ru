<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

get_header(); ?>

<?php if ( is_tax('journal_categories' ) ) {?>
<div class="catlistjournal" style="margin-top:20px;">
<p class="catlisttoggle">Journal<span></span></p>
<div class="catlistwrap">
    <?php
$args = array(
    'taxonomy' => 'journal_categories',
               'orderby' => 'name',
			   'title_li' => '',
               'order'   => 'ASC'
); ?>
    <ul class="catlistjournal-menu">
        <?php echo wp_list_categories( $args ); ?>
    </ul>
</div>
</div>
<?php } elseif ( is_tax('category' ) ) {?>
<div class="catlistjournal" style="margin-top:20px;">
<p class="catlisttoggle">Press<span></span></p>
<div class="catlistwrap">
    <?php
$args = array(
    'taxonomy' => 'category',
               'orderby' => 'name',
			   'title_li' => '',
               'order'   => 'ASC'
); ?>
    <ul class="catlistjournal-menu">
        <?php echo wp_list_categories( $args ); ?>
    </ul>
</div>
</div>
<?php } else { ?>
<div class="catlistjournal" style="margin-top:20px;">
<p class="catlisttoggle">Press<span></span></p>
<div class="catlistwrap">
    <?php
$args = array(
    'taxonomy' => 'category',
               'orderby' => 'name',
			   'title_li' => '',
               'order'   => 'ASC'
); ?>
    <ul class="catlistjournal-menu">
        <?php echo wp_list_categories( $args ); ?>
    </ul>
</div>
</div>
<?php } ?>

<div id="primary" class="content-area" style="margin-top:20px;">
    <main id="main" class="site-main" role="main">

        <?php if ( have_posts() ) : ?>

        <?php
			get_template_part( 'loopshort' );

		else :

			get_template_part( 'content', 'none' );

		endif;
		?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();