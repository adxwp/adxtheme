<?php

namespace Adxtheme\Inc;

class Assets {

	private $theme_name;
	private $theme_dir_uri;
	private $version;
	private $mode = 'development';

	public function __construct($version, $theme_name, $theme_dir_uri) {
		$this->theme_name = $theme_name;
		$this->theme_dir_uri = $theme_dir_uri;
		$this->version = $version;
	}

	public function enqueue_public_styles() {
		wp_register_style($this->theme_name, $this->theme_dir_uri . '/assets/css/'.$this->theme_name.'-public.css', array(), rand(1,99), 'all');
		wp_enqueue_style($this->theme_name);
	}

}