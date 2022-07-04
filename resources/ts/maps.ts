// @ts-nocheck comment to disable all type checking in a TypeScript file
let map: google.maps.Map,
    infoWindow: google.maps.InfoWindow,
    geocoder: google.maps.Geocoder;

function initMap(): void {
    // init and pin center map
    const poliwangi = { lat: -8.29384475615435, lng: 114.30690765363136 };
    const mapDiv = document.getElementById("map") as HTMLElement;
    const map = new google.maps.Map(mapDiv, {
        center: poliwangi,
        zoom: 12,
        zoomControl: false,
        scaleControl: true,
    });
    infoWindow = new google.maps.InfoWindow();
    geocoder = new google.maps.Geocoder();

    // Add Pin Current Location Button
    const locationButton = document.createElement("button");

    locationButton.textContent = "Pin lokasi anda";
    locationButton.classList.add("maps-btn");

    map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(
        locationButton
    );

    // Listener
    google.maps.event.addDomListener(mapDiv, "click", () => {
        infoWindow.close();
    });

    locationButton.addEventListener("click", () => {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position: GeolocationPosition) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };

                    geocoder
                        .geocode({ location: pos })
                        .then((response) => {
                            if (response.results[0]) {
                                infoWindow.setPosition(pos);
                                infoWindow.setContent(response.results[0].formatted_address);
                                infoWindow.open(map);
                                map.setCenter(pos);
                                map.setZoom(15);
                            } else {
                                window.alert("No results found");
                            }
                        })
                        .catch((e) =>
                            window.alert("Geocoder failed due to: " + e)
                        );

                    // infoWindow.setPosition(pos);
                    // infoWindow.setContent("Lokasi Anda");
                    // infoWindow.open(map);
                    // map.setCenter(pos);
                    // map.setZoom(15);
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter()!);
                }
            );
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter()!);
        }
    });

    for (let dataKos in kos) {
        createMarker(map, kos[dataKos]);
    }

    // console.log(kos);
    // console.log(coordinate);
}

function createMarker(map: google.maps.Map, data: any): void {
    const image =
        "https://firebasestorage.googleapis.com/v0/b/firestore-33f9a.appspot.com/o/house-icon%20(1).png?alt=media&token=412e3e10-8d20-4bdb-97c3-a4854cbb699c";

    const marker = new google.maps.Marker({
        position: {
            lat: data.coordinate.latitude,
            lng: data.coordinate.longitude,
        },
        map: map,
        icon: image,
    });
    const markerInfoWindow = new google.maps.InfoWindow({
        content: data.template,
    });

    google.maps.event.addListener(marker, "click", () => {
        markerInfoWindow.open(map, marker);
        map.setZoom(15);
        map.setCenter(marker.getPosition() as google.maps.LatLng);
    });
}

// reverse geocoding
function geocodeLatLng(
    geocoder: google.maps.Geocoder,
    map: google.maps.Map,
    infowindow: google.maps.InfoWindow,
    coordinate: any
) {
    geocoder
        .geocode({ location: latlng })
        .then((response) => {
            if (response.results[0]) {
                map.setZoom(11);

                const marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                });

                infowindow.setContent(response.results[0].formatted_address);
                infowindow.open(map, marker);
            } else {
                window.alert("No results found");
            }
        })
        .catch((e) => window.alert("Geocoder failed due to: " + e));
}

function handleLocationError(
    browserHasGeolocation: boolean,
    infoWindow: google.maps.InfoWindow,
    pos: google.maps.LatLng
) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
        browserHasGeolocation
            ? "Error: The Geolocation service failed."
            : "Error: Your browser doesn't support geolocation."
    );
    infoWindow.open(map);
}

declare global {
    interface Window {
        initMap: () => void;
    }
}
window.initMap = initMap;

export {};
