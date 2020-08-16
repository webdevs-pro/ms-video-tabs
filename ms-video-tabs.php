<?php
/**
 * Plugin Name: MS Video Tabs
 * Description: MagnificSoft custom video tabs Elementor widget
 * Plugin URI:  https://magnificsoft.com/
 * Version:     1.3
 * Author:      web-devs.pro
 * Text Domain: ms-video-tabs
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

final class MS_Video_Tabs {

	public function __construct() {
		add_action( 'init', array( $this, 'i18n' ) );
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	public function i18n() {
		load_plugin_textdomain( 'ms-video-tabs' );
	}

	public function init() {
		// Check if Elementor installed and activated
		if (!did_action('elementor/loaded')) 
			return;

		require_once('plugin.php');

		// register web devs category
		add_action( 'elementor/elements/categories_registered', function($elements_manager) {
			$elements_manager->add_category(
				'web-devs-category',
				[
					'title' => __('Web Devs Widgets','ms-video-tabs'),
					'icon' => 'fa fa-plug',
				]
			);
		});
	}

}
new MS_Video_Tabs();
