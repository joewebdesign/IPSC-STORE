<?php

// =============================================================================
// VIEWS/INTEGRITY/TEMPLATE-BLANK-1.PHP (Container | Header, Footer)
// -----------------------------------------------------------------------------
// A blank page for creating unique layouts.
// =============================================================================

?>

<?php get_header(); ?>

  <div class="x-main x-container-fluid max width offset" role="main">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="entry-wrap entry-content">

        <?php while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
          <?php x_link_pages(); ?>
        <?php endwhile; ?>

      </div> <!-- end .entry-wrap.entry-content -->
      <?php x_google_authorship_meta(); ?>
    </article> <!-- end .hentry -->
  </div> <!-- end .x-main.x-container-fluid.max.width.offset -->

<?php get_footer(); ?>