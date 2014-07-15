<?php

// =============================================================================
// VIEWS/ICON/_COMMENTS-TEMPLATE.PHP
// -----------------------------------------------------------------------------
// Comments output for pages, posts, and portfolio items.
// =============================================================================

?>

<?php if ( comments_open() ) : ?>
  <div class="x-container-fluid max width">
    <?php comments_template( '', true ); ?>
  </div>
<?php endif; ?>