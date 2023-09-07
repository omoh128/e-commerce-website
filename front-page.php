<?php
/**
 * The font-page.
 *
 * @package Product_Theme
 */

get_header();
?>
<!--==================== CART ====================-->
<div class="cart" id="cart">
    <i class='bx bx-x cart__close' id="cart-close"></i>

    <h2 class="cart__title-center">My Cart</h2>

    <div class="cart__container">
        <?php
        // Get cart contents
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
        ?>
        <article class="cart__card">
            <div class="cart__box">
                <?php echo $_product->get_image('shop_thumbnail', array('class' => 'cart__img')); ?>
            </div>

            <div class="cart__details">
                <h3 class="cart__title"><?php echo $_product->get_name(); ?></h3>
                <span class="cart__price"><?php echo $_product->get_price_html(); ?></span>

                <div class="cart__amount">
                    <div class="cart__amount-content">
                        <span class="cart__amount-box">
                            <i class='bx bx-minus'></i>
                        </span>

                        <span class="cart__amount-number"><?php echo $cart_item['quantity']; ?></span>

                        <span class="cart__amount-box">
                            <i class='bx bx-plus'></i>
                        </span>
                    </div>

                    <a href="<?php echo esc_url(wc_get_cart_remove_url($cart_item_key)); ?>"
                        class="bx bx-trash-alt cart__amount-trash"></a>
                </div>
            </div>
        </article>
        <?php
        }
        ?>
    </div>

    <div class="cart__prices">
        <span class="cart__prices-item"><?php echo WC()->cart->get_cart_contents_count(); ?> items</span>
        <span class="cart__prices-total"><?php echo WC()->cart->get_cart_total(); ?></span>
    </div>
</div>

