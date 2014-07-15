<?php

// =============================================================================
// VIEWS/INTEGRITY/WOOCOMMERCE.PHP
// -----------------------------------------------------------------------------
// WooCommerce page output for Integrity.
// =============================================================================

?>

<?php get_header(); ?>

  <div class="x-container-fluid max width offset cf">
    <div class="<?php x_integrity_main_content_class(); ?>" role="main">

      <?php woocommerce_content(); ?>

    </div> <!-- end .x-main -->

    <?php get_sidebar(); ?>

  </div> <!-- end .x-container-fluid.max.width.offset.cf -->

<?php get_footer(); ?>