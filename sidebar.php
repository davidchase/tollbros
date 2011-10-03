<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage TollBros_Base
 */
?>

		<div id="primary" class="widget-area" role="complementary">
			<ul class="xoxo">

<?php
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

		
		<?php endif; // end primary widget area ?>
			</ul>
		</div><!-- #primary .widget-area -->

<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

		<div id="secondary" class="widget-area" role="complementary">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>
		</div><!-- #secondary .widget-area -->

<?php endif; ?>
