// =============================================================================
// JS/ADMIN/CUSTOMIZER-CONTROLS.JS
// -----------------------------------------------------------------------------
// Show/hide Customizer controls as needed.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Preloader, Dynamic Font Weights, and Updating Message
//   02. Stacks
//   03. Integrity
//   04. Renew
//   05. Icon
//   06. Typography
//   07. Button
//   08. Header
//   09. Footer
//   10. Blog
//   11. WooCommerce
// =============================================================================

// Preloader, Dynamic Font Weights, and Updating Message
// =============================================================================

jQuery(window).load(function() {

  jQuery('#x-customizer-preloader').delay(850).fadeOut('slow');

  function is_part_of_object( needle, object ) {
    for( var i in object ) {
      if ( object[i] === needle ) {
        return (true);
      }
    }
    return (false);
  }

  function loadVariants(selectField) {

    var _dataID         = selectField.data('customize-setting-link').replace(/family/, "weight");
    var _font           = jQuery('option:selected', selectField).val();
    var _customFont     = jQuery('select[data-customize-setting-link="x_body_font_family"] option:selected').val();
    var _variants       = _wpCustomizeSettings.settings['x_list_font_weights']['value'][_font];
    var _customVariants = _wpCustomizeSettings.settings['x_list_font_weights']['value'][_customFont];
    var _latoVariant    = _wpCustomizeSettings.settings['x_list_font_weights']['value']['Lato'];

    if (jQuery('input[data-customize-setting-link="x_custom_fonts"]').is(':checked')) {
      jQuery('input[name="_customize-radio-'+_dataID+'"]').each(function() {
        if ( !is_part_of_object(jQuery(this).val(), _variants) ) {
          jQuery(this).parent().hide();
        } else {
          jQuery(this).parent().show();
        }
      });
    } else {
      jQuery('input[name="_customize-radio-'+_dataID+'"]').each(function() {
        if ( !is_part_of_object(jQuery(this).val(), _latoVariant) ) {
          jQuery(this).parent().hide();
        } else {
          jQuery(this).parent().show();
        }
      });
    }
  }

  var checkedTrigger = jQuery('#customize-control-x_custom_fonts input');

  jQuery('select[data-customize-setting-link]').each(function() {
    loadVariants(jQuery(this));
  }).on('change', function() {
    loadVariants(jQuery(this));
  });

  if (!checkedTrigger.is(':checked')) {
    loadVariants(jQuery('select[data-customize-setting-link]'));
  }

  checkedTrigger.change( function() {
    if (checkedTrigger.is(':checked')) {
      loadVariants(jQuery('select[data-customize-setting-link]'));
    } else if (!checkedTrigger.is(':checked')) {
      loadVariants(jQuery('select[data-customize-setting-link]'));
    }
  });

});

jQuery(document).ready(function($) {

  var previewElem = $( '#customize-preview' );

  previewElem.prepend( '<div class="x-updating">Updating</div>' );

  setInterval( function() {
    var loadingElem = $( '#customize-preview .x-updating' );
    if ( previewElem.children( 'iframe' ).length > 1 ) {
      loadingElem.fadeIn( 'fast' );
    } else {
      loadingElem.fadeOut( 'fast' );
    }
  }, 1000 );

});



// Stacks
// =============================================================================

jQuery(document).ready(function($) {

  var integrityTrigger = $( '#customize-control-x_stack input[value="integrity"]' );
  var integrityOptions = $( '#accordion-section-x_customizer_section_integrity_styles' );

  var renewTrigger = $( '#customize-control-x_stack input[value="renew"]' );
  var renewOptions = $( '#accordion-section-x_customizer_section_renew_styles' );

  var iconTrigger = $( '#customize-control-x_stack input[value="icon"]' );
  var iconOptions = $( '#accordion-section-x_customizer_section_icon_styles' );

  var group = $( '#customize-control-x_stack input' );

  if ( integrityTrigger.is( ':checked' ) ) {
    integrityOptions.css( 'display', 'block' );
    renewOptions.css( 'display', 'none' );
    iconOptions.css( 'display', 'none' );
  }

  if ( renewTrigger.is( ':checked' ) ) {
    integrityOptions.css( 'display', 'none' );
    renewOptions.css( 'display', 'block' );
    iconOptions.css( 'display', 'none' );
  }

  if ( iconTrigger.is( ':checked' ) ) {
    integrityOptions.css( 'display', 'none' );
    renewOptions.css( 'display', 'none' );
    iconOptions.css( 'display', 'block' );
  }

  group.change( function() {
    if ( $(this).val() === 'integrity' ) {
      integrityOptions.css( 'display', 'block' );
      renewOptions.css( 'display', 'none' );
      iconOptions.css( 'display', 'none' );
    } else if ( $(this).val() === 'renew' ) {
      integrityOptions.css( 'display', 'none' );
      renewOptions.css( 'display', 'block' );
      iconOptions.css( 'display', 'none' );
    } else if ( $(this).val() === 'icon' ) {
      integrityOptions.css( 'display', 'none' );
      renewOptions.css( 'display', 'none' );
      iconOptions.css( 'display', 'block' );
    }
  });

});



