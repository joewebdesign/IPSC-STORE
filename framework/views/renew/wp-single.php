<?php

// =============================================================================
// VIEWS/RENEW/WP-SINGLE.PHP
// -----------------------------------------------------------------------------
// Single post output for Renew.
// =============================================================================

$fullwidth = get_post_meta( get_the_ID(), '_x_post_layout', true );

?>

<?php get_header(); ?>
  
  <div class="x-container-fluid max width offset cf">
    <div class="<?php x_renew_main_content_class(); ?>" role="main">

      <?php while ( have_posts() ) : the_post(); ?>
        <?php x_get_view( 'renew', 'content', get_post_format() ); ?>
        <?php x_get_view( 'renew', '_comments-template' ); ?>
      <?php endwhile; ?>

    </div>

    <?php if ( $fullwidth != 'on' ) : ?>
      <?php get_sidebar(); ?>
    <?php endif; ?>

  </div> <!-- .x-container-fluid.max.width.offset.cf -->

<?php get_footer(); ?>