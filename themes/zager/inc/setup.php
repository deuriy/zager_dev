<?php
/**
 * Theme basic setup
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

add_action( 'after_setup_theme', 'understrap_setup' );

if ( ! function_exists( 'understrap_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function understrap_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on understrap, use a find and replace
		 * to change 'understrap' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'understrap', get_template_directory() . '/languages' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'header' => __( 'Header Menu', 'understrap' ),
				'footer_first' => __( 'Footer Menu first', 'understrap' ),
				'footer_second' => __( 'Footer Menu second', 'understrap' ),
				'footer_third' => __( 'Footer Menu third', 'understrap' ),
				'footer_fourth' => __( 'Footer Menu fourth', 'understrap' ),
				'auxiliary' => __( 'Auxiliary Menu', 'understrap' ),
			)
		);

		// Custom Image Sizes
		add_image_size( 'post-card', 768, 480, true );
		add_image_size( 'banner-front-page', 2048, 1152, true );
		add_image_size( 'banner-page', 2048, 580, true );
		add_image_size( 'product-card', 344, 260 );
		add_image_size( 'product-section', 735, 447 );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Add support for Gutenberg
		 */

		add_theme_support( 'align-wide' );

		// Remove some features that clients should not control
		add_theme_support( 'disable-custom-gradients' );


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		// Adding Thumbnail basic support
		add_theme_support( 'post-thumbnails' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Removing Theme Supports
		remove_theme_support( 'custom-header' );
		remove_theme_support( 'custom-background' );

		add_theme_support( 'custom-logo' );

	}
}

add_action( 'init', 'create_faq_category_taxonomies' );
function create_faq_category_taxonomies(){

	register_taxonomy('faq_category', array('faq'), array(
		'hierarchical'  => true,
		'labels'        => array(
			'name'              => _x( 'FAQ Categories', 'taxonomy general name' ),
			'singular_name'     => _x( 'FAQ Category', 'taxonomy singular name' ),
			'search_items'      =>  __( 'Search FAQ Categories' ),
			'all_items'         => __( 'All FAQ Categories' ),
			'parent_item'       => __( 'Parent FAQ Category' ),
			'parent_item_colon' => __( 'Parent FAQ Category:' ),
			'edit_item'         => __( 'Edit FAQ Category' ),
			'update_item'       => __( 'Update FAQ Category' ),
			'add_new_item'      => __( 'Add Category' ),
			'new_item_name'     => __( 'New FAQ Category Name' ),
			'menu_name'         => __( 'FAQ Categories' ),
		),
		'show_ui'       => true,
		'query_var'     => true,
		//'rewrite'       => array( 'slug' => 'the_faq_category' ),
	));
}

add_action( 'init', 'create_customer_reviews_category_taxonomies' );
function create_customer_reviews_category_taxonomies(){

	register_taxonomy('customer_reviews_category', array('customer_review'), array(
		'hierarchical'  => true,
		'labels'        => array(
			'name'              => _x( 'Customer Reviews Categories', 'taxonomy general name' ),
			'singular_name'     => _x( 'Customer Reviews Category', 'taxonomy singular name' ),
			'search_items'      =>  __( 'Search Customer Reviews Categories' ),
			'all_items'         => __( 'All Customer Reviews Categories' ),
			'parent_item'       => __( 'Parent Customer Reviews Category' ),
			'parent_item_colon' => __( 'Parent Customer Reviews Category:' ),
			'edit_item'         => __( 'Edit Customer Reviews Category' ),
			'update_item'       => __( 'Update Customer Reviews Category' ),
			'add_new_item'      => __( 'Add Category' ),
			'new_item_name'     => __( 'New Customer Reviews Category Name' ),
			'menu_name'         => __( 'Customer Reviews Categories' ),
		),
		'show_ui'       => true,
		'query_var'     => true,
		//'rewrite'       => array( 'slug' => 'the_faq_category' ),
	));
}

