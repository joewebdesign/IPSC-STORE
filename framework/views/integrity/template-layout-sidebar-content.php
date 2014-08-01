<?php

// =============================================================================
// VIEWS/INTEGRITY/TEMPLATE-LAYOUT-SIDEBAR-CONTENT.PHP
// -----------------------------------------------------------------------------
// Sidebar left, content right page output for Integrity.
// =============================================================================

?>
<?php get_header(); ?>

  <div class="x-container-fluid max width offset cf">
    <div class="x-main right" role="main">

      <?php while ( have_posts() ) : the_post(); ?>
        <?php x_get_view( 'integrity', 'content', 'page' ); ?>
        <?php x_get_view( 'integrity', '_comments-template' ); ?>
      <?php endwhile; ?>

    </div> <!-- end .x-main -->
	<?php /*get_sidebar();*/ ?>
   
   
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
   
 
    
  </div> <!-- end .x-container-fluid.max.width.offset.cf -->

<?php get_footer(); ?>