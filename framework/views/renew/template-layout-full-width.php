<?php

// =============================================================================
// VIEWS/RENEW/TEMPLATE-LAYOUT-FULL-WIDTH.PHP
// -----------------------------------------------------------------------------
// Full width page output for Renew.
// =============================================================================

?>

<?php get_header(); ?>

  <div class=".x-main x-container-fluid max width offset" role="main">

    <?php while ( have_posts() ) : the_post(); ?>
      <?php x_get_view( 'renew', 'content', 'page' ); ?>
      <?php x_get_view( 'renew', '_comments-template' ); ?>
    <?php endwhile; ?>

  </div> <!-- end .x-main.x-container-fluid.max.width.offset -->

<?php get_footer(); ?>