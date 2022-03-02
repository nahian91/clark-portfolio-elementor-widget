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
					'{{WRAPPER}} .resume-wrap' => 'text-align: {{VALUE}}',
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
					'{{WRAPPER}} .resume-wrap.resume-right' => 'text-align: {{VALUE}}',
				],
			]
		);

		 $this->end_controls_section();
		// end of the Content section

		// start of the Content tab section
		$this->start_controls_section(
			'resume-btn',
			 [
				 'label' => esc_html__('Button','clark-elementor'),
				 'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			
			 ]
		 );

		$this->add_control(
			'show_resume_btn',
			[
				'label' => esc_html__( 'Show Button?', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'resume_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Download Now', 'plugin-name' ),
				'condition' => [
					'show_resume_btn' => 'yes'
				]
			]
		);

		$this->add_control(
			'resume_btn_link',
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
					'show_resume_btn' => 'yes'
				]
			]
		);


		$this->end_controls_section();
		// end of the Content section

		
		// start of the Style tab section
		$this->start_controls_section(
			'resume_style',
			[
				'label' => esc_html__( 'Style', 'clark-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'year_style_title',
			[
				'label' => esc_html__( 'Year', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'year_color',
			[
				'label' => esc_html__( 'Color', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .resume-wrap .date' => 'color: {{VALUE}}',
				],
				'default' => '#ffbd39',
				'condition' => [
					'show_resume_btn' => 'yes'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'year_typography',
				'selector' => '{{WRAPPER}} .resume-wrap .date',
			]
		);

		$this->add_control(
			'title_style',
			[
				'label' => esc_html__( 'Title', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .resume-wrap h2' => 'color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .resume-wrap h2',
			]
		);

		$this->add_control(
			'position_style',
			[
				'label' => esc_html__( 'Position', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'position_color',
			[
				'label' => esc_html__( 'Color', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .resume-wrap .position' => 'color: {{VALUE}}',
				],
				'default' => '#999'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'position_typography',
				'selector' => '{{WRAPPER}} .resume-wrap .position',
			]
		);

		$this->add_control(
			'description_style',
			[
				'label' => esc_html__( 'Description', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => esc_html__( 'Color', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .resume-wrap p' => 'color: {{VALUE}}',
				],
				'default' => '#999'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .resume-wrap p',
			]
		);

		$this->add_control(
			'resume_btn_options',
			[
				'label' => esc_html__( 'Button', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->start_controls_tabs(
			'resume_style_tabs'
		);


		$this->start_controls_tab(
			'resume_btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'plugin-name' ),
			]
		);

		$this->add_control(
			'resume_btn_normal_color',
			[
				'label' => esc_html__( 'Color', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .resume-btn a.btn.btn-primary' => 'color: {{VALUE}}',
				],
				'default' => '#333'
			]
		);

		$this->add_control(
			'resume_btn_normal_background',
			[
				'label' => esc_html__( 'Background', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .resume-btn a.btn.btn-primary' => 'background-color: {{VALUE}}',
				],
				'default' => '#ffbd39'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'resume_btn_normal_typography',
				'selector' => '{{WRAPPER}} .resume-btn a.btn.btn-primary',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'resume_btn_normal_border',
				'label' => esc_html__( 'Border', 'plugin-name' ),
				'selector' => '{{WRAPPER}} .resume-btn a.btn.btn-primary',
			]
		);

		$this->add_control(
			'resume_btn_normal_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .resume-btn a.btn.btn-primary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'resume_btn_normal_padding',
			[
				'label' => esc_html__( 'Padding', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .resume-btn a.btn.btn-primary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'resume_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'plugin-name' ),
			]
		);

		$this->add_control(
			'resume_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .resume-btn a.btn.btn-primary:hover' => 'color: {{VALUE}} !important',
				],
				'default' => '#333'
			]
		);

		$this->add_control(
			'resume_btn_hover_background',
			[
				'label' => esc_html__( 'Background', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .resume-btn a.btn.btn-primary:hover' => 'background-color: {{VALUE}} !important',
				],
				'default' => '#ffbd39'
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

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
		$show_resume_btn = $settings['show_resume_btn'];
		$resume_btn_text = $settings['resume_btn_text'];
		$resume_btn_link = $settings['resume_btn_link'];			
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
					<div class="resume-wrap resume-right animated <?php echo $list['experience_animation'];?>">
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

			<?php
				if($show_resume_btn == 'yes') {
			?>
				<div class="row justify-content-center mt-5 resume-btn">
					<div class="col-md-6 text-center">
						<p><a href="<?php echo $resume_btn_link['url'];?>" class="btn btn-primary py-4 px-5"><?php echo $resume_btn_text;?></a></p>
					</div>
				</div>
			<?php
				}
			?>
			
       <?php
	}
}