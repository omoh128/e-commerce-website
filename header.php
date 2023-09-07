<?php
/**
 *header
 *
 * @package Products_Theme
 */

?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>assets/img/favicon.png" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="<?php echo esc_url( home_url('/') ) ; ?>" class="nav__logo">
                <i class='bx bxs-watch nav__logo-icon'></i> Rolex
            </a>
            <div class="nav__menu" id="nav-menu">
                <?php
        wp_nav_menu( array(
            'theme_location' => 'header-menu',
            'container'      => 'div',
            'container_id'   => 'nav-menu',
            'menu_class'     => 'nav__list',
        ) );
        ?>

                <div class="nav__close" id="nav-close">
                    <i class='bx bx-x'></i>
                </div>
            </div>
            <div class="nav__btns">
                <!-- Theme change button -->
                <i class='bx bx-moon change-theme' id="theme-button"></i>

                <div class="nav__shop" id="cart-shop">
                    <a href="<?php echo wc_get_cart_url(); ?>">
                        <i class='bx bx-shopping-bag'></i>
                        <?php
        $cart_count = WC()->cart->get_cart_contents_count();
        if ($cart_count > 0) {
            echo '<span class="cart__count">' . esc_html($cart_count) . '</span>';
        }
        ?>
                    </a>
                </div>


                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>
            </div>
        </nav>
    </header>