// Integrity
// =============================================================================

jQuery(document).ready(function($) {

  var integrityLightTrigger = $( '#customize-control-x_integrity_design input[value="light"]' );
  var integrityLightOptions = [ '#customize-control-x_integrity_light_bg_color', '#customize-control-x_integrity_light_bg_image_pattern', '#customize-control-x_integrity_light_bg_image_full', '#customize-control-x_integrity_light_bg_image_full_fade' ];

  var integrityDarkTrigger = $( '#customize-control-x_integrity_design input[value="dark"]' );
  var integrityDarkOptions = [ '#customize-control-x_integrity_dark_bg_color', '#customize-control-x_integrity_dark_bg_image_pattern', '#customize-control-x_integrity_dark_bg_image_full', '#customize-control-x_integrity_dark_bg_image_full_fade' ];

  var integrityBlogHeaderTrigger = $( '#customize-control-x_integrity_blog_header_enable input' );
  var integrityBlogHeaderOptions = [ '#customize-control-x_integrity_blog_title', '#customize-control-x_integrity_blog_subtitle' ];

  var integrityShopHeaderTrigger = $( '#customize-control-x_integrity_shop_header_enable input' );
  var integrityShopHeaderOptions = [ '#customize-control-x_integrity_shop_title', '#customize-control-x_integrity_shop_subtitle' ];

  var group = $( '#customize-control-x_integrity_design input' );

  if ( integrityLightTrigger.is( ':checked' ) ) {
    for ( i = 0; i < integrityDarkOptions.length; i++ ) {
      $( integrityDarkOptions[i] ).css( 'display', 'none' );
    }
  }

  if ( integrityDarkTrigger.is( ':checked' ) ) {
    for ( i = 0; i < integrityLightOptions.length; i++ ) {
      $( integrityLightOptions[i] ).css( 'display', 'none' );
    }
  }

  if ( ! integrityBlogHeaderTrigger.is( ':checked' ) ) {
    for ( i = 0; i < integrityBlogHeaderOptions.length; i++ ) {
      $( integrityBlogHeaderOptions[i] ).css( 'display', 'none' );
    }
  }

  if ( ! integrityShopHeaderTrigger.is( ':checked' ) ) {
    for ( i = 0; i < integrityShopHeaderOptions.length; i++ ) {
      $( integrityShopHeaderOptions[i] ).css( 'display', 'none' );
    }
  }

  group.change( function() {
    if ( $(this).val() === 'light' ) {
      for ( i = 0; i < integrityLightOptions.length; i++ ) {
        $( integrityLightOptions[i] ).css( 'display', 'block' );
        $( integrityDarkOptions[i] ).css( 'display', 'none' );
      }
    } else if ( $(this).val() === 'dark' ) {
      for ( i = 0; i < integrityDarkOptions.length; i++ ) {
        $( integrityLightOptions[i] ).css( 'display', 'none' );
        $( integrityDarkOptions[i] ).css( 'display', 'block' );
      }
    }
  });

  integrityBlogHeaderTrigger.change( function() {
    if ( integrityBlogHeaderTrigger.is( ':checked' ) ) {
      for ( i = 0; i < integrityBlogHeaderOptions.length; i++ ) {
        $( integrityBlogHeaderOptions[i] ).css( 'display', 'block' );
      }
    } else {
      for ( i = 0; i < integrityBlogHeaderOptions.length; i++ ) {
        $( integrityBlogHeaderOptions[i] ).css( 'display', 'none' );
      }
    }
  });

  integrityShopHeaderTrigger.change( function() {
    if ( integrityShopHeaderTrigger.is( ':checked' ) ) {
      for ( i = 0; i < integrityShopHeaderOptions.length; i++ ) {
        $( integrityShopHeaderOptions[i] ).css( 'display', 'block' );
      }
    } else {
      for ( i = 0; i < integrityShopHeaderOptions.length; i++ ) {
        $( integrityShopHeaderOptions[i] ).css( 'display', 'none' );
      }
    }
  });

});



// Renew
// =============================================================================

