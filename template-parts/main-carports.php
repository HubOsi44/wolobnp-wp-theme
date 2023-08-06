<?php
$wiaty_background = get_field('wiaty_background');
?>


<section class="carpots-parallax">
    <h2 class="fw-bold standard-title-4 oswald-font mb-0 text-center" style="padding-bottom: 5em;padding-top: 3em;">
        <span class="standard-title-3 text-red fst-italic">Wiaty</span> <span class="fst-italic">garażowe</span>
    </h2>
</section>


<section id="carports" class="carports bg-light-gray pb-5">
    <div class="container-fluid px-0">
        <div class="row gx-0 justify-content-center">
            <div class="col-lg-9 p-3 bg-white" style="margin-top: -170px;">
                <div class="owl-carousel owl-theme">
                    <?php
                    $query = new WP_Query(array('category_name' => 'wiaty-garazowe', 'posts_per_page' => 4));
                    if ($query->have_posts()) :
                    ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <?php $address_post_id = get_the_ID(); ?>
                            <div class="carports__item position-relative" id="carports-<?php echo $address_post_id; ?>">
                                <div class="carports__item-box d-flex flex-column h-100 w-100 position-absolute z-3 align-items-center justify-content-center">
                                    <h3 class="standard-title-5 text-center mb-0 lh-11 oswald-font px-3">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="fst-italic text-decoration-none fw-bold">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <p class="text-center houses-bottom standard-title-7 oswald-font">Wiata drewniana</p>
                                    <p class="carports__item-bottom houses-bottom text-right mb-0 fst-italic position-absolute standard-title-7 oswald-font">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none" title="<?php the_title(); ?>">
                                            Sprawdź <i class="fa fa-angle-right"></i>
                                        </a>
                                    </p>
                                </div>
                                <?php if (has_post_thumbnail($post->ID)) : ?>
                                    <?php
                                    $imgID  = get_post_thumbnail_id($post->ID);
                                    $image  = wp_get_attachment_image_src($imgID, 'large', false, '');
                                    $imgAlt = get_post_meta($imgID, '_wp_attachment_image_alt', true);
                                    ?>
                                    <img src="<?php echo $image[0]; ?>" alt="<?php echo $imgAlt; ?>" class="img-fluid position-relative carports__img z-0">
                                <?php endif; ?>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                        ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>