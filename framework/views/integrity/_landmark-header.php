<?php

// =============================================================================
// VIEWS/INTEGRITY/_LANDMARK-HEADER.PHP
// -----------------------------------------------------------------------------
// Handles content output of large headers for key pages such as the blog or
// search results.
// =============================================================================

?>

<?php if ( is_home() && get_theme_mod( 'x_integrity_blog_header_enable' ) == 1 ) : ?>

  <header class="x-header-landmark x-container-fluid max width">
    <h1 class="h-landmark"><span><?php echo get_theme_mod( 'x_integrity_blog_title' ); ?></span></h1>
    <p class="p-landmark-sub"><span><?php echo get_theme_mod( 'x_integrity_blog_subtitle' ); ?></span></p>
  </header>

<?php elseif ( is_search() ) : ?>

  <header class="x-header-landmark x-container-fluid max width">
    <h1 class="h-landmark"><span><?php _e( 'Search Results', '__x__' ); ?></span></h1>
    <p class="p-landmark-sub"><span><?php _e( "Below you'll see everything we could locate for your search of ", '__x__' ); echo '<strong>&ldquo;'; the_search_query(); echo '&rdquo;</strong>'; ?></span></p>
  </header>

<?php elseif ( is_category() || is_tax( 'portfolio-category' ) ) : ?>

  <?php

  $queried_object = get_queried_object();
  $t_id           = $queried_object->term_id;
  $term_meta      = get_option( 'taxonomy_' . $t_id );
  $title          = ( $term_meta['archive-title']    != '' ) ? $term_meta['archive-title']    : __( 'Category Archive', '__x__' );
  $subtitle       = ( $term_meta['archive-subtitle'] != '' ) ? $term_meta['archive-subtitle'] : __( "Below you'll find a list of all posts that have been categorized as ", '__x__' ) . '<strong>&ldquo;' . single_cat_title( '', false ) . '&rdquo;</strong>';

  ?>

  <header class="x-header-landmark x-container-fluid max width">
    <h1 class="h-landmark"><span><?php echo $title ?></span></h1>
    <p class="p-landmark-sub"><span><?php echo $subtitle ?></span></p>
  </header>

<?php elseif ( function_exists( 'is_product_category' ) && is_product_category() ) : ?>

  <?php

  $queried_object = get_queried_object();
  $t_id           = $queried_object->term_id;
  $term_meta      = get_option( 'taxonomy_' . $t_id );
  $title          = ( $term_meta['archive-title']    != '' ) ? $term_meta['archive-title']    : __( 'Category Archive', '__x__' );
  $subtitle       = ( $term_meta['archive-subtitle'] != '' ) ? $term_meta['archive-subtitle'] : __( "Below you'll find a list of all items that have been categorized as ", '__x__' ) . '<strong>&ldquo;' . single_cat_title( '', false ) . '&rdquo;</strong>';

  ?>

  <header class="x-header-landmark x-container-fluid max width">
    <h1 class="h-landmark"><span><?php echo $title ?></span></h1>
    <p class="p-landmark-sub"><span><?php echo $subtitle ?></span></p>
  </header>

<?php elseif ( is_tag() || is_tax( 'portfolio-tag' )  ) : ?>

  <?php

  $queried_object = get_queried_object();
  $t_id           = $queried_object->term_id;
  $term_meta      = get_option( 'taxonomy_' . $t_id );
  $title          = ( $term_meta['archive-title']    != '' ) ? $term_meta['archive-title']    : __( 'Tag Archive', '__x__' );
  $subtitle       = ( $term_meta['archive-subtitle'] != '' ) ? $term_meta['archive-subtitle'] : __( "Below you'll find a list of all posts that have been tagged as ", '__x__' ) . '<strong>&ldquo;' . single_tag_title( '', false ) . '&rdquo;</strong>';

  ?>

  <header class="x-header-landmark x-container-fluid max width">
    <h1 class="h-landmark"><span><?php echo $title; ?></span></h1>
    <p class="p-landmark-sub"><span><?php echo $subtitle; ?></span></p>
  </header>

<?php elseif ( function_exists( 'is_product_tag' ) && is_product_tag() ) : ?>

  <?php

  $queried_object = get_queried_object();
  $t_id           = $queried_object->term_id;
  $term_meta      = get_option( 'taxonomy_' . $t_id );
  $title          = ( $term_meta['archive-title']    != '' ) ? $term_meta['archive-title']    : __( 'Tag Archive', '__x__' );
  $subtitle       = ( $term_meta['archive-subtitle'] != '' ) ? $term_meta['archive-subtitle'] : __( "Below you'll find a list of all items that have been tagged as ", '__x__' ) . '<strong>&ldquo;' . single_tag_title( '', false ) . '&rdquo;</strong>';

  ?>

  <header class="x-header-landmark x-container-fluid max width">
    <h1 class="h-landmark"><span><?php echo $title; ?></span></h1>
    <p class="p-landmark-sub"><span><?php echo $subtitle; ?></span></p>
  </header>

<?php elseif ( is_404() ) : ?>

  <header class="x-header-landmark x-container-fluid max width">
    <h1 class="h-landmark"><span><?php _e( 'Oops!', '__x__' ); ?></span></h1>
    <p class="p-landmark-sub"><span><?php _e( "You blew up the Internet. ", '__x__' ); ?></span></p>
  </header>

<?php elseif ( is_year() ) : ?>

  <header class="x-header-landmark x-container-fluid max width">
    <h1 class="h-landmark"><span><?php _e( 'Post Archive by Year', '__x__' ); ?></span></h1>
    <p class="p-landmark-sub"><span><?php _e( "Below you'll find a list of all posts from ", '__x__' ); echo '<strong>'; echo get_the_date( 'Y' ); echo '</strong>'; ?></span></p>
  </header>

<?php elseif ( is_month() ) : ?>

  <header class="x-header-landmark x-container-fluid max width">
    <h1 class="h-landmark"><span><?php _e( 'Post Archive by Month', '__x__' ); ?></span></h1>
    <p class="p-landmark-sub"><span><?php _e( "Below you'll find a list of all posts from ", '__x__' ); echo '<strong>'; echo get_the_date( 'F, Y' ); echo '</strong>'; ?></span></p>
  </header>

<?php elseif ( is_day() ) : ?>

  <header class="x-header-landmark x-container-fluid max width">
    <h1 class="h-landmark"><span><?php _e( 'Post Archive by Day', '__x__' ); ?></span></h1>
    <p class="p-landmark-sub"><span><?php _e( "Below you'll find a list of all posts from ", '__x__' ); echo '<strong>'; echo get_the_date( 'F j, Y' ); echo '</strong>'; ?></span></p>
  </header>

<?php elseif ( is_page_template( 'template-layout-portfolio.php' ) ) : ?>

  <header class="x-header-landmark x-container-fluid max width">
    <h1 class="h-landmark"><span><?php the_title(); ?></span></h1>
    <?php x_portfolio_filters(); ?>
  </header>

<?php elseif ( function_exists( 'is_shop' ) ) : ?>
  <?php if ( is_shop() && get_theme_mod( 'x_integrity_shop_header_enable' ) == 1 ) : ?>

    <header class="x-header-landmark x-container-fluid max width">
      <h1 class="h-landmark"><span><?php echo get_theme_mod( 'x_integrity_shop_title' ); ?></span></h1>
      <p class="p-landmark-sub"><span><?php echo get_theme_mod( 'x_integrity_shop_subtitle' ); ?></span></p>
    </header>

  <?php endif; ?>
<?php endif; ?>