<?php
namespace MS_Video_Tabs;

use MS_Video_Tabs\Widgets\ms_video_tabs;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class MS_Video_Tabs_Plugin {

	public function __construct() {
		$this->add_actions();
	}

	private function add_actions() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
		add_action( 'elementor/frontend/after_register_scripts', function() {
			wp_register_script( 'ms-video-tabs-script', plugins_url( '/assets/ms-video-tabs.js', __FILE__ ), [ 'jquery' ], false, true );
		});
		add_action( 'elementor/frontend/after_enqueue_styles', function() {
			wp_enqueue_style( 'ms-video-tabs-style', plugins_url( '/assets/ms-video-tabs.css', __FILE__ ) );
		});
	}

	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	private function includes() {
		require __DIR__ . '/widgets/ms-video-tabs.php';
	}

	private function register_widget() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ms_video_tabs() );
	}
}
new MS_Video_Tabs_Plugin();
