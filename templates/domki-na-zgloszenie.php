<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

/* Template Name: Domki na zgłoszenie */

get_header();

$top_bg = get_field('top_background');

?>

<section class="d-flex align-items-end top-section-offer" style="background-image: url('<?php echo $top_bg; ?>')">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5 col-lg-2 text-center">
                <img src="/wp-content/uploads/2023/06/hatek-construct.png" alt="" class="img-fluid top-section-offer__icon-logo mx-auto">
            </div>
        </div>
        <h1 class="teko-font text-center text-white mb-4 mb-lg-5 fw-lighter standard-title-2 position-relative"><?php the_title(); ?></h1>
    </div>
</section>

<?php if (have_rows('domki')) : ?>
    <section class="domy-na-zgloszenie mb-4 mb-lg-4">
        <?php
        $counter = 0;
        while (have_rows('domki')) : the_row();
            $domki_opis = get_sub_field('domki_opis');
            $images = get_sub_field('domki_galeria')
        ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 py-3 py-lg-5 text-center order-2 order-lg-1" style="background-color: #e8ebf2;">
                        <!-- Galeria -->
                        <div class="row justify-content-center">
                            <div class="col-lg-11">
                                <?php if ($images) : ?>
                                    <!-- If galeria is ready - Gallery with thumbnails -->
                                    <div id="big" class="owl-carousel owl-theme owl-slider-houses flex-column slider-offer">
                                        <?php if ($images) : ?>
                                            <?php foreach ($images as $image) : ?>
                                                <div class="item">
                                                    <img data-src="<?php echo esc_url($image['sizes']['large']); ?>" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid">
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php /*<div id="thumbs-<?= $counter; ?>" class="owl-carousel owl-theme">
                                        <?php
                                        if ($images) : ?>
                                            <?php foreach ($images as $image) : ?>
                                                <div class="item">
                                                    <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid">
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                    */ ?>
                                <?php else : ?>
                                    <?php if (has_post_thumbnail($post->ID)) : ?>
                                        <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-width'); ?>
                                        <img src="<?php echo $large_image_url[0]; ?>" alt="<?php the_title(); ?>" class="img-fluid">
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 py-3 p-lg-5 bg-gray-dark text-white d-flex order-1 order-lg-2">
                        <div class="row flex-grow-1 align-items-center">
                            <div class="col-lg-12 text-left">
                                <?= $domki_opis; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-details">
                    <div class="container">
                        <ul class="nav nav-tabs mt-1 mb-2 mt-lg-4 mb-lg-4 justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item p-1 p-lg-0 col">
                                <a class="nav-link text-center active" id="pills-zawiera-tab-<?= $counter; ?>" data-bs-toggle="pill" href="#pills-zawiera-<?= $counter; ?>" role="tab" aria-controls="pills-zawiera-<?= $counter; ?>" aria-selected="true">Domek w stanie deweloperskim zawiera:</a>
                            </li>
                            <li class="nav-item p-1 p-lg-0 col">
                                <a class="nav-link text-center" id="pills-dok-tab-<?= $counter; ?>" data-bs-toggle="pill" href="#pills-dok-<?= $counter; ?>" role="tab" aria-controls="pills-dok-<?= $counter; ?>" aria-selected="false">Pobierz dokumentacje techniczną / rzuty</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content form-helping mb-3 mb-lg-5" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pills-zawiera-<?= $counter; ?>" role="tabpanel" aria-labelledby="pills-zawiera-tab-<?= $counter; ?>">
                            <?php if (have_rows('zawartosc_list')) : ?>
                                <h3 class="teko-font text-center mb-3 mb-lg-4 standard-title-4">Domek w stanie deweloperskim zawiera:</h3>
                                <div class="container details-house-contains mb-3 mb-lg-5">
                                    <div class="row">
                                        <?php
                                        while (have_rows('zawartosc_list')) : the_row();
                                            $zawartosc = get_sub_field('zawartosc');
                                        ?>
                                            <div class="col-lg-6 p-1 d-flex flex-column">
                                                <div class="details-house-contains__item pt-2 pb-2 pe-2 d-flex justify-content-center flex-column flex-grow-1">
                                                    <?= $zawartosc; ?>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane fade" id="pills-dok-<?= $counter; ?>" role="tabpanel" aria-labelledby="pills-dok-tab-<?= $counter; ?>">
                            <?php if (have_rows('dokumentacja_techniczna')) : ?>
                                <!-- Rzuty & Projekty - Dokumentacja techniczna -->
                                <h3 class="teko-font text-center mb-3 mb-lg-4 standard-title-4">Pobierz dokumentacje techniczną / rzuty </h3>
                                <div class="container throws mb3 mb-lg-5">
                                    <div class="row justify-content-center">
                                        <?php
                                        while (have_rows('dokumentacja_techniczna')) : the_row();
                                            $title = get_sub_field('tytul_dokumentacji');
                                            $file = get_sub_field('plik_dokumentacji');
                                        ?>
                                            <div class="col-lg-4 mb-3 mb-lg-3">
                                                <a title="Pobierz <?= $title; ?>" href="<?= $file['url']; ?>" download class="text-gray-dark d-flex align-items-center justify-content-between" style="border: 1px solid #efefef;">
                                                    <div class="bg-green throws__icon p-2">
                                                        <img src="/wp-content/uploads/2023/07/rzuty.png" class="img-fluid" style="height: 50px;">
                                                    </div>
                                                    <div class="throws__title px-2 flex-grow-1 text-center">
                                                        <?= $title; ?> <i class="fa fa-download"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                    <!-- Button form -->
    <div class="text-center mb-3 mb-lg-5"> <a data-bs-toggle="modal" data-bs-target="#offerformModal" class="btn btn-lg btn-green-swipe title-slide-left-anim fw-bold">Wyślij zapytanie <i class="fa fa-check-square-o"></i></a></div>
            </div>
            <?php $counter++; ?>
        <?php endwhile; ?>
    </section>
<?php endif; ?>



<main class="">
    <div class="container">
        <?php
        while (have_posts()) : the_post();
            the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter'));
        endwhile;
        ?>
    </div>
</main>

<?php get_footer(); ?>