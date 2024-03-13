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
                <?= apply_shortcodes('[contact-form-7 id="d41eb69" title="Formularz kontaktowy" html_id="zgloszenie" html_name="zgloszenie"]'); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>