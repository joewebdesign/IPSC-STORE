<?php

// =============================================================================
// VIEWS/INTEGRITY/CONTENT-IMAGE.PHP
// -----------------------------------------------------------------------------
// Image post output for Integrity.
// =============================================================================

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-featured">
    <?php x_featured_image(); ?>
  </div>
  <div class="entry-wrap">
    <?php if ( is_single() ) : ?>
    <header class="entry-header">
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php x_integrity_entry_meta(); ?>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
      <?php x_link_pages(); ?>
    </div>
    <?php else : ?>
    <header class="entry-header center-text">
      <h2 class="entry-title">
        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to: "%s"', '__x__' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a>
      </h2>
      <?php x_integrity_entry_meta(); ?>
    </header>
    <?php endif; ?>
  </div>
  <?php if ( has_tag() ) : ?>
  <footer class="entry-footer cf">
    <?php echo get_the_tag_list(); ?>
  </footer>
  <?php endif; ?>
  <?php x_google_authorship_meta(); ?>
</article> <!-- end #post-<?php the_ID(); ?> -->