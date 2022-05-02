<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome Import -->
    <script src="https://kit.fontawesome.com/624804faba.js" crossorigin="anonymous"></script>
    <!-- End of Font Awesome -->
  
       <title>Blanche | Home</title>
      <meta name="description" content="Website description">
    
      <?php wp_head();?>
   
   
</head>
<body <?php body_class(); ?>>

	<?php
		wp_body_open();
		?>


    <div class="main__container">
        <nav>
        <!-- Mobile Menu -->
        <div id="myNav" class="overlay">
            <div class="flex-overlay">
               <button onclick="closeNav()" class="closebtn">
                  <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" fill="#FFFFFF">
                     <path d="M0 0h24v24H0V0z" fill="none"/>
                     <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/>
                  </svg>
               </button>
            </div>
			
            <div class="overlay-content">
<?php 
			 
	
					if ( has_nav_menu( 'mobile' ) || ! has_nav_menu( 'expanded' ) ) {
						?>
								<?php
								if ( has_nav_menu( 'mobile' ) ) {
					
									/* wp_nav_menu(
										array(
											'container'  => '',
											'items_wrap' => '<a>%3$s</a>',
											'theme_location' => 'mobile',
										)
									); */
									
									$menuParameters = array(
									  'container'       => false,
									  'echo'            => false,
									  'items_wrap'      => '%3$s',
									  'depth'           => 0,
									);
								
									echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
								} 
								?>

						<?php
					}
			?>
            </div>
         </div>
         <!-- End of Mobile Menu -->
            <ul>
                       
<?php 
			 
	
						if ( has_nav_menu( 'primary-left' ) || ! has_nav_menu( 'expanded' ) ) {
						?>
								<?php
								if ( has_nav_menu( 'primary-left' ) ) {

									wp_nav_menu(
										array(
											'container'  => '',
											'items_wrap' => '%3$s',
											'theme_location' => 'primary-left',
										)
									);

								} 
								?>

						<?php
					}
			?>
            </ul>
            <div class="logo__container">
			<?php 

				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				// echo $image[0];
				$logo = $image[0]??"";
			?>
                <img src="<?= $logo; ?>" alt="Blanche logo">
            </div>
            <ul>
                              
<?php 
			 
	
						if ( has_nav_menu( 'primary-right' ) || ! has_nav_menu( 'expanded' ) ) {
						?>
								<?php
								if ( has_nav_menu( 'primary-right' ) ) {

									wp_nav_menu(
										array(
											'container'  => '',
											'items_wrap' => '%3$s',
											'theme_location' => 'primary-right',
										)
									);

								} 
								?>

						<?php
					}
			?>
                <div class="nav__container--icons">
                    <li><a href=""><i class="fa-solid fa-magnifying-glass"></i></a></li>
                    <li><a href=""><i class="fa-solid fa-user"></i></a></li>
                    <li><a href=""><i class="fa-solid fa-cart-shopping"></i></a></li>
                </div>
            </ul>
            <button class="burgermenu--btn" onclick="openNav()">
                <i class="fa-solid fa-bars"></i>
            </button>
        </nav>