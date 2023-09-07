<?php
/**
 * Template Name: Custom Template
 *
 * @package Products_Theme
 */

get_header(); // Include header
?>

<main>

<?php while (have_posts()) : the_post(); ?>

  <?php the_content(); ?>

<?php endwhile; ?>

</main>

<?php get_footer(); // Include footer ?>