<!--==================== MAIN ====================-->
<main class="main">
    <!--==================== HOME ====================-->
    <section class="home" id="home">
        <div class="home__container container grid">
            <div class="home__img-bg">
                <?php
                    $home_image_id = get_field('homeimage'); // Replace 'testimonial_image' with your ACF field name

                    if ($home_image_id) {
                        echo wp_get_attachment_image($home_image_id, 'full', false, array('class' => 'home__img'));
                    }
                    ?>
            </div>

            <div class="home__social">
                <a href="<?php echo esc_url(get_theme_mod('facebook_link', 'https://www.facebook.com/')); ?>"
                    target="_blank" class="home__social-link">
                    Facebook
                </a>
                <a href="<?php echo esc_url(get_theme_mod('twitter_link', 'https://twitter.com/')); ?>" target="_blank"
                    class="home__social-link">
                    Twitter
                </a>
                <a href="<?php echo esc_url(get_theme_mod('instagram_link', 'https://www.instagram.com/')); ?>"
                    target="_blank" class="home__social-link">
                    Instagram
                </a>
            </div>


            <div class="home__data">
                <h1 class="home__title">
                    <?php echo esc_html(get_theme_mod('home_title', 'NEW WATCH COLLECTIONS B720')); ?></h1>
                <p class="home__description">
                    <?php echo esc_html(get_theme_mod('home_description', 'Latest arrival of the new imported watches of the B720 series, with a modern and resistant design.')); ?>
                </p>

                <span class="home__price">
                    <?php echo esc_html(get_theme_mod('home_price_text', '$1245')); ?>
                </span>


                <div class="home__btns">
                    <a href="<?php echo esc_url(get_theme_mod('home_discover_link', '#')); ?>"
                        class="button button--gray button--small">
                        <?php echo esc_html(get_theme_mod('home_discover_button_text', 'Discover')); ?>
                    </a>

                    <button class="button home__button">
                        <?php echo esc_html(get_theme_mod('home_cart_button_text', 'ADD TO CART')); ?>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!--==================== FEATURED ====================-->
    <section class="featured section container" id="featured">
        <h2 class="section__title">
        <?php echo esc_html( get_field('section__titlef') ); ?>
        </h2>

        <div class="featured__container grid">

            <?php
        $featured_products = get_posts(array(
            'post_type' => 'product',  // Adjust to the actual post type for products
            'posts_per_page' => 3,     // Limit the number of featured products to 3
            'orderby' => 'date',
            'order' => 'ASC',
        ));

        foreach ($featured_products as $product) {
            $featured_title = get_post_meta($product->ID, 'featured_title', true);
            $featured_price = get_post_meta($product->ID, 'featured_price', true);
            $product_permalink = get_permalink($product->ID); // Get the product permalink

            // Generate the add-to-cart button link
            $add_to_cart_url = esc_url(apply_filters('woocommerce_loop_add_to_cart_link',
                sprintf('<a href="%s" data-quantity="1" class="button %s" %s>Add to cart</a>',
                    esc_url($product_permalink),
                    'featured__button',
                    esc_attr('product_id=' . $product->ID)
                ),
                $product->ID
            ));

            // Output the product's featured image with the specified class
            $product_thumbnail = get_the_post_thumbnail($product->ID, 'shop_catalog', array('class' => 'featured__img'));
        ?>

            <article class="featured__card">
                <span class="featured__tag">Sale</span>
                <?php echo $product_thumbnail; ?>
                <!-- Display the featured product image -->
                <div class="featured__data">
                    <h3 class="featured__title"><?php echo $featured_title; ?></h3>
                    <span class="featured__price"><?php echo $featured_price; ?></span>
                </div>
                <?php echo $add_to_cart_url; ?>
            </article>

            <?php
        }
        ?>
        </div>
    </section>

    <!--==================== STORY ====================-->
    <section class="story section container">
        <div class="story__container grid">
            <div class="story__data">
                <h2 class="section__title story__section-title">
                    <?php echo esc_html( get_field('ourstory_heading1') ); ?>
                </h2>

                <h1 class="story__title">
                    <?php echo esc_html( get_field('ourstory_heading2') ); ?>

                </h1>

                <p class="story__description">
                    <?php echo esc_html( get_field('ourstory_textarea') ); ?>

                </p>


                <a href="#" class="button button--small">Discover</a>
            </div>

            <div class="story__images">
                <?php if (get_field('ourstory_image')) : ?>
                <img src="<?php the_field('ourstory_image'); ?>" class="story__img" />
                <?php endif; ?>
                <div class="story__square">

                </div>
            </div>
        </div>
    </section>

    <!--==================== PRODUCTS ====================-->
    <section class="products section container" id="products">
        <h2 class="section__title">
        <?php echo esc_html( get_field('section__title') ); ?>
        </h2>

        <div class="products__container grid">
            <?php
        // Get valid product IDs
        $product_ids = get_posts(array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'fields' => 'ids',
        ));

        // Set a counter to limit the number of products displayed
        $max_products = 5;
        $product_counter = 0;

        foreach ($product_ids as $product_id) {
            $product = wc_get_product($product_id);

            // Check if the product is valid
            if ($product && is_a($product, 'WC_Product')) {
                $product_title = $product->get_name();
                $product_price = $product->get_price_html();

                // Increment the counter
                $product_counter++;

                // Display the product if the counter is within the limit
                if ($product_counter <= $max_products) {
                    ?>
            <article class="products__card">
                <?php
                        // Output product image
                        echo $product->get_image('shop_catalog', array('class' => 'products__img'));
                        ?>
                <h3 class="products__title"><?php echo $product_title; ?></h3>
                <span class="products__price"><?php echo $product_price; ?></span>
                <button class="products__button">
                    <i class='bx bx-shopping-bag'></i>
                    <?php echo $cart_item['quantity']; ?>
                </button>
            </article>
            <?php
                }
            } else {
                // Display a message for invalid products
                echo "<p>Product with ID $product_id not found or not a valid product.</p>";
            }

            // Break the loop if the counter reaches the limit
            if ($product_counter >= $max_products) {
                break;
            }
        }
        ?>
        </div>
    </section>

    <!--==================== NEW ====================-->
    <section class="new section container" id="new">
        <h2 class="section__title">
        <?php echo esc_html( get_field('section__titlea') ); ?>
        </h2>

        <div class="new__container">
            <div class="swiper new-swiper">
                <div class="swiper-wrapper">
                    <?php
                // Retrieve recent products
                $recent_products = wc_get_products(array(
                    'status' => 'publish',
                    'limit' => 4,
                    'orderby' => 'date',
                    'order' => 'ASC',
                ));

                foreach ($recent_products as $product) {
                    $product_title = $product->get_name();
                    $product_price = $product->get_price_html();
                ?>
                    <div class="swiper-slide">
                        <article class="new__card">
                            <span class="new__tag">New</span>

                            <?php echo $product->get_image('shop_catalog', array('class' => 'new__img')); ?>

                            <div class="new__data">
                                <h3 class="new__title"><?php echo $product_title; ?></h3>
                                <span class="new__price"><?php echo $product_price; ?></span>
                            </div>

                            <?php wc_get_template('loop/add-to-cart.php', array('product' => $product)); ?>
                        </article>
                    </div>
                    <?php
                }
                ?>
                </div>

            </div>
        </div>
    </section>


    <!--==================== NEWSLETTER ====================-->
    <section class="newsletter section container">
        <div class="newsletter__bg grid">
            <div>
                <h2 class="newsletter__title"><?php echo esc_html( get_field('newsletter__title') ); ?></h2>
                <p class="newsletter__description">
                    <?php echo esc_html( get_field('newsletter__description') ); ?>
                    
                </p>
            </div>

            <form action="" class="newsletter__subscribe">
       
                <input type="email" placeholder="Enter your email" class="newsletter__input">
                <button class="button">
                    SUBSCRIBE
                </button>
            </form>
        </div>
    </section>





    <?php
get_footer();
?>