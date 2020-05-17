<?php
/**
 * Admin View: Product import form
 *
 * @since 1.0.0
 *
 * @package GSWOO
 * @subpackage GSWOO/views
 */

defined( 'ABSPATH' ) || exit;
?>

<h3><?php esc_html_e( 'Banner Title', 'test' ); ?></h3>
<input id="test_banner_title" required name="test_plugin_options[test_banner_title]" size="40" type="text" value="<?php echo esc_html( $test_banner_title ); ?>">

<h3><?php esc_html_e( 'Banner Text', 'test' ); ?></h3>
<textarea id="test_banner_text" required name="test_plugin_options[test_banner_text]" rows="14" cols="50" value="<?php echo esc_html( $test_banner_text ); ?>"><?php echo esc_html( $test_banner_text ); ?></textarea>

<h3><?php esc_html_e( 'Banner Display Area', 'test' ); ?></h3>
<?php
$display_area_list = array(
	'header' => 'Heder',
	'footer' => 'Footer',
)
?>
<select id="test_banner_display_arrea" name="test_plugin_options[test_banner_display_arrea]">
	<?php
	foreach ( $display_area_list as $display_area_slug => $display_area_name ) {
		$selected = '';
		if ( ! empty( 'test_banner_display_arrea' ) && $test_banner_display_arrea === $display_area_slug ) {
			$selected = 'selected';
		}
		?>
		<option value="<?php echo esc_html( $display_area_slug ); ?>" <?php echo esc_html( $selected ); ?>>
			<?php
			echo esc_html( $display_area_name );
			?>
		</option>
		<?php
	}
	?>
</select>

<h3><?php esc_html_e( 'Banner Title Size', 'test' ); ?></h3>
<input id="test_banner_css_title_size" type="number" required name="test_plugin_options[test_banner_css_title_size]" value="<?php echo esc_html( $test_banner_css_title_size ); ?>">

<h3><?php esc_html_e( 'Banner Text Size', 'test' ); ?></h3>
<input id="test_banner_css_text_size" type="number" required name="test_plugin_options[test_banner_css_text_size]" value="<?php echo esc_html( $test_banner_css_text_size ); ?>">


<br>
<br>
<input name="Submit" type="submit" value="<?php esc_attr_e( 'Save Changes' ); ?>" />
