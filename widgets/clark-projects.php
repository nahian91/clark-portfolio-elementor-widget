<?php
/**
 * Clark Projects Widget.
 *
 * Elementor widget that inserts heading into the page
 *
 * @since 1.0.0
 */
class Clark_Projects_Widget extends \Elementor\Widget_Base {

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
		return 'clark-projects';
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
		return esc_html__( 'Clark Projects', 'clark-elementor' );
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
		return 'eicon-product-categories';
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

		$options = [];

		$posts = get_posts( [
			'post_type'  => 'projects',
		] );

		foreach ( $posts as $post ) {
			$options[ $post->ID ] = $post->post_title;
		}

		$this->add_control(
			'select_projects',
			[
				'label' => esc_html__( 'Select Projects', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $options
			]
		);
		
		$this->add_control(
			'heading_title', [
				'label' => esc_html__( 'Heading Title', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'About Me' , 'clark-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'heading_subtitle', [
				'label' => esc_html__( 'Heading Subtitle', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'About' , 'clark-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'heading_desc', [
				'label' => esc_html__( 'Heading Title', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'A small river named Duden flows by their place and supplies it with the necessary regelialia.' , 'clark-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'heading_align',
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
		$select_projects = $settings['select_projects'];		
	?>

		<div class="row">
			<?php
				foreach($select_projects as $project){

				$project_img = get_the_post_thumbnail_url($project);
				$project_cat = get_the_category($project);
			?>
				<div class="col-md-4">
					<div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(<?php echo $project_img;?>);">
						<div class="overlay"></div>
						<div class="text text-center p-4">
							<h3><a href="#"><?php echo get_the_title($project);?></a></h3>
							<?php
								foreach($project_cat as $cat) {
							?>
								<span><?php echo $cat->name;?></span>
							<?php
								}
							?>
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