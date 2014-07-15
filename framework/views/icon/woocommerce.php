<?php

// =============================================================================
// VIEWS/ICON/WOOCOMMERCE.PHP
// -----------------------------------------------------------------------------
// WooCommerce page output for Icon.
// =============================================================================

?>

<?php get_header(); ?>

  <div class="x-main" role="main">
    <div class="x-container-fluid max width offset-top offset-bottom">

      <?php if ( is_shop() ) : ?>
        <header class="entry-header shop">
          <h1 class="entry-title"><?php echo get_theme_mod( 'x_icon_shop_title' ); ?></h1>
        </header>
      <?php endif; ?>

      <?php woocommerce_content(); ?>

    </div> <!-- end .x-container-fluid.max.width.offset-top.offset-bottom -->
  </div> <!-- end .x-main -->

  <?php get_sidebar(); ?>
<?php get_footer(); ?>