jQuery(document).ready(function($) {

  var renewTopbarTrigger = $('#customize-control-x_topbar_display input');
  var renewTopbarOptions = [ '#customize-control-x_renew_topbar_text_color', '#customize-control-x_renew_topbar_link_color_hover', '#customize-control-x_renew_topbar_background' ];

  var renewLogobarTrigger = $('#customize-control-x_logo_navigation_layout input[value="inline"]');
  var renewLogobarOptions = [ '#customize-control-x_renew_logobar_background' ];

  var renewEntryIconTrigger = $('#customize-control-x_renew_entry_icon_position input[value="creative"]');
  var renewEntryIconOptions = [ '#customize-control-x_renew_entry_icon_position_horizontal', '#customize-control-x_renew_entry_icon_position_vertical' ];

  var groupLogobarTrigger    = $('#customize-control-x_logo_navigation_layout input');
  var groupEntryIconPosition = $('#customize-control-x_renew_entry_icon_position input');

  if (!renewTopbarTrigger.is(':checked')) {
    for (i = 0; i < renewTopbarOptions.length; i++) {
      $(renewTopbarOptions[i]).css('display', 'none');
    }
  }

  if (renewLogobarTrigger.is(':checked')) {
    for (i = 0; i < renewLogobarOptions.length; i++) {
      $(renewLogobarOptions[i]).css('display', 'none');
    }
  }

  if (!renewEntryIconTrigger.is(':checked')) {
    for (i = 0; i < renewEntryIconOptions.length; i++) {
      $(renewEntryIconOptions[i]).css('display', 'none');
    }
  }

  renewTopbarTrigger.change( function() {
    if ($(this).is(':checked')) {
      for (i = 0; i < renewTopbarOptions.length; i++) {
        $(renewTopbarOptions[i]).css('display', 'block');
      }
    } else if (!$(this).is(':checked')) {
      for (i = 0; i < renewTopbarOptions.length; i++) {
        $(renewTopbarOptions[i]).css('display', 'none');
      }
    }
  });

  groupLogobarTrigger.change( function() {
    if ($(this).val() === 'stacked') {
      for (i = 0; i < renewLogobarOptions.length; i++) {
        $(renewLogobarOptions[i]).css('display', 'block');
      }
    } else if ($(this).val() === 'inline') {
      for (i = 0; i < renewLogobarOptions.length; i++) {
        $(renewLogobarOptions[i]).css('display', 'none');
      }
    }
  });

  groupEntryIconPosition.change( function() {
    if ($(this).val() === 'creative') {
      for (i = 0; i < renewEntryIconOptions.length; i++) {
        $(renewEntryIconOptions[i]).css('display', 'block');
      }
    } else if ($(this).val() === 'standard') {
      for (i = 0; i < renewEntryIconOptions.length; i++) {
        $(renewEntryIconOptions[i]).css('display', 'none');
      }
    }
  });

});



// Icon
// =============================================================================

