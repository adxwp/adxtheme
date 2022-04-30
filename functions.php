<?php

/**
 * adxtheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package adxtheme
 */


use Adxtheme\Inc\Adxtheme;

if ( ! defined('ADXTHEME_TEXTDOMAIN') ) {
	define('ADXTHEME_TEXTDOMAIN', 'adxtheme');
}

if ( ! defined('ADXTHEME_DIR_PATH') ) {
	define('ADXTHEME_DIR_PATH', untrailingslashit( get_template_directory()));
}

if ( ! defined( 'ADXTHEME_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ADXTHEME_VERSION', '1.0.0' );
}

require_once ADXTHEME_DIR_PATH . '/inc/helpers/autoloader.php';

if ( class_exists( Adxtheme::class) ) {
	$adxtheme = Adxtheme::get_instance();
	$adxtheme->run();
}

