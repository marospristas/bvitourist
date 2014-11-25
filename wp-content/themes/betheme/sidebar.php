<?php
/**
 * The Page Sidebar containing the widget area.
 *
 * @package Betheme
 * @author Muffin group
 * @link http://muffingroup.com
 */

$sidebars = mfn_opts_get( 'sidebars' );


// sidebar 1 --------------------------------------------------------
if( get_post_type() == 'page' && mfn_opts_get('single-page-sidebar') ){
	// Theme Options | Page
	$sidebar = trim( mfn_opts_get('single-page-sidebar') );
} elseif( get_post_type() == 'post' && is_single() && mfn_opts_get('single-sidebar') ){
	// Theme Options | Single Post
	$sidebar = trim( mfn_opts_get('single-sidebar') );
} else {
	// Post Meta
	$sidebar = get_post_meta( mfn_ID(), 'mfn-post-sidebar', true);
	if( $sidebar || $sidebar === '0' ) $sidebar = $sidebars[$sidebar];
}

if( $_GET && key_exists('mfn-s', $_GET) ) $sidebar = $_GET['mfn-s']; // demo


// sidebar 2 --------------------------------------------------------
$sidebar2 = get_post_meta( mfn_ID(), 'mfn-post-sidebar2', true);
if( $sidebar2 || $sidebar2 === '0' ) $sidebar2 = $sidebars[$sidebar2];

if( $_GET && key_exists('mfn-s2', $_GET) ) $sidebar2 = $_GET['mfn-s2']; // demo


// echo -------------------------------------------------------------
if( mfn_sidebar_classes() ){
	
	echo '<div class="sidebar sidebar-1 four columns">';
		echo '<div class="widget-area clearfix '. mfn_opts_get('sidebar-lines') .'">';
			if ( ! dynamic_sidebar( $sidebar ) ) mfn_nosidebar();
		echo '</div>';
	echo '</div>';
	
	// both sidebars
	if( mfn_sidebar_classes( true ) ){
		echo '<div class="sidebar sidebar-2 four columns">';
			echo '<div class="widget-area clearfix '. mfn_opts_get('sidebar-lines') .'">';
				if ( ! dynamic_sidebar( $sidebar2 ) ) mfn_nosidebar();
			echo '</div>';
		echo '</div>';
	}	
}

?>