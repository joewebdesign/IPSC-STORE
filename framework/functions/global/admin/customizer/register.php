<?php
 
// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/CUSTOMIZER/REGISTER.PHP
// -----------------------------------------------------------------------------
// Sets up the options to be used in the Customizer.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Register Options
//       a. Lists
//       b. Sections
//       c. Options - Stack
//       d. Options - Integrity
//       e. Options - Renew
//       f. Options - Icon
//       g. Options - Typography
//       h. Options - Buttons
//       i. Options - Header
//       j. Options - Footer
//       k. Options - Blog
//       l. Options - Portfolio
//       m. Options - WooCommerce
//       n. Options - Social
//       o. Options - Site Icons
//       p. Options - Custom
//       q. Output - Sections
//       r. Output - Settings
//       s. Output - Controls
// =============================================================================

// Register Options
// =============================================================================

function x_register_customizer_options( $wp_customize ) {

  //
  // Lists.
  //

  $list_stacks = array(
    'integrity' => __( 'Integrity', '__x__' ),
    'renew'     => __( 'Renew', '__x__' ),
    'icon'      => __( 'Icon', '__x__' )
  );

  $list_site_layouts = array(
    'full-width' => __( 'Fullwidth', '__x__' ),
    'boxed'      => __( 'Boxed', '__x__' )
  );

  $list_content_layouts = array(
    'content-sidebar' => __( 'Content Left, Sidebar Right', '__x__' ),
    'sidebar-content' => __( 'Sidebar Left, Content Right', '__x__' ),
    'full-width'      => __( 'Fullwidth', '__x__' )
  );

  $list_integrity_designs = array(
    'light' => __( 'Light', '__x__' ),
    'dark'  => __( 'Dark', '__x__' )
  );

  $list_renew_entry_icon_positions = array(
    'standard' => __( 'Standard', '__x__' ),
    'creative' => __( 'Creative', '__x__' )
  );

  $list_button_styles = array(
    'real'        => __( '3D', '__x__' ),
    'flat'        => __( 'Flat', '__x__' ),
    'transparent' => __( 'Transparent', '__x__' )
  );

  $list_button_shapes = array(
    'square'  => __( 'Square', '__x__' ),
    'rounded' => __( 'Rounded', '__x__' ),
    'pill'    => __( 'Pill', '__x__' )
  );

  $list_button_sizes = array(
    'mini'    => __( 'Mini', '__x__' ),
    'small'   => __( 'Small', '__x__' ),
    'regular' => __( 'Regular', '__x__' ),
    'large'   => __( 'Large', '__x__' ),
    'x-large' => __( 'Extra Large', '__x__' ),
    'jumbo'   => __( 'Jumbo', '__x__' )
  );

  $list_navbar_positions = array(
    'static-top'  => __( 'Static Top', '__x__' ),
    'fixed-top'   => __( 'Fixed Top', '__x__' ),
    'fixed-left'  => __( 'Fixed Left', '__x__' ),
    'fixed-right' => __( 'Fixed Right', '__x__' )
  );

  $list_logo_navigation_layouts = array(
    'inline'  => __( 'Inline', '__x__' ),
    'stacked' => __( 'Stacked', '__x__' )
  );

  $list_widget_areas = array(
    0 => __( 'None (Disables Widget Areas)', '__x__' ),
    1 => __( 'One', '__x__' ),
    2 => __( 'Two', '__x__' ),
    3 => __( 'Three', '__x__' ),
    4 => __( 'Four', '__x__' )
  );

  $list_left_right_positioning = array(
    'left'  => __( 'Left', '__x__' ),
    'right' => __( 'Right', '__x__' )
  );

  $list_blog_styles = array(
    'standard' => __( 'Standard', '__x__' ),
    'masonry'  => __( 'Masonry', '__x__' )
  );

  $list_layouts = array(
    'sidebar'    => __( 'Keep Sidebar', '__x__' ),
    'full-width' => __( 'Fullwidth', '__x__' )
  );

  $list_masonry_columns = array(
    2 => __( 'Two', '__x__' ),
    3 => __( 'Three', '__x__' )
  );

  $list_shop_columns = array(
    1 => __( 'One', '__x__' ),
    2 => __( 'Two', '__x__' ),
    3 => __( 'Three', '__x__' ),
    4 => __( 'Four', '__x__' )
  );

  $list_sizing_site_max_width = array(
    'min'  => '500',
    'max'  => '1500',
    'step' => '10'
  );

  $list_sizing_site_width = array(
    'min'  => '72',
    'max'  => '90',
    'step' => '1'
  );

  $list_sizing_content_width = array(
    'min'  => '60',
    'max'  => '74',
    'step' => '1'
  );

  $list_sizing_sidebar_width = array(
    'min'  => '150',
    'max'  => '350',
    'step' => '10'
  );

  $list_fonts            = x_font_data_families();
  $list_font_weights     = x_font_data_family_weights();
  $list_all_font_weights = x_font_data_all_weights();


  //
  // Sections.
  //

  $x['sec'][] = array( 'x_customizer_section_global_styles',             __( 'Stack', '__x__' ),      1  );
  $x['sec'][] = array( 'x_customizer_section_integrity_styles',          __( 'Integrity', '__x__' ),  2  );
  $x['sec'][] = array( 'x_customizer_section_renew_styles',              __( 'Renew', '__x__' ),      3  );
  $x['sec'][] = array( 'x_customizer_section_icon_styles',               __( 'Icon', '__x__' ),       4  );
  $x['sec'][] = array( 'x_customizer_section_typography',                __( 'Typography', '__x__' ), 5  );
  $x['sec'][] = array( 'x_customizer_section_buttons',                   __( 'Buttons', '__x__' ),    6  );
  $x['sec'][] = array( 'x_customizer_section_header',                    __( 'Header', '__x__' ),     7  );
  $x['sec'][] = array( 'x_customizer_section_footer',                    __( 'Footer', '__x__' ),     8  );
  $x['sec'][] = array( 'x_customizer_section_blog',                      __( 'Blog', '__x__' ),       9  );
  $x['sec'][] = array( 'x_customizer_section_portfolio',                 __( 'Portfolio', '__x__' ),  10 );
  $x['sec'][] = array( 'x_customizer_section_social',                    __( 'Social', '__x__' ),     12 );
  $x['sec'][] = array( 'x_customizer_section_icons',                     __( 'Site Icons', '__x__' ), 13 );
  $x['sec'][] = array( 'x_customizer_section_custom_styles_and_scripts', __( 'Custom', '__x__' ),     14 );

  if ( class_exists( 'WC_API' ) ) {
    $x['sec'][] = array( 'x_customizer_section_woocommerce', __( 'WooCommerce', '__x__' ), 11 );
  }


  //
  // Options - Stack.
  //

  $x['set'][] = array( 'x_stack_description_overview', NULL, 'postMessage' );
  $x['con'][] = array( 'x_stack_description_overview', 10, 'description', __( 'Select the Stack you would like to use and wait a brief moment to view it in the preview area to the right. Each Stack functions like a unique WordPress theme, and thus comes with its own set of options, features, layouts, and more.', '__x__' ), 'x_customizer_section_global_styles' );

      $x['set'][] = array( 'x_stack', 'integrity', 'refresh' );
      $x['con'][] = array( 'x_stack', 20, 'radio', __( 'Select', '__x__' ), $list_stacks, 'x_customizer_section_global_styles' );


  //
  // Options - Integrity.
  //

  $x['set'][] = array( 'x_integrity_description_overview', NULL, 'postMessage' );
  $x['con'][] = array( 'x_integrity_description_overview', 10, 'description', __( 'Integrity is a beautiful design geared towards businesses and individuals desiring a site with a more traditional layout, yet with plenty of modern touches.', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_layout_site', 'full-width', 'refresh' );
      $x['con'][] = array( 'x_integrity_layout_site', 20, 'radio', __( 'Site Layout', '__x__' ), $list_site_layouts, 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_sizing_site_max_width', '1200', 'postMessage' );
      $x['con'][] = array( 'x_integrity_sizing_site_max_width', 30, 'slider', __( 'Site Max Width (px)', '__x__' ), $list_sizing_site_max_width, 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_sizing_site_width', '88', 'postMessage' );
      $x['con'][] = array( 'x_integrity_sizing_site_width', 40, 'slider', __( 'Site Width (%)', '__x__' ), $list_sizing_site_width, 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_layout_content', 'content-sidebar', 'refresh' );
      $x['con'][] = array( 'x_integrity_layout_content', 50, 'radio', __( 'Content Layout', '__x__' ), $list_content_layouts, 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_sizing_content_width', '72', 'postMessage' );
      $x['con'][] = array( 'x_integrity_sizing_content_width', 60, 'slider', __( 'Content Width (%)', '__x__' ), $list_sizing_content_width, 'x_customizer_section_integrity_styles' );

  $x['set'][] = array( 'x_integrity_sub_title_design_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_integrity_sub_title_design_options', 70, 'sub-title', __( 'Design Options', '__x__' ), 'x_customizer_section_integrity_styles' );

  $x['set'][] = array( 'x_integrity_description_design_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_integrity_description_design_options', 80, 'description', __( 'The greatness of Integrity\'s design is in its simplicity. The look and feel of your site will change dramatically based on the choices selected for a couple options.', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_design', 'light', 'refresh' );
      $x['con'][] = array( 'x_integrity_design', 90, 'radio', __( 'Design', '__x__' ), $list_integrity_designs, 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_topbar_transparency_enable', 0, 'refresh' );
      $x['con'][] = array( 'x_integrity_topbar_transparency_enable', 100, 'checkbox', __( 'Enable Topbar Transparency', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_navbar_transparency_enable', 0, 'refresh' );
      $x['con'][] = array( 'x_integrity_navbar_transparency_enable', 110, 'checkbox', __( 'Enable Navbar Transparency', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_footer_transparency_enable', 0, 'refresh' );
      $x['con'][] = array( 'x_integrity_footer_transparency_enable', 120, 'checkbox', __( 'Enable Footer Transparency', '__x__' ), 'x_customizer_section_integrity_styles' );

  $x['set'][] = array( 'x_integrity_sub_title_background_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_integrity_sub_title_background_options', 130, 'sub-title', __( 'Background Options', '__x__' ), 'x_customizer_section_integrity_styles' );

  $x['set'][] = array( 'x_integrity_description_background_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_integrity_description_background_options', 140, 'description', __( 'The "Background Pattern" setting will override the "Background Color" unless the image used is transparent, and the "Background Image" option will take precedence over both. The "Background Image Fade (ms)" option allows you to set a time in milliseconds for your image to fade in. To disable this feature, set the value to "0."', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_light_bg_color', '#f3f3f3', 'postMessage' );
      $x['con'][] = array( 'x_integrity_light_bg_color', 150, 'color', __( 'Background Color', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_light_bg_image_pattern', NULL, 'refresh' );
      $x['con'][] = array( 'x_integrity_light_bg_image_pattern', 160, 'image', __( 'Background Pattern', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_light_bg_image_full', NULL, 'refresh' );
      $x['con'][] = array( 'x_integrity_light_bg_image_full', 170, 'image', __( 'Background Image', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_light_bg_image_full_fade', '750', 'refresh' );
      $x['con'][] = array( 'x_integrity_light_bg_image_full_fade', 180, 'text', __( 'Background Image Fade (ms)', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_dark_bg_color', '#1c1c1c', 'postMessage' );
      $x['con'][] = array( 'x_integrity_dark_bg_color', 190, 'color', __( 'Background Color', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_dark_bg_image_pattern', NULL, 'refresh' );
      $x['con'][] = array( 'x_integrity_dark_bg_image_pattern', 200, 'image', __( 'Background Pattern', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_dark_bg_image_full', NULL, 'refresh' );
      $x['con'][] = array( 'x_integrity_dark_bg_image_full', 210, 'image', __( 'Background Image', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_dark_bg_image_full_fade', '750', 'refresh' );
      $x['con'][] = array( 'x_integrity_dark_bg_image_full_fade', 220, 'text', __( 'Background Image Fade (ms)', '__x__' ), 'x_customizer_section_integrity_styles' );

  $x['set'][] = array( 'x_integrity_sub_title_blog_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_integrity_sub_title_blog_options', 230, 'sub-title', __( 'Blog Options', '__x__' ), 'x_customizer_section_integrity_styles' );

  $x['set'][] = array( 'x_integrity_description_blog_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_integrity_description_blog_options', 240, 'description', __( 'Enabling the blog header will turn on the area above your posts on the index page that contains your title and subtitle. Disabling it will result in more content being visible above the fold.', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_blog_header_enable', 1, 'refresh' );
      $x['con'][] = array( 'x_integrity_blog_header_enable', 250, 'checkbox', __( 'Enable Blog Header', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_blog_title', 'The Blog', 'postMessage' );
      $x['con'][] = array( 'x_integrity_blog_title', 260, 'text', __( 'Blog Title', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_blog_subtitle', 'Welcome to our little corner of the Internet. Kick your feet up and stay a while.', 'postMessage' );
      $x['con'][] = array( 'x_integrity_blog_subtitle', 270, 'text', __( 'Blog Subtitle', '__x__' ), 'x_customizer_section_integrity_styles' );

  $x['set'][] = array( 'x_integrity_sub_title_portfolio_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_integrity_sub_title_portfolio_options', 280, 'sub-title', __( 'Portfolio Options', '__x__' ), 'x_customizer_section_integrity_styles' );

  $x['set'][] = array( 'x_integrity_description_portfolio_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_integrity_description_portfolio_options', 290, 'description', __( 'Enabling portfolio index sharing will turn on social sharing links for each post on the portfolio index page. Activate and deactivate individual sharing links underneath the main Portfolio section.', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_portfolio_archive_sort_button_text', 'Sort Portfolio', 'postMessage' );
      $x['con'][] = array( 'x_integrity_portfolio_archive_sort_button_text', 300, 'text', __( 'Sort Button Text', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_portfolio_archive_post_sharing_enable', 0, 'refresh' );
      $x['con'][] = array( 'x_integrity_portfolio_archive_post_sharing_enable', 310, 'checkbox', __( 'Enable Portfolio Index Sharing', '__x__' ), 'x_customizer_section_integrity_styles' );

  if ( class_exists( 'WC_API' ) ) {

  $x['set'][] = array( 'x_integrity_sub_title_shop_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_integrity_sub_title_shop_options', 320, 'sub-title', __( 'Shop Options', '__x__' ), 'x_customizer_section_integrity_styles' );

  $x['set'][] = array( 'x_integrity_description_shop_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_integrity_description_shop_options', 330, 'description', __( 'Enabling the shop header will turn on the area above your posts on the index page that contains your title and subtitle. Disabling it will result in more content being visible above the fold.', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_shop_header_enable', 1, 'refresh' );
      $x['con'][] = array( 'x_integrity_shop_header_enable', 340, 'checkbox', __( 'Enable Shop Header', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_shop_title', 'The Shop', 'postMessage' );
      $x['con'][] = array( 'x_integrity_shop_title', 350, 'text', __( 'Shop Title', '__x__' ), 'x_customizer_section_integrity_styles' );

      $x['set'][] = array( 'x_integrity_shop_subtitle', 'Welcome to our online store. Take some time to browse through our items.', 'postMessage' );
      $x['con'][] = array( 'x_integrity_shop_subtitle', 360, 'text', __( 'Shop Subtitle', '__x__' ), 'x_customizer_section_integrity_styles' );

  }


  //
  // Options - Renew.
  //

  $x['set'][] = array( 'x_renew_description_overview', NULL, 'postMessage' );
  $x['con'][] = array( 'x_renew_description_overview', 10, 'description', __( 'Renew features a gorgeous look and feel that lends a clean, modern look to your site. All of your content will take center stage with Renew in place.', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_layout_site', 'full-width', 'refresh' );
      $x['con'][] = array( 'x_renew_layout_site', 20, 'radio', __( 'Site Layout', '__x__' ), $list_site_layouts, 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_sizing_site_max_width', '1200', 'postMessage' );
      $x['con'][] = array( 'x_renew_sizing_site_max_width', 30, 'slider', __( 'Site Max Width (px)', '__x__' ), $list_sizing_site_max_width, 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_sizing_site_width', '88', 'postMessage' );
      $x['con'][] = array( 'x_renew_sizing_site_width', 40, 'slider', __( 'Site Width (%)', '__x__' ), $list_sizing_site_width, 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_layout_content', 'content-sidebar', 'refresh' );
      $x['con'][] = array( 'x_renew_layout_content', 50, 'radio', __( 'Content Layout', '__x__' ), $list_content_layouts, 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_sizing_content_width', '72', 'postMessage' );
      $x['con'][] = array( 'x_renew_sizing_content_width', 60, 'slider', __( 'Content Width (%)', '__x__' ), $list_sizing_content_width, 'x_customizer_section_renew_styles' );

  $x['set'][] = array( 'x_renew_sub_title_design_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_renew_sub_title_design_options', 70, 'sub-title', __( 'Design Options', '__x__' ), 'x_customizer_section_renew_styles' );

  $x['set'][] = array( 'x_renew_description_design_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_renew_description_design_options', 80, 'description', __( 'Renew\'s flat design is built around a simple interface and bold colors. Use your palette to set the colors for some main structural elements of your site below.', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_topbar_background', '#1f2c39', 'refresh' );
      $x['con'][] = array( 'x_renew_topbar_background', 90, 'color', __( 'Topbar Background', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_logobar_background', '#2c3e50', 'refresh' );
      $x['con'][] = array( 'x_renew_logobar_background', 100, 'color', __( 'Logobar Background', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_navbar_background', '#2c3e50', 'refresh' );
      $x['con'][] = array( 'x_renew_navbar_background', 110, 'color', __( 'Navbar Background', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_navbar_button_color', '#ffffff', 'refresh' );
      $x['con'][] = array( 'x_renew_navbar_button_color', 120, 'color', __( 'Mobile Button Color', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_navbar_button_background', '#3e5771', 'refresh' );
      $x['con'][] = array( 'x_renew_navbar_button_background', 130, 'color', __( 'Mobile Button Background', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_navbar_button_background_hover', '#476481', 'refresh' );
      $x['con'][] = array( 'x_renew_navbar_button_background_hover', 140, 'color', __( 'Mobile Button Background Hover', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_footer_background', '#2c3e50', 'refresh' );
      $x['con'][] = array( 'x_renew_footer_background', 150, 'color', __( 'Footer Background', '__x__' ), 'x_customizer_section_renew_styles' );

  $x['set'][] = array( 'x_renew_sub_title_background_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_renew_sub_title_background_options', 160, 'sub-title', __( 'Background Options', '__x__' ), 'x_customizer_section_renew_styles' );

  $x['set'][] = array( 'x_renew_description_background_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_renew_description_background_options', 170, 'description', __( 'The "Background Pattern" setting will override the "Background Color" unless the image used is transparent, and the "Background Image" option will take precedence over both. The "Background Image Fade (ms)" option allows you to set a time in milliseconds for your image to fade in. To disable this feature, set the value to "0."', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_bg_color', '#f5f5f5', 'postMessage' );
      $x['con'][] = array( 'x_renew_bg_color', 180, 'color', __( 'Background Color', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_bg_image_pattern', NULL, 'refresh' );
      $x['con'][] = array( 'x_renew_bg_image_pattern', 190, 'image', __( 'Background Pattern', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_bg_image_full', NULL, 'refresh' );
      $x['con'][] = array( 'x_renew_bg_image_full', 200, 'image', __( 'Background Image', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_bg_image_full_fade', '750', 'refresh' );
      $x['con'][] = array( 'x_renew_bg_image_full_fade', 210, 'text', __( 'Background Image Fade (ms)', '__x__' ), 'x_customizer_section_renew_styles' );

  $x['set'][] = array( 'x_renew_sub_title_typography_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_renew_sub_title_typography_options', 220, 'sub-title', __( 'Typography Options', '__x__' ), 'x_customizer_section_renew_styles' );

  $x['set'][] = array( 'x_renew_description_typography_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_renew_description_typography_options', 230, 'description', __( 'Here you can set the colors for your topbar and footer. Get creative, the possibilities are endless.', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_topbar_text_color', '#ffffff', 'refresh' );
      $x['con'][] = array( 'x_renew_topbar_text_color', 240, 'color', __( 'Topbar Links and Text', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_topbar_link_color_hover', '#959baf', 'refresh' );
      $x['con'][] = array( 'x_renew_topbar_link_color_hover', 250, 'color', __( 'Topbar Links Hover', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_footer_text_color', '#ffffff', 'refresh' );
      $x['con'][] = array( 'x_renew_footer_text_color', 260, 'color', __( 'Footer Links and Text', '__x__' ), 'x_customizer_section_renew_styles' );

  $x['set'][] = array( 'x_renew_sub_title_blog_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_renew_sub_title_blog_options', 270, 'sub-title', __( 'Blog Options', '__x__' ), 'x_customizer_section_renew_styles' );

  $x['set'][] = array( 'x_renew_description_blog_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_renew_description_blog_options', 280, 'description', __( 'The entry icon color is for the post icons to the left of each title. Selecting "Creative" under the "Entry Icon Position" setting will allow you to align your entry icons in a different manner on your posts index page when "Content Left, Sidebar Right" or "Fullwidth" are selected as your "Content Layout" and when your blog "Style" is set to "Standard." This feature is intended to be paired with a "Boxed" layout.', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_blog_title', 'The Blog', 'postMessage' );
      $x['con'][] = array( 'x_renew_blog_title', 290, 'text', __( 'Blog Title', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_entry_icon_color', '#dddddd', 'refresh' );
      $x['con'][] = array( 'x_renew_entry_icon_color', 300, 'color', __( 'Entry Icons', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_entry_icon_position', 'standard', 'refresh' );
      $x['con'][] = array( 'x_renew_entry_icon_position', 310, 'radio', __( 'Entry Icon Position', '__x__' ), $list_renew_entry_icon_positions, 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_entry_icon_position_horizontal', '18', 'refresh' );
      $x['con'][] = array( 'x_renew_entry_icon_position_horizontal', 320, 'text', __( 'Entry Icon Horizontal Alignment (%)', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_entry_icon_position_vertical', '25', 'refresh' );
      $x['con'][] = array( 'x_renew_entry_icon_position_vertical', 330, 'text', __( 'Entry Icon Vertical Alignment (px)', '__x__' ), 'x_customizer_section_renew_styles' );

  if ( class_exists( 'WC_API' ) ) {

  $x['set'][] = array( 'x_renew_sub_title_shop_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_renew_sub_title_shop_options', 340, 'sub-title', __( 'Shop Options', '__x__' ), 'x_customizer_section_renew_styles' );

  $x['set'][] = array( 'x_renew_description_shop_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_renew_description_shop_options', 350, 'description', __( 'Provide a title you would like to use for your shop. This will show up on the index page as well as in your breadcrumbs.', '__x__' ), 'x_customizer_section_renew_styles' );

      $x['set'][] = array( 'x_renew_shop_title', 'The Shop', 'postMessage' );
      $x['con'][] = array( 'x_renew_shop_title', 360, 'text', __( 'Shop Title', '__x__' ), 'x_customizer_section_renew_styles' );

  }


  //
  // Options - Icon.
  //

  $x['set'][] = array( 'x_icon_description_overview', NULL, 'postMessage' );
  $x['con'][] = array( 'x_icon_description_overview', 10, 'description', __( 'Icon features a stunning, modern, fullscreen design with a unique fixed sidebar layout that scolls with users on larger screens as you move down the page. The end result is attractive, app-like, and intuitive.', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_layout_site', 'full-width', 'refresh' );
      $x['con'][] = array( 'x_icon_layout_site', 20, 'radio', __( 'Site Layout', '__x__' ), $list_site_layouts, 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_sizing_site_max_width', '1200', 'postMessage' );
      $x['con'][] = array( 'x_icon_sizing_site_max_width', 30, 'slider', __( 'Site Max Width (px)', '__x__' ), $list_sizing_site_max_width, 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_sizing_site_width', '88', 'postMessage' );
      $x['con'][] = array( 'x_icon_sizing_site_width', 40, 'slider', __( 'Site Width (%)', '__x__' ), $list_sizing_site_width, 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_layout_content', 'content-sidebar', 'refresh' );
      $x['con'][] = array( 'x_icon_layout_content', 50, 'radio', __( 'Content Layout', '__x__' ), $list_content_layouts, 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_sidebar_width', '250', 'refresh' );
      $x['con'][] = array( 'x_icon_sidebar_width', 60, 'text', __( 'Set Sidebar Width (px)', '__x__' ), 'x_customizer_section_icon_styles' );

      // $x['set'][] = array( 'x_icon_sidebar_width', '250', 'postMessage' );
      // $x['con'][] = array( 'x_icon_sidebar_width', 60, 'slider', __( 'Set Sidebar Width (px)', '__x__' ), $list_sizing_sidebar_width, 'x_customizer_section_icon_styles' );

  $x['set'][] = array( 'x_icon_sub_title_background_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_icon_sub_title_background_options', 70, 'sub-title', __( 'Background Options', '__x__' ), 'x_customizer_section_icon_styles' );

  $x['set'][] = array( 'x_icon_description_background_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_icon_description_background_options', 80, 'description', __( 'The "Background Pattern" setting will override the "Background Color" unless the image used is transparent, and the "Background Image" option will take precedence over both. The "Background Image Fade (ms)" option allows you to set a time in milliseconds for your image to fade in. To disable this feature, set the value to "0."', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_bg_color', '#ffffff', 'postMessage' );
      $x['con'][] = array( 'x_icon_bg_color', 90, 'color', __( 'Background Color', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_bg_image_pattern', NULL, 'refresh' );
      $x['con'][] = array( 'x_icon_bg_image_pattern', 100, 'image', __( 'Background Pattern', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_bg_image_full', NULL, 'refresh' );
      $x['con'][] = array( 'x_icon_bg_image_full', 110, 'image', __( 'Background Image', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_bg_image_full_fade', '750', 'refresh' );
      $x['con'][] = array( 'x_icon_bg_image_full_fade', 120, 'text', __( 'Background Image Fade (ms)', '__x__' ), 'x_customizer_section_icon_styles' );

  $x['set'][] = array( 'x_icon_sub_title_blog_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_icon_sub_title_blog_options', 130, 'sub-title', __( 'Blog Options', '__x__' ), 'x_customizer_section_icon_styles' );

  $x['set'][] = array( 'x_icon_description_blog_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_icon_description_blog_options', 140, 'description', __( 'Set unique colors for each blog post type if you so desire. You can enable or disable any combination of colors you want to fit your design style.', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_standard_colors_enable', 0, 'refresh' );
      $x['con'][] = array( 'x_icon_post_standard_colors_enable', 150, 'checkbox', __( 'Enable Standard Post Custom Colors', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_standard_color', '#d1f2eb', 'refresh' );
      $x['con'][] = array( 'x_icon_post_standard_color', 160, 'color', __( 'Standard Post Text', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_standard_background', '#16a085', 'refresh' );
      $x['con'][] = array( 'x_icon_post_standard_background', 170, 'color', __( 'Standard Post Background', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_image_colors_enable', 0, 'refresh' );
      $x['con'][] = array( 'x_icon_post_image_colors_enable', 180, 'checkbox', __( 'Enable Image Post Custom Colors', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_image_color', '#d1eedd', 'refresh' );
      $x['con'][] = array( 'x_icon_post_image_color', 190, 'color', __( 'Image Post Text', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_image_background', '#27ae60', 'refresh' );
      $x['con'][] = array( 'x_icon_post_image_background', 200, 'color', __( 'Image Post Background', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_gallery_colors_enable', 0, 'refresh' );
      $x['con'][] = array( 'x_icon_post_gallery_colors_enable', 210, 'checkbox', __( 'Enable Gallery Post Custom Colors', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_gallery_color', '#d1eedd', 'refresh' );
      $x['con'][] = array( 'x_icon_post_gallery_color', 220, 'color', __( 'Gallery Post Text', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_gallery_background', '#27ae60', 'refresh' );
      $x['con'][] = array( 'x_icon_post_gallery_background', 230, 'color', __( 'Gallery Post Background', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_video_colors_enable', 0, 'refresh' );
      $x['con'][] = array( 'x_icon_post_video_colors_enable', 240, 'checkbox', __( 'Enable Video Post Custom Colors', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_video_color', '#e9daef', 'refresh' );
      $x['con'][] = array( 'x_icon_post_video_color', 250, 'color', __( 'Video Post Text', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_video_background', '#8e44ad', 'refresh' );
      $x['con'][] = array( 'x_icon_post_video_background', 260, 'color', __( 'Video Post Background', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_audio_colors_enable', 0, 'refresh' );
      $x['con'][] = array( 'x_icon_post_audio_colors_enable', 270, 'checkbox', __( 'Enable Audio Post Custom Colors', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_audio_color', '#cfd4d9', 'refresh' );
      $x['con'][] = array( 'x_icon_post_audio_color', 280, 'color', __( 'Audio Post Text', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_audio_background', '#2c3e50', 'refresh' );
      $x['con'][] = array( 'x_icon_post_audio_background', 290, 'color', __( 'Audio Post Background', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_quote_colors_enable', 0, 'refresh' );
      $x['con'][] = array( 'x_icon_post_quote_colors_enable', 300, 'checkbox', __( 'Enable Quote Post Custom Colors', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_quote_color', '#fcf2c8', 'refresh' );
      $x['con'][] = array( 'x_icon_post_quote_color', 310, 'color', __( 'Quote Post Text', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_quote_background', '#f1c40f', 'refresh' );
      $x['con'][] = array( 'x_icon_post_quote_background', 320, 'color', __( 'Quote Post Background', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_link_colors_enable', 0, 'refresh' );
      $x['con'][] = array( 'x_icon_post_link_colors_enable', 330, 'checkbox', __( 'Enable Link Post Custom Colors', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_link_color', '#f9d0cc', 'refresh' );
      $x['con'][] = array( 'x_icon_post_link_color', 340, 'color', __( 'Link Post Text', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_post_link_background', '#c0392b', 'refresh' );
      $x['con'][] = array( 'x_icon_post_link_background', 350, 'color', __( 'Link Post Background', '__x__' ), 'x_customizer_section_icon_styles' );

  if ( class_exists( 'WC_API' ) ) {

  $x['set'][] = array( 'x_icon_sub_title_shop_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_icon_sub_title_shop_options', 360, 'sub-title', __( 'Shop Options', '__x__' ), 'x_customizer_section_icon_styles' );

  $x['set'][] = array( 'x_icon_description_blog_options', NULL, 'postMessage' );
  $x['con'][] = array( 'x_icon_description_blog_options', 370, 'description', __( 'Provide a title you would like to use for your shop. This will show up on the index page as well as in your breadcrumbs.', '__x__' ), 'x_customizer_section_icon_styles' );

      $x['set'][] = array( 'x_icon_shop_title', 'The Shop', 'postMessage' );
      $x['con'][] = array( 'x_icon_shop_title', 380, 'text', __( 'Shop Title', '__x__' ), 'x_customizer_section_icon_styles' );

  }


  //
  // Options - Typography.
  //

  $x['set'][] = array( 'x_list_font_weights', $list_font_weights, 'postMessage' );

  $x['set'][] = array( 'x_typography_description_overview', NULL, 'postMessage' );
  $x['con'][] = array( 'x_typography_description_overview', 10, 'description', __( 'X provides you with full control over your site\'s typography. Remember to check the box for "Enable Custom Fonts" to set your own individual fonts for headings, body copy, et cetera.', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_custom_fonts', 0, 'refresh' );
      $x['con'][] = array( 'x_custom_fonts', 20, 'checkbox', __( 'Enable Custom Fonts', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_custom_font_subsets', 0, 'refresh' );
      $x['con'][] = array( 'x_custom_font_subsets', 30, 'checkbox', __( 'Enable Subsets', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_custom_font_subset_cyrillic', 0, 'refresh' );
      $x['con'][] = array( 'x_custom_font_subset_cyrillic', 40, 'checkbox', __( 'Cyrillic', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_custom_font_subset_greek', 0, 'refresh' );
      $x['con'][] = array( 'x_custom_font_subset_greek', 50, 'checkbox', __( 'Greek', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_custom_font_subset_vietnamese', 0, 'refresh' );
      $x['con'][] = array( 'x_custom_font_subset_vietnamese', 60, 'checkbox', __( 'Vietnamese', '__x__' ), 'x_customizer_section_typography' );

  $x['set'][] = array( 'x_typography_sub_title_logo', NULL, 'postMessage' );
  $x['con'][] = array( 'x_typography_sub_title_logo', 70, 'sub-title', __( 'Logo', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_logo_font_family', 'Lato', 'refresh' );
      $x['con'][] = array( 'x_logo_font_family', 80, 'select', __( 'Logo Font', '__x__' ), $list_fonts, 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_logo_font_color_enable', 0, 'refresh' );
      $x['con'][] = array( 'x_logo_font_color_enable', 90, 'checkbox', __( 'Enable Logo Font Color', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_logo_font_color', '#999999', 'refresh' );
      $x['con'][] = array( 'x_logo_font_color', 100, 'color', __( 'Logo Font Color', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_logo_font_size', '54', 'refresh' );
      $x['con'][] = array( 'x_logo_font_size', 110, 'text', __( 'Logo Font Size (px)', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_logo_font_weight', '400', 'refresh' );
      $x['con'][] = array( 'x_logo_font_weight', 120, 'radio', __( 'Logo Font Weight', '__x__' ), $list_all_font_weights, 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_logo_letter_spacing', '-3', 'refresh' );
      $x['con'][] = array( 'x_logo_letter_spacing', 130, 'text', __( 'Logo Letter Spacing (px)', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_logo_uppercase_enable', 0, 'refresh' );
      $x['con'][] = array( 'x_logo_uppercase_enable', 140, 'checkbox', __( 'Enable Uppercase', '__x__' ), 'x_customizer_section_typography' );

  $x['set'][] = array( 'x_typography_sub_title_navbar', NULL, 'postMessage' );
  $x['con'][] = array( 'x_typography_sub_title_navbar', 150, 'sub-title', __( 'Navbar', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_navbar_font_family', 'Lato', 'refresh' );
      $x['con'][] = array( 'x_navbar_font_family', 160, 'select', __( 'Navbar Font', '__x__' ), $list_fonts, 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_navbar_link_color', '#b7b7b7', 'refresh' );
      $x['con'][] = array( 'x_navbar_link_color', 170, 'color', __( 'Navbar Links', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_navbar_link_color_hover', '#272727', 'refresh' );
      $x['con'][] = array( 'x_navbar_link_color_hover', 180, 'color', __( 'Navbar Links Hover', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_navbar_font_size', '12', 'refresh' );
      $x['con'][] = array( 'x_navbar_font_size', 190, 'text', __( 'Navbar Font Size (px)', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_navbar_font_weight', '400', 'refresh' );
      $x['con'][] = array( 'x_navbar_font_weight', 200, 'radio', __( 'Navbar Font Weight', '__x__' ), $list_all_font_weights, 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_navbar_uppercase_enable', 0, 'refresh' );
      $x['con'][] = array( 'x_navbar_uppercase_enable', 210, 'checkbox', __( 'Enable Uppercase', '__x__' ), 'x_customizer_section_typography' );

  $x['set'][] = array( 'x_typography_sub_title_headings', NULL, 'postMessage' );
  $x['con'][] = array( 'x_typography_sub_title_headings', 220, 'sub-title', __( 'Headings', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_headings_font_family', 'Lato', 'refresh' );
      $x['con'][] = array( 'x_headings_font_family', 230, 'select', __( 'Headings Font', '__x__' ), $list_fonts, 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_headings_font_color_enable', 0, 'refresh' );
      $x['con'][] = array( 'x_headings_font_color_enable', 240, 'checkbox', __( 'Enable Headings Font Color', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_headings_font_color', '#999999', 'refresh' );
      $x['con'][] = array( 'x_headings_font_color', 250, 'color', __( 'Headings Font Color', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_headings_font_weight', '400', 'refresh' );
      $x['con'][] = array( 'x_headings_font_weight', 260, 'radio', __( 'Headings Font Weight', '__x__' ), $list_all_font_weights, 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_headings_letter_spacing', '-1', 'refresh' );
      $x['con'][] = array( 'x_headings_letter_spacing', 270, 'text', __( 'Headings Letter Spacing (px)', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_headings_uppercase_enable', 0, 'refresh' );
      $x['con'][] = array( 'x_headings_uppercase_enable', 280, 'checkbox', __( 'Enable Uppercase', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_headings_widget_icons_enable', 0, 'refresh' );
      $x['con'][] = array( 'x_headings_widget_icons_enable', 290, 'checkbox', __( 'Enable Widget Icons', '__x__' ), 'x_customizer_section_typography' );

  $x['set'][] = array( 'x_typography_sub_title_body_content', NULL, 'postMessage' );
  $x['con'][] = array( 'x_typography_sub_title_body_content', 300, 'sub-title', __( 'Body and Content', '__x__' ), 'x_customizer_section_typography' );

  $x['set'][] = array( 'x_typography_description_body_content', NULL, 'postMessage' );
  $x['con'][] = array( 'x_typography_description_body_content', 310, 'description', __( '"Body Font Size (px)" will affect the sizing of all copy outside of a post or page content area. "Content Font Size (px)" will affect the sizing of all copy inside a post or page content area. Headings are set with percentages and sized proportionally to these settings.', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_body_font_family', 'Lato', 'refresh' );
      $x['con'][] = array( 'x_body_font_family', 320, 'select', __( 'Body Font', '__x__' ), $list_fonts, 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_body_font_color_enable', 0, 'refresh' );
      $x['con'][] = array( 'x_body_font_color_enable', 330, 'checkbox', __( 'Enable Body Font Color', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_body_font_color', '#999999', 'refresh' );
      $x['con'][] = array( 'x_body_font_color', 340, 'color', __( 'Body Font Color', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_body_font_size', '14', 'refresh' );
      $x['con'][] = array( 'x_body_font_size', 350, 'text', __( 'Body Font Size (px)', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_content_font_size', '14', 'refresh' );
      $x['con'][] = array( 'x_content_font_size', 360, 'text', __( 'Content Font Size (px)', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_body_font_weight', '400', 'refresh' );
      $x['con'][] = array( 'x_body_font_weight', 370, 'radio', __( 'Body Font Weight', '__x__' ), $list_all_font_weights, 'x_customizer_section_typography' );

  $x['set'][] = array( 'x_typography_sub_title_site_links', NULL, 'postMessage' );
  $x['con'][] = array( 'x_typography_sub_title_site_links', 380, 'sub-title', __( 'Site Links', '__x__' ), 'x_customizer_section_typography' );

  $x['set'][] = array( 'x_typography_description_site_links', NULL, 'postMessage' );
  $x['con'][] = array( 'x_typography_description_site_links', 390, 'description', __( 'Site link colors are also used as accents for various elements throughout your site, so make sure to select something you really enjoy and keep an eye out for how it affects your design.', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_site_link_color', '#ff2a13', 'refresh' );
      $x['con'][] = array( 'x_site_link_color', 400, 'color', __( 'Site Links', '__x__' ), 'x_customizer_section_typography' );

      $x['set'][] = array( 'x_site_link_color_hover', '#d80f0f', 'refresh' );
      $x['con'][] = array( 'x_site_link_color_hover', 410, 'color', __( 'Site Links Hover', '__x__' ), 'x_customizer_section_typography' );


  //
  // Options - Buttons.
  //

  $x['set'][] = array( 'x_buttons_description_overview', NULL, 'postMessage' );
  $x['con'][] = array( 'x_buttons_description_overview', 10, 'description', __( 'Retina ready, limitless colors, and multiple shapes. The buttons available in X are fun to use, simple to implement, and look great on all devices no matter the size.', '__x__' ), 'x_customizer_section_buttons' );

      $x['set'][] = array( 'x_button_style', 'real', 'refresh' );
      $x['con'][] = array( 'x_button_style', 20, 'radio', __( 'Button Style', '__x__' ), $list_button_styles, 'x_customizer_section_buttons' );

      $x['set'][] = array( 'x_button_shape', 'rounded', 'refresh' );
      $x['con'][] = array( 'x_button_shape', 30, 'radio', __( 'Button Shape', '__x__' ), $list_button_shapes, 'x_customizer_section_buttons' );

      $x['set'][] = array( 'x_button_size', 'real', 'refresh' );
      $x['con'][] = array( 'x_button_size', 40, 'radio', __( 'Button Size', '__x__' ), $list_button_sizes, 'x_customizer_section_buttons' );

  $x['set'][] = array( 'x_button_sub_title_colors', NULL, 'postMessage' );
  $x['con'][] = array( 'x_button_sub_title_colors', 50, 'sub-title', __( 'Colors', '__x__' ), 'x_customizer_section_buttons' );

      $x['set'][] = array( 'x_button_color', '#ffffff', 'postMessage' );
      $x['con'][] = array( 'x_button_color', 60, 'color', __( 'Button Text', '__x__' ), 'x_customizer_section_buttons' );

      $x['set'][] = array( 'x_button_background_color', '#ff2a13', 'postMessage' );
      $x['con'][] = array( 'x_button_background_color', 70, 'color', __( 'Button Background', '__x__' ), 'x_customizer_section_buttons' );

      $x['set'][] = array( 'x_button_border_color', '#ac1100', 'postMessage' );
      $x['con'][] = array( 'x_button_border_color', 80, 'color', __( 'Button Border', '__x__' ), 'x_customizer_section_buttons' );

      $x['set'][] = array( 'x_button_bottom_color', '#a71000', 'postMessage' );
      $x['con'][] = array( 'x_button_bottom_color', 90, 'color', __( 'Button Bottom', '__x__' ), 'x_customizer_section_buttons' );

  $x['set'][] = array( 'x_button_sub_title_hover_colors', NULL, 'postMessage' );
  $x['con'][] = array( 'x_button_sub_title_hover_colors', 100, 'sub-title', __( 'Hover Colors', '__x__' ), 'x_customizer_section_buttons' );

      $x['set'][] = array( 'x_button_color_hover', '#ffffff', 'refresh' );
      $x['con'][] = array( 'x_button_color_hover', 110, 'color', __( 'Button Text', '__x__' ), 'x_customizer_section_buttons' );

      $x['set'][] = array( 'x_button_background_color_hover', '#ef2201', 'refresh' );
      $x['con'][] = array( 'x_button_background_color_hover', 120, 'color', __( 'Button Background', '__x__' ), 'x_customizer_section_buttons' );

      $x['set'][] = array( 'x_button_border_color_hover', '#600900', 'refresh' );
      $x['con'][] = array( 'x_button_border_color_hover', 130, 'color', __( 'Button Border', '__x__' ), 'x_customizer_section_buttons' );

      $x['set'][] = array( 'x_button_bottom_color_hover', '#a71000', 'refresh' );
      $x['con'][] = array( 'x_button_bottom_color_hover', 140, 'color', __( 'Button Bottom', '__x__' ), 'x_customizer_section_buttons' );


  //
  // Options - Header.
  //

  $x['set'][] = array( 'x_header_description_overview', NULL, 'postMessage' );
  $x['con'][] = array( 'x_header_description_overview', 10, 'description', __( 'Never before has such flexibility been offered to WordPress users for their site\'s header. It\'s one of the first things your visitors see when they come to your site, now you can make it look exactly how you want.', '__x__' ), 'x_customizer_section_header' );

      $x['set'][] = array( 'x_navbar_positioning', 'static-top', 'refresh' );
      $x['con'][] = array( 'x_navbar_positioning', 20, 'radio', __( 'Navbar Position', '__x__' ), $list_navbar_positions, 'x_customizer_section_header' );

  $x['set'][] = array( 'x_header_logo_navigation_layout', NULL, 'postMessage' );
  $x['con'][] = array( 'x_header_logo_navigation_layout', 30, 'sub-title', __( 'Logo and Navigation', '__x__' ), 'x_customizer_section_header' );

  $x['set'][] = array( 'x_header_description_logo_navigation_layout', NULL, 'postMessage' );
  $x['con'][] = array( 'x_header_description_logo_navigation_layout', 40, 'description', __( 'Selecting "Inline" for your logo and navigation layout will place them both in the navbar. Selecting "Stacked" will place the logo in a separate section above the navbar.', '__x__' ), 'x_customizer_section_header' );

      $x['set'][] = array( 'x_logo_navigation_layout', 'inline', 'refresh' );
      $x['con'][] = array( 'x_logo_navigation_layout', 50, 'radio', __( 'Layout', '__x__' ), $list_logo_navigation_layouts, 'x_customizer_section_header' );

      $x['set'][] = array( 'x_logobar_adjust_spacing_top', '15', 'refresh' );
      $x['con'][] = array( 'x_logobar_adjust_spacing_top', 60, 'text', __( 'Logobar Top Spacing (px)', '__x__' ), 'x_customizer_section_header' );

      $x['set'][] = array( 'x_logobar_adjust_spacing_bottom', '15', 'refresh' );
      $x['con'][] = array( 'x_logobar_adjust_spacing_bottom', 70, 'text', __( 'Logobar Bottom Spacing (px)', '__x__' ), 'x_customizer_section_header' );

  $x['set'][] = array( 'x_header_sub_title_navbar', NULL, 'postMessage' );
  $x['con'][] = array( 'x_header_sub_title_navbar', 80, 'sub-title', __( 'Navbar', '__x__' ), 'x_customizer_section_header' );

  $x['set'][] = array( 'x_header_description_navbar_width_height', NULL, 'postMessage' );
  $x['con'][] = array( 'x_header_description_navbar_width_height', 90, 'description', __( '"Navbar Top Height (px)" must still be set even when using "Fixed Left" or "Fixed Right" positioning because on tablet and mobile devices, the menu is pushed to the top.', '__x__' ), 'x_customizer_section_header' );

      $x['set'][] = array( 'x_navbar_height', '90', 'refresh' );
      $x['con'][] = array( 'x_navbar_height', 100, 'text', __( 'Navbar Top Height (px)', '__x__' ), 'x_customizer_section_header' );

      $x['set'][] = array( 'x_navbar_width', '235', 'refresh' );
      $x['con'][] = array( 'x_navbar_width', 110, 'text', __( 'Navbar Side Width (px)', '__x__' ), 'x_customizer_section_header' );

  $x['set'][] = array( 'x_header_sub_title_logo', NULL, 'postMessage' );
  $x['con'][] = array( 'x_header_sub_title_logo', 120, 'sub-title', __( 'Logo', '__x__' ), 'x_customizer_section_header' );

  $x['set'][] = array( 'x_header_description_logo', NULL, 'postMessage' );
  $x['con'][] = array( 'x_header_description_logo', 130, 'description', __( 'To make your logo retina ready, enter in the width of your uploaded image in the "Logo Width (px)" field and we\'ll take care of all the calculations for you. If you want your logo to stay the original size that was uploaded, leave the field blank.', '__x__' ), 'x_customizer_section_header' );

      $x['set'][] = array( 'x_logo', NULL, 'refresh' );
      $x['con'][] = array( 'x_logo', 140, 'image', __( 'Upload Your Logo', '__x__' ), 'x_customizer_section_header' );

      $x['set'][] = array( 'x_logo_width', '', 'refresh' );
      $x['con'][] = array( 'x_logo_width', 150, 'text', __( 'Logo Width (px)', '__x__' ), 'x_customizer_section_header' );

  $x['set'][] = array( 'x_header_sub_title_alignment', NULL, 'postMessage' );
  $x['con'][] = array( 'x_header_sub_title_alignment', 160, 'sub-title', __( 'Alignment', '__x__' ), 'x_customizer_section_header' );

  $x['set'][] = array( 'x_header_description_navbar_adjust', NULL, 'postMessage' );
  $x['con'][] = array( 'x_header_description_navbar_adjust', 170, 'description', __( '"Navbar Top Logo Alignment (px)" and "Navbar Top Link Alignment (px)" must still be set even when using "Fixed Left" or "Fixed Right" positioning because on tablet and mobile devices, the menu is pushed to the top.', '__x__' ), 'x_customizer_section_header' );

      $x['set'][] = array( 'x_logo_adjust_navbar_top', '13', 'refresh' );
      $x['con'][] = array( 'x_logo_adjust_navbar_top', 180, 'text', __( 'Navbar Top Logo Alignment (px)', '__x__' ), 'x_customizer_section_header' );

      $x['set'][] = array( 'x_navbar_adjust_links_top', '34', 'refresh' );
      $x['con'][] = array( 'x_navbar_adjust_links_top', 190, 'text', __( 'Navbar Top Link Alignment (px)', '__x__' ), 'x_customizer_section_header' );

      $x['set'][] = array( 'x_logo_adjust_navbar_side', '30', 'refresh' );
      $x['con'][] = array( 'x_logo_adjust_navbar_side', 200, 'text', __( 'Navbar Side Logo Alignment (px)', '__x__' ), 'x_customizer_section_header' );

      $x['set'][] = array( 'x_navbar_adjust_links_side', '50', 'refresh' );
      $x['con'][] = array( 'x_navbar_adjust_links_side', 210, 'text', __( 'Navbar Side Link Alignment (px)', '__x__' ), 'x_customizer_section_header' );

      $x['set'][] = array( 'x_navbar_adjust_button', '20', 'refresh' );
      $x['con'][] = array( 'x_navbar_adjust_button', 220, 'text', __( 'Mobile Navbar Button Alignment (px)', '__x__' ), 'x_customizer_section_header' );

      $x['set'][] = array( 'x_navbar_adjust_button_size', '24', 'refresh' );
      $x['con'][] = array( 'x_navbar_adjust_button_size', 230, 'text', __( 'Mobile Navbar Button Size (px)', '__x__' ), 'x_customizer_section_header' );

  $x['set'][] = array( 'x_header_sub_title_widget_areas', NULL, 'postMessage' );
  $x['con'][] = array( 'x_header_sub_title_widget_areas', 240, 'sub-title', __( 'Widgetbar', '__x__' ), 'x_customizer_section_header' );

      $x['set'][] = array( 'x_header_widget_areas', 2, 'refresh' );
      $x['con'][] = array( 'x_header_widget_areas', 250, 'radio', __( 'Header Widget Areas', '__x__' ), $list_widget_areas, 'x_customizer_section_header' );

      $x['set'][] = array( 'x_widgetbar_button_background', '#000000', 'refresh' );
      $x['con'][] = array( 'x_widgetbar_button_background', 260, 'color', __( 'Widgetbar Button Background', '__x__' ), 'x_customizer_section_header' );

      $x['set'][] = array( 'x_widgetbar_button_background_hover', '#444444', 'refresh' );
      $x['con'][] = array( 'x_widgetbar_button_background_hover', 270, 'color', __( 'Widgetbar Button Background Hover', '__x__' ), 'x_customizer_section_header' );

  $x['set'][] = array( 'x_header_sub_title_misc', NULL, 'postMessage' );
  $x['con'][] = array( 'x_header_sub_title_misc', 280, 'sub-title', __( 'Miscellaneous', '__x__' ), 'x_customizer_section_header' );

      $x['set'][] = array( 'x_topbar_display', 1, 'refresh' );
      $x['con'][] = array( 'x_topbar_display', 290, 'checkbox', __( 'Enable Topbar', '__x__' ), 'x_customizer_section_header' );

      $x['set'][] = array( 'x_topbar_content', '', 'refresh' );
      $x['con'][] = array( 'x_topbar_content', 300, 'textarea', __( 'Topbar Content', '__x__' ), 'x_customizer_section_header' );

      $x['set'][] = array( 'x_breadcrumb_display', 1, 'refresh' );
      $x['con'][] = array( 'x_breadcrumb_display', 310, 'checkbox', __( 'Enable Breadcrumbs', '__x__' ), 'x_customizer_section_header' );


  //
  // Options - Footer.
  //

  $x['set'][] = array( 'x_footer_description_overview', NULL, 'postMessage' );
  $x['con'][] = array( 'x_footer_description_overview', 10, 'description', __( 'Easily adjust your site\'s footer by setting your widget areas to the specific number desired and turning on or off various parts as needed. You\'re never forced to use a layout you don\'t need with X.', '__x__' ), 'x_customizer_section_footer' );

      $x['set'][] = array( 'x_footer_widget_areas', 3, 'refresh' );
      $x['con'][] = array( 'x_footer_widget_areas', 20, 'radio', __( 'Footer Widget Areas', '__x__' ), $list_widget_areas, 'x_customizer_section_footer' );

      $x['set'][] = array( 'x_footer_bottom_display', 1, 'refresh' );
      $x['con'][] = array( 'x_footer_bottom_display', 30, 'checkbox', __( 'Enable Bottom Footer', '__x__' ), 'x_customizer_section_footer' );

      $x['set'][] = array( 'x_footer_menu_display', 1, 'refresh' );
      $x['con'][] = array( 'x_footer_menu_display', 40, 'checkbox', __( 'Enable Footer Menu', '__x__' ), 'x_customizer_section_footer' );

      $x['set'][] = array( 'x_footer_social_display', 1, 'refresh' );
      $x['con'][] = array( 'x_footer_social_display', 50, 'checkbox', __( 'Enable Footer Social', '__x__' ), 'x_customizer_section_footer' );

      $x['set'][] = array( 'x_footer_content_display', 1, 'refresh' );
      $x['con'][] = array( 'x_footer_content_display', 60, 'checkbox', __( 'Enable Footer Content', '__x__' ), 'x_customizer_section_footer' );

      $x['set'][] = array( 'x_footer_content', '<p style="letter-spacing: 2px; text-transform: uppercase; opacity: 0.5; filter: alpha(opacity=50);">Proudly Powered By The<br><a href="http://theme.co/x/" title="X WordPress Theme">X WordPress Theme</a></p>', 'refresh' );
      $x['con'][] = array( 'x_footer_content', 70, 'textarea', __( 'Footer Content', '__x__' ), 'x_customizer_section_footer' );

  $x['set'][] = array( 'x_footer_sub_title_scroll_top', NULL, 'postMessage' );
  $x['con'][] = array( 'x_footer_sub_title_scroll_top', 80, 'sub-title', __( 'Scroll Top Anchor', '__x__' ), 'x_customizer_section_footer' );

  $x['set'][] = array( 'x_footer_scroll_top_description_overview', NULL, 'postMessage' );
  $x['con'][] = array( 'x_footer_scroll_top_description_overview', 90, 'description', __( 'Activating the scroll top anchor will output a link that appears in the bottom corner of your site for users to click on that will return them to the top of your website. Once activated, set the value (as a percentage) for how far down the page your users will need to scroll for it to appear. For example, if you want the scroll top anchor to appear once your users have scrolled halfway down your page, you would enter "50" into the field.', '__x__' ), 'x_customizer_section_footer' );

      $x['set'][] = array( 'x_footer_scroll_top_display', 0, 'refresh' );
      $x['con'][] = array( 'x_footer_scroll_top_display', 100, 'checkbox', __( 'Enable the Scroll Top Anchor', '__x__' ), 'x_customizer_section_footer' );

      $x['set'][] = array( 'x_footer_scroll_top_position', 'right', 'refresh' );
      $x['con'][] = array( 'x_footer_scroll_top_position', 110, 'radio', __( 'Scroll Top Anchor Position', '__x__' ), $list_left_right_positioning, 'x_customizer_section_footer' );

      $x['set'][] = array( 'x_footer_scroll_top_display_unit', '75', 'refresh' );
      $x['con'][] = array( 'x_footer_scroll_top_display_unit', 120, 'text', __( 'When to Display the Scroll Top Anchor (%)', '__x__' ), 'x_customizer_section_footer' );


  //
  // Options - Blog.
  //

  $x['set'][] = array( 'x_blog_description_overview', NULL, 'postMessage' );
  $x['con'][] = array( 'x_blog_description_overview', 10, 'description', __( 'Adjust the style and layout of your blog using the settings below. This will only affect the posts index page of your blog and will not alter any archive or search results pages. The "Layout" option allows you to keep your sidebar on your posts index page if you have already selected "Content Left, Sidebar Right" or "Sidebar Left, Content Right" for you "Content Layout" option, or remove the sidebar completely if desired.', '__x__' ), 'x_customizer_section_blog' );

      $x['set'][] = array( 'x_blog_style', 'standard', 'refresh' );
      $x['con'][] = array( 'x_blog_style', 20, 'radio', __( 'Style', '__x__' ), $list_blog_styles, 'x_customizer_section_blog' );

      $x['set'][] = array( 'x_blog_layout', 'full-width', 'refresh' );
      $x['con'][] = array( 'x_blog_layout', 30, 'radio', __( 'Layout', '__x__' ), $list_layouts, 'x_customizer_section_blog' );

  $x['set'][] = array( 'x_blog_sub_title_blog_masonry', NULL, 'postMessage' );
  $x['con'][] = array( 'x_blog_sub_title_blog_masonry', 40, 'sub-title', __( 'Blog Masonry', '__x__' ), 'x_customizer_section_blog' );

  $x['set'][] = array( 'x_blog_description_blog_masonry', NULL, 'postMessage' );
  $x['con'][] = array( 'x_blog_description_blog_masonry', 50, 'description', __( 'Select how many columns you would like for your masonry layout. It is strongly recommended that you remove the sidebar for your blog if you plan on using the three column layout due to size constraints.', '__x__' ), 'x_customizer_section_blog' );

      $x['set'][] = array( 'x_blog_masonry_columns', 2, 'refresh' );
      $x['con'][] = array( 'x_blog_masonry_columns', 60, 'radio', __( 'Columns', '__x__' ), $list_masonry_columns, 'x_customizer_section_blog' );

  $x['set'][] = array( 'x_blog_sub_title_archives', NULL, 'postMessage' );
  $x['con'][] = array( 'x_blog_sub_title_archives', 70, 'sub-title', __( 'Archives', '__x__' ), 'x_customizer_section_blog' );

  $x['set'][] = array( 'x_blog_description_archives', NULL, 'postMessage' );
  $x['con'][] = array( 'x_blog_description_archives', 80, 'description', __( 'Adjust the style and layout of your archive pages using the settings below. The "Layout" option allows you to keep your sidebar on your posts index page if you have already selected "Content Left, Sidebar Right" or "Sidebar Left, Content Right" for you "Content Layout" option, or remove the sidebar completely if desired.', '__x__' ), 'x_customizer_section_blog' );

      $x['set'][] = array( 'x_archive_style', 'standard', 'refresh' );
      $x['con'][] = array( 'x_archive_style', 90, 'radio', __( 'Style', '__x__' ), $list_blog_styles, 'x_customizer_section_blog' );

      $x['set'][] = array( 'x_archive_layout', 'full-width', 'refresh' );
      $x['con'][] = array( 'x_archive_layout', 100, 'radio', __( 'Layout', '__x__' ), $list_layouts, 'x_customizer_section_blog' );

  $x['set'][] = array( 'x_blog_sub_title_archive_masonry', NULL, 'postMessage' );
  $x['con'][] = array( 'x_blog_sub_title_archive_masonry', 110, 'sub-title', __( 'Archive Masonry', '__x__' ), 'x_customizer_section_blog' );

  $x['set'][] = array( 'x_blog_description_archive_masonry', NULL, 'postMessage' );
  $x['con'][] = array( 'x_blog_description_archive_masonry', 120, 'description', __( 'Select how many columns you would like for your masonry layout. It is strongly recommended that you remove the sidebar for your blog if you plan on using the three column layout due to size constraints.', '__x__' ), 'x_customizer_section_blog' );

      $x['set'][] = array( 'x_archive_masonry_columns', 2, 'refresh' );
      $x['con'][] = array( 'x_archive_masonry_columns', 130, 'radio', __( 'Columns', '__x__' ), $list_masonry_columns, 'x_customizer_section_blog' );

  $x['set'][] = array( 'x_blog_sub_title_post_content', NULL, 'postMessage' );
  $x['con'][] = array( 'x_blog_sub_title_post_content', 140, 'sub-title', __( 'Content', '__x__' ), 'x_customizer_section_blog' );

  $x['set'][] = array( 'x_blog_description_post_content', NULL, 'postMessage' );
  $x['con'][] = array( 'x_blog_description_post_content', 150, 'description', __( 'Selecting the "Enable Full Post Content on Index" option below will allow the entire contents of your posts to be shown on the post index pages for all stacks. Deselecting this option will allow you to set the length of your excerpt.', '__x__' ), 'x_customizer_section_blog' );

      $x['set'][] = array( 'x_blog_enable_post_meta', 0, 'refresh' );
      $x['con'][] = array( 'x_blog_enable_post_meta', 160, 'checkbox', __( 'Enable Post Meta', '__x__' ), 'x_customizer_section_blog' );

      $x['set'][] = array( 'x_blog_enable_full_post_content', 0, 'refresh' );
      $x['con'][] = array( 'x_blog_enable_full_post_content', 170, 'checkbox', __( 'Enable Full Post Content on Index', '__x__' ), 'x_customizer_section_blog' );

      $x['set'][] = array( 'x_blog_excerpt_length', '60', 'refresh' );
      $x['con'][] = array( 'x_blog_excerpt_length', 180, 'text', __( 'Excerpt Length', '__x__' ), 'x_customizer_section_blog' );


  //
  // Options - Portfolio.
  //

  $x['set'][] = array( 'x_portfolio_description_overview', NULL, 'postMessage' );
  $x['con'][] = array( 'x_portfolio_description_overview', 10, 'description', __( 'Setting your custom portfolio slug allows you to create a unique URL structure for your archive pages that suits your needs. When you update it, remember to save your Permalinks again to avoid any potential errors.', '__x__' ), 'x_customizer_section_portfolio' );

      $x['set'][] = array( 'x_custom_portfolio_slug', 'portfolio-item', 'refresh' );
      $x['con'][] = array( 'x_custom_portfolio_slug', 20, 'text', __( 'Custom URL Slug', '__x__' ), 'x_customizer_section_portfolio' );

  $x['set'][] = array( 'x_portfolio_sub_title_content', NULL, 'postMessage' );
  $x['con'][] = array( 'x_portfolio_sub_title_content', 30, 'sub-title', __( 'Content', '__x__' ), 'x_customizer_section_portfolio' );

      $x['set'][] = array( 'x_portfolio_enable_cropped_thumbs', 0, 'refresh' );
      $x['con'][] = array( 'x_portfolio_enable_cropped_thumbs', 40, 'checkbox', __( 'Enable Cropped Featured Images', '__x__' ), 'x_customizer_section_portfolio' );

      $x['set'][] = array( 'x_portfolio_enable_post_meta', 1, 'refresh' );
      $x['con'][] = array( 'x_portfolio_enable_post_meta', 50, 'checkbox', __( 'Enable Post Meta', '__x__' ), 'x_customizer_section_portfolio' );

  $x['set'][] = array( 'x_portfolio_sub_title_labels', NULL, 'postMessage' );
  $x['con'][] = array( 'x_portfolio_sub_title_labels', 60, 'sub-title', __( 'Labels', '__x__' ), 'x_customizer_section_portfolio' );

      $x['set'][] = array( 'x_portfolio_tag_title', 'Skills', 'refresh' );
      $x['con'][] = array( 'x_portfolio_tag_title', 70, 'text', __( 'Tag List Title', '__x__' ), 'x_customizer_section_portfolio' );

      $x['set'][] = array( 'x_portfolio_launch_project_title', 'Launch Project', 'refresh' );
      $x['con'][] = array( 'x_portfolio_launch_project_title', 80, 'text', __( 'Launch Project Title', '__x__' ), 'x_customizer_section_portfolio' );

      $x['set'][] = array( 'x_portfolio_launch_project_button_text', 'See it Live!', 'refresh' );
      $x['con'][] = array( 'x_portfolio_launch_project_button_text', 90, 'text', __( 'Launch Project Button Text', '__x__' ), 'x_customizer_section_portfolio' );

      $x['set'][] = array( 'x_portfolio_share_project_title', 'Share this Project', 'refresh' );
      $x['con'][] = array( 'x_portfolio_share_project_title', 100, 'text', __( 'Share Project Title', '__x__' ), 'x_customizer_section_portfolio' );

  $x['set'][] = array( 'x_portfolio_sub_title_sharing', NULL, 'postMessage' );
  $x['con'][] = array( 'x_portfolio_sub_title_sharing', 110, 'sub-title', __( 'Sharing', '__x__' ), 'x_customizer_section_portfolio' );

      $x['set'][] = array( 'x_portfolio_enable_facebook_sharing', 1, 'refresh' );
      $x['con'][] = array( 'x_portfolio_enable_facebook_sharing', 120, 'checkbox', __( 'Enable Facebook Sharing Link', '__x__' ), 'x_customizer_section_portfolio' );

      $x['set'][] = array( 'x_portfolio_enable_twitter_sharing', 1, 'refresh' );
      $x['con'][] = array( 'x_portfolio_enable_twitter_sharing', 130, 'checkbox', __( 'Enable Twitter Sharing Link', '__x__' ), 'x_customizer_section_portfolio' );

      $x['set'][] = array( 'x_portfolio_enable_google_plus_sharing', 0, 'refresh' );
      $x['con'][] = array( 'x_portfolio_enable_google_plus_sharing', 140, 'checkbox', __( 'Enable Google+ Sharing Link', '__x__' ), 'x_customizer_section_portfolio' );

      $x['set'][] = array( 'x_portfolio_enable_linkedin_sharing', 0, 'refresh' );
      $x['con'][] = array( 'x_portfolio_enable_linkedin_sharing', 150, 'checkbox', __( 'Enable LinkedIn Sharing Link', '__x__' ), 'x_customizer_section_portfolio' );

      $x['set'][] = array( 'x_portfolio_enable_pinterest_sharing', 0, 'refresh' );
      $x['con'][] = array( 'x_portfolio_enable_pinterest_sharing', 160, 'checkbox', __( 'Enable Pinterest Sharing Link', '__x__' ), 'x_customizer_section_portfolio' );

      $x['set'][] = array( 'x_portfolio_enable_reddit_sharing', 0, 'refresh' );
      $x['con'][] = array( 'x_portfolio_enable_reddit_sharing', 170, 'checkbox', __( 'Enable Reddit Sharing Link', '__x__' ), 'x_customizer_section_portfolio' );

      $x['set'][] = array( 'x_portfolio_enable_email_sharing', 0, 'refresh' );
      $x['con'][] = array( 'x_portfolio_enable_email_sharing', 180, 'checkbox', __( 'Enable Email Sharing Link', '__x__' ), 'x_customizer_section_portfolio' );


  //
  // Options - WooCommerce.
  //

  if ( class_exists( 'WC_API' ) ) {

  $x['set'][] = array( 'x_woocommerce_description_overview', NULL, 'postMessage' );
  $x['con'][] = array( 'x_woocommerce_description_overview', 10, 'description', __( 'This section handles all options regarding your WooCommerce setup. Select your content layout, product columns, along with plenty of other options to get your shop up and running. The "Shop Layout" option allows you to keep your sidebar on your shop page if you have already selected "Content Left, Sidebar Right" or "Sidebar Left, Content Right" for you "Content Layout" option, or remove the sidebar completely if desired.', '__x__' ), 'x_customizer_section_woocommerce' );

      $x['set'][] = array( 'x_woocommerce_shop_layout_content', 'full-width', 'refresh' );
      $x['con'][] = array( 'x_woocommerce_shop_layout_content', 20, 'radio', __( 'Shop Layout', '__x__' ), $list_layouts, 'x_customizer_section_woocommerce' );

      $x['set'][] = array( 'x_woocommerce_shop_columns', 3, 'refresh' );
      $x['con'][] = array( 'x_woocommerce_shop_columns', 30, 'radio', __( 'Shop Columns', '__x__' ), $list_shop_columns, 'x_customizer_section_woocommerce' );

      $x['set'][] = array( 'x_woocommerce_shop_count', '12', 'refresh' );
      $x['con'][] = array( 'x_woocommerce_shop_count', 40, 'text', __( 'Posts Per Page', '__x__' ), 'x_customizer_section_woocommerce' );

  $x['set'][] = array( 'x_woocommerce_sub_title_product', NULL, 'postMessage' );
  $x['con'][] = array( 'x_woocommerce_sub_title_product', 50, 'sub-title', __( 'Single Product', '__x__' ), 'x_customizer_section_woocommerce' );

  $x['set'][] = array( 'x_woocommerce_description_single_product', NULL, 'postMessage' );
  $x['con'][] = array( 'x_woocommerce_description_single_product', 60, 'description', __( 'All options available in this section pertain to the layout of your individual product pages. Simply enable or disable the sections you want to use to achieve the layout you want.', '__x__' ), 'x_customizer_section_woocommerce' );

      $x['set'][] = array( 'x_woocommerce_product_tabs_enable', 1, 'refresh' );
      $x['con'][] = array( 'x_woocommerce_product_tabs_enable', 70, 'checkbox', __( 'Enable Product Tabs', '__x__' ), 'x_customizer_section_woocommerce' );

      $x['set'][] = array( 'x_woocommerce_product_tab_description_enable', 1, 'refresh' );
      $x['con'][] = array( 'x_woocommerce_product_tab_description_enable', 80, 'checkbox', __( 'Enable Description Tab', '__x__' ), 'x_customizer_section_woocommerce' );

      $x['set'][] = array( 'x_woocommerce_product_tab_additional_info_enable', 1, 'refresh' );
      $x['con'][] = array( 'x_woocommerce_product_tab_additional_info_enable', 90, 'checkbox', __( 'Enable Additional Information Tab', '__x__' ), 'x_customizer_section_woocommerce' );

      $x['set'][] = array( 'x_woocommerce_product_tab_reviews_enable', 1, 'refresh' );
      $x['con'][] = array( 'x_woocommerce_product_tab_reviews_enable', 100, 'checkbox', __( 'Enable Reviews Tab', '__x__' ), 'x_customizer_section_woocommerce' );

      $x['set'][] = array( 'x_woocommerce_product_related_enable', 1, 'refresh' );
      $x['con'][] = array( 'x_woocommerce_product_related_enable', 110, 'checkbox', __( 'Enable Related Products', '__x__' ), 'x_customizer_section_woocommerce' );

      $x['set'][] = array( 'x_woocommerce_product_related_columns', 4, 'refresh' );
      $x['con'][] = array( 'x_woocommerce_product_related_columns', 120, 'radio', __( 'Related Product Columns', '__x__' ), $list_shop_columns, 'x_customizer_section_woocommerce' );

      $x['set'][] = array( 'x_woocommerce_product_related_count', '4', 'refresh' );
      $x['con'][] = array( 'x_woocommerce_product_related_count', 130, 'text', __( 'Related Product Post Count', '__x__' ), 'x_customizer_section_woocommerce' );

      $x['set'][] = array( 'x_woocommerce_product_upsells_enable', 1, 'refresh' );
      $x['con'][] = array( 'x_woocommerce_product_upsells_enable', 140, 'checkbox', __( 'Enable Upsells', '__x__' ), 'x_customizer_section_woocommerce' );

      $x['set'][] = array( 'x_woocommerce_product_upsell_columns', 4, 'refresh' );
      $x['con'][] = array( 'x_woocommerce_product_upsell_columns', 150, 'radio', __( 'Upsell Columns', '__x__' ), $list_shop_columns, 'x_customizer_section_woocommerce' );

      $x['set'][] = array( 'x_woocommerce_product_upsell_count', '4', 'refresh' );
      $x['con'][] = array( 'x_woocommerce_product_upsell_count', 160, 'text', __( 'Upsell Post Count', '__x__' ), 'x_customizer_section_woocommerce' );

  $x['set'][] = array( 'x_woocommerce_sub_title_cart', NULL, 'postMessage' );
  $x['con'][] = array( 'x_woocommerce_sub_title_cart', 170, 'sub-title', __( 'Cart', '__x__' ), 'x_customizer_section_woocommerce' );

  $x['set'][] = array( 'x_woocommerce_description_cart', NULL, 'postMessage' );
  $x['con'][] = array( 'x_woocommerce_description_cart', 180, 'description', __( 'All options available in this section pertain to the layout of your cart page. Simply enable or disable the sections you want to use to achieve the layout you want.', '__x__' ), 'x_customizer_section_woocommerce' );

      $x['set'][] = array( 'x_woocommerce_cart_cross_sells_enable', 1, 'refresh' );
      $x['con'][] = array( 'x_woocommerce_cart_cross_sells_enable', 190, 'checkbox', __( 'Enable Cross Sells', '__x__' ), 'x_customizer_section_woocommerce' );

      $x['set'][] = array( 'x_woocommerce_cart_cross_sells_columns', 4, 'refresh' );
      $x['con'][] = array( 'x_woocommerce_cart_cross_sells_columns', 200, 'radio', __( 'Cross Sell Columns', '__x__' ), $list_shop_columns, 'x_customizer_section_woocommerce' );

      $x['set'][] = array( 'x_woocommerce_cart_cross_sells_count', '4', 'refresh' );
      $x['con'][] = array( 'x_woocommerce_cart_cross_sells_count', 210, 'text', __( 'Cross Sell Post Count', '__x__' ), 'x_customizer_section_woocommerce' );

  $x['set'][] = array( 'x_woocommerce_sub_title_widgets', NULL, 'postMessage' );
  $x['con'][] = array( 'x_woocommerce_sub_title_widgets', 220, 'sub-title', __( 'Widgets', '__x__' ), 'x_customizer_section_woocommerce' );

  $x['set'][] = array( 'x_woocommerce_description_widgets', NULL, 'postMessage' );
  $x['con'][] = array( 'x_woocommerce_description_widgets', 230, 'description', __( 'Select the placement of your product images in the various WooCommerce widgets that provide them. Right alignment is better if your items have longer titles to avoid staggered word wrapping.', '__x__' ), 'x_customizer_section_woocommerce' );

      $x['set'][] = array( 'x_woocommerce_widgets_image_alignment', 'left', 'refresh' );
      $x['con'][] = array( 'x_woocommerce_widgets_image_alignment', 240, 'radio', __( 'Image Alignment', '__x__' ), $list_left_right_positioning, 'x_customizer_section_woocommerce' );

  }


  //
  // Options - Social.
  //

  $x['set'][] = array( 'x_social_description_overview', NULL, 'postMessage' );
  $x['con'][] = array( 'x_social_description_overview', 10, 'description', __( 'Set the URLs for your social media profiles here to be used in the topbar and bottom footer. Adding in a link will make its respective icon show up without needing to do anything else. Keep in mind that these sections are not necessarily intended for a lot of items, so adding all icons could create some layout issues. It is typically best to keep your selections here to a minimum for structural purposes and for usability purposes so you do not overwhelm your visitors.', '__x__' ), 'x_customizer_section_social' );

      $x['set'][] = array( 'x_social_facebook', '', 'refresh' );
      $x['con'][] = array( 'x_social_facebook', 20, 'text', __( 'Facebook Profile URL', '__x__' ), 'x_customizer_section_social' );

      $x['set'][] = array( 'x_social_twitter', '', 'refresh' );
      $x['con'][] = array( 'x_social_twitter', 30, 'text', __( 'Twitter Profile URL', '__x__' ), 'x_customizer_section_social' );

      $x['set'][] = array( 'x_social_googleplus', '', 'refresh' );
      $x['con'][] = array( 'x_social_googleplus', 40, 'text', __( 'Google+ Profile URL', '__x__' ), 'x_customizer_section_social' );

      $x['set'][] = array( 'x_social_linkedin', '', 'refresh' );
      $x['con'][] = array( 'x_social_linkedin', 50, 'text', __( 'LinkedIn Profile URL', '__x__' ), 'x_customizer_section_social' );

      $x['set'][] = array( 'x_social_foursquare', '', 'refresh' );
      $x['con'][] = array( 'x_social_foursquare', 60, 'text', __( 'Foursquare Profile URL', '__x__' ), 'x_customizer_section_social' );

      $x['set'][] = array( 'x_social_youtube', '', 'refresh' );
      $x['con'][] = array( 'x_social_youtube', 70, 'text', __( 'YouTube Profile URL', '__x__' ), 'x_customizer_section_social' );

      $x['set'][] = array( 'x_social_vimeo', '', 'refresh' );
      $x['con'][] = array( 'x_social_vimeo', 80, 'text', __( 'Vimeo Profile URL', '__x__' ), 'x_customizer_section_social' );

      $x['set'][] = array( 'x_social_instagram', '', 'refresh' );
      $x['con'][] = array( 'x_social_instagram', 90, 'text', __( 'Instagram Profile URL', '__x__' ), 'x_customizer_section_social' );

      $x['set'][] = array( 'x_social_pinterest', '', 'refresh' );
      $x['con'][] = array( 'x_social_pinterest', 100, 'text', __( 'Pinterest Profile URL', '__x__' ), 'x_customizer_section_social' );

      $x['set'][] = array( 'x_social_dribbble', '', 'refresh' );
      $x['con'][] = array( 'x_social_dribbble', 110, 'text', __( 'Dribbble Profile URL', '__x__' ), 'x_customizer_section_social' );

      $x['set'][] = array( 'x_social_behance', '', 'refresh' );
      $x['con'][] = array( 'x_social_behance', 120, 'text', __( 'Behance Profile URL', '__x__' ), 'x_customizer_section_social' );

      $x['set'][] = array( 'x_social_rss', '', 'refresh' );
      $x['con'][] = array( 'x_social_rss', 130, 'text', __( 'RSS Feed URL', '__x__' ), 'x_customizer_section_social' );


  //
  // Options - Site Icons.
  //

  $x['set'][] = array( 'x_icons_description_overview', NULL, 'postMessage' );
  $x['con'][] = array( 'x_icons_description_overview', 10, 'description', __( 'Easily manage your favicon for desktop, touch icon for mobile devices, and tile icon for the Windows 8 Metro interface in this section. If an image is not set, nothing will be output for that particular icon type. When setting the path to your favicon, make sure you are using the ".ico" format. A 152x152 PNG should be used for your touch icon, and a 144x144 PNG should be used for your tile icon. The color you set for your tile icon will be used behind your image.', '__x__' ), 'x_customizer_section_icons' );

      $x['set'][] = array( 'x_icon_favicon', '', 'refresh' );
      $x['con'][] = array( 'x_icon_favicon', 20, 'text', __( 'Favicon (Set Path to Image Below)', '__x__' ), 'x_customizer_section_icons' );

      $x['set'][] = array( 'x_icon_touch', NULL, 'refresh' );
      $x['con'][] = array( 'x_icon_touch', 30, 'image', __( 'Touch Icon (iOS and Android)', '__x__' ), 'x_customizer_section_icons' );

      $x['set'][] = array( 'x_icon_tile', NULL, 'refresh' );
      $x['con'][] = array( 'x_icon_tile', 40, 'image', __( 'Tile Icon (Microsoft)', '__x__' ), 'x_customizer_section_icons' );

      $x['set'][] = array( 'x_icon_tile_bg_color', '#ffffff', 'refresh' );
      $x['con'][] = array( 'x_icon_tile_bg_color', 50, 'color', __( 'Tile Icon Background Color', '__x__' ), 'x_customizer_section_icons' );


  //
  // Options - Custom.
  //

  $x['set'][] = array( 'x_custom_styles_and_scripts_description_overview', NULL, 'postMessage' );
  $x['con'][] = array( 'x_custom_styles_and_scripts_description_overview', 10, 'description', __( 'Quickly add custom CSS or JavaScript to your site without any complicated setups. Ideal for minor style alterations or small snippets like Google Analytics. Do not place any &lt;style&gt; or &lt;script&gt; tags in these areas as they are already added for your convenience.', '__x__' ), 'x_customizer_section_custom_styles_and_scripts' );

      $x['set'][] = array( 'x_custom_styles', '', 'refresh' );
      $x['con'][] = array( 'x_custom_styles', 20, 'textarea', __( 'CSS', '__x__' ), 'x_customizer_section_custom_styles_and_scripts' );

      $x['set'][] = array( 'x_custom_scripts', '', 'refresh' );
      $x['con'][] = array( 'x_custom_scripts', 30, 'textarea', __( 'JavaScript', '__x__' ), 'x_customizer_section_custom_styles_and_scripts' );


  //
  // Output - Sections.
  //

  foreach ( $x['sec'] as $section ) {

    $wp_customize->add_section( $section[0], array(
      'title'    => $section[1],
      'priority' => $section[2],
    ) );

  }


  //
  // Output - Settings.
  //

  foreach ( $x['set'] as $setting ) {

    $wp_customize->add_setting( $setting[0], array(
      'default'   => $setting[1],
      'transport' => $setting[2]
    ));

  }


  //
  // Output - Controls.
  //

  foreach ( $x['con'] as $control ) {

    if ( $control[2] == 'description' ) {

      $wp_customize->add_control(
        new X_Customize_Description( $wp_customize, $control[0], array(
          'label'    => $control[3],
          'section'  => $control[4],
          'settings' => $control[0],
          'priority' => $control[1]
        ))
      );

    } elseif ( $control[2] == 'sub-title' ) {

      $wp_customize->add_control(
        new X_Customize_Sub_Title( $wp_customize, $control[0], array(
          'label'    => $control[3],
          'section'  => $control[4],
          'settings' => $control[0],
          'priority' => $control[1]
        ))
      );

    } elseif ( $control[2] == 'radio' ) {

      $wp_customize->add_control( $control[0], array(
        'type'     => $control[2],
        'label'    => $control[3],
        'section'  => $control[5],
        'priority' => $control[1],
        'choices'  => $control[4]
      ));

    } elseif ( $control[2] == 'select' ) {

      $wp_customize->add_control( $control[0], array(
        'type'     => $control[2],
        'label'    => $control[3],
        'section'  => $control[5],
        'priority' => $control[1],
        'choices'  => $control[4]
      ));

    } elseif ( $control[2] == 'slider' ) {

      $wp_customize->add_control(
        new X_Customize_Slider( $wp_customize, $control[0], array(
          'label'    => $control[3],
          'section'  => $control[5],
          'settings' => $control[0],
          'priority' => $control[1],
          'choices'  => $control[4]
        ))
      );

    } elseif ( $control[2] == 'text' ) {

      $wp_customize->add_control( $control[0], array(
        'type'     => $control[2],
        'label'    => $control[3],
        'section'  => $control[4],
        'priority' => $control[1]
      ));

    } elseif ( $control[2] == 'textarea' ) {

      $wp_customize->add_control(
        new X_Customize_Control_Textarea( $wp_customize, $control[0], array(
          'label'    => $control[3],
          'section'  => $control[4],
          'settings' => $control[0],
          'priority' => $control[1]
        ))
      );

    } elseif ( $control[2] == 'checkbox' ) {

      $wp_customize->add_control( $control[0], array(
        'type'     => $control[2],
        'label'    => $control[3],
        'section'  => $control[4],
        'priority' => $control[1]
      ));

    } elseif ( $control[2] == 'color' ) {

      $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, $control[0], array(
          'label'    => $control[3],
          'section'  => $control[4],
          'settings' => $control[0],
          'priority' => $control[1]
        ))
      );

    } elseif ( $control[2] == 'image' ) {

      $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize, $control[0], array(
          'label'    => $control[3],
          'section'  => $control[4],
          'settings' => $control[0],
          'priority' => $control[1]
        ))
      );

    }
  }

}

add_action( 'customize_register', 'x_register_customizer_options' );