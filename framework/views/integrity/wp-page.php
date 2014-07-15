<?php

// =============================================================================
// VIEWS/INTEGRITY/WP-PAGE.PHP
// -----------------------------------------------------------------------------
// Single page output for Integrity.
// =============================================================================

?>

<?php get_header(); ?>

  <div class="x-container-fluid max width offset cf">
    <div class="<?php x_integrity_main_content_class(); ?>" role="main">

      <?php while ( have_posts() ) : the_post(); ?>
        <?php x_get_view( 'integrity', 'content', 'page' ); ?>
        <?php x_get_view( 'integrity', '_comments-template' ); ?>
      <?php endwhile; ?>

    </div> <!-- end .x-main -->

    <?php get_sidebar(); ?>

  </div> <!-- end .x-container-fluid.max.width.offset.cf -->

<?php get_footer(); ?>