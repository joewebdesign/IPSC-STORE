<?php

// =============================================================================
// VIEWS/INTEGRITY/_EXCERPT-CONTENT.PHP
// -----------------------------------------------------------------------------
// Option to display the_excerpt() or the_content() for posts on the index.
// =============================================================================

?>

<?php if ( is_single() || is_home() && get_theme_mod( 'x_blog_enable_full_post_content' ) == 1 ) : ?>
  <div class="entry-content content">
    <?php the_content(); ?>
    <?php x_link_pages(); ?>
  </div>
  <?php if ( has_tag() ) : ?>
    <footer class="entry-footer cf">
      <?php echo get_the_tag_list( '<p><i class="x-icon-tags"></i> Tags: ', ', ', '</p>' ); ?>
    </footer>
  <?php endif; ?>
<?php else : ?>
  <div class="entry-content excerpt">
    <?php the_excerpt(); ?>
  </div>
<?php endif; ?>