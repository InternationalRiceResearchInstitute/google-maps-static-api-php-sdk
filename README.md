# Google Maps Static API

PHP-SDK

## Getting started

Below are the most basic example you can play with.

### Marker example
```php
<?php
require_once('/path/to/package.php');

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
```

### Multiple markers example
```php
<?php
require_once('/path/to/package.php');

// Prepare the map
// See https://developers.google.com/maps/documentation/maps-static/get-api-key
$map = new Static_Map( "AIzaSequerraKeyOfSomeSortSeeDocumentation" );

// Prepare the markers
$west_roundabout = new Marker( 14.168986 , 121.255112 );
$east_roundabout = new Marker( 14.169831 , 121.258285 );

// Plot the markers to the map
$map->add_marker( $west_roundabout );
$map->add_marker( $east_roundabout );

// Generate the URL
echo $map;
?>
```