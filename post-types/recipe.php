<?php

/**
 * Registers the `recipe` post type.
 */
function recipe_init()
{
    register_post_type('recipe', array(
        'labels'                => array(
            'name'                  => __('Recipes', 'recipes'),
            'singular_name'         => __('Recipes', 'recipes'),
            'all_items'             => __('All Recipes', 'recipes'),
            'archives'              => __('Recipes Archives', 'recipes'),
            'attributes'            => __('Recipes Attributes', 'recipes'),
            'insert_into_item'      => __('Insert into Recipes', 'recipes'),
            'uploaded_to_this_item' => __('Uploaded to this Recipes', 'recipes'),
            'featured_image'        => _x('Featured Image', 'recipe', 'recipes'),
            'set_featured_image'    => _x('Set featured image', 'recipe', 'recipes'),
            'remove_featured_image' => _x('Remove featured image', 'recipe', 'recipes'),
            'use_featured_image'    => _x('Use as featured image', 'recipe', 'recipes'),
            'filter_items_list'     => __('Filter Recipes list', 'recipes'),
            'items_list_navigation' => __('Recipes list navigation', 'recipes'),
            'items_list'            => __('Recipes list', 'recipes'),
            'new_item'              => __('New Recipes', 'recipes'),
            'add_new'               => __('Add New', 'recipes'),
            'add_new_item'          => __('Add New Recipes', 'recipes'),
            'edit_item'             => __('Edit Recipes', 'recipes'),
            'view_item'             => __('View Recipes', 'recipes'),
            'view_items'            => __('View Recipes', 'recipes'),
            'search_items'          => __('Search Recipes', 'recipes'),
            'not_found'             => __('No Recipes found', 'recipes'),
            'not_found_in_trash'    => __('No Recipes found in trash', 'recipes'),
            'parent_item_colon'     => __('Parent Recipes:', 'recipes'),
            'menu_name'             => __('Recipes', 'recipes'),
       ),
        'public'                => true,
        'hierarchical'          => false,
        'show_ui'               => true,
        'show_in_nav_menus'     => true,
        'supports'              => array('title', 'thumbnail', 'comments'),
        'has_archive'           => true,
        'rewrite'               => true,
        'query_var'             => true,
        'menu_icon'             => 'dashicons-book-alt',
        'show_in_rest'          => true,
        'rest_base'             => 'recipe',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'rewrite' => array(
            'slug' => 'recipes'
        ),
    ));
}
add_action('init', 'recipe_init');

/**
 * Sets the post updated messages for the `recipe` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `recipe` post type.
 */
function recipe_updated_messages($messages)
{
    global $post;

    $permalink = get_permalink($post);

    $messages['recipe'] = array(
        0  => '', // Unused. Messages start at index 1.
        /* translators: %s: post permalink */
        1  => sprintf(__('Recipes updated. <a target="_blank" href="%s">View Recipes</a>', 'recipes'), esc_url($permalink)),
        2  => __('Custom field updated.', 'recipes'),
        3  => __('Custom field deleted.', 'recipes'),
        4  => __('Recipes updated.', 'recipes'),
        /* translators: %s: date and time of the revision */
        5  => isset($_GET['revision']) ? sprintf(__('Recipes restored to revision from %s', 'recipes'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
        /* translators: %s: post permalink */
        6  => sprintf(__('Recipes published. <a href="%s">View Recipes</a>', 'recipes'), esc_url($permalink)),
        7  => __('Recipes saved.', 'recipes'),
        /* translators: %s: post permalink */
        8  => sprintf(__('Recipes submitted. <a target="_blank" href="%s">Preview Recipes</a>', 'recipes'), esc_url(add_query_arg('preview', 'true', $permalink))),
        /* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
        9  => sprintf(
            __('Recipes scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Recipes</a>', 'recipes'),
            date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)),
            esc_url($permalink)
        ),
        /* translators: %s: post permalink */
        10 => sprintf(__('Recipes draft updated. <a target="_blank" href="%s">Preview Recipes</a>', 'recipes'), esc_url(add_query_arg('preview', 'true', $permalink))),
    );

    return $messages;
}
add_filter('post_updated_messages', 'recipe_updated_messages');