jQuery(document).ready(function($) {

  var typeTrigger1 = $('#customize-control-x_icon_post_standard_colors_enable input');
  var typeTrigger2 = $('#customize-control-x_icon_post_image_colors_enable input');
  var typeTrigger3 = $('#customize-control-x_icon_post_gallery_colors_enable input');
  var typeTrigger4 = $('#customize-control-x_icon_post_video_colors_enable input');
  var typeTrigger5 = $('#customize-control-x_icon_post_audio_colors_enable input');
  var typeTrigger6 = $('#customize-control-x_icon_post_quote_colors_enable input');
  var typeTrigger7 = $('#customize-control-x_icon_post_link_colors_enable input');

  var typeOption1  = $('#customize-control-x_icon_post_standard_color');
  var typeOption2  = $('#customize-control-x_icon_post_standard_background');
  var typeOption3  = $('#customize-control-x_icon_post_image_color');
  var typeOption4  = $('#customize-control-x_icon_post_image_background');
  var typeOption5  = $('#customize-control-x_icon_post_gallery_color');
  var typeOption6  = $('#customize-control-x_icon_post_gallery_background');
  var typeOption7  = $('#customize-control-x_icon_post_video_color');
  var typeOption8  = $('#customize-control-x_icon_post_video_background');
  var typeOption9  = $('#customize-control-x_icon_post_audio_color');
  var typeOption10 = $('#customize-control-x_icon_post_audio_background');
  var typeOption11 = $('#customize-control-x_icon_post_quote_color');
  var typeOption12 = $('#customize-control-x_icon_post_quote_background');
  var typeOption13 = $('#customize-control-x_icon_post_link_color');
  var typeOption14 = $('#customize-control-x_icon_post_link_background');

  if (!typeTrigger1.is(':checked')) {
    typeOption1.css('display', 'none');
    typeOption2.css('display', 'none');
  }

  if (!typeTrigger2.is(':checked')) {
    typeOption3.css('display', 'none');
    typeOption4.css('display', 'none');
  }

  if (!typeTrigger3.is(':checked')) {
    typeOption5.css('display', 'none');
    typeOption6.css('display', 'none');
  }

  if (!typeTrigger4.is(':checked')) {
    typeOption7.css('display', 'none');
    typeOption8.css('display', 'none');
  }

  if (!typeTrigger5.is(':checked')) {
    typeOption9.css('display', 'none');
    typeOption10.css('display', 'none');
  }

  if (!typeTrigger6.is(':checked')) {
    typeOption11.css('display', 'none');
    typeOption12.css('display', 'none');
  }

  if (!typeTrigger7.is(':checked')) {
    typeOption13.css('display', 'none');
    typeOption14.css('display', 'none');
  }

  typeTrigger1.change( function() {
    if (typeTrigger1.is(':checked')) {
      typeOption1.css('display', 'block');
      typeOption2.css('display', 'block');
    } else {
      typeOption1.css('display', 'none');
      typeOption2.css('display', 'none');
    }
  });

  typeTrigger2.change( function() {
    if (typeTrigger2.is(':checked')) {
      typeOption3.css('display', 'block');
      typeOption4.css('display', 'block');
    } else {
      typeOption3.css('display', 'none');
      typeOption4.css('display', 'none');
    }
  });

  typeTrigger3.change( function() {
    if (typeTrigger3.is(':checked')) {
      typeOption5.css('display', 'block');
      typeOption6.css('display', 'block');
    } else {
      typeOption5.css('display', 'none');
      typeOption6.css('display', 'none');
    }
  });

  typeTrigger4.change( function() {
    if (typeTrigger4.is(':checked')) {
      typeOption7.css('display', 'block');
      typeOption8.css('display', 'block');
    } else {
      typeOption7.css('display', 'none');
      typeOption8.css('display', 'none');
    }
  });

  typeTrigger5.change( function() {
    if (typeTrigger5.is(':checked')) {
      typeOption9.css('display', 'block');
      typeOption10.css('display', 'block');
    } else {
      typeOption9.css('display', 'none');
      typeOption10.css('display', 'none');
    }
  });

  typeTrigger6.change( function() {
    if (typeTrigger6.is(':checked')) {
      typeOption11.css('display', 'block');
      typeOption12.css('display', 'block');
    } else {
      typeOption11.css('display', 'none');
      typeOption12.css('display', 'none');
    }
  });

  typeTrigger7.change( function() {
    if (typeTrigger7.is(':checked')) {
      typeOption13.css('display', 'block');
      typeOption14.css('display', 'block');
    } else {
      typeOption13.css('display', 'none');
      typeOption14.css('display', 'none');
    }
  });

});



// Typography
// =============================================================================

