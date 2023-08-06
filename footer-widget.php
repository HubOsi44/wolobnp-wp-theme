<!-- CTA Banner -->
<section class="cta-main-banner row gx-0">
    <div class="col-lg-6 bg-green py-5 cta-main-banner__left position-relative">
        <div class="row justify-content-lg-end gx-0 py-lg-1">
            <div class="col-lg-6 py-lg-4 text-center text-lg-start">
                <h4 class="text-white fw-bolder standard-title-4 teko-font fw-bolder mb-3 mb-lg-4">Darmowa wycena</h4>
                <a data-bs-toggle="modal" data-bs-target="#offerformModal" class="btn btn-white-swipe btn-lg rounded-0 fw-bold">Wypełnij formularz <i class="fa fa-check-square-o"></i></a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 cta-main-banner__right-bg"></div>
</section>
<!-- Google map -->
<iframe src="https://snazzymaps.com/embed/38178" width="100%" height="500px" style="border:none;"></iframe>
<!-- Footer -->
<section class="footer-widgets">
    <div class="container py-4 py-lg-5">

        <div class="row justify-content-center">
            <div class="col-8 col-lg-3 text-center">
                <img src="/wp-content/uploads/2023/05/logo-hatek.png" class="img-fluid mb-4 mb-lg-5 mx-auto">
            </div>
        </div>
        <div class="footer-widgets__logo mb-4 mb-lg-5"></div>
        <div class="row justify-content-center">
            <div class="col-lg-4 footer-widgets__bottom-desc pe-lg-5 mb-4 mb-lg-0">
                <p class="bottom fw-lighter">
                <h5 class="text-green standard-title-7 teko-font mb-2 mb-lg-4 fw-bold">O nas</h5>
                Jesteśmy firmą zajmującą się projektowaniem, produkcją i montażem konstrukcji drewnianych.
                Na&nbsp;rynku istniejemy od 2003 roku, w związku z tym oferujemy Państwu bogate doświadczenie,
                fachowość i przede wszystkim pokaźną, wciąż rozwijaną wiedzę z zakresu budownictwa w technologii drewnianej.
                </p>
                <a href="https://www.facebook.com/hatek.hatek.902" target="_blank" rel="nofollow noopener noreferrer" class="text-center d-inline-block text-green bottom-fb-link">
                    <i class="fa fa-facebook text-green"></i>
                </a>
            </div>
            <div class="col-lg-3 footer-widgets__bottom-desc mb-4 mb-lg-0">
                <h5 class="text-green standard-title-7 teko-font mb-2 mb-lg-4 fw-bold">Kontakt</h5>
                <ul class="list-unstyled p-0 bottom-contact">
                    <li class="mb-3 mb-lg-4 d-flex align-items-center">
                        <i class="fa fa-map-marker me-4 text-green"></i>
                        <span>
                            HATEK Sp. z o.o. <br>
                            06-100 Pułtusk<br>
                            ul. Tartaczna 71<br>
                            woj. mazowieckie
                        </span>
                    </li>
                    <li class="mb-3 mb-lg-4 d-flex align-items-center">
                        <i class="fa fa-phone me-4 text-green"></i>
                        <a href="tel:+48607140231" class="">
                            +48 607 140 231
                        </a>
                    </li>
                    <li class="d-flex align-items-center">
                        <i class="fa fa-envelope me-4 text-green"></i>
                        <a href="mailto: hatek@hatek.com.pl" class="">
                            hatek@hatek.com.pl
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h5 class="text-green standard-title-7 teko-font mb-2 mb-lg-4 fw-bold">Oferta</h5>
                <?php if (is_active_sidebar('menu-services')) : ?>
                    <?php dynamic_sidebar('menu-services'); ?>
                <?php endif; ?>
            </div>
            <!-- <div class="col-lg-3">
                <h5 class="text-green standard-title-7 teko-font mb-2 mb-lg-4 fw-lighter">Newsy</h5>
                <?php if (is_active_sidebar('menu-about')) : ?>
                    <?php dynamic_sidebar('menu-about'); ?>
                <?php endif; ?>
            </div> -->
        </div>
    </div>
    <div class="footer-widgets__background"></div>
</section>
<div class="copyright-box">
    <div class="container py-4">
        <p class="text-center text-gray-light mb-0"><small>hatek.com.pl Copyright 2009-2023</small></p>
    </div>
</div>