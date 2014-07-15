<?php

// =============================================================================
// VIEWS/RENEW/WP-INDEX.PHP
// -----------------------------------------------------------------------------
// Index page output for Renew.
// =============================================================================

?>

<?php get_header(); ?>

  <div class="x-container-fluid max width offset cf">
    <div class="<?php x_renew_main_content_class(); ?>" role="main">

      <?php x_get_view( 'global', '_index' ); ?>

    </div> <!-- end .x-main -->

    <?php get_sidebar(); ?>

  </div> <!-- end .x-container-fluid.max.width.offset.cf -->

<?php get_footer(); ?>