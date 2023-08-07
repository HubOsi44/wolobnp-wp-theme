<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Mainpage */

get_header();

//Hero
$hero_cnt = get_field('hero_cnt');

?>






<!-- Sekcja Co dobrego u Ciebie w firmie? -->

<section clas="py-4 py-lg-5 container-fluid">
    <div class="row">
        <div class="col-xl-3">

            Biznes się zmienia. Rośnie świadomość, że

        </div>
        <div class="col-xl-9">
            <!-- Owl Carousel slider with youtube modals -->
            <div id="testmonials" class="owl-carousel owl-theme">
                <?php
                $counter = 0;
                while (have_rows('oferta_hatek')) : the_row();
                    $title = get_sub_field('oferta_title');
                    $subtitle = get_sub_field('oferta_subtitle');
                    $img = get_sub_field('oferta_image');
                    $link = get_sub_field('oferta_link');
                    $link_url = $link['url'];
                ?>
                    <div class="d-flex testmonials__item">
                        <?php if ($img) : ?>
                            <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="img-fluid mx-auto">
                        <?php endif; ?>
                        <div class="testmonials__item-bottom">
                            <a class="video-btn" title="Otwórz wypowiedź" data-bs-toggle="modal" data-bs-target="#ModalVideo" data-src="<?php echo $youtube_link; ?>">Otwórz wypowiedź</a>
                        </div>
                    </div>
                    <?php $counter++; ?>
                <?php endwhile; ?>
            </div>
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
                <button type="button" class="close close-video" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>