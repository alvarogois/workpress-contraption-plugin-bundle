<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://alvarogois.ovni.org
 * @since             1.0.0
 * @package           WorkPress_Contraption_Plugin_Bundle
 *
 * @wordpress-plugin
 * Plugin Name:       WorkPress Contraption
 * Plugin URI:        http://workpress.pt
 * Description:       Install and activate a bundle of selected plugins.
 * Version:           1.0.0
 * Author:            Álvaro Góis
 * Author URI:        http://alvarogois.ovni.org
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       workpress-contraption-plugin-bundle
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
 die;
}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for plugin WorkPress Contraption plugin bundle
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once dirname( __FILE__ ) . '/includes/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'workpress_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function workpress_register_required_plugins() {
 /*
  * Array of plugin arrays. Required keys are name and slug.
  * If the source is NOT from the .org repo, then source is also required.
  */
 $plugins = array(

  // This is an example of how to include a plugin bundled with a theme.
  // array(
  //  'name'               => 'GitHub Updater', // The plugin name.
  //  'slug'               => 'github-updater', // The plugin slug (typically the folder name).
  //  'source'             => dirname( __FILE__ ) . '/plugins/github-updater', // The plugin source.
  //  'required'           => true, // If false, the plugin is only 'recommended' instead of required.
  //  'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
  //  'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
  //  'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
  //  'external_url'       => '', // If set, overrides default API URL and points to an external URL.
  //  'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
  // ),

  // This is an example of how to include a plugin from an arbitrary external source in your theme.
  // array(
  //  'name'         => 'TGM New Media Plugin', // The plugin name.
  //  'slug'         => 'tgm-new-media-plugin', // The plugin slug (typically the folder name).
  //  'source'       => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
  //  'required'     => true, // If false, the plugin is only 'recommended' instead of required.
  //  'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
  // ),

  // This is an example of how to include a plugin from a GitHub repository in your theme.
  // This presumes that the plugin code is based in the root of the GitHub repository
  // and not in a subdirectory ('/src') of the repository.
  array(
   'name'    => 'GitHub Updater',
   'slug'    => 'github-updater',
   'source'  => 'https://github.com/afragen/github-updater/archive/develop.zip',
   'required'  => true,
  ),

  // This is an example of how to include a plugin from a GitHub repository in your theme.
  // This presumes that the plugin code is based in the root of the GitHub repository
  // and not in a subdirectory ('/src') of the repository.
  array(
   'name'    => 'WP Sync DB',
   'slug'    => 'wp-sync-db',
   'source'  => 'https://github.com/wp-sync-db/wp-sync-db/archive/master.zip',
  ),

  // This is an example of how to include a plugin from a GitHub repository in your theme.
  // This presumes that the plugin code is based in the root of the GitHub repository
  // and not in a subdirectory ('/src') of the repository.
  array(
   'name'   => 'WP Sync DB Media Files',
   'slug'   => 'wp-sync-db-media-files',
   'source' => 'https://github.com/wp-sync-db/wp-sync-db-media-files/archive/master.zip',
  ),

  // This is an example of how to include a plugin from the WordPress Plugin Repository.
  array(
   'name'      => 'Duplicate Post',
   'slug'      => 'duplicate-post',
   'required'  => false,
  ),

  array(
   'name'     => 'WP Notification Center',
   'slug'     => 'wp-notification-center',
   'required' => false,
  ),

  array(
   'name'      => 'Lightweight Grid Columns',
   'slug'      => 'lightweight-grid-columns',
   'required'  => false,
  ),

  array(
   'name'      => 'Simple CSS',
   'slug'      => 'simple-css',
   'required'  => false,
  ),

  array(
   'name'      => 'WP Show Posts',
   'slug'      => 'wp-show-posts',
   'required'  => false,
  ),

  array(
   'name'      => 'Lightweight Social Icons',
   'slug'      => 'lightweight-social-icons',
   'required'  => false,
  ),

  array(
   'name' => 'InfiniteWP Client',
   'slug' => 'iwp-client',
   'required'  => false,
  ),

  array(
   'name' => 'iThemes Security (formerly Better WP Security)',
   'slug' => 'better-wp-security',
   'required'  => false,
  ),

  array(
   'name' => 'WP Fastest Cache',
   'slug' => 'wp-fastest-cache',
   'required'  => false,
  ),

  array(
   'name' => 'Autoptimize',
   'slug' => 'autoptimize',
   'required'  => false,
  ),

  array(
   'name' => 'Wordfence Security',
   'slug' => 'wordfence',
   'required'  => false,
  ),

  array(
   'name' => 'WP Rollback',
   'slug' => 'wp-rollback',
   'required'  => false,
  ),

  array(
   'name' => 'WP Time Capsule',
   'slug' => 'wp-time-capsule',
   'required'  => false,
  ),

  array(
   'name' => 'What The File',
   'slug' => 'what-the-file',
   'required'  => false,
  ),

  array(
   'name' => 'WP Page Load Stats',
   'slug' => 'wp-page-load-stats',
   'required'  => false,
  ),

  array(
   'name' => 'Filenames to Latin',
   'slug' => 'filenames-to-latin',
   'required'  => false,
  ),

  array(
   'name' => 'Regenerate Thumbnails',
   'slug' => 'regenerate-thumbnails',
   'required'  => false,
  ),

  array(
   'name' => 'Enable Media Replace',
   'slug' => 'enable-media-replace',
   'required'  => false,
  ),

  array(
   'name' => 'WP Performance Score Booster',
   'slug' => 'wp-performance-score-booster',
   'required'  => false,
  ),

  array(
   'name' => 'WP Performance Score Booster',
   'slug' => 'wp-performance-score-booster',
   'required'  => false,
  ),

  array(
   'name' => 'Admin Bar Tools',
   'slug' => 'sf-adminbar-tools',
   'required'  => false,
  ),

  array(
   'name' => 'Toolbar Publish Button',
   'slug' => 'toolbar-publish-button',
   'required'  => false,
  ),

  array(
   'name' => 'Two-Factor',
   'slug' => 'two-factor',
   'required'  => false,
  ),

  array(
   'name' => 'The SEO Framework',
   'slug' => 'autodescription',
   'required'  => false,
  ),

  array(
   'name' => 'Shiny Updates',
   'slug' => 'shiny-updates',
   'required'  => false,
  ),

  array(
   'name' => 'The Hack Repair Guy\'s Plugin Archiver',
   'slug' => 'hackrepair-plugin-archiver',
   'required'  => false,
  ),

  // This is an example of the use of 'is_callable' functionality. A user could - for instance -
  // have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
  // 'wordpress-seo-premium'.
  // By setting 'is_callable' to either a function from that plugin or a class method
  // `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
  // recognize the plugin as being installed.
//  array(
//   'name'        => 'WordPress SEO by Yoast',
//   'slug'        => 'wordpress-seo',
//   'is_callable' => 'wpseo_init',
//  ),

 );

 /*
  * Array of configuration settings. Amend each line as needed.
  *
  * TGMPA will start providing localized text strings soon. If you already have translations of our standard
  * strings available, please help us make TGMPA even better by giving us access to these translations or by
  * sending in a pull-request with .po file(s) with the translations.
  *
  * Only uncomment the strings in the config array if you want to customize the strings.
  */
 $config = array(
  'id'           => 'workpress',                 // Unique ID for hashing notices for multiple instances of TGMPA.
  'default_path' => '',                      // Default absolute path to bundled plugins.
  'menu'         => 'tgmpa-install-plugins', // Menu slug.
  'parent_slug'  => 'plugins.php',            // Parent menu slug.
  'capability'   => 'manage_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
  'has_notices'  => true,                    // Show admin notices or not.
  'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
  'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
  'is_automatic' => false,                   // Automatically activate plugins after installation or not.
  'message'      => '',                      // Message to output right before the plugins table.

  /*
  'strings'      => array(
   'page_title'                      => __( 'Install Required Plugins', 'workpress' ),
   'menu_title'                      => __( 'Install Plugins', 'workpress' ),
   /* translators: %s: plugin name. * /
   'installing'                      => __( 'Installing Plugin: %s', 'workpress' ),
   /* translators: %s: plugin name. * /
   'updating'                        => __( 'Updating Plugin: %s', 'workpress' ),
   'oops'                            => __( 'Something went wrong with the plugin API.', 'workpress' ),
   'notice_can_install_required'     => _n_noop(
    /* translators: 1: plugin name(s). * /
    'This theme requires the following plugin: %1$s.',
    'This theme requires the following plugins: %1$s.',
    'workpress'
   ),
   'notice_can_install_recommended'  => _n_noop(
    /* translators: 1: plugin name(s). * /
    'This theme recommends the following plugin: %1$s.',
    'This theme recommends the following plugins: %1$s.',
    'workpress'
   ),
   'notice_ask_to_update'            => _n_noop(
    /* translators: 1: plugin name(s). * /
    'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
    'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
    'workpress'
   ),
   'notice_ask_to_update_maybe'      => _n_noop(
    /* translators: 1: plugin name(s). * /
    'There is an update available for: %1$s.',
    'There are updates available for the following plugins: %1$s.',
    'workpress'
   ),
   'notice_can_activate_required'    => _n_noop(
    /* translators: 1: plugin name(s). * /
    'The following required plugin is currently inactive: %1$s.',
    'The following required plugins are currently inactive: %1$s.',
    'workpress'
   ),
   'notice_can_activate_recommended' => _n_noop(
    /* translators: 1: plugin name(s). * /
    'The following recommended plugin is currently inactive: %1$s.',
    'The following recommended plugins are currently inactive: %1$s.',
    'workpress'
   ),
   'install_link'                    => _n_noop(
    'Begin installing plugin',
    'Begin installing plugins',
    'workpress'
   ),
   'update_link' 					  => _n_noop(
    'Begin updating plugin',
    'Begin updating plugins',
    'workpress'
   ),
   'activate_link'                   => _n_noop(
    'Begin activating plugin',
    'Begin activating plugins',
    'workpress'
   ),
   'return'                          => __( 'Return to Required Plugins Installer', 'workpress' ),
   'plugin_activated'                => __( 'Plugin activated successfully.', 'workpress' ),
   'activated_successfully'          => __( 'The following plugin was activated successfully:', 'workpress' ),
   /* translators: 1: plugin name. * /
   'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'workpress' ),
   /* translators: 1: plugin name. * /
   'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'workpress' ),
   /* translators: 1: dashboard link. * /
   'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'workpress' ),
   'dismiss'                         => __( 'Dismiss this notice', 'workpress' ),
   'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'workpress' ),
   'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'workpress' ),

   'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
  ),
  */
 );

 tgmpa( $plugins, $config );
}
