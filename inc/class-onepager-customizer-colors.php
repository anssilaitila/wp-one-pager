<?php

class OnepagerCustomizerColors {

  public function customizer_colors($wp_customize) {
    
    $wp_customize->add_section(
      'wpop-colors',
      array(
        'title' => __('WP One Pager: Colors', 'wp-one-pager'),
        'description' => '',
        'priority' => 35,
      )
    );
    
    $wp_customize->add_setting(
      'button-color-1',
      array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'button-color-1',
        array(
          'label' => __('Button color 1', 'wp-one-pager'),
          'section' => 'wpop-colors',
          'settings' => 'button-color-1',
        )
      )
    );

    $wp_customize->add_setting(
      'button-color-2',
      array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
      )
    );
    
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'button-color-2',
        array(
          'label' => __('Button color 2', 'wp-one-pager'),
          'section' => 'wpop-colors',
          'settings' => 'button-color-2',
        )
      )
    );

    $wp_customize->add_setting(
      'link-color',
      array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
      )
    );
    
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'link-color',
        array(
          'label' => __('Link color', 'wp-one-pager'),
          'section' => 'wpop-colors',
          'settings' => 'link-color',
        )
      )
    );
    
  }

}
