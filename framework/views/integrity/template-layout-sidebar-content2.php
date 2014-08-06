<?php

// =============================================================================
// VIEWS/INTEGRITY/TEMPLATE-LAYOUT-SIDEBAR-CONTENT2.PHP
// -----------------------------------------------------------------------------
// Sidebar left, content right page output for Integrity2.
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

<?php x_get_view( x_get_stack(), 'wp', 'header2' ); ?>


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