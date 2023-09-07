<?php
/**
 * The archive
 *
 * @package Products_Theme
 */
get_header(); // Include header
?>

<section class="products section container" id="products">
    <h2 class="section__title">
        Shop
    </h2>

    <div style="background-color:black;" class="products__container grid">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="products__card">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" class="products__img-link">
                        <?php the_post_thumbnail('shop_catalog', array('class' => 'products__img')); ?>
                    </a>
                <?php endif; ?>
                <h3 class="products__title"><?php the_title(); ?></h3>
                <span class="products__price"><?php echo wc_price(get_post_meta(get_the_ID(), '_price', true)); ?></span>
                <?php woocommerce_template_loop_add_to_cart(); ?>
            </article>
        <?php endwhile; endif; ?>
    </div>
</section>

<?php get_footer(); ?>
