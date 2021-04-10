<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_One_Pager
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wp-one-pager' ); ?></a>

<?php if (!get_theme_mod( 'nav-hide-primary-menu' )): ?>
	<nav id="site-navigation" class="main-navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'wp-one-pager' ); ?></button>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			)
		);
		?>
	</nav><!-- #site-navigation -->
<?php endif; ?>

<?php
$custom_logo_id = get_theme_mod('custom_logo');
$image = wp_get_attachment_image_src($custom_logo_id , 'thumbnail');
$logo_exists = isset($image[0]) ? 1 : 0;
?>

<div class="hero-container <?php echo $logo_exists ? 'hero-container-with-logo' : '' ?>">
	
	<div class="hero">

		<?php if ($logo_exists): ?>
			<div class="hero-logo-container">
				<img src="<?php echo $image[0] ?>" />
			</div>
		<?php endif; ?>

		<?php $button_1_id = intval( get_theme_mod( 'hero-button-1-page', 0 ) ) ?>
		<?php $button_2_id = intval( get_theme_mod( 'hero-button-2-page', 0 ) ) ?>
    <?php $button_3_id = intval( get_theme_mod( 'hero-button-3-page', 0 ) ) ?>
    <?php $button_4_id = intval( get_theme_mod( 'hero-button-4-page', 0 ) ) ?>
    <?php $button_5_id = intval( get_theme_mod( 'hero-button-5-page', 0 ) ) ?>
    <?php $button_6_id = intval( get_theme_mod( 'hero-button-6-page', 0 ) ) ?>

		<h1><?php echo OnepagerHelpers::getThemeMod('hero-title', get_bloginfo('name')); ?></h1>
		<p><?php echo OnepagerHelpers::getThemeMod('hero-description', '', 'html'); ?></p>

    <?php $button_class_all = '' ?>

    <?php if ($button_style = get_theme_mod('hero-button-style')): ?>
      
      <?php if ($button_style == 'button-1'): ?>
        <?php $button_class_all = 'onepager-button' ?>
      <?php elseif ($button_style == 'button-2'): ?>
        <?php $button_class_all = 'onepager-button-v2' ?>
      <?php endif; ?>
      
    <?php endif; ?>

		<?php if (get_theme_mod('hero-button-1-title')): ?>
    
      <?php $button_class = 'onepager-button' ?>
      
      <?php if ($button_class_all): ?>
        <?php $button_class = $button_class_all ?>
      <?php endif; ?>
    
			<?php $button_1_url = $button_1_id ? esc_url(get_permalink($button_1_id)) : '' ?>
			<a href="<?php echo $button_1_url; ?>" class="<?php echo $button_class ?>"><?php echo OnepagerHelpers::getThemeMod( 'hero-button-1-title' ); ?></a>

		<?php endif; ?>
		
		<?php if (get_theme_mod('hero-button-2-title')): ?>

      <?php $button_class = 'onepager-button-v2' ?>
      
      <?php if ($button_class_all): ?>
        <?php $button_class = $button_class_all ?>
      <?php endif; ?>

			<?php $button_2_url = $button_2_id ? esc_url(get_permalink($button_2_id)) : '' ?>
			<a href="<?php echo $button_2_url; ?>" class="<?php echo $button_class ?>"><?php echo OnepagerHelpers::getThemeMod( 'hero-button-2-title' ); ?></a>
      
		<?php endif; ?>

    <?php $button_class = 'onepager-button' ?>
    
    <?php if ($button_class_all): ?>
      <?php $button_class = $button_class_all ?>
    <?php endif; ?>

    <?php if (get_theme_mod('hero-button-3-title')): ?>
      <?php $button_3_url = $button_3_id ? esc_url(get_permalink($button_3_id)) : '' ?>
      <a href="<?php echo $button_3_url; ?>" class="<?php echo $button_class ?>"><?php echo OnepagerHelpers::getThemeMod( 'hero-button-3-title' ); ?></a>
    <?php endif; ?>
    
    <?php if (get_theme_mod('hero-button-4-title')): ?>
      <?php $button_4_url = $button_4_id ? esc_url(get_permalink($button_4_id)) : '' ?>
      <a href="<?php echo $button_4_url; ?>" class="<?php echo $button_class ?>"><?php echo OnepagerHelpers::getThemeMod( 'hero-button-4-title' ); ?></a>
    <?php endif; ?>
    
    <?php if (get_theme_mod('hero-button-5-title')): ?>
      <?php $button_5_url = $button_5_id ? esc_url(get_permalink($button_5_id)) : '' ?>
      <a href="<?php echo $button_5_url; ?>" class="<?php echo $button_class ?>"><?php echo OnepagerHelpers::getThemeMod( 'hero-button-5-title' ); ?></a>
    <?php endif; ?>

    <?php if (get_theme_mod('hero-button-6-title')): ?>
      <?php $button_6_url = $button_6_id ? esc_url(get_permalink($button_6_id)) : '' ?>
      <a href="<?php echo $button_6_url; ?>" class="<?php echo $button_class ?>"><?php echo OnepagerHelpers::getThemeMod( 'hero-button-6-title' ); ?></a>
    <?php endif; ?>

	</div>
	
</div>

<div id="page" class="site">
