<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       exemple.com
 * @since      1.0.0
 *
 * @package    Test
 * @subpackage Test/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="test-banner-wrapper">
	<?php
	if ( ! empty( $this->banner_options['test_banner_title'] ) ) {
		$css = '';
		if ( ! empty( $this->banner_options['test_banner_css_title_size'] ) ) {
			$css = 'style=" font-size: ' . $this->banner_options['test_banner_css_title_size'] . 'px;"';
		}
		?>
		<h1 class="test-banner-title" <?php echo $css ?>>
			<?php echo $this->banner_options['test_banner_title']; ?>
		</h1>
		<?php
	}
	if ( ! empty( $this->banner_options['test_banner_text'] ) ) {
		$css = '';
		if ( ! empty( $this->banner_options['test_banner_css_text_size'] ) ) {
			$css = 'style=" font-size: ' . $this->banner_options['test_banner_css_text_size'] . 'px;"';
		}
		?>
		<div <?php echo $css ?>>
			<?php echo $this->banner_options['test_banner_text']; ?>
		</div>
		<?php
	}
	?>
</div>