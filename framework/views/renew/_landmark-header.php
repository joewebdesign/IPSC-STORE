<?php

// =============================================================================
// VIEWS/RENEW/_LANDMARK-HEADER.PHP
// -----------------------------------------------------------------------------
// Handles content output of large headers for key pages such as the blog or
// search results.
// =============================================================================

$disable_page_title = get_post_meta( get_the_ID(), '_x_entry_disable_page_title', true );
$breadcrumbs        = get_theme_mod( 'x_breadcrumb_display' );

?>

<?php if ( ! is_page_template( 'template-blank-1.php' ) && ! is_page_template( 'template-blank-2.php' ) && ! is_page_template( 'template-blank-4.php' ) && ! is_page_template( 'template-blank-5.php' ) ) : ?>
  <?php if ( is_page() && $disable_page_title == 'on' ) : ?>

  <?php else : ?>

    <header class="x-header-landmark">
      <div class="x-container-fluid max width">
        <div class="x-landmark-breadcrumbs-wrap">
          <div class="x-landmark">

          <?php if ( function_exists( 'is_shop' ) && is_shop() || function_exists( 'is_product' ) && is_product() ) : ?>

            <h1 class="h-landmark"><span><?php echo get_theme_mod( 'x_renew_shop_title' ); ?></span></h1>

          <?php elseif ( is_page() ) : ?>

            <h1 class="h-landmark entry-title"><span><?php the_title(); ?></span></h1>

          <?php elseif ( is_home() || is_single() ) : ?>
            <?php if ( is_singular( 'x-portfolio' ) ) : ?>

              <h1 class="h-landmark"><span><?php echo get_theme_mod( 'x_portfolio_title' ); ?></span></h1>

            <?php else : ?>

              <h1 class="h-landmark"><span><?php echo get_theme_mod( 'x_renew_blog_title' ); ?></span></h1>

            <?php endif; ?>
          <?php elseif ( is_search() ) : ?>

            <h1 class="h-landmark"><span><?php _e( 'Search Results', '__x__' ); ?></span></h1>

          <?php elseif ( is_category() || is_tax( 'portfolio-category' ) || function_exists( 'is_product_category' ) && is_product_category() ) : ?>

            <?php

            $queried_object = get_queried_object();
            $t_id           = $queried_object->term_id;
            $term_meta      = get_option( 'taxonomy_' . $t_id );
            $title          = ( $term_meta['archive-title'] != '' ) ? $term_meta['archive-title'] : __( 'Category Archive', '__x__' );

            ?>

            <h1 class="h-landmark"><span><?php echo $title; ?></span></h1>

          <?php elseif ( is_tag() || is_tax( 'portfolio-tag' ) || function_exists( 'is_product_tag' ) && is_product_tag() ) : ?>

            <?php

            $queried_object = get_queried_object();
            $t_id           = $queried_object->term_id;
            $term_meta      = get_option( 'taxonomy_' . $t_id );
            $title          = ( $term_meta['archive-title'] != '' ) ? $term_meta['archive-title'] : __( 'Tag Archive', '__x__' );

            ?>

            <h1 class="h-landmark"><span><?php echo $title ?></span></h1>

          <?php elseif ( is_404() ) : ?>

            <h1 class="h-landmark"><span><?php _e( 'Oops!', '__x__' ); ?></span></h1>

          <?php elseif ( is_year() ) : ?>

            <h1 class="h-landmark"><span><?php _e( 'Post Archive by Year', '__x__' ); ?></span></h1>

          <?php elseif ( is_month() ) : ?>

            <h1 class="h-landmark"><span><?php _e( 'Post Archive by Month', '__x__' ); ?></span></h1>

          <?php elseif ( is_day() ) : ?>

            <h1 class="h-landmark"><span><?php _e( 'Post Archive by Day', '__x__' ); ?></span></h1>

          <?php elseif ( is_page_template( 'template-layout-portfolio.php' ) ) : ?>

            <h1 class="h-landmark"><span><?php echo get_theme_mod( 'x_portfolio_title' ); ?></span></h1>

          <?php endif; ?>

          </div>

          <?php if ( $breadcrumbs == 1 ) : ?>
            <?php if ( ! is_front_page() && ! is_page_template( 'template-layout-portfolio.php' ) ) : ?>
              <div class="x-breadcrumbs-wrap">
                <?php x_breadcrumbs(); ?>
              </div>
            <?php endif; ?>
          <?php endif; ?>

          <?php if ( is_page_template( 'template-layout-portfolio.php' ) ) : ?>
            <div class="x-breadcrumbs-wrap">
              <?php x_portfolio_filters(); ?>
            </div>
          <?php endif; ?>

        </div>
      </div>
    </header>

  <?php endif; ?>
<?php endif; ?>