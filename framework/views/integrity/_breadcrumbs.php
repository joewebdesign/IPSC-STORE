<?php

// =============================================================================
// VIEWS/INTEGRITY/_BREADCRUMBS.PHP
// -----------------------------------------------------------------------------
// Breadcrumb output for Integrity.
// =============================================================================

$ltr = ! is_rtl();

?>

<?php if ( ! is_front_page() ) : ?>
  <?php if ( get_theme_mod( 'x_breadcrumb_display' ) == 1 ) : ?>

    <div class="x-breadcrumb-wrap">
      <div class="x-container-fluid max width cf">
        <?php x_breadcrumbs(); ?>
        <?php if ( is_single() || is_singular( 'x-portfolio' ) ) : ?>
        <div class="x-nav-articles">
          <?php if ( get_adjacent_post( false, '', false ) ) : ?>
            <a href="<?php echo get_permalink( get_adjacent_post( false, '', false ) ); ?>" title="Previous Post" class="prev">
              <?php echo ( $ltr ) ? '<i class="x-icon-arrow-left"></i>' : '<i class="x-icon-arrow-right"></i>'; ?>
            </a>
          <?php endif; ?>
          <?php if ( get_adjacent_post( false, '', true ) ) : ?>
            <a href="<?php echo get_permalink( get_adjacent_post( false, '', true ) ); ?>" title="Next Post" class="next">
              <?php echo ( $ltr ) ? '<i class="x-icon-arrow-right"></i>' : '<i class="x-icon-arrow-left"></i>'; ?>
            </a>
          <?php endif; ?>
        </div>
        <?php endif; ?>
      </div>
    </div>

  <?php endif; ?>
<?php endif; ?>