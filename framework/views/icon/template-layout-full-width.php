<?php

// =============================================================================
// VIEWS/ICON/TEMPLATE-FULL-WIDTH.PHP
// -----------------------------------------------------------------------------
// Full width page output for Icon.
// =============================================================================

?>

<?php get_header(); ?>

  <div class="x-main x-container-fluid" role="main">

    <?php while ( have_posts() ) : the_post(); ?>
      <?php x_get_view( 'icon', 'content', 'page' ); ?>
      <?php x_get_view( 'icon', '_comments-template' ); ?>
    <?php endwhile; ?>

  </div> <!-- end .x-main.x-container-fluid -->

<?php get_footer(); ?>