<?php

// =============================================================================
// VIEWS/GLOBAL/_BRAND.PHP
// -----------------------------------------------------------------------------
// Outputs the brand.
// =============================================================================

$site_name        = get_bloginfo( 'name' );
$site_description = get_bloginfo( 'description' );
$logo             = get_theme_mod( 'x_logo' );

?>

<?php

if ( is_front_page() ) :
  echo '<h1 class="visually-hidden">' . $site_name . '</h1>';
endif;

?>

<a href="<?php echo home_url( '/' ); ?>" class="<?php x_brand_class(); ?>" title="<?php echo $site_description; ?>">

  <?php

  if ( $logo == '' ) :
    echo $site_name;
  else :
    echo '<img src="' . $logo . '" alt="' . $site_description . '">';
  endif;

  ?>

</a>