<?php

// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/META/TAXONOMIES.PHP
// -----------------------------------------------------------------------------
// Implement the meta boxes for taxonomy pages.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   05. Add New Taxonomy Page
//   06. Edit Taxonomy Page
//   07. Save Taxonomy Meta
//   08. Taxonomy Actions
// =============================================================================

// Add New Taxonomy Page
// =============================================================================

function x_taxonomy_add_new_meta_field() {
  ?>
  <div class="form-field">
    <label for="term_meta[archive-title]"><?php _e( 'Archive Title', '__x__' ); ?></label>
    <input type="text" name="term_meta[archive-title]" id="term_meta[archive-title]" value="">
    <p class="description"><?php _e( 'Enter in a value to overwrite the default title of the archive page.', '__x__' ); ?></p>
  </div>
  <div class="form-field">
    <label for="term_meta[archive-subtitle]"><?php _e( 'Archive Subtitle', '__x__' ); ?></label>
    <input type="text" name="term_meta[archive-subtitle]" id="term_meta[archive-subtitle]" value="">
    <p class="description"><?php _e( 'Enter in a value to overwrite the default subtitle of the archive page. Note that not all Stacks display the subtitle on their archive pages.', '__x__' ); ?></p>
  </div>
  <?php
}



// Edit Taxonomy Page
// =============================================================================

function x_taxonomy_edit_meta_field( $term ) {

  $t_id      = $term->term_id;
  $term_meta = get_option( 'taxonomy_' . $t_id );

  ?>
  <tr class="form-field">
    <th scope="row" valign="top"><label for="term_meta[archive-title]"><?php _e( 'Archive Title', '__x__' ); ?></label></th>
    <td>
      <input type="text" name="term_meta[archive-title]" id="term_meta[archive-title]" value="<?php echo esc_attr( $term_meta['archive-title'] ) ? esc_attr( $term_meta['archive-title'] ) : ''; ?>">
      <p class="description"><?php _e( 'Enter in a value to overwrite the default title of the archive page.', '__x__' ); ?></p>
    </td>
  </tr>
  <tr class="form-field">
    <th scope="row" valign="top"><label for="term_meta[archive-subtitle]"><?php _e( 'Archive Subtitle', '__x__' ); ?></label></th>
    <td>
      <input type="text" name="term_meta[archive-subtitle]" id="term_meta[archive-subtitle]" value="<?php echo esc_attr( $term_meta['archive-subtitle'] ) ? esc_attr( $term_meta['archive-subtitle'] ) : ''; ?>">
      <p class="description"><?php _e( 'Enter in a value to overwrite the default subtitle of the archive page. Note that not all Stacks display the subtitle on their archive pages.', '__x__' ); ?></p>
    </td>
  </tr>
  <?php
}



// Save Taxonomy Meta
// =============================================================================

function x_taxonomy_save_custom_meta( $term_id ) {
  if ( isset( $_POST['term_meta'] ) ) {
    $t_id      = $term_id;
    $term_meta = get_option( "taxonomy_$t_id" );
    $cat_keys  = array_keys( $_POST['term_meta'] );
    foreach ( $cat_keys as $key ) {
      if ( isset ( $_POST['term_meta'][$key] ) ) {
        $term_meta[$key] = $_POST['term_meta'][$key];
      }
    }
    update_option( "taxonomy_$t_id", $term_meta );
  }
}



// Taxonomy Actions
// =============================================================================

$x_taxonomies = array( 'category', 'post_tag', 'portfolio-category', 'portfolio-tag', 'product_cat', 'product_tag' );

foreach ( $x_taxonomies as $x_taxonomy ) {
  add_action( $x_taxonomy . '_add_form_fields',  'x_taxonomy_add_new_meta_field', 10, 2 );
  add_action( $x_taxonomy . '_edit_form_fields', 'x_taxonomy_edit_meta_field',    10, 2 );
  add_action( 'edited_' . $x_taxonomy,           'x_taxonomy_save_custom_meta',   10, 2 );
  add_action( 'create_' . $x_taxonomy,           'x_taxonomy_save_custom_meta',   10, 2 );
}