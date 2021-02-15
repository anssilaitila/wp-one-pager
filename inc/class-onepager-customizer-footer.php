<?php

class OnepagerCustomizerFooter {

  public function customizer_footer($wp_customize) {

    $wp_customize->add_section(
      'footer',
      array(
        'title' => __('WP One Pager: Footer', 'wp-one-pager'),
        'description' => '',
        'priority' => 35,
      )
    );
    
    $wp_customize->add_setting(
      'hide-footer',
      array(
        'sanitize_callback' => ['OnepagerCustomizer', 'wpop_sanitize_checkbox'],
      )
    );

    $wp_customize->add_control(
      'hide-footer',
      array(
        'type' => 'checkbox',
        'label' => __('Hide footer columns', 'wp-one-pager'),
        'section' => 'footer',
      )
    );

    $wp_customize->add_setting(
      'footer-background-color',
      array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'footer-background-color',
        array(
          'label' => __('Background color', 'wp-one-pager'),
          'section' => 'footer',
          'settings' => 'footer-background-color',
        )
      )
    );

    $wp_customize->add_setting(
      'footer-background-image',
      array(
        'sanitize_callback' => 'absint',
      )
    );
     
    $wp_customize->add_control(
      new WP_Customize_Media_Control(
        $wp_customize,
        'footer-background-image',
        array(
          'label' => __('Background image', 'wp-one-pager'),
          'section' => 'footer',
          'settings' => 'footer-background-image'
        )
      )
    );

    $wp_customize->add_setting(
      'footer-1',
      array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
      )
    );
     
    $wp_customize->add_control(
      new WP_Onepager_Textarea_Control(
        $wp_customize,
        'footer-1',
        array(
          'label' => __('Footer 1', 'wp-one-pager'),
          'section' => 'footer',
          'settings' => 'footer-1',
        )
      )
    );

    $wp_customize->add_setting(
      'footer-2',
      array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
      )
    );
     
    $wp_customize->add_control(
      new WP_Onepager_Textarea_Control(
        $wp_customize,
        'footer-2',
        array(
          'label' => __('Footer 2', 'wp-one-pager'),
          'section' => 'footer',
          'settings' => 'footer-2',
          'sanitize_callback' => 'wp_kses_post',
        )
      )
    );
    
    $wp_customize->add_setting(
      'footer-3',
      array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
      )
    );
     
    $wp_customize->add_control(
      new WP_Onepager_Textarea_Control(
        $wp_customize,
        'footer-3',
        array(
          'label' => __('Footer 3', 'wp-one-pager'),
          'section' => 'footer',
          'settings' => 'footer-3',
          'sanitize_callback' => 'wp_kses_post',
        )
      )
    );
    
  }

}
