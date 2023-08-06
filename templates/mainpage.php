<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Mainpage */

get_header();

//Hero
$hero_cnt = get_field('hero_cnt');
$hero_background_desktop = get_field('hero_background_desktop');
$hero_background_mobile = get_field('hero_background_mobile');
$hero_widget = get_field('hero_widget');
?>

<!-- Main hero & domy szkieletowe  -->
<?php get_template_part('template-parts/main-hero'); ?>

<!-- O nas -->
<?php get_template_part('template-parts/main-about'); ?>


<!-- Współpraca & Partnerzy -->
<?php //get_template_part('template-parts/main-cooperation'); 
?>

<?php
while (have_posts()) : the_post();
    the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'hatek-wp-theme'));
endwhile;
?>

<?php get_footer(); ?>