jQuery(document).ready(function($) {

  var typeTrigger1 = $('#customize-control-x_custom_fonts input');
  var typeTrigger2 = $('#customize-control-x_custom_font_subsets input');
  var typeTrigger3 = $('#customize-control-x_logo_font_color_enable input');
  var typeTrigger4 = $('#customize-control-x_headings_font_color_enable input');
  var typeTrigger5 = $('#customize-control-x_body_font_color_enable input');

  var typeOption1  = $('#customize-control-x_logo_font_family');
  var typeOption2  = $('#customize-control-x_navbar_font_family');
  var typeOption3  = $('#customize-control-x_headings_font_family');
  var typeOption4  = $('#customize-control-x_body_font_family');
  var typeOption5  = $('#customize-control-x_custom_font_subset_cyrillic');
  var typeOption6  = $('#customize-control-x_custom_font_subset_greek');
  var typeOption7  = $('#customize-control-x_custom_font_subset_vietnamese');
  var typeOption8  = $('#customize-control-x_logo_font_color');
  var typeOption9  = $('#customize-control-x_headings_font_color');
  var typeOption10 = $('#customize-control-x_body_font_color');

  if (!typeTrigger1.is(':checked')) {
    typeOption1.css('display', 'none');
    typeOption2.css('display', 'none');
    typeOption3.css('display', 'none');
    typeOption4.css('display', 'none');
  }

  if (!typeTrigger2.is(':checked')) {
    typeOption5.css('display', 'none');
    typeOption6.css('display', 'none');
    typeOption7.css('display', 'none');
  }

  if (!typeTrigger3.is(':checked')) {
    typeOption8.css('display', 'none');
  }

  if (!typeTrigger4.is(':checked')) {
    typeOption9.css('display', 'none');
  }

  if (!typeTrigger5.is(':checked')) {
    typeOption10.css('display', 'none');
  }

  typeTrigger1.change( function() {
    if (typeTrigger1.is(':checked')) {
      typeOption1.css('display', 'block');
      typeOption2.css('display', 'block');
      typeOption3.css('display', 'block');
      typeOption4.css('display', 'block');
    } else if (!typeTrigger1.is(':checked')) {
      typeOption1.css('display', 'none');
      typeOption2.css('display', 'none');
      typeOption3.css('display', 'none');
      typeOption4.css('display', 'none');
    }
  });

  typeTrigger2.change( function() {
    if (typeTrigger2.is(':checked')) {
      typeOption5.css('display', 'block');
      typeOption6.css('display', 'block');
      typeOption7.css('display', 'block');
    } else if (!typeTrigger2.is(':checked')) {
      typeOption5.css('display', 'none');
      typeOption6.css('display', 'none');
      typeOption7.css('display', 'none');
    }
  });

  typeTrigger3.change( function() {
    if (typeTrigger3.is(':checked')) {
      typeOption8.css('display', 'block');
    } else {
      typeOption8.css('display', 'none');
    }
  });

  typeTrigger4.change( function() {
    if (typeTrigger4.is(':checked')) {
      typeOption9.css('display', 'block');
    } else {
      typeOption9.css('display', 'none');
    }
  });

  typeTrigger5.change( function() {
    if (typeTrigger5.is(':checked')) {
      typeOption10.css('display', 'block');
    } else {
      typeOption10.css('display', 'none');
    }
  });

});



// Button
// =============================================================================

jQuery(document).ready(function($) {

  var btnTrigger1 = $('#customize-control-x_button_style input[value="real"]');
  var btnTrigger2 = $('#customize-control-x_button_style input[value="flat"]');
  var btnTrigger3 = $('#customize-control-x_button_style input[value="transparent"]');

  var btnOption1 = $('#customize-control-x_button_background_color');
  var btnOption2 = $('#customize-control-x_button_background_color_hover');
  var btnOption3 = $('#customize-control-x_button_bottom_color');
  var btnOption4 = $('#customize-control-x_button_bottom_color_hover');

  var group = $('#customize-control-x_button_style input');

  if (btnTrigger1.is(':checked')) {
    btnOption1.css('display', 'block');
    btnOption2.css('display', 'block');
    btnOption3.css('display', 'block');
    btnOption4.css('display', 'block');
  }

  if (btnTrigger2.is(':checked')) {
    btnOption1.css('display', 'block');
    btnOption2.css('display', 'block');
    btnOption3.css('display', 'none');
    btnOption4.css('display', 'none');
  }

  if (btnTrigger3.is(':checked')) {
    btnOption1.css('display', 'none');
    btnOption2.css('display', 'none');
    btnOption3.css('display', 'none');
    btnOption4.css('display', 'none');
  }

  group.change( function() {
    if ($(this).val() === 'real') {
      btnOption1.css('display', 'block');
      btnOption2.css('display', 'block');
      btnOption3.css('display', 'block');
      btnOption4.css('display', 'block');
    } else if ($(this).val() === 'flat') {
      btnOption1.css('display', 'block');
      btnOption2.css('display', 'block');
      btnOption3.css('display', 'none');
      btnOption4.css('display', 'none');
    } else if ($(this).val() === 'transparent') {
      btnOption1.css('display', 'none');
      btnOption2.css('display', 'none');
      btnOption3.css('display', 'none');
      btnOption4.css('display', 'none');
    }
  });

});



// Header
// =============================================================================

