<?php
/**
 * index.php.
 *
 * @package Products_Theme
 */
get_header(); // Include header
?>


<?php while (have_posts()) : the_post(); ?>

  <?php the_content(); ?>

<?php endwhile; ?>




<?php get_footer(); // Include footer ?>
