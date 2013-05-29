<?php


class GB_Merchant_Locations_Addon {

	public static function init() {
		require_once 'GB_Query.php';
		GB_Query::init();
		require_once 'GB_Taxonomy.php';
		GB_Taxonomy::init();
	}

	public static function gb_addon( $addons ) {
		$addons['merchant_locations'] = array(
			'label' => gb__( 'Merchant Locations' ),
			'description' => gb__( 'Merchant location selection and filtering.' ),
			'files' => array(),
			'callbacks' => array(
				array( __CLASS__, 'init' ),
			)
		);
		return $addons;
	}
}
