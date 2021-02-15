<?php

class OnepagerCustomizerNav {

  public function customizer_nav($wp_customize) {
    
    $wp_customize->add_section(
      'nav',
      array(
        'title' => __('WP One Pager: Navigation', 'wp-one-pager'),
        'description' => '',
        'priority' => 35,
      )
    );
    
    $wp_customize->add_setting(
      'nav-hide-primary-menu',
      array(
        'sanitize_callback' => ['OnepagerCustomizer', 'wpop_sanitize_checkbox'],
      )
    );

    $wp_customize->add_control(
      'nav-hide-primary-menu',
      array(
        'type' => 'checkbox',
        'label' => __('Hide menu', 'wp-one-pager'),
        'section' => 'nav',
      )
    );
    
  }

}
