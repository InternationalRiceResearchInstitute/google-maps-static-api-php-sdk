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
		$this->size = '240x240';		// we will set this as the default size

		$this->center = '';				// default
		$this->zoom = '';				// default
		$this->map_type = 'roadmap';	// default
		$this->markers = array();		// default
	}

	public function set_center($latitude_or_address,$longitude=-181){
		if( 0 <= floatval($latitude_or_address) && floatval($latitude_or_address) <= 90 && 0 <= floatval($longitude) && floatval($longitude) <= 180 ){
			$this->center = $latitude_or_address . ',' . $longitude;
		} elseif( $longitude==-181 ){
			$this->center = $latitude_or_address;
		} else {
			$this->center = '';
		}
	}

	public function set_zoom($zoom){
		$this->zoom = $zoom;
	}


	public function add_marker($marker){
		if( get_class($marker) === 'Marker' ){
			$this->markers[] = $marker;
		}
	}

	public function set_size($size){
		$this->size = $size;
	}

	public function set_map_type($map_type){
		if( in_array( $map_type , array( 'roadmap' , 'satellite' , 'terrain' , 'hybrid' ) ) ){
			$this->map_type = $map_type;
		}
	}


	public function __toString(){
		$markers = "";
		foreach($this->markers as $i => $marker){
			$markers = $markers . 'markers=' . $marker->get_location();
			if($i<count($this->markers)-1){
				$markers = $markers . "&";
			}
		}

		$size = '&size=' . $this->size;

		if( $this->map_type !== 'roadmap' ){
			$map_type = '&maptype=' . $this->map_type;
		} else {
			$map_type = '';
		}

		if( !empty($this->center) ){
			$center = '&center=' . $this->center;
		} else {
			$center = '';
		}

		if( !empty($this->zoom) ){
			$zoom = '&zoom=' . $this->zoom;
		} else {
			$zoom = '';
		}

		$key = '&key=' . $this->key;

		return 'https://maps.googleapis.com/maps/api/staticmap?' . $center . $zoom . $markers . $size . $map_type . $key;
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