<?php

class OnepagerCustomizer {

  public function add_customizer_menu_item() {
    add_theme_page( 'Customize', 'WP One Pager', 'edit_theme_options', 'customize.php' );
  }

  public static function wpop_sanitize_checkbox( $input ) {

    $retval = false;
    
    if ( isset( $input ) && $input == 1 ) {
      $retval = true;
    }
    
    return $retval;
  }
    
  public function remove_default_controls($wp_customize) {
    $wp_customize->remove_control('blogdescription');
    $wp_customize->remove_control('display_header_text');
    $wp_customize->remove_control('header_textcolor');
  }

}

function wp_onepager_register_custom_classes($wp_customize) {

  /**
   * Adds textarea support to the theme customizer
   */
  class WP_Onepager_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
      ?>
      <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea id="<?php echo $this->id ?>" rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
      </label>
      <?php
    }
  }
  
}
