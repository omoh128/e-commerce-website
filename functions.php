<?php
/**
 * Functions and definitions for Products theme.
 *
 * @package Products_Theme
 */

// Enqueue styles and scripts
function Products_theme_enqueue_styles() {
    wp_enqueue_style( 'boxicons-css', 'https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' );
   
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');
    wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/css/main.css' );
    wp_enqueue_style( 'Products-theme-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'Products_theme_enqueue_styles' );
function enqueue_custom_js() {
    //Enqueue Swiper JavaScript
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/main.js', array(), null, true );
    wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_js' );

// Register navigation menus
function register_custom_menu() {
    register_nav_menu( 'header-menu', 'Header Menu' );
}
add_action( 'after_setup_theme', 'register_custom_menu' );

// Register Footer menus
function register_footer_menu() {
    register_nav_menu('footer_menu', 'Footer Menu');
}
add_action('after_setup_theme', 'register_footer_menu');

// Register Footer menus
function register_social_menu() {
    register_nav_menu('footer-social-menu', 'Social Menu');
}
add_action('after_setup_theme', 'register_social_menu');


// Register sidebar
function Products_theme_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'Products-theme' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'Products-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'Products_theme_widgets_init' );

// Enqueue WooCommerce styles
function Products_theme_enqueue_woocommerce_styles() {
    if ( class_exists( 'WooCommerce' ) ) {
        wp_enqueue_style( 'woocommerce', get_template_directory_uri() . '/woocommerce.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'Products_theme_enqueue_woocommerce_styles' );
// setuptheme
function product_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('boxes', 437, 291, true );
    add_image_size('boxes', 150, 150, true );
    add_image_size('background', 1280, 515, true);
  }
 
 add_action('after_setup_theme', 'product_features');
 // Remove WooCommerce Styles
// Declare WooCommerce support
function Products_theme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'Products_theme_add_woocommerce_support' );



// Custom WooCommerce function
function Products_custom_wc_function() {
    // Products custom code here
    echo '<p>This is a custom WooCommerce function output.</p>';
}
add_action( 'woocommerce_before_cart', 'Products_custom_wc_function' );


add_action('wp_enqueue_scripts', 'removing_woo_styles');

function removing_woo_styles()
{
  wp_dequeue_style('wc-block-vendors-style');
  wp_dequeue_style('wc-block-style');
  wp_dequeue_style('woocommerce-general');
  wp_dequeue_style('woocommerce-layout');
  wp_dequeue_style('woocommerce-smallscreen');
}


// the custumizer

function custom_theme_customizer($wp_customize) {
    // Add Section
    $wp_customize->add_setting('facebook_link', array(
        'default' => 'https://www.facebook.com/',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_setting('twitter_link', array(
        'default' => 'https://twitter.com/',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_setting('instagram_link', array(
        'default' => 'https://www.instagram.com/',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_section('home_section', array(
        'title' => 'Home Section',
        'priority' => 30,
    ));

    // Add Settings
    $wp_customize->add_control('facebook_link_control', array(
        'label' => 'Facebook Link',
        'section' => 'home_section',
        'settings' => 'facebook_link',
        'type' => 'url',
    ));
    
    $wp_customize->add_control('twitter_link_control', array(
        'label' => 'Twitter Link',
        'section' => 'home_section',
        'settings' => 'twitter_link',
        'type' => 'url',
    ));
    
    $wp_customize->add_control('instagram_link_control', array(
        'label' => 'Instagram Link',
        'section' => 'home_section',
        'settings' => 'instagram_link',
        'type' => 'url',
    ));
    
    $wp_customize->add_setting('home_title', array(
        'default' => 'NEW WATCH COLLECTIONS B720',
        'transport' => 'refresh',
    ));

    $wp_customize->add_setting('home_description', array(
        'default' => 'Latest arrival of the new imported watches of the B720 series, with a modern and resistant design.',
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('home_price_text', array(
        'default' => '$1245',
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('home_button_text', array(
        'default' => 'Discover',
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('home_cart_button_text', array(
        'default' => 'ADD TO CART',
        'transport' => 'refresh',
    ));
   
    
    // Add Controls
    $wp_customize->add_control('home_title_control', array(
        'label' => 'Home Title',
        'section' => 'home_section',
        'settings' => 'home_title',
        'type' => 'text',
    ));

    $wp_customize->add_control('home_description_control', array(
        'label' => 'Home Description',
        'section' => 'home_section',
        'settings' => 'home_description',
        'type' => 'textarea',
    ));
    $wp_customize->add_control('home_button_text_control', array(
        'label' => 'Button Text',
        'section' => 'home_section',
        'settings' => 'home_button_text',
        'type' => 'text',
    ));

    $wp_customize->add_control('home_cart_button_text_control', array(
        'label' => 'Cart Button Text',
        'section' => 'home_section',
        'settings' => 'home_cart_button_text',
        'type' => 'text',
    ));
    
    
}
add_action('customize_register', 'custom_theme_customizer');

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );


// Add a custom section to the WordPress Customizer
function custom_footer_customizer_section($wp_customize) {
    $wp_customize->add_section('custom_footer', array(
        'title' => 'Footer Information',
        'priority' => 120,
    ));

    // Add settings for footer information
    $wp_customize->add_setting('footer_address', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_setting('footer_phone', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('footer_phone2', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
   

    

    // Add controls for settings
    $wp_customize->add_control('footer_address', array(
        'label' => 'Footer Address',
        'section' => 'custom_footer',
        'type' => 'text',
    ));

    $wp_customize->add_control('footer_phone', array(
        'label' => 'Footer Phone Number',
        'section' => 'custom_footer',
        'type' => 'text',
    ));

    $wp_customize->add_control('footer_phone2', array(
        'label' => 'Footer Phone Number',
        'section' => 'custom_footer',
        'type' => 'text',
    ));

}
add_action('customize_register', 'custom_footer_customizer_section');




// Add a custom section to the WordPress Customizer
function custom_footer_customizer_sectiontwo($wp_customize) {
    $wp_customize->add_section('custom_footer', array(
        'title' => 'Footer Product',
        'priority' => 125,
    ));

    // Add settings for footer Product
    $wp_customize->add_setting('footer_bikes', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_setting('footer_mountain', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('footer_electric', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('footer_accesories', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));


 // Add controls for settings
 $wp_customize->add_control('footer_bikes', array(
    'label' => 'Footer Bikdes',
    'section' => 'custom_footer',
    'type' => 'text',
));

$wp_customize->add_control('footer_mountain', array(
    'label' => 'Footer Mountain',
    'section' => 'custom_footer',
    'type' => 'text',
));

$wp_customize->add_control('footer_electric', array(
    'label' => 'Footer Electric',
    'section' => 'custom_footer',
    'type' => 'text',
));
$wp_customize->add_control('footer_accesories', array(
    'label' => 'Footer Accesories',
    'section' => 'custom_footer',
    'type' => 'text',
));
}
add_action('customize_register', 'custom_footer_customizer_sectiontwo');
