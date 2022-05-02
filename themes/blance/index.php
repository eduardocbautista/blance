<?php get_header(); ?>


<?php 


	$product_description = null;
	$features_title  = null;
?>

<?php while ( have_posts() ) : the_post(); ?>
 
	<?php 
		
	
     
		$blocks = parse_blocks( $post->post_content );
		 
		foreach ( $blocks as $block ) {
	
			if ( 'core/columns' === $block['blockName'] && !empty($block['attrs']) ) {
				if('featuresgrid__container' === $block['attrs']['className'] ){
					?>
					   <section class="features">
					   <p class="features--title"><?=$features_title ?></p>
					    <div class="featuresgrid__container">
					<?php
					foreach($block['innerBlocks'] as $data){
						
						foreach($data['innerBlocks'] as $key => $value){
							// echo "<pre>";
							// print_r($value);
							?>
							<div class="featuresgrid__container--card">
								<img src="<?=($value['attrs']['mediaUrl']??"")?>" alt="Quality Products Icon">
								<?php 
									echo $value['innerHTML'];
								?>
							</div>
							
           
      
							<?php
						
						}
					}
					?>
					 </div>
					  </section>
					<?php
				}
				if('instagram__img' === $block['attrs']['className'] ){
					?>
					<section class="instagram">
					<div class="instagram--flex">
						<p>Follow Us On</p>
						<a href=""><i class="fa-brands fa-instagram"></i></a>
					</div>
					<div class="instagram__img">
							<?php 
							foreach($block['innerBlocks'] as $data){
						
								foreach($data['innerBlocks'] as $key => $value){
									echo $value['innerHTML'];
								}
							}
							
							?>
					</div>
				</section>
					<?php
				} 
			}
			if ( 'core/group' === $block['blockName'] && !empty($block['attrs']) ) {
				  
				if('product-category-group' === $block['attrs']['className'] ){
					
					?>
					<section class="products">
					<p><?=$product_description?></p>
					
							<?php
							foreach($block['innerBlocks'] as $key => $data){
								
									
									 
								if('core/columns' ===  $data['blockName'] && 'product-category' === $data['attrs']['className'] ){
										
									?>
									<div class="gridimg__container image_categories"  <?=($key == 1 ? 'style="margin-top: 0;"' : "")?>>
									<?php	 
									 foreach($data['innerBlocks'] as $key => $value){
									// echo "<pre>";
										 //print_r( $value['innerBlocks'][0]['innerHTML']);
										 ?>
										   <div class="imgbtn__container" 
										
										   >
							
												<?php 
													echo $value['innerBlocks'][0]['innerHTML'];
												?>
												<button>Shop Bed Linens</button>
											</div>
										 <?php
									} 
									?>
									</div>
									<?php
								}
								else if('core/heading' ===  $data['blockName']){
									echo $data['innerHTML'];
									// echo do_shortcode('[productlist]');
								}
								else if ('core/shortcode' ===  $data['blockName']){
									echo do_shortcode($data['innerHTML']);
								}
								else{
									
								}
								
							}
							?>
					
				</section>
					<?php
					// die();
				}
				
			}
			if ( 'core/paragraph' === $block['blockName'] ) {
			
				if('core/paragraph' === $block['blockName'] && 'product-description' === $block['attrs']['className']){
					
					
					$product_description = $block['innerHTML'];
					
				}
				else if('core/paragraph' === $block['blockName'] && 'testimonials-desc' === $block['attrs']['className']){
					 ?>
					 <section class="testimonials">
						<img src="/wp-content/uploads/2022/04/stars.png" alt="Row of stars image">
						<?=$block['innerHTML'];?>
						<a href="">Read Testimonials</a>
					</section>
					 
					 <?php
				}
				else{
					echo $block['innerHTML'];
				}
				
			}
			if ( 'core/heading' === $block['blockName'] ) {
	 
				if( 'features--title' === $block['attrs']['className']){
				
				
					
					
					$features_title = $block['innerHTML'];
				
				}
			}
			if ( 'core/group' === $block['blockName'] ) {
				
				
			}
			if ( 'shaiful-gutenberg/header-banner' === $block['blockName'] ) {				
				$urlbg =$block['attrs']['mediaUrl'];
				$innerHTML =$block['innerHTML'];
				
				?>
				<section class="hero">
					<div class="hero__container--banner">
						<img src="<?=$urlbg?>" alt="">
						<div class="hero__container--text">
							<?=$innerHTML?>
						</div>
						<div class="hero__container--guide">
							<p>Explore</p>
							<div class="vertical--divider"></div>
						</div>
					</div>
				</section>
				<?php
			}
			if ( 'core-embed/youtube' === $block['blockName'] ) {
				 
			
				 
			}
			
			 
		}
		
	?>





   

<?php endwhile; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>