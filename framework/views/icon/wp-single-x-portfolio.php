<?php

// =============================================================================
// VIEWS/ICON/WP-SINGLE-X-PORTFOLIO.PHP
// -----------------------------------------------------------------------------
// Single portfolio post output for Icon.
// =============================================================================

?>

<?php get_header(); ?>
  
  <div class="x-main" role="main">

    <?php while ( have_posts() ) : the_post(); ?>
      <?php x_get_view( 'icon', 'content', 'portfolio' ); ?>
      <?php x_get_view( 'icon', '_comments-template' ); ?>
    <?php endwhile; ?>

  </div> <!-- end .x-main -->

  <?php get_sidebar(); ?>
<?php get_footer(); ?>