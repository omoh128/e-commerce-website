<?php
/**
 *WooCommerce page content.
 *
 * @package Product_Theme
 */

get_header();
?>
<section class="products section container" id="products">
    <h2 class="section__title">
        Products
    </h2>

    <div class="products__container grid">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                ?>
                <article class="products__card">
                    <?php the_post_thumbnail('shop_catalog', array('class' => 'products__img')); ?>
                    <h3 class="products__title"><?php the_title(); ?></h3>
                    <span class="products__price"><?php echo wc_price(get_post_meta(get_the_ID(), '_price', true)); ?></span>
                    <button class="products__button">
                        <i class='bx bx-shopping-bag'></i>
                    </button>
                </article>
                <?php
            }
        }
        ?>
    </div>
</section>

<?php
get_footer();
?>