add_action( 'init', 'create_artist_reviews_category_taxonomies' );
function create_artist_reviews_category_taxonomies(){

	register_taxonomy('artist_reviews_category', array('artist_review'), array(
		'hierarchical'  => true,
		'labels'        => array(
			'name'              => _x( 'Artist Reviews Categories', 'taxonomy general name' ),
			'singular_name'     => _x( 'Artist Reviews Category', 'taxonomy singular name' ),
			'search_items'      =>  __( 'Search Artist Reviews Categories' ),
			'all_items'         => __( 'All Artist Reviews Categories' ),
			'parent_item'       => __( 'Parent Artist Reviews Category' ),
			'parent_item_colon' => __( 'Parent Artist Reviews Category:' ),
			'edit_item'         => __( 'Edit Artist Reviews Category' ),
			'update_item'       => __( 'Update Artist Reviews Category' ),
			'add_new_item'      => __( 'Add Category' ),
			'new_item_name'     => __( 'New Artist Reviews Category Name' ),
			'menu_name'         => __( 'Artist Reviews Categories' ),
		),
		'show_ui'       => true,
		'query_var'     => true,
		//'rewrite'       => array( 'slug' => 'the_faq_category' ),
	));
}

add_action( 'init', 'create_student_reviews_category_taxonomies' );
function create_student_reviews_category_taxonomies(){

	register_taxonomy('student_reviews_category', array('student_review'), array(
		'hierarchical'  => true,
		'labels'        => array(
			'name'              => _x( 'Student Reviews Categories', 'taxonomy general name' ),
			'singular_name'     => _x( 'Student Reviews Category', 'taxonomy singular name' ),
			'search_items'      =>  __( 'Search Student Reviews Categories' ),
			'all_items'         => __( 'All Student Reviews Categories' ),
			'parent_item'       => __( 'Parent Student Reviews Category' ),
			'parent_item_colon' => __( 'Parent Student Reviews Category:' ),
			'edit_item'         => __( 'Edit Student Reviews Category' ),
			'update_item'       => __( 'Update Student Reviews Category' ),
			'add_new_item'      => __( 'Add Category' ),
			'new_item_name'     => __( 'New Student Reviews Category Name' ),
			'menu_name'         => __( 'Student Reviews Categories' ),
		),
		'show_ui'       => true,
		'query_var'     => true,
		//'rewrite'       => array( 'slug' => 'the_faq_category' ),
	));
}

add_action( 'init', 'create_video_category_taxonomies' );
function create_video_category_taxonomies(){

	register_taxonomy('video_category', array('video'), array(
		'hierarchical'  => true,
		'labels'        => array(
			'name'              => _x( 'Video Categories', 'taxonomy general name' ),
			'singular_name'     => _x( 'Video Category', 'taxonomy singular name' ),
			'search_items'      =>  __( 'Search Video Categories' ),
			'all_items'         => __( 'All Video Categories' ),
			'parent_item'       => __( 'Parent Video Category' ),
			'parent_item_colon' => __( 'Parent Video Category:' ),
			'edit_item'         => __( 'Edit Video Category' ),
			'update_item'       => __( 'Update Video Category' ),
			'add_new_item'      => __( 'Add Category' ),
			'new_item_name'     => __( 'New Video Category Name' ),
			'menu_name'         => __( 'Video Categories' ),
		),
		'show_ui'       => true,
		'query_var'     => true,
		//'rewrite'       => array( 'slug' => 'the_faq_category' ),
	));
}

