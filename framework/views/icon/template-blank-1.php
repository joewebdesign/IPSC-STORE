<?php

// =============================================================================
// VIEWS/ICON/TEMPLATE-BLANK-1.PHP (Container | Header, Footer)
// -----------------------------------------------------------------------------
// A blank page for creating unique layouts.
// =============================================================================

?>

<?php $sidebar = get_post_meta( get_the_ID(), '_x_icon_blank_template_sidebar', true ); ?>

<?php get_header(); ?>

  <div class="x-main" role="main">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="x-container-fluid max width">
        <div class="entry-content">

          <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
            <?php x_link_pages(); ?>
          <?php endwhile; ?>

        </div> <!-- end .entry-content -->
      </div> <!-- .x-container-fluid.max.width -->
      <?php x_google_authorship_meta(); ?>
    </article> <!-- end .hentry -->
  </div> <!-- end .x-main -->

  <?php if ( $sidebar == 'Yes' ) : ?>
    <?php get_sidebar(); ?>
  <?php endif; ?>
<?php get_footer(); ?>