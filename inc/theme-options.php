<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'tollbros_options', 'tollbros_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_menu_page( __( 'Toll Bros Options', 'tollbrostheme' ), __( 'Toll Bros Options', 'tollbrostheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page');
}

/**
 * Create arrays for our select and radio options
 */
$select_options = array(
	'0' => array(
		'value' =>	'0',
		'label' => __( 'Zero', 'tollbrostheme' )
	),
	'1' => array(
		'value' =>	'1',
		'label' => __( 'One', 'tollbrostheme' )
	),
	'2' => array(
		'value' => '2',
		'label' => __( 'Two', 'tollbrostheme' )
	),
	'3' => array(
		'value' => '3',
		'label' => __( 'Three', 'tollbrostheme' )
	),
	'4' => array(
		'value' => '4',
		'label' => __( 'Four', 'tollbrostheme' )
	),
	'5' => array(
		'value' => '3',
		'label' => __( 'Five', 'tollbrostheme' )
	)
);

$radio_options = array(
	'yes' => array(
		'value' => 'yes',
		'label' => __( 'Yes', 'tollbrostheme' )
	),
	'no' => array(
		'value' => 'no',
		'label' => __( 'No', 'tollbrostheme' )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'tollbrostheme' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Theme Options Saved', 'tollbrostheme' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php" id="options">
			<?php settings_fields( 'tollbros_options' ); ?>
			<?php $options = get_option( 'tollbros_theme_options' ); ?>

			<table class="form-table">

				<?php
				/**
				 * A tollbros checkbox option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Theme Layout', 'tollbrostheme' ); ?></th>
					<td>
						<input id="tollbros_theme_options[option1]" name="tollbros_theme_options[option1]" type="checkbox" value="1" <?php checked( '1', $options['option1'] ); ?> />
						<br/>
						<label class="description" for="tollbros_theme_options[option1]"><?php _e( 'Sidebar on Right', 'tollbrostheme' ); ?></label>
						<br/>
						<input id="tollbros_theme_options[option2]" name="tollbros_theme_options[option2]" type="checkbox" value="2" <?php checked( '2', $options['option2'] ); ?> />
						<br/>
						<label class="description" for="tollbros_theme_options[option2]"><?php _e( 'Sidebar on Left', 'tollbrostheme' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * A tollbros select input option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Select input', 'tollbrostheme' ); ?></th>
					<td>
						<select name="tollbros_theme_options[selectinput]">
							<?php
								$selected = $options['selectinput'];
								$p = '';
								$r = '';

								foreach ( $select_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<label class="description" for="tollbros_theme_options[selectinput]"><?php _e( 'tollbros select input', 'tollbrostheme' ); ?></label>
					</td>
				</tr> 

				<?php
				/**
				 * A tollbros of radio buttons
				 */
				?>
				 <tr valign="top"><th scope="row"><?php _e( 'Comments?', 'tollbrostheme' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Radio buttons', 'tollbrostheme' ); ?></span></legend>
						<?php
							if ( ! isset( $checked ) )
								$checked = '';
							foreach ( $radio_options as $option ) {
								$radio_setting = $options['radioinput'];

								if ( '' != $radio_setting ) {
									if ( $options['radioinput'] == $option['value'] ) {
										$checked = "checked=\"checked\"";
									} else {
										$checked = '';
									}
								}
								?>
								<label class="description"><input type="radio" name="tollbros_theme_options[radioinput]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> /> <?php echo $option['label']; ?></label><br />
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>  

				<?php
				/**
				 * Header Stuff Here
				 */
				?>
				
				
				<th scope="row"><h3><?php _e( 'Header Section', 'tollbrostheme' ); ?></h3></th>
				<tr valign="top"><th scope="row"><?php _e( 'Slider', 'tollbrostheme' ); ?></th>
					<td>
						<input id="tollbros_theme_options[slider]" class="regular-text" type="text" name="tollbros_theme_options[slider]" value="<?php esc_attr_e( $options['slider'] ); ?>" />
						<br/>
						<label class="description" for="tollbros_theme_options[slider2]"><?php _e( '', 'tollbrostheme' ); ?></label>
						<input id="tollbros_theme_options[slider2]" class="regular-text" type="text" name="tollbros_theme_options[slider2]" value="<?php esc_attr_e( $options['slider2'] ); ?>" />
						<br/>
						<label class="description" for="tollbros_theme_options[slider3]"><?php _e( '', 'tollbrostheme' ); ?></label>
						<input id="tollbros_theme_options[slider3]" class="regular-text" type="text" name="tollbros_theme_options[slider3]" value="<?php esc_attr_e( $options['slider3'] ); ?>" />
						<br/>
						<label class="description" for="tollbros_theme_options[slider]"><?php _e( '', 'tollbrostheme' ); ?></label>
						<div id="holder"></div>
						<a href="#" id="add">Add</a>
						
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Meta Keywords', 'tollbrostheme' ); ?></th>
					<td>
						<input id="tollbros_theme_options[keywords]" class="regular-text" type="text" name="tollbros_theme_options[keywords]" value="<?php esc_attr_e( $options['keywords'] ); ?>" />
						<br/>
						<label class="description" for="tollbros_theme_options[keywords]"><?php _e( 'seperate with commas', 'tollbrostheme' ); ?></label>
					</td>
				</tr>
					<tr valign="top"><th scope="row"><?php _e( 'Header Tracking', 'tollbrostheme' ); ?></th>
					<td>
						<textarea id="tollbros_theme_options[headeroption]" cols="90" rows="5" name="tollbros_theme_options[headeroption]"><?php echo esc_textarea( $options['headeroption'] ); ?></textarea>
						<br/>
						<label class="description" for="tollbros_theme_options[headeroption]"><?php _e( 'Add Tracking To Header', 'tollbrostheme' ); ?></label>
					</td>
				</tr>
				<?php
				/**
				 * Footer Stuff Here
				 */
				?>
				<th scope="row"><h3><?php _e( 'Footer Section', 'tollbrostheme' ); ?></h3></th>
				<tr valign="top"><th scope="row"><?php _e( 'Footer Copyright', 'tollbrostheme' ); ?></th>
					<td>
						<textarea id="tollbros_theme_options[footercopy]"  cols="90" rows="5" name="tollbros_theme_options[footercopy]"><?php echo esc_textarea( $options['footercopy'] ); ?></textarea>
						<br/>
						<label class="description" for="tollbros_theme_options[footercopy]"><?php _e( 'Add Copyright Info', 'tollbrostheme' ); ?></label>
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Footer Tracking', 'tollbrostheme' ); ?></th>
					<td>
						<textarea id="tollbros_theme_options[footeroption]"  cols="90" rows="5" name="tollbros_theme_options[footeroption]"><?php echo esc_textarea( $options['footeroption'] ); ?></textarea>
						<br/>
						<label class="description" for="tollbros_theme_options[footeroption]"><?php _e( 'Add Tracking To Footer', 'tollbrostheme' ); ?></label>
					</td>
				</tr>
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'tollbrostheme' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['keywords'] = wp_filter_nohtml_kses( $input['keywords'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;

	/** This is code below would be used if not tracking...
	$input['headeroption'] = wp_filter_post_kses( $input['headeroption'] );
	$input['footeroption'] = wp_filter_post_kses( $input['footeroption'] ); */

	return $input;
}
