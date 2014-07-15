<?php

// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/CUSTOM-POST-TYPES.PHP
// -----------------------------------------------------------------------------
// Sets up custom post types for X.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Portfolio Custom Post Type
//   02. Add Thumbnails to the Admin Screen
// =============================================================================

// Portfolio Custom Post Type
// =============================================================================

function x_portfolio_init() {

  $slug      = sanitize_title( get_theme_mod( 'x_custom_portfolio_slug' ) );
  $menu_icon = ( floatval( get_bloginfo( 'version' ) ) >= '3.8' ) ? 'dashicons-format-gallery' : NULL;


  //
  // Enable the custom post type.
  //

  $labels = array(
    'name'               => __( 'Portfolio', '__x__' ),
    'singular_name'      => __( 'Portfolio Item', '__x__' ),
    'add_new'            => __( 'Add New Item', '__x__' ),
    'add_new_item'       => __( 'Add New Portfolio Item', '__x__' ),
    'edit_item'          => __( 'Edit Portfolio Item', '__x__' ),
    'new_item'           => __( 'Add New Portfolio Item', '__x__' ),
    'view_item'          => __( 'View Item', '__x__' ),
    'search_items'       => __( 'Search Portfolio', '__x__' ),
    'not_found'          => __( 'No portfolio items found', '__x__' ),
    'not_found_in_trash' => __( 'No portfolio items found in trash', '__x__' )
  );

  $args = array(
    'labels'          => $labels,
    'public'          => true,
    'show_ui'         => true,
    'supports'        => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'author', 'custom-fields', 'revisions' ),
    'capability_type' => 'post',
    'hierarchical'    => false,
    'rewrite'         => array( 'slug' => $slug, 'with_front' => false ),
    'menu_position'   => 5,
    'menu_icon'       => $menu_icon,
    'has_archive'     => true
  );

  $args = apply_filters( 'portfolioposttype_args', $args );

  register_post_type( 'x-portfolio', $args );


  //
  // Portfolio tags taxonomy.
  //

  $taxonomy_portfolio_tag_labels = array(
    'name'                       => __( 'Portfolio Tags', '__x__' ),
    'singular_name'              => __( 'Portfolio Tag', '__x__' ),
    'search_items'               => __( 'Search Portfolio Tags', '__x__' ),
    'popular_items'              => __( 'Popular Portfolio Tags', '__x__' ),
    'all_items'                  => __( 'All Portfolio Tags', '__x__' ),
    'parent_item'                => __( 'Parent Portfolio Tag', '__x__' ),
    'parent_item_colon'          => __( 'Parent Portfolio Tag:', '__x__' ),
    'edit_item'                  => __( 'Edit Portfolio Tag', '__x__' ),
    'update_item'                => __( 'Update Portfolio Tag', '__x__' ),
    'add_new_item'               => __( 'Add New Portfolio Tag', '__x__' ),
    'new_item_name'              => __( 'New Portfolio Tag Name', '__x__' ),
    'separate_items_with_commas' => __( 'Separate portfolio tags with commas', '__x__' ),
    'add_or_remove_items'        => __( 'Add or remove portfolio tags', '__x__' ),
    'choose_from_most_used'      => __( 'Choose from the most used portfolio tags', '__x__' ),
    'menu_name'                  => __( 'Portfolio Tags', '__x__' )
  );

  $taxonomy_portfolio_tag_args = array(
    'labels'            => $taxonomy_portfolio_tag_labels,
    'public'            => true,
    'show_in_nav_menus' => true,
    'show_ui'           => true,
    'show_tagcloud'     => true,
    'hierarchical'      => false,
    'rewrite'           => array( 'slug' => $slug . '-tag', 'with_front' => false ),
    'show_admin_column' => true,
    'query_var'         => true
  );

  register_taxonomy( 'portfolio-tag', array( 'x-portfolio' ), $taxonomy_portfolio_tag_args );


  //
  // Portfolio categories taxonomy.
  //

  $taxonomy_portfolio_category_labels = array(
    'name'                       => __( 'Portfolio Categories', '__x__' ),
    'singular_name'              => __( 'Portfolio Category', '__x__' ),
    'search_items'               => __( 'Search Portfolio Categories', '__x__' ),
    'popular_items'              => __( 'Popular Portfolio Categories', '__x__' ),
    'all_items'                  => __( 'All Portfolio Categories', '__x__' ),
    'parent_item'                => __( 'Parent Portfolio Category', '__x__' ),
    'parent_item_colon'          => __( 'Parent Portfolio Category:', '__x__' ),
    'edit_item'                  => __( 'Edit Portfolio Category', '__x__' ),
    'update_item'                => __( 'Update Portfolio Category', '__x__' ),
    'add_new_item'               => __( 'Add New Portfolio Category', '__x__' ),
    'new_item_name'              => __( 'New Portfolio Category Name', '__x__' ),
    'separate_items_with_commas' => __( 'Separate portfolio categories with commas', '__x__' ),
    'add_or_remove_items'        => __( 'Add or remove portfolio categories', '__x__' ),
    'choose_from_most_used'      => __( 'Choose from the most used portfolio categories', '__x__' ),
    'menu_name'                  => __( 'Portfolio Categories', '__x__' ),
  );

  $taxonomy_portfolio_category_args = array(
    'labels'            => $taxonomy_portfolio_category_labels,
    'public'            => true,
    'show_in_nav_menus' => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'show_tagcloud'     => true,
    'hierarchical'      => true,
    'rewrite'           => array( 'slug' => $slug . '-category', 'with_front' => false ),
    'query_var'         => true
  );

  register_taxonomy( 'portfolio-category', array( 'x-portfolio' ), $taxonomy_portfolio_category_args );

}

add_action( 'init', 'x_portfolio_init' );



// Add Thumbnails to the Admin Screen
// =============================================================================

function x_add_thumbnail_column( $columns ) {
  $column_thumbnail = array( 'thumbnail' => __( 'Thumbnail', '__x__' ) );
  $columns          = array_slice( $columns, 0, 2, true ) + $column_thumbnail + array_slice( $columns, 1, NULL, true );
  return $columns;
}

function x_display_thumbnail( $column ) {
  GLOBAL $post;
  switch ( $column ) {
    case 'thumbnail':
      echo '<a href="' . get_edit_post_link() . '">' . get_the_post_thumbnail( get_the_ID(), array( 200, 200 ) ) . '</a>';
      break;
  }
}

add_filter( 'manage_edit-x-portfolio_columns', 'x_add_thumbnail_column', 10, 1 );
add_action( 'manage_posts_custom_column', 'x_display_thumbnail', 10, 1 );