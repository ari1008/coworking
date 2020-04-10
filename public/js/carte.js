function doAjax() {
    let request = new XMLHttpRequest();
    let c = '1i1';
    request.open('GET', '/coworking/Database/carte/iconmulti.php');
    request.onreadystatechange = function() {
        if(request.readyState == 4) {
            var res = request.responseText;
            console.log(res);
            window.onload = function() {
                L.mapquest.key = '';
                // Geocode three locations, then call the createMap callback
                L.mapquest.geocoding().geocode(res, createMap);

                function createMap(error, response) {
                    // Initialize the Map
                    var map = L.mapquest.map('map', {
                        layers: L.mapquest.tileLayer('map'),
                        center: [0, 0],
                        zoom: 12
                    });

                    // Generate the feature group containing markers from the geocoded locations
                    var featureGroup = generateMarkersFeatureGroup(response);

                    // Add markers to the map and zoom to the features
                    featureGroup.addTo(map);
                    map.fitBounds(featureGroup.getBounds());
                }

                function generateMarkersFeatureGroup(response) {
                    var group = [];
                    for (var i = 0; i < response.results.length; i++) {
                        var location = response.results[i].locations[0];
                        var locationLatLng = location.latLng;

                        // Create a marker for each location
                        var marker = L.marker(locationLatLng, {icon: L.mapquest.icons.marker()})
                            .bindPopup(location.adminArea5 + ', ' + location.adminArea3);

                        group.push(marker);
                    }
                    return L.featureGroup(group);
                }
            }

        }
    };
    request.send();
}

