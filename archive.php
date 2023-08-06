<?php

/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hatek-wp-theme
 */

get_header();

$name = get_the_archive_title();
$name_cat = strtolower(preg_replace('/-+/', '-', preg_replace('/[^\wáéíóú]/', '-', $name)));
?>

<section class="d-flex align-items-end section-height-category category-<?php echo $name_cat; ?>">
    <div class="container">
        <h1 class="oswald-font text-center text-white mb-lg-5"><?php the_archive_title(); ?></h1>
    </div>
</section>

<main id="main" class="products-houses py-4 py-lg-5" role="main">

    <div class="container">
        <?php
        $counter = 0;
        while (have_posts()) : the_post(); ?>
            <div class="products-houses__item row justify-content-center">
                <div class="col-lg-4 z-1">
                    <?php if (has_post_thumbnail($post->ID)) : ?>
                        <?php
                        $imgID  = get_post_thumbnail_id($post->ID);
                        $image  = wp_get_attachment_image_src($imgID, 'large', false, '');
                        $imgAlt = get_post_meta($imgID, '_wp_attachment_image_alt', true);
                        ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="img-link position-relative d-block">
                            <img src="<?php echo $image[0]; ?>" alt="<?php echo $imgAlt; ?>" class="img-fluid z-1">
                        </a>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 d-flex flex-column">
                    <div class="products-houses__right-box d-flex flex-column flex-grow-1 justify-content-center position-relative z-0">
                        <h2 class="oswald-font">
                            <a class="text-white text-decoration-none text-uppercase" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <div class="text-white pe-lg-5 fw-light lh-13">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 d-grid">
                                <a href="" class="fw-bold btn-list-offer-1" title="Zobacz szczegóły domku">Szczegóły domku <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $counter++; ?>
        <?php endwhile; ?>
    </div>


</main>
<?php get_footer(); ?>