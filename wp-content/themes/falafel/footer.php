<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package falafel
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer container-fluid" role="contentinfo">
		<div class="site-info right small white-text">
			<a class="white-text" href="<?php echo esc_url( __( 'https://www.lib.umich.edu/', 'falafel' ) ); ?>"><?php printf( esc_html__( 'Powered by %s', 'falafel' ), 'MLibrary' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
