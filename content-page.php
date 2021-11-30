<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package storefront
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if( is_page( 'my-account' ) ) { ?>	
	<header class="entry-header">
			<h1 class="entry-title">My Account</h1>
	</header>
	<?php if( is_user_logged_in() ) { ?>
		<p class="yotpo-account-area" style="display:none;">Hello, for those who have logged in and wish to gain access to the No.88 Club’s Reward Scheme, <a href="<?php echo get_bloginfo('url') ?>/rewards-club/">Click here</a></p>
	<?php } else { ?>
		<p style="text-align:center; padding-bottom:20px; display:none;">Register for exclusive access to hidden areas including our members sale. If you already have an account with us, just log in below.</p>
	<?php } ?>
	
<?php } else { ?>
	
<?php } ?>
<?php
	/**
	 * Functions hooked in to storefront_page add_action
	 *
	 * @hooked storefront_page_header          - 10
	 * @hooked storefront_page_content         - 20
	 */
	do_action( 'storefront_page' );
	?>
</article><!-- #post-## -->
