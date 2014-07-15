<?php

// =============================================================================
// VIEWS/RENEW/WP-SINGLE-X-PORTFOLIO.PHP
// -----------------------------------------------------------------------------
// Single portfolio post output for Renew.
// =============================================================================

?>

<?php get_header(); ?>
  
  <div class="x-container-fluid max width offset">
    <div class="x-row-fluid">
      <div class="x-main full" role="main">

        <?php while ( have_posts() ) : the_post(); ?>
          <?php x_get_view( 'renew', 'content', 'portfolio' ); ?>
          <?php x_get_view( 'renew', '_comments-template' ); ?>
        <?php endwhile; ?>

      </div> <!-- end .x-main.full -->
    </div> <!-- end .x-row-fluid -->
  </div> <!-- end .x-container-fluid.max.width.offset -->

<?php get_footer(); ?>