<?php

/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wolobnp-wp-theme
 */

get_header();


?>

<section class="d-flex align-items-end section-height-category head-category-<?php echo $name_cat; ?>">
    <div class="h-100 w-100 d-flex justify-content-center flex-column top-hero-bg-gradient-bottom">
        <div class="h-100 w-100 d-flex justify-content-end flex-column top-hero-bg-gradient-top">
            <div class="container">
                <h1 class="oswald-font text-center text-white mb-lg-5"><?php the_archive_title(); ?></h1>
            </div>
        </div>
    </div>
</section>

<?php if (is_category('blog')) : ?>

    <main id="main" class="site-main [- blog -]" role="main">
        <?php
        while (have_posts()) : the_post();
            echo '<div class="container">';
            the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter'));
            echo '</div>';
        endwhile;

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array('category_name' => 'blog', 'post_type' => 'post', 'posts_per_page' => 6, 'paged' => $paged);
        $wp_query = new WP_Query($args); ?>

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side order-2 order-lg-1">
                    <div class="blog-classic-wrap row">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="col-lg-6">
                                <!-- List posts -->
                                <div class="blog-classic-wrap__item mb-4">
                                    <?php if (has_post_thumbnail($post->ID)) : ?>
                                        <figure class="blog-classic-wrap__item-image mb-0">
                                            <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-width'); ?>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="">
                                                <img src="<?php echo $large_image_url[0]; ?>" alt="<?php the_title(); ?>" class="img-fluid">
                                            </a>
                                        </figure>
                                    <?php endif; ?>
                                    <div class="blog-classic-wrap__item-cnt bg-mint p-4">
                                        <h3 class="blog-classic-wrap__item-title standard-title-5">
                                            <strong>
                                                <a href="<?php the_permalink(); ?>" class="text-blue" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                            </strong>
                                        </h3>
                                        <div class="blog-classic-wrap__item-date text-white mb-3">
                                            <i class="fa fa-calendar-check-o"></i> <?php echo get_the_date(); ?>
                                        </div>
                                        <div class="blog-classic-wrap__item-categories text-white mb-3">
                                            <?php
                                            $id = get_the_ID();
                                            $cats = get_the_category($id);
                                            $counter_cat = 0;
                                            ?>
                                            <ul class="list-unstyled">
                                                <?php foreach ($cats as $cat) : ?>
                                                    <li>
                                                        <a href="<?php echo get_category_link($cat->cat_ID); ?>" class="<?php if ($counter_cat == 0) {
                                                                                                                            echo 'd-none';
                                                                                                                        } ?>">
                                                            <small><?php echo $cat->name; ?></small>
                                                        </a>
                                                    </li>
                                                    <?php $counter_cat++; ?>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <div class="blog-classic-wrap__item-excerpt">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12 text-end">
                                                <a href="<?php the_permalink(); ?>" class="rounded btn-red btn-block btn-radius-more">
                                                    Czytaj więcej
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side order-1 order-lg-2">
                    <div class="sidebar-side__sticky-layer pb-lg-5">
                        <!-- Search form -->
                        <div class="sidebar-side__search sidebar-side__newsletter mb-3 mb-lg-4 bg-beige p-3 position-relative">
                            <p class="sidebar-side__newsletter-txt text-blue font-weight-bold mb-2 lh-12 text-center">
                                Wyszukaj w artykułach:
                            </p>
                            <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                                <div class="form-group">
                                    <input type="hidden" name="cat" id="cat" value="26" />
                                    <input type="search" class="search-field form-control btn-radius-more" placeholder="<?php echo esc_attr_x('Szukaj', 'placeholder', 'wp-bootstrap-starter'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" required="required">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </form>
                        </div>
                        <!-- list categories -->
                        <div class="sidebar-side__category mb-3 mb-lg-4">
                            <?php
                            $args = array('parent' => 30);
                            $categories = get_categories($args);
                            ?>
                            <p class="text-blue sidebar-side__newsletter-txt font-weight-bold text-center mb-2">Kategorie</p>
                            <ul class="list-unstyled mb-0">
                                <?php
                                foreach ($categories as $category) {
                                    echo '<li><a href="' . get_category_link($category->term_id) . '" title="' . sprintf(__("Wyświetl wszystkie artykuły w %s"), $category->name) . '" ' . '>' . $category->name . ' &nbsp;<span>(' . $category->count . ')</span>' . '</a> </li> ';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php // previous_posts_link('Newer posts &rarr;');
        ?>
        <?php // next_posts_link('&larr; Older posts', $wp_query->max_num_pages);
        ?>

        <div class="container">
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                    'total'        => $wp_query->max_num_pages,
                    'current'      => max(1, get_query_var('paged')),
                    'format'       => '?paged=%#%',
                    'show_all'     => false,
                    'type'         => 'plain',
                    'end_size'     => 2,
                    'mid_size'     => 1,
                    'prev_next'    => true,
                    'prev_text'    => sprintf('<i></i> %1$s', __('< Nowsze', 'text-domain')),
                    'next_text'    => sprintf('%1$s <i></i>', __('Starsze >', 'text-domain')),
                    'add_args'     => false,
                    'add_fragment' => '',
                ));
                ?>
            </div>
        </div>
    </main><!-- #main -->





    <main id="main-blog" class="blog-post-list py-4 py-lg-5" role="main">
        <div class="container">
            <div class="row">


                <div class="col-lg-8 col-md-12 col-sm-12 content-side order-2 order-lg-1">


                </div>


                <div class="col-lg-8 col-md-12 col-sm-12 content-side order-2 order-lg-1">



                </div>

            </div>
        </div>
    </main>
<?php else : ?>
    <main id="main" class="products-details py-4 py-lg-5" role="main">
        <div class="container">
            <div class="row justify-content-center">
                <?php
                $counter = 0;
                while (have_posts()) : the_post(); ?>
                    <div class="col-lg-4 mb-3 mb-lg-4">
                        <div class="products-details__item position-relative">
                            <div class="products-details__item-img">
                                <?php if (has_post_thumbnail($post->ID)) : ?>
                                    <?php
                                    $imgID  = get_post_thumbnail_id($post->ID);
                                    $image  = wp_get_attachment_image_src($imgID, 'large', false, '');
                                    $imgAlt = get_post_meta($imgID, '_wp_attachment_image_alt', true);
                                    ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="img-link position-relative d-block">
                                        <img src="<?php echo $image[0]; ?>" alt="<?php echo $imgAlt; ?>" class="img-fluid position-relative">
                                        <p class="products-details__item-bottom houses-bottom text-right mb-0 fst-italic position-absolute standard-title-7 oswald-font">
                                            <span class="text-decoration-none">
                                                Sprawdź <i class="fa fa-angle-right"></i>
                                            </span>
                                        </p>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="products-details__bottom bg-green p-2 text-center">
                                <h2 class="teko-font mb-0">
                                    <a class="text-white text-decoration-none text-uppercase" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <?php $counter++; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </main>




<?php endif; ?>
<?php get_footer(); ?>