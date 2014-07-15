<?php

// =============================================================================
// VIEWS/RENEW/TEMPLATE-LAYOUT-SIDEBAR-CONTENT.PHP
// -----------------------------------------------------------------------------
// Sidebar left, content right page output for Renew.
// =============================================================================

?>

<?php get_header(); ?>

  <div class="x-container-fluid max width offset cf">
    <div class="x-main right" role="main">

      <?php while ( have_posts() ) : the_post(); ?>
        <?php x_get_view( 'renew', 'content', 'page' ); ?>
        <?php x_get_view( 'renew', '_comments-template' ); ?>
      <?php endwhile; ?>

    </div> <!-- end .x-main -->

    <?php get_sidebar(); ?>

  </div> <!-- end .x-container-fluid.max-width.offset.cf -->

<?php get_footer(); ?>