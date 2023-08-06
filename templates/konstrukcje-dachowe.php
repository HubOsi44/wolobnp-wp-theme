<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

/* Template Name: Konstrukcje dachowe */

get_header();

$top_bg = get_field('top_background');

?>

<section class="d-flex align-items-end top-section-offer mb-3" style="background-image: url('<?= $top_bg; ?>')">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5 col-lg-2 text-center">
                <img src="/wp-content/uploads/2023/06/hatek-construct.png" alt="" class="img-fluid top-section-offer__icon-logo mx-auto">
            </div>
        </div>
        <h1 class="teko-font text-center text-white mb-4 mb-lg-5 fw-lighter standard-title-2 position-relative"><?php the_title(); ?></h1>
    </div>
</section>

<!-- Boxy konstrukcje dachowe -->
<?php if (have_rows('boxy')) : ?>
    <section class="boxes-offer py-4 py-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <?php
                while (have_rows('boxy')) : the_row();
                    $image_box = get_sub_field('image_box');
                    $title_box = get_sub_field('title_box');
                    $cnt_box = get_sub_field('cnt_box');
                    $background_box = get_sub_field('background_box');
                ?>
                    <div class="col-lg-4 mb-4 mb-lg-0 d-flex flex-column">
                        <div class="mb-3 row justify-content-center">
                            <div class="col-7 col-lg-7">
                                <?php if ($image_box) : ?>
                                    <img src="<?= $image_box['url']; ?>" alt="<?= $image_box['alt']; ?>" class="boxes-offer__circle-img img-fluid mx-auto">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="flex-grow-1 boxes-offer__item p-3 py-4 p-lg-5 text-white" style="background-image: url('<?= $background_box; ?>')">
                            <?= $title_box; ?>
                            <?= $cnt_box; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Slider gallery -->
<section class="slider-gallery py-4 py-lg-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <?php $images = get_field('slider');
                if ($images) : ?>
                    <!-- If galeria is ready -->
                    <div id="slider-offer" class="owl-carousel owl-theme flex-column slider-offer">
                        <?php if ($images) : ?>
                            <?php foreach ($images as $image) : ?>
                                <div class="item">
                                    <img data-src="<?php echo esc_url($image['sizes']['large']); ?>" data-src-retina="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid owl-lazy">
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                <?php else : ?>
                    <?php if (has_post_thumbnail($post->ID)) : ?>
                        <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-width'); ?>
                        <img src="<?php echo $large_image_url[0]; ?>" alt="<?php the_title(); ?>" class="img-fluid">
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php if (have_rows('zalety_systemu')) : ?>
    <section class="advantages-system py-4 py-lg-5">
        <h3 class="teko-font text-center mb-3 mb-lg-4 standard-title-4">Zalety systemu:</h3>
        <div class="container mb-3 mb-lg-5">
            <div class="row justify-content-center">
                <?php
                $counter = 0;
                while (have_rows('zalety_systemu')) : the_row();
                    $zaleta = get_sub_field('zaleta');
                ?>
                    <div class="col-lg-5 d-flex mb-4">
                        <div class="advantages-system__item d-flex py-2 flex-grow-1">
                            <div class="row align-items-center justify-content-center flex-grow-1">
                                <div class="col-3 col-lg-2">
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-9 col-lg-9 text-center pe-lg-1">
                                            <img src="/wp-content/uploads/2023/07/ser_8.png" class="img-fluid mx-auto mb-2 mb-lg-0" style="background: #00943C;border-radius: 50%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10 ps-lg-1"><?php echo $zaleta; ?></div>
                            </div>
                        </div>
                    </div>
                    <?php $counter++; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<main>
    <div class="container">
        <?php
        while (have_posts()) : the_post();
            the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter'));
        endwhile;
        ?>
    </div>
</main>

<?php get_footer(); ?>