<?php

// =============================================================================
// VIEWS/GLOBAL/_PORTFOLIO.PHP
// -----------------------------------------------------------------------------
// Includes the portfolio output.
// =============================================================================

$entry_id = get_the_ID();
$paged    = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$cols     = get_post_meta( $entry_id, '_x_portfolio_columns', true );
$count    = get_post_meta( $entry_id, '_x_portfolio_posts_per_page', true );
$filters  = get_post_meta( $entry_id, '_x_portfolio_category_filters', true );

switch ( $cols ) {
  case 'One'   : $cols = 1; break;
  case 'Two'   : $cols = 2; break;
  case 'Three' : $cols = 3; break;
  case 'Four'  : $cols = 4; break;
}

?>

<script>

  jQuery(document).ready(function($){

    var $container   = $('#x-iso-container');
    var $optionSets  = $('.option-set');
    var $optionLinks = $optionSets.find('a');

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

    $optionLinks.click(function(){
      var $this = $(this);
      if ( $this.hasClass('selected') ) {
        return false;
      }
      var $optionSet = $this.parents('.option-set');
      $optionSet.find('.selected').removeClass('selected');
      $this.addClass('selected');
      var options = {},
          key   = $optionSet.attr('data-option-key'),
          value = $this.attr('data-option-value');
      value = value === 'false' ? false : value;
      options[ key ] = value;
      if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
        changeLayoutMode( $this, options );
      } else {
        $container.isotope( options );
      }
      return false;
    });

    $('.x-portfolio-filters').click(function () {
      $(this).parent().find('ul').slideToggle(600, 'easeOutExpo');
    });

  });

</script>

<div id="x-iso-container" class="x-iso-container x-iso-container-portfolio cols-<?php echo $cols; ?>">

  <?php

  if ( count( $filters ) == 1 && in_array( 'All Categories', $filters ) ) {

    $args = array(
      'post_type'      => 'x-portfolio',
      'posts_per_page' => $count,
      'paged'          => $paged
    );

  } else {

    $args = array(
      'post_type'      => 'x-portfolio',
      'posts_per_page' => $count,
      'paged'          => $paged,
      'tax_query'      => array(
        array(
          'taxonomy' => 'portfolio-category',
          'field'    => 'id',
          'terms'    => $filters
        )
      )
    );

  }

  $wp_query = new WP_Query( $args );

  ?>

  <?php if ( $wp_query->have_posts() ) : ?>
    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
      <?php x_get_view( x_get_stack(), 'content', 'portfolio' ); ?>
    <?php endwhile; ?>
  <?php endif; ?>

</div>

<?php pagenavi(); ?>
<?php wp_reset_query(); ?>