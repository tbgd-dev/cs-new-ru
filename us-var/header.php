<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KDZL9K3');</script>
<!-- End Google Tag Manager -->

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta name="facebook-domain-verification" content="5aqs61ahogm0l54r0rea8l0f1fpdid" />

    <?php wp_head(); ?>

    <link rel="preload" type="text/css" media="screen" href="https://use.typekit.net/ovp8rnc.css" as="style" defer />
	<link href="https://use.typekit.net/ovp8rnc.css" rel="stylesheet" defer>
    
    <link rel="preload" type="text/css" media="screen" href="<?php echo get_bloginfo('url') ?>/wp-content/themes/storefront-child-C%26S/style-main.css" as="style" defer />
	<link href="<?php echo get_bloginfo('url') ?>/wp-content/themes/storefront-child-C%26S/style-main.css" rel="stylesheet" defer>
	
	<link rel="preload" type="text/css" media="screen" href="<?php echo get_bloginfo('url') ?>/wp-content/themes/storefront-child-C%26S/css/c_and_s_new.css" as="style" defer />
    <link href="<?php echo get_bloginfo('url') ?>/wp-content/themes/storefront-child-C%26S/css/c_and_s_new.css" rel="stylesheet" defer>

    <script src="https://cdn-widgetsrepository.yotpo.com/v1/loader/BmQGWq73OP8n54c0lcO3aA" async></script>
    
</head>

