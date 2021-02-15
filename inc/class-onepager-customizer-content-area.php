<?php

class OnepagerCustomizerContentArea {

  public function customizer_content_area($wp_customize) {
    
    $wp_customize->add_section(
      'content-area',
      array(
        'title' => __('WP One Pager: Content area', 'wp-one-pager'),
        'description' => '',
        'priority' => 35,
      )
    );

    $wp_customize->add_setting(
      'content-area-width',
      array(
        'default' => __('991', 'wp-one-pager'),
        array(
          'sanitize_callback' => 'absint',
        )
      )
    );
    
    $wp_customize->add_control(
      'content-area-width',
      array(
        'label' => __('Content area width in pixels', 'wp-one-pager'),
        'section' => 'content-area',
        'type' => 'text',
      )
    );
        
    $wp_customize->add_setting(
      'content-area-background-color',
      array(
        'default' => '#f7f7f7',
        'sanitize_callback' => 'sanitize_hex_color',
      )
    );
    
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'content-area-background-color',
        array(
          'label' => __('Content area background color', 'wp-one-pager'),
          'section' => 'content-area',
          'settings' => 'content-area-background-color',
        )
      )
    );
    
  }

}
