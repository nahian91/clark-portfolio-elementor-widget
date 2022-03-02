<?php
/**
 * Clark Services Widget.
 *
 * Elementor widget that inserts services into the page
 *
 * @since 1.0.0
 */
class Clark_Services_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading  widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'clark-services';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Clark Services', 'clark-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading  widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-table-of-contents';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'clark-common' ];
	}

	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		
	   // start of the Content tab section
	   $this->start_controls_section(
	       'content-section',
		    [
		        'label' => esc_html__('Content','clark-elementor'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );

		$this->add_control(
			'service_media',
			[
				'label' => esc_html__( 'Media Type', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'icon' => [
						'title' => esc_html__( 'Icon', 'plugin-name' ),
						'icon' => 'eicon-favorite',
					],
					'image' => [
						'title' => esc_html__( 'Image', 'plugin-name' ),
						'icon' => 'eicon-image',
					],
					'number' => [
						'title' => esc_html__( 'Number', 'plugin-name' ),
						'icon' => 'eicon-number-field',
					],
				],
				'default' => 'icon',
				'toggle' => true,
			]
		);

		$this->add_control(
			'service_icon',
			[
				'label' => esc_html__( 'Icon', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
				'condition' => [
					'service_media' => 'icon'
				]
			]
		);

		$this->add_control(
			'service_image',
			[
				'label' => esc_html__( 'Choose Image', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'service_media' => 'image'
				]
			]
		);
		
		$this->add_control(
			'service_number', [
				'label' => esc_html__( 'Number', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => esc_html__( '1' , 'clark-elementor' ),
				'label_block' => true,
				'condition' => [
					'service_media' => 'number'
				]
			]
		);

		$this->add_control(
			'service_title', [
				'label' => esc_html__( 'Service Title', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Web Design' , 'clark-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'service_desc', [
				'label' => esc_html__( 'Service Description', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'A small river named Duden flows by their place and supplies it with the necessary regelialia.' , 'clark-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'service_align',
			[
				'label' => esc_html__( 'Alignment', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'clark-elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'clark-elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'clark-elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .services-1 span.number, .services-1 .icon, .services-1 .desc' => 'text-align: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_section();
		// end of the Content section

		
		// start of the Style tab section
		$this->start_controls_section(
			'heading_style',
			[
				'label' => esc_html__( 'Style', 'clark-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'service_icon_style',
			[
				'label' => esc_html__( 'Icon', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'condition' => [
					'service_media' => 'icon'
				]
			]
		);

		$this->add_control(
			'service_icon_color',
			[
				'label' => esc_html__( 'Color', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .services-1 .icon i' => 'color: {{VALUE}}',
				],
				'default' => '#ffbd39',
				'condition' => [
					'service_media' => 'icon'
				]
			]
		);

		$this->add_control(
			'service_icon_size',
			[
				'label' => esc_html__( 'Size', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 60,
				],
				'selectors' => [
					'{{WRAPPER}} .services-1 .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'service_media' => 'icon'
				]
			]
		);

		$this->add_control(
			'service_number_style',
			[
				'label' => esc_html__( 'Number', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'condition' => [
					'service_media' => 'number'
				]
			]
		);

		$this->add_control(
			'service_number_color',
			[
				'label' => esc_html__( 'Color', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .services-1 span.number' => 'color: {{VALUE}}',
				],
				'default' => '#ffbd39',
				'condition' => [
					'service_media' => 'number'
				]
			]
		);

		$this->add_control(
			'service_number_size',
			[
				'label' => esc_html__( 'Size', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 60,
				],
				'selectors' => [
					'{{WRAPPER}} .services-1 span.number' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'service_media' => 'number'
				]
			]
		);


		$this->add_control(
			'service_image_style',
			[
				'label' => esc_html__( 'Image', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'condition' => [
					'service_media' => 'image'
				]
			]
		);

		$this->add_control(
			'service_image_size',
			[
				'label' => esc_html__( 'Size', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 60,
				],
				'selectors' => [
					'{{WRAPPER}} .services-1 img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'service_media' => 'image'
				]
			]
		);


		$this->add_control(
			'service_title_style',
			[
				'label' => esc_html__( 'Title', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'service_title_color',
			[
				'label' => esc_html__( 'Color', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .services-1 .desc h3' => 'color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'service_title_typography',
				'selector' => '{{WRAPPER}} .services-1 .desc h3',
			]
		);

		$this->add_control(
			'service_separator_color',
			[
				'label' => esc_html__( 'Separator', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .services-1 .desc h3::after' => 'background-color: {{VALUE}}',
				],
				'default' => '#ffbd39'
			]
		);

		$this->add_control(
			'service_desc_style',
			[
				'label' => esc_html__( 'Description', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'service_desc_color',
			[
				'label' => esc_html__( 'Color', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .services-1 p' => 'color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'service_desc_typography',
				'selector' => '{{WRAPPER}} .services-1 p',
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Render heading  widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();
		$service_media = $settings['service_media'];
		$service_icon = $settings['service_icon'];
		$service_image = $settings['service_image'];
		$service_number = $settings['service_number'];
		$service_title = $settings['service_title'];
		$service_desc = $settings['service_desc'];	
		$service_align = $settings['service_align'];	
			
	?>
		<a href="#" class="services-1 <?php echo $service_align;?>">

			<?php
				if($service_media == 'icon') {
			?>
				<span class="icon">
					<i class="<?php echo $service_icon['value'];?>"></i>
				</span>
			<?php
				}
			?>

			<?php
				if($service_media == 'number') {
			?>
				<span class="number">
					<?php echo $service_number;?>
				</span>
			<?php
				}
			?>

			<?php
				if($service_media == 'image') {
			?>
				<span class="image">
					<img src="<?php echo $service_image['url'];?>" alt="">
				</span>
			<?php
				}
			?>
			
			<div class="desc">
				<h3 class="mb-5"><?php echo $service_title;?></h3>
				<p><?php echo $service_desc;?></p>
			</div>
		</a>
       <?php
	}
}