<body <?php body_class(); ?>>

    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KDZL9K3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <?php do_action( 'storefront_before_site' ); ?>

    <div id="page"
        class="hfeed site <?php if( is_front_page() ): ?><?php if( get_field('info_bar', 'option') ): ?>has-info-bar<?php endif; ?><?php endif; ?>">

        <!--<div class="header">
				<a href="#menu"><span></span></a>
			</div>-->
        <div class="header Fixed" style="z-index:999;">
            <button id="hamburger_toggle" class="hamburger hamburger--collapse" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
            <?php if ( wp_is_mobile() ) { ?><?php echo do_shortcode('[wcas-search-form]'); ?><?php } else { ?><?php } ?>
        </div>

        <div class="languages-main Fixed">
            <div class="language">
                <div class="language-hold">
                    <span style="font-size:80%;">Currency</span>
                    <a class="flag flag-uk" href="https://www.czechandspeake.com/fragrance/">
                        GBP £ </a>
                    <a class="flag flag-us" href="https://www.czechandspeake.com/us/fragrance/">
                        USD $ </a>
                    <a class="flag flag-eu" href="https://www.czechandspeake.com/eu/fragrance/">
                        EUR € </a>
                    <span class="close-lan">CLOSE</span>
                </div>
            </div>
        </div>

        <?php do_action( 'storefront_before_header' ); ?>

        <header id="masthead"
            class="site-header Fixed <?php if( is_front_page() ): ?><?php if( get_field('info_bar', 'option') ): ?>has-info-bar<?php endif; ?><?php endif; ?>"
            role="banner" style="<?php storefront_header_styles(); ?>">
            <?php if( is_front_page() ): ?>		

            <?php if( have_rows('info_bars', 'option') ): ?>    
                <?php $count = 0;
                $locations = get_field('info_bars', 'option');
                if (is_array($locations)) {
                $count = count($locations);
                } ?> 
			 <section class="info-strapline">
                <div class="container-max textpadding_lg contentpadding_exsm">
					<div class="info-bars info-anim-<?php echo $count; ?>">
					<?php while( have_rows('info_bars', 'option') ): the_row(); 
					// vars
					$content = get_sub_field('info');
					?>
					<div class="simplefade- simplefade-1-<?php echo get_row_index(); ?>"><?php echo $content; ?></div>
					<?php endwhile; ?>
					</div>
					</div>
            	</section>
			<?php endif; ?>

            <?php endif; ?>

            <div class="col-full">
                
                <?php the_field('country_code', 'options'); ?>
                <div class="header-account">
                    <a href="<?php echo get_bloginfo('url') ?>/my-account/"></a>					
                </div>
            
                <?php
				/**
				 * Functions hooked into storefront_header action
				 *
				 * @hooked storefront_skip_links                       - 0
				 * @hooked storefront_social_icons                     - 10
				 * @hooked storefront_site_branding                    - 20
				 * @hooked storefront_secondary_navigation             - 30
				 * @hooked storefront_product_search                   - 40
				 * @hooked storefront_primary_navigation_wrapper       - 42
				 * @hooked storefront_primary_navigation               - 50
				 * @hooked storefront_header_cart                      - 60
				 * @hooked storefront_primary_navigation_wrapper_close - 68
				 */
				do_action( 'storefront_header' );
				?>

            </div>

            <div class="container-fluid textcenter pre-mega-holder">
                <div class="row">
                    <div class="three columns">
                        <div class="pre-mega pre-mega-left">
                            <div><a href="https://www.czechandspeake.com/fragrance">Aromatic</a>
                            </div>
                            <div><a href="https://www.czechandspeake.com/bathrooms">Bathroom</a> </div>
                        </div>
                    </div>
                    <div class="four columns">
                    <?php if ( wp_is_mobile() ) { ?><?php } else { ?><?php echo do_shortcode('[wcas-search-form]'); ?><?php } ?>
                    </div>
                    <div class="three columns pre-mega">
                        <div class="pre-mega">
                            <div><a href="https://www.czechandspeake.com/fragrance/press/">Press</a></div>
                            <div><a href="https://www.czechandspeake.com/fragrance/journal/">Journal</a></div>
                            <div><a href="https://www.czechandspeake.com/contact/">Contact</a></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="megamenu-wrapper">
                <!-- begin nav -->
                <div class="maxmega-allclose"></div>
                <nav id="megamenu" class="megamenu">
                <div class="mega-navbar"><a href="#">Aromatic</a><a href="https://www.czechandspeake.com/bathrooms/">Bathrooms</a></div>
                
                    <ul id="menu">
                        <li class="maxmega-first"><a href="<?php echo get_bloginfo('url') ?>/about/" class="megamenu-arrow">About</a>
                        <div class="maxmega-next"></div>
                            <div class="mega animate">
                                <div class="maxmega">
                                    <div class="maxmega-close">CLOSE</div>
                                    <div class="row">
                                        <div class="one-third columns textcenter">
                                            <div>
                                                <div class="responsiveimage responsiveimagepad responsiveimage-ratio5"
                                                    style="margin-bottom:20px; cursor:pointer;"
                                                    onclick="location.href='<?php the_field('about_url_1', 'option'); ?>';">                                                    
                                                        <?php 
                                                        $image = get_field('about_image_1', 'option');
                                                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                                        if( $image ) {
                                                            echo wp_get_attachment_image( $image, $size );
                                                        } ?>
                                                    </div>
                                            </div>
                                            <p style="margin:0px;">
                                                <?php the_field('about_text_1', 'option'); ?>
                                            </p>
                                            <p class="responsivelink" style="margin-top:-10px;"><a
                                                    href="<?php the_field('about_url_1', 'option'); ?>">VIEW</a>
                                            </p>
                                        </div>
                                        <div class="one-third columns textcenter">
                                            <div>
                                                <div class="responsiveimage responsiveimagepad responsiveimage-ratio5"
                                                    style=" margin-bottom:20px; cursor:pointer;"
                                                    onclick="location.href='<?php the_field('about_url_2', 'option'); ?>';">
                                                    <?php 
                                                        $image = get_field('about_image_2', 'option');
                                                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                                        if( $image ) {
                                                            echo wp_get_attachment_image( $image, $size );
                                                        } ?></div>
                                            </div>
                                            <p style="margin:0px;">
                                                <?php the_field('about_text_2', 'option'); ?>
                                            </p>
                                            <p class="responsivelink" style="margin-top:-10px;"><a
                                                    href="<?php the_field('about_url_2', 'option'); ?>">VIEW</a>
                                            </p>
                                        </div>
                                        <div class="one-third columns textcenter">
                                            <div>
                                                <div class="responsiveimage responsiveimagepad responsiveimage-ratio5"
                                                    style="margin-bottom:20px; cursor:pointer;"
                                                    onclick="location.href='<?php the_field('about_url_3', 'option'); ?>';">
                                                    <?php 
                                                        $image = get_field('about_image_3', 'option');
                                                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                                        if( $image ) {
                                                            echo wp_get_attachment_image( $image, $size );
                                                        } ?></div>
                                            </div>
                                            <p style="margin:0px;">
                                                <?php the_field('about_text_3', 'option'); ?>
                                            </p>
                                            <p class="responsivelink" style="margin-top:-10px;"><a
                                                    href="<?php the_field('about_url_3', 'option'); ?>">VIEW</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="maxmega-first"><a href="<?php echo get_bloginfo('url') ?>/product-category/all-fragrance/"
                                class="megamenu-arrow">Fragrance</a>
                                <div class="maxmega-next"></div>
                            <div class="mega animate">
                                <div class="maxmega">
                                    <div class="maxmega-close">CLOSE</div>
                                    <div class="row">
                                        <div class="seven columns">
                                            <?php wp_nav_menu( array('menu' => 'Mega Menu - Fragrance Col 1', 'menu_class' => 'navlist', 'depth' => '1', 'container' => false )); ?>
                                            <?php wp_nav_menu( array('menu' => 'Mega Menu - Fragrance Col 2', 'menu_class' => 'navlist-last', 'depth' => '1', 'container' => false )); ?>
                                        </div>
                                        <div class="three columns textcenter megaadvert">
                                            <div class="responsiveimage responsiveimage-ratio5"
                                                style="margin-bottom:20px; cursor:pointer;"
                                                onclick="location.href='<?php the_field('frangrance_image_url', 'option'); ?>';">
                                                <?php 
                                                        $image = get_field('fragrance_image', 'option');
                                                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                                        if( $image ) {
                                                            echo wp_get_attachment_image( $image, $size );
                                                        } ?></div>
                                            <?php the_field('fragrance_text', 'option'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="maxmega-first"><a href="<?php echo get_bloginfo('url') ?>/product-category/traveller/"
                                class="megamenu-arrow">Travel</a>
                                <div class="maxmega-next"></div>
                            <div class="mega animate">
                                <div class="maxmega">
                                    <div class="maxmega-close">CLOSE</div>
                                    <div class="row">
                                        <div class="seven columns">
                                            <?php wp_nav_menu( array('menu' => 'Mega Menu - Travel Col 1', 'menu_class' => 'navlist', 'depth' => '1', 'container' => false )); ?>

                                        </div>
                                        <div class="three columns textcenter megaadvert">
                                            <div class="responsiveimage responsiveimage-ratio5"
                                                style="margin-bottom:20px; cursor:pointer;"
                                                onclick="location.href='<?php the_field('travel_image_url', 'option'); ?>';">
                                                <?php 
                                                        $image = get_field('travel_image', 'option');
                                                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                                        if( $image ) {
                                                            echo wp_get_attachment_image( $image, $size );
                                                        } ?></div>
                                            <?php the_field('travel_text', 'option'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="maxmega-first"><a href="<?php echo get_bloginfo('url') ?>/product-category/grooming/"
                                class="megamenu-arrow">Grooming</a>
                                <div class="maxmega-next"></div>
                            <div class="mega animate">
                                <div class="maxmega">
                                    <div class="maxmega-close">CLOSE</div>
                                    <div class="row">
                                        <div class="seven columns">
                                            <?php wp_nav_menu( array('menu' => 'Mega Menu - Grooming Col 1', 'menu_class' => 'navlist', 'depth' => '1', 'container' => false )); ?>
                                            <?php wp_nav_menu( array('menu' => 'Mega Menu - Grooming Col 2', 'menu_class' => 'navlist-last', 'depth' => '1', 'container' => false )); ?>

                                        </div>
                                        <div class="three columns textcenter megaadvert">
                                            <div class="responsiveimage responsiveimage-ratio5"
                                                style="margin-bottom:20px; cursor:pointer;"
                                                onclick="location.href='<?php the_field('grooming_image_url', 'option'); ?>';">
                                                <?php 
                                                        $image = get_field('grooming_image', 'option');
                                                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                                        if( $image ) {
                                                            echo wp_get_attachment_image( $image, $size );
                                                        } ?></div>
                                            <?php the_field('grooming_text', 'option'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="maxmega-first"><a href="<?php echo get_bloginfo('url') ?>/product-category/bath-body/"
                                class="megamenu-arrow">Bath &amp; Body</a>
                                <div class="maxmega-next"></div>
                            <div class="mega animate">
                                <div class="maxmega">
                                    <div class="maxmega-close">CLOSE</div>
                                    <div class="row">
                                        <div class="seven columns">
                                            <?php wp_nav_menu( array('menu' => 'Mega Menu - Bathing Col 1', 'menu_class' => 'navlist', 'depth' => '1', 'container' => false )); ?>
                                            <?php wp_nav_menu( array('menu' => 'Mega Menu - Bathing Col 2', 'menu_class' => 'navlist-last', 'depth' => '1', 'container' => false )); ?>

                                        </div>
                                        <div class="three columns textcenter megaadvert">
                                            <div class="responsiveimage responsiveimage-ratio5"
                                                style="margin-bottom:20px; cursor:pointer;"
                                                onclick="location.href='<?php the_field('bathing_image_url', 'option'); ?>';">
                                                <?php 
                                                        $image = get_field('bathing_image', 'option');
                                                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                                        if( $image ) {
                                                            echo wp_get_attachment_image( $image, $size );
                                                        } ?></div>
                                            <?php the_field('bathing_text', 'option'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="maxmega-first"><a href="<?php echo get_bloginfo('url') ?>/product-category/all-wallets-washbags/"
                                class="megamenu-arrow">Wallets &amp; Washbags</a>
                                <div class="maxmega-next"></div>
                            <div class="mega animate">
                                <div class="maxmega">
                                    <div class="maxmega-close">CLOSE</div>
                                    <div class="row">
                                        <div class="seven columns">
                                            <?php wp_nav_menu( array('menu' => 'Mega Menu - Washbags Col 1', 'menu_class' => 'navlist', 'depth' => '1', 'container' => false )); ?>

                                        </div>
                                        <div class="three columns textcenter megaadvert">
                                            <div class="responsiveimage responsiveimage-ratio5"
                                                style="margin-bottom:20px; cursor:pointer;"
                                                onclick="location.href='<?php the_field('washbags_image_url', 'option'); ?>';">
                                                <?php 
                                                        $image = get_field('washbags_image', 'option');
                                                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                                        if( $image ) {
                                                            echo wp_get_attachment_image( $image, $size );
                                                        } ?></div>
                                            <?php the_field('washbags_text', 'option'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="maxmega-first"><a href="<?php echo get_bloginfo('url') ?>/product-category/home-fragrance/"
                                class="megamenu-arrow">Home Fragrance</a>
                                <div class="maxmega-next"></div>
                            <div class="mega animate">
                                <div class="maxmega">
                                    <div class="maxmega-close">CLOSE</div>
                                    <div class="row">
                                        <div class="seven columns">
                                            <?php wp_nav_menu( array('menu' => 'Mega Menu - Home Fragrance Col 1', 'menu_class' => 'navlist', 'depth' => '1', 'container' => false )); ?>

                                        </div>
                                        <div class="three columns textcenter megaadvert">
                                            <div class="responsiveimage responsiveimage-ratio5"
                                                style="margin-bottom:20px; cursor:pointer;"
                                                onclick="location.href='<?php the_field('hfragrance_image_url', 'option'); ?>';">
                                                <?php 
                                                        $image = get_field('hfragrance_image', 'option');
                                                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                                        if( $image ) {
                                                            echo wp_get_attachment_image( $image, $size );
                                                        } ?></div>
                                            <?php the_field('hfragrance_text', 'option'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="maxmega-first"><a href="<?php the_field('gifts_tab_url', 'option'); ?>"
                                class="megamenu-arrow"><?php the_field('gifts_tab_text', 'option'); ?></a>
                                <div class="maxmega-next"></div>
                            <div class="mega animate">
                                <div class="maxmega">
                                    <div class="maxmega-close">CLOSE</div>
                                    <div class="row">
                                        <div class="seven columns">
                                            <?php wp_nav_menu( array('menu' => 'Mega Menu - Gifts Col 1', 'menu_class' => 'navlist', 'depth' => '1', 'container' => false )); ?>
                                            <?php wp_nav_menu( array('menu' => 'Mega Menu - Gifts Col 2', 'menu_class' => 'navlist-last', 'depth' => '1', 'container' => false )); ?>

                                        </div>
                                        <div class="three columns textcenter megaadvert">
                                            <div class="responsiveimage responsiveimage-ratio5"
                                                style="margin-bottom:20px; cursor:pointer;"
                                                onclick="location.href='<?php the_field('gifts_image_url', 'option'); ?>';">
                                                <?php 
                                                        $image = get_field('gifts_image', 'option');
                                                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                                        if( $image ) {
                                                            echo wp_get_attachment_image( $image, $size );
                                                        } ?></div>
                                            <?php the_field('gifts_text', 'option'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php if( get_field('hide_sale_from_menu', 'option') ): ?>
                        <li class="maxmega-first"><a href="<?php the_field('sale_tab_url', 'option'); ?>"
                                class="megamenu-arrow"><?php the_field('sale_tab_text', 'option'); ?></a>
                                <div class="maxmega-next"></div>
                            <div class="mega animate">
                                <div class="maxmega">
                                    <div class="maxmega-close">CLOSE</div>
                                    <div class="row">
                                        <div class="one-quarter columns textcenter">
                                            <?php $image = get_field('sale_image_1', 'option'); if( !empty($image) ): ?>
                                            <div>
                                                <div class="responsiveimage responsiveimagepad responsiveimage-ratio5"
                                                    style="background-image:url(<?php echo $image['sizes']['medium']; ?>); margin-bottom:20px; cursor:pointer;"
                                                    onclick="location.href='<?php the_field('sale_url_1', 'option'); ?>';">
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <p style="margin:0px;">
                                                <?php the_field('sale_text_1', 'option'); ?>
                                            </p>
                                            <p class="responsivelink" style="margin-top:-10px;"><a
                                                    href="<?php the_field('sale_url_1', 'option'); ?>">VIEW</a>
                                            </p>
                                        </div>
                                        <div class="one-quarter columns textcenter">
                                            <?php $image = get_field('sale_image_2', 'option'); if( !empty($image) ): ?>
                                            <div>
                                                <div class="responsiveimage responsiveimagepad responsiveimage-ratio5"
                                                    style="background-image:url(<?php echo $image['sizes']['medium']; ?>); margin-bottom:20px; cursor:pointer;"
                                                    onclick="location.href='<?php the_field('sale_url_2', 'option'); ?>';">
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <p style="margin:0px;">
                                                <?php the_field('sale_text_2', 'option'); ?>
                                            </p>
                                            <p class="responsivelink" style="margin-top:-10px;"><a
                                                    href="<?php the_field('sale_url_2', 'option'); ?>">VIEW</a>
                                            </p>
                                        </div>
                                        <div class="one-quarter columns textcenter">
                                            <?php $image = get_field('sale_image_3', 'option'); if( !empty($image) ): ?>
                                            <div>
                                                <div class="responsiveimage responsiveimagepad responsiveimage-ratio5"
                                                    style="background-image:url(<?php echo $image['sizes']['medium']; ?>); margin-bottom:20px; cursor:pointer;"
                                                    onclick="location.href='<?php the_field('sale_url_3', 'option'); ?>';">
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <p style="margin:0px;">
                                                <?php the_field('sale_text_3', 'option'); ?>
                                            </p>
                                            <p class="responsivelink" style="margin-top:-10px;"><a
                                                    href="<?php the_field('sale_url_3', 'option'); ?>">VIEW</a>
                                            </p>
                                        </div>
                                        <div class="one-quarter columns textcenter">
                                            <?php $image = get_field('sale_image_4', 'option'); if( !empty($image) ): ?>
                                            <div>
                                                <div class="responsiveimage responsiveimagepad responsiveimage-ratio5"
                                                    style="background-image:url(<?php echo $image['sizes']['medium']; ?>); margin-bottom:20px; cursor:pointer;"
                                                    onclick="location.href='<?php the_field('sale_url_4', 'option'); ?>';">
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <p style="margin:0px;">
                                                <?php the_field('sale_text_4', 'option'); ?>
                                            </p>
                                            <p class="responsivelink" style="margin-top:-10px;"><a
                                                    href="<?php the_field('sale_url_4', 'option'); ?>">VIEW</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <!-- /nav -->
            </div>
            

        </header>
        <!-- #masthead -->
        <?php
		/**
		 * Functions hooked in to storefront_before_content
		 *
		 * @hooked storefront_header_widget_region - 10
		 */
		do_action( 'storefront_before_content' );
		?>

        <?php if( have_rows( 'flexible_home' ) ) { ?>

        <div id="contentfull" class="site-content" tabindex="-1">
            <div class="col-full-home">
                <?php } else { ?>
                <div id="content" class="site-content" tabindex="-1">
                    <div class="col-full">
                        <?php } ?>

                        <?php
						/**
						 * Functions hooked in to storefront_content_top
						 *
						 * @hooked woocommerce_breadcrumb - 10
						 */
						do_action( 'storefront_content_top' );