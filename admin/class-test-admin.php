<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       exemple.com
 * @since      1.0.0
 *
 * @package    Test
 * @subpackage Test/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Test
 * @subpackage Test/admin
 * @author     OlegApanovich <dollar4444@gmail.com>
 */
class Test_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		$this->init();
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Test_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Test_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/test-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Test_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Test_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/test-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Init amdin settings
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ), 9 );
		add_action( 'admin_menu', array( $this, 'add_menu' ) );
		add_action(
			'admin_init',
			array( $this, 'plugin_admin_init_settings' )
		);
	}

	/**
	 * Theme options main page controler.
	 */
	public function display_theme_main_options() {}

	/**
	 * Add admin menu item for a theme options
	 */
	public function admin_menu() {
		add_menu_page(
			__( 'Baner Plugin Test', 'test' ),
			__( 'Baner Plugin Test', 'test' ),
			'administrator',
			'test',
			array( $this, 'display_theme_main_options' ),
			null,
			'1'
		);
	}

	/**
	 * Add submenu to woocommerce admin menu
	 *
	 * @since 1.0.0
	 */
	public function add_menu() {
		add_submenu_page(
			'test',
			esc_html__( 'Banner Options', 'test' ),
			esc_html__( 'Banner Options', 'test' ),
			'manage_options',
			'test_menu',
			array( $this, 'settings_form' )
		);
	}

	/**
	 * Add main plugin setings form
	 *
	 * @since 1.0.0
	 */
	public function settings_form() {
		include_once TEST_URI_ABSPATH
					. '/admin/partials/test-admin-display.php';
	}

	/**
	 * Init plugin settings
	 *
	 * @since 1.0.0
	 */
	public function plugin_admin_init_settings() {
		register_setting(
			'test_plugin_options',
			'test_plugin_options',
			array( $this, 'set_options' )
		);

		add_settings_section(
			'plugin_main',
			'',
			array( $this, 'plugin_section_text' ),
			'plugin'
		);

		add_settings_field(
			'test_banner_title',
			'',
			array( $this, 'display_settings' ),
			'plugin',
			'plugin_main'
		);

		add_settings_field(
			'test_banner_text',
			'',
			array( $this, 'display_settings' ),
			'plugin',
			'plugin_main'
		);

		add_settings_field(
			'test_banner_display_arrea',
			'',
			array( $this, 'display_settings' ),
			'plugin',
			'plugin_main'
		);

		add_settings_field(
			'test_banner_css_title_size',
			'',
			array( $this, 'display_settings' ),
			'plugin',
			'plugin_main'
		);

		add_settings_field(
			'test_banner_css_text_size',
			'',
			array( $this, 'display_settings' ),
			'plugin',
			'plugin_main'
		);
	}

	/**
	 * Function callback for a add_settings_section
	 *
	 * @since 1.0.0
	 */
	public function plugin_section_text() {
		echo '<p></p>';
	}

	/**
	 * Function callback for a add_settings_field
	 *
	 * @since 1.0.0
	 */
	public function display_settings() {
		$options = get_option( 'test_plugin_options' );

		$test_banner_title = ! empty( $options['test_banner_title'] )
			? $options['test_banner_title'] : '';

		$test_banner_text = ! empty( $options['test_banner_text'] )
			? $options['test_banner_text'] : '';

		$test_banner_display_arrea = ! empty( $options['test_banner_display_arrea'] )
			? $options['test_banner_display_arrea'] : '';

		$test_banner_css_title_size = ! empty( $options['test_banner_css_title_size'] )
			? $options['test_banner_css_title_size'] : '';

		$test_banner_css_text_size = ! empty( $options['test_banner_css_text_size'] )
			? $options['test_banner_css_text_size'] : '';

		include_once TEST_URI_ABSPATH
					. '/admin/partials/test-admin-display-options.php';
	}

	/**
	 * Set options
	 *
	 * @since 1.0.0
	 *
	 * @param array $input Option input value.
	 *
	 * @return array
	 */
	public function set_options( $input ) {
		$valid_input = $this->validate_options( $input );

		return $valid_input;
	}

	/**
	 * Validate user input
	 *
	 * @since 1.0.0
	 *
	 * @param array $input Option input value.
	 *
	 * @return array
	 */
	public function validate_options( $input ) {

		$valid_input['test_banner_title']          = esc_html( $input['test_banner_title'] );
		$valid_input['test_banner_text']           = esc_html( $input['test_banner_text'] );
		$valid_input['test_banner_display_arrea']  = esc_html( $input['test_banner_display_arrea'] );
		$valid_input['test_banner_css_title_size'] = (int) $input['test_banner_css_title_size'];
		$valid_input['test_banner_css_text_size']  = (int) $input['test_banner_css_text_size'];

		return $valid_input;
	}
}
