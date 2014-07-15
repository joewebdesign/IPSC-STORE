<?php

// =============================================================================
// VIEWS/INTEGRITY/CONTENT-AUDIO.PHP
// -----------------------------------------------------------------------------
// Audio post output for Integrity.
// =============================================================================

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if ( has_post_thumbnail() ) : ?>
  <div class="entry-featured">
    <div class="entry-thumb">
      <?php echo get_the_post_thumbnail( get_the_ID(), 'entry-full-integrity', NULL ); ?>
    </div>
    <?php x_featured_audio(); ?>
  </div>
  <?php endif; ?>
  <div class="entry-wrap">
    <?php if ( ! has_post_thumbnail() ) : ?>
    <div class="entry-featured">
      <?php x_featured_audio(); ?>
    </div>
    <?php endif; ?>
    <header class="entry-header">
      <?php if ( is_single() ) : ?>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php else : ?>
      <h2 class="entry-title">
        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to: "%s"', '__x__' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a>
      </h2>
      <?php endif; ?>
      <?php x_integrity_entry_meta(); ?>
    </header>
    <?php x_get_view( 'integrity', '_excerpt-content' ); ?>
  </div>
  <?php if ( has_tag() ) : ?>
  <footer class="entry-footer cf">
    <?php echo get_the_tag_list(); ?>
  </footer>
  <?php endif; ?>
  <?php x_google_authorship_meta(); ?>
</article> <!-- end #post-<?php the_ID(); ?> -->