jQuery(document).ready(function($) {

  var navbarTopTrigger1 = $('#customize-control-x_navbar_positioning input[value="static-top"]');
  var navbarTopTrigger2 = $('#customize-control-x_navbar_positioning input[value="fixed-top"]');
  var navbarTopOption1  = $('#customize-control-x_navbar_height');
  var navbarTopOption2  = $('#customize-control-x_logo_adjust_navbar_top');
  var navbarTopOption3  = $('#customize-control-x_navbar_adjust_links_top');

  var navbarSideTrigger1 = $('#customize-control-x_navbar_positioning input[value="fixed-left"]');
  var navbarSideTrigger2 = $('#customize-control-x_navbar_positioning input[value="fixed-right"]');
  var navbarSideOption1  = $('#customize-control-x_navbar_width');
  var navbarSideOption2  = $('#customize-control-x_logo_adjust_navbar_side');
  var navbarSideOption3  = $('#customize-control-x_navbar_adjust_links_side');
  var navbarSideDesc1    = $('#customize-control-x_header_description_navbar_width_height');
  var navbarSideDesc2    = $('#customize-control-x_header_description_navbar_adjust');

  var mastheadLayoutTrigger = $('#customize-control-x_logo_navigation_layout input[value="inline"]');
  var mastheadLayoutOption1 = $('#customize-control-x_logobar_adjust_spacing_top');
  var mastheadLayoutOption2 = $('#customize-control-x_logobar_adjust_spacing_bottom');

  var widgetbarTrigger = $('#customize-control-x_header_widget_areas input[value="0"]');
  var widgetbarOption1 = $('#customize-control-x_widgetbar_button_background');
  var widgetbarOption2 = $('#customize-control-x_widgetbar_button_background_hover');

  var topbarTrigger = $('#customize-control-x_topbar_display input');
  var topbarOption1 = $('#customize-control-x_topbar_content');

  var groupNavbarPosition    = $('#customize-control-x_navbar_positioning input');
  var groupMastheadLayout    = $('#customize-control-x_logo_navigation_layout input');
  var groupHeaderWidgetAreas = $('#customize-control-x_header_widget_areas input');

  if (navbarTopTrigger1.is(':checked') || navbarTopTrigger2.is(':checked')) {
    navbarTopOption1.css('display', 'block');
    navbarTopOption2.css('display', 'block');
    navbarTopOption3.css('display', 'block');
    navbarSideOption1.css('display', 'none');
    navbarSideOption2.css('display', 'none');
    navbarSideOption3.css('display', 'none');
    navbarSideDesc1.css('display', 'none');
    navbarSideDesc2.css('display', 'none');
  }

  if (navbarSideTrigger1.is(':checked') || navbarSideTrigger2.is(':checked')) {
    navbarTopOption1.css('display', 'block');
    navbarTopOption2.css('display', 'block');
    navbarTopOption3.css('display', 'block');
    navbarSideOption1.css('display', 'block');
    navbarSideOption2.css('display', 'block');
    navbarSideOption3.css('display', 'block');
    navbarSideDesc1.css('display', 'block');
    navbarSideDesc2.css('display', 'block');
  }

  if (mastheadLayoutTrigger.is(':checked')) {
    mastheadLayoutOption1.css('display', 'none');
    mastheadLayoutOption2.css('display', 'none');
  }

  if (widgetbarTrigger.is(':checked')) {
    widgetbarOption1.css('display', 'none');
    widgetbarOption2.css('display', 'none');
  }

  if (!topbarTrigger.is(':checked')) {
    topbarOption1.css('display', 'none');
  }

  groupNavbarPosition.change( function() {
    if ($(this).val() === 'static-top' || $(this).val() === 'fixed-top') {
      navbarTopOption1.css('display', 'block');
      navbarTopOption2.css('display', 'block');
      navbarTopOption3.css('display', 'block');
      navbarSideOption1.css('display', 'none');
      navbarSideOption2.css('display', 'none');
      navbarSideOption3.css('display', 'none');
      navbarSideDesc1.css('display', 'none');
      navbarSideDesc2.css('display', 'none');
    } else if ($(this).val() === 'fixed-left' || $(this).val() === 'fixed-right') {
      navbarTopOption1.css('display', 'block');
      navbarTopOption2.css('display', 'block');
      navbarTopOption3.css('display', 'block');
      navbarSideOption1.css('display', 'block');
      navbarSideOption2.css('display', 'block');
      navbarSideOption3.css('display', 'block');
      navbarSideDesc1.css('display', 'block');
      navbarSideDesc2.css('display', 'block');
    }
  });

  groupMastheadLayout.change( function() {
    if ($(this).val() === 'inline') {
      mastheadLayoutOption1.css('display', 'none');
      mastheadLayoutOption2.css('display', 'none');
    } else {
      mastheadLayoutOption1.css('display', 'block');
      mastheadLayoutOption2.css('display', 'block');
    }
  });

  groupHeaderWidgetAreas.change( function() {
    if ($(this).val() === '0') {
      widgetbarOption1.css('display', 'none');
      widgetbarOption2.css('display', 'none');
    } else {
      widgetbarOption1.css('display', 'block');
      widgetbarOption2.css('display', 'block');
    }
  });

  topbarTrigger.change( function() {
    if (topbarTrigger.is(':checked')) {
      topbarOption1.css('display', 'block');
    } else {
      topbarOption1.css('display', 'none');
    }
  });

});



