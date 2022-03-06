<?php
/**
 * Clark Price Widget.
 *
 * Elementor widget that inserts heading into the page
 *
 * @since 1.0.0
 */
class Clark_Price_Widget extends \Elementor\Widget_Base {

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
		return 'clark-price';
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
		return esc_html__( 'Clark Price', 'clark-elementor' );
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
		return 'eicon-price-table';
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
			'price_title', [
				'label' => esc_html__( 'Price Title', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Standard' , 'clark-elementor' ),
			]
		);

		$this->add_control(
			'price_symbol',
			[
				'label' => esc_html__( 'Price Symbol', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '$',
				'options' => [
					'$'  => '$',
					'£'  => '£',
					'¥'  => '¥',
					'€'  => '€',
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'price_amount',
			[
				'label' => esc_html__( 'Price Amount', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 199,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'price_duration',
			[
				'label' => esc_html__( 'Price Symbol', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'month',
				'options' => [
					'month'  => 'Month',
					'yearly'  => 'Yearly',
				],			
				'separator' => 'before'
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'price_feature_title', [
				'label' => esc_html__( 'Feature Title', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Feature Title' , 'clark-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'price_feature',
			[
				'label' => esc_html__( 'Price Feature List', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ price_feature_title }}}',
			]
		);

		$this->add_control(
			'price_btn_text',
			[
				'label' => esc_html__( 'Price Button Text', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Buy Now', 'clark-elementor' )
			]
		);

		$this->add_control(
			'price_btn_url',
			[
				'label' => esc_html__( 'Price Button URL', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'clark-elementor' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'separator' => 'before'
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
			'heading_title_style',
			[
				'label' => esc_html__( 'Title', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'heading_title_color',
			[
				'label' => esc_html__( 'Color', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .heading-section h2' => 'color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_title_typography',
				'selector' => '{{WRAPPER}} .heading-section h2',
			]
		);

		$this->add_control(
			'heading_subtitle_style',
			[
				'label' => esc_html__( 'Subtitle', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'heading_subtitle_color',
			[
				'label' => esc_html__( 'Color', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .heading-section h1.big' => 'color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_subtitle_typography',
				'selector' => '{{WRAPPER}} .heading-section h1.big',
			]
		);

		$this->add_control(
			'heading_desc_style',
			[
				'label' => esc_html__( 'Description', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'heading_desc_color',
			[
				'label' => esc_html__( 'Color', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .heading-section p' => 'color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_desc_typography',
				'selector' => '{{WRAPPER}} .heading-section p',
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
		$price_title = $settings['price_title'];
		$price_symbol = $settings['price_symbol'];
		$price_amount = $settings['price_amount'];
		$price_duration = $settings['price_duration'];
		$price_feature = $settings['price_feature'];
		$price_btn_text = $settings['price_btn_text'];
		$price_btn_url = $settings['price_btn_url'];		
	?>
		<div class="ftco_single_price_table">
			<div class="price_header">
				<h2><?php echo $price_title;?></h2>
			</div>
			<div class="price_tag">
				<h3>
				<small><?php echo $price_symbol;?></small><?php echo $price_amount;?>
				</h3>
				<span>/ <?php echo $price_duration;?></span>
			</div>
			<div class="price_content">
				<ul>
					<?php foreach($price_feature as $feature) {					
				?>
					<li><?php echo $feature['price_feature_title'];?></li>
				<?php
					}
				?>
				</ul>
			</div>
			<div class="price_bottom">
				<a href="<?php echo $price_btn_url['url'];?>" class="btn btn-primary py-4 px-5"><?php echo $price_btn_text;?></a>
			</div>
			</div>
       <?php
	}
}