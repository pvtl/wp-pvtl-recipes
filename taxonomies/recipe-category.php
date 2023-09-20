<?php

/**
 * Registers the `recipe_category` taxonomy,
 * for use with 'recipe'.
 */
function recipe_category_init()
{
    register_taxonomy('recipe-category', array('recipe'), array(
        'hierarchical'      => false,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_ui'           => true,
        'show_admin_column' => false,
        'query_var'         => true,
        'rewrite'           => true,
        'capabilities'      => array(
            'manage_terms'  => 'edit_posts',
            'edit_terms'    => 'edit_posts',
            'delete_terms'  => 'edit_posts',
            'assign_terms'  => 'edit_posts',
       ),
        'labels'            => array(
            'name'                       => __('Categories', 'recipes'),
            'singular_name'              => _x('Categories', 'taxonomy general name', 'recipes'),
            'search_items'               => __('Search Categories', 'recipes'),
            'popular_items'              => __('Popular Categories', 'recipes'),
            'all_items'                  => __('All Categories', 'recipes'),
            'parent_item'                => __('Parent Categories', 'recipes'),
            'parent_item_colon'          => __('Parent Categories:', 'recipes'),
            'edit_item'                  => __('Edit Category', 'recipes'),
            'update_item'                => __('Update Category', 'recipes'),
            'view_item'                  => __('View Categories', 'recipes'),
            'add_new_item'               => __('Add Category', 'recipes'),
            'new_item_name'              => __('New Categories', 'recipes'),
            'separate_items_with_commas' => __('Separate Categories with commas', 'recipes'),
            'add_or_remove_items'        => __('Add or remove Categories', 'recipes'),
            'choose_from_most_used'      => __('Choose from the most used Categories', 'recipes'),
            'not_found'                  => __('No Categories found.', 'recipes'),
            'no_terms'                   => __('No Categories', 'recipes'),
            'menu_name'                  => __('Categories', 'recipes'),
            'items_list_navigation'      => __('Categories list navigation', 'recipes'),
            'items_list'                 => __('Categories list', 'recipes'),
            'most_used'                  => _x('Most Used', 'recipe-category', 'recipes'),
            'back_to_items'              => __('&larr; Back to Categories', 'recipes'),
       ),
        'show_in_rest'      => true,
        'rest_base'         => 'recipe-category',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
    ));
}
add_action('init', 'recipe_category_init');

/**
 * Sets the post updated messages for the `recipe_category` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `recipe_category` taxonomy.
 */
function recipe_category_updated_messages($messages)
{

    $messages['recipe-category'] = array(
        0 => '', // Unused. Messages start at index 1.
        1 => __('Categories added.', 'recipes'),
        2 => __('Categories deleted.', 'recipes'),
        3 => __('Categories updated.', 'recipes'),
        4 => __('Categories not added.', 'recipes'),
        5 => __('Categories not updated.', 'recipes'),
        6 => __('Categories deleted.', 'recipes'),
    );

    return $messages;
}
add_filter('term_updated_messages', 'recipe_category_updated_messages');
