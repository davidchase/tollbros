<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage TollBros_Base
 */
?>
	</div><!-- #main -->

	<div id="footer">
		<div id="copyright">

<?php
	// sidebar in footer apply using widgets
	get_sidebar( 'footer' );
?>

			<div id="credits">
				<?php do_action( 'tollbros_credits' ); ?>
				<a target="_blank" href="<?php echo esc_url( __( 'http://www.tollbrothers.com', 'tollbros' ) ); ?>" title="<?php esc_attr_e( 'Toll Brothers Inc', 'tollbros' ); ?>" rel="author"><?php tollbros_footer_copy(); ?></a>
			</div><!-- #credits -->

		</div><!-- #copyright -->
	</div><!-- #footer -->

</div><!-- #wrapper -->
	<?php tollbros_footer_option(); ?>
	<?php wp_footer();?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory')?>/js/jquery.cycle.all.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory')?>/js/cycle.js" type="text/javascript"></script>
</body>
</html>
