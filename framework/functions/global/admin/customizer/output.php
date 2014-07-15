<?php
 
// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/CUSTOMIZER/OUTPUT.PHP
// -----------------------------------------------------------------------------
// Sets up custom output from the Customizer.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Customizer Options CSS Output
// =============================================================================

// Customizer Options CSS Output
// =============================================================================
 
function x_customizer_options_output_css() {

  $x_stack                               = x_get_stack();
  $x_integrity_sizing_site_max_width     = ( get_theme_mod( 'x_integrity_sizing_site_max_width' ) == '' ) ? '1200' : get_theme_mod( 'x_integrity_sizing_site_max_width' );
  $x_integrity_sizing_site_width         = ( get_theme_mod( 'x_integrity_sizing_site_width' ) == '' ) ? '88' : get_theme_mod( 'x_integrity_sizing_site_width' );
  $x_integrity_sizing_content_width      = ( get_theme_mod( 'x_integrity_sizing_content_width' ) == '' ) ? '72' : get_theme_mod( 'x_integrity_sizing_content_width' );
  $x_integrity_design                    = ( get_theme_mod( 'x_integrity_design' ) == '' ) ? 'light' : get_theme_mod( 'x_integrity_design' );
  $x_integrity_light_bg_color            = ( get_theme_mod( 'x_integrity_light_bg_color' ) == '' ) ? '#f3f3f3' : get_theme_mod( 'x_integrity_light_bg_color' );
  $x_integrity_light_bg_image_full       = get_theme_mod( 'x_integrity_light_bg_image_full' );
  $x_integrity_dark_bg_image_full        = get_theme_mod( 'x_integrity_dark_bg_image_full' );
  $x_renew_sizing_site_max_width         = get_theme_mod( 'x_renew_sizing_site_max_width' );
  $x_renew_sizing_site_width             = get_theme_mod( 'x_renew_sizing_site_width' );
  $x_renew_sizing_content_width          = get_theme_mod( 'x_renew_sizing_content_width' );
  $x_icon_sizing_site_max_width          = get_theme_mod( 'x_icon_sizing_site_max_width' );
  $x_icon_sizing_site_width              = get_theme_mod( 'x_icon_sizing_site_width' );
  $x_icon_sidebar_width                  = get_theme_mod( 'x_icon_sidebar_width' );
  $x_custom_fonts                        = get_theme_mod( 'x_custom_fonts' );
  $x_body_font_family                    = get_theme_mod( 'x_body_font_family' );
  $x_body_font_size                      = ( get_theme_mod( 'x_body_font_size' ) == '' ) ? '14' : get_theme_mod( 'x_body_font_size' );
  $x_body_font_weight_and_style          = ( get_theme_mod( 'x_body_font_weight' ) == '' ) ? '400' : get_theme_mod( 'x_body_font_weight' );
  $x_body_font_weight                    = ( strpos( $x_body_font_weight_and_style, 'italic' ) ) ? str_replace( 'italic', '', $x_body_font_weight_and_style ) : $x_body_font_weight_and_style;
  $x_body_font_color_enable              = get_theme_mod( 'x_body_font_color_enable' );
  $x_body_font_color                     = get_theme_mod( 'x_body_font_color' );
  $x_headings_font_family                = get_theme_mod( 'x_headings_font_family' );
  $x_headings_font_weight_and_style      = ( get_theme_mod( 'x_headings_font_weight' ) == '' ) ? '400' : get_theme_mod( 'x_headings_font_weight' );
  $x_headings_font_weight                = ( strpos( $x_headings_font_weight_and_style, 'italic' ) ) ? str_replace( 'italic', '', $x_headings_font_weight_and_style ) : $x_headings_font_weight_and_style;
  $x_headings_font_color_enable          = get_theme_mod( 'x_headings_font_color_enable' );
  $x_headings_font_color                 = get_theme_mod( 'x_headings_font_color' );
  $x_headings_letter_spacing             = ( get_theme_mod( 'x_headings_letter_spacing' ) == '' ) ? '-1' : get_theme_mod( 'x_headings_letter_spacing' );
  $x_headings_widget_icons_enable        = get_theme_mod( 'x_headings_widget_icons_enable' );
  $x_logo_width                          = get_theme_mod( 'x_logo_width' );
  $x_logo_font_family                    = get_theme_mod( 'x_logo_font_family' );
  $x_logo_font_size                      = ( get_theme_mod( 'x_logo_font_size' ) == '' ) ? '54' : get_theme_mod( 'x_logo_font_size' );
  $x_logo_font_weight_and_style          = ( get_theme_mod( 'x_logo_font_weight' ) == '' ) ? '400' : get_theme_mod( 'x_logo_font_weight' );
  $x_logo_font_weight                    = ( strpos( $x_logo_font_weight_and_style, 'italic' ) ) ? str_replace( 'italic', '', $x_logo_font_weight_and_style ) : $x_logo_font_weight_and_style;
  $x_logo_font_color_enable              = get_theme_mod( 'x_logo_font_color_enable' );
  $x_logo_font_color                     = get_theme_mod( 'x_logo_font_color' );
  $x_logo_letter_spacing                 = ( get_theme_mod( 'x_logo_letter_spacing' ) == '' ) ? '-3' : get_theme_mod( 'x_logo_letter_spacing' );
  $x_content_font_size                   = ( get_theme_mod( 'x_content_font_size' ) == '' ) ? '14' : get_theme_mod( 'x_content_font_size' );
  $x_logo_navigation_layout              = ( get_theme_mod( 'x_logo_navigation_layout' ) == '' ) ? 'inline' : get_theme_mod( 'x_logo_navigation_layout' );
  $x_logobar_adjust_spacing_top          = ( get_theme_mod( 'x_logobar_adjust_spacing_top' ) == '' ) ? '15' : get_theme_mod( 'x_logobar_adjust_spacing_top' );
  $x_logobar_adjust_spacing_bottom       = ( get_theme_mod( 'x_logobar_adjust_spacing_bottom' ) == '' ) ? '15' : get_theme_mod( 'x_logobar_adjust_spacing_bottom' );
  $x_navbar_font_family                  = get_theme_mod( 'x_navbar_font_family' );
  $x_navbar_font_size                    = ( get_theme_mod( 'x_navbar_font_size' ) == '' ) ? '12' : get_theme_mod( 'x_navbar_font_size' );
  $x_navbar_font_weight_and_style        = ( get_theme_mod( 'x_navbar_font_weight' ) == '' ) ? '400' : get_theme_mod( 'x_navbar_font_weight' );
  $x_navbar_font_weight                  = ( strpos( $x_navbar_font_weight_and_style, 'italic' ) ) ? str_replace( 'italic', '', $x_navbar_font_weight_and_style ) : $x_navbar_font_weight_and_style ;
  $x_navbar_width                        = get_theme_mod( 'x_navbar_width' );
  $x_navbar_height                       = ( get_theme_mod( 'x_navbar_height' ) == '' ) ? '90' : get_theme_mod( 'x_navbar_height' );
  $x_navbar_adjust_links_top             = ( get_theme_mod( 'x_navbar_adjust_links_top' ) == '' ) ? '34' : get_theme_mod( 'x_navbar_adjust_links_top' );
  $x_navbar_adjust_links_side            = get_theme_mod( 'x_navbar_adjust_links_side' );
  $x_navbar_adjust_button                = ( get_theme_mod( 'x_navbar_adjust_button' ) == '' ) ? '20' : get_theme_mod( 'x_navbar_adjust_button' );
  $x_navbar_adjust_button_size           = ( get_theme_mod( 'x_navbar_adjust_button_size' ) == '' ) ? '24' : get_theme_mod( 'x_navbar_adjust_button_size' );
  $x_navbar_link_color                   = ( get_theme_mod( 'x_navbar_link_color' ) == '' ) ? '#b7b7b7' : get_theme_mod( 'x_navbar_link_color' );
  $x_navbar_link_color_hover             = ( get_theme_mod( 'x_navbar_link_color_hover' ) == '' ) ? '#272727' : get_theme_mod( 'x_navbar_link_color_hover' );
  $x_site_link_color                     = ( get_theme_mod( 'x_site_link_color' ) == '' ) ? '#ff2a13' : get_theme_mod( 'x_site_link_color' );
  $x_site_link_color_hover               = ( get_theme_mod( 'x_site_link_color_hover' ) == '' ) ? '#d80f0f' : get_theme_mod( 'x_site_link_color_hover' );
  $x_button_style                        = ( get_theme_mod( 'x_button_style' ) == '' ) ? 'real' : get_theme_mod( 'x_button_style' );
  $x_button_shape                        = ( get_theme_mod( 'x_button_shape' ) == '' ) ? 'rounded' : get_theme_mod( 'x_button_shape' );
  $x_button_size                         = ( get_theme_mod( 'x_button_size' ) == '' ) ? 'regular' : get_theme_mod( 'x_button_size' );
  $x_button_color                        = ( get_theme_mod( 'x_button_color' ) == '' ) ? '#ffffff' : get_theme_mod( 'x_button_color' );
  $x_button_background_color             = ( get_theme_mod( 'x_button_background_color' ) == '' ) ? '#ff2a13' : get_theme_mod( 'x_button_background_color' );
  $x_button_border_color                 = ( get_theme_mod( 'x_button_border_color' ) == '' ) ? '#ac1100' : get_theme_mod( 'x_button_border_color' );
  $x_button_bottom_color                 = ( get_theme_mod( 'x_button_bottom_color' ) == '' ) ? '#a71000' : get_theme_mod( 'x_button_bottom_color' );
  $x_button_color_hover                  = ( get_theme_mod( 'x_button_color_hover' ) == '' ) ? '#ffffff' : get_theme_mod( 'x_button_color_hover' );
  $x_button_background_color_hover       = ( get_theme_mod( 'x_button_background_color_hover' ) == '' ) ? '#ef2201' : get_theme_mod( 'x_button_background_color_hover' );
  $x_button_border_color_hover           = ( get_theme_mod( 'x_button_border_color_hover' ) == '' ) ? '#600900' : get_theme_mod( 'x_button_border_color_hover' );
  $x_button_bottom_color_hover           = ( get_theme_mod( 'x_button_bottom_color_hover' ) == '' ) ? '#a71000' : get_theme_mod( 'x_button_bottom_color_hover' );
  $x_footer_content_dock_width           = get_theme_mod( 'x_footer_content_dock_width' );
  $x_woocommerce_widgets_image_alignment = get_theme_mod( 'x_woocommerce_widgets_image_alignment' );
  $woocommerce_is_active                 = class_exists( 'WC_API' );
  $gravity_forms_is_active               = class_exists( 'GFForms' );
  $ltr                                   = ! is_rtl();

  ob_start();

  ?>

  <style id="x-customizer-css-output" type="text/css">

    <?php if ( $x_stack == 'integrity' ) : ?>

    /* =============================================================================
    // Integrity specific styles.
    // ========================================================================== */

      <?php if ( $x_integrity_design == 'light' ) : ?>

      body {
        background: <?php echo $x_integrity_light_bg_color; ?> url(<?php echo get_theme_mod( 'x_integrity_light_bg_image_pattern' ); ?>) center top repeat;
      }

        <?php if ( get_theme_mod( 'x_integrity_footer_transparency_enable' ) == 1 ) : ?>

        .x-colophon.top,
        .x-colophon.bottom {
          border-top: 1px solid #e0e0e0;
          border-top: 1px solid rgba(0, 0, 0, 0.085);
          background-color: transparent;
          -webkit-box-shadow: inset 0 1px 0 0 rgba(255, 255, 255, 0.8);
                  box-shadow: inset 0 1px 0 0 rgba(255, 255, 255, 0.8);
        }

        <?php endif; ?>

      <?php else : ?>

      body {
        background: <?php echo get_theme_mod( 'x_integrity_dark_bg_color' ); ?> url(<?php echo get_theme_mod( 'x_integrity_dark_bg_image_pattern' ); ?>) center top repeat;
      }

        <?php if ( get_theme_mod( 'x_integrity_footer_transparency_enable' ) == 1 ) : ?>

        .x-colophon.top,
        .x-colophon.bottom {
          border-top: 1px solid #000;
          border-top: 1px solid rgba(0, 0, 0, 0.75);
          background-color: transparent;
          -webkit-box-shadow: inset 0 1px 0 0 rgba(255, 255, 255, 0.075);
                  box-shadow: inset 0 1px 0 0 rgba(255, 255, 255, 0.075);
        }

        <?php endif; ?>

      <?php endif; ?>

    a,
    h1 a:hover,
    h2 a:hover,
    h3 a:hover,
    h4 a:hover,
    h5 a:hover,
    h6 a:hover,
    .x-topbar .p-info a:hover,
    .x-breadcrumb-wrap a:hover,
    .widget ul li a:hover,
    .widget ol li a:hover,
    .widget.widget_text ul li a,
    .widget.widget_text ol li a,
    .widget_nav_menu .current-menu-item > a,
    .x-widgetbar .widget ul li a:hover,
    .x-twitter-widget ul li a,
    .x-accordion-heading .x-accordion-toggle:hover,
    .x-comment-author a:hover,
    .x-comment-time:hover,
    .x-close-content-dock:hover i {
      color: <?php echo $x_site_link_color; ?>;
    }

      <?php if ( $woocommerce_is_active ) : ?>

      .woocommerce .price > .amount,
      .woocommerce .price > ins > .amount,
      .woocommerce-page .price > .amount,
      .woocommerce-page .price > ins > .amount,
      .woocommerce .star-rating:before,
      .woocommerce-page .star-rating:before,
      .woocommerce .star-rating span:before,
      .woocommerce-page .star-rating span:before,
      .woocommerce li.product .entry-header > a:first-child:hover h3,
      .woocommerce-page li.product .entry-header > a:first-child:hover h3 {
        color: <?php echo $x_site_link_color; ?>;
      }

      <?php endif; ?>

    a:hover,
    .widget.widget_text ul li a:hover,
    .widget.widget_text ol li a:hover,
    .x-twitter-widget ul li a:hover,
    .x-recent-posts a:hover .h-recent-posts {
      color: <?php echo $x_site_link_color_hover; ?>;
    }

    a.x-img-thumbnail:hover,
    .x-slider-revolution-container.below,
    .page-template-template-blank-3-php .x-slider-revolution-container.above,
    .page-template-template-blank-6-php .x-slider-revolution-container.above {
      border-color: <?php echo $x_site_link_color; ?>;
    }

    .entry-thumb:before,
    .pagination span.current,
    .flex-direction-nav a,
    .flex-control-nav a:hover,
    .flex-control-nav a.flex-active,
    .jp-play-bar,
    .jp-volume-bar-value,
    .x-dropcap,
    .x-skill-bar .bar,
    .x-pricing-column.featured h2,
    .h-comments-title small,
    .x-entry-share .x-share:hover,
    .x-highlight,
    .x-recent-posts .x-recent-posts-img,
    .x-recent-posts .x-recent-posts-img:before,
    .tp-bullets.simplebullets.round .bullet:hover,
    .tp-bullets.simplebullets.round .bullet.selected,
    .tp-bullets.simplebullets.round-old .bullet:hover,
    .tp-bullets.simplebullets.round-old .bullet.selected,
    .tp-bullets.simplebullets.square-old .bullet:hover,
    .tp-bullets.simplebullets.square-old .bullet.selected,
    .tp-bullets.simplebullets.navbar .bullet:hover,
    .tp-bullets.simplebullets.navbar .bullet.selected,
    .tp-bullets.simplebullets.navbar-old .bullet:hover,
    .tp-bullets.simplebullets.navbar-old .bullet.selected,
    .tp-leftarrow.default,
    .tp-rightarrow.default {
      background-color: <?php echo $x_site_link_color; ?>;
    }

      <?php if ( $woocommerce_is_active ) : ?>

      .woocommerce .onsale,
      .woocommerce-page .onsale,
      .widget_price_filter .ui-slider .ui-slider-range {
        background-color: <?php echo $x_site_link_color; ?>;
      }

      <?php endif; ?>

    .x-nav-tabs > .active > a,
    .x-nav-tabs > .active > a:hover {
      -webkit-box-shadow: inset 0 3px 0 0 <?php echo $x_site_link_color; ?>;
              box-shadow: inset 0 3px 0 0 <?php echo $x_site_link_color; ?>;
    }

    .x-recent-posts a:hover .x-recent-posts-img,
    .tp-leftarrow.default:hover,
    .tp-rightarrow.default:hover {
      background-color: <?php echo $x_site_link_color_hover; ?>;
    }

    .x-main {
      width: <?php echo $x_integrity_sizing_content_width - 2.463055 . '%'; ?>;
    }

    .x-sidebar {
      width: <?php echo 100 - 2.463055 - $x_integrity_sizing_content_width . '%'; ?>;
    }

      <?php if ( get_theme_mod( 'x_integrity_topbar_transparency_enable' ) == 1 ) : ?>

      .x-topbar { background-color: transparent; }

      <?php endif; ?>

      <?php if ( get_theme_mod( 'x_integrity_navbar_transparency_enable' ) == 1 ) : ?>

      .x-navbar { background-color: transparent; }

      <?php endif; ?>

    .x-navbar .x-nav > li > a:hover,
    .x-navbar .x-nav > .current-menu-item > a {
      -webkit-box-shadow: inset 0 4px 0 0 <?php echo $x_site_link_color; ?>;
              box-shadow: inset 0 4px 0 0 <?php echo $x_site_link_color; ?>;
    }

    body.x-navbar-fixed-left-active .x-navbar .x-nav > li > a:hover,
    body.x-navbar-fixed-left-active .x-navbar .x-nav > .current-menu-item > a {
      -webkit-box-shadow: inset 8px 0 0 0 <?php echo $x_site_link_color; ?>;
              box-shadow: inset 8px 0 0 0 <?php echo $x_site_link_color; ?>;
    }

    body.x-navbar-fixed-right-active .x-navbar .x-nav > li > a:hover,
    body.x-navbar-fixed-right-active .x-navbar .x-nav > .current-menu-item > a {
      -webkit-box-shadow: inset -8px 0 0 0 <?php echo $x_site_link_color; ?>;
              box-shadow: inset -8px 0 0 0 <?php echo $x_site_link_color; ?>;
    }

    .x-topbar .p-info,
    .x-topbar .p-info a,
    .x-navbar .x-nav > li > a,
    .x-nav-collapse .sub-menu a,
    .x-breadcrumb-wrap a,
    .x-breadcrumbs .delimiter {
      color: <?php echo $x_navbar_link_color; ?>;
    }

    .x-navbar .x-nav > li > a:hover,
    .x-navbar .x-nav > .current-menu-item > a,
    .x-navbar .x-navbar-inner .x-nav-collapse .x-nav > li > a:hover,
    .x-navbar .x-navbar-inner .x-nav-collapse .x-nav > .current-menu-item > a,
    .x-navbar .x-navbar-inner .x-nav-collapse .sub-menu a:hover {
      color: <?php echo $x_navbar_link_color_hover; ?>;
    }

    .rev_slider_wrapper {
      border-bottom-color: <?php echo $x_site_link_color; ?>;
    }

    .x-navbar-static-active .x-navbar .x-nav > li > a,
    .x-navbar-fixed-top-active .x-navbar .x-nav > li > a {
      height: <?php echo $x_navbar_height . 'px'; ?>;
      padding-top: <?php echo $x_navbar_adjust_links_top . 'px'; ?>;
    }

    .x-navbar-fixed-left-active .x-navbar .x-nav > li > a,
    .x-navbar-fixed-right-active .x-navbar .x-nav > li > a {
      padding-top: <?php echo round( ( $x_navbar_adjust_links_side - $x_navbar_font_size ) / 2 ) . 'px'; ?>;
      padding-bottom: <?php echo round( ( $x_navbar_adjust_links_side - $x_navbar_font_size ) / 2 ) . 'px'; ?>;
      padding-left: 7%;
      padding-right: 7%;
    }

    .sf-menu li:hover ul,
    .sf-menu li.sfHover ul {
      top: <?php echo $x_navbar_height - 15 . 'px'; ?>;;
    }

    .sf-menu li li:hover ul,
    .sf-menu li li.sfHover ul {
      top: -0.75em;
    }

    .x-navbar-fixed-left-active .x-widgetbar {
      left: <?php echo $x_navbar_width . 'px'; ?>;
    }

    .x-navbar-fixed-right-active .x-widgetbar {
      right: <?php echo $x_navbar_width . 'px'; ?>;
    }


    /*
    // Integrity container sizing.
    */

    .x-container-fluid.width {
      width: <?php echo $x_integrity_sizing_site_width . '%'; ?>;
    }

    .x-container-fluid.max {
      max-width: <?php echo $x_integrity_sizing_site_max_width . 'px'; ?>;
    }

      <?php if ( get_theme_mod( 'x_integrity_layout_site' ) == 'boxed' ) :; ?>

      .site,
      .x-navbar.x-navbar-fixed-top.x-container-fluid.max.width {
        width: <?php echo $x_integrity_sizing_site_width . '%'; ?>;
        max-width: <?php echo $x_integrity_sizing_site_max_width . 'px'; ?>;
      }

      <?php endif; ?>


    /*
    // Integrity custom fonts.
    */

    .x-comment-author,
    .x-comment-time,
    .comment-form-author label,
    .comment-form-email label,
    .comment-form-url label,
    .comment-form-rating label,
    .comment-form-comment label,
    .widget_calendar #wp-calendar caption,
    .widget_calendar #wp-calendar th,
    .widget_calendar #wp-calendar #prev,
    .widget_calendar #wp-calendar #next,
    .widget.widget_recent_entries li a,
    .widget_recent_comments a:last-child,
    .widget.widget_rss li .rsswidget {
      <?php if ( $x_custom_fonts == 1 ) : ?>
        font-family: <?php echo $x_headings_font_family; ?>;
      <?php endif; ?>
      font-weight: <?php echo $x_headings_font_weight; ?>;
      <?php if ( strpos( $x_headings_font_weight_and_style, 'italic' ) ) : ?>
        font-style: italic;
      <?php endif; ?>
      <?php if ( get_theme_mod( 'x_headings_uppercase_enable' ) == 1 ) : ?>
        text-transform: uppercase;
      <?php endif; ?>
    }

      <?php if ( $x_custom_fonts == 1 ) : ?>

      .p-landmark-sub,
      .p-meta,
      input,
      button,
      select,
      textarea {
        font-family: <?php echo $x_body_font_family; ?>;
      }

      <?php endif; ?>

      <?php if ( $x_body_font_color_enable == 1 ) : ?>

      .widget ul li a,
      .widget ol li a,
      .x-comment-time {
        color: <?php echo $x_body_font_color; ?>;
      }

        <?php if ( $woocommerce_is_active ) : ?>

        .woocommerce .price > .from,
        .woocommerce .price > del,
        .woocommerce p.stars span a:after,
        .woocommerce-page .price > .from,
        .woocommerce-page .price > del,
        .woocommerce-page p.stars span a:after {
          color: <?php echo $x_body_font_color; ?>;
        }

        <?php endif; ?>

      .widget_text ol li a,
      .widget_text ul li a {
        color: <?php echo $x_site_link_color; ?>;
      }

      .widget_text ol li a:hover,
      .widget_text ul li a:hover {
        color: <?php echo $x_site_link_color_hover; ?>;
      }

      <?php endif; ?>

      <?php if ( $x_headings_font_color_enable == 1 ) : ?>

      .comment-form-author label,
      .comment-form-email label,
      .comment-form-url label,
      .comment-form-rating label,
      .comment-form-comment label,
      .widget_calendar #wp-calendar th,
      .p-landmark-sub strong,
      .widget_tag_cloud .tagcloud a:hover,
      .widget_tag_cloud .tagcloud a:active,
      .entry-footer a:hover,
      .entry-footer a:active,
      .x-breadcrumbs .current,
      .x-comment-author,
      .x-comment-author a {
        color: <?php echo $x_headings_font_color; ?>;
      }

      .widget_calendar #wp-calendar th {
        border-color: <?php echo $x_headings_font_color; ?>;
      }

      .h-feature-headline span i {
        background-color: <?php echo $x_headings_font_color; ?>;
      }

      <?php endif; ?>


    /*
    // Integrity mobile styles.
    */

    @media (max-width: 979px) {
      .x-navbar-fixed-left .x-container-fluid.width,
      .x-navbar-fixed-right .x-container-fluid.width {
        width: <?php echo $x_integrity_sizing_site_width . '%'; ?>;
      }

      .x-nav-collapse .x-nav > li > a:hover,
      .x-nav-collapse .sub-menu a:hover {
        -webkit-box-shadow: none;
                box-shadow: none;
      }

      .x-navbar-fixed-left-active .x-widgetbar {
        left: 0;
      }

      .x-navbar-fixed-right-active .x-widgetbar {
        right: 0;
      }
    }

    <?php elseif ( $x_stack == 'renew' ) : ?>

    /* =============================================================================
    // Renew specific styles.
    // ========================================================================== */

    body {
      background: <?php echo get_theme_mod( 'x_renew_bg_color' ); ?> url(<?php echo get_theme_mod( 'x_renew_bg_image_pattern' ); ?>) center top repeat;
    }

    a,
    h1 a:hover,
    h2 a:hover,
    h3 a:hover,
    h4 a:hover,
    h5 a:hover,
    h6 a:hover,
    .x-comment-time:hover,
    #reply-title small a,
    .comment-reply-link:hover,
    .x-comment-author a:hover,
    .x-close-content-dock:hover i {
      color: <?php echo $x_site_link_color; ?>;
    }

      <?php if ( $woocommerce_is_active ) : ?>

      .woocommerce .price > .amount,
      .woocommerce .price > ins > .amount,
      .woocommerce-page .price > .amount,
      .woocommerce-page .price > ins > .amount,
      .woocommerce li.product .entry-header > a:first-child:hover h3,
      .woocommerce-page li.product .entry-header > a:first-child:hover h3,
      .woocommerce .star-rating:before,
      .woocommerce-page .star-rating:before,
      .woocommerce .star-rating span:before,
      .woocommerce-page .star-rating span:before {
        color: <?php echo $x_site_link_color; ?>;
      }

      <?php endif; ?>

    a:hover,
    #reply-title small a:hover,
    .x-recent-posts a:hover .h-recent-posts {
      color: <?php echo $x_site_link_color_hover; ?>;
    }

    a.x-img-thumbnail:hover,
    li.bypostauthor > article.comment {
      border-color: <?php echo $x_site_link_color; ?>;
    }

      <?php if ( $woocommerce_is_active ) : ?>

      .woocommerce div.product .woocommerce-tabs .x-comments-area li.comment.bypostauthor .x-comment-header .star-rating-container,
      .woocommerce-page div.product .woocommerce-tabs .x-comments-area li.comment.bypostauthor .x-comment-header .star-rating-container {
        border-color: <?php echo $x_site_link_color; ?>;
      }

      <?php endif; ?>

    .flex-direction-nav a,
    .flex-control-nav a:hover,
    .flex-control-nav a.flex-active,
    .x-dropcap,
    .x-skill-bar .bar,
    .x-pricing-column.featured h2,
    .h-comments-title small,
    .pagination a:hover,
    .x-entry-share .x-share:hover,
    .entry-thumb,
    .widget_tag_cloud .tagcloud a:hover,
    .widget_product_tag_cloud .tagcloud a:hover,
    .x-highlight,
    .x-recent-posts .x-recent-posts-img,
    .x-recent-posts .x-recent-posts-img:before,
    .x-portfolio-filters {
      background-color: <?php echo $x_site_link_color; ?>;
    }

      <?php if ( $woocommerce_is_active ) : ?>

      .woocommerce .onsale,
      .woocommerce-page .onsale,
      .widget_price_filter .ui-slider .ui-slider-range,
      .woocommerce div.product .woocommerce-tabs .x-comments-area li.comment.bypostauthor article.comment:before,
      .woocommerce-page div.product .woocommerce-tabs .x-comments-area li.comment.bypostauthor article.comment:before {
        background-color: <?php echo $x_site_link_color; ?>;
      }

      <?php endif; ?>

    .x-recent-posts a:hover .x-recent-posts-img,
    .x-portfolio-filters:hover {
      background-color: <?php echo $x_site_link_color_hover; ?>;
    }

    .x-topbar .p-info,
    .x-topbar .p-info a,
    .x-topbar .x-social-global a {
      color: <?php echo get_theme_mod( 'x_renew_topbar_text_color' ); ?>;
    }

    .x-topbar .p-info a:hover {
      color: <?php echo get_theme_mod( 'x_renew_topbar_link_color_hover' ); ?>;
    }

    .x-brand,
    .x-brand:hover,
    .x-navbar .x-nav > li > a,
    .x-navbar .x-nav > li:before,
    .x-navbar .sub-menu li > a,
    .x-navbar .x-navbar-inner .x-nav-collapse .x-nav > li > a:hover,
    .x-navbar .x-navbar-inner .x-nav-collapse .sub-menu a:hover,
    .tp-leftarrow:before,
    .tp-rightarrow:before,
    .tp-bullets.simplebullets.navbar .bullet,
    .tp-bullets.simplebullets.navbar .bullet:hover,
    .tp-bullets.simplebullets.navbar .bullet.selected,
    .tp-bullets.simplebullets.navbar-old .bullet,
    .tp-bullets.simplebullets.navbar-old .bullet:hover,
    .tp-bullets.simplebullets.navbar-old .bullet.selected {
      color: <?php echo $x_navbar_link_color; ?>;
    }

    .x-navbar .sub-menu li:before,
    .x-navbar .sub-menu li:after {
      background-color: <?php echo $x_navbar_link_color; ?>;
    }

    .x-navbar .x-navbar-inner .x-nav-collapse .x-nav > li > a:hover,
    .x-navbar .x-navbar-inner .x-nav-collapse .sub-menu a:hover,
    .x-navbar .x-navbar-inner .x-nav-collapse .x-nav .current-menu-item > a {
      color: <?php echo $x_navbar_link_color_hover; ?>;
    }

    .x-navbar .x-nav > li > a:hover,
    .x-navbar .x-nav > li.current-menu-item > a {
      -webkit-box-shadow: 0 2px 0 0 <?php echo $x_navbar_link_color_hover; ?>;
              box-shadow: 0 2px 0 0 <?php echo $x_navbar_link_color_hover; ?>;
    }

    .x-btn-navbar,
    .x-btn-navbar:hover {
      color: <?php echo get_theme_mod( 'x_renew_navbar_button_color' ); ?>;
    }

    .x-colophon.bottom,
    .x-colophon.bottom a,
    .x-colophon.bottom .x-social-global a {
      color: <?php echo get_theme_mod( 'x_renew_footer_text_color' ); ?>;
    }

    .x-topbar {
      background-color: <?php echo get_theme_mod( 'x_renew_topbar_background' ); ?>;
    }

    <?php if ( $x_logo_navigation_layout == 'stacked' ) : ?>

    .x-logobar {
      background-color: <?php echo get_theme_mod( 'x_renew_logobar_background' ); ?>;
    }

    <?php endif; ?>

    .x-navbar,
    .x-navbar .sub-menu,
    .tp-bullets.simplebullets.navbar,
    .tp-bullets.simplebullets.navbar-old,
    .tp-leftarrow.default,
    .tp-rightarrow.default {
      background-color: <?php echo get_theme_mod( 'x_renew_navbar_background' ); ?> !important;
    }

    .x-colophon.bottom {
      background-color: <?php echo get_theme_mod( 'x_renew_footer_background' ); ?>;
    }

    .x-btn-navbar,
    .x-btn-navbar.collapsed:hover {
      background-color: <?php echo get_theme_mod( 'x_renew_navbar_button_background_hover' ); ?>;
    }

    .x-btn-navbar.collapsed {
      background-color: <?php echo get_theme_mod( 'x_renew_navbar_button_background' ); ?>;
    }

    .entry-title:before {
      color: <?php echo get_theme_mod( 'x_renew_entry_icon_color' ); ?>;
    }

      <?php if ( is_home() && get_theme_mod( 'x_renew_entry_icon_position' ) == 'creative' && get_theme_mod( 'x_blog_style' ) == 'standard'  ) : ?>

      @media (min-width: 980px) {
        .x-content-sidebar-active .entry-title:before,
        .x-full-width-active .entry-title:before {
          position: absolute;
          width: 70px;
          height: 70px;
          margin-top: -<?php echo get_theme_mod( 'x_renew_entry_icon_position_vertical' ) . 'px'; ?>;
          margin-left: -<?php echo get_theme_mod( 'x_renew_entry_icon_position_horizontal' ) . '%'; ?>;
          font-size: 32px;
          font-size: 3.2rem;
          line-height: 70px;
          border-radius: 100em;
        }
      }

      <?php endif; ?>

    .x-main {
      width: <?php echo $x_renew_sizing_content_width - 3.20197 . '%'; ?>;
    }

    .x-sidebar {
      width: <?php echo 100 - 3.20197 - $x_renew_sizing_content_width . '%'; ?>;
    }

    .x-navbar-static-active .x-navbar .x-nav > li,
    .x-navbar-fixed-top-active .x-navbar .x-nav > li {
      height: <?php echo $x_navbar_height . 'px'; ?>;
      padding-top: <?php echo $x_navbar_adjust_links_top . 'px'; ?>;
    }

    .x-navbar-fixed-left-active .x-navbar .x-nav > li > a,
    .x-navbar-fixed-right-active .x-navbar .x-nav > li > a {
      margin-top: <?php echo round( ( $x_navbar_adjust_links_side - $x_navbar_font_size - 14 ) / 2 ) . 'px'; ?>;
      margin-bottom: <?php echo round( ( $x_navbar_adjust_links_side - $x_navbar_font_size - 14 ) / 2 ) . 'px'; ?>;
    }

    .x-navbar .x-nav > li:before {
      padding-top: <?php echo $x_navbar_adjust_links_top . 'px'; ?>;
    }

    .sf-menu li:hover ul,
    .sf-menu li.sfHover ul {
      top: <?php echo $x_navbar_height . 'px'; ?>;;
    }

    .sf-menu li li:hover ul,
    .sf-menu li li.sfHover ul {
      top: -1.75em;
    }

    .x-navbar-fixed-left-active .x-widgetbar {
      left: <?php echo $x_navbar_width . 'px'; ?>;
    }

    .x-navbar-fixed-right-active .x-widgetbar {
      right: <?php echo $x_navbar_width . 'px'; ?>;
    }


    /*
    // Renew container sizing.
    */

    .x-container-fluid.width {
      width: <?php echo $x_renew_sizing_site_width . '%'; ?>;
    }

    .x-container-fluid.max {
      max-width: <?php echo $x_renew_sizing_site_max_width . 'px'; ?>;
    }

      <?php if ( get_theme_mod( 'x_renew_layout_site' ) == 'boxed' ) :; ?>

      .site,
      .x-navbar.x-navbar-fixed-top.x-container-fluid.max.width {
        width: <?php echo $x_renew_sizing_site_width . '%'; ?>;
        max-width: <?php echo $x_renew_sizing_site_max_width . 'px'; ?>;
      }

      <?php endif; ?>


    /*
    // Renew custom fonts.
    */

      <?php if ( $x_headings_font_color_enable == 1 ) : ?>

      .x-comment-author a,
      .comment-form-author label,
      .comment-form-email label,
      .comment-form-url label,
      .comment-form-rating label,
      .comment-form-comment label,
      .widget_calendar #wp-calendar caption,
      .widget_calendar #wp-calendar th,
      .x-accordion-heading .x-accordion-toggle,
      .x-nav-tabs > li > a:hover,
      .x-nav-tabs > .active > a,
      .x-nav-tabs > .active > a:hover {
        color: <?php echo $x_headings_font_color; ?>;
      }

      .widget_calendar #wp-calendar th {
        border-bottom-color: <?php echo $x_headings_font_color; ?>;
      }

      .pagination span.current,
      .x-portfolio-filters-menu,
      .widget_tag_cloud .tagcloud a,
      .h-feature-headline span i,
      .widget_price_filter .ui-slider .ui-slider-handle {
        background-color: <?php echo $x_headings_font_color; ?>;
      }

      <?php endif; ?>

      <?php if ( $x_body_font_color_enable == 1 ) : ?>

      .x-comment-author a {
        color: <?php echo $x_body_font_color; ?>;
      }

        <?php if ( $woocommerce_is_active ) : ?>

        .woocommerce .price > .from,
        .woocommerce .price > del,
        .woocommerce p.stars span a:after,
        .woocommerce-page .price > .from,
        .woocommerce-page .price > del,
        .woocommerce-page p.stars span a:after,
        .widget_price_filter .price_slider_amount .button,
        .widget_shopping_cart .buttons .button {
          color: <?php echo $x_body_font_color; ?>;
        }

        <?php endif; ?>

      <?php endif; ?>

      .h-landmark {
        font-weight: <?php echo $x_body_font_weight; ?>;
        <?php if ( strpos( $x_body_font_weight_and_style, 'italic' ) ) : ?>
          font-style: italic;
        <?php endif; ?>
      }


    /*
    // Renew mobile styles.
    */

    @media (max-width: 979px) {
      .x-navbar-static-active .x-navbar .x-nav > li,
      .x-navbar-fixed-top-active .x-navbar .x-nav > li {
        height: auto;
        padding-top: 0;
      }

      .x-navbar-fixed-left .x-container-fluid.width,
      .x-navbar-fixed-right .x-container-fluid.width {
        width: <?php echo $x_renew_sizing_site_width . '%'; ?>;
      }

      .x-navbar-fixed-left-active .x-navbar .x-nav > li > a,
      .x-navbar-fixed-right-active .x-navbar .x-nav > li > a {
        margin-top: 0;
      }

      .x-navbar-fixed-left-active .x-widgetbar {
        left: 0;
      }

      .x-navbar-fixed-right-active .x-widgetbar {
        right: 0;
      }
    }

    <?php elseif ( $x_stack == 'icon' ) : ?>

    /* =============================================================================
    // Icon specific styles.
    // ========================================================================== */

    body {
      background: <?php echo get_theme_mod( 'x_icon_bg_color' ); ?> url(<?php echo get_theme_mod( 'x_icon_bg_image_pattern' ); ?>) center top repeat;
    }

    a,
    h1 a:hover,
    h2 a:hover,
    h3 a:hover,
    h4 a:hover,
    h5 a:hover,
    h6 a:hover,
    #respond .required,
    .x-close-content-dock:hover i,
    .pagination a:hover,
    .pagination span.current,
    .widget_tag_cloud .tagcloud a:hover,
    .widget_product_tag_cloud .tagcloud a:hover,
    .x-scroll-top:hover {
      color: <?php echo $x_site_link_color; ?>;
    }

      <?php if ( $woocommerce_is_active ) : ?>

      .woocommerce .price > .amount,
      .woocommerce .price > ins > .amount,
      .woocommerce-page .price > .amount,
      .woocommerce-page .price > ins > .amount,
      .woocommerce li.product .entry-header > a:first-child:hover h3,
      .woocommerce-page li.product .entry-header > a:first-child:hover h3,
      .woocommerce .star-rating:before,
      .woocommerce-page .star-rating:before,
      .woocommerce .star-rating span:before,
      .woocommerce-page .star-rating span:before,
      .woocommerce .onsale,
      .woocommerce-page .onsale {
        color: <?php echo $x_site_link_color; ?>;
      }

      <?php endif; ?>

    a:hover {
      color: <?php echo $x_site_link_color_hover; ?>;
    }

    a.x-img-thumbnail:hover,
    textarea:focus,
    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="datetime"]:focus,
    input[type="datetime-local"]:focus,
    input[type="date"]:focus,
    input[type="month"]:focus,
    input[type="time"]:focus,
    input[type="week"]:focus,
    input[type="number"]:focus,
    input[type="email"]:focus,
    input[type="url"]:focus,
    input[type="search"]:focus,
    input[type="tel"]:focus,
    input[type="color"]:focus,
    .uneditable-input:focus,
    .pagination a:hover,
    .pagination span.current,
    .widget_tag_cloud .tagcloud a:hover,
    .widget_product_tag_cloud .tagcloud a:hover,
    .x-scroll-top:hover {
      border-color: <?php echo $x_site_link_color; ?>;
    }

    .flex-direction-nav a,
    .flex-control-nav a:hover,
    .flex-control-nav a.flex-active,
    .x-dropcap,
    .x-skill-bar .bar,
    .x-pricing-column.featured h2,
    .x-portfolio-filters,
    .x-entry-share .x-share:hover,
    .widget_price_filter .ui-slider .ui-slider-range {
      background-color: <?php echo $x_site_link_color; ?>;
    }

    .x-portfolio-filters:hover {
      background-color: <?php echo $x_site_link_color_hover; ?>;
    }

    .x-navbar .x-nav > li > a,
    .x-nav-collapse .sub-menu a {
      color: <?php echo $x_navbar_link_color; ?>;
    }

    .x-navbar .x-navbar-inner .x-nav-collapse .x-nav > li > a:hover,
    .x-navbar .x-navbar-inner .x-nav-collapse .x-nav > .current-menu-item > a,
    .x-navbar .x-navbar-inner .x-nav-collapse .sub-menu a:hover {
      color: <?php echo $x_navbar_link_color_hover; ?>;
    }

      <?php if ( get_theme_mod( 'x_icon_post_standard_colors_enable' ) ) : ?>

      <?php $standard_text_color       = get_theme_mod( 'x_icon_post_standard_color' ); ?>
      <?php $standard_background_color = get_theme_mod( 'x_icon_post_standard_background' ); ?>

      .format-standard .entry-wrap {
        color: <?php echo $standard_text_color ?> !important;
        background-color: <?php echo $standard_background_color ?> !important;
      }

      .format-standard a:not(.x-btn):not(.meta-comments),
      .format-standard h1,
      .format-standard h2,
      .format-standard h3,
      .format-standard h4,
      .format-standard h5,
      .format-standard h6,
      .format-standard .entry-title,
      .format-standard .entry-title a,
      .format-standard .entry-title a:hover,
      .format-standard .p-meta,
      .format-standard blockquote,
      .format-standard .x-cite {
        color: <?php echo $standard_text_color; ?>;
      }

      .format-standard .meta-comments {
        border: 0;
        color: <?php echo $standard_background_color; ?>;
        background-color: <?php echo $standard_text_color; ?>;
      }

      .format-standard .entry-content a:not(.x-btn):not(.x-img-thumbnail) {
        border-bottom: 1px dotted;
      }

      .format-standard .entry-content a:hover:not(.x-btn):not(.x-img-thumbnail) {
        opacity: 0.65;
        filter: alpha(opacity=65);
      }

      .format-standard .entry-content a.x-img-thumbnail {
        border-color: #fff;
      }

      .format-standard blockquote,
      .format-standard .x-toc,
      .format-standard .entry-content a.x-img-thumbnail:hover {
        border-color: <?php echo $standard_text_color; ?>;
      }

      <?php endif; ?>

      <?php if ( get_theme_mod( 'x_icon_post_image_colors_enable' ) ) : ?>

      <?php $image_text_color       = get_theme_mod( 'x_icon_post_image_color' ); ?>
      <?php $image_background_color = get_theme_mod( 'x_icon_post_image_background' ); ?>

      .format-image .entry-wrap {
        color: <?php echo $image_text_color ?> !important;
        background-color: <?php echo $image_background_color ?> !important;
      }

      .format-image a:not(.x-btn):not(.meta-comments),
      .format-image h1,
      .format-image h2,
      .format-image h3,
      .format-image h4,
      .format-image h5,
      .format-image h6,
      .format-image .entry-title,
      .format-image .entry-title a,
      .format-image .entry-title a:hover,
      .format-image .p-meta,
      .format-image blockquote,
      .format-image .x-cite {
        color: <?php echo $image_text_color; ?>;
      }

      .format-image .meta-comments {
        border: 0;
        color: <?php echo $image_background_color; ?>;
        background-color: <?php echo $image_text_color; ?>;
      }

      .format-image .entry-content a:not(.x-btn):not(.x-img-thumbnail) {
        border-bottom: 1px dotted;
      }

      .format-image .entry-content a:hover:not(.x-btn):not(.x-img-thumbnail) {
        opacity: 0.65;
        filter: alpha(opacity=65);
      }

      .format-image .entry-content a.x-img-thumbnail {
        border-color: #fff;
      }

      .format-image blockquote,
      .format-image .x-toc,
      .format-image .entry-content a.x-img-thumbnail:hover {
        border-color: <?php echo $image_text_color; ?>;
      }

      <?php endif; ?>

      <?php if ( get_theme_mod( 'x_icon_post_gallery_colors_enable' ) ) : ?>

      <?php $gallery_text_color       = get_theme_mod( 'x_icon_post_gallery_color' ); ?>
      <?php $gallery_background_color = get_theme_mod( 'x_icon_post_gallery_background' ); ?>

      .format-gallery .entry-wrap {
        color: <?php echo $gallery_text_color ?> !important;
        background-color: <?php echo $gallery_background_color ?> !important;
      }

      .format-gallery a:not(.x-btn):not(.meta-comments),
      .format-gallery h1,
      .format-gallery h2,
      .format-gallery h3,
      .format-gallery h4,
      .format-gallery h5,
      .format-gallery h6,
      .format-gallery .entry-title,
      .format-gallery .entry-title a,
      .format-gallery .entry-title a:hover,
      .format-gallery .p-meta,
      .format-gallery blockquote,
      .format-gallery .x-cite {
        color: <?php echo $gallery_text_color; ?>;
      }

      .format-gallery .meta-comments {
        border: 0;
        color: <?php echo $gallery_background_color; ?>;
        background-color: <?php echo $gallery_text_color; ?>;
      }

      .format-gallery .entry-content a:not(.x-btn):not(.x-img-thumbnail) {
        border-bottom: 1px dotted;
      }

      .format-gallery .entry-content a:hover:not(.x-btn):not(.x-img-thumbnail) {
        opacity: 0.65;
        filter: alpha(opacity=65);
      }

      .format-gallery .entry-content a.x-img-thumbnail {
        border-color: #fff;
      }

      .format-gallery blockquote,
      .format-gallery .x-toc,
      .format-gallery .entry-content a.x-img-thumbnail:hover {
        border-color: <?php echo $gallery_text_color; ?>;
      }

      <?php endif; ?>

      <?php if ( get_theme_mod( 'x_icon_post_video_colors_enable' ) ) : ?>

      <?php $video_text_color       = get_theme_mod( 'x_icon_post_video_color' ); ?>
      <?php $video_background_color = get_theme_mod( 'x_icon_post_video_background' ); ?>

      .format-video .entry-wrap {
        color: <?php echo $video_text_color ?> !important;
        background-color: <?php echo $video_background_color ?> !important;
      }

      .format-video a:not(.x-btn):not(.meta-comments),
      .format-video h1,
      .format-video h2,
      .format-video h3,
      .format-video h4,
      .format-video h5,
      .format-video h6,
      .format-video .entry-title,
      .format-video .entry-title a,
      .format-video .entry-title a:hover,
      .format-video .p-meta,
      .format-video blockquote,
      .format-video .x-cite {
        color: <?php echo $video_text_color; ?>;
      }

      .format-video .meta-comments {
        border: 0;
        color: <?php echo $video_background_color; ?>;
        background-color: <?php echo $video_text_color; ?>;
      }

      .format-video .entry-content a:not(.x-btn):not(.x-img-thumbnail) {
        border-bottom: 1px dotted;
      }

      .format-video .entry-content a:hover:not(.x-btn):not(.x-img-thumbnail) {
        opacity: 0.65;
        filter: alpha(opacity=65);
      }

      .format-video .entry-content a.x-img-thumbnail {
        border-color: #fff;
      }

      .format-video blockquote,
      .format-video .x-toc,
      .format-video .entry-content a.x-img-thumbnail:hover {
        border-color: <?php echo $video_text_color; ?>;
      }

      <?php endif; ?>

      <?php if ( get_theme_mod( 'x_icon_post_audio_colors_enable' ) ) : ?>

      <?php $audio_text_color       = get_theme_mod( 'x_icon_post_audio_color' ); ?>
      <?php $audio_background_color = get_theme_mod( 'x_icon_post_audio_background' ); ?>

      .format-audio .entry-wrap {
        color: <?php echo $audio_text_color ?> !important;
        background-color: <?php echo $audio_background_color ?> !important;
      }

      .format-audio a:not(.x-btn):not(.meta-comments),
      .format-audio h1,
      .format-audio h2,
      .format-audio h3,
      .format-audio h4,
      .format-audio h5,
      .format-audio h6,
      .format-audio .entry-title,
      .format-audio .entry-title a,
      .format-audio .entry-title a:hover,
      .format-audio .p-meta,
      .format-audio blockquote,
      .format-audio .x-cite {
        color: <?php echo $audio_text_color; ?>;
      }

      .format-audio .meta-comments {
        border: 0;
        color: <?php echo $audio_background_color; ?>;
        background-color: <?php echo $audio_text_color; ?>;
      }

      .format-audio .entry-content a:not(.x-btn):not(.x-img-thumbnail) {
        border-bottom: 1px dotted;
      }

      .format-audio .entry-content a:hover:not(.x-btn):not(.x-img-thumbnail) {
        opacity: 0.65;
        filter: alpha(opacity=65);
      }

      .format-audio .entry-content a.x-img-thumbnail {
        border-color: #fff;
      }

      .format-audio blockquote,
      .format-audio .x-toc,
      .format-audio .entry-content a.x-img-thumbnail:hover {
        border-color: <?php echo $audio_text_color; ?>;
      }

      <?php endif; ?>

      <?php if ( get_theme_mod( 'x_icon_post_quote_colors_enable' ) ) : ?>

      <?php $quote_text_color       = get_theme_mod( 'x_icon_post_quote_color' ); ?>
      <?php $quote_background_color = get_theme_mod( 'x_icon_post_quote_background' ); ?>

      .format-quote .entry-wrap {
        color: <?php echo $quote_text_color ?> !important;
        background-color: <?php echo $quote_background_color ?> !important;
      }

      .format-quote a:not(.x-btn):not(.meta-comments),
      .format-quote h1,
      .format-quote h2,
      .format-quote h3,
      .format-quote h4,
      .format-quote h5,
      .format-quote h6,
      .format-quote .entry-title,
      .format-quote .entry-title a,
      .format-quote .entry-title a:hover,
      .format-quote .entry-title-sub,
      .format-quote .p-meta,
      .format-quote blockquote,
      .format-quote .x-cite {
        color: <?php echo $quote_text_color; ?>;
      }

      .format-quote .meta-comments {
        border: 0;
        color: <?php echo $quote_background_color; ?>;
        background-color: <?php echo $quote_text_color; ?>;
      }

      .format-quote .entry-content a:not(.x-btn):not(.x-img-thumbnail) {
        border-bottom: 1px dotted;
      }

      .format-quote .entry-content a:hover:not(.x-btn):not(.x-img-thumbnail) {
        opacity: 0.65;
        filter: alpha(opacity=65);
      }

      .format-quote .entry-content a.x-img-thumbnail {
        border-color: #fff;
      }

      .format-quote blockquote,
      .format-quote .x-toc,
      .format-quote .entry-content a.x-img-thumbnail:hover {
        border-color: <?php echo $quote_text_color; ?>;
      }

      <?php endif; ?>

      <?php if ( get_theme_mod( 'x_icon_post_link_colors_enable' ) ) : ?>

      <?php $link_text_color       = get_theme_mod( 'x_icon_post_link_color' ); ?>
      <?php $link_background_color = get_theme_mod( 'x_icon_post_link_background' ); ?>

      .format-link .entry-wrap {
        color: <?php echo $link_text_color ?> !important;
        background-color: <?php echo $link_background_color ?> !important;
      }

      .format-link a:not(.x-btn):not(.meta-comments),
      .format-link h1,
      .format-link h2,
      .format-link h3,
      .format-link h4,
      .format-link h5,
      .format-link h6,
      .format-link .entry-title,
      .format-link .entry-title a,
      .format-link .entry-title a:hover,
      .format-link .entry-title .entry-external-link:hover,
      .format-link .p-meta,
      .format-link blockquote,
      .format-link .x-cite {
        color: <?php echo $link_text_color; ?>;
      }

      .format-link .meta-comments {
        border: 0;
        color: <?php echo $link_background_color; ?>;
        background-color: <?php echo $link_text_color; ?>;
      }

      .format-link .entry-content a:not(.x-btn):not(.x-img-thumbnail) {
        border-bottom: 1px dotted;
      }

      .format-link .entry-content a:hover:not(.x-btn):not(.x-img-thumbnail) {
        opacity: 0.65;
        filter: alpha(opacity=65);
      }

      .format-link .entry-content a.x-img-thumbnail {
        border-color: #fff;
      }

      .format-link blockquote,
      .format-link .x-toc,
      .format-link .entry-content a.x-img-thumbnail:hover {
        border-color: <?php echo $link_text_color; ?>;
      }

      <?php endif; ?>


    /*
    // Icon container sizing.
    */

    .x-container-fluid.width {
      width: <?php echo $x_icon_sizing_site_width . '%'; ?>;
    }

    .x-container-fluid.max {
      max-width: <?php echo $x_icon_sizing_site_max_width . 'px'; ?>;
    }

      <?php if ( get_theme_mod( 'x_icon_layout_site' ) == 'boxed' ) :; ?>

      .site,
      .x-navbar.x-navbar-fixed-top.x-container-fluid.max.width {
        width: <?php echo $x_icon_sizing_site_width . '%'; ?>;
        max-width: <?php echo $x_icon_sizing_site_max_width . 'px'; ?>;
      }

      <?php endif; ?>


    /*
    // Icon custom fonts.
    */

      <?php if ( $x_custom_fonts == 1 ) : ?>

      .x-comment-author,
      .x-comment-time,
      .comment-form-author label,
      .comment-form-email label,
      .comment-form-url label,
      .comment-form-rating label,
      .comment-form-comment label {
        font-family: "<?php echo $x_headings_font_family; ?>", "Helvetica Neue", Helvetica, sans-serif;;
      }

      <?php endif; ?>

      <?php if ( $x_body_font_color_enable == 1 ) : ?>

      .x-comment-time,
      .entry-thumb:before,
      .p-meta {
        color: <?php echo $x_body_font_color; ?>;
      }

        <?php if ( $woocommerce_is_active ) : ?>

        .woocommerce .price > .from,
        .woocommerce .price > del,
        .woocommerce p.stars span a:after,
        .woocommerce-page .price > .from,
        .woocommerce-page .price > del,
        .woocommerce-page p.stars span a:after {
          color: <?php echo $x_body_font_color; ?>;
        }

        <?php endif; ?>

      <?php endif; ?>

      <?php if ( $x_headings_font_color_enable == 1 ) : ?>

      .entry-title a:hover,
      .x-comment-author,
      .x-comment-author a,
      .comment-form-author label,
      .comment-form-email label,
      .comment-form-url label,
      .comment-form-rating label,
      .comment-form-comment label,
      .x-accordion-heading .x-accordion-toggle,
      .x-nav-tabs > li > a:hover,
      .x-nav-tabs > .active > a,
      .x-nav-tabs > .active > a:hover,
      .jp-controls a:before,
      .jp-controls a:hover:before {
        color: <?php echo $x_headings_font_color; ?>;
      }

      .h-comments-title small,
      .h-feature-headline span i,
      .tp-bullets.simplebullets.navbar,
      .tp-bullets.simplebullets.navbar-old,
      .tp-leftarrow.default,
      .tp-rightarrow.default,
      .x-portfolio-filters-menu,
      .jp-seek-bar {
        background-color: <?php echo $x_headings_font_color; ?> !important;
      }

      <?php endif; ?>

    .x-navbar-static-active .x-navbar .x-nav > li,
    .x-navbar-fixed-top-active .x-navbar .x-nav > li {
      height: <?php echo $x_navbar_height . 'px'; ?>;
      padding-top: <?php echo $x_navbar_adjust_links_top . 'px'; ?>;
    }

    .x-navbar-fixed-left-active .x-navbar .x-nav > li > a,
    .x-navbar-fixed-right-active .x-navbar .x-nav > li > a {
      padding-top: <?php echo round( ( $x_navbar_adjust_links_side - $x_navbar_font_size - 4 ) / 2 ) . 'px'; ?>;
      padding-bottom: <?php echo round( ( $x_navbar_adjust_links_side - $x_navbar_font_size - 4 ) / 2 ) . 'px'; ?>;
      padding-left: 35px;
      padding-right: 35px;
    }

    .sf-menu li:hover ul,
    .sf-menu li.sfHover ul {
      top: <?php echo $x_navbar_height . 'px'; ?>;;
    }

    .sf-menu li li:hover ul,
    .sf-menu li li.sfHover ul {
      top: -0.795em;
    }

    .x-navbar-fixed-left-active .x-widgetbar {
      left: <?php echo $x_navbar_width . 'px'; ?>;
    }

    .x-navbar-fixed-right-active .x-widgetbar {
      right: <?php echo $x_navbar_width . 'px'; ?>;
    }


    /*
    // Icon mobile styles.
    */

    @media (min-width: 1200px) {
      .x-sidebar {
        width: <?php echo $x_icon_sidebar_width . 'px'; ?>;
      }

      body.x-sidebar-content-active,
      body[class*="page-template-template-blank"].x-sidebar-content-active.x-blank-template-sidebar-active {
        padding-left: <?php echo $x_icon_sidebar_width . 'px'; ?>;
      }

      body.x-content-sidebar-active,
      body[class*="page-template-template-blank"].x-content-sidebar-active.x-blank-template-sidebar-active {
        padding-right: <?php echo $x_icon_sidebar_width . 'px'; ?>;
      }

      body.x-sidebar-content-active .x-widgetbar,
      body.x-sidebar-content-active .x-navbar-fixed-top,
      body[class*="page-template-template-blank"].x-sidebar-content-active.x-blank-template-sidebar-active .x-widgetbar,
      body[class*="page-template-template-blank"].x-sidebar-content-active.x-blank-template-sidebar-active .x-navbar-fixed-top {
        left: <?php echo $x_icon_sidebar_width . 'px'; ?>;
      }

      body.x-content-sidebar-active .x-widgetbar,
      body.x-content-sidebar-active .x-navbar-fixed-top,
      body[class*="page-template-template-blank"].x-content-sidebar-active.x-blank-template-sidebar-active .x-widgetbar,
      body[class*="page-template-template-blank"].x-content-sidebar-active.x-blank-template-sidebar-active .x-navbar-fixed-top {
        right: <?php echo $x_icon_sidebar_width . 'px'; ?>;
      }
    }

    @media (max-width: 979px) {
      .x-navbar-fixed-left .x-container-fluid.width,
      .x-navbar-fixed-right .x-container-fluid.width {
        width: <?php echo $x_icon_sizing_site_width . '%'; ?>;
      }

      .x-navbar-static-active .x-navbar .x-nav > li,
      .x-navbar-fixed-top-active .x-navbar .x-nav > li {
        height: auto;
        padding: 0;
      }

      .x-navbar-fixed-left-active .x-widgetbar {
        left: 0;
      }

      .x-navbar-fixed-right-active .x-widgetbar {
        right: 0;
      }
    }

    <?php endif; ?>


    /*
    // Body.
    */

    body {
      font-size: <?php echo $x_body_font_size . 'px'; ?>;
      font-weight: <?php echo $x_body_font_weight; ?>;
      <?php if ( strpos( $x_body_font_weight_and_style, 'italic' ) ) : ?>
        font-style: italic;
      <?php endif; ?>
      <?php if ( $x_body_font_color_enable == 1 ) : ?>
        color: <?php echo $x_body_font_color; ?>;
      <?php endif; ?>
    }


    /*
    // Links.
    */

    a:focus,
    select:focus,
    input[type="file"]:focus,
    input[type="radio"]:focus,
    input[type="checkbox"]:focus {
      outline: thin dotted #333;
      outline: 5px auto <?php echo $x_site_link_color; ?>;
      outline-offset: -1px;
    }


    /*
    // Headings.
    */

    h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
      font-weight: <?php echo $x_headings_font_weight; ?>;
      <?php if ( strpos( $x_headings_font_weight_and_style, 'italic' ) ) : ?>
        font-style: italic;
      <?php endif; ?>
      letter-spacing: <?php echo $x_headings_letter_spacing . 'px'; ?>;
      <?php if ( get_theme_mod( 'x_headings_uppercase_enable' ) == 1 ) : ?>
        text-transform: uppercase;
      <?php endif; ?>
    }


    /*
    // Content.
    */

    .entry-header,
    .entry-content {
      font-size: <?php echo $x_content_font_size . 'px'; ?>;
    }


    /*
    // Brand.
    */

    .x-brand {
      font-weight: <?php echo $x_logo_font_weight; ?>;
      <?php if ( strpos( $x_logo_font_weight_and_style, 'italic' ) ) : ?>
        font-style: italic;
      <?php endif; ?>
      letter-spacing: <?php echo $x_logo_letter_spacing . 'px'; ?>;
      <?php if ( get_theme_mod( 'x_logo_uppercase_enable' ) == 1 ) : ?>
        text-transform: uppercase;
      <?php endif; ?>
    }

    <?php if ( $x_logo_width != '' ) : ?>

    .x-brand img {
      width: <?php echo $x_logo_width / 2 . 'px'; ?>;
    }

    <?php endif; ?>

    <?php if ( $x_custom_fonts == 1 ) : ?>

    body,
    input,
    button,
    select,
    textarea {
      font-family: "<?php echo $x_body_font_family; ?>", "Helvetica Neue", Helvetica, sans-serif;
    }

    h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
      font-family: "<?php echo $x_headings_font_family; ?>", "Helvetica Neue", Helvetica, sans-serif;
    }

    .x-brand {
      font-family: "<?php echo $x_logo_font_family; ?>", "Helvetica Neue", Helvetica, sans-serif;
    }

    .x-navbar .x-nav > li > a {
      font-family: "<?php echo $x_navbar_font_family; ?>", "Helvetica Neue", Helvetica, sans-serif;
    }

    <?php endif; ?>

    <?php if ( $x_headings_font_color_enable == 1 ) : ?>

    h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .h1 a, .h2 a, .h3 a, .h4 a, .h5 a, .h6 a, blockquote {
      color: <?php echo $x_headings_font_color; ?>;
    }

    <?php endif; ?>

    <?php if ( $x_logo_font_color_enable == 1 ) : ?>

    .x-brand,
    .x-brand:hover {
      color: <?php echo $x_logo_font_color; ?>;
    }

    <?php endif; ?>

    <?php if ( $x_headings_widget_icons_enable == 1 ) : ?>

      <?php if ( $ltr ) : ?>

      .h-widget:before,
      .x-flickr-widget .h-widget:before,
      .x-dribbble-widget .h-widget:before {
        position: relative;
        font-weight: normal;
        font-style: normal;
        line-height: 1;
        text-decoration: inherit;
        -webkit-font-smoothing: antialiased;
        speak: none;
      }

      .h-widget:before {
        padding-right: 0.4em;
        font-family: "fontawesome";
      }

      .x-flickr-widget .h-widget:before,
      .x-dribbble-widget .h-widget:before {
        top: 0.025em;
        padding-right: 0.35em;
        font-family: "foundationsocial";
        font-size: 0.785em;
      }

      .widget_archive .h-widget:before {
        content: "\f040";
        top: -0.045em;
        font-size: 0.925em;
      }

      .widget_calendar .h-widget:before {
        content: "\f073";
        top: -0.0825em;
        font-size: 0.85em;
      }

      .widget_categories .h-widget:before,
      .widget_product_categories .h-widget:before {
        content: "\f02e";
        font-size: 0.95em;
      }

      .widget_nav_menu .h-widget:before,
      .widget_layered_nav .h-widget:before {
        content: "\f0c9";
      }

      .widget_meta .h-widget:before {
        content: "\f0fe";
        top: -0.065em;
        font-size: 0.895em;
      }

      .widget_pages .h-widget:before {
        content: "\f0f6";
        top: -0.065em;
        font-size: 0.85em;
      }

      .widget_recent_reviews .h-widget:before,
      .widget_recent_comments .h-widget:before {
        content: "\f086";
        top: -0.065em;
        font-size: 0.895em;
      }

      .widget_recent_entries .h-widget:before {
        content: "\f02d";
        top: -0.045em;
        font-size: 0.875em;
      }

      .widget_rss .h-widget:before {
        content: "\f09e";
        padding-right: 0.2em;
      }

      .widget_search .h-widget:before,
      .widget_product_search .h-widget:before {
        content: "\f0a4";
        top: -0.075em;
        font-size: 0.85em;
      }

      .widget_tag_cloud .h-widget:before,
      .widget_product_tag_cloud .h-widget:before {
        content: "\f02c";
        font-size: 0.925em;
      }

      .widget_text .h-widget:before {
        content: "\f054";
        padding-right: 0.4em;
        font-size: 0.925em;
      }

      .x-dribbble-widget .h-widget:before {
        content: "\f009";
      }

      .x-flickr-widget .h-widget:before {
        content: "\f010";
        padding-right: 0.35em;
      }

      .widget_best_sellers .h-widget:before {
        content: "\f091";
        top: -0.0975em;
        font-size: 0.815em;
      }

      .widget_shopping_cart .h-widget:before {
        content: "\f07a";
        top: -0.05em;
        font-size: 0.945em;
      }

      .widget_products .h-widget:before {
        content: "\f0f2";
        top: -0.05em;
        font-size: 0.945em;
      }

      .widget_featured_products .h-widget:before {
        content: "\f0a3";
      }

      .widget_layered_nav_filters .h-widget:before {
        content: "\f046";
        top: 1px;
      }

      .widget_onsale .h-widget:before {
        content: "\f02b";
        font-size: 0.925em;
      }

      .widget_price_filter .h-widget:before {
        content: "\f0d6";
        font-size: 1.025em;
      }

      .widget_random_products .h-widget:before {
        content: "\f074";
        font-size: 0.925em;
      }

      .widget_recently_viewed_products .h-widget:before {
        content: "\f06e";
      }

      .widget_recent_products .h-widget:before {
        content: "\f08d";
        top: -0.035em;
        font-size: 0.9em;
      }

      .widget_top_rated_products .h-widget:before {
        content: "\f075";
        top: -0.145em;
        font-size: 0.885em;
      }

      <?php else : ?>

      .h-widget:after,
      .x-flickr-widget .h-widget:after,
      .x-dribbble-widget .h-widget:after {
        position: relative;
        font-weight: normal;
        font-style: normal;
        line-height: 1;
        text-decoration: inherit;
        -webkit-font-smoothing: antialiased;
        speak: none;
      }

      .h-widget:after {
        padding-left: 0.4em;
        font-family: "fontawesome";
      }

      .x-flickr-widget .h-widget:after,
      .x-dribbble-widget .h-widget:after {
        top: 0.025em;
        padding-left: 0.35em;
        font-family: "foundationsocial";
        font-size: 0.785em;
      }

      .widget_archive .h-widget:after {
        content: "\f040";
        top: -0.045em;
        font-size: 0.925em;
      }

      .widget_calendar .h-widget:after {
        content: "\f073";
        top: -0.0825em;
        font-size: 0.85em;
      }

      .widget_categories .h-widget:after,
      .widget_product_categories .h-widget:after {
        content: "\f02e";
        font-size: 0.95em;
      }

      .widget_nav_menu .h-widget:after,
      .widget_layered_nav .h-widget:after {
        content: "\f0c9";
      }

      .widget_meta .h-widget:after {
        content: "\f0fe";
        top: -0.065em;
        font-size: 0.895em;
      }

      .widget_pages .h-widget:after {
        content: "\f0f6";
        top: -0.065em;
        font-size: 0.85em;
      }

      .widget_recent_reviews .h-widget:after,
      .widget_recent_comments .h-widget:after {
        content: "\f086";
        top: -0.065em;
        font-size: 0.895em;
      }

      .widget_recent_entries .h-widget:after {
        content: "\f02d";
        top: -0.045em;
        font-size: 0.875em;
      }

      .widget_rss .h-widget:after {
        content: "\f09e";
        padding-left: 0.2em;
      }

      .widget_search .h-widget:after,
      .widget_product_search .h-widget:after {
        content: "\f0a5";
        top: -0.075em;
        font-size: 0.85em;
      }

      .widget_tag_cloud .h-widget:after,
      .widget_product_tag_cloud .h-widget:after {
        content: "\f02c";
        font-size: 0.925em;
      }

      .widget_text .h-widget:after {
        content: "\f053";
        padding-left: 0.4em;
        font-size: 0.925em;
      }

      .x-dribbble-widget .h-widget:after {
        content: "\f009";
      }

      .x-flickr-widget .h-widget:after {
        content: "\f010";
        padding-left: 0.35em;
      }

      .widget_best_sellers .h-widget:after {
        content: "\f091";
        top: -0.0975em;
        font-size: 0.815em;
      }

      .widget_shopping_cart .h-widget:after {
        content: "\f07a";
        top: -0.05em;
        font-size: 0.945em;
      }

      .widget_products .h-widget:after {
        content: "\f0f2";
        top: -0.05em;
        font-size: 0.945em;
      }

      .widget_featured_products .h-widget:after {
        content: "\f0a3";
      }

      .widget_layered_nav_filters .h-widget:after {
        content: "\f046";
        top: 1px;
      }

      .widget_onsale .h-widget:after {
        content: "\f02b";
        font-size: 0.925em;
      }

      .widget_price_filter .h-widget:after {
        content: "\f0d6";
        font-size: 1.025em;
      }

      .widget_random_products .h-widget:after {
        content: "\f074";
        font-size: 0.925em;
      }

      .widget_recently_viewed_products .h-widget:after {
        content: "\f06e";
      }

      .widget_recent_products .h-widget:after {
        content: "\f08d";
        top: -0.035em;
        font-size: 0.9em;
      }

      .widget_top_rated_products .h-widget:after {
        content: "\f075";
        top: -0.145em;
        font-size: 0.885em;
      }

      <?php endif; ?>

    <?php endif; ?>


    /*
    // Content/sidebar sizing.
    */

    .x-main.full {
      float: none;
      display: block;
      width: auto;
    }

    @media (max-width: 979px) {
      .x-main.left,
      .x-main.right,
      .x-sidebar.left,
      .x-sidebar.right {
        float: none;
        display: block;
        width: auto !important;
      }
    }


    /*
    // Widgetbar.
    */

    .x-btn-widgetbar {
      border-top-color: <?php echo get_theme_mod( 'x_widgetbar_button_background' ); ?>;
      border-right-color: <?php echo get_theme_mod( 'x_widgetbar_button_background' ); ?>;
    }

    .x-btn-widgetbar:hover {
      border-top-color: <?php echo get_theme_mod( 'x_widgetbar_button_background_hover' ); ?>;
      border-right-color: <?php echo get_theme_mod( 'x_widgetbar_button_background_hover' ); ?>;
    }


    /*
    // Navbar layout.
    */

    body.x-navbar-fixed-left-active {
      padding-left: <?php echo $x_navbar_width . 'px'; ?>;
    }

    body.x-navbar-fixed-right-active {
      padding-right: <?php echo $x_navbar_width . 'px'; ?>;
    }

    <?php if ( $x_logo_navigation_layout == 'stacked' ) : ?>

    .x-logobar-inner {
      padding-top: <?php echo $x_logobar_adjust_spacing_top . 'px'; ?>;
      padding-bottom: <?php echo $x_logobar_adjust_spacing_bottom . 'px'; ?>;
    }

    <?php endif; ?>

    .x-navbar {
      font-size: <?php echo $x_navbar_font_size . 'px'; ?>;
    }

    .x-navbar .x-nav > li > a {
      font-weight: <?php echo $x_navbar_font_weight; ?>;
      <?php if ( strpos( $x_navbar_font_weight_and_style, 'italic' ) ) : ?>
        font-style: italic;
      <?php else : ?>
        font-style: normal;
      <?php endif; ?>
      <?php if ( get_theme_mod( 'x_navbar_uppercase_enable' ) == 1 ) : ?>
        text-transform: uppercase;
      <?php endif; ?>
    }

    .x-navbar-fixed-left,
    .x-navbar-fixed-right {
      width: <?php echo $x_navbar_width . 'px'; ?>;
    }

    .x-navbar-fixed-top-active .x-navbar-wrap {
      height: <?php echo $x_navbar_height . 'px'; ?>;
    }

    .x-navbar-inner {
      min-height: <?php echo $x_navbar_height . 'px'; ?>;
    }

    .x-btn-navbar {
      margin-top: <?php echo $x_navbar_adjust_button . 'px'; ?>;;
    }

    .x-btn-navbar,
    .x-btn-navbar.collapsed {
      font-size: <?php echo $x_navbar_adjust_button_size . 'px'; ?>;
    }

    .x-brand {
      font-size: <?php echo $x_logo_font_size . 'px'; ?>;
      font-size: <?php echo $x_logo_font_size / 10 . 'rem'; ?>;
    }

    .x-navbar .x-brand {
      margin-top: <?php echo get_theme_mod( 'x_logo_adjust_navbar_top' ) . 'px'; ?>;
    }

    body.x-navbar-fixed-left-active .x-brand,
    body.x-navbar-fixed-right-active .x-brand {
      margin-top: <?php echo get_theme_mod( 'x_logo_adjust_navbar_side' ) . 'px'; ?>;
    }

    @media (max-width: 979px) {
      body.x-navbar-fixed-left-active,
      body.x-navbar-fixed-right-active {
        padding: 0;
      }

      body.x-navbar-fixed-left-active .x-brand,
      body.x-navbar-fixed-right-active .x-brand {
        margin-top: <?php echo get_theme_mod( 'x_logo_adjust_navbar_top' ) . 'px'; ?>;
      }

      .x-navbar-fixed-top-active .x-navbar-wrap {
        height: auto;
      }

      .x-navbar-fixed-left,
      .x-navbar-fixed-right {
        width: auto;
      }
    }


    /*
    // Buttons.
    */

    .x-btn,
    .button,
    [type="submit"] {
      color: <?php echo get_theme_mod( 'x_button_color' ); ?>;
      border-color: <?php echo get_theme_mod( 'x_button_border_color' ); ?>;
      background-color: <?php echo get_theme_mod( 'x_button_background_color' ); ?>;
    }

    .x-btn:hover,
    .button:hover,
    [type="submit"]:hover {
      color: <?php echo get_theme_mod( 'x_button_color_hover' ); ?>;
      border-color: <?php echo get_theme_mod( 'x_button_border_color_hover' ); ?>;
      background-color: <?php echo get_theme_mod( 'x_button_background_color_hover' ); ?>;
    }

    .x-btn.x-btn-real,
    .x-btn.x-btn-real:hover {
      margin-bottom: 0.25em;
      text-shadow: 0 0.075em 0.075em rgba(0, 0, 0, 0.65);
    }

    .x-btn.x-btn-real {
      -webkit-box-shadow: 0 0.25em 0 0 <?php echo $x_button_bottom_color; ?>, 0 4px 9px rgba(0, 0, 0, 0.75);
              box-shadow: 0 0.25em 0 0 <?php echo $x_button_bottom_color; ?>, 0 4px 9px rgba(0, 0, 0, 0.75);
    }

    .x-btn.x-btn-real:hover {
      -webkit-box-shadow: 0 0.25em 0 0 <?php echo $x_button_bottom_color_hover; ?>, 0 4px 9px rgba(0, 0, 0, 0.75);
              box-shadow: 0 0.25em 0 0 <?php echo $x_button_bottom_color_hover; ?>, 0 4px 9px rgba(0, 0, 0, 0.75);
    }

    .x-btn.x-btn-flat,
    .x-btn.x-btn-flat:hover {
      margin-bottom: 0;
      text-shadow: 0 0.075em 0.075em rgba(0, 0, 0, 0.65);
      -webkit-box-shadow: none;
              box-shadow: none;
    }

    .x-btn.x-btn-transparent,
    .x-btn.x-btn-transparent:hover {
      margin-bottom: 0;
      border-width: 3px;
      text-shadow: none;
      text-transform: uppercase;
      background-color: transparent;
      -webkit-box-shadow: none;
              box-shadow: none;
    }

    .x-btn-circle-wrap:before {
      width: 172px;
      height: 43px;
      background: url(<?php echo get_template_directory_uri(); ?>/framework/img/global/btn-circle-top-small.png) center center no-repeat;
      -webkit-background-size: 172px 43px;
              background-size: 172px 43px;
    }

    .x-btn-circle-wrap:after {
      width: 190px;
      height: 43px;
      background: url(<?php echo get_template_directory_uri(); ?>/framework/img/global/btn-circle-bottom-small.png) center center no-repeat;
      -webkit-background-size: 190px 43px;
              background-size: 190px 43px;
    }

    <?php if ( $x_button_style == 'real' ) : ?>

    .x-btn,
    .x-btn:hover,
    .button,
    .button:hover,
    [type="submit"],
    [type="submit"]:hover {
      margin-bottom: 0.25em;
      text-shadow: 0 0.075em 0.075em rgba(0, 0, 0, 0.5);
    }

    .x-btn,
    .button,
    [type="submit"] {
      -webkit-box-shadow: 0 0.25em 0 0 <?php echo $x_button_bottom_color; ?>, 0 4px 9px rgba(0, 0, 0, 0.75);
              box-shadow: 0 0.25em 0 0 <?php echo $x_button_bottom_color; ?>, 0 4px 9px rgba(0, 0, 0, 0.75);
    }

    .x-btn:hover,
    .button:hover,
    [type="submit"]:hover {
      -webkit-box-shadow: 0 0.25em 0 0 <?php echo $x_button_bottom_color_hover; ?>, 0 4px 9px rgba(0, 0, 0, 0.75);
              box-shadow: 0 0.25em 0 0 <?php echo $x_button_bottom_color_hover; ?>, 0 4px 9px rgba(0, 0, 0, 0.75);
    }

    <?php elseif ( $x_button_style == 'flat' ) : ?>

    .x-btn,
    .x-btn:hover,
    .button,
    .button:hover,
    [type="submit"],
    [type="submit"]:hover {
      text-shadow: 0 0.075em 0.075em rgba(0, 0, 0, 0.5);
    }

    <?php elseif ( $x_button_style == 'transparent' ) : ?>

    .x-btn,
    .x-btn:hover,
    .button,
    .button:hover,
    [type="submit"],
    [type="submit"]:hover {
      border-width: 3px;
      text-transform: uppercase;
      background-color: transparent;
    }

    <?php endif; ?>

    <?php

    if ( $x_button_shape == 'rounded' ) :
      echo '.x-btn, .button, [type="submit"] { border-radius: 0.25em; }';
    elseif ( $x_button_shape == 'pill' ) :
      echo '.x-btn, .button, [type="submit"] { border-radius: 100em; }';
    endif;

    switch ( $x_button_size ) {
      case 'mini' :
        echo '.x-btn, .button, [type="submit"] { padding: 0.385em 0.923em 0.538em; font-size: 13px; font-size: 1.3rem; }';
        break;
      case 'small' :
        echo '.x-btn, .button, [type="submit"] { padding: 0.429em 1.143em 0.643em; font-size: 14px; font-size: 1.4rem; }';
        break;
      case 'large' :
        echo '.x-btn, .button, [type="submit"] { padding: 0.579em 1.105em 0.842em; font-size: 19px; font-size: 1.9rem; }';
        break;
      case 'x-large' :
        echo '.x-btn, .button, [type="submit"] { padding: 0.714em 1.286em 0.952em; font-size: 21px; font-size: 2.1rem; }';
        break;
      case 'jumbo' :
        echo '.x-btn, .button, [type="submit"] { padding: 0.643em 1.429em 0.857em; font-size: 28px; font-size: 2.8rem; }';
        break;
    }

    ?>

    <?php if ( $woocommerce_is_active ) : ?>

      <?php if ( $x_woocommerce_widgets_image_alignment == 'right' ) : ?>

        .widget_best_sellers ul li a img,
        .widget_shopping_cart ul li a img,
        .widget_products ul li a img,
        .widget_featured_products ul li a img,
        .widget_onsale ul li a img,
        .widget_random_products ul li a img,
        .widget_recently_viewed_products ul li a img,
        .widget_recent_products ul li a img,
        .widget_recent_reviews ul li a img,
        .widget_top_rated_products ul li a img {
          float: right;
          margin-left: 0.65em;
          margin-right: 0;
        }

      <?php endif; ?>

    <?php endif; ?>

    <?php if ( $gravity_forms_is_active ) : ?>

      body .gform_wrapper .gfield_required,
      body .gform_wrapper span.ginput_total {
        color: <?php echo $x_site_link_color; ?>;
      }

      body .gform_wrapper h2.gsection_title,
      body .gform_wrapper h3.gform_title {
        font-weight: <?php echo $x_headings_font_weight; ?>;
        letter-spacing: <?php echo $x_headings_letter_spacing; ?>px !important;
      }

      body .gform_wrapper .top_label .gfield_label,
      body .gform_wrapper .left_label .gfield_label,
      body .gform_wrapper .right_label .gfield_label {
        font-weight: <?php echo $x_body_font_weight; ?>;
      }

    <?php endif; ?>

  </style>

  <?php

  $css = ob_get_contents(); ob_end_clean();

  //
  // 1. Remove comments.
  // 2. Remove whitespace.
  // 3. Remove starting whitespace.
  //

  $output = preg_replace( '#/\*.*?\*/#s', '', $css );            // 1
  $output = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output ); // 2
  $output = preg_replace( '/\s\s+(.*)/', '$1', $output );        // 3

  echo $output;

}

add_action( 'wp_head', 'x_customizer_options_output_css', 9998, 0 );