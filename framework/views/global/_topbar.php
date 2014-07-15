<?php

// =============================================================================
// VIEWS/GLOBAL/_TOPBAR.PHP
// -----------------------------------------------------------------------------
// Includes topbar output.
// =============================================================================

?>

<?php if ( get_theme_mod( 'x_topbar_display' ) == 1 ) : ?>

  <div class="x-topbar">
    <div class="x-topbar-inner x-container-fluid max width">
      <?php if ( get_theme_mod( 'x_topbar_content' ) != '' ) : ?>
      <p class="p-info"><?php echo get_theme_mod( 'x_topbar_content' ); ?></p>
      <?php endif; ?>
      <?php x_social_global( 'topbar' ); ?>
    </div> <!-- end .x-topbar-inner -->
  </div> <!-- end .x-topbar -->

<?php endif; ?>