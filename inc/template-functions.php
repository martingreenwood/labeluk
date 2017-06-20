<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package labeluk
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function labeluk_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'labeluk_body_classes' );

/**
 * Adds custom options page
 *
 * @return page
 */
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
	'page_title' 	=> 'Theme Options',
	'menu_title' 	=> 'Theme Options',
	'menu_slug' 	=> 'theme-options-page',
	'capability' 	=> 'edit_posts',
	'redirect' 		=> false,
	));

}

/**
 * Adds custom date format
 *
 * @return page
 */
function custom_dates($date) {
	//return = '';
	$date = strtotime($date);
	$diff = time() - $date;

	if ($diff < 86400) {
		if ($diff < 3600) { // Output e.g. 35 minutes ago
			$return = $mins = floor($diff / 60);
			$return .= ' minute';
			if ($mins > 1 || $mins === 0) $return .= 's';
			$return .= ' ago';
		}
		else { // Output e.g. 5 hours ago
			$return = $hours = floor($diff / 3600);
			$return .= ' hour';
			if ($hours > 1 || $hours === 0) $return .= 's';
			$return .= ' ago';
		}
	}
	else { // Output e.g. 1 Dec
		$return = date('j M', $date);
	}

	return $return;
}