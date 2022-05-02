<?php 


add_shortcode( 'productlist', 'wpproductlist_func' );
function wpproductlist_func( $atts ) {
	
	
	ob_start();
      
	
  ?>
	<div class="bestseller__container">
                <div class="bestseller__container--card">
                    <div class="bestseller__container--img">
                        <img src="http://blance.test/wp-content/uploads/2022/04/Layer_26.png" alt="First Best Seller Product Image" loading="lazy">
                    </div>
                    <p class="bestseller__container--prodname">Product Name</p>
                    <p class="bestseller__container--price">AED XXX</p>
                    <P class="bestseller__container--status">Available in 5 colours</P>
                </div>
                <div class="bestseller__container--card">
                    <div class="bestseller__container--img">
                        <img src="http://blance.test/wp-content/uploads/2022/04/Layer_25.png" alt="Second Best Seller Product Image" loading="lazy">
                    </div>
                    <p class="bestseller__container--prodname">Product Name</p>
                    <p class="bestseller__container--price">AED XXX</p>
                    <p class="bestseller__container--coloredstatus">Special Offer<span class="bestseller__container--darktext">Get 25% OFF</span></p>
                </div>
                <div class="bestseller__container--card">
                    <div class="bestseller__container--img">
                        <img src="http://blance.test/wp-content/uploads/2022/04/Layer_24.png" alt="Third Best Seller Product Image" loading="lazy">
                    </div>
                    <p class="bestseller__container--prodname">Product Name</p>
                    <p class="bestseller__container--price">AED XXX</p>
                    <p class="bestseller__container--status">Available in 3 colours</p>
                </div>
            </div>
  <?php 
 
		$output = ob_get_clean();
		
		return $output; 
}
?>