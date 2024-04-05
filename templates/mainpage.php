<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Mainpage */

get_header();

// Top Hero
$hero_cnt = get_field('hero_cnt');
$hero_bg = get_field('hero_background');

// Co dobrego u Ciebie w firmie?
$co_dobrego_wstep = get_field('co_dobrego_wstep');

// Cytaty opis
$cytaty_opis = get_field('cytaty_opis');

// Wolontariat pracowniczy ze Szlachetną Paczką – to działa!
$wolontariat_pracowniczy_tytul = get_field('wolontariat_pracowniczy_tytul');

// Co dajemy Twojej firmie?
$co_dajemy_tytul = get_field('co_dajemy_tytul');

// Jak to działa? Wolontariat z Paczką w Banku BNP Paribas
$jak_to_dziala_tytul = get_field('jak_to_dziala_tytul');
$jak_to_dziala_opis = get_field('jak_to_dziala_opis');
$jak_to_dziala_liczby = get_field('jak_to_dziala_liczby');

// Co dobrego u Ciebie w firmie?
$co_dobrego_tytul = get_field('co_dobrego_tytul');
$co_dobrego_opis = get_field('co_dobrego_opis');

// Co dobrego u Ciebie w firmie?
$partner_kampanii_opis = get_field('partner_kampanii_opis');

// Najczęściej zadawane pytania
$faq_tytul = get_field('faq_tytul');

// Contact form & share option
$share_email = get_field('share_email');

// ESG Box
$esg_box_cnt = get_field('esg_box_cnt');

// Modal Popup Cnt
$cnt_modal_popup = get_field('cnt_modal_popup');

?>

<section id="hero" class="px-xl-5 d-flex flex-column justify-content-end top-hero hero container-fluid" style="background-image: url('<?= $hero_bg; ?>')">
    <?= $hero_cnt; ?>
</section>

<!-- Co dobrego u Ciebie w firmie? -->
<section id="co-dobrego-firmie" class="co-dobrego-firmie py-4 py-lg-5 bg-red container-fluid falka-bg">
    <?= $co_dobrego_wstep; ?>
</section>

<!-- Wolontariat pracowniczy ze Szlachetną Paczką – to działa! -->
<section id="wolontariat-pracowniczy-boxy" class="wolontariat-pracowniczy-boxy py-4 py-lg-5 bg-gray-light">
    <div class="container">
        <?= $wolontariat_pracowniczy_tytul; ?>
        <?php if (have_rows('wolontariat_pracowniczy_boxy')) : ?>
            <div class="row">
                <?php
                while (have_rows('wolontariat_pracowniczy_boxy')) : the_row();
                    $tytul = get_sub_field('tytul');
                    $img = get_sub_field('obrazek');
                    $opis = get_sub_field('opis');
                ?>
                    <div class="col-lg-3 mb-3 mb-lg-0">
                        <div class="px-lg-4">
                            <?php if ($img) : ?>
                                <div class="text-center">
                                    <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="img-fluid mx-auto mb-2">
                                </div>
                            <?php endif; ?>
                            <?= $tytul; ?>
                            <?= $opis; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- ESG Box -->
<?php if ($esg_box_cnt) : ?>
    <section class="esg-box py-lg-5 bg-gray-light">
        <div class="container">
            <?= $esg_box_cnt; ?>
        </div>
    </section>
<?php endif; ?>

<!-- Cytaty -->
<section id="testmonials-wrap" class="testmonials py-4 py-lg-5 container-fluid">
    <div class="row mb-3 mb-lg-4">
        <div class="col-lg-3 d-flex flex-column justify-content-center align-items-center">
            <?= $cytaty_opis; ?>
        </div>
        <div class="col-lg-9">
            <!-- Owl Carousel slider with youtube modals -->
            <?php if (have_rows('cytaty')) : ?>
                <div id="testmonials" class="owl-carousel owl-theme">
                    <?php
                    $counter = 0;
                    while (have_rows('cytaty')) : the_row();
                        $cytat_tytul = get_sub_field('cytat_tytul');
                        $quote = get_sub_field('quote');
                        $quote_autor = get_sub_field('quote_autor');
                        $img = get_sub_field('quote_image');
                        $youtube_link = get_sub_field('youtube_link');
                    ?>
                        <div class="d-flex flex-column testmonials__item">
                            <div class="owl-item-inner carousel-shadow flex-grow-1 bg-white">
                                <div class="testmonials__item-top position-relative">
                                    <?php if ($youtube_link) : ?>
                                        <a class="video-btn pulse-animation pulse-animation--sm pulse-animation--top-left" title="Otwórz" data-bs-toggle="modal" data-bs-target="#ModalVideo" data-src="<?= $youtube_link; ?>">
                                            <span class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></span>
                                        </a>
                                    <?php endif; ?>
                                    <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="img-fluid mx-auto position-relative">
                                </div>

                                <div class="testmonials__item-bottom text-center p-4">
                                    <?php if ($cytat_tytul) : ?>
                                        <p class="text-center text-white standard-title-6"><strong class="text-bg text-bg--green"><?= $cytat_tytul; ?></strong></p>
                                    <?php endif; ?>
                                    <?php if ($quote) : ?>
                                        <p class="testmonials__item-bottom-quote position-relative d-inline-block text-center lh-13 fs-14 fst-italic">
                                            <span class="testmonials__item-bottom-quote-icon testmonials__item-bottom-quote-icon--left"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <?= $quote; ?>
                                            &nbsp;<span class="testmonials__item-bottom-quote-icon testmonials__item-bottom-quote-icon--right"></span>
                                        </p>
                                    <?php endif; ?>
                                    <p class="lh-13 fw-bold fs-14">
                                        <?= $quote_autor; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php $counter++; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <div class="row justify-content-center w-100 d-flex d-lg-none">
                <div class="col-2 col col-lg-2 d-grid  justify-content-center"><a class="owl-custom-btn-prev owl-custom-btn"><i class="fa fa-angle-left"></i></a></div>
                <div class="col-2 col-lg-2 d-grid  justify-content-center"><a class="owl-custom-btn-next owl-custom-btn"><i class="fa fa-angle-right"></i></a></div>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <a role="button" class="fw-bold read-more text-red px-4 py-2 d-inline-block" data-bs-toggle="collapse" data-bs-target="#collapse-section" aria-expanded="true" aria-controls="collapse-section" style="border: 1px solid #ed1c24;">
            Czytam więcej <i class="fa fa-angle-down"></i>
        </a>
    </div>
