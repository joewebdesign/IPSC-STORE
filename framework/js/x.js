// =============================================================================
// JS/X.JS
// -----------------------------------------------------------------------------
// Theme specific functions.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Global Functions
// =============================================================================

// Global Functions
// =============================================================================

jQuery(document).ready(function($) {

  //
  // Prevent default behavior of various toggles.
  //

  $('.x-btn-navbar, .x-btn-widgetbar').click(function(e) {
    e.preventDefault();
  });


  //
  // Scroll to the bottom of the slider.
  //

  $('.x-slider-revolution-container.above .x-slider-scroll-bottom').click(function(e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: $('.x-slider-revolution-container.above').outerHeight()
    }, 850, 'easeInOutExpo');
  });

  $('.x-slider-revolution-container.below .x-slider-scroll-bottom').click(function(e) {
    e.preventDefault();
    var $mastheadHeight       = $('.masthead').outerHeight();
    var $navbarFixedTopHeight = $('.x-navbar-fixed-top-active .x-navbar').outerHeight();
    var $sliderAboveHeight    = $('.x-slider-revolution-container.above').outerHeight();
    var $sliderBelowHeight    = $('.x-slider-revolution-container.below').outerHeight();
    var $heightSum            = $mastheadHeight + $sliderAboveHeight + $sliderBelowHeight - $navbarFixedTopHeight;
    $('html, body').animate({
      scrollTop: $heightSum
    }, 850, 'easeInOutExpo');
  });


  //
  // Apply appropriate classes for the fixed-top navbar.
  //

  var $window     = $(window);
  var $this       = $(this);
  var $body       = $('body');
  var $navbar     = $('.x-navbar');
  var $navbarWrap = $('.x-navbar-fixed-top-active .x-navbar-wrap');

  if ( ! $body.hasClass('page-template-template-blank-3-php') && ! $body.hasClass('page-template-template-blank-6-php') && ! $body.hasClass('page-template-template-blank-7-php') && ! $body.hasClass('page-template-template-blank-8-php') ) {
    if ( $body.hasClass('x-boxed-layout-active') && $body.hasClass('x-navbar-fixed-top-active') && $body.hasClass('admin-bar') ) {
      $window.scroll(function() {
        var $adminbarHeight = $('#wpadminbar').outerHeight();
        var $menuTop        = $navbarWrap.offset().top - $adminbarHeight;
        var $current        = $this.scrollTop();
        if ($current >= $menuTop) {
          $navbar.addClass('x-navbar-fixed-top x-container-fluid max width');
        } else {
          $navbar.removeClass('x-navbar-fixed-top x-container-fluid max width');
        }
      });
    } else if ( $body.hasClass('x-navbar-fixed-top-active') && $body.hasClass('admin-bar') ) {
      $window.scroll(function() {
        var $adminbarHeight = $('#wpadminbar').outerHeight();
        var $menuTop        = $navbarWrap.offset().top - $adminbarHeight;
        var $current        = $this.scrollTop();
        if ($current >= $menuTop) {
          $navbar.addClass('x-navbar-fixed-top');
        } else {
          $navbar.removeClass('x-navbar-fixed-top');
        }
      });
    } else if ( $body.hasClass('x-boxed-layout-active') && $body.hasClass('x-navbar-fixed-top-active') ) {
      $window.scroll(function() {
        var $menuTop = $navbarWrap.offset().top;
        var $current = $this.scrollTop();
        if ($current >= $menuTop) {
          $navbar.addClass('x-navbar-fixed-top x-container-fluid max width');
        } else {
          $navbar.removeClass('x-navbar-fixed-top x-container-fluid max width');
        }
      });
    } else if ( $body.hasClass('x-navbar-fixed-top-active') ) {
      $window.scroll(function() {
        var $menuTop = $navbarWrap.offset().top;
        var $current = $this.scrollTop();
        if ($current >= $menuTop) {
          $navbar.addClass('x-navbar-fixed-top');
        } else {
          $navbar.removeClass('x-navbar-fixed-top');
        }
      });
    }
  }


  //
  // YouTube z-index fix.
  //

  $('iframe[src*="youtube.com"]').each(function() {
    var url = $(this).attr('src');
    if ($(this).attr('src').indexOf('?') > 0) {
      $(this).attr({
        'src'   : url + '&wmode=transparent',
        'wmode' : 'Opaque'
      });
    } else {
      $(this).attr({
        'src'   : url + '?wmode=transparent',
        'wmode' : 'Opaque'
      });
    }
  });


  //
  // Add class if dropdown menus go offscreen.
  //

  // $('.menu-item-has-children').on('mouseenter mouseleave', function(e) {
  //   var elm  = $('ul:first', this);
  //   var off  = elm.offset(); // .css({'display' : 'block', 'visibility' : 'visible'})
  //   var l    = off.left;
  //   var w    = elm.width();
  //   var docW = $window.width();

  //   var isEntirelyVisible = (l + w <= docW);

  //   console.log('Element: ' + elm);
  //   console.log('Offset: ' + off);
  //   console.log('Left: ' + l);
  //   console.log('Width: ' + w);
  //   console.log('Document Width: ' + docW);
  //   console.log('Is Entirely Visible: ' + isEntirelyVisible);

  //   if ( ! isEntirelyVisible ) {
  //     $this.addClass('edge');
  //     // console.log('Left edge hidden.');
  //   } else {
  //     $this.removeClass('edge');
  //     // console.log('Dropdown gone.');
  //   }
  // });

});