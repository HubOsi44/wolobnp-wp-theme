<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Mainpage */

get_header();

//Hero
$hero_cnt = get_field('hero_cnt');

?>






<!-- Sekcja Co dobrego u Ciebie w firmie? -->

<section clas="py-4 py-lg-5 container-fluid">
    <div class="row">
        <div class="col-xl-3">

            Biznes się zmienia. Rośnie świadomość, że

        </div>
        <div class="col-xl-9">

            <!-- Owl Carousel slider with youtube modals -->

        </div>
    </div>
</section>



<?php
while (have_posts()) : the_post();
    the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'wolobnp-wp-theme'));
endwhile;
?>

<?php get_footer(); ?>