 <?php 
	/*
	Template name:HomePage Template
	 */
;

$context = Timber::get_context();	
$context['post'] = Timber::get_posts(); 
$context['posts'] = Timber::get_posts('numnerposts=-1'); 
$args_alacarte = array(
// Get post type project
'post_type' => 'alacart',
// Get all posts
'posts_per_page' => -1,

// Order by post date
'orderby' => array(
    'date' => 'ASC'
));




$args_lunch = array(
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


// $context['categories'] = Timber::get_tags($cate );
$context['slider'] = Timber::get_posts( $slider_args );
$context['ala_menu'] = Timber::get_posts( $args_alacarte );
$context['lun_menu'] = Timber::get_posts( $args_lunch );

$lunch_english=get_field_object('field_5a80fd2f9d848');
$context['lunch_list_type_english'] = $lunch_english['choices'];

$lunch_finnish=get_field_object('field_5a80fd409d849');
$context['lunch_list_type_finnish'] = $lunch_finnish['choices'];



$ala_english=get_field_object('field_5a80fca823d5a');
$context['ala_list_type_english'] = $ala_english['choices'];

$ala_finnish=get_field_object('field_5a80fcc323d5b');
$context['ala_list_type_finnish'] = $ala_finnish['choices'];




// $context['lunch_list_type']=get_field_object('field_5a80fd409d849');




// $parent_menu_category=array('post_type' => 'menu','parent' => 0);
// $parent_cat_arg = array('hide_empty' => false, 'parent' => 0 );
// $parent_cat = get_terms('category',$parent_cat_arg);//category name
// foreach ($parent_cat as $catVal) {

//     echo '<h2>'.$catVal->name.'</h2>'; //Parent Category

//     $child_arg = array( 'hide_empty' => false, 'parent' => $catVal->term_id );
//     $child_cat = get_terms( 'category', $child_arg );

//     echo '<ul>';
//         foreach( $child_cat as $child_term ) {
//             echo '<li>'.$child_term->name . '</li>'; //Child Category
//         }
//     echo '</ul>';

// }

$context['lunch_options']=get_field_object('type', '217');

$field_name = 'type';
$field = get_field_object($field_name);
$context['day']=date('l');
// echo "<pre>";
//  var_dump($context['lunch_list_type']);
//  echo "</pre>";
//  die();

Timber::render(array('pageHome.twig', 'page.twig'), $context);


?>