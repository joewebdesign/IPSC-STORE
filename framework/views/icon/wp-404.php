<?php

// =============================================================================
// VIEWS/ICON/WP-404.PHP
// -----------------------------------------------------------------------------
// Handles output for when a page does not exist.
// =============================================================================

?>

<?php get_header(); ?>

  <div class="x-main" role="main">
  	<div class="x-container-fluid max width">
      <div class="entry-404">

        <?php x_get_view( 'global', '_content-404' ); ?>

      </div> <!-- end .entry-404 -->
    </div> <!-- end .x-container-fluid.max.width -->
  </div> <!-- end .x-main -->

  <?php get_sidebar(); ?>
<?php get_footer(); ?>