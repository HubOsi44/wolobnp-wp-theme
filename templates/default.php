<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Default */

get_header();

$top_bg = get_field('top_bg');

// Contact form & share option
$share_email = get_field('share_email', 13);

?>

<section class="d-flex align-items-end page-header-top" style="background-image: url('<?= $top_bg; ?>');">
    <div class="container">
        <h1 class="text-center mb-4 mb-lg-5 fw-bold standard-title-1 text-white"><span class="bg-green-shadow"><?php the_title(); ?></span></h1>
    </div>
</section>

<div id="co-dobrego-firmie"></div>

<main id="main" class="default-page py-4 py-lg-5" role="main">
    <div class="container">
        <?php
        while (have_posts()) : the_post();
            the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter'));
        endwhile;
        ?>
    </div>
</main>

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

<!-- Float btn -->
<div id="float-btn" class="right-float-box">
    <a href="#form-box-wrap" title="Chcę więcej informacji" class="btn btn-red--radius-more btn-red-swipe title-slide-left-anim fw-bold right-float-box__btn">
        Chcę więcej informacji <i class="fa fa-angle-right"></i>
    </a>
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