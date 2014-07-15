<?php

// =============================================================================
// VIEWS/ICON/CONTENT-GALLERY.PHP
// -----------------------------------------------------------------------------
// Gallery post output for Icon.
// =============================================================================

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-wrap">
    <?php x_icon_comment_number(); ?>
    <div class="x-container-fluid max width">
      <header class="entry-header">
        <?php if ( is_single() ) : ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php else : ?>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to: "%s"', '__x__' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h2>
        <?php endif; ?>
        <?php x_icon_entry_meta(); ?>
      </header>
      <div class="entry-featured">
        <?php x_featured_gallery(); ?>
      </div>
      <?php if ( is_single() ) : ?>
      <div class="entry-content">
        <?php the_content(); ?>
        <?php x_link_pages(); ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <?php x_google_authorship_meta(); ?>
</article> <!-- end #post-<?php the_ID(); ?> -->