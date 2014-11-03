/**
 * mapping.js
 *
 * Handles The main header map.
 */
function initialize() {
var mapOptions = {
	center: new google.maps.LatLng(28.7831, -36.0938),
	zoom: 3,
	disableDefaultUI: true,
	styles: [
		{
			"featureType": "landscape",
			"stylers": [
				{
					"saturation": -100
				},
				{
					"lightness": 65
				},
				{
					"visibility": "off"
				}
			]
		},
		{
			"featureType": "poi",
			"stylers": [
				{
					"saturation": -100
				},
				{
					"lightness": 51
				},
				{
					"visibility": "simplified"
				}
			]
		},
		{
			"featureType": "road.highway",
			"stylers": [
				{
					"saturation": -100
				},
				{
					"visibility": "simplified"
				}
			]
		},
		{
			"featureType": "road.arterial",
			"stylers": [
				{
					"saturation": -100
				},
				{
					"lightness": 30
				},
				{
					"visibility": "off"
				}
			]
		},
		{
			"featureType": "road.local",
			"stylers": [
				{
					"saturation": -100
				},
				{
					"lightness": 40
				},
				{
					"visibility": "off"
				}
			]
		},
		{
			"featureType": "transit",
			"stylers": [
				{
					"saturation": -100
				},
				{
					"visibility": "simplified"
				}
			]
		},
		{
			"featureType": "administrative.province",
			"stylers": [
				{
					"visibility": "off"
				}
			]
		},
		{
			featureType: "administrative.country",
			elementType: "labels",
			stylers: [
				{ visibility: "off" }
			]
		},
		{
			"featureType": "water",
			"elementType": "labels",
			"stylers": [
				{
					"visibility": "off"
				},
				{
					"lightness": -25
				},
				{
					"saturation": -100
				}
			]
		},
		{
			"featureType": "water",
			"elementType": "geometry",
			"stylers": [
				{
					"hue": "#ffff00"
				},
				{
					"lightness": -25
				},
				{
					"saturation": -97
				}
			]
		}
	]

};

var map = new google.maps.Map(document.getElementById("map-canvas"),
	mapOptions);
}


google.maps.event.addDomListener(window, 'load', initialize);