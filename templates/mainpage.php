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

// Co dobrego u Ciebie w firmie?
$co_dobrego_tytul = get_field('co_dobrego_tytul');
$co_dobrego_opis = get_field('co_dobrego_opis');

// Co dobrego u Ciebie w firmie?
$partner_kampanii_opis = get_field('partner_kampanii_opis');

// Najczęściej zadawane pytania
$faq_tytul = get_field('faq_tytul');
?>

<section id="hero" class="top-hero hero" style="background-image: url('<?= $hero_bg; ?>')">
    <?= $hero_cnt; ?>
</section>

<!-- Co dobrego u Ciebie w firmie? -->
<section id="co-dobrego-firmie" class="co-dobrego-firmie py-4 py-lg-5">
    <?= $co_dobrego_wstep; ?>
</section>

<!-- Cytaty -->
<section id="testmonials-wrap" class="testmonials py-4 py-lg-5 container-fluid">
    <div class="row">
        <div class="col-xl-3">
            <?= $cytaty_opis; ?>
        </div>
        <div class="col-xl-9">
            <!-- Owl Carousel slider with youtube modals -->
            <?php if (have_rows('cytaty')) : ?>
                <div id="testmonials" class="owl-carousel owl-theme">
                    <?php
                    $counter = 0;
                    while (have_rows('cytaty')) : the_row();
                        $quote = get_sub_field('quote');
                        $quote_autor = get_sub_field('quote_autor');
                        $img = get_sub_field('quote_image');
                        $youtube_link = get_sub_field('youtube_link');
                    ?>
                        <div class="d-flex flex-column testmonials__item">
                            <?php if ($img) : ?>
                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="img-fluid mx-auto">
                            <?php endif; ?>
                            <div class="testmonials__item-bottom">
                                <p class=""><?= $quote_autor; ?></p>
                                <a class="video-btn" title="Otwórz" data-bs-toggle="modal" data-bs-target="#ModalVideo" data-src="<?= $youtube_link; ?>">Otwórz wypowiedź</a>
                            </div>
                        </div>
                        <?php $counter++; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
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
                    <div class="col-lg-3 text-center">
                        <?php if ($img) : ?>
                            <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="img-fluid mx-auto mb-3">
                        <?php endif; ?>
                        <?= $tytul; ?>
                        <?= $opis; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Contact form & Podziel się informacją ze współpracownikami, zachęć do włączenia w projekt -->
<section class="form-box-wrap py-4 py-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-3 mb-lg-0">
                <!-- Form -->
                <div class="form-box p-4 bg-white">
                    <?= apply_shortcodes('[contact-form-7 id="7ca430d" title="Formularz kontaktowy"]'); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="text-center mb-3 mb-lg-5 fw-bold">Podziel się informacją ze współpracownikami, zachęć do włączenia w projekt</h2>
                <div class="d-flex justify-content-around justify-content-lg-between">
                    <p class="standard-title-5 social-title-share mb-0">
                        <a class="text-blue" title="Share Facebook" href="https://www.facebook.com/sharer?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>" target="_blank" rel="noopener noreferrer">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </p>
                    <p class="standard-title-5 social-title-share mb-0">
                        <a class="text-blue" title="Share Twitter" href="http://twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </p>
                    <p class="standard-title-5 social-title-share mb-0">
                        <a class="text-blue" title="Share LinkedIn" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>&amp;summary=&amp;source=<?php bloginfo('name'); ?>" target="_new" rel="noopener noreferrer">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- No dobrze - co dajemy Twojej firmie? -->
<section id="co-dajemy" class="co-dajemy py-4 py-lg-5">
    <div class="container">
        <?= $co_dajemy_tytul; ?>
        <?php if (have_rows('co_dajemy_boxy')) : ?>
            <div class="row justify-content-center">
                <?php
                while (have_rows('co_dajemy_boxy')) : the_row();
                    $tytul = get_sub_field('tytul');
                    $opis = get_sub_field('opis');
                ?>
                    <div class="col-lg-4 text-center mb-3 mb-lg-4">
                        <div class="co-dajemy__item p-3 text-center">
                            <?= $tytul; ?>
                            <?= $opis; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Jak to działa? Wolontariat z Paczką w Banku BNP Paribas -->
<section id="jak-to-dziala" class="jak-to-dziala py-4 py-lg-5 bg-green">
    <div class="container">
        <?= $jak_to_dziala_tytul; ?>
        <div class="row">
            <div class="col-lg-6">
                Opis
            </div>
            <div class="col-lg-6">
                Liczby
            </div>
        </div>
    </div>
</section>

<!-- Co dobrego u Ciebie w firmie? -->
<section id="co-dobrego" class="co-dobrego py-4 py-lg-5">
    <div class="container">
        <?= $co_dobrego_tytul; ?>
        <?= $co_dobrego_opis; ?>
    </div>
</section>

<!-- Partner kampanii -->
<section id="partner" class="partner py-4 py-lg-5 bg-gray-light">
    <div class="container">
        <?= $partner_kampanii_opis; ?>
    </div>
</section>

<!-- Najczęściej zadawane pytania -->
<section id="faq" class="faq py-4 py-lg-5">
    <div class="container">
        <?= $faq_tytul; ?>
        <div class="row justify-content-center">
            <?php if (have_rows('faq')) : ?>
                <?php while (have_rows('faq')) : the_row();
                    $pytanie = get_sub_field('pytanie');
                    $odpowiedz = get_sub_field('odpowiedz');
                ?>
                    <div class="mb-3 col-lg-10">
                        <div class="qa__item">
                            <h6 class="p-3 mb-0 d-flex justify-content-between" id="heading-<?php echo get_row_index(); ?>" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo get_row_index(); ?>" aria-expanded="false" aria-controls="collapse-<?php echo get_row_index(); ?>">
                                <?php echo $pytanie; ?>
                                <i class="fa fa-angle-down text-mint" aria-hidden="true"></i>
                            </h6>
                            <div id="collapse-<?php echo get_row_index(); ?>" class="collapse mt-3 px-3 pb-2">
                                <?php echo $odpowiedz; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
while (have_posts()) : the_post();
    the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'wolobnp-wp-theme'));
endwhile;
?>

<!-- Modal Film -->
<div class="modal modal-video fade" id="ModalVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered align-items-center modal-xl" role="document">
        <div class="modal-content">
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