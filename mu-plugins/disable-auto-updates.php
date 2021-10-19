<?php
/*
Plugin Name: Disable Auto Updates
Description: This plugin will disable all auto updates for WordPress, Themes and Plugins.
Author: Reactoin
Version: 1.1
Author URI: https://reaction.ca
*/

add_filter( 'automatic_updater_disabled', '__return_true' ); // Disable all updates WP, themes, plugins, translations
add_filter( 'auto_update_core', '__return_false' ); //Disable all WordPress updates
add_filter( 'allow_dev_auto_core_updates', '__return_false' ); // Disable WordPress development updates
add_filter( 'allow_minor_auto_core_updates', '__return_false' ); // Disable WordPress minor updates
add_filter( 'allow_major_auto_core_updates', '__return_false' ); // Disable WordPress major updates
add_filter( 'auto_core_update_send_email', '__return_false' ); // Disable update emails

add_filter( 'auto_update_plugin', '__return_false' ); // Disable WordPress plugin updates
add_filter( 'auto_update_theme', '__return_false' ); // Disable WordPress theme updates
