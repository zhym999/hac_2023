

<?php
//$data = [];
if (($handle = fopen("D:/test1.csv", "r")) !== FALSE) {
    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $data[] = $row;
        //echo $data[40][8] ;
    }
    fclose($handle);
}
// Vérification avant d'accéder à l'élément 40 du tableau $data

?>
<link data-react-helmet="true" rel="icon" type="image/png" href="https://static.deepl.com/img/favicon/favicon_32.png" sizes="32x32">

<!DOCTYPE html>
<html>
<head>
    <title>Carte Leaflet avec données de latitude et longitude</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />

    <style>
        #map {
            height: 500px;
        }
    </style>
</head>
<body>
<div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin="">
    
    </script>

<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
    <script>
       var map = L.map('map').setView([48.866667, 2.333333], 13); // Centrez la carte sur Paris, avec un zoom de 10

        // Ajoutez une couche de tuiles OpenStreetMap à la carte
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // Vos données de latitude et longitude depuis PHP
    var data = <?php echo json_encode($data);?> ;

    // Parcours des données pour placer des marqueurs sur la carte
    for (var i = 0; i < data.length; i++) {
       var lat = data[i][0]
       var lon = data[i][1]
        var marker = L.marker([lat, lon]).bindPopup(data[i][0], data[i][1]).addTo(map);
        marker.bindPopup('<div class="popup-content"><h3>Infos sur le point</h3><p>Latitude: ' + lat + '</p><p>Longitude: ' + lon + '</p><img src="image.jpg" alt="Image"/></div>');
        //print(data[i][0])

        // Calcul de la distance entre le point de référence et le point actuel
        marker.bindTooltip('Distance: ' + calculateDistance(48.866667, 2.333333, data[i][0], data[i][1]) + ' km');


        (function (lat, lon) {
            marker.on('click', function(e) {
                var clickedPoint = e.latlng;
                var route = L.Routing.control({
                    waypoints: [
                        L.latLng(48.866667, 2.333333),
                        clickedPoint
                    ],
                    routeWhileDragging: true
                }).addTo(map);
            });
        })(lat, lon);
    }
    var marker = L.marker([48.866667, 2.333333]).addTo(map)

    var circle = L.circle([48.866667, 2.363333], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 500
    }).addTo(map);

    

    

var osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap contributors, Tiles style by Humanitarian OpenStreetMap Team hosted by OpenStreetMap France'});



    function calculateDistance(lat1, lon1, lat2, lon2) {
        var R = 6371; // Rayon de la Terre en kilomètres
        var dLat = (lat2 - lat1) * (Math.PI / 180);
        var dLon = (lon2 - lon1) * (Math.PI / 180);
        var a =
            Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(lat1 * (Math.PI / 180)) * Math.cos(lat2 * (Math.PI / 180)) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);

        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var distance = R * c;
        return distance.toFixed(2); // Retourne la distance arrondie à deux décimales
    }


 
</script>
</body>
</html>


