<?php

// =============================================================================
// VIEWS/RENEW/CONTENT-PORTFOLIO.PHP
// -----------------------------------------------------------------------------
// Portfolio post output for Renew.
// =============================================================================

?>

<?php $project_link   = get_post_meta( get_the_ID(), '_x_portfolio_project_link', true ); ?>
<?php $cropped_thumbs = get_theme_mod( 'x_portfolio_enable_cropped_thumbs' ); ?>
<?php $tag_title      = get_theme_mod( 'x_portfolio_tag_title' ); ?>
<?php $launch_title   = get_theme_mod( 'x_portfolio_launch_project_title' ); ?>
<?php $launch_button  = get_theme_mod( 'x_portfolio_launch_project_button_text' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if ( ! is_singular( 'x-portfolio' ) ) : ?>
  <div class="entry-featured">
    <?php if ( $cropped_thumbs == 1 ) : ?>
      <?php x_featured_portfolio( 'cropped' ); ?>
    <?php else : ?>
      <?php x_featured_portfolio(); ?>
    <?php endif; ?>
    <div class="entry-cover">
      <div class="entry-cover-content">
        <span><?php echo get_post_meta( get_the_ID(), '_x_portfolio_media', true ); ?></span>
        <h2 class="entry-title entry-title-portfolio">
          <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to: "%s"', '__x__' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a>
        </h2>
        <?php echo get_the_date( 'm.d.y' ); ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <div class="entry-wrap cf">
    <?php if ( is_singular() ) : ?>
    <div class="entry-info">
      <div class="entry-featured">
        <?php x_featured_portfolio( 'cropped' ); ?>
      </div>
      <header class="entry-header">
        <h1 class="entry-title entry-title-portfolio"><?php the_title(); ?></h1>
        <?php x_renew_entry_meta(); ?>
      </header>
      <div class="entry-content">
        <?php the_content(); ?>
        <?php x_link_pages(); ?>
      </div>
    </div>
    <div class="entry-extra">
      <?php if ( has_term( NULL, 'portfolio-tag', NULL ) ) : ?>
      <h2 class="h-extra skills"><?php echo $tag_title; ?></h2>
      <?php x_renew_portfolio_tags(); ?>
      <?php endif; ?>
      <?php if ( $project_link ) : ?>
      <h2 class="h-extra launch"><?php echo $launch_title; ?></h2>
      <a href="<?php echo $project_link; ?>" title="Launch Project" class="x-btn x-btn-block" target="_blank"><?php echo $launch_button; ?></a>
      <?php endif; ?>
      <?php x_get_view( 'global', '_entry-share' ); ?>
    </div>
    <?php endif; ?>
  </div>
  <?php x_google_authorship_meta(); ?>
</article> <!-- end #post-<?php the_ID(); ?> -->