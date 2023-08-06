<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wolobnp-wp-theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="top-header" class="fixed-top bg-white" role="banner">
        <!-- Top Toolbar -->
        <div class="toolbar-area d-none d-lg-block bg-green px-xl-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10">
                        <ul class="contact-info d-flex flex-row oswald-font fw-light">
                            <li class="contact-info__email me-4 pe-4">
                                <i class="fa fa-envelope me-2 text-white"></i>
                                <a href="mailto: wolobnp@wolobnp.com.pl" class="text-white">wolobnp@wolobnp.com.pl</a>
                            </li>
                            <li class="contact-info__phone me-4 pe-4 text-white">
                                <i class="fa fa-phone me-2 text-white"></i>
                                <a href="tel:+48607140231" class="text-white">  +48 607 140 231</a>
                            </li>
                            <li class="contact-info__email text-white">
                                <i class="fa fa-map-marker me-2 text-white"></i>
                                HATEK Sp. z o.o., ul. Tartaczna 71, 06-100 Pułtusk
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-2">
                        <ul class="toolbar-share m-0 d-flex flex-row justify-content-end">
                            <li class="ps-4 ms-4">
                                <a href="https://www.facebook.com/wolobnp.wolobnp.902" target="_blank" class="text-white"> <i class="fa fa-facebook"></i> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-header-menu">
            <div class="container-fluid px-xl-4">
                <nav class="navbar navbar-expand-xl navbar-theme teko-font">
                    <?php if (get_theme_mod('wolobnp_wp_theme_logo')) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" class="navbar-brand align-items-center top-logo">
                            <img src="<?php echo esc_url(get_theme_mod('wolobnp_wp_theme_logo')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </a>
                    <?php endif; ?>
                    <!-- <address class="navbar-address mb-0 ms-lg-5"><i class="fa fa-phone text-green me-2"></i> <span class="text-dark">+48 23 692 77 31</span></address> -->
                    <button class="navbar-toggler navbar-light rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-end" id="main-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'container' => false,
                            'menu_class' => '',
                            'fallback_cb' => '__return_false',
                            'items_wrap' => '<ul id="%1$s" class="navbar-nav mb-2 mb-md-0 %2$s">%3$s</ul>',
                            'depth' => 3,
                            'walker' => new bs5_Walker()
                        ));
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </header>