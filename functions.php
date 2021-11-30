<?php

/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
//add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );

/**
 * Dequeue the Storefront Parent theme core CSS
 */
//ini_set('display_errors', 0);
function sf_child_theme_dequeue_style() {
    wp_dequeue_style( 'storefront-style' );
    wp_dequeue_style( 'storefront-woocommerce-style' );
}

// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
    unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}

// Set woo image sizes
add_filter( 'woocommerce_get_image_size_single', function( $size ) {
	return array(
		'width'  => 500,
		'height' => 500,
		'crop'   => 0,
	);
});
/*add_filter( 'woocommerce_get_image_size_full', function( $size ) {
	return array(
		'width'  => 500,
		'height' => 500,
		'crop'   => 0,
	);
});*/

// Disable Gutenberg editor.
add_filter('use_block_editor_for_post_type', '__return_false', 10);
// Don't load Gutenberg-related stylesheets.
add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );
function remove_block_css() {
    wp_dequeue_style( 'wp-block-library' ); // WordPress core
    wp_dequeue_style( 'wp-block-library-theme' ); // WordPress core
    wp_dequeue_style( 'wc-block-style' ); // WooCommerce
    wp_dequeue_style( 'storefront-gutenberg-blocks' ); // Storefront theme
}

function dequeue_dequeue_plugin_style(){
    wp_dequeue_style( 'wc-gateway-ppec-frontend' );
    wp_dequeue_style( 'yotpoSideBootomLineStylesheet' ); 
    wp_dequeue_style( 'storefront-fonts' );
    wp_dequeue_style( 'storefront-icons' ); 
    wp_deregister_style( 'storefront-icons' );
    wp_dequeue_style( 'wc_free_gift_style' ); 
    wp_deregister_style( 'wc_free_gift_style' );
    wp_dequeue_style( 'photoswipe' ); 
    wp_deregister_style( 'photoswipe' );
    wp_dequeue_style( 'photoswipe-default-skin' ); 
    wp_deregister_style( 'photoswipe-default-skin' );
    wp_dequeue_script( 'photoswipe-ui-default' ); 
    wp_deregister_script( 'photoswipe-ui-default' );
    wp_dequeue_style( 'wc-memberships-frontend' ); 
    wp_deregister_style( 'wc-memberships-frontend' );
    wp_dequeue_style( 'storefront-woocommerce-memberships-style' ); 
    wp_deregister_style( 'storefront-woocommerce-memberships-style' );
    wp_dequeue_style( 'dgwt-wcas-style' ); 
    wp_deregister_style( 'dgwt-wcas-style' );
    wp_dequeue_style( 'wc-blocks-vendors-style' ); 
    wp_deregister_style( 'wc-blocks-vendors-style' );
    wp_dequeue_style( 'wc-blocks-style' ); 
    wp_deregister_style( 'wc-blocks-style' );
    //wp_dequeue_style( 'storefront-style' ); 
    //wp_deregister_style( 'storefront-style' );
}
add_action( 'wp_enqueue_scripts', 'dequeue_dequeue_plugin_style', 9999 );
add_action( 'wp_head', 'dequeue_dequeue_plugin_style', 9999 );

add_action( 'wp', 'remove_lightbox', 99 );
function remove_lightbox() { 
   remove_theme_support( 'wc-product-gallery-lightbox' ); // removes photoswipe markup on frontend
}

// Remove backorder singel product text
add_filter( 'woocommerce_get_availability_text', 'filter_product_availability_text', 10, 2 );
function filter_product_availability_text( $availability, $product ) {

    if( $product->backorders_require_notification() ) {
        $availability = str_replace('(can be backordered)', '', $availability);
    }
    return $availability;
}

// Add gallery to landing pages
add_action( 'wp_enqueue_scripts', function(){
    if( have_rows('flexible_home') && !is_front_page() ){
      wp_enqueue_script('zoom');
      wp_enqueue_script('flexslider');
      wp_enqueue_script('photoswipe-ui-default');
    }
    if( have_rows('flexible_journal') ){
        wp_enqueue_script('zoom');
        wp_enqueue_script('flexslider');
        wp_enqueue_script('photoswipe-ui-default');
      }
  });

