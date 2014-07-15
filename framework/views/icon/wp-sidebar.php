<?php

// =============================================================================
// VIEWS/ICON/WP-SIDEBAR.PHP
// -----------------------------------------------------------------------------
// Sidebar output for Icon.
// =============================================================================

?>

<?php

$blog_layout      = get_theme_mod( 'x_blog_layout' );
$archive_layout   = get_theme_mod( 'x_archive_layout' );
$shop_layout      = get_theme_mod( 'x_woocommerce_shop_layout_content' );
$portfolio_layout = get_post_meta( get_the_ID(), '_x_portfolio_layout', true );
$main_layout      = get_theme_mod( 'x_icon_layout_content' );

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
    $layout = 'product';
  } else {
    $layout = $main_layout;
  }
} else {
  $layout = $main_layout;
}

?>

<?php if ( $layout != 'full-width' ) : ?>

  <aside class="x-sidebar nano" role="complementary">
    <div class="max width nano-content">
      <?php if ( get_option( 'ups_sidebars' ) != array() ) : ?>
        <?php dynamic_sidebar( apply_filters( 'ups_sidebar', 'sidebar-main' ) ); ?>
      <?php else : ?>
        <?php dynamic_sidebar( 'sidebar-main' ); ?>
      <?php endif; ?>
    </div>
  </aside>

<?php endif; ?>