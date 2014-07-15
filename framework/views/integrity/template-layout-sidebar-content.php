<?php

// =============================================================================
// VIEWS/INTEGRITY/TEMPLATE-LAYOUT-SIDEBAR-CONTENT.PHP
// -----------------------------------------------------------------------------
// Sidebar left, content right page output for Integrity.
// =============================================================================

?>
<?php get_header(); ?>

  <div class="x-container-fluid max width offset cf">
    <div class="x-main right" role="main">

      <?php while ( have_posts() ) : the_post(); ?>
        <?php x_get_view( 'integrity', 'content', 'page' ); ?>
        <?php x_get_view( 'integrity', '_comments-template' ); ?>
      <?php endwhile; ?>

    </div> <!-- end .x-main -->
	<?php /*get_sidebar();*/ ?>
    <?php dynamic_sidebar( 'main' ); ?>
	<div class="x-sidebar "><?php dynamic_sidebar( 'main2' ); ?></div>
    
  </div> <!-- end .x-container-fluid.max.width.offset.cf -->

<?php get_footer(); ?>