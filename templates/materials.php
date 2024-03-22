<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Materials */

get_header();

$top_bg = get_field('top_bg');
$cnt_modal = get_field('cnt_modal');

// Top header cnt
$top_header_cnt = get_field('top_header_cnt');

// Wstęp Boxy
$wstep_boxy_cnt = get_field('wstep_boxy_cnt');

// Poradnik
$poradnik_cnt = get_field('poradnik_cnt');

// Video
$video_cnt = get_field('video_cnt');

// Case stady
$case_study_cnt = get_field('case_study_cnt');

// Co dobrego u Ciebie w firmie?
$co_dobrego_tytul = get_field('co_dobrego_tytul', 13);
$co_dobrego_opis = get_field('co_dobrego_opis', 13);

// Parnerzy kampanii
$partner_kampanii_opis = get_field('partner_kampanii_opis', 13);

// Najczęściej zadawane pytania
$faq_tytul = get_field('faq_tytul', 13);

?>
<main id="main" class="content-before-modal" role="main">
    <section class="d-flex align-items-end page-header-top" style="background-image: url('<?= $top_bg; ?>');">
        <?= $top_header_cnt; ?>
    </section>

    <!-- Wstęp -->
    <?= $wstep_boxy_cnt; ?>

    <!-- Pofadnik -->
    <?= $poradnik_cnt; ?>

    <!-- Video -->
    <?= $video_cnt; ?>

    <!-- Case styudy -->
    <?= $case_study_cnt; ?>

    <!-- Co dobrego u Ciebie w firmie? -->
    <section id="co-dobrego" class="co-dobrego pt-4 pt-lg-5 bg-gray-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-2 order-lg-1">
                    <img src="/wp-content/uploads/2023/08/co-dobrego-u-ciebie-w-firmie.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 order-1 order-lg-2 d-flex flex-column justify-content-center">
                    <?= $co_dobrego_tytul; ?>
                    <?= $co_dobrego_opis; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Partner kampanii -->
    <section id="partner" class="partner py-4 py-lg-5 bg-white">
        <div class="container">
            <?= $partner_kampanii_opis; ?>
        </div>
    </section>

    <!-- Najczęściej zadawane pytania -->
    <section id="faq" class="faq py-4 py-lg-5">
        <div class="container">
            <?= $faq_tytul; ?>
            <div class="row justify-content-center">
                <?php if (have_rows('faq', '13')) :
                    $counterfaq = 0;
                ?>
                    <?php while (have_rows('faq', '13')) : the_row();
                        $pytanie = get_sub_field('pytanie');
                        $odpowiedz = get_sub_field('odpowiedz');
                    ?>
                        <div class="mb-3 col-lg-10 <?php if ($counterfaq > 2) {
                                                        echo 'faq-hide';
                                                    } ?>">
                            <div class="qa__item">
                                <h6 class="fw-bold p-3 mb-0 d-flex justify-content-between" id="heading-<?php echo get_row_index(); ?>" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo get_row_index(); ?>" aria-expanded="false" aria-controls="collapse-<?php echo get_row_index(); ?>">
                                    <?php echo $pytanie; ?>
                                    <i class="fa fa-angle-down text-mint" aria-hidden="true"></i>
                                </h6>
                                <div id="collapse-<?php echo get_row_index(); ?>" class="collapse mt-3 px-3 pb-2">
                                    <?php echo $odpowiedz; ?>
                                </div>
                            </div>
                        </div>
                        <?php $counterfaq++; ?>
                    <?php endwhile; ?>
                    <?php if ($counterfaq > 2) : ?>
                        <div class="col-lg-10 text-center">
                            <a role="button" class="fw-bold read-more text-red px-4 py-2 d-inline-block show-more-faq" id="show-more-faq" style="border: 1px solid #ed1c24;">
                                Czytam więcej <i class="fa fa-angle-down"></i>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
    while (have_posts()) : the_post();
        the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'wolobnp-wp-theme'));
    endwhile;
    ?>
</main>

<!-- Modal with form -->
<div class="modal modal-materials fade" id="modalMaterials" tabindex="-1" role="dialog" aria-labelledby="modalMaterials" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered align-items-center modal-xl" role="document">
        <div class="modal-content border-0">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 d-flex flex-column justify-content-center">
                        <?= $cnt_modal; ?>
                    </div>
                    <div class="col-lg-4">
                        <div class="bg-gray-light p-3" style="border-radius: 10px;">
                            <?= apply_shortcodes('[contact-form-7 id="a39675c" title="Formularz materials" html_id="zgloszenie" html_name="zgloszenie"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Film -->
<div class="modal modal-video fade" id="ModalVideo" tabindex="-1" role="dialog" aria-labelledby="ModalVideo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered align-items-center modal-lg" role="document">
        <div class="modal-content border-0">
            <div class="modal-body">
                <button type="button" class="btn-close btn-close-white close-video" data-bs-dismiss="modal" aria-label="Close" title="Zamknij film"></button>
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>