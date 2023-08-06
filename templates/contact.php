<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

/* Template Name: Contact */

get_header();

$top_bg = get_field('top_background');

?>

<section class="d-flex align-items-end top-section-offer" style="background-image: url('<?php echo $top_bg; ?>')">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5 col-lg-2 text-center">
                <img src="/wp-content/uploads/2023/06/hatek-construct.png" alt="" class="img-fluid top-section-offer__icon-logo mx-auto">
            </div>
        </div>
        <h1 class="teko-font text-center text-white mb-4 mb-lg-5 fw-lighter standard-title-2 position-relative"><?php the_title(); ?></h1>
    </div>
</section>

<main id="main" class="o-nas py-4 py-lg-5" role="main">
    <div class="container">
        <?php
        while (have_posts()) : the_post();
            the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter'));
        endwhile;
        ?>

    </div>
</main>

<?php get_footer(); ?>