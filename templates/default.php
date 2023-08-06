<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Default */

get_header();

$top_bg = get_field('top_bg');

?>

<section class="d-flex align-items-end section-height-category category-<?php echo $name_cat; ?>" style="background-image: url('<?php echo $top_bg; ?>');">
    <div class="h-100 w-100 d-flex justify-content-center flex-column top-hero-bg-gradient-bottom">
        <div class="h-100 w-100 d-flex justify-content-end flex-column top-hero-bg-gradient-top">
            <div class="container">
                <h1 class="teko-font text-center text-white mb-4 mb-lg-5 fw-lighter standard-title-2"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>


<main id="main" class="default-page py-4 py-lg-5" role="main">
    <div class="container">
        <?php
        while (have_posts()) : the_post();
            the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter'));
        endwhile;
        ?>
    </div>
</main>

<?php get_footer(); ?>