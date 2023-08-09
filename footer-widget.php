<!-- Footer -->
<setion class="footer-widgets">
    <div class="container py-4 py-lg-5">
        <div class="row justify-content-center">
            <div class="col-lg-3">
                <?php if (is_active_sidebar('name')) : ?>
                    <?php dynamic_sidebar('name'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="footer-widgets__background"></div>
</section>
<div class="copyright-box">
    <div class="container py-4">
        <p class="text-center text-gray-light mb-0"><small> Copyright 2009-2023</small></p>
    </div>
</div>