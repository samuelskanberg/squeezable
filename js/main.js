window.onload = function() {
    console.log("fooo");
    
    var iconPath = Drupal.settings.squeezable.iconPath;
    console.log(iconPath);

    var mapCenterPos = [59.4, 17.5];
    var stockholmOfficePos = [59.335004, 18.069700];

    var map = L.map('map').setView(mapCenterPos, 6);

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

    L.marker(stockholmOfficePos, {icon: customIcon}).addTo(map)
        .bindPopup('A pretty CSS3 popup. <br> Easily customizable.');

};
