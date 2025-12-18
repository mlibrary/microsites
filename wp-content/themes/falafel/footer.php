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

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container-fluid footer-container">
			<div class="flex flex-center">
				<p class="footer-text">Powered by the <a href="https://www.lib.umich.edu/">University of Michigan Library</a>
				&bull; <a href="https://sites.lib.umich.edu/microsites-accessibility-statement/">Microsites Accessibility</a></p>
			</div>

			<?php dynamic_sidebar('footer_widget'); ?>

		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