// My account page link
add_filter ( 'woocommerce_account_menu_items', 'account_no88_link' );
function account_no88_link( $menu_links ){
	// we will hook "anyuniquetext123" later
	$new = array( 'loyaltyclub' => 'No.88 Loyalty Club' );
	// or in case you need 2 links
	// $new = array( 'link1' => 'Link 1', 'link2' => 'Link 2' );
	// array_slice() is good when you want to add an element between the other ones
	$menu_links = array_slice( $menu_links, 0, 1, true ) 
	+ $new 
	+ array_slice( $menu_links, 1, NULL, true );
	return $menu_links;
}
add_filter( 'woocommerce_get_endpoint_url', 'account_no88_linkend', 10, 4 );
function account_no88_linkend( $url, $endpoint, $value, $permalink ){
	if( $endpoint === 'loyaltyclub' ) {
		// ok, here is the place for your custom URL, it could be external
		$url = site_url('rewards-club/');
	}
	return $url;
}
add_filter( 'woocommerce_account_menu_items', function($items) {
    $items['edit-account'] = __('Details & Password', 'textdomain'); 
    //$items['members-area'] = __('Member&rsquo;s Sale', 'textdomain'); 
    $items['edit-address'] = __('Address Book', 'textdomain'); 
    return $items;
}, 99, 1 );

// Checkout notice
/*add_action('woocommerce_review_order_before_payment', 'webroom_add_content_to_woocommerce_checkout', 5);
function webroom_add_content_to_woocommerce_checkout(){
	echo '<div class="complimentary-samples"><p><strong>Two complimentary samples will be added to your order</strong></p></div>';
}*/

// Out of stock notice
add_filter('woocommerce_get_availability', 'availability_filter_func');
function availability_filter_func($availability)
{
$availability['availability'] = str_ireplace('Out of stock', 'Sold out', $availability['availability']);
return $availability;
}

// Add back to bag link in checkout
add_action( 'woocommerce_before_checkout_form', 'wnd_checkout_code', 10 );
function wnd_checkout_code( ) {
 echo '<a class="returntobag" href="' . esc_url( home_url( '/cart' ) ) . '">' . __( 'Return to bag' ) . '</a>';
}

// Remove header from myaccount
function sf_change_homepage_title( $args ) {
    if(is_page('my-account')) {
        remove_action( 'storefront_page', 'storefront_page_header', 10 );
    }
}
add_action( 'wp', 'sf_change_homepage_title' );

add_image_size( 'homepage-thumb', 480, 288, true );
add_image_size( 'homepage-thumb-sq', 600, 600, true );
add_image_size( 'homepage-hero', 1600, 600, true );
add_image_size( 'homepage-hero-lg', 2000, 750, true );
add_image_size( 'homepage-hero-super', 2200, 825, true );
// Move Yoast to bottom
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
// Change cart to bag
function gb_change_cart_string($translated_text, $text, $domain) {
$translated_text = str_replace("cart", "bag", $translated_text);
$translated_text = str_replace("Cart", "Bag", $translated_text);
$translated_text = str_replace("basket", "bag", $translated_text);
$translated_text = str_replace("Basket", "Bag", $translated_text);
return $translated_text;
}
add_filter('gettext', 'gb_change_cart_string', 100, 3);
// Video product block
add_action( 'woocommerce_after_single_product_summary', "ACF_product_content", 10 );
function ACF_product_content(){
	if ( get_field('video', $post_id) ) {
  if (function_exists('the_field')){
	  echo '<div class="videoWrapper" style="margin-bottom:30px;">';
    the_field('video');
	  echo '</div>';
  }
		}
}
// disable emogis
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	
	// Remove from TinyMCE
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter out the tinymce emoji plugin.
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}
// Show product img on checkout
add_filter( 'woocommerce_cart_item_name', 'ts_product_image_on_checkout', 10, 3 );
function ts_product_image_on_checkout( $name, $cart_item, $cart_item_key ) {
    /* Return if not checkout page */
    if ( ! is_checkout() ) {
        return $name;
    }
    /* Get product object */
    $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
    /* Get product thumbnail */
    $thumbnail = $_product->get_image();
    /* Add wrapper to image and add some css */
    $image = '<div class="ts-product-image" style="width: 52px; height: 45px; display: inline-block; padding-right: 7px; vertical-align: middle;">'
                . $thumbnail .
            '</div>'; 

    /* Prepend image to name and return it */
    return $image . $name;
}
// Remove Cross Sells From Default Position 
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );
//remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );

