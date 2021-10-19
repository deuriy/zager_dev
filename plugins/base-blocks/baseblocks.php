<?php
    /*
    Plugin Name: BaseBlocks
    Plugin URI:  http://reaction.ca
    Version:     1.01
    Author:      Reaction
    Author URI:  http://reaction.ca
    Description: BaseBlocks for Reaction web wireframes
    Text Domain: reaction
    Domain Path: /lang
     */

    // Register BaseBlock Custom Post Type
    function bb_post_type() {

      // BaseBlocks
      $baseblock_labels = array(
        'name'                => _x( 'BaseBlocks', 'Post Type General Name', 'reaction' ),
        'singular_name'       => _x( 'BaseBlock', 'Post Type Singular Name', 'reaction' ),
        'menu_name'           => __( 'BaseBlocks', 'reaction' ),
        'name_admin_bar'      => __( 'BaseBlocks', 'reaction' ),
        'parent_item_colon'   => __( 'Parent:', 'reaction' ),
        'all_items'           => __( 'All BaseBlocks', 'reaction' ),
        'add_new_item'        => __( 'Add New BaseBlock', 'reaction' ),
        'add_new'             => __( 'Add New', 'reaction' ),
        'new_item'            => __( 'New', 'reaction' ),
        'edit_item'           => __( 'Edit', 'reaction' ),
        'update_item'         => __( 'Update', 'reaction' ),
        'view_item'           => __( 'View', 'reaction' ),
        'search_items'        => __( 'Search BaseBlocks', 'reaction' ),
        'not_found'           => __( 'No BaseBlocks found', 'reaction' ),
        'not_found_in_trash'  => __( 'No BaseBlocks found in Trash', 'reaction' ),
      );

      $baseblock_args = array(
        'label'               => __( 'BaseBlocks', 'reaction' ),
        'description'         => __( 'BaseBlocks', 'reaction' ),
        'labels'              => $baseblock_labels,
        'supports'            => array( 'title', 'author', 'thumbnail', 'revisions', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 9,
        'menu_icon'           => 'dashicons-info',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
      );

      register_post_type( 'baseblock', $baseblock_args );  
      
    }

    // Hook into the 'init' action
    add_action( 'init', 'bb_post_type' );
    
    // Create Pages from CPT
    function bb_create_pages(){
      $bb_index = get_option("bb_index");
      $bb_contacts = get_option("bb_contacts");
      $bb_contents = get_option("bb_contents");
      $bb_forms = get_option("bb_forms");
      $bb_cta = get_option("bb_cta");
      $bb_features = get_option("bb_features");
      $bb_footers = get_option("bb_footers");
      $bb_css = get_option("bb_css");
      $bb_headers = get_option("bb_headers");
      $bb_pricings = get_option("bb_pricings");
      $bb_teams = get_option("bb_teams");
      $bb_testimonials = get_option("bb_testimonials");
  
  
      if (!$bb_index) {
          $post1 = array(
              'post_title' => "Index",
              'post_name' => 'index',
              'post_content' => "",
              'post_status' => "publish",
              'post_type' => 'baseblock',
          );
          $postID = wp_insert_post($post1, $error);
          update_post_meta($postID, "_wp_page_template", "baseblock-index.php");
          update_option("bb_index", $postID);
      }
      if (!$bb_contacts) {
          $post1 = array(
              'post_title' => "Contacts",
              'post_name' => 'contacts',            
              'post_content' => "",
              'post_status' => "publish",
              'post_type' => 'baseblock',
          );
          $postID = wp_insert_post($post1, $error);
          update_post_meta($postID, "_wp_page_template", "baseblock-contacts.php");
          update_option("bb_contacts", $postID);
      }
      if (!$bb_contents) {
          $post1 = array(
              'post_title' => "Contents",
              'post_name' => 'contents',
              'post_content' => "",
              'post_status' => "publish",
              'post_type' => 'baseblock',
          );
          $postID = wp_insert_post($post1, $error);
          update_post_meta($postID, "_wp_page_template", "baseblock-contents.php");
          update_option("bb_contents", $postID);
      } 
      if (!$bb_forms) {
          $post1 = array(
              'post_title' => "Forms",
              'post_name' => 'forms',
              'post_content' => "",
              'post_status' => "publish",
              'post_type' => 'baseblock',
          );
          $postID = wp_insert_post($post1, $error);
          update_post_meta($postID, "_wp_page_template", "baseblock-forms.php");
          update_option("bb_forms", $postID);
      } 
      if (!$bb_cta) {
          $post1 = array(
              'post_title' => "CTA",
              'post_name' => 'cta',
              'post_content' => "",
              'post_status' => "publish",
              'post_type' => 'baseblock',
          );
          $postID = wp_insert_post($post1, $error);
          update_post_meta($postID, "_wp_page_template", "baseblock-cta.php");
          update_option("bb_cta", $postID);
      } 
      if (!$bb_features) {
          $post1 = array(
              'post_title' => "Features",
              'post_name' => 'features',
              'post_content' => "",
              'post_status' => "publish",
              'post_type' => 'baseblock',
          );
          $postID = wp_insert_post($post1, $error);
          update_post_meta($postID, "_wp_page_template", "baseblock-features.php");
          update_option("bb_features", $postID);
      } 
      if (!$bb_footers) {
          $post1 = array(
              'post_title' => "Footers",
              'post_name' => 'footers',
              'post_content' => "",
              'post_status' => "publish",
              'post_type' => 'baseblock',
          );
          $postID = wp_insert_post($post1, $error);
          update_post_meta($postID, "_wp_page_template", "baseblock-footers.php");
          update_option("bb_footers", $postID);
      } 
      if (!$bb_css) {
          $post1 = array(
              'post_title' => "Typography",
              'post_name' => 'css',            
              'post_content' => "",
              'post_status' => "publish",
              'post_type' => 'baseblock',
          );
          $postID = wp_insert_post($post1, $error);
          update_post_meta($postID, "_wp_page_template", "baseblock-css.php");
          update_option("bb_css", $postID);
      } 
      if (!$bb_headers) {
          $post1 = array(
              'post_title' => "Headers",
              'post_name' => 'headers',
              'post_content' => "",
              'post_status' => "publish",
              'post_type' => 'baseblock',
          );
          $postID = wp_insert_post($post1, $error);
          update_post_meta($postID, "_wp_page_template", "baseblock-headers.php");
          update_option("bb_headers", $postID);
      } 
      if (!$bb_pricings) {
          $post1 = array(
              'post_title' => "Pricings",
              'post_name' => 'pricings',            
              'post_content' => "",
              'post_status' => "publish",
              'post_type' => 'baseblock',
          );
          $postID = wp_insert_post($post1, $error);
          update_post_meta($postID, "_wp_page_template", "baseblock-pricings.php");
          update_option("bb_pricings", $postID);
      } 
      if (!$bb_teams) {
          $post1 = array(
              'post_title' => "Teams",
              'post_name' => 'teams',
              'post_content' => "",
              'post_status' => "publish",
              'post_type' => 'baseblock',
          );
          $postID = wp_insert_post($post1, $error);
          update_post_meta($postID, "_wp_page_template", "baseblock-teams.php");
          update_option("bb_teams", $postID);
      } 
      if (!$bb_testimonials) {
          $post1 = array(
              'post_title' => "Testimonials",
              'post_name' => 'testimonials',
              'post_content' => "",
              'post_status' => "publish",
              'post_type' => 'baseblock',
          );
          $postID = wp_insert_post($post1, $error);
          update_post_meta($postID, "_wp_page_template", "baseblock-testimonials.php");
          update_option("bb_testimonials", $postID);        
      }                           
    }
    
    // If they don't exist copy the template files into the theme
    function bb_create_templates(){
      $template = '/understrap/';
      $filedir = get_theme_root() . $template . 'baseblock-';
      $filenames = array('index', 'contacts', 'contents', 'forms', 'cta', 'features', 'footers', 'css', 'headers', 'pricings', 'teams', 'testimonials');
      foreach($filenames as $filename) {
        $file = $filedir . $filename . '.php';
        $temp_file_dir = plugin_dir_path( __FILE__ );
        $temp_file = $temp_file_dir . 'baseblocks/baseblock-' . $filename . '.php';
        if (!file_exists($file)) {
            if (!copy($temp_file, $file)) {
              update_option('bb_create_templates', "The file failed to copy: " . $temp_file);
            }
        } else {
            // The File Exists
        }
      }
    }

    // Fire these functions on plugin activation
    register_activation_hook( __FILE__, 'bb_create_pages' );
    register_activation_hook( __FILE__, 'bb_create_templates' );

    // Function to delete all bb posts
    function bb_delete_pages() {
        
        // Get all bb posts
        $bb_args = array(
        	'post_type'   => 'baseblock', 
        	'posts_per_page' => -1,
        	'post_status' => 'any' 
        );
        $bb_query = new WP_Query( $bb_args ); 
        $bb_post_ids = wp_list_pluck( $bb_query->posts, 'ID' );
        
        foreach( $bb_post_ids as $k => $bb_post_id ) {
          wp_delete_post($bb_post_id, true);
        }
        
        update_option('bb_index', '');
        update_option('bb_contacts', '');
        update_option('bb_contents', '');
        update_option('bb_forms', '');
        update_option('bb_cta', '');
        update_option('bb_features', '');
        update_option('bb_footers', '');
        update_option('bb_css', '');
        update_option('bb_headers', '');
        update_option('bb_pricings', '');
        update_option('bb_teams', '');
        update_option('bb_testimonials', '');
        
        flush_rewrite_rules();

    }
      
    function bb_delete_templates() {
      $template = '/rebase/';
      $filedir = get_theme_root() . $template . 'baseblock-';
      $filenames = array('index', 'contacts', 'contents', 'forms', 'cta', 'features', 'footers', 'css', 'headers', 'pricings', 'teams', 'testimonials');
      foreach($filenames as $filename) {
        $file = $filedir . $filename . '.php';
        if (file_exists($file)) {
          unlink($file);
        }
      }
    }
    
    // plugin deactivation/Uninstallation
    register_uninstall_hook( __FILE__, 'bb_delete_pages' );
    register_deactivation_hook( __FILE__, 'bb_delete_pages' );      
    register_uninstall_hook( __FILE__, 'bb_delete_templates' );
    register_deactivation_hook( __FILE__, 'bb_delete_templates' );    