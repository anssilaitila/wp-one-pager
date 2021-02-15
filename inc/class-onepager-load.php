<?php

class OnepagerLoad {

  public function plugin_init() {
    
    add_image_size('wp-onepager-large', 1920, 800);

  }

  public function public_scripts_and_styles() {

    wp_enqueue_style('wp-one-pager-style-public', get_stylesheet_directory_uri() . '/dist/css/p.min.css', array(), 1, 'all');
    wp_enqueue_style('wp-one-pager-google-fonts', 'https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;700&display=swap', false); 

  }

  public function admin_scripts_and_styles($hook) {
  
    if ($hook != 'widgets.php') {
      return;
    }
  
    wp_enqueue_script('wp-one-pager-scripts-admin', get_stylesheet_directory_uri() . '/dist/js/a.js', array('jquery'), 1, false);
  
  }

  /**
   * Append our customizer styles to the <head> whenever our main stylesheet is called.
   */
  public function public_inline_styles() {
  
    // Grab the styles that pertain to the front end, but don't wrap them in a style tag.
    $styles = $this->get_inline_styles( 'unwrapped', 'front_end' );
    
    // Attach our customizer styles to our stylesheet. When it gets called, so do our customizer styles.
    wp_add_inline_style( 'wp-one-pager-style-public', $styles );
  
  }
  
  /**
   * Loop through our theme mods and build a string of CSS rules.
   * 
   * @param string $wrapped  Whether or not to wrap the styles in a style tag. Expects 'wrapped' or 'unwrapped'.
   * @param string $output_for The context for these styles. Expects 'front_end' or 'tinymce'.
   * @return string CSS, either wrapped in a style tag, or not.
   */
  public function get_inline_styles( $wrapped = 'wrapped', $output_for = 'front_end' ) {
  
    $out = '';

    $hero_text_color = '#333';
    
    if (get_theme_mod('hero-text-color')) {
      $hero_text_color = esc_attr(get_theme_mod('hero-text-color'));
    }

    $button_color_1 = '#fff';
    
    if (get_theme_mod('button-color-1')) {
      $button_color_1 = esc_attr(get_theme_mod('button-color-1'));
    }

    $button_color_2 = '#000';
    
    if (get_theme_mod('button-color-2')) {
      $button_color_2 = esc_attr(get_theme_mod('button-color-2'));
    }

    $link_color = '#333';
    
    if (get_theme_mod('link-color')) {
      $link_color = esc_attr(get_theme_mod('link-color'));
    }

    // links
    $out .= 'body a, body a:visited { color: ' . $link_color . '; }';

    // button type 1
    $out .= 'body a.onepager-button { background-color: ' . $button_color_1 . '; border: 2px solid ' . $button_color_1 . '; color: ' . $button_color_2 . '; }';
    $out .= 'body a.onepager-button:hover { background-color: ' . $button_color_2 . '; border: 2px solid ' . $button_color_2 . '; color: ' . $button_color_1 . '; }';

    // button type 2
    $out .= 'body a.onepager-button-v2 { border: 2px solid ' . $button_color_1 . '; color: ' . $hero_text_color . '; }';
    $out .= 'body a.onepager-button-v2:hover { background-color: ' . $button_color_2 . '; border: 2px solid ' . $button_color_2 . '; color: ' . $button_color_1 . '; }';

    if (get_theme_mod('hero-background-color')) {
      $hero_background_color = esc_attr(get_theme_mod('hero-background-color'));
      $out .= 'body .hero-container { background-color: ' . $hero_background_color . '; }';
    }

    if (get_theme_mod('hero-text-color')) {
      $hero_text_color = esc_attr(get_theme_mod('hero-text-color'));
      $out .= 'body .hero { color: ' . $hero_text_color . ' }';
    }

    $hero_background_image_src = get_header_image();
    
    if ($hero_background_image_src) {
      $out .= 'body .hero-container { background: center top url(' . esc_attr($hero_background_image_src) . ') no-repeat; background-size: cover; }';
    }
      
    if ($content_area_width = get_theme_mod('content-area-width')) {
      $out .= 'body .site { max-width: ' . esc_attr($content_area_width) . 'px; overflow: hidden; }';
    }

    if ($content_area_background_color = get_theme_mod('content-area-background-color')) {
      $out .= 'body .site { background: ' . esc_attr($content_area_background_color) . '; }';
    }

    if ($footer_background_color = get_theme_mod('footer-background-color')) {
      $out .= 'body .site-footer { background-color: ' . esc_attr($footer_background_color) . '; }';
    }

    if ($footer_background_image_id = get_theme_mod('footer-background-image')) {
      
      $footer_background_image_src = wp_get_attachment_image_src(intval($footer_background_image_id), 'wp-onepager-large');
      
      if (isset($footer_background_image_src[0])) {
        $out .= 'body .site-footer { background: center top url(' . esc_attr($footer_background_image_src[0]) . ') no-repeat; background-size: cover; }';
      }
      
    }

    return $out;
  
  }
  
}
