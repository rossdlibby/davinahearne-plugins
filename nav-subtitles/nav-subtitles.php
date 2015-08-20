<?php
/*
Plugin Name: Nav Subtitles
Plugin URL: https://github.com/rossdlibby/nav-subtitles
Description: A plugin to add subtitles to menu items
Version: 1.0
Author: Ross Libby
Author URI: http://rossdl.com
*/

class nav_subtitles {

	function __construct()
	{
		add_filter('wp_setup_nav_menu_item', [$this, 'ns_add_custom_subtitle']);
		add_action('wp_update_nav_menu_item', [$this, 'ns_update_custom_subtitle'], 10, 3);
		add_action('wp_edit_nav_menu_walker', [$this, 'ns_edit_walker'], 10, 2);
	}

	/**
	 * Enable custom subtitles
	 */
	function ns_add_custom_subtitle($menu_item)
	{
		$menu_item->subtitle = get_post_meta($menu_item->id, '_menu_item_subtitle', true);
		return $menu_item;
	}

	/**
	 * Save custom subtitles
	 */
	function ns_update_custom_subtitle($menu_id, $menu_item_db_id, $args)
	{
		if(is_array($_REQUEST['menu-item-subtitle']))
		{
			$subtitle_value = $_REQUEST['menu-item-subtitle'][$menu_item_db_id];
			update_post_meta($menu_item_db_id, '_menu_item_subtitle', $subtitle_value);
		}
	}

	/**
	 * Utilize Walker
	 */
	function ns_edit_walker($walker, $menu_id)
	{
		return 'Walker_Custom_Subtitle';
	}
}

include 'edit_custom_walker.php';
include 'custom_walker.php';