// ---------------------------------------------
// Display Only 2 Cross Sells instead of default 4
add_filter( 'woocommerce_cross_sells_total', 'bbloomer_change_cross_sells_product_no' );
function bbloomer_change_cross_sells_product_no( $columns ) {
return 2;
}

// Move price up
remove_action( 'woocommerce_single_product_summary', 
'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary', 
'woocommerce_template_single_add_to_cart', 15 );

/**
 * Change number of upsells output
 */
add_filter( 'woocommerce_upsell_display_args', 'wc_change_number_related_products', 20 );

function wc_change_number_related_products( $args ) {
 
 $args['posts_per_page'] = 4;
 $args['columns'] = 4; //change number of upsells here
 return $args;
}

/**
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/**
 * Default WooCommerce Cart Hooks (just an example, do not copy)
 *
 */
add_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 30 );
add_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );
//add_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );
// CUSTOM ADD TO CART MESSAGE
add_filter ( 'wc_add_to_cart_message', 'wc_add_to_cart_message_filter', 10, 2 );
function wc_add_to_cart_message_filter($message, $product_id = null) {
	$product_meta = get_post_meta($product_id);
    $terms = get_the_terms( $product_id, 'product_cat' );
    $all_terms = array_column($terms, 'term_id');
   if(!in_array(get_option('free_samples_category'), $all_terms) || !in_array(get_option('free_gift_category'), $all_terms) || $product_id != get_option('gift_wrapping_product')) {
        $img = wp_get_attachment_image(($product_meta['_thumbnail_id'][0]), 'large');
        $titles[] = get_the_title( $product_id );
        $titles = array_filter( $titles );
        $added_text = sprintf( _n( '%s has been added to your bag.', '%s have been added to your bag.', sizeof( $titles ), 'woocommerce' ), wc_format_list_of_items( $titles ) );
        $message = sprintf( '<div class="message-wrap-holder Fixed"><div class="message-wrap">' ."$img".'%s<br><a href="%s" class="button button-checkout">%s</a><a href="%s" class="button">%s</a><div class="message-close"></div></div></div>',
                        esc_html( $added_text ),
                        esc_url( wc_get_page_permalink( 'checkout' ) ),
                        esc_html__( 'CHECKOUT', 'woocommerce' ),
                        esc_url( wc_get_page_permalink( 'cart' ) ),
                        esc_html__( 'View Bag', 'woocommerce' ));
        return $message;
   }

   return $message;
}
// Number of products per page
add_filter( 'loop_shop_per_page', 'bbloomer_redefine_products_per_page', 9999 );
function bbloomer_redefine_products_per_page( $per_page ) {
  $per_page = 40;
  return $per_page;
}
//CHECKOUT
add_filter( 'woocommerce_checkout_fields' , 'override_billing_checkout_fields', 20, 1 );
function override_billing_checkout_fields( $fields ) {
    $fields['billing']['billing_phone']['placeholder'] = 'Telephone*';
    $fields['billing']['billing_email']['placeholder'] = 'Email*';
	$fields['billing']['billing_company']['placeholder'] = 'Company Name (optional)';
	unset($fields['billing']['billing_company']);
    return $fields;
}
add_filter('woocommerce_default_address_fields', 'override_default_address_checkout_fields', 20, 1);
function override_default_address_checkout_fields( $address_fields ) {
    $address_fields['first_name']['placeholder'] = 'First Name*';
    $address_fields['last_name']['placeholder'] = 'Last Name*';
    $address_fields['address_1']['placeholder'] = 'Address*';
    $address_fields['state']['placeholder'] = 'County (optional)';
    $address_fields['postcode']['placeholder'] = 'Postcode*';
    $address_fields['city']['placeholder'] = 'City*';
    return $address_fields;
}
/**
 * NEW PODUCT TABS
 * /
 * Add a custom product data tab
 */
