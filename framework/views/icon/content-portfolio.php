<?php

// =============================================================================
// VIEWS/ICON/CONTENT-PORTFOLIO.PHP
// -----------------------------------------------------------------------------
// Portfolio post output for Icon.
// =============================================================================

?>

<?php $project_link   = get_post_meta( get_the_ID(), '_x_portfolio_project_link', true ); ?>
<?php $cropped_thumbs = get_theme_mod( 'x_portfolio_enable_cropped_thumbs' ); ?>
<?php $tag_title      = get_theme_mod( 'x_portfolio_tag_title' ); ?>
<?php $launch_title   = get_theme_mod( 'x_portfolio_launch_project_title' ); ?>
<?php $launch_button  = get_theme_mod( 'x_portfolio_launch_project_button_text' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-wrap">
    <div class="x-container-fluid max width">
      <?php if ( is_singular( 'x-portfolio' ) ) : ?>
      <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php x_icon_entry_meta(); ?>
      </header>
      <?php endif; ?>
      <div class="entry-featured">
        <?php if ( $cropped_thumbs == 1 ) : ?>
          <?php x_featured_portfolio( 'cropped' ); ?>
        <?php else : ?>
          <?php x_featured_portfolio(); ?>
        <?php endif; ?>
      </div>
      <?php if ( is_singular() ) : ?>
      <div class="entry-content">
        <?php the_content(); ?>
        <?php x_link_pages(); ?>
      </div>
      <div class="entry-extra">
        <?php if ( has_term( NULL, 'portfolio-tag', NULL ) ) : ?>
        <h2 class="h-extra skills"><?php echo $tag_title; ?></h2>
        <?php x_icon_portfolio_tags(); ?>
        <?php endif; ?>
        <?php if ( $project_link ) : ?>
        <h2 class="h-extra launch"><?php echo $launch_title; ?></h2>
        <a href="<?php echo $project_link; ?>" title="Launch Project" class="x-btn" target="_blank"><?php echo $launch_button; ?></a>
        <?php endif; ?>
        <?php x_get_view( 'global', '_entry-share' ); ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <?php x_google_authorship_meta(); ?>
</article> <!-- end #post-<?php the_ID(); ?> -->