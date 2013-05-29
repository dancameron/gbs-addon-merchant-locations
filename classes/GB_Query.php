<?php

class GB_Query extends Group_Buying_Controller {

	public static function init() {
		add_action( 'pre_get_posts', array( __CLASS__, 'remove_merchants_from_location_taxonomy' ), 10, 1 );
		add_action( 'pre_get_posts', array( __CLASS__, 'filter_merchants_based_on_location' ), 10, 1 );
	}

	public static function remove_merchants_from_location_taxonomy( $query ) {
		if ( $query->is_tax( Group_Buying_Deal::LOCATION_TAXONOMY ) ) {
			$query->query_vars['post_type'] = Group_Buying_Deal::POST_TYPE;
		}
	}

	public static function filter_merchants_based_on_location( $query ) {
		if ( !function_exists('gb_has_location_preference') || !gb_has_location_preference() )
			return;

		if ( $query->is_post_type_archive( Group_Buying_Merchant::POST_TYPE ) ) {
			$query->query_vars['gb_location'] = gb_get_preferred_location();
		}
	}
}
