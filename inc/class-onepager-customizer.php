<?php

class OnepagerCustomizer {

  public function add_customizer_menu_item() {
    add_theme_page( 'Customize', 'WP One Pager', 'edit_theme_options', 'wp-one-pager-theme-options', 'wp_onepager_theme_option_page' );
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

function wp_onepager_theme_option_page() {

  echo '<div class="wp-onepager-admin-page-container">';

  echo '<h1>' . esc_html__('WP One Pager', 'wp-one-pager') . '</h1>';

  echo '<p>' . esc_html__('Thank you for choosing WP One Pager!', 'wp-one-pager') . '</p>';

  echo '<h2>' . esc_html__('Customize your site', 'wp-one-pager') . '</h2>';

  $url = admin_url( 'customize.php' );
  $text = sprintf(
    wp_kses(
      /* translators: %s: link to the theme customizer */
      __('You may customize the theme options using the <a href="%s">customizer</a>.', 'wp-one-pager'),
      array('a' => array('href' => array(), 'target' => array()))
    ),
    esc_url($url) 
  );
  echo '<p>' . $text . '</p>';

  echo '<h2>' . esc_html__('Contact the author', 'wp-one-pager') . '</h2>';

  $url = 'https://www.wp-onepager.com/';
  $text = sprintf(
    wp_kses(
      /* translators: %s: link to wp-onepager.com */
      __('If you have a feature request, you may contact the author at <a href="%s" target="_blank">wp-onepager.com</a>. Any kind of feedback is welcome.', 'wp-one-pager'),
      array('a' => array('href' => array(), 'target' => array()))
    ),
    esc_url($url) 
  );
  echo '<p>' . $text . '</p>';
  
  echo '<h2>' . esc_html__('Leave a review', 'wp-one-pager') . '</h2>';

  $url = 'https://wordpress.org/support/theme/wp-one-pager/reviews/#new-post';
  $text = sprintf(
    wp_kses(
      /* translators: %s: link to review form */
      __('If you like the theme, a positive review would be highly appreciated and it would help the theme to gain a larger audience. You may leave a review <a href="%s" target="_blank">here</a>. Thank you!', 'wp-one-pager'),
      array('a' => array('href' => array(), 'target' => array()))
    ),
    esc_url($url) 
  );
  echo '<p>' . $text . '</p>';

  echo '<h2>' . esc_html__('Try our plugins', 'wp-one-pager') . '</h2>';

  $url_1 = 'https://wordpress.org/plugins/shared-files/';
  $url_2 = 'https://wordpress.org/plugins/contact-list/';
  $text = sprintf(
    wp_kses(
      /* translators: %s: links to plugins at wp plugin repository */
      __('You may also want to try the plugins we have made: <a href="%1$s" target="_blank">Shared Files</a> (for listing downloadable files on your site) and <a href="%2$s" target="_blank">Contact List</a> (for listing contacts and their contact information).', 'wp-one-pager'),
      array('a' => array('href' => array(), 'target' => array()))
    ),
    esc_url($url_1),
    esc_url($url_2) 
  );
  echo '<p>' . $text . '</p>';
  
  echo '<div class="wp-onepager-theme-made-by">';
  
  $url = 'https://www.tammersoft.com/';
  $text = sprintf(
    wp_kses(
      /* translators: %s: link to author's company site */
      __('Theme made by <a href="%s" target="_blank">Tammersoft</a>', 'wp-one-pager'),
      array('a' => array('href' => array(), 'target' => array()))
    ),
    esc_url($url) 
  );
  echo $text;
  
  echo '</div>';

  echo '</div>';

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
