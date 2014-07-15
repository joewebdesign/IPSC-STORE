<?php

// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Theme functions for X.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Template Directory
//   02. Set Paths
//   03. Require Files
// =============================================================================

// Template Directory
// =============================================================================

$template_directory = get_template_directory();



// Set Paths
// =============================================================================

$func_path = $template_directory . '/framework/functions';
$glob_path = $template_directory . '/framework/functions/global';
$admn_path = $template_directory . '/framework/functions/global/admin';
$eque_path = $template_directory . '/framework/functions/global/enqueue';
$wdgt_path = $template_directory . '/framework/functions/global/widgets';



// Require Files
// =============================================================================

//
// Get stack data.
//

require_once( $glob_path . '/stack-data.php' );


//
// Admin panel.
//

require_once( $admn_path . '/thumbnails.php' );
require_once( $admn_path . '/setup.php' );
require_once( $admn_path . '/meta/setup.php' );
require_once( $admn_path . '/sidebars.php' );
require_once( $admn_path . '/widgets.php' );
require_once( $admn_path . '/custom-post-types.php' );
require_once( $admn_path . '/customizer/setup.php' );
require_once( $admn_path . '/visual-composer.php' );


//
// TMG plugin activation.
//

require_once( $admn_path . '/tmg/activation.php' );
require_once( $admn_path . '/tmg/registration.php' );
require_once( $admn_path . '/tmg/updates.php' );


//
// Enqueue styles and scripts.
//

require_once( $eque_path . '/styles.php' );
require_once( $eque_path . '/scripts.php' );


//
// Global functions.
//

require_once( $glob_path . '/featured.php' );
require_once( $glob_path . '/pagination.php' );
require_once( $glob_path . '/breadcrumbs.php' );
require_once( $glob_path . '/classes.php' );
require_once( $glob_path . '/portfolio.php' );
require_once( $glob_path . '/woocommerce.php' );
require_once( $glob_path . '/social.php' );
require_once( $glob_path . '/content.php' );
require_once( $glob_path . '/remove.php' );


//
// Stack specific functions.
//

require_once( $func_path . '/integrity.php' );
require_once( $func_path . '/renew.php' );
require_once( $func_path . '/icon.php' );


//
// Widgets.
//

require_once( $wdgt_path . '/dribbble.php' );
require_once( $wdgt_path . '/flickr.php' );