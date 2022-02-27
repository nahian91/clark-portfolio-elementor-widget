<?php
/**
 * Clark Resume Widget.
 *
 * Elementor widget that inserts heading into the page
 *
 * @since 1.0.0
 */
class Clark_Resume_Widget extends \Elementor\Widget_Base {

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
		return 'clark-resume';
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
		return esc_html__( 'Clark Resume', 'clark-elementor' );
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
		return ' eicon-plug';
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
	       'education-section',
		    [
		        'label' => esc_html__('Education Content','clark-elementor'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );
		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'education_year', [
				'label' => esc_html__( 'Education Year', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '2014 - 2015' , 'plugin-name' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'education_title', [
				'label' => esc_html__( 'Education Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Diploma in Computer' , 'plugin-name' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'education_institute', [
				'label' => esc_html__( 'Education Institute', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Newyork University' , 'plugin-name' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'education_description', [
				'label' => esc_html__( 'Education Description', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Newyork University' , 'plugin-name' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'education_animation',
			[
				'label' => esc_html__( 'Entrance Animation', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::ANIMATION,
				'prefix_class' => 'animated ',
			]
		);

		$this->add_control(
			'education_list',
			[
				'label' => esc_html__( 'Education List', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ education_title }}}',
			]
		);

		$this->add_control(
			'education_align',
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
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .resume-wrap.' => 'text-align: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_section();
		// end of the Content section

		// start of the Content tab section
		$this->start_controls_section(
			'experience-section',
			 [
				 'label' => esc_html__('Experience Content','clark-elementor'),
				 'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			
			 ]
		 );

		 $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'experience_year', [
				'label' => esc_html__( 'Experience Year', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '2014 - 2015' , 'plugin-name' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'experience_title', [
				'label' => esc_html__( 'Experience Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Diploma in Computer' , 'plugin-name' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'experience_office', [
				'label' => esc_html__( 'Experience Office', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Newyork University' , 'plugin-name' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'experience_description', [
				'label' => esc_html__( 'Experience Description', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Newyork University' , 'plugin-name' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'experience_animation',
			[
				'label' => esc_html__( 'Entrance Animation', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::ANIMATION,
				'prefix_class' => 'animated ',
			]
		);

		$this->add_control(
			'experience_list',
			[
				'label' => esc_html__( 'Experience List', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ experience_title }}}',
			]
		);

		$this->add_control(
			'experience_align',
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
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .resume-wrap.' => 'text-align: {{VALUE}}',
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
		$education_list = $settings['education_list'];
		$experience_list = $settings['experience_list'];
		// $heading_desc = $settings['heading_desc'];
		// $heading_align = $settings['heading_align'];		
	?>
		<div class="row">
    			<div class="col-md-6">
    				<?php
						foreach($education_list as $list) {
					?>
					<div class="resume-wrap animated <?php echo $list['education_animation'];?>">
    					<span class="date"><?php echo $list['education_year'];?></span>
    					<h2><?php echo $list['education_title'];?></h2>
    					<span class="position"><?php echo $list['education_institute'];?></span>
    					<p class="mt-4"><?php echo $list['education_description'];?></p>
    				</div>
					<?php
						}
					?>
    				
    			</div>

    			<div class="col-md-6">
					<?php
						foreach($experience_list as $list) {
					?>
					<div class="resume-wrap animated <?php echo $list['experience_animation'];?>">
    					<span class="date"><?php echo $list['experience_year'];?></span>
    					<h2><?php echo $list['experience_title'];?></h2>
    					<span class="position"><?php echo $list['experience_office'];?></span>
    					<p class="mt-4"><?php echo $list['experience_description'];?></p>
    				</div>
					<?php
						}
					?>
    			</div>
    		</div>
			<div class="row justify-content-center mt-5">
    			<div class="col-md-6 text-center">
    				<p><a href="#" class="btn btn-primary py-4 px-5">Download CV</a></p>
    			</div>
    		</div>
       <?php
	}
}