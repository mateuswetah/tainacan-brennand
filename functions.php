<?php
/*
Plugin Name: Tainacan Brennand
Plugin URI: https://tainacan.org/
Description: Suporte para telas do plugin Tainacan em uso no tema da Oficina Brennand - IMPORTANTE - Não remova
Author: wetah
Version: 0.0.1
Text Domain: tainacan-brennand
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if (! defined('WP_DEBUG') ) {
	die( 'Direct access forbidden.' );
}

/** Plugin version */
const TAINACAN_BRENNAND_VERSION = '0.0.1';

$plugin_root_url = plugin_dir_url(__FILE__);
define('TAINACAN_BRENNAND_PLUGIN_URL_PATH', $plugin_root_url);

$plugin_root_dir = plugin_dir_path(__FILE__);
define('TAINACAN_BRENNAND_PLUGIN_DIR_PATH', $plugin_root_dir);

/* Basic styles and script enqueues */
require TAINACAN_BRENNAND_PLUGIN_DIR_PATH . 'inc/enqueues.php';

/* Adds custom files for Tainacan view modes */
require TAINACAN_BRENNAND_PLUGIN_DIR_PATH . 'inc/viewmodes.php';

/* Requires several settings, functions and helpers */
require TAINACAN_BRENNAND_PLUGIN_DIR_PATH . 'inc/plugin.php';
require TAINACAN_BRENNAND_PLUGIN_DIR_PATH . 'inc/navigation.php';

