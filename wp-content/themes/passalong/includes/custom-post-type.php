<?php

class RegisterPostType {
 	private $single = '';
  	private $plural = '';
  	private $slug 	= '';
	private $taxonomy = false;
	private $icon = 'dashicons-admin-post';

	function RegisterPostType() {
		$this->__construct();
	}

	function __construct($args) {
		$this->single = $args['singular'];
		$this->plural = $args['plural'];
		$this->slug = $args['slug'];
		$this->taxonomy = $args['taxonomy'] ? $args['taxonomy'] : $this->taxonomy;
		$this->icon = $args['icon'] ? $args['icon'] : $this->icon;

		# Place your add_actions and add_filters here
		add_action( 'init', array( &$this, 'init' ) );
		add_action('init', array(&$this, 'add_post_type'));

		# Add Post Type to Search
		add_filter('pre_get_posts', array( &$this, 'query_post_type') );

		# Add Custom Taxonomies
		if ($this->taxonomy) {
			add_action( 'init', array( &$this, 'add_taxonomies'), 0 );
		}
	}

  	function init($options = null){
  		if ($options) {
	    	foreach ($options as $key => $value) {
	      		$this->$key = $value;
	    	}
    	}
  	}

	function add_post_type() {
    	$labels = array(
      		'name' => __($this->plural, 'post type general name'),
      		'singular_name' => _x($this->single, 'post type singular name'),
      		'add_new' => _x('Add ' . $this->single, $this->single),
      		'add_new_item' => __('Add New ' . $this->single),
      		'edit_item' => __('Edit ' . $this->single),
      		'new_item' => __('New ' . $this->single),
      		'view_item' => __('View ' . $this->single),
      		'search_items' => __('Search ' . $this->plural),
      		'not_found' =>  __('No ' . $this->plural . ' Found'),
      		'not_found_in_trash' => __('No ' . $this->plural . ' found in Trash'),
      		'parent_item_colon' => ''
    	);

	    $options = array(
			'labels' => $labels,
	      	'public' => true,
	      	'publicly_queryable' => true,
	      	'show_ui' => true,
	      	'query_var' => true,
	      	'rewrite' => true,
			'menu_icon' => $this->icon,
	      	'capability_type' => 'post',
	      	'hierarchical' => true,
	      	'has_archive' => true,
	      	'menu_position' => null,
	      	'supports' => array(
	      		'title',
	      		'editor',
	      		'thumbnail',
	      		'comments',
                'page-attributes'
	      	),
	    );

	    register_post_type($this->slug, $options);
  	}

	function query_post_type($query) {
		if (is_category() || is_tag()) {
	    	$post_type = get_query_var('post_type');

			if ($post_type) {
		  		$post_type = $post_type;
			} else {
		  		$post_type = array($this->slug); // replace cpt to your custom post type
	  		}

	  		$query->set('post_type',$post_type);

			return $query;
	  	}
	}

	function add_taxonomies() {
		register_taxonomy($this->taxonomy, array($this->slug), array(
		    'hierarchical' => true,
		    'labels' => array(
		    	'name' => __( $this->taxonomy ),
		    	'singular_name' => __( $this->taxonomy . 's' ),
		    	'all_items' => __( 'All ' . $this->taxonomy . 's' ),
		    	'add_new_item' => __( 'Add ' . $this->taxonomy )
		  	),
		  	'public' => true,
		    'query_var' => true,
		    'rewrite' => array(
		    	'slug' => strtolower($this->taxonomy)
		    )
		));
	}
}

// https://developer.wordpress.org/resource/dashicons/#plus

// EXAMPLE
// new RegisterPostType(array(
// 	'singular' => 'Case Study',
// 	'plural' => 'Case Studies',
// 	'slug' => 'case_studies',
// 	'icon' => 'dashicons-awards',
// 	'taxonomy' => 'Investment Types'
// ));


//Set Post Types

/**
* Register Custom Post Types and Custom taxonomies.
*
* from Custom Post Type Generator Plugins.
*/

