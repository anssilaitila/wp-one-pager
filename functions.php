<?php
/**
 * One Pager functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_One_Pager
 */

if ( ! defined( 'WP_ONEPAGER_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'WP_ONEPAGER_VERSION', '1.0.7' );
}

// Core Constants.
define( 'WP_ONEPAGER_THEME_DIR', get_template_directory() );
define( 'WP_ONEPAGER_THEME_URI', get_template_directory_uri() );

/**
 * WP_Onepager theme class
 */
final class WP_Onepager {

	/**
	 * Main Theme Class Constructor
	 *
	 * @since   1.0.0
	 */
	public function __construct() {

		// Define theme constants.
		$this->wp_onepager_constants();

		// Load required files.
		$this->wp_onepager_setup();

		$plugin_load = new OnepagerLoad();
		$plugin_underscores = new OnepagerUnderscores();
		$plugin_customizer = new OnepagerCustomizer();
		$plugin_customizer_nav = new OnepagerCustomizerNav();
		$plugin_customizer_colors = new OnepagerCustomizerColors();
		$plugin_customizer_hero = new OnepagerCustomizerHero();
		$plugin_customizer_content_area = new OnepagerCustomizerContentArea();
		$plugin_customizer_footer = new OnepagerCustomizerFooter();

		// Underscores
		add_action( 'after_setup_theme', [$plugin_underscores, 'wp_one_pager_setup'] );
		add_action( 'after_setup_theme', [$plugin_underscores, 'wp_one_pager_content_width'], 0 );
		add_action( 'widgets_init', [$plugin_underscores, 'wp_one_pager_widgets_init'] );
		add_action( 'wp_enqueue_scripts', [$plugin_underscores, 'wp_one_pager_scripts'] );
		
		// WP One Pager
		add_action( 'init', [$plugin_load, 'plugin_init'] );
		add_action( 'wp_enqueue_scripts', [$plugin_load, 'public_scripts_and_styles'] );
		add_action( 'wp_enqueue_scripts', [$plugin_load, 'public_inline_styles'] );
		add_action( 'admin_enqueue_scripts', [$plugin_load, 'admin_scripts_and_styles'] );
		add_action( 'admin_menu', [$plugin_customizer, 'add_customizer_menu_item'] );
		add_action( 'customize_register', 'wp_onepager_register_custom_classes' );
		add_action( 'customize_register', [$plugin_customizer, 'remove_default_controls'] );
		add_action( 'customize_register', [$plugin_customizer_nav, 'customizer_nav'] );
		add_action( 'customize_register', [$plugin_customizer_colors, 'customizer_colors'] );
		add_action( 'customize_register', [$plugin_customizer_hero, 'customizer_hero'] );
		add_action( 'customize_register', [$plugin_customizer_content_area, 'customizer_content_area'] );
		add_action( 'customize_register', [$plugin_customizer_footer, 'customizer_footer'] );

	}

	/**
	 * Define Constants
	 *
	 * @since   1.0.0
	 */
	public static function wp_onepager_constants() {
	
		// Javascript and CSS Paths
		define( 'WP_ONEPAGER_JS_DIR_URI', WP_ONEPAGER_THEME_URI . '/assets/js/' );
		define( 'WP_ONEPAGER_CSS_DIR_URI', WP_ONEPAGER_THEME_URI . '/assets/css/' );
	
		// Include Paths
		define( 'WP_ONEPAGER_INC_DIR', WP_ONEPAGER_THEME_DIR . '/inc/' );
		define( 'WP_ONEPAGER_INC_DIR_URI', WP_ONEPAGER_THEME_URI . '/inc/' );
			
	}

	/**
	 * Load all core theme function files
	 *
	 * @since 1.0.0
	 */
	public static function wp_onepager_setup() {
	
		$dir = WP_ONEPAGER_INC_DIR;

		require_once $dir . 'class-onepager-load.php';
		require_once $dir . 'class-onepager-helpers.php';
		require_once $dir . 'class-onepager-customizer.php';
		require_once $dir . 'class-onepager-customizer-nav.php';
		require_once $dir . 'class-onepager-customizer-colors.php';
		require_once $dir . 'class-onepager-customizer-hero.php';
		require_once $dir . 'class-onepager-customizer-content-area.php';
		require_once $dir . 'class-onepager-customizer-footer.php';

		// Underscores
		require_once $dir . '_u/class-onepager-underscores.php';
		require get_template_directory() . '/inc/_u/underscores.php';
			
	}

}

new WP_Onepager();
