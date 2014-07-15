<?php

// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/CUSTOMIZER/SETUP.PHP
// -----------------------------------------------------------------------------
// Initializes and sets up the WordPress Live Preview feature by including
// sections, controls, and settings.
//
// - Sections: organize the controls.
// - Controls: receive input and pass it to the settings.
// - Settings: interface with the existing options in the theme.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Set Path
//   02. Setup Customizer Links
//   03. Remove Unused Native Sections
//   04. Include Controls, Fonts, Options Register, Output, and Import/Export
//   05. Preview Variables
//   06. Custom CSS Option Output
//   07. Custom JavaScript Option Output
//   08. Include Preloader
// =============================================================================

// Set Path
// =============================================================================

$cstm_path = get_template_directory() . '/framework/functions/global/admin/customizer';



// Setup Customizer Links
// =============================================================================

if ( floatval( get_bloginfo( 'version' ) ) >= 3.6 ) {
  function x_remove_customize_submenu_page() {
    remove_submenu_page( 'themes.php', 'customize.php' );
  }

  add_action( 'admin_menu', 'x_remove_customize_submenu_page' );
}

function x_add_customizer_menu() {
  add_menu_page( 'Customizer', 'Customizer', 'edit_theme_options', 'customize.php', NULL, NULL, 61 );
  add_submenu_page( 'customize.php', 'Customizer Import', 'Import', 'edit_theme_options', 'import', 'x_customizer_import_option_page' );
  add_submenu_page( 'customize.php', 'Customizer Export', 'Export', 'edit_theme_options', 'export', 'x_customizer_export_option_page' );
}

add_action( 'admin_menu', 'x_add_customizer_menu' );



// Remove Unused Native Sections
// =============================================================================

function x_remove_customizer_sections( $wp_customize ) {
  $wp_customize->remove_section( 'nav' );
  // $wp_customize->remove_section( 'colors' );
  $wp_customize->remove_section( 'title_tagline' );
  // $wp_customize->remove_section( 'background_image' );
  $wp_customize->remove_section( 'static_front_page' );
}

add_action( 'customize_register', 'x_remove_customizer_sections' );



// Include Controls, Fonts, Options Register, Output, and Import/Export
// =============================================================================

require_once( $cstm_path . '/controls.php' );
require_once( $cstm_path . '/fonts.php' );
require_once( $cstm_path . '/register.php' );
require_once( $cstm_path . '/output.php' );
require_once( $cstm_path . '/import-export.php' );



// Preview Variables
// =============================================================================

$preview_variables = array(
  'x_stack' => get_theme_mod( 'x_stack' )
);



// Custom CSS Option Output
// =============================================================================

function x_customizer_custom_css_option_output() {
  if ( get_theme_mod( 'x_custom_styles' ) ) :
  ?>

    <style id="x-customizer-css-custom" type="text/css"><?php echo get_theme_mod( 'x_custom_styles' ); ?></style>

  <?php
  endif;
}

add_action( 'wp_head', 'x_customizer_custom_css_option_output', 9999, 0 );



// Custom JavaScript Option Output
// =============================================================================

