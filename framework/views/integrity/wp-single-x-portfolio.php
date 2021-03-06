<?php

// =============================================================================
// VIEWS/INTEGRITY/WP-SINGLE-X-PORTFOLIO.PHP
// -----------------------------------------------------------------------------
// Single portfolio post output for Integrity.
// =============================================================================

?>

<?php get_header(); ?>
  
  <div class="x-container-fluid max width offset cf">
    <div class="x-main full" role="main">

      <?php while ( have_posts() ) : the_post(); ?>
        <?php x_get_view( 'integrity', 'content', 'portfolio' ); ?>
        <?php x_get_view( 'integrity', '_comments-template' ); ?>
      <?php endwhile; ?>
      

    </div> <!-- end .x-main.full -->
  </div> <!-- end .x-container-fluid.max.width.offset.cf -->

<?php get_footer(); ?>