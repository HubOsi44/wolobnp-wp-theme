<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Szczescie */

get_header();


?>

<?php
while (have_posts()) : the_post();
    the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'wolobnp-wp-theme'));
endwhile;
?>


<?php get_footer(); ?>