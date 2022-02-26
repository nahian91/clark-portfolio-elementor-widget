<?php
/**
 * Clark Slider Widget.
 *
 * Elementor widget that inserts heading into the page
 *
 * @since 1.0.0
 */
class Clark_Slider_Widget extends \Elementor\Widget_Base {

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
		return 'clark-slider';
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
		return esc_html__( 'Clark Slider', 'clark-elementor' );
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
		return 'eicon-slider-album';
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
			'slider_subtitle', [
				'label' => esc_html__( 'Slider Subtitle', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Sub Title' , 'clark-elementor' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'slider_title', [
				'label' => esc_html__( 'Title', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Title' , 'clark-elementor' ),
				'label_block' => true,
				'separator' => 'before'
			]
		);

		$repeater->add_control(
			'slider_btn1_text', [
				'label' => esc_html__( 'Button 1 Text', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'hire me' , 'clark-elementor' ),
				'label_block' => true,
				'separator' => 'before'
			]
		);

		$repeater->add_control(
			'slider_btn1_link',
			[
				'label' => esc_html__( 'Button 1 Link', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'clark-elementor' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
			]
		);

		$repeater->add_control(
			'slider_btn2_text', [
				'label' => esc_html__( 'Button 2 Text', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'my works' , 'clark-elementor' ),
				'label_block' => true,
				'separator' => 'before'
			]
		);

		$repeater->add_control(
			'slider_btn2_link',
			[
				'label' => esc_html__( 'Button 2 Link', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'clark-elementor' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
			]
		);

		$repeater->add_control(
			'slider_image',
			[
				'label' => esc_html__( 'Choose Image', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'sliders',
			[
				'label' => esc_html__( 'Sliders List', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'slider_title' => esc_html__( 'Title 1', 'clark-elementor' ),
						'slider_subtitle' => esc_html__( 'Sub Title 1', 'clark-elementor' ),
					],
					[
						'slider_title' => esc_html__( 'Title 2', 'clark-elementor' ),
						'slider_subtitle' => esc_html__( 'Sub Title 2', 'clark-elementor' ),
					],
				],
				'title_field' => '{{{ slider_title }}}',
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section
		
		// start of the Style tab section
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Content Style', 'clark-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->start_controls_tabs(
			'style_tabs'
		);
		
		// start everything related to Normal state here
		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'clark-elementor' ),
			]
		);
		
		// Heading Title Options
		$this->add_control(
			'ewa_heading_title_options',
			[
				'label' => esc_html__( 'Title', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Heading Title Color
		$this->add_control(
			'ewa_heading_title_color',
			[
				'label' => esc_html__( 'Color', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#1D282E',
				'selectors' => [
					'{{WRAPPER}} .section-heading__title' => 'color: {{VALUE}}',
				],
			]
		);

		// Heading Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'ewa_heading_title_typography',
				'label' => esc_html__( 'Typography', 'clark-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .section-heading__content h5',
			]
		);
        
		// Heading Description Options
		$this->add_control(
			'ewa_heading_des_options',
			[
				'label' => esc_html__( 'Description', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Heading Description Color
		$this->add_control(
			'ewa_heading_des_color',
			[
				'label' => esc_html__( 'Color', 'clark-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#1D282E',
				'selectors' => [
					'{{WRAPPER}} .section-heading__description' => 'color: {{VALUE}}',
				],
			]
		);

		// Heading Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'ewa_heading_desc_typography',
				'label' => esc_html__( 'Typography', 'clark-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .section-heading__content p',
			]
		);
		
		$this->end_controls_tab();
		// end everything related to Normal state here

		$this->end_controls_tabs();

		$this->end_controls_section();
		// end of the Style tab section

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
		$sliders = $settings['sliders'];
	?>

<script>
	jQuery(document).ready(function ($) {
	var carousel = function() {
		$('.home-slider').owlCarousel({
	    loop:true,
	    autoplay: true,
	    margin:0,
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    nav:false,
	    autoplayHoverPause: false,
	    items: 1,
	    navText : ["<span class='ion-md-arrow-back'></span>","<span class='ion-chevron-right'></span>"],
	    responsive:{
	      0:{
	        items:1
	      },
	      600:{
	        items:1
	      },
	      1000:{
	        items:1
	      }
	    }
		});
	};
	carousel();
});
</script>
		
		<div class="home-slider owl-carousel">
	      <?php
			foreach($sliders as $slider) {
		?>
			<div class="slider-item ">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end">
	          	<div class="one-third js-fullheight order-md-last img" style="background-image:url(<?php echo $slider['slider_image']['url'] ?>);">
	          		<div class="overlay"></div>
	          	</div>
		          <div class="one-forth d-flex align-items-center">
		          	<div class="text">
		          		<span class="subheading"><?php echo $slider['slider_subtitle'];?></span>
			            <h1 class="mb-4 mt-3"><?php echo $slider['slider_title'];?></h1>
			            <p>
							<?php
								if($slider['slider_btn1_text']) {
							?>
								<a href="<?php echo $slider['slider_btn1_link']['url'];?>" class="btn btn-primary py-3 px-4"><?php echo $slider['slider_btn1_text'];?></a> 
							<?php
								}
							?>
							
							
							<a href="<?php echo $slider['slider_btn2_link']['url'];?>'];?>" class="btn btn-white btn-outline-white py-3 px-4"><?php echo $slider['slider_btn2_text'];?></a></p>
		            </div>
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