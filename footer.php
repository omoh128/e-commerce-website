<?php
/**
 *footer.
 *
 * @package Products_Theme
 */
get_header(); // Include header
?>

</main>

<!--==================== FOOTER ====================-->
<footer class="footer section">
    <div class="footer__container container grid">
        <div class="footer__content">
            <?php if (get_theme_mod('footer_address')) : ?>
            <h3 class="footer__title"><?php echo esc_html( get_field('our-information') ); ?></h3>

            <ul class="footer__list">
                <li><?php echo esc_html(get_theme_mod('footer_address')); ?></li>
                <?php if (get_theme_mod('footer_phone')) : ?>
                <li><?php echo esc_html(get_theme_mod('footer_phone')); ?></li>
                <?php endif; ?>
                <?php if (get_theme_mod('footer_phone2')) : ?>
                <li><?php echo esc_html(get_theme_mod('footer_phone2')); ?></li>
                <?php endif; ?>
            </ul>
            <?php endif; ?>
        </div>
        <div class="footer__content">
            <h3 class="footer__title"><?php echo esc_html( get_field('about-us') ); ?></h3>


            <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer_menu',
                    'container' => 'ul',
                    'menu_class' => 'footer__links',
                ));
                ?>
        </div>

        <div class="footer__content">
            <h3 class="footer__title"><?php echo esc_html( get_field('product') ); ?></h3>

            <ul class="footer__links">
                <?php if (get_theme_mod('footer_bikes')) : ?>
                <li>
                    <a href="#" class="footer__link"><?php echo esc_html(get_theme_mod('footer_bikes')); ?></a>
                </li>
                <?php endif; ?>
                <?php if (get_theme_mod('footer_mountain')) : ?>
                <li>
                    <a href="#" class="footer__link"><?php echo esc_html(get_theme_mod('footer_mountain')); ?></a>
                </li>
                <?php endif; ?>
                <?php if (get_theme_mod('footer_electric')) : ?>
                <li>
                    <a href="#" class="footer__link"><?php echo esc_html(get_theme_mod('footer_electric')); ?></a>
                </li>
                <?php endif; ?>
                <?php if (get_theme_mod('footer_electric')) : ?>
                <li>
                    <a href="#" class="footer__link"><?php echo esc_html(get_theme_mod('footer_electric')); ?></a>
                </li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="footer__content">
            <h3 class="footer__title"><?php echo esc_html( get_field('social') ); ?></h3>

            <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-social-menu', // Replace with your menu location name
                    'container' => 'ul',
                    'menu_class' => 'footer__social',
                ));
                ?>
        </div>
    </div>

    <span class="footer__copy">&#169; Bedimcode. All rigths reserved</span>
</footer>

<!--=============== SCROLL UP ===============-->
<a href="#" class="scrollup" id="scroll-up">
    <i class='bx bx-up-arrow-alt scrollup__icon'></i>
</a>
<?php wp_footer(); ?>
</body>

</html>