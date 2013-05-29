<?php

class GB_Taxonomy extends Group_Buying_Controller {

	public static function init() {
		add_filter( 'gb_register_taxonomy_post_types-'.Group_Buying_Deal::LOCATION_TAXONOMY, array( __CLASS__, 'add_merchant_post_type' ), 10, 3 );
	}

	public function add_merchant_post_type( $post_types, $args, $data ) {
		$post_types[] = Group_Buying_Merchant::POST_TYPE;
		return $post_types;
	}
}