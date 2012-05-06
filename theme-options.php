<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'pin_board_options', 'pin_board_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_action( 'admin_print_styles' . $page, 'my_plugin_admin_styles' );
	add_theme_page( __( 'Theme Options', 'pin_board' ), __( 'Pin Board Options', 'pin_board' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

function my_plugin_admin_styles() {
	wp_enqueue_script( 'farbtastic' );
	wp_enqueue_style( 'farbtastic' );
}

$navigation_options = array(
	'0' => array(
		'value' =>	'0',
		'label' => __( 'Standard', 'pin_board' )
	),
	'1' => array(
		'value' => '1',
		'label' => __( 'InfiniteScroll', 'pin_board' )
	)
);

$font_options = array(
	'0' => array(
		'value' =>	'0',
		'label' => __( 'cuprum', 'pin_board' )
	),
	'1' => array(
		'value' =>	'1',
		'label' => __( 'arial', 'pin_board' )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $navigation_options, $font_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'pin_board' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'pin_board' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'pin_board_options' ); ?>
			<?php $options = get_option( 'pin_board_theme_options' ); ?>

			<table class="form-table">
                                <tr valign="top"><th scope="row"><?php _e( 'Logo', 'pin_board' ); ?></th>
					<td>
						<input id="pin_board_theme_options[logo]" class="regular-text" type="text" name="pin_board_theme_options[logo]" value="<?php esc_attr_e( $options['logo'] ); ?>" />
						<label class="description" for="pin_board_theme_options[logo]"><?php _e( 'Enter logo url, default will be used when value is not set', 'pin_board' ); ?></label>
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Navigation', 'pin_board' ); ?></th>
					<td>
						<select name="pin_board_theme_options[navigation]">
							<?php
								$selected = $options['navigation'];
								$p = '';
								$r = '';

								foreach ( $navigation_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<label class="description" for="pin_board_theme_options[navigation]"><?php _e( 'Choose page navigation type', 'pin_board' ); ?></label>
					</td>
				</tr>

<!--				<tr valign="top"><th scope="row"><?php _e( 'Color', 'pin_board' ); ?></th>
					<td>
						<input type="text" id="pin_board_theme_options_color" name="pin_board_theme_options[color]" value="<?php esc_attr_e( $options['color'] ); ?>" />
						<div id="colorpicker"></div>

						<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#colorpicker').farbtastic('#pin_board_theme_options_color');
});
						</script>

						<label class="description" for="pin_board_theme_options_color"><?php _e( 'Select theme color', 'pin_board' ); ?></label>
					</td>
				</tr>-->

<!--				<tr valign="top"><th scope="row"><?php _e( 'Use images only', 'pin_board' ); ?></th>
					<td>
						<input id="pin_board_theme_options[images_only]" name="pin_board_theme_options[images_only]" type="checkbox" value="1" <?php checked( '1', $options['images_only'] ); ?> />
						<label class="description" for="pin_board_theme_options[images_only]"><?php _e( 'For index page and related posts', 'pin_board' ); ?></label>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Related posts', 'pin_board' ); ?></th>
					<td>
						<input id="pin_board_theme_options[related]" name="pin_board_theme_options[related]" type="checkbox" value="1" <?php checked( '1', $options['related'] ); ?> />
						<label class="description" for="pin_board_theme_options[related]"><?php _e( 'Enable related posts in Single page', 'pin_board' ); ?></label>
					</td>
				</tr>-->

				<tr valign="top"><th scope="row"><?php _e( 'Font', 'pin_board' ); ?></th>
					<td>
						<select name="pin_board_theme_options[font]">
							<?php
								$selected = $options['font'];
								$p = '';
								$r = '';

								foreach ( $font_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<label class="description" for="pin_board_theme_options[font]"><?php _e( 'Choose font', 'pin_board' ); ?></label>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Google analytics', 'pin_board' ); ?></th>
					<td>
						<textarea id="pin_board_theme_options[google]" class="large-text" cols="50" rows="10" name="pin_board_theme_options[google]"><?php echo htmlspecialchars( $options['google'], ENT_QUOTES ) ?></textarea>
						<label class="description" for="pin_board_theme_options[google]"><?php _e( 'Enter Google analytics code', 'pin_board' ); ?></label>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Favicon', 'pin_board' ); ?></th>
					<td>
						<input id="pin_board_theme_options[favicon]" class="regular-text" type="text" name="pin_board_theme_options[favicon]" value="<?php esc_attr_e( $options['favicon'] ); ?>" />
						<label class="description" for="pin_board_theme_options[favicon]"><?php _e( 'Enter favicon url, default will be used when value is not set', 'pin_board' ); ?></label>
					</td>
				</tr>
<!--
				<tr valign="top"><th scope="row"><?php _e( 'Fluid grid', 'pin_board' ); ?></th>
					<td>
						<input id="pin_board_theme_options[fluid]" name="pin_board_theme_options[fluid]" type="checkbox" value="1" <?php checked( '1', $options['fluid'] ); ?> />
						<label class="description" for="pin_board_theme_options[fluid]"><?php _e( 'Enable fluid grid', 'pin_board' ); ?></label>
					</td>
				</tr>-->

                                


				
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'pin_board' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */

function theme_options_validate( $input ) {
	global $navigation_options, $font_options;

	if ( ! array_key_exists( $input['navigation'], $navigation_options ) )
		$input['navigation'] = null;

	if ( ! array_key_exists( $input['font'], $font_options ) )
		$input['font'] = null;

	// Text options must be safe text with no HTML tags
	$input['google'] = $input['google'];
	$input['favicon'] = wp_filter_nohtml_kses( $input['favicon'] );

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['images_only'] ) ) $input['images_only'] = null;
	$input['images_only'] = ( $input['images_only'] == 1 ? 1 : 0 );
	if ( ! isset( $input['related'] ) ) $input['related'] = null;
	$input['related'] = ( $input['related'] == 1 ? 1 : 0 );
	if ( ! isset( $input['fluid'] ) ) $input['fluid'] = null;
	$input['fluid'] = ( $input['fluid'] == 1 ? 1 : 0 );

	if (!preg_match('/^#[0-9a-fA-F]{6}$/', $input['color']))
	{
		$input['color'] = '#ff555d';
	}

	return $input;
}