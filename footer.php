<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_One_Pager
 */

?>

</div><!-- #page -->

<?php if (!get_theme_mod( 'hide-footer' )): ?>
	<footer id="colophon" class="site-footer">
	
		<div class="footer-1">
			<?php echo OnepagerHelpers::getThemeMod( 'footer-1' ); ?>
		</div>
		
		<div class="footer-2">
			<?php echo OnepagerHelpers::getThemeMod( 'footer-2' ); ?>
		</div>
		
		<div class="footer-3">
			<?php echo OnepagerHelpers::getThemeMod( 'footer-3' ); ?>
		</div>
	
	</footer><!-- #colophon -->
<?php endif; ?>

<div class="site-footer-bottom">

	<div class="site-info">
		<?php echo __('Theme', 'wp-one-pager') ?>: WP One Pager
	</div><!-- .site-info -->
		
</div>

<?php wp_footer(); ?>

</body>
</html>
