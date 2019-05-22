<?php
require_once('../package.php');

// Prepare the map
// See https://developers.google.com/maps/documentation/maps-static/get-api-key
$map = new Static_Map( "AIzaSequerraKeyOfSomeSortSeeDocumentation" );

// Set the location of the center of the map and the zoom level view
$map->set_center( 14.168986 , 121.255112 );
$map->set_zoom(17);

// Generate the URL
echo $map;
?>