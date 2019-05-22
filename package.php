<?php

class Static_Map{

	# Location Parameters
	private $center;	// required if markers not present
	private $zoom;		// required if markers not present

	# Map Parameters
	private $size;		// required
	private $scale;		// optional
	private $format;	// optional
	private $map_type;	// optional
	private $language;	// optional
	private $region;	// optional

	# Feature Parameters
	private $markers;	// optional
	private $path;		// optional
	private $visible;	// optional
	private $style;		// optional

	# Key and Signature Parameters
	private $key;		// required
	private $signature;	// recommended

	public function __construct($key){
		$this->key = $key;
		$this->size = '240x240';

		$this->markers = array();
	}

	public function add_marker($marker){
		if( get_class($marker) === 'Marker' ){
			$this->markers[] = $marker;
		}
	}

	public function set_size($size){
		$this->size = $size;
	}

	public function __toString(){
		$markers = "";

		foreach($this->markers as $i => $marker){
			$markers = $markers . 'markers=' . $marker->get_location();
			if($i<count($this->markers)-1){
				$markers = $markers . "&";
			}
		}

		return 'https://maps.googleapis.com/maps/api/staticmap?' . $markers . '&size=' . $this->size . '&key=' . $this->key;
	}
}

class Marker{
	# Marker Locations
	private $latitude;	// required if address not present
	private $longitude;	// required if address not present
	private $address;	// required if latitude and latitude not present

	# Marker Styles
	private $size;		// optional
	private $color;		// optional
	private $label;		// optional

	public function __construct($latitude,$longitude){
		$this->latitude = $latitude;
		$this->longitude = $longitude;
	}

	public function get_location(){
		return $this->latitude . ',' . $this->longitude;
	}

}