<?php

// =============================================================================
// FUNCTIONS/GLOBAL/PORTFOLIO.PHP
// -----------------------------------------------------------------------------
// Portfolio related functions beyond custom post type setup.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Get the Page Link to First Portfolio Page
//   02. Get the Page Title to First Portfolio Page
//   03. Output Portfolio Filters
// =============================================================================

// Get the Page Link to First Portfolio Page
// =============================================================================

function x_get_first_portfolio_page_link() {

  $results = get_pages( array(
    'meta_key'    => '_wp_page_template',
    'meta_value'  => 'template-layout-portfolio.php',
    'sort_order'  => 'ASC',
    'sort_column' => 'ID'
  ) );

  return get_page_link( $results[0]->ID );

}



// Get the Page Title to First Portfolio Page
// =============================================================================

function x_get_first_portfolio_page_title() {

  $results = get_pages( array(
    'meta_key'    => '_wp_page_template',
    'meta_value'  => 'template-layout-portfolio.php',
    'sort_order'  => 'ASC',
    'sort_column' => 'ID'
  ) );

  return $results[0]->post_title;

}



// Output Portfolio Filters
// =============================================================================

function x_portfolio_filters() {

  $filters         = get_post_meta( get_the_ID(), '_x_portfolio_category_filters', true );
  $disable_filters = get_post_meta( get_the_ID(), '_x_portfolio_disable_filtering', true );
  $one_filter      = count( $filters ) == 1;
  $all_categories  = in_array( 'All Categories', $filters );

  if ( $one_filter && $all_categories ) {

    $terms = get_terms( 'portfolio-category' );

  } elseif ( $one_filter && ! $all_categories ) {

    $terms = array();
    foreach ( $filters as $filter ) {
      $children = get_term_children( $filter, 'portfolio-category' );
      $terms    = array_merge( $children, $terms );
    }
    $terms = get_terms( 'portfolio-category', array( 'include' => $terms ) );

  } else {

    $terms = array();
    foreach ( $filters as $filter ) {
      $parent   = array( $filter );
      $children = get_term_children( $filter, 'portfolio-category' );
      $terms    = array_merge( $parent, $terms );
      $terms    = array_merge( $children, $terms );
    }
    $terms = get_terms( 'portfolio-category', array( 'include' => $terms ) );

  }

  if ( x_get_stack() == 'integrity' ) {
    $button_content = '<i class="x-icon-sort"></i> <span>' . get_theme_mod( 'x_integrity_portfolio_archive_sort_button_text' ) . '</span>';
  } else {
    $button_content = '<i class="x-icon-plus"></i>';
  }

  if ( $disable_filters != 'on' ) {

  ?>

    <ul class="option-set unstyled" data-option-key="filter">
      <li>
        <a href="#" class="x-portfolio-filters">
          <?php echo $button_content; ?>
        </a>
        <ul class="x-portfolio-filters-menu unstyled">
          <li><a href="#" data-option-value="*" class="x-portfolio-filter"><?php _e( 'All', '__x__' ); ?></a></li>
          <?php foreach ( $terms as $term ) { ?>
            <li><a href="#" data-option-value=".x-portfolio-<?php echo md5( $term->slug ); ?>" class="x-portfolio-filter"><?php echo $term->name; ?></a></li>
          <?php } ?>
        </ul>
      </li>
    </ul>

  <?php

  }

}