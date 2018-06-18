 <?php 
	/*
	Template name:HomePage Template
	 */
;

$context = Timber::get_context();	
$context['post'] = Timber::get_posts(); 
$context['posts'] = Timber::get_posts('numnerposts=-1'); 





$slider_args = array('post_type' => 'slider');
$context['slider'] = Timber::get_posts( $slider_args );


// echo "<pre>";
//  var_dump($slider_args);
//  echo "</pre>";
//  die();

Timber::render(array('pageHome.twig', 'page.twig'), $context);


?>