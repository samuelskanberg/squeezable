window.onload = function() {
    console.log("fooo");
    
    // Get Drupal variables
    var iconPath = Drupal.settings.squeezable.iconPath;
    var mapCenterLat = Drupal.settings.squeezable.mapCenterLat;
    var mapCenterLong = Drupal.settings.squeezable.mapCenterLong;
    var mapZoomLevel = Drupal.settings.squeezable.mapZoomLevel;
    var streetAddress = Drupal.settings.squeezable.streetAddress;

    //var mapCenterPos = [59.4, 17.5];
    var mapCenterPos = [mapCenterLat, mapCenterLong];

    var map = L.map('map').setView(mapCenterPos, mapZoomLevel); 

    var customIcon = L.icon({
        iconUrl: iconPath,
        iconSize:     [25, 41], 
        iconAnchor:   [23, 58], 
        popupAnchor:  [0, -60] 
    });

    // add an OpenStreetMap tile layer
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker(mapCenterPos, {icon: customIcon}).addTo(map)
        .bindPopup(streetAddress);

};
