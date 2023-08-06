<?php
$hero_cnt = get_field('hero_cnt');
$hero_background_desktop = get_field('hero_background_desktop');
$hero_background_mobile = get_field('hero_background_mobile');
$hero_widget = get_field('hero_widget');
$oferta_title = get_field('oferta_title');
?>

<div id="hero" class="top-hero position-relative d-flex justify-content-center flex-column mx-lg-4">
    <!-- Hero Cnt -->
    <div class="container top-hero-cnt position-relative">
        <?php echo $hero_cnt; ?>
    </div>
    <!-- Scroll Anchor-->
    <a href="#iframe-hauses" class="tst-scroll-hint-frame tst-anchor-scroll">
        <div class="tst-scroll-hint"></div>
    </a>
    <div class="row gx-0 w-100 anim-engineer-hero position-absolute">
        <div class="col-lg-3">
            <img src="/wp-content/uploads/2023/05/content-image-1.png" class="d-none d-lg-block img-fluid anim-engineer-hero__img position-relative title-slide-left-anim">
        </div>
    </div>
</div>
<!-- BG Hero -->
<style>
    @media (min-width: 992px) {
        .top-hero {
            background-image: url('<?= $hero_background_desktop; ?>') !important;
        }
    }

    .top-hero {
        background-image: url('<?= $hero_background_mobile; ?>');
    }
</style>
<?php if (have_rows('oferta_hatek')) : ?>
    <div id="iframe-hauses" class="iframe-hauses container-fluid gx-0 position-relative pb-4 py-lg-5 position-relative">
        <div class="iframe-hauses-mask"></div>
        <h2 class="text-center text-white fw-bolder standard-title-4 teko-font pt-4 pb-3 py-lg-5 mb-0 position-relative">
            <span class="heading-title heading-title--white"><?php echo $oferta_title; ?></span>
        </h2>
        <div class="row gx-0 justify-content-center mb-lg-2">
            <div class="col-lg-9 px-3">
                <div id="maincats" class="owl-carousel owl-theme">
                    <?php
                    $counter = 0;
                    while (have_rows('oferta_hatek')) : the_row();
                        $title = get_sub_field('oferta_title');
                        $subtitle = get_sub_field('oferta_subtitle');
                        $img = get_sub_field('oferta_image');
                        $link = get_sub_field('oferta_link');
                        $link_url = $link['url'];
                    ?>
                        <a class="d-flex iframe-hauses__item align-items-end position-relative" href="<?= esc_url($link_url); ?>" title="HATEK - <?= $title ?>">
                            <div class="iframe-hauses__item--box d-flex flex-column w-100 position-absolute z-3 p-4 align-items-center justify-content-center">
                                <h3 class="teko-font main-cat-title mb-0 lh-11"><?= $title ?></h3>
                                <p class="text-gray teko-font standard-title-7 fw-lighter" style="color: #464646;"><?= $subtitle; ?></p>
                                <span class="iframe-hauses__item--btn">SPRAWDŹ OFERTĘ <i class="fa fa-angle-right"></i></span>
                            </div>
                            <?php if ($img) : ?>
                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="img-fluid mx-auto">
                            <?php endif; ?>
                        </a>
                        <?php $counter++; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>