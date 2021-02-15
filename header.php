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

		<h1><?php echo OnepagerHelpers::getThemeMod('hero-title', get_bloginfo('name')); ?></h1>
		<p><?php echo OnepagerHelpers::getThemeMod('hero-description', '', 'html'); ?></p>

		<?php if (get_theme_mod('hero-button-1-title')): ?>
			<?php $button_1_url = $button_1_id ? esc_url(get_permalink($button_1_id)) : '' ?>
			<a href="<?php echo $button_1_url; ?>" class="onepager-button"><?php echo OnepagerHelpers::getThemeMod( 'hero-button-1-title' ); ?></a>
		<?php endif; ?>
		
		<?php if (get_theme_mod('hero-button-2-title')): ?>
			<?php $button_2_url = $button_2_id ? esc_url(get_permalink($button_2_id)) : '' ?>
			<a href="<?php echo $button_2_url; ?>" class="onepager-button-v2"><?php echo OnepagerHelpers::getThemeMod( 'hero-button-2-title' ); ?></a>
		<?php endif; ?>
	</div>
	
</div>

<div id="page" class="site">
