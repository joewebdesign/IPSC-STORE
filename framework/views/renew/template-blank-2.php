<?php

// =============================================================================
// VIEWS/RENEW/TEMPLATE-BLANK-2.PHP (Container | Header, No Footer)
// -----------------------------------------------------------------------------
// A blank page for creating unique layouts.
// =============================================================================

?>

<?php get_header(); ?>

  <div class="x-main x-container-fluid max width offset" role="main">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="entry-content">

        <?php while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
          <?php x_link_pages(); ?>
        <?php endwhile; ?>

      </div> <!-- end .entry-content -->
      <?php x_google_authorship_meta(); ?>
    </article> <!-- end .hentry -->
  </div> <!-- end .x-main.x-container-fluid.max.width.offset -->
  </div> <!-- end .site -->

  <?php x_get_view( 'global', '_header', 'widget-areas' ); ?>
  <?php x_get_view( 'global', '_footer', 'scroll-top' ); ?>
<?php x_get_view( 'global', '_footer' ); ?>