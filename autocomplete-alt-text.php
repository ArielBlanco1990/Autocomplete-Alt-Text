<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://freelance.me
 * @since             1.0.0
 * @package           Autocomplete_Alt_Text
 *
 * @wordpress-plugin
 * Plugin Name:       Autocomplete Alt Text
 * Plugin URI:        https://github.com/ArielBlanco1990/Autocomplete-Alt-Text
 * Description:       Plugin para WordPress con función de autocompletar los textos alternativos cuando se importan las imágenes
 * Version:           1.0.0
 * Author:            Ariel Blanco
 * Author URI:        https://freelance.me/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       autocomplete-alt-text
 * Domain Path:       /languages
 */

function autocomplete_alt_text($attachment_id) {
	$mime_type = get_post_mime_type($attachment_id);
	if (strpos($mime_type, 'image') !== false) {
		$image_title = get_the_title($attachment_id);
		update_post_meta($attachment_id, '_wp_attachment_image_alt', $image_title);
	}
}
add_action('add_attachment', 'autocomplete_alt_text');