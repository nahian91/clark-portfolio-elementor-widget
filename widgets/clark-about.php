<?php
/**
 * Clark About Widget.
 *
 * Elementor widget that inserts heading into the page
 *
 * @since 1.0.0
 */
class Clark_About_Widget extends \Elementor\Widget_Base {

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
		return 'clark-about';
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
		return esc_html__( 'Clark About', 'clark-elementor' );
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
		return 'eicon-person';
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
	       'about_image_content',
		    [
		        'label' => esc_html__('Image','clark-elementor'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );

		$this->add_control(
			'about_image',
			[
				'label' => esc_html__( 'Choose Image', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();
		
		// start of the Content tab section
		$this->start_controls_section(
			'about_title_content',
			 [
				 'label' => esc_html__('Title','clark-elementor'),
				 'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			
			 ]
		 );
		$this->add_control(
			'about_title', [
				'label' => esc_html__( 'About Title', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'About Me' , 'clark-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'about_subtitle', [
				'label' => esc_html__( 'About Subtitle', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'About' , 'clark-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'about_desc', [
				'label' => esc_html__( 'About Desc', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'A small river named Duden flows by their place and supplies it with the necessary regelialia.' , 'clark-elementor' ),
				'label_block' => true,
			]
		);
		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'about_info_content',
			 [
				 'label' => esc_html__('About Info','clark-elementor'),
				 'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			
			 ]
		 );

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'about_info_title', [
				'label' => esc_html__( 'Info Title', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Name' , 'clark-elementor' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'about_info_desc', [
				'label' => esc_html__( 'Info Description', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe' , 'clark-elementor' ),
				'show_label' => true,
			]
		);

		$this->add_control(
			'about_info',
			[
				'label' => esc_html__( 'Iifo List', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ about_info_title }}}',
			]
		);

		$this->add_control(
			'show_about_button',
			[
				'label' => esc_html__( 'Show Button?', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);

		$this->add_control(
			'about_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Download CV', 'plugin-name' ),
				'condition' => [
					'show_about_button' => 'yes'
				]
			]
		);

		$this->add_control(
			'about_btn_url',
			[
				'label' => esc_html__( 'Button Link', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'plugin-name' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'condition' => [
					'show_about_button' => 'yes'
				]
			]
		);


		$this->end_controls_section();

		
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
		$about_image = $settings['about_image'];	
		$about_title = $settings['about_title'];
		$about_subtitle = $settings['about_subtitle'];
		$about_desc = $settings['about_desc'];
		$about_info = $settings['about_info'];
		$show_about_button = $settings['show_about_button'];
		$about_btn_text = $settings['about_btn_text'];	
		$about_btn_url = $settings['about_btn_url'];
	?>
		<div class="row d-flex">
    			<div class="col-md-6 col-lg-5 d-flex">
    				<div class="img-about img d-flex align-items-stretch">
    					<div class="overlay"></div>
	    				<div class="img d-flex align-self-stretch align-items-center" style="background-image:url('<?php echo $about_image['url'];?>');">
	    				</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-7 pl-lg-5 pb-5">
    				<div class="row justify-content-start pb-3">
		          <div class="col-md-12 heading-section">
		          	<h1 class="big"><?php echo $about_subtitle;?></h1>
		            <h2 class="mb-4"><?php echo $about_title;?></h2>
		            <p><?php echo $about_desc;?></p>
		            <ul class="about-info mt-4 px-md-0 px-2">
		            	<?php
							foreach($about_info as $info) {
						?>
		            		<li class="d-flex"><span><?php echo $info['about_info_title'];?>: </span> <span><?php echo $info['about_info_desc'];?></span></li>
						<?php
							}
						?>
		            </ul>
		          </div>
		        </div>
				<?php
					if($show_about_button == 'yes') {
				?>
					<div class="counter-wrap">
						<div class="text">
							<p><a href="<?php echo $about_btn_url['url'];?>" class="btn btn-primary py-3 px-3"><?php echo $about_btn_text;?></a></p>
						</div>
					</div>
				<?php
					}
				?>
	        </div>
        </div>
       <?php
	}
}