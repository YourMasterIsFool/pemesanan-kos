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

var map, infoWindow;

function initMap() {
  var poliwangi = {
    lat: -8.29384475615435,
    lng: 114.30690765363136
  },
      map = new google.maps.Map(document.getElementById("map"), {
    center: poliwangi,
    zoom: 12,
    disableDefaultUI: true
  });
  infoWindow = new google.maps.InfoWindow();
  var locationButton = document.createElement("button");
  locationButton.textContent = "Pin lokasi anda";
  locationButton.classList.add("maps-btn");
  map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(locationButton);
  locationButton.addEventListener("click", function () {
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function (position) {
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        infoWindow.setPosition(pos);
        infoWindow.setContent("Lokasi Anda");
        infoWindow.open(map);
        map.setCenter(pos);
        map.setZoom(15);
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

function handleClick(e) {
  console.log(e);
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
  var infowindow = new google.maps.InfoWindow({
    content: data.template
  });
  google.maps.event.addListener(marker, "click", function () {
    infowindow.open(map, marker);
  });
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ? "Error: The Geolocation service failed." : "Error: Your browser doesn't support geolocation.");
  infoWindow.open(map);
}

window.initMap = initMap;
window.handleClick = handleClick;
})();

/******/ })()
;