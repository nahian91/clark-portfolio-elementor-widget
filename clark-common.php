<?php
/**
 * Plugin Name: Clark Common Extension
 * Description: Custom Elementor extension which includes custom widgets.
 * Plugin URI:  https://anahian.com/
 * Version:     1.0.0
 * Author:      Abdullah Nahian
 * Author URI:  https://anahian.com/
 * Text Domain: clark-elementor
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Clark_Common_Extension {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Clark_Common_Extension The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Clark_Common_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'clark-elementor', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}
		
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );

		add_action('elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ] );


		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );

        // Category Init
		add_action( 'elementor/init', [ $this, 'clark_common_category' ] );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'clark-elementor' ),
			'<strong>' . esc_html__( 'Clark Common Extension', 'clark-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'clark-elementor' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'clark-elementor' ),
			'<strong>' . esc_html__( 'Clark Common Extension', 'clark-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'clark-elementor' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'clark-elementor' ),
			'<strong>' . esc_html__( 'Clark Common Extension', 'clark-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'clark-elementor' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		require_once( __DIR__ . '/widgets/clark-slider.php' );
		require_once( __DIR__ . '/widgets/clark-heading.php' );
		require_once( __DIR__ . '/widgets/clark-about.php' );
		require_once( __DIR__ . '/widgets/clark-resume.php' );
		require_once( __DIR__ . '/widgets/clark-services.php' );
		require_once( __DIR__ . '/widgets/clark-skills.php' );
		require_once( __DIR__ . '/widgets/clark-projects.php' );
		require_once( __DIR__ . '/widgets/clark-price.php' );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Clark_Slider_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Clark_Heading_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Clark_About_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Clark_Resume_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Clark_Services_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Clark_Skills_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Clark_Projects_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Clark_Price_Widget() );
	}

	/**
	 * Init Controls
	 *
	 * Include controls files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_controls() {

		/*
		* Todo: this block needs to be commented out when the custom control is ready
		*
		*
		// Include Control files
		require_once( __DIR__ . '/controls/test-control.php' );

		// Register control
		\Elementor\Plugin::$instance->controls_manager->register_control( 'control-type-', new \Test_Control() );
		*/

	}

	// Custom CSS
	public function widget_styles() {
		wp_register_style( 'clark-elementor-carousel', plugins_url( 'assets/css/owl.carousel.min.css', __FILE__ ) );
		wp_register_style( 'clark-elementor-owl-theme', plugins_url( 'assets/css/owl.theme.default.min.css', __FILE__ ) );
		wp_enqueue_style('clark-elementor-carousel');
		wp_enqueue_style('clark-elementor-owl-theme');
	}	

    // Custom JS
	public function widget_scripts() {
		wp_register_script( 'clark-elementor-carousel-js', plugins_url( 'assets/js/owl.carousel.min.js', __FILE__ ) );
		wp_enqueue_script('clark-elementor-carousel-js');
	}

    // Custom Category
    public function clark_common_category () {

	   \Elementor\Plugin::$instance->elements_manager->add_category( 
	   	'clark-common',
	   	[
	   		'title' => __( 'Clark Common Category', 'clark-elementor' ),
	   		'icon' => 'fa fa-plug', //default icon
	   	],
	   	2 // position
	   );

	}


}

Clark_Common_Extension::instance();