// Footer
// =============================================================================

jQuery(document).ready(function($) {

  var footerTrigger1 = $('#customize-control-x_footer_bottom_display input');
  var footerTrigger2 = $('#customize-control-x_footer_content_display input');
  var footerTrigger3 = $('#customize-control-x_footer_content_dock_display input');
  var footerTrigger4 = $('#customize-control-x_footer_scroll_top_display input');

  var footerOption1  = $('#customize-control-x_footer_menu_display');
  var footerOption2  = $('#customize-control-x_footer_social_display');
  var footerOption3  = $('#customize-control-x_footer_content_display');
  var footerOption4  = $('#customize-control-x_footer_content');
  var footerOption5  = $('#customize-control-x_footer_content_dock_position');
  var footerOption6  = $('#customize-control-x_footer_content_dock_width');
  var footerOption7  = $('#customize-control-x_footer_content_dock_display_unit');
  var footerOption8  = $('#customize-control-x_footer_content_dock_include_pages');
  var footerOption9  = $('#customize-control-x_footer_content_dock_include_posts');
  var footerOption10 = $('#customize-control-x_footer_scroll_top_position');
  var footerOption11 = $('#customize-control-x_footer_scroll_top_display_unit');

  if (!footerTrigger1.is(':checked')) {
    footerOption1.css('display', 'none');
    footerOption2.css('display', 'none');
    footerOption3.css('display', 'none');
    footerOption4.css('display', 'none');
  }

  if (!footerTrigger2.is(':checked')) {
    footerOption4.css('display', 'none');
  }

  if (!footerTrigger3.is(':checked')) {
    footerOption5.css('display', 'none');
    footerOption6.css('display', 'none');
    footerOption7.css('display', 'none');
    footerOption8.css('display', 'none');
    footerOption9.css('display', 'none');
  }

  if (!footerTrigger4.is(':checked')) {
    footerOption10.css('display', 'none');
    footerOption11.css('display', 'none');
  }

  footerTrigger1.change( function() {
    if (footerTrigger1.is(':checked') && footerTrigger2.is(':checked')) {
      footerOption1.css('display', 'block');
      footerOption2.css('display', 'block');
      footerOption3.css('display', 'block');
      footerOption4.css('display', 'block');
    } else if (footerTrigger1.is(':checked')) {
      footerOption1.css('display', 'block');
      footerOption2.css('display', 'block');
      footerOption3.css('display', 'block');
    } else {
      footerOption1.css('display', 'none');
      footerOption2.css('display', 'none');
      footerOption3.css('display', 'none');
      footerOption4.css('display', 'none');
    }
  });

  footerTrigger2.change( function() {
    if (footerTrigger2.is(':checked')) {
      footerOption4.css('display', 'block');
    } else {
      footerOption4.css('display', 'none');
    }
  });

  footerTrigger3.change( function() {
    if (footerTrigger3.is(':checked')) {
      footerOption5.css('display', 'block');
      footerOption6.css('display', 'block');
      footerOption7.css('display', 'block');
      footerOption8.css('display', 'block');
      footerOption9.css('display', 'block');
    } else {
      footerOption5.css('display', 'none');
      footerOption6.css('display', 'none');
      footerOption7.css('display', 'none');
      footerOption8.css('display', 'none');
      footerOption9.css('display', 'none');
    }
  });

  footerTrigger4.change( function() {
    if (footerTrigger4.is(':checked')) {
      footerOption10.css('display', 'block');
      footerOption11.css('display', 'block');
    } else {
      footerOption10.css('display', 'none');
      footerOption11.css('display', 'none');
    }
  });

});



// Blog
// =============================================================================

