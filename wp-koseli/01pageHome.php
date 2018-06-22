
 <?php 
	/*
	Template name:HomePage Template
	 */
;

$context = Timber::get_context();	
$context['post'] = Timber::get_posts(); 
$context['posts'] = Timber::get_posts('numnerposts=-1'); 
$args = array(
// Get post type project
'post_type' => 'menu',
// Get all posts
'posts_per_page' => -1,
// Order by post date
'orderby' => array(
    'date' => 'ASC'
));

$slider_args = array(
// Get post type project
'post_type' => 'slider',
// Get all posts
'posts_per_page' => -1,
// Order by post date
'orderby' => array(
    'date' => 'DESC'
));

// $cate=get_categories(
// 'post_type'=>'menu'
// );
$context['categories'] = Timber::get_terms('category', array('post_type' => 'menu'));
$context['slider'] = Timber::get_posts( $slider_args );
$context['menu'] = Timber::get_posts( $args );

// echo "<pre>";
//  var_dump($context['categories']);
//  echo "</pre>";
//  die();

Timber::render(array('pageHome.twig', 'page.twig'), $context);


?>