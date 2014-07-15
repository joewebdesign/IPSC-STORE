<?php

// =============================================================================
// VIEWS/GLOBAL/_INDEX.PHP
// -----------------------------------------------------------------------------
// Includes the index output.
// =============================================================================

?>

<?php

if ( is_home() ) :
  $style     = get_theme_mod( 'x_blog_style' );
  $cols      = get_theme_mod( 'x_blog_masonry_columns' );
  $condition = is_home() && $style == 'masonry';
elseif ( is_archive() ) :
  $style     = get_theme_mod( 'x_archive_style' );
  $cols      = get_theme_mod( 'x_archive_masonry_columns' );
  $condition = is_archive() && $style == 'masonry';
elseif ( is_search() ) :
  $condition = false;
endif;

?>

<?php if ( $condition ) : ?>

  <script>

    jQuery(document).ready(function($){

      var $container = $('#x-iso-container');

      $container.before('<span id="x-isotope-loading"><span>');

      $(window).load(function(){
        $container.isotope({
          itemSelector   : '.x-iso-container > .hentry',
          resizable      : true,
          filter         : '*',
          containerStyle : {
            overflow : 'hidden',
            position : 'relative'
          }
        });
        $('#x-isotope-loading').stop(true,true).fadeOut(300);
        $('#x-iso-container .hentry').each(function(i){
          $(this).delay(i*150).animate({'opacity':1},300);
        });
      });

      $(window).smartresize(function(){
        $container.isotope({  });
      });

    });

  </script>

  <div id="x-iso-container" class="x-iso-container x-iso-container-posts cols-<?php echo $cols; ?>">

    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php x_get_view( x_get_stack(), 'content', get_post_format() ); ?>
      <?php endwhile; ?>
    <?php else : ?>
      <?php x_get_view( 'global', '_content-none' ); ?>
    <?php endif; ?>

  </div>

<?php else : ?>

  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <?php x_get_view( x_get_stack(), 'content', get_post_format() ); ?>
    <?php endwhile; ?>
  <?php else : ?>
    <?php x_get_view( 'global', '_content-none' ); ?>
  <?php endif; ?>

<?php endif; ?>

<?php pagenavi(); ?>