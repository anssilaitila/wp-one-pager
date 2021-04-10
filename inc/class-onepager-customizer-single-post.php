<?php

class OnepagerCustomizerSinglePost {

  public function customizer_single_post($wp_customize) {
    
    $wp_customize->add_section(
      'single-post',
      array(
        'title' => __('WP One Pager: Single Post', 'wp-one-pager'),
        'description' => '',
        'priority' => 35,
      )
    );
    
    $wp_customize->add_setting(
      'single-post-hide-posted-on',
      array(
        'sanitize_callback' => ['OnepagerCustomizer', 'wpop_sanitize_checkbox'],
      )
    );

    $wp_customize->add_control(
      'single-post-hide-posted-on',
      array(
        'type' => 'checkbox',
        'label' => __('Hide "posted on / posted by" -section', 'wp-one-pager'),
        'section' => 'single-post',
      )
    );

    $wp_customize->add_setting(
      'single-post-hide-logged-in-as',
      array(
        'sanitize_callback' => ['OnepagerCustomizer', 'wpop_sanitize_checkbox'],
      )
    );
    
    $wp_customize->add_control(
      'single-post-hide-logged-in-as',
      array(
        'type' => 'checkbox',
        'label' => __('Hide "logged in as" -section', 'wp-one-pager'),
        'section' => 'single-post',
      )
    );

  }

}
