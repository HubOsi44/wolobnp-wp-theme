<section id="coop" class="coop py-3 py-lg-5">
    <div class="container">
        <h2 class="teko-font text-center text-blue-dark mb-lg-3 fw-lighter standard-title-2">
            Nasi partnerzy
        </h2>
        <div id="coop-companies" class="owl-carousel owl-theme">
            <?php if (have_rows('cooperate')) : ?>
                <?php
                while (have_rows('cooperate')) : the_row();
                    $title = get_sub_field('tytul');
                    $www = get_sub_field('adres_strony_www');
                    $logo = get_sub_field('logotyp');
                ?>
                    <div class="text-center">
                        <?php if ($logo) : ?>
                            <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" class="img-fluid mx-auto coop-companies__logo">
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>