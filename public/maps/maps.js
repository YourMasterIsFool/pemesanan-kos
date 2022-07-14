/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it uses a non-standard name for the exports (exports).
(() => {
var exports = __webpack_exports__;
/*!******************************!*\
  !*** ./resources/ts/maps.ts ***!
  \******************************/


exports.__esModule = true; // @ts-nocheck comment to disable all type checking in a TypeScript file

var map, infoWindow, geocoder;

function initMap() {
  // init and pin center map
  var poliwangi = {
    lat: -8.29384475615435,
    lng: 114.30690765363136
  };
  var mapDiv = document.getElementById("map");
  var map = new google.maps.Map(mapDiv, {
    center: poliwangi,
    zoom: 10,
    zoomControl: false,
    scaleControl: true
  });
  infoWindow = new google.maps.InfoWindow();
  geocoder = new google.maps.Geocoder(); // Add Pin Current Location Button

  var locationButton = document.createElement("button");
  locationButton.textContent = "Pin lokasi anda";
  locationButton.classList.add("maps-btn");
  map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(locationButton); // Configure the click listener.

  map.addListener("click", function (mapsMouseEvent) {
    // Close the current InfoWindow.
    infoWindow.close();
  }); // // Listener
  // google.maps.event.addDomListener(mapDiv, "click", () => {
  //     infoWindow.close();
  // });

  locationButton.addEventListener("click", function () {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function (position) {
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        }; // reverse geocoding

        geocoder.geocode({
          location: pos
        }).then(function (response) {
          if (response.results[0]) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(response.results[0].formatted_address);
            infoWindow.open(map);
            map.setCenter(pos);
            map.setZoom(17);
          } else {
            window.alert("No results found");
          }
        })["catch"](function (e) {
          return window.alert("Geocoder failed due to: " + e);
        });
      }, function () {
        handleLocationError(true, infoWindow, map.getCenter());
      });
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  });

  for (var dataKos in kos) {
    createMarker(map, kos[dataKos]);
  } // console.log(kos);
  // console.log(coordinate);

}

function createMarker(map, data) {
  var image = "https://firebasestorage.googleapis.com/v0/b/firestore-33f9a.appspot.com/o/house-icon%20(1).png?alt=media&token=412e3e10-8d20-4bdb-97c3-a4854cbb699c";
  var marker = new google.maps.Marker({
    position: {
      lat: data.coordinate.latitude,
      lng: data.coordinate.longitude
    },
    map: map,
    icon: image
  });
  var markerInfoWindow = new google.maps.InfoWindow({
    content: data.template
  });
  google.maps.event.addListener(marker, "click", function () {
    markerInfoWindow.open(map, marker);
    map.setZoom(15);
    map.setCenter(marker.getPosition());
  });
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ? "Error: The Geolocation service failed." : "Error: Your browser doesn't support geolocation.");
  infoWindow.open(map);
}

window.initMap = initMap;
})();

/******/ })()
;