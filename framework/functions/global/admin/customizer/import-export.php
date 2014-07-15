<?php 

// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/CUSTOMIZER/IMPORT-EXPORT.PHP
// -----------------------------------------------------------------------------
// Sets up import/export functionality for the Customizer.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Turn on Output Buffering
//   02. Import Page
//   03. Export Page
// =============================================================================

// Turn on Output Buffering
// =============================================================================

ob_start();



// Import Page
// =============================================================================

function x_customizer_import_option_page() {
?>
  <div class="wrap">
    <div id="icon-tools" class="icon32"><br></div>
    <h2>Customizer Import</h2>
    <?php
    if ( isset( $_FILES['import'] ) && check_admin_referer( 'x-customizer-import' ) ) {
      if ( $_FILES['import']['error'] > 0 ) {
        wp_die( 'An error occured.' );
      } else {
        $file_name = $_FILES['import']['name'];
        $file_ext  = strtolower( end( explode( '.', $file_name ) ) );
        $file_size = $_FILES['import']['size'];
        if ( ( $file_ext == 'json' ) && ( $file_size < 500000 ) ) {
          $encode_options = file_get_contents( $_FILES['import']['tmp_name'] );
          $options        = json_decode( $encode_options, true );
          foreach ( $options as $key => $value ) {
            set_theme_mod( $key, $value );
          }
          echo '<div class="updated"><p>All options were restored successfully!</p></div>';
        } else {
          echo '<div class="error"><p>Invalid file or file size too big.</p></div>';
        }
      }
    }
    ?>
    <form method="post" enctype="multipart/form-data">
      <?php wp_nonce_field( 'x-customizer-import' ); ?>
      <p>Howdy! Upload your X Customizer Settings (XCS) file and we&apos;ll import the options into this site.</p>
      <p>Choose a XCS (.json) file to upload, then click Upload file and import.</p>
      <p>Choose a file from your computer: <input type="file" id="customizer-upload" name="import"></p>
      <p class="submit">
        <input type="submit" name="submit" id="customizer-submit" class="button" value="Upload file and import" disabled>
      </p>
    </form>
  </div>
<?php
}



// Export Page
// =============================================================================

function x_customizer_export_option_page() {
  if ( ! isset( $_POST['export'] ) ) {
  ?>
    <div class="wrap">
      <div id="icon-tools" class="icon32"><br></div>
      <h2>Customizer Export</h2>
      <form method="post">
        <?php wp_nonce_field( 'x-customizer-export' ); ?>
        <p>When you click the button below WordPress will create a JSON file for you to save to your computer.</p>
        <p>This format, which we call X Customizer Settings or XCS, will contain your Customizer settings for X.</p>
        <p>Once you&apos;ve saved the download file, you can use the X Customizer Import function to import the previusly exported settings.</p>
        <p class="submit"><input type="submit" name="export" class="button button-primary" value="Download XCS File"></p>
      </form>
    </div>
  <?php
  } elseif ( check_admin_referer( 'x-customizer-export' ) ) {

    $blogname  = strtolower( str_replace( ' ', '', get_option( 'blogname' ) ) );
    $date      = date( 'm-d-Y' );
    $json_name = $blogname . '-x-customizer-' . $date;
    $options   = get_theme_mods();

    unset( $options['nav_menu_locations'] );

    foreach ( $options as $key => $value ) {
      $value              = maybe_unserialize( $value );
      $need_options[$key] = $value;
    }

    $json_file = json_encode( $need_options );

    ob_clean();

    echo $json_file;

    header( 'Content-Type: text/json; charset=' . get_option( 'blog_charset' ) );
    header( 'Content-Disposition: attachment; filename="' . $json_name . '.json"' );

    exit();

  }
}