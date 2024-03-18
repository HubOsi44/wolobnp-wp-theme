<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Materials */

get_header();

?>

<?php
while (have_posts()) : the_post();
    the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'wolobnp-wp-theme'));
endwhile;
?>

<!-- Modal Film -->
<div class="modal modal-materials fade" id="modalMaterials" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered align-items-center modal-xl" role="document">
        <div class="modal-content border-0">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column justify-content-center">
                        <h2 class="mb-3 mb-lg-4 fw-light lh-12">
                            <span class="fw-bold standard-title-4 d-inline-block lh-12 mb-2 mb-lg-3 text-red text-center">
                                Zdobądz dostęp do eksluzywnej zawartości materiałów o wolontariacie.
                            </span><br>
                            <span class="standard-title-6 lh-13 d-inline-block text-center">
                                To bardzo proste, wystarczy, że wyslesz do nas swoje dane: imie oraz adres-email,
                                dzięki temu zdobędziesz dostęp do wielu atrakcyjnych i eksluzywnych materiałów,
                                pogłebisz wiedze na temat wolontariatu pracowniczego. 
                            </span>
                        </h2>
                    </div>
                    <div class="col-lg-1 text-center">
                        <div class="mx-auto h-100 d-none d-lg-inline-block" style="width: 2px;background: rgba(0,0,0, .1);"></div>
                    </div>
                    <div class="col-lg-5">
                        <div class="pe-lg-3 py-lg-3">
                            <?= apply_shortcodes('[contact-form-7 id="d41eb69" title="Formularz kontaktowy" html_id="zgloszenie" html_name="zgloszenie"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>