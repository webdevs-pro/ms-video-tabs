<?php
namespace MS_Video_Tabs\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Scheme_Typography;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}



class ms_video_tabs extends \Elementor\Widget_Base {

	public function get_name() {
		return 'ms_video_tabs';
	}

	public function get_title() {
		return __( 'MS Viseo Tabs', 'ms-video-tabs' );
	}

	public function get_icon() {
		return 'eicon-tabs';
	}

	public function get_categories() {
		return [ 'web-devs-category' ];
	}

	public function get_script_depends() {
		return [ 'ms-video-tabs-script' ];
	}

	protected function _register_controls() {


		$this->start_controls_section( // CONTENT ------------------------------------------
			'content_section',
			[
				'label' => __( 'Tabs Content', 'ms-video-tabs' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


			// $this->add_control(
			// 	'element_id', [
			// 		'label' => __( 'Class or ID', 'ms-video-tabs' ),
			// 		'type' => \Elementor\Controls_Manager::TEXT,
			// 		'label_block' => true,
			// 	]
			// );

			// $this->add_control(
			// 	'item_important',
			// 	[
			// 		'label' => __( 'add !important', 'ms-video-tabs' ),
			// 		'type' => \Elementor\Controls_Manager::SWITCHER,
			// 		'label_on' => __( 'On', 'ms-video-tabs' ),
			// 		'label_off' => __( 'Off', 'ms-video-tabs' ),
			// 		'return_value' => '!important',
			// 		'default' => '',
			// 	]
			// );




			$repeater = new \Elementor\Repeater();

				$repeater->add_control(
					'item_title', [
						'label' => __( 'Button Title', 'ms-video-tabs' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Tab Title' , 'ms-video-tabs' ),
						'label_block' => true,
					]
				);
				$repeater->add_control(
					'item_icon',
					[
						'label' => __( 'Tab Icon', 'elementor' ),
						'type' => Controls_Manager::ICONS,
						'fa4compatibility' => 'icon',
						'default' => [
							'value' => 'fas fa-star',
							'library' => 'fa-solid',
						],
					]
				);
				$repeater->add_control(
					'item_heading', [
						'label' => __( 'Tab Heading', 'ms-video-tabs' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Tab Title' , 'ms-video-tabs' ),
						'label_block' => true,
					]
				);
				$repeater->add_control(
					'item_description',
					[
						'label' => __( 'Tab Description', 'ms-video-tabs' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'rows' => 10,
						'default' => __( 'Tab Description', 'ms-video-tabs' ),
					]
				);
				
				$repeater->add_control(
					'item_video',
					[
						'label' => __( 'Tab Video', 'elementor' ),
						'type' => Controls_Manager::MEDIA,
						'media_type' => 'video',
						// 'condition' => [
						// 	'video_type' => 'hosted',
						// 	'insert_url' => '',
						// ],
					]
				);

			$this->add_control(
				'tabs',
				[
					'label' => __( 'Tabs', 'ms-video-tabs' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'item_title' => __( 'Tab #1', 'ms-video-tabs' ),
							'item_description' => __( 'Tab description', 'ms-video-tabs' ),
						],
					],
					'title_field' => '{{{ item_title }}}',
				]
			);

		$this->end_controls_section();


	
		$this->start_controls_section( // STYLE ------------------------------------------
			'style_section',
			[
				'label' => __( 'Tabs Style', 'ms-video-tabs' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'buttons_align_horizontal',
				[
					'label' => __( 'Horizontal Alignment (Desktop)', 'plugin-domain' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'row' => [
							'title' => __( 'Left', 'plugin-domain' ),
							'icon' => 'eicon-h-align-left',
						],
						'row-reverse' => [
							'title' => __( 'Right', 'plugin-domain' ),
							'icon' => 'eicon-h-align-right',
						],
					],
					'default' => 'row',
					'toggle' => false,
					'selectors' => [
						'(desktop){{WRAPPER}} .elementor-widget-container' => 'flex-direction: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'buttons_align_vertical',
				[
					'label' => __( 'Vertical Alignment (Mobile)', 'plugin-domain' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'column' => [
							'title' => __( 'Top', 'plugin-domain' ),
							'icon' => 'eicon-v-align-top',
						],
						'column-reverse' => [
							'title' => __( 'Bottom', 'plugin-domain' ),
							'icon' => 'eicon-v-align-bottom',
						],
					],
					'default' => 'column',
					'toggle' => false,
					'selectors' => [
						'(tablet){{WRAPPER}} .elementor-widget-container' => 'flex-direction: {{VALUE}};',
						'(mobile){{WRAPPER}} .elementor-widget-container' => 'flex-direction: {{VALUE}};',
					],
				]
			);
			$this->add_responsive_control(
				'buttons_width',
				[
					'label' => __( 'Buttons Width', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 30,
					],
					'selectors' => [
						'{{WRAPPER}} .ms_video_tabs_buttons_pane' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'gap',
				[
					'label' => __( 'Gap', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 20,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 20,
					],
					'selectors' => [
						'(desktop){{WRAPPER}} .ms_video_tabs_gap' => 'width: {{SIZE}}{{UNIT}};',
						'(tablet){{WRAPPER}} .ms_video_tabs_gap' => 'height: {{SIZE}}{{UNIT}};',
						'(mobile){{WRAPPER}} .ms_video_tabs_gap' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'video_aspect_ratio',
				[
					'label' => __( 'Video Aspect Ration', 'plugin-domain' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '56.25',
					'options' => [
						'56.25'  => __( '16:9', 'plugin-domain' ),
						'62.5' => __( '16:10', 'plugin-domain' ),
						'75' => __( '4:3', 'plugin-domain' ),
					],
					'selectors' => [
						'{{WRAPPER}} .ms_video_tabs_content_pane .video_wrap' => 'padding-bottom: {{VALUE}}%;',

					],					
				]
			);

		$this->end_controls_section();

	}

   

	protected function render() { // php template

		$settings = $this->get_settings_for_display();
		// echo '<pre>' . print_r($settings['tabs'], true) . '</pre><br>';

		?>

		<div class="ms_video_tabs_buttons_pane">
			<div class="ms_video_tabs_info">
				<h3 class="ms_video_tabs_heading"><?php echo $settings['tabs'][0]['item_heading']; ?></h3>
				<div class="ms_video_tabs_description"><?php echo $settings['tabs'][0]['item_description']; ?></div>
			</div>
			<div class="ms_video_tabs_buttons">
				<?php foreach($settings['tabs'] as $key=>$item) { ?>
					<div 
						class="ms_video_tabs_button" 
						data-tab-heading="<?php echo $item['item_heading']; ?>"
						data-tab-description="<?php echo $item['item_description']; ?>"
						data-tab-video="<?php echo $item['item_video']['url']; ?>"
						role="button" tabindex="<?php echo $key; ?>"
					>
						<?php \Elementor\Icons_Manager::render_icon( $item['item_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						<?php echo $item['item_title']; ?>
						<div class="ms_video_tabs_button_progress"></div>
					</div>
				<?php } ?>
			</div>
		</div>

		<div class="ms_video_tabs_gap"></div>

		<div class="ms_video_tabs_content_pane">
			<div class="video_wrap">
				<video src="<?php echo $settings['tabs'][0]['item_video']['url']; ?>" playsinline muted></video>
			</div>
		</div>




		<?php

	}


	
}