add_action('init', 'create_faq_post_type');
function create_faq_post_type(){
	register_post_type('faq', array(
		'labels'             => array(
			'name'               => 'FAQ',
			'singular_name'      => 'FAQ',
			'add_new'            => 'Add FAQ item',
			'add_new_item'       => 'Add new FAQ item',
			'edit_item'          => 'Edit FAQ item',
			'new_item'           => 'New FAQ item',
			'view_item'          => 'View FAQ item',
			'search_items'       => 'Find FAQ item',
			'not_found'          => 'FAQ items not found',
			'not_found_in_trash' => 'FAQ items not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'FAQ'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'					 => 'dashicons-book',
		'supports'           => array('title','editor')
	) );
}

add_action('init', 'create_customer_review_post_type');
function create_customer_review_post_type(){
	register_post_type('customer_review', array(
		'labels'             => array(
			'name'               => 'Customer Reviews',
			'singular_name'      => 'Customer Review',
			'add_new'            => 'Add Customer Review',
			'add_new_item'       => 'Add new Customer Review',
			'edit_item'          => 'Edit Customer Review',
			'new_item'           => 'New Customer Review',
			'view_item'          => 'View Customer Review',
			'search_items'       => 'Find Customer Reviews',
			'not_found'          => 'Customer Reviews not found',
			'not_found_in_trash' => 'Customer Reviews not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Customer Reviews'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'					 => 'dashicons-format-quote',
		'supports'           => array('title')
	) );
}

add_action('init', 'create_artist_review_post_type');
function create_artist_review_post_type(){
	register_post_type('artist_review', array(
		'labels'             => array(
			'name'               => 'Artist Reviews',
			'singular_name'      => 'Artist Review',
			'add_new'            => 'Add Artist Review',
			'add_new_item'       => 'Add new Artist Review',
			'edit_item'          => 'Edit Artist Review',
			'new_item'           => 'New Artist Review',
			'view_item'          => 'View Artist Review',
			'search_items'       => 'Find Artist Reviews',
			'not_found'          => 'Artist Reviews not found',
			'not_found_in_trash' => 'Artist Reviews not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Artist Reviews'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'					 => 'dashicons-format-quote',
		'supports'           => array('title')
	) );
}

add_action('init', 'create_student_review_post_type');
function create_student_review_post_type(){
	register_post_type('student_review', array(
		'labels'             => array(
			'name'               => 'Student Reviews',
			'singular_name'      => 'Student Review',
			'add_new'            => 'Add Student Review',
			'add_new_item'       => 'Add new Student Review',
			'edit_item'          => 'Edit Student Review',
			'new_item'           => 'New Student Review',
			'view_item'          => 'View Student Review',
			'search_items'       => 'Find Student Reviews',
			'not_found'          => 'Student Reviews not found',
			'not_found_in_trash' => 'Student Reviews not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Student Reviews'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'					 => 'dashicons-format-quote',
		'supports'           => array('title', 'editor', 'excerpt')
	) );
}

add_action('init', 'create_video_post_type');
function create_video_post_type(){
	register_post_type('video', array(
		'labels'             => array(
			'name'               => 'Videos',
			'singular_name'      => 'Video',
			'add_new'            => 'Add Video',
			'add_new_item'       => 'Add new Video',
			'edit_item'          => 'Edit Video',
			'new_item'           => 'New Video',
			'view_item'          => 'View Video',
			'search_items'       => 'Find Videos',
			'not_found'          => 'Videos not found',
			'not_found_in_trash' => 'Videos not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Videos'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'					 => 'dashicons-video-alt3',
		'supports'           => array('title')
	) );
}

function lb_editor_remove_meta_box() {
    global $post_type;
/**
 *  Check to see if the global $post_type variable exists
 *  and then check to see if the current post_type supports
 *  excerpts. If so, remove the default excerpt meta box
 *  provided by the WordPress core. If you would like to only
 *  change the excerpt meta box for certain post types replace
 *  $post_type with the post_type identifier.
 */
    if (isset($post_type) && post_type_supports($post_type, 'excerpt')){
        remove_meta_box('postexcerpt', $post_type, 'normal');
    } 
}
add_action('admin_menu', 'lb_editor_remove_meta_box');
 
function lb_editor_add_custom_meta_box() {
    global $post_type;
    /**
     *  Again, check to see if the global $post_type variable
     *  exists and then if the current post_type supports excerpts.
     *  If so, add the new custom excerpt meta box. If you would
     *  like to only change the excerpt meta box for certain post
     *  types replace $post_type with the post_type identifier.
     */
    if (isset($post_type) && post_type_supports($post_type, 'excerpt')){
        add_meta_box('postexcerpt', __('Excerpt'), 'lb_editor_custom_post_excerpt_meta_box', $post_type, 'normal', 'high');
    }
}
add_action( 'add_meta_boxes', 'lb_editor_add_custom_meta_box' );
 
function lb_editor_custom_post_excerpt_meta_box( $post ) {

    /**
     *  Adjust the settings for the new wp_editor. For all
     *  available settings view the wp_editor reference
     *  http://codex.wordpress.org/Function_Reference/wp_editor
     */
    $settings = array( 'textarea_rows' => '12', 'quicktags' => false, 'tinymce' => true);

    /**
     *  Create the new meta box editor and decode the current
     *  post_excerpt value so the TinyMCE editor can display
     *  the content as it is styled.
     */
    wp_editor(html_entity_decode(stripcslashes($post->post_excerpt)), 'excerpt', $settings);
 
    // The meta box description - adjust as necessary
    echo '&lt;p&gt;&lt;em&gt;Excerpts are optional, hand-crafted, summaries of your content.&lt;/em&gt;&lt;/p&gt;';
}

add_action('admin_head', 'excerpt_textarea_height');
function excerpt_textarea_height() { 
    echo'
    <style type="text/css">
        #excerpt{ height:250px; }
    </style>
    ';
}

// Add the duplicate link to action list for post_row_actions
// for "post" and custom post types
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );
// for "page" post type
add_filter( 'page_row_actions', 'rd_duplicate_post_link', 10, 2 );


function rd_duplicate_post_link( $actions, $post ) {

	if( ! current_user_can( 'edit_posts' ) ) {
		return $actions;
	}

	$url = wp_nonce_url(
		add_query_arg(
			array(
				'action' => 'rd_duplicate_post_as_draft',
				'post' => $post->ID,
			),
			'admin.php'
		),
		basename(__FILE__),
		'duplicate_nonce'
	);

	$actions[ 'duplicate' ] = '<a href="' . $url . '" title="Duplicate this item" rel="permalink">Duplicate</a>';

	return $actions;
}

/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );

function rd_duplicate_post_as_draft(){

	// check if post ID has been provided and action
	if ( empty( $_GET[ 'post' ] ) ) {
		wp_die( 'No post to duplicate has been provided!' );
	}

	// Nonce verification
	if ( ! isset( $_GET[ 'duplicate_nonce' ] ) || ! wp_verify_nonce( $_GET[ 'duplicate_nonce' ], basename( __FILE__ ) ) ) {
		return;
	}

	// Get the original post id
	$post_id = absint( $_GET[ 'post' ] );

	// And all the original post data then
	$post = get_post( $post_id );

	/*
	 * if you don't want current user to be the new post author,
	 * then change next couple of lines to this: $new_post_author = $post->post_author;
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;

	// if post data exists (I am sure it is, but just in a case), create the post duplicate
	if ( $post ) {

		// new post data array
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);

		// insert the post by wp_insert_post() function
		$new_post_id = wp_insert_post( $args );

		/*
		 * get all current post terms ad set them to the new post draft
		 */
		$taxonomies = get_object_taxonomies( get_post_type( $post ) ); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		if( $taxonomies ) {
			foreach ( $taxonomies as $taxonomy ) {
				$post_terms = wp_get_object_terms( $post_id, $taxonomy, array( 'fields' => 'slugs' ) );
				wp_set_object_terms( $new_post_id, $post_terms, $taxonomy, false );
			}
		}

		// duplicate all post meta
		$post_meta = get_post_meta( $post_id );
		if( $post_meta ) {

			foreach ( $post_meta as $meta_key => $meta_values ) {

				if( '_wp_old_slug' == $meta_key ) { // do nothing for this meta key
					continue;
				}

				foreach ( $meta_values as $meta_value ) {
					add_post_meta( $new_post_id, $meta_key, $meta_value );
				}
			}
		}

		// finally, redirect to the edit post screen for the new draft
		wp_safe_redirect(
			add_query_arg(
				array(
					'action' => 'edit',
					'post' => $new_post_id
				),
				admin_url( 'post.php' )
			)
		);
		exit;

		// or we can redirect to all posts with a message
		// wp_safe_redirect(
		// 	add_query_arg(
		// 		array(
		// 			'post_type' => ( 'post' !== get_post_type( $post ) ? get_post_type( $post ) : false ),
		// 			'saved' => 'post_duplication_created' // just a custom slug here
		// 		),
		// 		admin_url( 'edit.php' )
		// 	)
		// );
		// exit;

	} else {
		wp_die( 'Post creation failed, could not find original post.' );
	}

}

/*
 * In case we decided to add admin notices
 */
add_action( 'admin_notices', 'duplication_admin_notice' );

function duplication_admin_notice() {

	// Get the current screen
	$screen = get_current_screen();

	if ( 'edit' !== $screen->base ) {
		return;
	}

    //Checks if settings updated
    if ( isset( $_GET[ 'saved' ] ) && 'post_duplication_created' == $_GET[ 'saved' ] ) {

		 echo '<div class="notice notice-success is-dismissible"><p>Post copy created.</p></div>';
		 
    }
}