function x_customizer_custom_javascript_option_output() {

  $entry_id                             = get_the_ID();
  $x_stack                              = x_get_stack();

  $x_integrity_design                   = get_theme_mod( 'x_integrity_design' );
  $x_integrity_light_bg_image_full      = get_theme_mod( 'x_integrity_light_bg_image_full' );
  $x_integrity_light_bg_image_full_fade = get_theme_mod( 'x_integrity_light_bg_image_full_fade' );
  $x_integrity_dark_bg_image_full       = get_theme_mod( 'x_integrity_dark_bg_image_full' );
  $x_integrity_dark_bg_image_full_fade  = get_theme_mod( 'x_integrity_dark_bg_image_full_fade' );
  $x_renew_bg_image_full                = get_theme_mod( 'x_renew_bg_image_full' );
  $x_renew_bg_image_full_fade           = get_theme_mod( 'x_renew_bg_image_full_fade' );
  $x_icon_bg_image_full                 = get_theme_mod( 'x_icon_bg_image_full' );
  $x_icon_bg_image_full_fade            = get_theme_mod( 'x_icon_bg_image_full_fade' );
  $x_entry_bg_image_full                = get_post_meta( $entry_id, '_x_entry_bg_image_full', true );
  $x_entry_bg_image_full_fade           = get_post_meta( $entry_id, '_x_entry_bg_image_full_fade', true );
  $x_entry_bg_image_full_duration       = get_post_meta( $entry_id, '_x_entry_bg_image_full_duration', true );

  ?>


  <?php if ( get_theme_mod( 'x_custom_scripts' ) ) : ?>

    <script><?php echo get_theme_mod( 'x_custom_scripts' ); ?></script>

  <?php endif; ?>


  <?php if ( $x_entry_bg_image_full ) : ?>

    <?php
    $page_bg_images_output = '';
    $page_bg_images        = explode( ',', $x_entry_bg_image_full );
    foreach ( $page_bg_images as $page_bg_image ) {
      $page_bg_images_output .= '"' . $page_bg_image . '", ';
    }
    $page_bg_images_output = trim( $page_bg_images_output, ', ' );
    ?>

    <script>jQuery.backstretch([<?php echo $page_bg_images_output; ?>], {duration: <?php echo $x_entry_bg_image_full_duration; ?>, fade: <?php echo $x_entry_bg_image_full_fade; ?>});</script>

  <?php else : ?>

    <?php if ( $x_stack == 'integrity' && $x_integrity_design == 'light' && $x_integrity_light_bg_image_full ) : ?>

      <script>jQuery.backstretch(['<?php echo $x_integrity_light_bg_image_full; ?>'], {fade: <?php echo $x_integrity_light_bg_image_full_fade; ?>});</script>

    <?php elseif ( $x_stack == 'integrity' && $x_integrity_design == 'dark' && $x_integrity_dark_bg_image_full ) : ?>

      <script>jQuery.backstretch(['<?php echo $x_integrity_dark_bg_image_full; ?>'], {fade: <?php echo $x_integrity_dark_bg_image_full_fade; ?>});</script>

    <?php elseif ( $x_stack == 'renew' && $x_renew_bg_image_full ) : ?>

      <script>jQuery.backstretch(['<?php echo $x_renew_bg_image_full; ?>'], {fade: <?php echo $x_renew_bg_image_full_fade; ?>});</script>

    <?php elseif ( $x_stack == 'icon' && $x_icon_bg_image_full ) : ?>

      <script>jQuery.backstretch(['<?php echo $x_icon_bg_image_full; ?>'], {fade: <?php echo $x_icon_bg_image_full_fade; ?>});</script>

    <?php endif; ?>

  <?php endif;
}

add_action( 'wp_footer', 'x_customizer_custom_javascript_option_output', 9999, 0 );



// Include Preloader
// =============================================================================

function x_customizer_preloader() {
  echo '<style type="text/css"> @import url("http://fonts.googleapis.com/css?family=Lato:100,300,900"); body { overflow: hidden !important; } #x-customizer-preloader { position: fixed; top: 0; left: 0; right: 0; bottom: 0; text-align: center; background-color: #fff; z-index: 9999999; } #x-customizer-preloader #x-customizer-preloader-inner { display: table; position: absolute; top: 50%; left: 50%; width: 450px; margin: -90px 0 0 -225px; background-repeat: no-repeat; background-position: center 155px; background-color: #fff; } #x-customizer-preloader p.status { display: table-cell; vertical-align: middle; position: relative; padding: 0 0 10px; font-family: Lato, "Helvetica Neue", Helvetica, Arial, sans-serif; line-height: 1.1; color: #333; } #x-customizer-preloader p.status span { position: relative; display: block; z-index: 99999999; } #x-customizer-preloader p.status span.loading { margin-left: -2px; font-size: 84px; font-weight: 100; letter-spacing: -2px; text-transform: uppercase; } #x-customizer-preloader p.status span.step { margin-top: 9px; font-size: 18px; font-weight: 300; } #x-customizer-preloader p.status > span.progress { margin-top: 9px; font-weight: 900; } #x-customizer-preloader h1.powered-by { position: absolute; left: 0; right: 0; bottom: 24px; margin-right: -6px; font-size: 14px; font-weight: 300; letter-spacing: 6px; line-height: 1.1; text-transform: uppercase; color: #b5b5b5; } </style><div id="x-customizer-preloader"><div id="x-customizer-preloader-inner"><p class="status"><span class="loading">Loading</span><span class="step">(Step 2 of 2) Initializing Live Preview</span><span class="progress"></span></p></div><h1 class="powered-by">Powered by Theme.co</h1></div>';
}

add_action( 'customize_controls_print_styles', 'x_customizer_preloader' );