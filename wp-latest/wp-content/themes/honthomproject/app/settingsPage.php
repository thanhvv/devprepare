<?php
/**
 * _s Theme Options
 *
 * @package _s
 * @since _s 1.0
 */
/**
 * Register the form setting for our _s_options array.
 *
 * This function is attached to the admin_init action hook.
 *
 * This call to register_setting() registers a validation callback, _s_theme_options_validate(),
 * which is used when the option is saved, to ensure that our option values are properly
 * formatted, and safe.
 *
 * @since _s 1.0
 */
function _s_theme_options_init() {
	register_setting(
		'_s_options', // Options group, see settings_fields() call in _s_theme_options_render_page()
		'_s_theme_options', // Database option, see _s_get_theme_options()
		'_s_theme_options_validate' // The sanitization callback, see _s_theme_options_validate()
	);
	// Register our settings field group
	add_settings_section(
		'general', // Unique identifier for the settings section
		'', // Section title (we don't want one)
		'__return_false', // Section callback (we don't want anything)
		'theme_options' // Menu slug, used to uniquely identify the page; see _s_theme_options_add_page()
	);
	// Register our individual settings fields
	add_settings_field( 'gioi_thieu', __( 'Giới thiệu', '_s' ), '_s_settings_field_gioi_thieu', 'theme_options', 'general' );
  add_settings_field( 'su_kien', __( 'Sự kiện', '_s' ), '_s_settings_field_su_kien', 'theme_options', 'general' );
  add_settings_field( 'trai_nghiem', __( 'Trải nghiệm', '_s' ), '_s_settings_field_trai_nghiem', 'theme_options', 'general' );
	add_settings_field( 'cau_hoi', __( 'Câu hỏi', '_s' ), '_s_settings_field_cau_hoi', 'theme_options', 'general' );

}
add_action( 'admin_init', '_s_theme_options_init' );
/**
 * Change the capability required to save the '_s_options' options group.
 *
 * @see _s_theme_options_init() First parameter to register_setting() is the name of the options group.
 * @see _s_theme_options_add_page() The edit_theme_options capability is used for viewing the page.
 *
 * @param string $capability The capability used for the page, which is manage_options by default.
 * @return string The capability to actually use.
 */
function _s_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability__s_options', '_s_option_page_capability' );
/**
 * Add our theme options page to the admin menu.
 *
 * This function is attached to the admin_menu action hook.
 *
 * @since _s 1.0
 */
function _s_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Constant Settings', '_s' ),   // Name of page
		__( 'Constant Settings', '_s' ),   // Label in menu
		'edit_theme_options',          // Capability required
		'theme_options',               // Menu slug, used to uniquely identify the page
		'_s_theme_options_render_page' // Function that renders the options page
	);
}
add_action( 'admin_menu', '_s_theme_options_add_page' );

/**
 * Returns the options array for _s.
 *
 * @since _s 1.0
 */
function _s_get_theme_options() {
	$saved = (array) get_option( '_s_theme_options' );
	$defaults = array(
		'gioi_thieu'     => '',
    'su_kien'     => '',
    'trai_nghiem'     => '',
		'cau_hoi'     => '',
	);
	$defaults = apply_filters( '_s_default_theme_options', $defaults );
	$options = wp_parse_args( $saved, $defaults );
	$options = array_intersect_key( $options, $defaults );
	return $options;
}

/**
 * Renders the sample text input setting field.
 */
function _s_settings_field_gioi_thieu() {
	$options = _s_get_theme_options();
	?>
	<input type="text" name="_s_theme_options[gioi_thieu]" id="gioi-thieu" value="<?php echo esc_attr( $options['gioi_thieu'] ); ?>" />
	<?php
}

function _s_settings_field_su_kien() {
	$options = _s_get_theme_options();
	?>
	<input type="text" name="_s_theme_options[su_kien]" id="su-kien" value="<?php echo esc_attr( $options['su_kien'] ); ?>" />
	<?php
}

function _s_settings_field_trai_nghiem() {
	$options = _s_get_theme_options();
	?>
	<input type="text" name="_s_theme_options[trai_nghiem]" id="trai-nghiem" value="<?php echo esc_attr( $options['trai_nghiem'] ); ?>" />
	<?php
}

function _s_settings_field_cau_hoi() {
	$options = _s_get_theme_options();
	?>
	<input type="text" name="_s_theme_options[cau_hoi]" id="cau-hoi" value="<?php echo esc_attr( $options['cau_hoi'] ); ?>" />
	<?php
}
/**
 * Renders the Theme Options administration screen.
 *
 * @since _s 1.0
 */
function _s_theme_options_render_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<?php $theme_name = function_exists( 'wp_get_theme' ) ? wp_get_theme() : get_current_theme(); ?>
		<h2><?php printf( __( '%s Theme Options', '_s' ), $theme_name ); ?></h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php
				settings_fields( '_s_options' );
				do_settings_sections( 'theme_options' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}
/**
 * Sanitize and validate form input. Accepts an array, return a sanitized array.
 *
 * @see _s_theme_options_init()
 * @todo set up Reset Options action
 *
 * @param array $input Unknown values.
 * @return array Sanitized theme options ready to be stored in the database.
 *
 * @since _s 1.0
 */
function _s_theme_options_validate( $input ) {
	$output = array();
	// Checkboxes will only be present if checked.
	if ( isset( $input['sample_checkbox'] ) )
		$output['sample_checkbox'] = 'on';
	// The sample text input must be safe text with no HTML tags
	if ( isset( $input['gioi_thieu'] ) && ! empty( $input['gioi_thieu'] ) )
		$output['gioi_thieu'] = wp_filter_nohtml_kses( $input['gioi_thieu'] );
  if ( isset( $input['su_kien'] ) && ! empty( $input['su_kien'] ) )
    $output['su_kien'] = wp_filter_nohtml_kses( $input['su_kien'] );
  if ( isset( $input['trai_nghiem'] ) && ! empty( $input['trai_nghiem'] ) )
    $output['trai_nghiem'] = wp_filter_nohtml_kses( $input['trai_nghiem'] );
	if ( isset( $input['cau_hoi'] ) && ! empty( $input['cau_hoi'] ) )
		$output['cau_hoi'] = wp_filter_nohtml_kses( $input['cau_hoi'] );
	return apply_filters( '_s_theme_options_validate', $output, $input );
}
