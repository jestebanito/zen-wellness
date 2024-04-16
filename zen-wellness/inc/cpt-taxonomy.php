<?php
function zen_wellness_register_custom_post_types() {
    
    // Register Team
    $labels = array(
        'name'               => _x('Team', 'post type general name'),
        'singular_name'      => _x('Team', 'post type singular name'),
        'menu_name'          => _x('Team', 'admin menu'),
        'name_admin_bar'     => _x('Team', 'add new on admin bar'),
        'add_new'            => _x('Add New', 'Team'),
        'add_new_item'       => __('Add New Team'),
        'new_item'           => __('New Team'),
        'edit_item'          => __('Edit Team'),
        'view_item'          => __('View Team'),
        'all_items'          => __('Our Team'),
        'search_items'       => __('Search Team'),
        'parent_item_colon'  => __('Parent Team:'),
        'not_found'          => __('No Team found.'),
        'not_found_in_trash' => __('No Team found in Trash.'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'team'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-admin-users',
        'supports'           => array('title', 'thumbnail', 'excerpt'),
        'template'           => array(array('core/paragraph')),
        'template_lock'      => 'all',
    );

    register_post_type('zen-wellness-team', $args);
}
add_action('init', 'zen_wellness_register_custom_post_types');

function zen_wellness_rewrite_flush()
{
    zen_wellness_register_custom_post_types();
    zen_wellness_rewrite_flush();
}
add_action('after_switch_theme', 'zen_wellness_rewrite_flush');
