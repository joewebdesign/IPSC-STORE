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

/////////////////// CHANGE PRICE

//////////////////////////////////IA CURSUL VALUTAR BNR

function TraducereRomana() {
	define("DATA_NECUNOSCUTA", "necunoscuta");
	define("NEDISPONIBIL", "nedisponibil");
	define("EROARE_PRELUARE", "Eroare la preluarea datelor.");
}

class TValuta{
	var $euro;				//cursul oficial EURO asa cum a fost el preluat
	var $dolar;				//cursul oficial USD asa cum a fost el preluat
	var $data;				//data pentru care este valabil cursul asa cum a fost ea prealuata
	var $EuroCaNumar;		//cursul oficial EURO ca un numar intreg
	var $DolarCaNumar;		//cursul oficial USD ca un numar intreg
	var $Limba;				//Limba in care se afiseaza cursul valutar
	var $Ziua;				//ziua cursului valutar (intreg)
	var $Luna;				//luna cursului valutar (intreg)
	var $Anul;				//anul cursului valutar (intreg)
//-----------------------------------------------------------------

	//data pentru care este valabil cursul, ca timestamp UNIX

	function DataCaTimeStamp() {
		return mktime(0,0,0,$this->Luna,$this->Ziua,$this->Anul);
	}
//-----------------------------------------------------------------
	function TValuta($limba) {

		$fisier_cursv="cursv.txt";
		$this->Limba = $limba;
		
		if (empty($limba)) {
			$this->Limba = "RO";
		}
			
		if (file_exists("TValuta.".$this->Limba.".php")) {
			include("TValuta.".$this->Limba.".php");
		}
		else {
			TraducereRomana();
		}
			
		$preluare_corecta = true;
		
		if( date("d", @filemtime($fisier_cursv)) != date("d") || !file_exists($fisier_cursv))	//daca data ultimei modificari a fisierului ce retine cursul valutar este diferita de ziua data de azi, il preluam
			$sursa_date = "http://www.bnro.ro/nbrfxrates.xml";
		else
			$sursa_date = "cursv.txt";
			
		$xmlstr = @file_get_contents($sursa_date);
		
		if (empty ($xmlstr) ){
		  throw new Exception(EROARE_PRELUARE);		
		}
		
		$xml = new SimpleXMLElement($xmlstr);
		
		foreach ($xml->Body[0]->Cube[0]->Rate as $rate) {
		    switch($rate['currency']) {
		    case 'EUR': {
		        $this->euro = (string)$rate;
				$this->EuroCaNumar = floatval($rate);
		        break;
				}
		    case 'USD': {
		        $this->dolar = (string)$rate;
				$this->DolarCaNumar = floatval($rate);
		        break;
				}		
		    } 	 
		}	

		$this->data = (string) $xml->Body[0]->Cube['date'];
			
		$parsed_date = date_parse($this->data);
		
		if($parsed_date) {
	   		$this->Ziua = $parsed_date['day'];
			$this->Luna = $parsed_date['month'];
			$this->Anul = $parsed_date['year'];
		}
			
		if( empty($this->data) || !checkdate ($this->Luna, $this->Ziua, $this->Anul) ) {
			$this->data = DATA_NECUNOSCUTA;
			$preluare_corecta = FALSE;
		}
		if(!$this->EuroCaNumar) {
			$this->euro = NEDISPONIBIL;
			$preluare_corecta = FALSE;
		}
		if(!$this->DolarCaNumar) {
			$this->dolar = NEDISPONIBIL;
			$preluare_corecta = FALSE;
		}
		
		//actualizam informatiile din fisierul ce retine cursul valutar
		if ($preluare_corecta) {
			$hfisier_cursv = @fopen($fisier_cursv,"w");
			@fputs($hfisier_cursv, $xmlstr);
			@fclose($hfisier_cursv);
		}

	}//end functie preluare (constructor)
//-----------------------------------------------------------------
	function DataInFormatLocal()
	{
		switch($this->Limba) {
			case "EN": $FormatData = "m-d-Y"; break;
			case "RO": $FormatData = "d.m.Y"; break;
			
			default: $FormatData = "m-d-Y";
		}

		$ret = @date($FormatData,$this->DataCaTimeStamp());

		return $ret ? $ret : DATA_NECUNOSCUTA;
	}
//-----------------------------------------------------------------
}//end definitie clasa
//=================================================================


///////////////////////////////////// END IA CURSUL VALUTAR


function return_custom_price($price, $product) {       
        global $post, $woocommerce, $ValUnEuro, $pretinlei, $PretFaraTVA, $PretEuro;
        $post_id = $post->ID;
        
	$valuta = new TValuta("RO");
	$ValUnEuro = $valuta->euro;
		
	$PretEuro = $price;
	$PretFaraTVA = $price - (0.24 * $price);
	$pretinlei = $ValUnEuro * $price;
	
        if (is_user_logged_in()){
		$user_id = username_exists($_SESSION['username']);
		$is_founder = get_user_meta($user_id, 'founder', true);
		$is_member = get_user_meta($user_id, 'member', true);

		if ($is_founder) {
			$price *= 0.95;
			$PretEuro = $price;
			$PretFaraTVA = $price - (0.24 * $price);
			return $pretinlei * 0.95;
			
		} else if ($is_member) {
			$price *= 0.98;
			$PretEuro = $price;
			$PretFaraTVA = $price - (0.24 * $price);
			return $pretinlei * 0.98;
		} else {
			return $pretinlei;
		}
        } else {
		//Daca e vizitator
                return $pretinlei;
        }              
		
	/*
	Functia if de mai sus afiseaza pretul corect in functie de conditiile care le vom pune
	*/
		
}      
add_filter('woocommerce_get_price', 'return_custom_price', $product, 2);  

