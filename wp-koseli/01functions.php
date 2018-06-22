<?php

if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		} );
	return;
}

Timber::$dirname = array('templates', 'views');

class StarterSite extends TimberSite {

	function __construct() {
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		register_nav_menus(array(
          'footer' => 'Footer Menu'
          )
        );

        if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Instagram',
		'parent_slug'	=> 'theme-general-settings',
	));
}



		parent::__construct();
	}

	function register_post_types() {
		//this is where you can register custom post types
	}

	function register_taxonomies() {
		//this is where you can register custom taxonomies
	}

	function add_to_context( $context ) {
		$context['foo'] = 'bar';
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::get_context();';
		$context['menu'] = new TimberMenu();
		$context['logo_1'] =get_field('logo_1','option');
		$context['logo_2'] =get_field('logo_2','option');
		$context['email'] =get_field('email','option');
		$context['telephone'] =get_field('telephone','option');
		$context['facebook'] =get_field('facebook','option');
		$context['twitter'] =get_field('twitter','option');
		$context['address'] =get_field('address','option');
		$context['tos'] =get_field('tos','option');
		$context['privacy'] =get_field('privacy','option');
		$context['bookTable_bg'] =get_field('bookTable_bg','option');
		$context['footer_bg'] =get_field('footer_bg','option');
		$context['price_sign']=get_field('price_sign','option');
		$context['language']=get_field('language','option');
		
		$context['instagram_user'] =get_field('instagram_user','option');
		$context['instagram_id'] =get_field('instagram_id','option');
		$context['instagram_access_token'] =get_field('instagram_access_token','option');
		$context['no_to_show'] =get_field('no_to_show','option');
		
		// echo "<pre>";
		// var_dump($context['instagram_id']);
		// die();
		// echo "</pre>";
		
		$context['site'] = $this;
		return $context;
	}

	function add_to_twig( $twig ) {
		/* this is where you can add your own fuctions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter( 'myfoo', new Twig_Filter_Function( 'myfoo' ) );
		return $twig;
	}

}

new StarterSite();

function myfoo( $text ) {
	$text .= ' bar!';
	return $text;
}
