<?php
add_action( 'after_setup_theme', 'bo_setup' );

function bo_setup()
{
	load_theme_textdomain( 'bo', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form' ) );
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;
	register_nav_menus(
		array( 'main-menu' => __( 'Main Menu', 'bo' ) )
		);
	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside','chat', 'gallery', 'link', 'image', 'quote', 'status', 'video'
		) );

	// add post-formats to post_type 'page'
	add_post_type_support( 'post', 'post-formats' );
}

add_action( 'wp_enqueue_scripts', 'bo_load_scripts' );

function bo_load_scripts()
{
	wp_enqueue_script( 'jquery' );
}

add_action( 'comment_form_before', 'bo_enqueue_comment_reply_script' );

function bo_enqueue_comment_reply_script()
{
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'bo_title'	 );

function bo_title( $title ) {
	if ( $title == '' ) {
		return '&rarr;';
	} else {
		return $title;
	}
}
add_filter( 'wp_title', 'bo_filter_wp_title' );

function bo_filter_wp_title( $title )
{
	return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'bo_widgets_init' );


function bo_widgets_init()
{
	register_sidebar( array (
		'name' => __( 'Sidebar Widget Area', 'bo' ),
		'id' => 'primary-widget-area',
		'before_widget' => '<div id="%1$s" class="col-sm-6 widget-container %2$s"><div class="well">',
		'after_widget' => "</div></div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) 
	);
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'wide',
		'id' => 'wide-widget-area',
		'before_widget' => '<div id="%1$s" class="col-sm-12 widget-container %2$s"><div class="well">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'for singles',
		'id' => 'single-widget-area',
		'before_widget' => '<div class="col-sm-6"><div id="%1$s" class="well widget-container %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'for pages',
		'id' => 'pages-widget-area',
		'before_widget' => '<div id="%1$s" class="col-sm-6 widget-container %2$s"><div class="well">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'clean',
		'id' => 'clean-widget-area',
		'before_widget' => '<div id="%1$s" class="col-sm-6 widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Footer left',
		'id' => 'footer-left',
		'before_widget' => '<div id="%1$s" class="col-sm-6 col-md-6 col-lg-6 footer-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Footer right',
		'id' => 'footer-right',
		'before_widget' => '<div id="%1$s" class="col-sm-6 col-md-6 col-lg-6 footer-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		));
}

function bo_custom_pings( $comment )
{
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
	<?php 
}
add_filter( 'get_comments_number', 'bo_comments_number' );

function bo_comments_number( $count )
{
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}

/*
add_action('init', 'registerWidePosts');
function registerWidePosts() {
	register_post_type('wide', array(
		'label' => 'Wide posts',
		'description' => 'This is a wide post that uses both columns',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'wide', 'with_front' => true),
		'query_var' => true,
		'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','tags'),
		'labels' => array (
			'name' => 'wide posts',
			'singular_name' => 'wide',
			'menu_name' => 'Wide Posts',
			'add_new' => 'Add Wide',
			'add_new_item' => 'Add Wide Post',
			'edit' => 'Edit',
			'edit_item' => 'Edit Wide',
			'new_item' => 'New Wide',
			'view' => 'View Wide',
			'view_item' => 'View Wide',
			'search_items' => 'Search Wide Posts',
			'not_found' => 'No Wide Posts Found',
			'not_found_in_trash' => 'No Wide Posts Found in Trash',
			'parent' => 'Parent Wide',
			)
		) ); 
}
*/

require_once('wp_bootstrap_navwalker.php');


/* remove hardcoded width and height attributes from images in html */


function strip_img_dimensions( $html, $post_id, $post_image_id ) {
$html = preg_replace( '/(width|height)="d*"s/', "", $html );
return $html;}

add_filter( 'post_thumbnail_html', 'strip_img_dimensions', 10, 3 );
add_filter( 'post_html', 'strip_img_dimensions', 10, 3 );


// LIMITA PALABRAS EXTRACTO DE ENTRADAS

function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}


