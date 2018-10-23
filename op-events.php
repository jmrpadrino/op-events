<?php
/*
 * Plugin Name: Karriere Netzwerk OP Events
 * Plugin URI: https://palacios-online.de/
 * Version: 0.1
 * Description: Plugin für Events Termine
 * Author: José Rodriguez and The Palacios Online Team
 * Author URI: https://palacios-online.de/
 * Text Domain: op
 * Domain Path: /languages
 * License: GPLv2 or later
 */
/*
    Karriere Netzwerk OP Events is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 2 of the License, or
    any later version.

    Karriere Netzwerk OP Events is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Schnellbuegel Training.
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

define( 'OP_PLUGIN_DIR', trailingslashit( dirname(__FILE__) ) );
define( 'OP_PLUGIN_URI', plugins_url('', __FILE__) );

require_once 'op-setup.php';

/* BACKEND DEPENDENCIES */
require_once 'backend/op-cpt.php';
require_once 'backend/op-events-tax.php';
require_once 'backend/op-metaboxes-events.php';

/* FRONTEND DEPENDENCIESN */
require_once 'frontend/op-divi-cpt-support.php';
require_once 'frontend/op-show-posts-functions.php';


