<?php
    /*
    Plugin Name: Reaction's Custom Post Types & Taxonomies
    Plugin URI:  http://reaction.ca
    Version:     1.0
    Author:      Reaction
    Author URI:  http://reaction.ca
    Description: Post types and taxonomies created by Reaction for the customization of the Private Lender Link website. Simply edit this file and do a find and replace for NICENAME and variable.
    Text Domain: reaction
    Domain Path: /lang
     */

// Comment out the CPTs & their corresponding taxonomies not needed by this project so they don't show up in the admin panel.


    // Register Custom Taxonomy
  function craft_taxonomies() {

	 //FAQ Categories
    $faq_categories_labels = array(
			'name'                       => _x( 'FAQ Categories', 'Taxonomy General Name', 'reaction' ),
			'singular_name'              => _x( 'FAQ Category', 'Taxonomy Singular Name', 'reaction' ),
			'menu_name'                  => __( 'FAQ Categories', 'reaction' ),
			'all_items'                  => __( 'All FAQ Categories', 'reaction' ),
			'parent_item'                => __( 'Parent Category', 'reaction' ),
			'parent_item_colon'          => __( 'Parent Category:', 'reaction' ),
			'new_item_name'              => __( 'New Category', 'reaction' ),
			'add_new_item'               => __( 'Add Category', 'reaction' ),
			'edit_item'                  => __( 'Edit Category', 'reaction' ),
			'update_item'                => __( 'Update Category', 'reaction' ),
			'view_item'                  => __( 'View Category', 'reaction' ),
			'separate_items_with_commas' => __( 'Separate FAQ Categories with commas', 'reaction' ),
			'add_or_remove_items'        => __( 'Add or remove FAQ Categories', 'reaction' ),
			'choose_from_most_used'      => __( 'Choose from the most used FAQ Categories', 'reaction' ),
			'popular_items'              => __( 'Popular FAQ Categories', 'reaction' ),
			'search_items'               => __( 'Search FAQ Categories', 'reaction' ),
			'not_found'                  => __( 'FAQ Categories Not Found', 'reaction' ),
		);

		$faq_categories_args = array(
			'labels'                     => $faq_categories_labels,
			'hierarchical'               => true,
			'public'                     => false,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);

	  register_taxonomy( 'faq_categories', array( 'faq' ), $faq_categories_args );

    // Service Categories
     $service_categories_labels = array(
 			'name'                       => _x( 'Service Categories', 'Taxonomy General Name', 'reaction' ),
 			'singular_name'              => _x( 'Service Category', 'Taxonomy Singular Name', 'reaction' ),
 			'menu_name'                  => __( 'Service Categories', 'reaction' ),
 			'all_items'                  => __( 'All Service Categories', 'reaction' ),
 			'parent_item'                => __( 'Parent Category', 'reaction' ),
 			'parent_item_colon'          => __( 'Parent Category:', 'reaction' ),
 			'new_item_name'              => __( 'New Category', 'reaction' ),
 			'add_new_item'               => __( 'Add Category', 'reaction' ),
 			'edit_item'                  => __( 'Edit Category', 'reaction' ),
 			'update_item'                => __( 'Update Category', 'reaction' ),
 			'view_item'                  => __( 'View Category', 'reaction' ),
 			'separate_items_with_commas' => __( 'Separate Service Categories with commas', 'reaction' ),
 			'add_or_remove_items'        => __( 'Add or remove Service Categories', 'reaction' ),
 			'choose_from_most_used'      => __( 'Choose from the most used Service Categories', 'reaction' ),
 			'popular_items'              => __( 'Popular Service Categories', 'reaction' ),
 			'search_items'               => __( 'Search Service Categories', 'reaction' ),
 			'not_found'                  => __( 'Service Categories Not Found', 'reaction' ),
 		);

 		$service_categories_args = array(
 			'labels'                     => $service_categories_labels,
 			'hierarchical'               => true,
 			'public'                     => false,
 			'show_ui'                    => true,
 			'show_admin_column'          => true,
 			'show_in_nav_menus'          => true,
 			'show_tagcloud'              => true,
 		);

 	  register_taxonomy( 'service_categories', array( 'service' ), $service_categories_args );


    // Events Categories
     $event_categories_labels = array(
      'name'                       => _x( 'Event Categories', 'Taxonomy General Name', 'reaction' ),
      'singular_name'              => _x( 'Event Category', 'Taxonomy Singular Name', 'reaction' ),
      'menu_name'                  => __( 'Event Categories', 'reaction' ),
      'all_items'                  => __( 'All Event Categories', 'reaction' ),
      'parent_item'                => __( 'Parent Category', 'reaction' ),
      'parent_item_colon'          => __( 'Parent Category:', 'reaction' ),
      'new_item_name'              => __( 'New Category', 'reaction' ),
      'add_new_item'               => __( 'Add Category', 'reaction' ),
      'edit_item'                  => __( 'Edit Category', 'reaction' ),
      'update_item'                => __( 'Update Category', 'reaction' ),
      'view_item'                  => __( 'View Category', 'reaction' ),
      'separate_items_with_commas' => __( 'Separate Event Categories with commas', 'reaction' ),
      'add_or_remove_items'        => __( 'Add or remove Event Categories', 'reaction' ),
      'choose_from_most_used'      => __( 'Choose from the most used Event Categories', 'reaction' ),
      'popular_items'              => __( 'Popular Event Categories', 'reaction' ),
      'search_items'               => __( 'Search Event Categories', 'reaction' ),
      'not_found'                  => __( 'Event Categories Not Found', 'reaction' ),
    );

    $event_categories_args = array(
      'labels'                     => $event_categories_labels,
      'hierarchical'               => true,
      'public'                     => false,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
    );

    register_taxonomy( 'event_categories', array( 'event' ), $event_categories_args );


    }

    // Hook into the 'init' action
    add_action( 'init', 'craft_taxonomies', 0 );





    // Register Custom Post Type
    function craft_post_types() {

      // Services
      $services_labels = array(
          'name'                => _x( 'Services', 'Post Type General Name', 'reaction' ),
          'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'reaction' ),
          'menu_name'           => __( 'Services', 'reaction' ),
          'name_admin_bar'      => __( 'Services', 'reaction' ),
          'parent_item_colon'   => __( 'Parent:', 'reaction' ),
          'all_items'           => __( 'All Services', 'reaction' ),
          'add_new_item'        => __( 'Add New Service', 'reaction' ),
          'add_new'             => __( 'Add New', 'reaction' ),
          'new_item'            => __( 'New', 'reaction' ),
          'edit_item'           => __( 'Edit', 'reaction' ),
          'update_item'         => __( 'Update', 'reaction' ),
          'view_item'           => __( 'View', 'reaction' ),
          'search_items'        => __( 'Search Services', 'reaction' ),
          'not_found'           => __( 'No Services found', 'reaction' ),
          'not_found_in_trash'  => __( 'No Services found in Trash', 'reaction' ),
      );
      $rewrite = array(
          'slug'                  => 'service',
          'with_front'            => false,
          'pages'                 => true,
          'feeds'                 => true,
      );
      $services_args = array(
          'label'               => __( 'Services', 'reaction' ),
          'description'         => __( 'Services', 'reaction' ),
          'labels'              => $services_labels,
          'supports'            => array( 'title', 'author', 'thumbnail', 'revisions', ),
          'hierarchical'        => false,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'menu_position'       => 10,
          'menu_icon'           => 'dashicons-hammer',
          'show_in_admin_bar'   => true,
          'show_in_nav_menus'   => true,
          'can_export'          => true,
          'has_archive'         => false,
          'exclude_from_search' => false,
          'publicly_queryable'  => true,
          'rewrite'               => $rewrite,
          'capability_type'     => 'page',
      );

      register_post_type( 'service', $services_args );


      // Location
      $location_labels = array(
          'name'                => _x( 'Locations', 'Post Type General Name', 'reaction' ),
          'singular_name'       => _x( 'Location', 'Post Type Singular Name', 'reaction' ),
          'menu_name'           => __( 'Locations', 'reaction' ),
          'name_admin_bar'      => __( 'Locations', 'reaction' ),
          'parent_item_colon'   => __( 'Parent:', 'reaction' ),
          'all_items'           => __( 'All Locations', 'reaction' ),
          'add_new_item'        => __( 'Add New Location', 'reaction' ),
          'add_new'             => __( 'Add New', 'reaction' ),
          'new_item'            => __( 'New', 'reaction' ),
          'edit_item'           => __( 'Edit', 'reaction' ),
          'update_item'         => __( 'Update', 'reaction' ),
          'view_item'           => __( 'View', 'reaction' ),
          'search_items'        => __( 'Search Locations', 'reaction' ),
          'not_found'           => __( 'No Locations found', 'reaction' ),
          'not_found_in_trash'  => __( 'No Locations found in Trash', 'reaction' ),
      );
      $rewrite = array(
          'slug'                  => 'location',
          'with_front'            => false,
          'pages'                 => true,
          'feeds'                 => true,
      );
      $location_args = array(
          'label'               => __( 'Locations', 'reaction' ),
          'description'         => __( 'Locations', 'reaction' ),
          'labels'              => $location_labels,
          'supports'            => array( 'title', 'author', 'thumbnail', 'revisions', ),
          'hierarchical'        => false,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'menu_position'       => 11,
          'menu_icon'           => 'dashicons-location',
          'show_in_admin_bar'   => true,
          'show_in_nav_menus'   => true,
          'can_export'          => true,
          'has_archive'         => false,
          'exclude_from_search' => false,
          'publicly_queryable'  => true,
          'rewrite'               => $rewrite,
          'capability_type'     => 'page',
      );

      register_post_type( 'location', $location_args );

      // Team
      $team_labels = array(
        'name'                => _x( 'Teams', 'Post Type General Name', 'reaction' ),
        'singular_name'       => _x( 'Team', 'Post Type Singular Name', 'reaction' ),
        'menu_name'           => __( 'Teams', 'reaction' ),
        'name_admin_bar'      => __( 'Teams', 'reaction' ),
        'parent_item_colon'   => __( 'Parent:', 'reaction' ),
        'all_items'           => __( 'All Teams', 'reaction' ),
        'add_new_item'        => __( 'Add New Team', 'reaction' ),
        'add_new'             => __( 'Add New', 'reaction' ),
        'new_item'            => __( 'New', 'reaction' ),
        'edit_item'           => __( 'Edit', 'reaction' ),
        'update_item'         => __( 'Update', 'reaction' ),
        'view_item'           => __( 'View', 'reaction' ),
        'search_items'        => __( 'Search Teams', 'reaction' ),
        'not_found'           => __( 'No Teams found', 'reaction' ),
        'not_found_in_trash'  => __( 'No Teams found in Trash', 'reaction' ),
      );
        $rewrite = array(
            'slug'                  => 'team',
            'with_front'            => false,
            'pages'                 => true,
            'feeds'                 => true,
        );
      $team_args = array(
        'label'               => __( 'Teams', 'reaction' ),
        'description'         => __( 'Teams', 'reaction' ),
        'labels'              => $team_labels,
        'supports'            => array( 'title', 'author', 'thumbnail', 'revisions', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 11,
        'menu_icon'           => 'dashicons-id',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false,
          'rewrite'               => $rewrite,
        'capability_type'     => 'page',
      );


      register_post_type( 'team', $team_args );

      // FAQs
      $faqs_labels = array(
          'name'                => _x( 'FAQs', 'Post Type General Name', 'reaction' ),
          'singular_name'       => _x( 'FAQ', 'Post Type Singular Name', 'reaction' ),
          'menu_name'           => __( 'FAQs', 'reaction' ),
          'name_admin_bar'      => __( 'FAQs', 'reaction' ),
          'parent_item_colon'   => __( 'Parent:', 'reaction' ),
          'all_items'           => __( 'All FAQs', 'reaction' ),
          'add_new_item'        => __( 'Add New FAQ', 'reaction' ),
          'add_new'             => __( 'Add New', 'reaction' ),
          'new_item'            => __( 'New', 'reaction' ),
          'edit_item'           => __( 'Edit', 'reaction' ),
          'update_item'         => __( 'Update', 'reaction' ),
          'view_item'           => __( 'View', 'reaction' ),
          'search_items'        => __( 'Search FAQs', 'reaction' ),
          'not_found'           => __( 'No FAQs found', 'reaction' ),
          'not_found_in_trash'  => __( 'No FAQs found in Trash', 'reaction' ),
      );
      $rewrite = array(
          'slug'                  => 'faq',
          'with_front'            => false,
          'pages'                 => true,
          'feeds'                 => true,
      );
      $faqs_args = array(
          'label'               => __( 'FAQs', 'reaction' ),
          'description'         => __( 'FAQs', 'reaction' ),
          'labels'              => $faqs_labels,
          'supports'            => array( 'title', 'author', 'thumbnail', 'revisions', ),
          'hierarchical'        => false,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'menu_position'       => 12,
          'menu_icon'           => 'dashicons-media-text',
          'show_in_admin_bar'   => true,
          'show_in_nav_menus'   => true,
          'can_export'          => true,
          'has_archive'         => false,
          'exclude_from_search' => true,
          'publicly_queryable'  => false,
          'rewrite'               => $rewrite,
          'capability_type'     => 'page',
      );
      register_post_type( 'faq', $faqs_args );



        // Events
        $events_labels = array(
            'name'                => _x( 'Events', 'Post Type General Name', 'reaction' ),
            'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'reaction' ),
            'menu_name'           => __( 'Events', 'reaction' ),
            'name_admin_bar'      => __( 'Events', 'reaction' ),
            'parent_item_colon'   => __( 'Parent:', 'reaction' ),
            'all_items'           => __( 'All Events', 'reaction' ),
            'add_new_item'        => __( 'Add New Event', 'reaction' ),
            'add_new'             => __( 'Add New', 'reaction' ),
            'new_item'            => __( 'New', 'reaction' ),
            'edit_item'           => __( 'Edit', 'reaction' ),
            'update_item'         => __( 'Update', 'reaction' ),
            'view_item'           => __( 'View', 'reaction' ),
            'search_items'        => __( 'Search Events', 'reaction' ),
            'not_found'           => __( 'No Events found', 'reaction' ),
            'not_found_in_trash'  => __( 'No Events found in Trash', 'reaction' ),
        );
        $rewrite = array(
            'slug'                  => 'event',
            'with_front'            => false,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $events_args = array(
            'label'               => __( 'Events', 'reaction' ),
            'description'         => __( 'Events', 'reaction' ),
            'labels'              => $events_labels,
            'supports'            => array( 'title', 'author', 'thumbnail', 'revisions', ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 13,
            'menu_icon'           => 'dashicons-nametag',
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'rewrite'               => $rewrite,
            'capability_type'     => 'page',
        );

        register_post_type( 'event', $events_args );

        // Testimonials
        $testimonial_labels = array(
            'name'                => _x( 'Testimonials', 'Post Type General Name', 'reaction' ),
            'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'reaction' ),
            'menu_name'           => __( 'Testimonials', 'reaction' ),
            'name_admin_bar'      => __( 'Testimonials', 'reaction' ),
            'parent_item_colon'   => __( 'Parent:', 'reaction' ),
            'all_items'           => __( 'All Testimonials', 'reaction' ),
            'add_new_item'        => __( 'Add New Testimonial', 'reaction' ),
            'add_new'             => __( 'Add New', 'reaction' ),
            'new_item'            => __( 'New', 'reaction' ),
            'edit_item'           => __( 'Edit', 'reaction' ),
            'update_item'         => __( 'Update', 'reaction' ),
            'view_item'           => __( 'View', 'reaction' ),
            'search_items'        => __( 'Search Testimonials', 'reaction' ),
            'not_found'           => __( 'No Testimonials found', 'reaction' ),
            'not_found_in_trash'  => __( 'No Testimonials found in Trash', 'reaction' ),
        );
        $rewrite = array(
            'slug'                  => 'testimonial',
            'with_front'            => false,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $testimonial_args = array(
            'label'               => __( 'Testimonials', 'reaction' ),
            'description'         => __( 'Testimonials', 'reaction' ),
            'labels'              => $testimonial_labels,
            'supports'            => array( 'title','editor', 'author', 'thumbnail', 'revisions', ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 7,
            'menu_icon'           => 'dashicons-money',
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
            'rewrite'               => $rewrite,
            'capability_type'     => 'page',
        );

        register_post_type( 'testimonial', $testimonial_args );


    }
// Hooking up our function to theme setup
add_action( 'init', 'craft_post_types' );
