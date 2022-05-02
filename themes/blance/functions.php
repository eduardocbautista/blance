<?php 


add_theme_support('menus');

function blance_menus() {

	$locations = array(
		'primary-left'  => __( 'Primary left Menu', 'blance' ),
		'primary-right'  => __( 'Primary right Menu', 'blance' ),
		'mobile'  => __( 'Mobile Menu', 'blance' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'blance_menus' );


if ( ! function_exists( 'wp_body_open' ) ) {

	
	function wp_body_open() {
			do_action( 'wp_body_open' );
	}
}

function child_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
	
	
   
     wp_enqueue_script(
     'homepage-js',
      get_template_directory_uri().'/js/homepage.js',
      array()
   );

   
}
add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );


function theme_prefix_setup() {
	
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-width' => true,
	) );

}
add_action( 'after_setup_theme', 'theme_prefix_setup' );


function theme_prefix_the_custom_logo() {
	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

}


// Load assets for wp-admin when editor is active
function shaiful_gutenberg_notice_block_admin() {
   wp_enqueue_script(
      'gutenberg-header-banner-editor',
      get_template_directory_uri().'/js/block.js',
      array( 'wp-blocks', 'wp-element' )
   );

   wp_enqueue_style(
      'gutenberg-header-banner-editor',
      get_template_directory_uri().'/css/block.css',
      array()
   );
   
   
}

add_action( 'admin_enqueue_scripts', 'shaiful_gutenberg_notice_block_admin' );

// Load assets for frontend
function shaiful_gutenberg_notice_block_frontend() {

   wp_enqueue_style(
      'gutenberg-header-banner-editor',
      get_template_directory_uri().'/css/block.css',
      array()
   );
}
add_action( 'wp_enqueue_scripts', 'shaiful_gutenberg_notice_block_frontend' );

function array_find_deep($array, $search, $keys = array())
{
    foreach($array as $key => $value) {
        if (is_array($value)) {
            $sub = array_find_deep($value, $search, array_merge($keys, array($key)));
            if (count($sub)) {
                return $sub;
            }
        } elseif ($value === $search) {
            return array_merge($keys, array($key));
			break;
        }
    }

    return array();
}

?>