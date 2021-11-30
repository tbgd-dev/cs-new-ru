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

<!-- Tiktok -->
<script>
		!function (w, d, t) {
		  w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i="https://analytics.tiktok.com/i18n/pixel/events.js";ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};var o=document.createElement("script");o.type="text/javascript",o.async=!0,o.src=i+"?sdkid="+e+"&lib="+t;var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(o,a)};
		
		  ttq.load('C59ELNK6J7TSRVQBGVUG');
		  ttq.page();
		}(window, document, 'ttq');
	</script>
	<!-- Tiktok -->

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
        class="hfeed site <?php if( is_front_page() ): ?><?php if ( have_rows('info_bars', 'options') ) { ?>has-info-bar<?php } else { ?>has-noinfo-bar<?php } ?><?php endif; ?> <?php the_field('dark_or_light_header'); ?> <?php if ( get_field('no88_club', 'options') ) { ?>88_club<?php } else { ?>no_88_club<?php } ?>">

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
                    <a class="flag flag-uk flag-uk-land" href="https://www.czechandspeake.com/fragrance/">
                        GBP £ </a>
                    <a class="flag flag-us" href="https://www.czechandspeake.com/us/fragrance/">
                        USD $ </a>
                    <a class="flag flag-eu" href="https://www.czechandspeake.com/eu/fragrance/">
                        EUR € </a>
                        <a class="flag flag-jp" href="https://www.czechandspeake.com/ru/fragrance/">
                        RUB ₽ </a>
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
                    <div class="three columns pre-mega pre-mega-right">

                    <?php if ( get_field('no88_club', 'options') ) { ?>
                        <div class="pre-mega">
                            <div><a href="<?php echo get_bloginfo('url') ?>/rewards-club/"><img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/storefront-child-C%26S/images/88-l-club.svg" alt="Loyalty Club" /></a>
                            </div>
                            <div><a href="https://www.czechandspeake.com/ru/fragrance/press/">Press</a>
                            </div>
                            <div><a href="https://www.czechandspeake.com/ru/fragrance/journal/">Journal</a> </div>
                        </div>
                    <?php } else { ?>
                        <div class="pre-mega">
                            <div><a href="https://www.czechandspeake.com/ru/fragrance/press/">Press</a>
                            </div>
                            <div><a href="https://www.czechandspeake.com/ru/fragrance/journal/">Journal</a> </div>
                            <div><a href="https://www.czechandspeake.com/ru/fragrance/contact/">Contact</a>
                            </div>
                        </div>
                    <?php } ?>

                    </div>
                </div>
            </div>

            <div class="col-full">
            <div class="cs-store">
                <?php the_field('country_code', 'options'); ?>
                <div class="language-hold language-hold-desk">
                    <span style="font-size:80%;">Currency</span>
                    <a class="flag" href="https://www.czechandspeake.com/fragrance/"><span class="cs-flag flag-nested flag-uk"></span>
                        GBP £ </a>
                    <a class="flag" href="https://www.czechandspeake.com/us/fragrance/"><span class="cs-flag flag-nested flag-us"></span>
                        USD $ </a>
                    <a class="flag" href="https://www.czechandspeake.com/eu/fragrance/"><span class="cs-flag flag-nested flag-eu"></span>
                        EUR € </a>
                        <a class="flag" href="https://www.czechandspeake.com/ru/fragrance/"><span class="cs-flag flag-nested flag-jp"></span>
                        RUB ₽ </a>
                </div>
                </div>
                <?php global $current_user; wp_get_current_user(); ?>
                <?php if (!is_user_logged_in()) :?>
                    <div class="header-account"><a href="<?php echo get_bloginfo('url') ?>/my-account/" class="header-account-first"></a></div>
                    <?php else : ?>
                        <div class="header-account"><div class="header-account-first">&nbsp;
                        <div class="header-account-menu"><p>Welcome: <?php echo $current_user->display_name; ?></p>
                        <button type=button onClick="location.href='<?php echo get_bloginfo('url') ?>/my-account/edit-account/'">Details &amp; Password</button>
                        <button type=button onClick="location.href='<?php echo get_bloginfo('url') ?>/my-account/edit-address/'">Address Book</button>
                        <button type=button onClick="location.href='<?php echo get_bloginfo('url') ?>/my-account/orders/'">Orders</button>
                        <?php if ( get_field('no88_club', 'options') ) { ?>
                        <button type=button onClick="location.href='<?php echo get_bloginfo('url') ?>/rewards-club/'">No.88 Loyalty Club</button><?php } else { ?><?php } ?>
                        <button type=button onClick="location.href='<?php echo get_bloginfo('url') ?>/product-category/private-members-sale/'" style="display:none;">Member’s Sale</button>

                        <button type=button onClick="location.href='<?php echo wp_logout_url( home_url() ); ?>'">Logout</button>
                        </div></div></div>
                    <?php endif; ?>
                            
                    <div class="header-tel"><div class="header-tel-first">&nbsp;
                    <div class="header-tel-menu">
                    <a href="tel:<?php the_field('phone_number_in_header', 'options'); ?>">03-5342-0771</a>
                        </div>    
                    </div>
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
            
            <div id="megamenu-wrapper">
                <!-- begin nav -->
                <div class="maxmega-allclose"></div>
                <nav id="megamenu" class="megamenu">
                <div class="mega-navbar"><a href="#">Aromatic</a><a href="https://www.czechandspeake.com/bathrooms/">Bathrooms</a></div>
                
                    <ul id="menu">
                    <li><a href="<?php echo get_bloginfo('url') ?>/welcome-to-czech-speake/" class="megamenu-arrow-">Welcome to C&S</a></li>
                    <li><a href="<?php echo get_bloginfo('url') ?>/shop/" class="megamenu-arrow-">Shop</a></li>
                    <li><a href="<?php echo get_bloginfo('url') ?>/stockist-list/" class="megamenu-arrow-">Stockists</a></li>
                    <li><a href="<?php echo get_bloginfo('url') ?>/contact/" class="megamenu-arrow-">Contact</a></li>
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