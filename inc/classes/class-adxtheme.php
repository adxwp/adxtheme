<?php

namespace Adxtheme\Inc;


use Adxtheme\Inc\Traits\Singleton;

class Adxtheme
{

	use Singleton;

	private $theme_name;
	private $theme_dir_uri;
	private $version;

	/**
	 * The loader that's responsible for maintaining and registering all hooks
	 *
	 * @var      Adxtheme_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;


	public function __construct() {
		$this->init();
		$this->theme_setup();
		$this->enqueue_scripts();
	}

	private function init () {
		$this->theme_name = 'adxtheme';
		$this->version = '1.9.0';
		$this->theme_dir_uri = untrailingslashit( get_template_directory_uri() );
		$this->loader = new Loader();
	}

	private function theme_setup() {
		$theme_setup = new Adxtheme_Setup();
		$this->loader->add_action('after_setup_theme', $theme_setup, 'adxtheme_setup');
	}

	private function enqueue_scripts() {

//		$adxtheme_public = new Adxtheme_Public( $this->get_plugin_name(), $this->get_version() );
		$adxtheme_assets = new Assets($this->get_version(), $this->get_theme_name(), $this->get_theme_dir_uri());
		$this->loader->add_action( 'wp_enqueue_scripts', $adxtheme_assets, 'enqueue_public_styles' );

	}

	private function get_theme_name() {
		return $this->theme_name;
	}

	private function get_theme_dir_uri() {
		return $this->theme_dir_uri;
	}

	private function get_version() {
		return $this->version;
	}

	public function run() {
		$this->loader->run();
	}


}