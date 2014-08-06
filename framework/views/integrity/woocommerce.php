<?php

// =============================================================================
// VIEWS/INTEGRITY/WOOCOMMERCE.PHP
// -----------------------------------------------------------------------------
// WooCommerce page output for Integrity.
// =============================================================================

?>

<?php get_header(); ?>

  <div class="x-container-fluid max width offset cf">
    <div class="<?php // x_integrity_main_content_class(); ?>x-main right" role="main">

      <?php woocommerce_content(); ?>

    </div> <!-- end .x-main -->

    <?php //get_sidebar(); ?>
    
<?php 
if (is_product() && has_term( 'swcat', 'product_cat' ) ) { ?>
	 <div id="example-one">
        			
        	<ul class="nav">
                <li class="nav-one"><a href="#featured" class="current">Categorii</a></li>
                
                
             
            </ul>
        	
        	<div class="list-wrap">
        	
        		<ul id="featured">
        			 <?php dynamic_sidebar( 'swarovski' ); ?>
        			
        		</ul>
        		 
        		 <ul id="core" class="hide">
                    
        			<div class="x-sidebar "><?php dynamic_sidebar( 'main2' ); ?></div>
        		 </ul>
        		 
        		 
        		 
        	 </div> <!-- END List Wrap -->
         
         </div>

<?php
		}
		else {
		
?>
		
    
    <div id="example-one">
        			
        	<ul class="nav">
                <li class="nav-one"><a href="#featured" class="current">Categorii</a></li>
                <li class="nav-two"><a href="#core">BRANDURI</a></li>
                
             
            </ul>
        	
        	<div class="list-wrap">
        	
        		<ul id="featured">
        			 <?php dynamic_sidebar( 'main' ); ?>
        			
        		</ul>
        		 
        		 <ul id="core" class="hide">
                    
        			<div class="x-sidebar "><?php dynamic_sidebar( 'main2' ); ?></div>
        		 </ul>
        		 
        		 
        		 
        	 </div> <!-- END List Wrap -->
         
         </div>

<?php
		}
		
		
?>


  </div> <!-- end .x-container-fluid.max.width.offset.cf -->

<?php get_footer(); ?>