<?php

class OnepagerCustomizerHero {

  public function customizer_hero($wp_customize) {
    
    $wp_customize->add_section(
      'hero',
      array(
        'title' => __('WP One Pager: Hero', 'wp-one-pager'),
        'description' => '',
        'priority' => 35,
      )
    );

    $wp_customize->add_setting(
      'hero-title',
      array(
        'default' => get_bloginfo('name'),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
      )
    );
    
    $wp_customize->add_control(
      'hero-title',
      array(
        'label' => __('Hero title', 'wp-one-pager'),
        'section' => 'hero',
        'type' => 'text',
      )
    );

    $wp_customize->add_setting(
      'hero-height',
      array(
        'default' => '',
        array(
          'sanitize_callback' => 'absint',
        )
      )
    );
    
    $wp_customize->add_control(
      'hero-height',
      array(
        'label' => __('Hero container height in pixels', 'wp-one-pager'),
        'section' => 'hero',
        'type' => 'text',
      )
    );
    
    $wp_customize->add_setting(
      'hero-description',
      array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
      )
    );
     
    $wp_customize->add_control(
      new WP_Onepager_Textarea_Control(
        $wp_customize,
        'hero-description',
        array(
          'label' => __('Description', 'wp-one-pager'),
          'section' => 'hero',
          'settings' => 'hero-description',
        )
      )
    );
    
    $wp_customize->add_setting(
      'hero-background-color',
      array(
        'default' => '#eeeeee',
        'sanitize_callback' => 'sanitize_hex_color',
      )
    );
    
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'hero-background-color',
        array(
          'label' => __('Background color', 'wp-one-pager'),
          'section' => 'hero',
          'settings' => 'hero-background-color',
        )
      )
    );

    $wp_customize->add_setting(
      'hero-text-color',
      array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
      )
    );
    
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'hero-text-color',
        array(
          'label' => __('Text color', 'wp-one-pager'),
          'section' => 'hero',
          'settings' => 'hero-text-color',
        )
      )
    );

    $wp_customize->add_setting(
      'hero-button-style',
      array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
      )
    );
    
    $wp_customize->add_control(
      'hero-button-style',
      array(
        'label' => __('Style for all buttons', 'wp-one-pager'),
        'section' => 'hero',
        'type'    => 'select',
        'choices' => array(
          '' => '',
          'button-1' => 'Button 1',
          'button-2' => 'Button 2',
        )
      )
    );

    $wp_customize->add_setting(
      'hero-button-1-title',
      array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
      )
    );
    
    $wp_customize->add_control(
      'hero-button-1-title',
      array(
        'label' => __('Button 1 title', 'wp-one-pager'),
        'section' => 'hero',
        'type' => 'text',
      )
    );

    $wp_customize->add_setting(
      'hero-button-1-page',
      array(
        'sanitize_callback' => 'absint',
      )
    );
    
    $wp_customize->add_control(
      'hero-button-1-page',
      array(
        'type' => 'dropdown-pages',
        'label' => __('Button 1 link', 'wp-one-pager'),
        'section' => 'hero',
      )
    );

    $wp_customize->add_setting(
      'hero-button-2-title',
      array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
      )
    );
    
    $wp_customize->add_control(
      'hero-button-2-title',
      array(
        'label' => __('Button 2 title', 'wp-one-pager'),
        'section' => 'hero',
        'type' => 'text',
      )
    );

    $wp_customize->add_setting(
      'hero-button-2-page',
      array(
        'sanitize_callback' => 'absint',
      )
    );

    $wp_customize->add_control(
      'hero-button-2-page',
      array(
        'type' => 'dropdown-pages',
        'label' => __('Button 2 link', 'wp-one-pager'),
        'section' => 'hero',
      )
    );

    $wp_customize->add_setting(
      'hero-button-3-title',
      array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
      )
    );
    
    $wp_customize->add_control(
      'hero-button-3-title',
      array(
        'label' => __('Button 3 title', 'wp-one-pager'),
        'section' => 'hero',
        'type' => 'text',
      )
    );
    
    $wp_customize->add_setting(
      'hero-button-3-page',
      array(
        'sanitize_callback' => 'absint',
      )
    );
    
    $wp_customize->add_control(
      'hero-button-3-page',
      array(
        'type' => 'dropdown-pages',
        'label' => __('Button 3 link', 'wp-one-pager'),
        'section' => 'hero',
      )
    );

    $wp_customize->add_setting(
      'hero-button-4-title',
      array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
      )
    );
    
    $wp_customize->add_control(
      'hero-button-4-title',
      array(
        'label' => __('Button 4 title', 'wp-one-pager'),
        'section' => 'hero',
        'type' => 'text',
      )
    );
    
    $wp_customize->add_setting(
      'hero-button-4-page',
      array(
        'sanitize_callback' => 'absint',
      )
    );
    
    $wp_customize->add_control(
      'hero-button-4-page',
      array(
        'type' => 'dropdown-pages',
        'label' => __('Button 4 link', 'wp-one-pager'),
        'section' => 'hero',
      )
    );

    $wp_customize->add_setting(
      'hero-button-5-title',
      array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
      )
    );
    
    $wp_customize->add_control(
      'hero-button-5-title',
      array(
        'label' => __('Button 5 title', 'wp-one-pager'),
        'section' => 'hero',
        'type' => 'text',
      )
    );
    
    $wp_customize->add_setting(
      'hero-button-5-page',
      array(
        'sanitize_callback' => 'absint',
      )
    );
    
    $wp_customize->add_control(
      'hero-button-5-page',
      array(
        'type' => 'dropdown-pages',
        'label' => __('Button 5 link', 'wp-one-pager'),
        'section' => 'hero',
      )
    );

    $wp_customize->add_setting(
      'hero-button-6-title',
      array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
      )
    );
    
    $wp_customize->add_control(
      'hero-button-6-title',
      array(
        'label' => __('Button 6 title', 'wp-one-pager'),
        'section' => 'hero',
        'type' => 'text',
      )
    );
    
    $wp_customize->add_setting(
      'hero-button-6-page',
      array(
        'sanitize_callback' => 'absint',
      )
    );
    
    $wp_customize->add_control(
      'hero-button-6-page',
      array(
        'type' => 'dropdown-pages',
        'label' => __('Button 6 link', 'wp-one-pager'),
        'section' => 'hero',
      )
    );

  }

}
