<?php

// =============================================================================
// HEADER.PHP
// -----------------------------------------------------------------------------
// The site header. Variable output across different stacks.
//
// Content is output based on which Stack has been selected in the Customizer.
// To view and/or edit the markup of your Stack's index, first go to "views"
// inside the "framework" subdirectory. Once inside, find your Stack's folder
// and look for a file called "wp-header.php," where you'll be able to find the
// appropriate output.
// =============================================================================

?>

<link rel="stylesheet" href="http://ipsc.ro/store/wp-content/uploads/2014/07/OrganicTabs/css/style.css">
	
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js'></script>
    <script src="http://ipsc.ro/store/wp-content/uploads/2014/07/OrganicTabs/js/organictabs.jquery.js"></script>
    <script>
        $(function() {
    
            $("#example-one").organicTabs();
            
            $("#example-two").organicTabs({
                "speed": 200
            });
    
        });
    </script>

<?php x_get_view( x_get_stack(), 'wp', 'header' ); 


if (is_product() && has_term( 'swcat', 'product_cat' ) ) {
	
		?>
    
    <style>
	.x-navbar {
background-image: url('https://ipsc.ro/store/wp-content/uploads/2014/07/background3.jpg') !important;
}

body {
background: #f3f3f3 url(https://www.ipsc.ro/store/wp-content/uploads/2014/07/bgrswarovskioptik.jpg) center top no-repeat;
}

.x-brand img {
width: 140px !important;
}
</style>
   <?php 
 }   
    
	


?>