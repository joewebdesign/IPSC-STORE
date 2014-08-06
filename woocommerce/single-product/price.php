<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $ValUnEuro, $PretFaraTVA, $PretEuro, $PretFaraTVA_Membru;
?>
<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	
    
      
   <?php /*?><span class="amount"> Pret:</span> <p class="price"><span class="amount"><?php echo $PretFaraTVA; ?>Euro + TVA</span></p>
   
   <span class="amount"> Total de Plata:</span> <p class="price"><span class="amount"><?php echo $PretEuro; ?> Euro (<?php echo $product->get_price_html(); ?>)</span></p><?php */?>
	
    
    
     
 <?php 
 if (is_product() && has_term( 'swcat', 'product_cat' ) ) { ?>
     	<span class="amount"> Pret:</span> <p class="price"><span class="amount"><?php echo $PretEuro; ?>Euro + TVA</span>
 
 <?php
 		} else {
 
 ModifinPret(); }
 
 
 
 ?>  
    



	<meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
    
	<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

</div>