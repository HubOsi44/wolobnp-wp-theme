<?php
if (!defined('ABSPATH')) exit;

get_header();



$name = get_the_title();
$name_cat = strtolower(preg_replace('/-+/', '-', preg_replace('/[^\wáéíóú]/', '-', $name)));
$top_bg = get_field('top_bg');
$top_title = get_field('top_title');
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

<main id="main" class="details-house pb-lg-5" role="main">

    <section class="mb-4 mb-lg-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 py-3 py-lg-5 text-center" style="background-color: #e8ebf2;">
                    <div class="row justify-content-center">
                        <div class="col-lg-11">
                            <?php $images = get_field('galeria');
                            if ($images) : ?>
                                <!-- If galeria is ready - Gallery with thumbnails -->
                                <div id="big" class="owl-carousel owl-theme">
                                    <?php if ($images) : ?>
                                        <?php foreach ($images as $image) : ?>
                                            <div class="item">
                                                <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid">
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                <div id="thumbs" class="owl-carousel owl-theme">
                                    <?php
                                    if ($images) : ?>
                                        <?php foreach ($images as $image) : ?>
                                            <div class="item">
                                                <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid">
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
                <div class="col-lg-6 py-3 p-lg-5 bg-gray-dark text-white d-flex">
                    <div class="row flex-grow-1 align-items-center">
                        <div class="col-lg-9 text-left">
                            <?php
                            while (have_posts()) : the_post();
                                the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter'));
                            endwhile;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if (have_rows('zawartosc_list')) : ?>
        <h3 class="teko-font text-center mb-3 mb-lg-4 standard-title-4">Domek w stanie deweloperskim zawiera:</h3>
        <div class="container details-house-contains mb-3 mb-lg-5">
            <div class="row">
                <?php
                $counter = 0;
                while (have_rows('zawartosc_list')) : the_row();
                    $zawartosc = get_sub_field('zawartosc');
                ?>
                    <div class="col-lg-6 p-1 d-flex flex-column">
                        <div class="details-house-contains__item pt-2 pb-2 pe-2 d-flex justify-content-center flex-column flex-grow-1">
                            <?php echo $zawartosc; ?>
                        </div>
                    </div>
                    <?php $counter++; ?>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (have_rows('dokumentacja_techniczna')) : ?>
        <!-- Rzuty & Projekty - Dokumentacja techniczna -->
        <h3 class="teko-font text-center mb-3 mb-lg-4 standard-title-4">Pobierz dokumentacje techniczną / rzuty </h3>
        <div class="container throws mb3 mb-lg-5">
            <div class="row justify-content-center">
                <?php
                while (have_rows('dokumentacja_techniczna')) : the_row();
                    $title = get_sub_field('tytul');
                    $file = get_sub_field('plik');
                ?>
                    <div class="col-lg-4 mb-3 mb-lg-3">
                        <a title="Pobierz <?php echo $title; ?>" href="<?php echo $file['url']; ?>" download class="text-gray-dark d-flex align-items-center justify-content-between" style="border: 1px solid #efefef;">
                            <div class="bg-green throws__icon p-2">
                                <img src="/wp-content/uploads/2023/04/rzuty.png" class="img-fluid" style="height: 50px;">
                            </div>
                            <div class="throws__title px-2 flex-grow-1 text-center">
                                <?php echo $title; ?> <i class="fa fa-download"></i>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Button form -->
    <div class="text-center mb-3 mb-lg-5"> <a data-bs-toggle="modal" data-bs-target="#offerformModal" class="btn btn-lg btn-green-swipe title-slide-left-anim fw-bold">Wyślij zapytanie <i class="fa fa-check-square-o"></i></a></div>

</main>

<?php get_footer(); ?>