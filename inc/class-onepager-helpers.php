<?php

class OnepagerHelpers {

  public static function getThemeMod($mod_id = '', $default_str = '', $content_type = '') {
    
    $val = '';

    switch($content_type) {
    
      case 'html';
        $val = wp_kses_post( nl2br( get_theme_mod( $mod_id, $default_str ) ) );
        break;
      default:
        $val = esc_html( get_theme_mod( $mod_id, $default_str ) );
        break;
    }
    
    return $val;
  }

}

