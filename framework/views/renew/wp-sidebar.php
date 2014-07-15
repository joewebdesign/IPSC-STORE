<?php

// =============================================================================
// VIEWS/RENEW/WP-SIDEBAR.PHP
// -----------------------------------------------------------------------------
// Sidebar output for Renew.
// =============================================================================

?>

<?php

$blog_layout      = get_theme_mod( 'x_blog_layout' );
$archive_layout   = get_theme_mod( 'x_archive_layout' );
$shop_layout      = get_theme_mod( 'x_woocommerce_shop_layout_content' );
$portfolio_layout = get_post_meta( get_the_ID(), '_x_portfolio_layout', true );
$main_layout      = get_theme_mod( 'x_renew_layout_content' );

if ( $main_layout != 'full-width' ) {
  if ( is_home() ) {
    $layout = $blog_layout;
  } elseif ( is_page_template( 'template-layout-portfolio.php' ) ) {
    $layout = $portfolio_layout;
  } elseif ( is_archive() ) {
    if ( function_exists( 'is_shop' ) && is_shop() ) {
      $layout = $shop_layout;
    } else {
      $layout = $archive_layout;
    }
  } elseif ( function_exists( 'is_product' ) && is_product() ) {
    $layout = 'full-width';
  } else {
    $layout = $main_layout;
  }
} else {
  $layout = $main_layout;
}

?>

<?php if ( is_page_template( 'template-layout-content-sidebar.php' ) ) : ?>

  <aside class="x-sidebar right" role="complementary">
    <?php if ( get_option( 'ups_sidebars' ) != array() ) : ?>
      <?php dynamic_sidebar( apply_filters( 'ups_sidebar', 'sidebar-main' ) ); ?>
    <?php else : ?>
      <?php dynamic_sidebar( 'sidebar-main' ); ?>
    <?php endif; ?>
  </aside>

<?php elseif ( is_page_template( 'template-layout-sidebar-content.php' ) ) : ?>

  <aside class="x-sidebar left" role="complementary">
    <?php if ( get_option( 'ups_sidebars' ) != array() ) : ?>
      <?php dynamic_sidebar( apply_filters( 'ups_sidebar', 'sidebar-main' ) ); ?>
    <?php else : ?>
      <?php dynamic_sidebar( 'sidebar-main' ); ?>
    <?php endif; ?>
  </aside>

<?php elseif ( $layout != 'full-width' ) : ?>

  <aside class="<?php x_renew_sidebar_class(); ?>" role="complementary">
    <?php if ( get_option( 'ups_sidebars' ) != array() ) : ?>
      <?php dynamic_sidebar( apply_filters( 'ups_sidebar', 'sidebar-main' ) ); ?>
    <?php else : ?>
      <?php dynamic_sidebar( 'sidebar-main' ); ?>
    <?php endif; ?>
  </aside>

<?php endif; ?>