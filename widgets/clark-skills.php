<?php
/**
 * Clark Skills Widget.
 *
 * Elementor widget that inserts heading into the page
 *
 * @since 1.0.0
 */
class Clark_Skills_Widget extends \Elementor\Widget_Base {

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
		return 'clark-skills';
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
		return esc_html__( 'Clark Skills', 'clark-elementor' );
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
		return 'eicon-skill-bar';
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
		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'skill_title', [
				'label' => esc_html__( 'Skill Title', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Photoshop' , 'clark-elementor' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'skill_number', [
				'label' => esc_html__( 'Skill Number', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => esc_html__( '80' , 'clark-elementor' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'skills',
			[
				'label' => esc_html__( 'Skills List', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ skill_title }}}',
			]
		);

		$this->add_control(
			'skills_column',
			[
				'label' => esc_html__( 'Select Column', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'columnTwo',
				'options' => [
					'columnTwo'  => '2 Column',
					'columnThree' => '3 Column',
					'columnFour' => '4 Column',
				],
			]
		);

		
		$this->end_controls_section();
		// end of the Content section

		
		// start of the Style tab section
		$this->start_controls_section(
			'skills_style',
			[
				'label' => esc_html__( 'Style', 'clark-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'skill_title_style',
			[
				'label' => esc_html__( 'Title', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'skill_title_color',
			[
				'label' => esc_html__( 'Color', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progress-wrap h3' => 'color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'skill_title_typography',
				'selector' => '{{WRAPPER}} .progress-wrap h3',
			]
		);

		$this->add_control(
			'skill_number_color',
			[
				'label' => esc_html__( 'Number Color', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progress-bar span' => 'color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->add_control(
			'skill_bar_style',
			[
				'label' => esc_html__( 'Progress Bar', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'skill_bar_active',
			[
				'label' => esc_html__( 'Active Color', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progress-bar' => 'background-color: {{VALUE}}',
				],
				'default' => '#ffbd39'
			]
		);

		$this->add_control(
			'skill_bar_background',
			[
				'label' => esc_html__( 'Background Color', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progress' => 'background-color: {{VALUE}}',
				],
				'default' => '#1a1a1a'
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
		$skills = $settings['skills'];	
		$skill_column = $settings['skills_column'];
		
		if($skill_column == 'columnTwo') {
			$skill_column = 'col-md-6';
		} elseif ($skill_column == 'columnThree') {
			$skill_column = 'col-md-4';
		} elseif ($skill_column = 'columnFour') {
			$skill_column = 'col-md-3';
		}
	?>
		<div class="row">
			<?php
				foreach($skills as $skill) {
			?>
			<div class="<?php echo $skill_column;?>">
				<div class="progress-wrap">
					<h3><?php echo $skill['skill_title'];?></h3>
					<div class="progress">
						<div class="progress-bar color-1" role="progressbar" aria-valuenow="<?php echo $skill['skill_number'];?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $skill['skill_number'];?>%">
						<span><?php echo $skill['skill_number'];?>%</span>
						</div>
					</div>
				</div>
			</div>
			<?php
				}
			?>
			
		</div>
       <?php
	}
}