add_action( 'init', 'cptg_custom_post_types' );
function cptg_custom_post_types()
{
	$labels = array(
		'name' => 'careers',
		'singular_name' => 'career',
		'menu_name' => 'Careers',
		'name_admin_bar' => 'career',
		'all_items' => 'All Posts',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Post',
		'edit_item' => 'Edit Post',
		'new_item' => 'New Post',
		'view_item' => 'View Post',
		'search_items' => 'Search Posts',
		'not_found' =>  'No posts found.',
		'not_found_in_trash' => 'No posts found in Trash.',
		'parent_item_colon' => 'Parent Page',
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_menu' => true,
		'show_in_admin_bar' => true,
		'has_archive' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-book',
		'hierarchical' => true,
		'rewrite' => array( 'slug' => 'careers','with_front' => true,'feeds' => false,'pages' => true ),
		'query_var' => true,
		'can_export' => true,
		'supports' => array( 'title','editor' ),
	);
	register_post_type( 'careers', $args );




	
	$labels = array(
		'name' => 'portfolios',
		'singular_name' => 'Portfolio',
		'menu_name' => 'Portfolio Items',
		'name_admin_bar' => 'Portfolio',
		'all_items' => 'All Posts',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Post',
		'edit_item' => 'Edit Post',
		'new_item' => 'New Post',
		'view_item' => 'View Post',
		'search_items' => 'Search Posts',
		'not_found' =>  'No posts found.',
		'not_found_in_trash' => 'No posts found in Trash.',
		'parent_item_colon' => 'Parent Page',
	);
	$args = array(
		'labels' => $labels,
		'public' => false,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_menu' => true,
		'show_in_admin_bar' => false,
		'has_archive' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-admin-multisite',
		'hierarchical' => true,
		'rewrite' => array( 'slug' => 'portfolios','with_front' => true,'feeds' => false,'pages' => true ),
		'query_var' => true,
		'can_export' => true,
		'supports' => array( 'title','editor' ),
	);
	register_post_type( 'portfolios', $args );
	$labels = array(
		'name' => 'team',
		'singular_name' => 'Team Member',
		'menu_name' => 'Team Members',
		'name_admin_bar' => 'Team Member',
		'all_items' => 'All Posts',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Post',
		'edit_item' => 'Edit Post',
		'new_item' => 'New Post',
		'view_item' => 'View Post',
		'search_items' => 'Search Posts',
		'not_found' =>  'No posts found.',
		'not_found_in_trash' => 'No posts found in Trash.',
		'parent_item_colon' => 'Parent Page',
	);
	$args = array(
		'labels' => $labels,
		'public' => false,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_menu' => true,
		'show_in_admin_bar' => true,
		'has_archive' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-businessman',
		'hierarchical' => true,
		'rewrite' => array( 'slug' => 'team','with_front' => true,'feeds' => false,'pages' => true ),
		'query_var' => true,
		'can_export' => true,
		'supports' => array( 'title','editor' ),
	);
	register_post_type( 'team', $args );


	//Add Business Contacts

	$labels = array(
		'name' => 'business-contacts',
		'singular_name' => 'Business Contact',
		'menu_name' => 'Business Contacts',
		'name_admin_bar' => 'Business Contact',
		'all_items' => 'All Posts',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Post',
		'edit_item' => 'Edit Post',
		'new_item' => 'New Post',
		'view_item' => 'View Post',
		'search_items' => 'Search Posts',
		'not_found' =>  'No posts found.',
		'not_found_in_trash' => 'No posts found in Trash.',
		'parent_item_colon' => 'Parent Page',
	);
	$args = array(
		'labels' => $labels,
		'public' => false,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_menu' => true,
		'show_in_admin_bar' => true,
		'has_archive' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-businessman',
		'hierarchical' => true,
		'rewrite' => array( 'slug' => 'business-contacts','with_front' => true,'feeds' => false,'pages' => true ),
		'query_var' => true,
		'can_export' => true,
		'supports' => array( 'title','editor' ),
	);
	register_post_type( 'business-contacts', $args );



	$labels = array(
		'name' => 'industries',
		'singular_name' => 'industries',
		'menu_name' => 'industries',
		'all_items' => 'All Tags',
		'edit_item' => 'Edit Tag',
		'view_item' => 'View Tag',
		'update_item' => 'Update Tag',
		'add_new_item' => 'Add New Tag',
		'new_item_name' => 'New Tag Name',
		'parent_item' => 'Parent Category',
		'parent_item_colon' =>  'Parent Category',
		'search_items' => 'Search Tags',
		'popular_items' => 'Popular Tags',
		'separate_items_with_commas' => 'Separate tags with commas',
		'add_or_remove_items' => 'Add or remove tags',
		'choose_from_most_used' => 'Choose from the most used tags',
		'not_found' => 'No tags found.',
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'meta_box_cb' => null,
		'show_admin_column' => true,
		'hierarchical' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'industries','with_front' => true,'hierarchical' => true, ),
		'sort' => false,
	);
	register_taxonomy( 'industries', array( 'portfolios' ) , $args );
	$labels = array(
		'name' => 'funds',
		'singular_name' => 'funds',
		'menu_name' => 'funds',
		'all_items' => 'All Tags',
		'edit_item' => 'Edit Tag',
		'view_item' => 'View Tag',
		'update_item' => 'Update Tag',
		'add_new_item' => 'Add New Tag',
		'new_item_name' => 'New Tag Name',
		'parent_item' => 'Parent Category',
		'parent_item_colon' =>  'Parent Category',
		'search_items' => 'Search Tags',
		'popular_items' => 'Popular Tags',
		'separate_items_with_commas' => 'Separate tags with commas',
		'add_or_remove_items' => 'Add or remove tags',
		'choose_from_most_used' => 'Choose from the most used tags',
		'not_found' => 'No tags found.',
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'meta_box_cb' => null,
		'show_admin_column' => true,
		'hierarchical' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'funds','with_front' => true,'hierarchical' => true, ),
		'sort' => false,
	);
	register_taxonomy( 'funds', array( 'portfolios' ) , $args );
	$labels = array(
		'name' => 'funds',
		'singular_name' => 'funds',
		'menu_name' => 'funds',
		'all_items' => 'All Tags',
		'edit_item' => 'Edit Tag',
		'view_item' => 'View Tag',
		'update_item' => 'Update Tag',
		'add_new_item' => 'Add New Tag',
		'new_item_name' => 'New Tag Name',
		'parent_item' => 'Parent Category',
		'parent_item_colon' =>  'Parent Category',
		'search_items' => 'Search Tags',
		'popular_items' => 'Popular Tags',
		'separate_items_with_commas' => 'Separate tags with commas',
		'add_or_remove_items' => 'Add or remove tags',
		'choose_from_most_used' => 'Choose from the most used tags',
		'not_found' => 'No tags found.',
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'meta_box_cb' => null,
		'show_admin_column' => true,
		'hierarchical' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'funds','with_front' => true,'hierarchical' => true, ),
		'sort' => false,
	);
	register_taxonomy( 'funds', array( 'portfolios' ) , $args );
}

add_action( 'after_switch_theme', 'cptg_rewrite_flush' );
function cptg_rewrite_flush()
{
	flush_rewrite_rules();
}


//News Options
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_sub_page(array(
        'page_title'     => 'News Options',
        'menu_title'    => 'News Options',
        'parent_slug'    => 'edit.php'
	));
}


