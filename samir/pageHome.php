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



$works_post = array(
// Get post type project
'post_type' => 'works',
// Get all posts
'posts_per_page' => -1,

// Order by post date
'orderby' => array(
    'date' => 'ASC'
));

$context['works_posts'] = Timber::get_posts( $works_post );
$work_field=get_field_object('field_5b2d04a7ce757');
$context['works'] = $work_field['choices'];

// echo "<pre>";
// var_dump($context['works_posts']);
// echo "</pre>";
// die();

Timber::render(array('pageHome.twig', 'page.twig'), $context);


?>