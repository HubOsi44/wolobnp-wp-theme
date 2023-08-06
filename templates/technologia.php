<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

/* Template Name: Technologia */

get_header();

$top_bg = get_field('top_bg');

$standard_title = get_field('title');
$standard_slider = get_field('slider_cnt');


?>

<section class="d-flex align-items-end section-height-category category-<?php echo $name_cat; ?>" style="background-image: url('<?php echo $top_bg; ?>');">
    <div class="h-100 w-100 d-flex justify-content-center flex-column top-hero-bg-gradient-bottom">
        <div class="h-100 w-100 d-flex justify-content-end flex-column top-hero-bg-gradient-top">
            <div class="container">
                <h1 class="teko-font text-center text-white mb-lg-5 fw-lighter standard-title-2"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>

<main id="main" class="technologia py-4 py-lg-5" role="main">
    <div class="container">
        <?php echo $standard_title ?>
        <div class="row justify-content-center technologia-standard mb-3 mb-lg-4">
            <?php if (have_rows('standard_boxes')) : ?>
                <?php
                while (have_rows('standard_boxes')) : the_row();
                    $boxes_title = get_sub_field('title');
                    $boxes_description = get_sub_field('description');
                    $img = get_sub_field('icon');
                ?>
                    <div class="col-lg-4 text-center technologia-standard__item d-flex flex-column py-3 py-lg-4">
                        <?php if ($img) : ?>
                            <div class="text-center technologia-standard__item-img">
                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="img-fluid mb-3">
                            </div>
                        <?php endif; ?>
                        <h3 class="mb-3 standard-title-5 teko-font text-green"><?php echo $boxes_title; ?></h3>
                        <?php echo $boxes_description; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <?php echo $standard_slider; ?>
        <?php
        while (have_posts()) : the_post();
            the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter'));
        endwhile;
        ?>
            <!-- Button form -->
    <div class="text-center my-3 my-lg-5"> <a data-bs-toggle="modal" data-bs-target="#offerformModal" class="btn btn-lg btn-red-swipe title-slide-left-anim fw-bold">Wyślij zapytanie <i class="fa fa-check-square-o"></i></a></div>
    </div>
</main>

<?php get_footer(); ?>