<?php
require_once('../package.php');

// Prepare the map
// See https://developers.google.com/maps/documentation/maps-static/get-api-key
$map = new Static_Map( "AIzaSequerraKeyOfSomeSortSeeDocumentation" );

// Prepare the marker
$marker = new Marker( 14.168986 , 121.255112 );

// Plot the marker to the map
$map->add_marker( $marker );

// Generate the URL
echo $map;
?>