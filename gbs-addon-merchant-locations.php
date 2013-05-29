<?php
/*
Plugin Name: Merchant Locations
Version: 1
Plugin URI: http://groupbuyingsite.com/marketplace
Description: Merchant location filtering
Plugin URI: http://groupbuyingsite.com/marketplace/
Author: Sprout Venture
Author URI: http://sproutventure.com/
Plugin Author: Dan Cameron
Plugin Author URI: http://sproutventure.com/
Contributors: Dan Cameron
Text Domain: group-buying
*/

// Load after all other plugins since we need to be compatible with groupbuyingsite
add_action( 'plugins_loaded', 'gb_load_merchant_localization' );
function gb_load_merchant_localization() {
	$gbs_min_version = '4.3';
	if ( class_exists( 'Group_Buying_Controller' ) && version_compare( Group_Buying::GB_VERSION, $gbs_min_version, '>=' ) ) {
		require_once 'classes/GB_Merchant_Locations_Addon.php';

		// Hook this plugin into the GBS add-ons controller
		add_filter( 'gb_addons', array( 'GB_Merchant_Locations_Addon', 'gb_addon' ), 10, 1 );
	}
}