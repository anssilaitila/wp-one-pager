<?php

class OnepagerUnderscores {

  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  public function wp_one_pager_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on WP One Pager, use a find and replace
     * to change 'wp-one-pager' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'wp-one-pager', get_template_directory() . '/languages' );
  
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
  
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );
  
    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );
  
    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
      array(
        'menu-1' => esc_html__( 'Primary', 'wp-one-pager' ),
      )
    );
  
    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
      'html5',
      array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
      )
    );
  
    // Set up the WordPress core custom background feature.
    add_theme_support(
      'custom-background',
      apply_filters(
        'wp_one_pager_custom_background_args',
        array(
          'default-color' => 'ffffff',
          'default-image' => '',
        )
      )
    );
  
    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
  
    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
      'custom-logo',
      array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
      )
    );
    
    add_editor_style( 'editor-style.css' );
  }
  
  /**
  * Set the content width in pixels, based on the theme's design and stylesheet.
  *
  * Priority 0 to make it available to lower priority callbacks.
  *
  * @global int $content_width
  */
  public function wp_one_pager_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'wp_one_pager_content_width', 640 );
  }
  
  /**
  * Register widget area.
  *
  * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
  */
  function wp_one_pager_widgets_init() {
    register_sidebar(
      array(
        'name'          => esc_html__( 'Sidebar', 'wp-one-pager' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'wp-one-pager' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
      )
    );
  }
  
  /**
  * Enqueue scripts and styles.
  */
  function wp_one_pager_scripts() {
    wp_enqueue_style( 'wp-one-pager-style', get_stylesheet_uri(), array(), WP_ONEPAGER_VERSION );
    wp_style_add_data( 'wp-one-pager-style', 'rtl', 'replace' );
    
    wp_enqueue_script( 'wp-one-pager-navigation', get_template_directory_uri() . '/js/navigation.js', array(), WP_ONEPAGER_VERSION, true );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
  }

}