//adding new tab//
add_filter( 'woocommerce_product_tabs', 'product_tab' );
function product_tab( $tabs ) {
    if ( get_field('notes_tab_content', $post_id) ) {
        $notes_title = get_field('notes_tab_title', $post_id);
        $tabs[] = array(
        'title' => $notes_title,
        'priority' => 11,
        'callback' => 'show_notes_content'
        );
        }
	if ( get_field('story_tab_content', $post_id) ) {
	$story_title = get_field('story_tab_title', $post_id);
	$tabs[] = array(
	'title' => $story_title,
	'priority' => 10,
	'callback' => 'show_story_content'
	);
	}
	/*if ( get_field('fragrance_tab_content', $post_id) ) {
	$fragrance_title = get_field('fragrance_tab_title', $post_id);
	$tabs[] = array(
	'title' => $fragrance_title,
	'priority' => 11,
	'callback' => 'show_fragrance_content'
	);
	}*/
	if ( get_field('buyers_questions_tab_content', $post_id) ) {
	$buyers_title = get_field('buyers_tab_title', $post_id);
	$tabs[] = array(
	'title' => $buyers_title,
	'priority' => 12,
	'callback' => 'show_buyers_content'
	);
	}
	if ( get_field('shipping_tab_content', 'options') ) {
	//$shipping_title = get_field('shipping_tab_title', 'options');
	$tabs[] = array(
	'title' => 'Shipping & Returns',
	'priority' => 100,
	'callback' => 'show_ship_content_new'
	);
    }
    if ( get_field('complimentary_tab_content', 'options') ) {
    //$shipping_title = get_field('shipping_tab_title', 'options');
    $tabs[] = array(
    'title' => 'Complimentary with your order',
    'priority' => 11,
    'callback' => 'show_comp_content_new'
    );
    }
	
	return $tabs;
}
function show_notes_content() {
	$notes_tab = get_field('notes_tab_content', $post_id);
	if( $notes_tab ):
	echo get_field('notes_tab_content', $post_id);
	endif;
}
function show_story_content() {
	$story_tab = get_field('story_tab_content', $post_id);
	if( $story_tab ):
	echo get_field('story_tab_content', $post_id);
	endif;
}
/*function show_fragrance_content() {
	$fragrance_tab = get_field('fragrance_tab_content', $post_id);
	if( $fragrance_tab ):
	echo get_field('fragrance_tab_content', $post_id);
	endif;
}*/
function show_buyers_content() {
	$buyer_tab = get_field('buyers_questions_tab_content', $post_id);
	if( $buyer_tab ):
	echo get_field('buyers_questions_tab_content', $post_id);
	endif;
}
function show_ship_content() {
	$ship_tab = get_field('shipping_returns_tab_content', $post_id);
	if( $ship_tab ):
	echo get_field('shipping_returns_tab_content', $post_id);
	endif;
}
function show_ship_content_new() {
	$shipnew_tab = get_field('shipping_tab_content', 'options');
	if( $shipnew_tab ):
	echo get_field('shipping_tab_content', 'options');
	endif;
}
function show_comp_content_new() {
	$compnew_tab = get_field('complimentary_tab_content', 'options');
	if( $compnew_tab ):
	echo get_field('complimentary_tab_content', 'options');
	endif;
}
//
//The Story, The Fragrance, Buyer Questions, Additional Information and Shipping & Free Returns
/**
 * Change several of the breadcrumb defaults
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' &#47; ',
            'before'      => '<span>',
            'after'       => '</span>',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}
// ADDED by NK
function nk_scripts_important() {
    
    wp_register_script( 'custom-script', get_stylesheet_directory_uri() . '/js/custom-flexible.js', false, null, true );
    wp_enqueue_script( 'custom-script' );

    //wp_enqueue_style('new-home',get_stylesheet_directory_uri().'/css/c_and_s_new.css');
    
}
add_action( 'wp_enqueue_scripts', 'nk_scripts_important', 5 );
// ADDED by NK end

//Remove product zoom
 function remove_image_zoom_support() {
    remove_theme_support( 'wc-product-gallery-zoom' );
}
add_action( 'wp', 'remove_image_zoom_support', 100 );

function storefront_single_change_order() {
	remove_action ('storefront_single_post', 'storefront_post_header', -10);
	remove_action ('storefront_single_post', 'storefront_post_meta', -20);
	remove_action ('storefront_single_post', 'storefront_post_thumbnail', 60);
	add_action ('storefront_single_post', 'storefront_post_header', 10);
	add_action ('storefront_single_post', 'storefront_post_meta', 30);
	add_action ('storefront_single_post', 'storefront_post_thumbnail', 20);
}
add_action ('init', 'storefront_single_change_order');

function storefront_header_change_order() {
	remove_action ('storefront_header', 'storefront_header_cart', 60);
	add_action ('storefront_header', 'storefront_header_cart', 5);
}
add_action ('init', 'storefront_header_change_order');

function storefront_homepage_remove_content() {
	remove_action ('homepage', 'storefront_homepage_content', 10);
	remove_action ('homepage', 'storefront_product_categories', 20);
	remove_action ('homepage', 'storefront_recent_products', 30);
	remove_action ('homepage', 'storefront_featured_products', 40);
	remove_action ('homepage', 'storefront_popular_products', 50);
	remove_action ('homepage', 'storefront_on_sale_products', 60);
	remove_action ('homepage', 'storefront_best_selling_products', 70);
}
add_action ('init', 'storefront_homepage_remove_content');
//add_action( 'init', 'custom_fix_thumbnail' );

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',

    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Header Settings',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'General Settings',
        'menu_title'	=> 'General',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Product Settings',
        'menu_title'	=> 'Product',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Footer Settings',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));
}
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type('cands_journal', array(
        'labels' => array(
            'name' => 'Journal',
            'singular_name' => 'Journal'
        ),
        'public' => true,
		'has_archive' => true,
      	'rewrite' => array('slug' => 'journal-posts'),
        'supports' => array(
            'title',
            'editor',
			'thumbnail'
        ),
        'taxonomies' => array('post_tag')
    ));
}
add_action( 'init', 'create_post_type_case' );
function create_post_type_case() {
	register_post_type('cands_casestudies', array(
        'labels' => array(
            'name' => 'Case Studies',
            'singular_name' => 'Case Study'
        ),
        'public' => true,
		'has_archive' => true,
      	'rewrite' => array('slug' => 'case-studies'),
        'supports' => array(
            'title',
            'editor',
			'thumbnail'
        ),
        'taxonomies' => array('post_tag')
    ));
}
function themes_taxonomy() {
    register_taxonomy(
        'journal_categories',
        'cands_journal',
        array(
            'hierarchical' => true,
            'label' => 'Journal Category',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'journal-category',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'themes_taxonomy');
function case_taxonomy() {
    register_taxonomy(
        'case_study_categories',
        'cands_casestudies',
        array(
            'hierarchical' => true,
            'label' => 'Case Study Category',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'case-study-category',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'case_taxonomy');

function register_my_menus() {
  register_nav_menus(
    array(
      'fragr1-menu' => __( 'Fragr 1' ),
      'fragr2-menu' => __( 'Fragr 2' ),
	  'bath1-menu' => __( 'Bath 1' ),
      'bath2-menu' => __( 'Bath 2' ),
	  'groom1-menu' => __( 'Grooming 1' ),
      'groom2-menu' => __( 'Grooming 2' ),
	  'gift1-menu' => __( 'Gift 1' ),
      'gift2-menu' => __( 'Gift 2' ),
	  'travel-menu' => __( 'Travel '),
	  'homefragrance-menu' => __( 'Home Fragrance'),
	  'washbags-menu' => __( 'Wallet & Washbags'),
    )
  );
}
add_action( 'init', 'register_my_menus' );

//Remove the ul tag from the menu
function wp_nav_menu_fragr_1_no_ul()
{
    $options = array(
        'echo' => false,
		'theme_location' => 'fragr1-menu',
		'depth' => '1', 
		'container' => false ,        
		'fallback_cb'=> 'default_page_menu'
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);
}

function wp_nav_menu_fragr_2_no_ul()
{
    $options = array(
        'echo' => false,
		'theme_location' => 'fragr2-menu',
		'depth' => '1', 
		'container' => false ,        
		'fallback_cb'=> 'default_page_menu'
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);
}

function wp_nav_menu_bath_1_no_ul()
{
    $options = array(
        'echo' => false,
		'theme_location' => 'bath1-menu',
		'depth' => '1', 
		'container' => false ,        
		'fallback_cb'=> 'default_page_menu'
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);
}

function wp_nav_menu_bath_2_no_ul()
{
    $options = array(
        'echo' => false,
		'theme_location' => 'bath2-menu',
		'depth' => '1', 
		'container' => false ,        
		'fallback_cb'=> 'default_page_menu'
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);
}


function wp_nav_menu_travel_no_ul()
{
    $options = array(
        'echo' => false,
		'theme_location' => 'travel-menu',
		'depth' => '1', 
		'container' => false ,        
		'fallback_cb'=> 'default_page_menu'
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);
}



function wp_nav_menu_groom_1_no_ul()
{
    $options = array(
        'echo' => false,
		'theme_location' => 'groom1-menu',
		'depth' => '1', 
		'container' => false ,        
		'fallback_cb'=> 'default_page_menu'
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);
}

function wp_nav_menu_groom_2_no_ul()
{
    $options = array(
        'echo' => false,
		'theme_location' => 'groom2-menu',
		'depth' => '1', 
		'container' => false ,        
		'fallback_cb'=> 'default_page_menu'
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);
}

function wp_nav_menu_gift_1_no_ul()
{
    $options = array(
        'echo' => false,
		'theme_location' => 'gift1-menu',
		'depth' => '1', 
		'container' => false ,        
		'fallback_cb'=> 'default_page_menu'
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);
}

function wp_nav_menu_gift_2_no_ul()
{
    $options = array(
        'echo' => false,
		'theme_location' => 'gift2-menu',
		'depth' => '1', 
		'container' => false ,        
		'fallback_cb'=> 'default_page_menu'
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);
}

function wp_nav_menu_home_fragrance_no_ul()
{
    $options = array(
        'echo' => false,
		'theme_location' => 'homefragrance-menu',
		'depth' => '1', 
		'container' => false ,        
		'fallback_cb'=> 'default_page_menu'
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);
}

function wp_nav_menu_washbags_no_ul()
{
    $options = array(
        'echo' => false,
		'theme_location' => 'washbags-menu',
		'depth' => '1', 
		'container' => false ,        
		'fallback_cb'=> 'default_page_menu'
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);
}

function default_page_menu() {
   wp_list_pages('title_li=');
} 

// Add text to EU product page
if (stripos($_SERVER['REQUEST_URI'], 'eu/fragrance' )!==false) {
function so_43922864_add_content(){
    echo '<p><strong>Duties import included</strong></p>';
}
add_action( 'woocommerce_single_product_summary', 'so_43922864_add_content', 15 );
}

// Add mobile footer link
add_filter( 'storefront_handheld_footer_bar_links', 'jk_remove_handheld_footer_links' );
function jk_remove_handheld_footer_links( $links ) {
	unset( $links['my-account'] );
	unset( $links['search'] );
	unset( $links['cart'] );

	return $links;
}

add_filter( 'storefront_handheld_footer_bar_links', 'jk_add_home_link' );
function jk_add_home_link( $links ) {

	$new_links = array(
		'my-account' => array(
			'priority' => 10,
			'callback' => 'storefront_handheld_footer_bar_account_link',
		),
		'home' => array(
			'priority' => 20,
			'callback' => 'jk_home_link',
		),
        'homelast' => array(
			'priority' => 40,
			'callback' => 'jk_home_last',
		),
		'cart'       => array(
			'priority' => 30,
			'callback' => 'storefront_handheld_footer_bar_cart_link',
		),
	);

	$links = array_merge( $new_links, $links );

	return $links;
}

function jk_home_link() {
            if (stripos($_SERVER['REQUEST_URI'], 'eu/fragrance' )!==false) {
                echo '<a href="tel:+442089837400">' . __( 'Contact' ) . '</a>';
            } elseif (stripos($_SERVER['REQUEST_URI'], 'us/fragrance' )!==false) {
                echo '<a href="tel:+442089837400">' . __( 'Contact' ) . '</a>';
            } else {
                echo '<a href="tel:02089837400">' . __( 'Contact' ) . '</a>';
            }
}

function jk_home_last() {
	echo '<a href="' . esc_url( home_url( '/rewards-club' ) ) . '">' . __( 'LAST' ) . '</a>';
}