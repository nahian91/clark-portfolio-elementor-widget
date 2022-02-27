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

		// start of the Content tab section
		$this->start_controls_section(
			'settings-section',
			 [
				 'label' => esc_html__('Settings', 'clark-elementor'),
				 'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			
			 ]
		 );

		 $this->add_control(
			'slide_loop',
			[
				'label' => esc_html__( 'Slide Loop?', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'clark-elementor' ),
				'label_off' => esc_html__( 'Hide', 'clark-elementor' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->add_control(
			'slide_autoplay',
			[
				'label' => esc_html__( 'Slide Autoplay?', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'clark-elementor' ),
				'label_off' => esc_html__( 'Hide', 'clark-elementor' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->add_control(
			'slide_nav',
			[
				'label' => esc_html__( 'Slide Nav?', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'clark-elementor' ),
				'label_off' => esc_html__( 'Hide', 'clark-elementor' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->add_control(
			'slide_animate_in',
			[
				'label' => esc_html__( 'Slide Animate In', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'fadeIn',
				'options' => [
					'fadeIn'  => esc_html__( 'fadeIn', 'plugin-name' ),
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'plugin-name' ),
					'fadeInRight' => esc_html__( 'fadeInRight', 'plugin-name' ),
					'fadeInDown' => esc_html__( 'fadeInDown', 'plugin-name' ),
				],
			]
		);

		$this->add_control(
			'slide_animate_out',
			[
				'label' => esc_html__( 'Slide Animate Out', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'fadeOut',
				'options' => [
					'fadeOut'  => esc_html__( 'fadeOut', 'plugin-name' ),
					'fadeOutLeft' => esc_html__( 'fadeOutLeft', 'plugin-name' ),
					'fadeOutRight' => esc_html__( 'fadeOutRight', 'plugin-name' ),
					'fadeOutDown' => esc_html__( 'fadeOutDown', 'plugin-name' ),
				],
			]
		);

		 $this->end_controls_section();
		// end of the Content tab section

		
		// start of the Style tab section
		$this->start_controls_section(
			'subtitle_section',
			[
				'label' => esc_html__( 'Subtitle Style', 'clark-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'slider_subtitle_style',
			[
				'label' => esc_html__( 'Subtitle', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'slider_subtitle_color',
			[
				'label' => esc_html__( 'Subtitle Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-carousel.home-slider .slider-item .slider-text .subheading' => 'color: {{VALUE}}',
				],
				'default' => '#ffbd39'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'slider_subtitle_typography',
				'selector' => '{{WRAPPER}} .owl-carousel.home-slider .slider-item .slider-text .subheading',
			]
		);
		$this->end_controls_section();

		
		$this->start_controls_section(
			'title_section',
			[
				'label' => esc_html__( 'Title Style', 'clark-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'slider_title_style',
			[
				'label' => esc_html__( 'Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'slider_title_color',
			[
				'label' => esc_html__( 'Title Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-carousel.home-slider .slider-item .slider-text h1' => 'color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'slider_title_typography',
				'selector' => '{{WRAPPER}} .owl-carousel.home-slider .slider-item .slider-text h1',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'btn1_section',
			[
				'label' => esc_html__( 'Button 1 Style', 'clark-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'slider_btn1_style',
			[
				'label' => esc_html__( 'Button 1', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'slider_btn1_color',
			[
				'label' => esc_html__( 'Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-item .btn.btn-primary' => 'color: {{VALUE}} !important',
				],
				'default' => '#333'
			]
		);

		$this->add_control(
			'slider_btn1_background',
			[
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-item .btn.btn-primary' => 'background-color: {{VALUE}}',
				],
				'default' => '#ffbd39'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'slide_btn1_border',
				'label' => esc_html__( 'Border', 'plugin-name' ),
				'selector' => '{{WRAPPER}} .slider-item .btn.btn-primary',
			]
		);

		$this->add_control(
			'slide_btn1_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .slider-item .btn.btn-primary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'slide_btn1_padding',
			[
				'label' => esc_html__( 'Padding', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .slider-item .btn.btn-primary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'btn2_section',
			[
				'label' => esc_html__( 'Button 2 Style', 'clark-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		// Button 2 Style
		$this->add_control(
			'slider_btn2_style',
			[
				'label' => esc_html__( 'Button 2', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'slider_btn2_color',
			[
				'label' => esc_html__( 'Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-item .btn.btn-white.btn-outline-white' => 'color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->add_control(
			'slider_btn2_background',
			[
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-item .btn.btn-white.btn-outline-white' => 'background-color: {{VALUE}}',
				],
				'default' => '#333'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'slide_btn2_border',
				'label' => esc_html__( 'Border', 'plugin-name' ),
				'selector' => '{{WRAPPER}} .slider-item .btn.btn-white.btn-outline-white',
			]
		);

		$this->add_control(
			'slide_btn2_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .slider-item .btn.btn-white.btn-outline-white' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'slide_btn2_padding',
			[
				'label' => esc_html__( 'Padding', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .slider-item .btn.btn-white.btn-outline-white' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'dots_nav_section',
			[
				'label' => esc_html__( 'Dots & Nav Style', 'clark-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'slider_dots_background',
			[
				'label' => esc_html__( 'Dots Background', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-carousel.home-slider .owl-dots .owl-dot' => 'background-color: {{VALUE}}',
				],
				'default' => 'rgba(255, 255, 255, 0.4)'
			]
		);

		$this->add_control(
			'slider_dots_active_background',
			[
				'label' => esc_html__( 'Dots Active Background', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-carousel.home-slider .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->add_control(
			'slider_nav_background',
			[
				'label' => esc_html__( 'Nav Background', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-carousel.home-slider .owl-nav .owl-prev, .owl-carousel.home-slider .owl-nav .owl-next' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->add_control(
			'slider_nav_color',
			[
				'label' => esc_html__( 'Nav Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-carousel.home-slider i' => 'color: {{VALUE}}',
				],
				'default' => '#333'
			]
		);

		$this->add_control(
			'slider_nav_hover',
			[
				'label' => esc_html__( 'Nav Hover', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-carousel.home-slider .owl-nav .owl-next:hover, .owl-carousel.home-slider .owl-nav .owl-prev:hover' => 'background-color: {{VALUE}} !important',
				],
				'default' => '#333'
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
		$sliders = $settings['sliders'];
		$slide_loop = $settings['slide_loop'];
		$slide_autoplay = $settings['slide_autoplay'];
		$slide_nav = $settings['slide_nav'];
		$slide_animate_in = $settings['slide_animate_in'];
		$slide_animate_out = $settings['slide_animate_out'];

		if($slide_loop == 'true') {
			$slide_loop = 'true';
		} else {
			$slide_loop = 'false';
		}

		if($slide_autoplay == 'true') {
			$slide_autoplay = 'true';
		} else {
			$slide_autoplay = 'false';
		}

		if($slide_nav == 'true') {
			$slide_nav = 'true';
		} else {
			$slide_nav = 'false';
		}
	?>

<script>
	jQuery(document).ready(function ($) {
	var carousel = function() {
		$('.home-slider').owlCarousel({
	    loop: <?php echo $slide_loop;?>,
	    autoplay: <?php echo $slide_autoplay;?>,
	    margin:0,
	    animateOut: '<?php echo $slide_animate_out;?>',
	    animateIn: '<?php echo $slide_animate_in;?>',
	    nav: <?php echo $slide_nav;?>,
	    autoplayHoverPause: false,
	    items: 1,
	    navText : ['<i class="fa-solid fa-arrow-left-long"></i>','<i class="fa-solid fa-arrow-right-long"></i>'],
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
								<a href="<?php echo $slider['slider_btn1_link']['url'];?>" class="btn btn-primary"><?php echo $slider['slider_btn1_text'];?></a> 
							<?php
								}
							?>
							
							
							<a href="<?php echo $slider['slider_btn2_link']['url'];?>'];?>" class="btn btn-white btn-outline-white"><?php echo $slider['slider_btn2_text'];?></a></p>
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