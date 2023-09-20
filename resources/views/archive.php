<?php
/**
 * The template for displaying archive pages
 */

get_header(); ?>

<?php get_template_part('template-parts/featured-image'); ?>

<main class="main-content">

    <div class="page-block white recipes-listing">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell main-content-side medium-7 large-8">

                    <?php if (have_posts()) : ?>
                        <div class="post-list recipes grid-x grid-margin-x grid-margin-y small-up-1 large-up-2">
                            <?php while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/listing' );
                            endwhile; ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    if (function_exists('foundationpress_pagination')) :
                        foundationpress_pagination();
                    elseif (is_paged()) :
                    ?>
                        <nav id="post-nav">
                            <div class="post-previous"><?php next_posts_link(__('&larr; Older posts', 'foundationpress')); ?></div>
                            <div class="post-next"><?php previous_posts_link(__('Newer posts &rarr;', 'foundationpress')); ?></div>
                        </nav>
                    <?php endif; ?>
                </div>

                <?php get_sidebar('recipes'); ?>
            </div>
        </div>
    </div>
</main>



<?php get_footer();
