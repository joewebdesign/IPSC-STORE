<?php

// =============================================================================
// VIEWS/RENEW/_COMMENTS-TEMPLATE.PHP
// -----------------------------------------------------------------------------
// Comments output for pages, posts, and portfolio items.
// =============================================================================

?>

<?php if ( comments_open() ) : ?>
  <?php comments_template( '', true ); ?>
<?php endif; ?>