jQuery(document).ready(function($) {

  var blogTrigger1 = $('#customize-control-x_blog_style input[value="standard"]');
  var blogTrigger2 = $('#customize-control-x_archive_style input[value="standard"]');
  var blogTrigger3 = $('#customize-control-x_blog_enable_full_post_content input');

  var blogOption1  = $('#customize-control-x_blog_sub_title_blog_masonry');
  var blogOption2  = $('#customize-control-x_blog_description_blog_masonry');
  var blogOption3  = $('#customize-control-x_blog_masonry_columns');
  var blogOption4  = $('#customize-control-x_blog_sub_title_archive_masonry');
  var blogOption5  = $('#customize-control-x_blog_description_archive_masonry');
  var blogOption6  = $('#customize-control-x_archive_masonry_columns');
  var blogOption7  = $('#customize-control-x_blog_excerpt_length');

  var group1 = $('#customize-control-x_blog_style input');
  var group2 = $('#customize-control-x_archive_style input');

  if (blogTrigger1.is(':checked')) {
    blogOption1.css('display', 'none');
    blogOption2.css('display', 'none');
    blogOption3.css('display', 'none');
  }

  if (blogTrigger2.is(':checked')) {
    blogOption4.css('display', 'none');
    blogOption5.css('display', 'none');
    blogOption6.css('display', 'none');
  }

  if (blogTrigger3.is(':checked')) {
    blogOption7.css('display', 'none');
  }

  blogTrigger3.change( function() {
    if (blogTrigger3.is(':checked')) {
      blogOption7.css('display', 'none');
    } else {
      blogOption7.css('display', 'block');
    }
  });

  group1.change( function() {
    if ($(this).val() === 'standard') {
      blogOption1.css('display', 'none');
      blogOption2.css('display', 'none');
      blogOption3.css('display', 'none');
    } else if ($(this).val() === 'masonry') {
      blogOption1.css('display', 'block');
      blogOption2.css('display', 'block');
      blogOption3.css('display', 'block');
    }
  });

  group2.change( function() {
    if ($(this).val() === 'standard') {
      blogOption4.css('display', 'none');
      blogOption5.css('display', 'none');
      blogOption6.css('display', 'none');
    } else if ($(this).val() === 'masonry') {
      blogOption4.css('display', 'block');
      blogOption5.css('display', 'block');
      blogOption6.css('display', 'block');
    }
  });

});



// WooCommerce
// =============================================================================

jQuery(document).ready(function($) {

  var wooTrigger1 = $('#customize-control-x_woocommerce_product_tabs_enable input');
  var wooTrigger2 = $('#customize-control-x_woocommerce_product_related_enable input');
  var wooTrigger3 = $('#customize-control-x_woocommerce_product_upsells_enable input');
  var wooTrigger4 = $('#customize-control-x_woocommerce_cart_cross_sells_enable input');

  var wooOption1 = $('#customize-control-x_woocommerce_product_tab_description_enable');
  var wooOption2 = $('#customize-control-x_woocommerce_product_tab_additional_info_enable');
  var wooOption3 = $('#customize-control-x_woocommerce_product_tab_reviews_enable');
  var wooOption4 = $('#customize-control-x_woocommerce_product_related_columns');
  var wooOption5 = $('#customize-control-x_woocommerce_product_related_count');
  var wooOption6 = $('#customize-control-x_woocommerce_product_upsell_columns');
  var wooOption7 = $('#customize-control-x_woocommerce_product_upsell_count');
  var wooOption8 = $('#customize-control-x_woocommerce_cart_cross_sells_columns');
  var wooOption9 = $('#customize-control-x_woocommerce_cart_cross_sells_count');

  var group = $('#customize-control-x_button_style input');

  if (!wooTrigger1.is(':checked')) {
    wooOption1.css('display', 'none');
    wooOption2.css('display', 'none');
    wooOption3.css('display', 'none');
  }

  if (!wooTrigger2.is(':checked')) {
    wooOption4.css('display', 'none');
    wooOption5.css('display', 'none');
  }

  if (!wooTrigger3.is(':checked')) {
    wooOption6.css('display', 'none');
    wooOption7.css('display', 'none');
  }

  if (!wooTrigger4.is(':checked')) {
    wooOption8.css('display', 'none');
    wooOption9.css('display', 'none');
  }

  wooTrigger1.change( function() {
    if (wooTrigger1.is(':checked')) {
      wooOption1.css('display', 'block');
      wooOption2.css('display', 'block');
      wooOption3.css('display', 'block');
    } else {
      wooOption1.css('display', 'none');
      wooOption2.css('display', 'none');
      wooOption3.css('display', 'none');
    }
  });

  wooTrigger2.change( function() {
    if (wooTrigger2.is(':checked')) {
      wooOption4.css('display', 'block');
      wooOption5.css('display', 'block');
    } else {
      wooOption4.css('display', 'none');
      wooOption5.css('display', 'none');
    }
  });

  wooTrigger3.change( function() {
    if (wooTrigger3.is(':checked')) {
      wooOption6.css('display', 'block');
      wooOption7.css('display', 'block');
    } else {
      wooOption6.css('display', 'none');
      wooOption7.css('display', 'none');
    }
  });

  wooTrigger4.change( function() {
    if (wooTrigger4.is(':checked')) {
      wooOption8.css('display', 'block');
      wooOption9.css('display', 'block');
    } else {
      wooOption8.css('display', 'none');
      wooOption9.css('display', 'none');
    }
  });

});