<?php

// =============================================================================
// VIEWS/ICON/CONTENT-QUOTE.PHP
// -----------------------------------------------------------------------------
// Quote post output for Icon.
// =============================================================================

?>

<?php $quote = get_post_meta( get_the_ID(), '_x_quote_quote', true ); ?>
<?php $cite  = get_post_meta( get_the_ID(), '_x_quote_cite',  true ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-wrap">
    <?php x_icon_comment_number(); ?>
    <div class="x-container-fluid max width">
      <header class="entry-header">
        <?php if ( is_single() ) : ?>
        <h1 class="entry-title"><?php echo $cite; ?></h1>
        <?php else : ?>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to: "%s"', '__x__' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php echo $cite; ?></a></h2>
        <?php endif; ?>
        <?php x_icon_entry_meta(); ?>
        <p class="entry-title-sub"><?php echo $quote; ?></p>
      </header>
      <?php if ( is_single() ) : ?>
        <?php if ( has_post_thumbnail() ) : ?>
        <div class="entry-featured">
          <?php x_featured_image(); ?>
        </div>
        <?php endif; ?>
      <div class="entry-content">
        <?php the_content(); ?>
        <?php x_link_pages(); ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <?php x_google_authorship_meta(); ?>
</article> <!-- end #post-<?php the_ID(); ?> -->