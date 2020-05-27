<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Webmag
 */

if ( ! is_active_sidebar( 'sidebar-post' ) ) {
	return;
}

dynamic_sidebar( 'sidebar-post' );
