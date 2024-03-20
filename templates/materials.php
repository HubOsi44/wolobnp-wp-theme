<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Materials */

get_header();

$top_bg = get_field('top_bg');
$cnt_modal = get_field('cnt_modal');

?>
<main id="main" class="content-before-modal" role="main">
    <section class="d-flex align-items-end page-header-top" style="background-image: url('<?= $top_bg; ?>');">
        <div class="container">
            <h1 class="text-center mb-4 mb-lg-5 fw-bold standard-title-1 text-white"><span class="bg-green-shadow"><?php the_title(); ?></span></h1>
        </div>
    </section>
    <?php
    while (have_posts()) : the_post();
        the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'wolobnp-wp-theme'));
    endwhile;
    ?>
</main>

<!-- Modal with form -->
<div class="modal modal-materials fade" id="modalMaterials" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered align-items-center modal-xl" role="document">
        <div class="modal-content border-0">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 d-flex flex-column justify-content-center">
                        <?= $cnt_modal; ?>
                    </div>
                    <div class="col-lg-4">
                        <div class="bg-gray-light p-3" style="border-radius: 10px;">
                            <?= apply_shortcodes('[contact-form-7 id="a39675c" title="Formularz materials" html_id="zgloszenie" html_name="zgloszenie"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>