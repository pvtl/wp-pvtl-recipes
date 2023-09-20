<?php
/**
 * The template for displaying 'recipe' single posts
 */

get_header(); ?>


<div class="main-container">
    <div class="main-grid">
        <main class="main-content-full-width recipe-single">
            <?php while (have_posts()) : the_post(); ?>
                <div class="recipe-header">
                    <div class="recipe-title">
                        <h1><?= get_the_title(); ?></h1>
                    </div>

                    <div class="recipe-details">
                        <?php if (get_field('time_to_prepare')) { ?><div class="detail" title=""><span><i class="fas fa-clock"></i> Prep Time</span> <?=get_field('time_to_prepare'); ?></div><?php } ?>
                        <?php if (get_field('time_to_cook')) { ?><div class="detail" title=""><span><i class="fas fa-clock"></i> Cook Time</span> <?=get_field('time_to_cook'); ?></div><?php } ?>
                        <?php if (get_field('serves')) { ?><div class="detail" title="Serves"><span><i class="fas fa-users"></i> Serves</span> <?=get_field('serves'); ?></div><?php } ?>
                    </div>

                    <div class="recipe-buttons">
                    <div class="detail" title="Jump to Recipe"><a href="#recipe" class="button">Jump to Recipe <i class="fas fa-arrow-alt-down"></i></a></div>
                    </div>
                </div>
                <div class="grid margin-y">
                    <div class="recipe-text">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="recipe-image">
                            <?php echo get_the_post_thumbnail(get_the_id(), 'full') ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($recipe_content = get_field('content')) : ?>
                        <?=$recipe_content?>
                    <?php endif; ?>
                    </div>
                </div>

                <div id="recipe">
                    <div class="grid">
                        <div class="cell <?= has_post_thumbnail() ? "medium-8" : "medium-12"; ?>">
                            <h2><?= get_the_title(); ?></h2>

                            <div class="recipe-details">
                                <?php if (get_field('time_to_prepare')) { ?><div class="detail" title=""><span><i class="fas fa-clock"></i> Prep Time</span> <?=get_field('time_to_prepare'); ?></div><?php } ?>
                                <?php if (get_field('time_to_cook')) { ?><div class="detail" title=""><span><i class="fas fa-clock"></i> Cook Time</span> <?=get_field('time_to_cook'); ?></div><?php } ?>
                                <?php if (get_field('serves')) { ?><div class="detail" title="Serves"><span><i class="fas fa-users"></i> Serves</span> <?=get_field('serves'); ?></div><?php } ?>
                            </div>
                        </div>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="cell medium-4 recipe-image">
                            <?php echo get_the_post_thumbnail(get_the_id(), 'thumbnail') ?>
                        </div>
                    <?php endif; ?>
                    </div>
                    
                    <div class="grid">
                    <?php if ( !empty($ingredients_list = get_field('ingredients'))) : ?>
                        <div class="cell medium-4 recipe-ingredients">
                            <h3>Ingredients</h3>
                            <ul class="ingredients-list">
                                <?php foreach ($ingredients_list as $ingredient) : ?>
                                    <?php if ($ingredient['use_as_heading'] == true) : ?>
                                        <h5><?= $ingredient['ingredient']; ?></h5>
                                    <?php else : ?>
                                    <li><?=$ingredient['quantity']; ?> <?=$ingredient['measurement']; ?> <?=$ingredient['ingredient']; ?> <?=$ingredient['ingredient_notes']; ?></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                        <div class="cell medium-8 recipe-method">
                            <h3>Method</h3>
                            <?php the_field('directions'); ?>
                        </div>
                    </div>


                <?php if ($recipe_notes = get_field('notes')) : ?>
                    <div class="recipe-notes">
                        <h3>Recipe Notes</h3>
                        <?= $recipe_notes; ?>
                    </div>
                <?php endif; ?>
                </div>

                <div class="recipe-text">
                    <?php if ( have_rows( 'images' ) ) : 
                        $row = 0; ?>
                        <div class="recipe-additional-imgs">
                            <?php while ( have_rows( 'images' ) ) : the_row(); ?>
						        <?= wp_get_attachment_image( get_sub_field( 'image' ), 'medium' ); ?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($recipe_add_content = get_field('additional_content')) { ?>
                        <?=$recipe_add_content?>
                    <?php } ?>
                </div>

                <?php if (!empty($recipe_faqs = get_field('faq'))) { ?>
                    <div class="recipe-faq">
                        <h2>Frequently Asked Questions</h2>
                        <?php foreach ($recipe_faqs as $faq) : ?>
                        <div class="faq">
                            <h5 class="question"><?= $faq['question']; ?></h5>
                            <div class="answer"><p><?= $faq['answer']; ?></p></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                <?php } ?>
            <?php endwhile; ?>
        </main>

        <?php //comments_template(); ?>
    </div>
</div>

<?php get_footer();
