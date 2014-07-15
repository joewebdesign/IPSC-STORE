<?php

// =============================================================================
// VIEWS/RENEW/CONTENT.PHP
// -----------------------------------------------------------------------------
// Standard post output for Renew.
// =============================================================================

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-wrap">
    <header class="entry-header">
      <?php if ( is_single() ) : ?>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php else : ?>
      <h2 class="entry-title">
        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to: "%s"', '__x__' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a>
      </h2>
      <?php endif; ?>
      <?php x_renew_entry_meta(); ?>
    </header>
    <?php if ( has_post_thumbnail() ) : ?>
      <div class="entry-featured">
        <?php x_featured_image(); ?>
      </div>
    <?php endif; ?>
    <?php x_get_view( 'renew', '_excerpt-content' ); ?>
  </div>
  <?php x_google_authorship_meta(); ?>
</article> <!-- end #post-<?php the_ID(); ?> -->