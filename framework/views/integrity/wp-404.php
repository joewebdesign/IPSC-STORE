<?php

// =============================================================================
// VIEWS/INTEGRITY/WP-404.PHP
// -----------------------------------------------------------------------------
// Handles output for when a page does not exist.
// =============================================================================

?>

<?php get_header(); ?>

  <div class="x-main x-container-fluid max width offset" role="main">
    <div class="entry-wrap entry-404">

        <?php x_get_view( 'global', '_content-404' ); ?>

    </div>
  </div> <!-- end .x-main.x-container-fluid.max.width.offset -->

<?php get_footer(); ?>