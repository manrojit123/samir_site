<?php

if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php') ) . '</a></p></div>';
	});
	
	add_filter('template_include', function($template) {
		return get_stylesheet_directory() . '/static/no-timber.html';
	});
	
	return;
}

Timber::$dirname = array('templates', 'views');

class StarterSite extends TimberSite {

	function __construct() {
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		register_nav_menus(array('main_menu' => 'Main Menu' ) );

		if( function_exists('acf_add_options_page') ) {
			acf_add_options_page(array(
				'page_title' 	=> 'About Us',
				'menu_title'	=> 'About',
				'menu_slug' 	=> 'theme-about-us',
				'capability'	=> 'edit_posts',
				'redirect'		=> false
			));
			acf_add_options_page(array(
				'page_title' 	=> 'Contact Info',
				'menu_title'	=> 'Contact Info',
				'menu_slug' 	=> 'theme-general-settings',
				'capability'	=> 'edit_posts',
				'redirect'		=> false
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
		$context['main_menu'] = new TimberMenu('main_menu');
		$context['site'] = $this;

		//about us
		$context['who_are_we_brief'] = get_field('who_are_we_brief','option');
		$context['who_are_we_detail'] = get_field('who_are_we_detail','option');
		while ( have_rows('field_5b41d75432750', 'option') ) : the_row();
		  	$who_are_we_list[] = [
		      'name'  => get_sub_field('title'),
		      'icon'  => get_sub_field('icon'),
		      'brief'  => get_sub_field('brief'),
		      'details'  => get_sub_field('details')
		   	];
		endwhile;
		


		//Contact us
		$context['logo'] = get_field('logo','option');
		$context['address'] = get_field('address','option');
		$context['email'] = get_field('email','option');
		$context['phone'] = get_field('phone','option');
		$context['working_days'] = get_field('working_days','option');
		$context['working_time'] = get_field('working_time','option');

		return $context;
	}

	function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	function add_to_twig( $twig ) {
		/* this is where you can add your own functions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter('myfoo', new Twig_SimpleFilter('myfoo', array($this, 'myfoo')));
		return $twig;
	}

}

new StarterSite();