function ModifinPret() {
	global $PretFaraTVA, $PretEuro, $pretinlei, $PretFaraTVA_Membru, $price;
	
	 if (is_user_logged_in()){
		$user_id = username_exists($_SESSION['username']);
		$is_founder = get_user_meta($user_id, 'founder', true);
		$is_member = get_user_meta($user_id, 'member', true);

		if ($is_founder) {
			
			$PretFaraTVA = $PretFaraTVA + (0.05 * $PretFaraTVA);
			$PretEuro = $PretEuro + (0.05 * $PretEuro);

	 ?><span class="amount"> Pret:</span> <p class="price"><span class="amount"><?php echo 		round($PretFaraTVA, 2); ?> Euro + TVA</span></p>
   
	   <span class="amount"> Total de Plata:</span> <strike><p class="price"><span class="amount"><?php echo round($PretEuro); ?> Euro (<?php echo round($pretinlei,2); ?> Lei)</span></p></strike> 
	   
       <?php $PretFaraTVA = $PretFaraTVA - (0.05 * $PretFaraTVA);
	   $PretEuro = $PretEuro - (0.05 * $PretEuro);
	   $pretinlei = $pretinlei - (0.05 * $pretinlei) ?>
       
	   <span class="amount" style="color:#F00; font-size:24px"> DISCOUNT 5% - Pret cu Discount:</span> <p class="price"><span class="amount"><?php echo round($PretEuro,2); ?> Euro (<?php echo round($pretinlei,2); ?> Lei)</p></strike> 
	   
	   
	   
	   <?php
	   
			
		} else if ($is_member) {
			
			$PretFaraTVA = $PretFaraTVA + (0.02 * $PretFaraTVA);
			$PretEuro = $PretEuro + (0.02 * $PretEuro);

	 ?><span class="amount"> Pret:</span> <p class="price"><span class="amount"><?php echo 		round($PretFaraTVA, 2); ?> Euro + TVA</span></p>
   
	   <span class="amount"> Total de Plata:</span> <strike><p class="price"><span class="amount"><?php echo round($PretEuro); ?> Euro (<?php echo round($pretinlei,2); ?> Lei)</span></p></strike> 
	   
       <?php $PretFaraTVA = $PretFaraTVA - (0.02 * $PretFaraTVA);
	   $PretEuro = $PretEuro - (0.02 * $PretEuro);
	   $pretinlei = $pretinlei - (0.02 * $pretinlei) ?>
       
	   <span class="amount" style="color:#F00; font-size:24px"> DISCOUNT 2% - Pret cu Discount:</span> <p class="price"><span class="amount"><?php echo round($PretEuro,2); ?> Euro (<?php echo round($pretinlei,2); ?> Lei)</p></strike> 
	   
	   
	   
	   <?php
	   
   			
   

		} else {
			
			?><span class="amount"> Pret:</span> <p class="price"><span class="amount"><?php echo round($PretFaraTVA,2); ?>Euro + TVA</span></p>
   
   <span class="amount"> Total de Plata:</span> <p class="price"><span class="amount"><?php echo $PretEuro; ?> Euro (<?php echo $pretinlei; ?> Lei)</span></p> <?php
			
		}
        } else {
		//Daca e vizitator
   
               ?><span class="amount"> Pret:</span> <p class="price"><span class="amount"><?php echo round($PretFaraTVA,2); ?>Euro + TVA</span></p>
   
   <span class="amount"> Total de Plata:</span> <p class="price"><span class="amount"><?php echo $PretEuro; ?> Euro (<?php echo $pretinlei; ?> Lei)</span></p> <?php
   
   
   
        }              
	}
 
 
 
////////////////////////////////////////////END PRICE SHOWING SYSTEM 
 
 

////////////////////////BEGIN ADD TEMPLATE TO SINGLE PRODUCT PAGE/////////////////////
function add_sidebar_productpage() {
    if ( is_singular('product') ) {
        get_template ('Layout - Sidebar Left, Content Right');
    }
}
add_action('template_redirect', 'add_sidebar_productpage');

   
////////////////////////BEGIN ADD TEMPLATE TO SINGLE PRODUCT PAGE/////////////////////



////////////////CHECKOUT PHONE FIELD NOT REQUIRED//////////////////////

add_filter( 'woocommerce_billing_fields', 'wc_npr_filter_phone', 10, 1 );
 
function wc_npr_filter_phone( $address_fields ) {
$address_fields['billing_phone']['required'] = false;
$address_fields['billing_postcode']['required'] = false;
return $address_fields;

}

////////////////CHECKOUT ZIP CODE/POSTAL CODE NOT REQUIRED//////////////////////
?>




