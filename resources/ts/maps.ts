// @ts-nocheck comment to disable all type checking in a TypeScript file
let map: google.maps.Map, infoWindow: google.maps.InfoWindow;

function initMap(): void {
    const poliwangi = { lat: -8.29384475615435, lng: 114.30690765363136 },
        map = new google.maps.Map(
            document.getElementById("map") as HTMLElement,
            {
                center: poliwangi,
                zoom: 12,
                disableDefaultUI: true,
            }
        );
    infoWindow = new google.maps.InfoWindow();

    const locationButton = document.createElement("button");

    locationButton.textContent = "Pin lokasi anda";
    locationButton.classList.add("maps-btn");

    map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(
        locationButton
    );

    locationButton.addEventListener("click", () => {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position: GeolocationPosition) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };

                    infoWindow.setPosition(pos);
                    infoWindow.setContent("Lokasi Anda");
                    infoWindow.open(map);
                    map.setCenter(pos);
                    map.setZoom(15);
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

    for (let dataKos in kos){
        createMarker(map, kos[dataKos]);
    }

    // console.log(kos);
    // console.log(coordinate);
}

function handleClick (e: any){
    console.log(e);
}

function createMarker(
    map: google.maps.Map,
    data: any,
): void {
    const image =
        "https://firebasestorage.googleapis.com/v0/b/firestore-33f9a.appspot.com/o/house-icon%20(1).png?alt=media&token=412e3e10-8d20-4bdb-97c3-a4854cbb699c";

    const marker = new google.maps.Marker({
        position: { lat: data.coordinate.latitude , lng: data.coordinate.longitude },
        map: map,
        icon: image,
    });
    const infowindow = new google.maps.InfoWindow({
        content: data.template,
    });
    google.maps.event.addListener(marker, "click", () => {
        infowindow.open(map, marker);
    });
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
window.handleClick = handleClick;
export {};