</section>

<!-- Jak to działa? Wolontariat z Paczką w Banku BNP Paribas -->
<div id="collapse-section" class="collapse">
    <section id="jak-to-dziala" class="jak-to-dziala py-4 py-lg-5 bg-green falka-bg">
        <div class="container">
            <?= $jak_to_dziala_tytul; ?>
            <div class="row justify-content-evenly mb-3 mb-lg-5">
                <div class="col-lg-4 d-flex mb-4 mb-lg-0">
                    <?= $jak_to_dziala_opis; ?>
                </div>
                <div class="col-lg-6 d-flex align-items-center" id="counter">
                    <?= $jak_to_dziala_liczby; ?>
                </div>
            </div>
            <div class="row mb-3 mb-lg-0 justify-content-center">
                <div class="col-lg-3 d-grid">
                    <a class="btn btn-red--radius-more btn-red-swipe title-slide-left-anim fw-bold py-2" title="Czytam case study" href="https://www.szlachetnapaczka.pl/wolontariat-pracowniczy/case-study-banku-bnp-paribas-polska/" target="_blank" rel="noopener noreferrer"> Czytam case study <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Contact form & Podziel się informacją ze współpracownikami, zachęć do włączenia w projekt -->
<section id="form-box-wrap" class="form-box-wrap py-4 py-lg-5 bg-red falka-bg">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 mb-3 mb-lg-0">
                <!-- Form -->
                <div class="form-box p-4 bg-white">
                    <?= apply_shortcodes('[contact-form-7 id="7ca430d" title="Formularz kontaktowy" html_id="zgloszenie" html_name="zgloszenie"]'); ?>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="">
                    <?= $share_email; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- No dobrze - co dajemy Twojej firmie? -->
<section id="co-dajemy" class="co-dajemy py-4 py-lg-5">
    <div class="container-fluid">
        <?= $co_dajemy_tytul; ?>
        <?php if (have_rows('co_dajemy_boxy')) : ?>
            <div class="row justify-content-center">
                <?php
                while (have_rows('co_dajemy_boxy')) : the_row();
                    $tytul = get_sub_field('tytul');
                    $opis = get_sub_field('opis');
                    $icon = get_sub_field('icon');
                ?>
                    <div class="col-lg mb-3 mb-lg-0">
                        <div class="co-dajemy__item px-lg-4">
                            <?php if ($icon) : ?>
                                <div class="text-center">
                                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" class="img-fluid mx-auto mb-2">
                                </div>
                            <?php endif; ?>
                            <?= $tytul; ?>
                            <?= $opis; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

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
            <?php if (have_rows('faq')) :
                $counterfaq = 0;
            ?>
                <?php while (have_rows('faq')) : the_row();
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
                        <a role="button" class="fw-bold read-more text-red px-4 py-2 show-more-faq" id="show-more-faq" style="border: 1px solid #ed1c24;">
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

<!-- Float btn -->
<div id="float-btn" class="right-float-box d-block d-lg-none">
    <a href="https://wolontariatwfirmie.pl/materialy-do-pobrania/" title="Chcę więcej informacji" class="btn btn-red--radius-more btn-red-swipe title-slide-left-anim fw-bold right-float-box__btn">
        Chcę więcej informacji <i class="fa fa-angle-right"></i>
    </a>
</div>

<!-- Right widget box -->
<div id="widget-float-right-box" class="widget-float-right-box d-none d-lg-block bg-red">
    <span class="widget-float-right-box__close" id="widget-right-btn-close" title="Zamknij">x</span>
    <div class="row justify-content-center gx-0">
        <div class="col-9 col-lg-12">
            <div class="p-2 pb-2">
                <p class="widget-float-right-box__title lh-13 text-white fw-bold mb-2 text-center">
                    Jak to działa?
                </p>
                <p class="lh-13 text-white mb-3 text-center">
                    Mamy dla Ciebie <br>
                    więcej informacji i&nbsp;materiałów.
                </p>
                <a href="https://wolontariatwfirmie.pl/materialy-do-pobrania/" class="btn btn-sm btn-red--radius-more btn-white-swipe title-slide-left-anim fw-bold" title="Chcę poznać szczegóły" id="kv-hero-btn">
                    Chcę poznać szczegóły &gt;</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal popup info -->
<div class="modal modal-popup fade" id="modalPopup" tabindex="-1" role="dialog" aria-labelledby="modalPopup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered align-items-center modal-lg" role="document">
        <div class="modal-content border-0">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= $cnt_modal_popup; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Film -->
<div class="modal modal-video fade" id="ModalVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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