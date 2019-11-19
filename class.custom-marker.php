<?php

namespace WPGMZA;

class CustomMarker extends ProMarker
{
	public function __construct($id_or_fields=-1, $read_mode=Crud::SINGLE_READ, $raw_data=false)
	{
		ProMarker::__construct($id_or_fields, $read_mode, $raw_data);
	}
	
	public function jsonSerialize()
	{
		$json = ProMarker::jsonSerialize();
		
		// The map edit page will request raw data. This check is required so that the map edit pages marker panel will not load your overridden description
		if(!$this->useRawData)
		{
			$json['description'] = "My Custom Description";
		}
		
		return $json;
	}
}

// Remove WP Google Maps - Pro add-ons built in filter
remove_all_filters('wpgmza_create_WPGMZA\\Marker');

// Now add our own filter
add_filter('wpgmza_create_WPGMZA\\Marker', function($id_or_fields=-1, $read_mode=Crud::SINGLE_READ, $raw_data=false) {
	
	return new CustomMarker($id_or_fields, $read_mode, $raw_data);
	
}, 10, 3);