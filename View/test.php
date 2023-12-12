
<?php
$data = [];
if (($handle = fopen("D:/test1.csv", "r")) !== FALSE) {
    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $data[] = $row;
        //echo $data[7] ;
        
    }
    fclose($handle);
}
?>


<!DOCTYPE >
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="Stylesheet" href="css/bootstrap.css">

<title>Carte Leaflet avec données de latitude et longitude</title>

   






    
    
    <title>Headers � Bootstrap v5.0</title>

    <button onclick="getLocation()">Try It</button>

<p id="demo"></p>




<meta name="theme-color" content="#7952b3">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

<!--<link href="css/headers.css" rel="stylesheet"> -->
</head>
<body>


<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
    

      <a class="navbar-brand" href="servlet?page=acceuil" >Glovo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
           <li class="nav-item ">
            <a class="nav-link <?php if(isset($_GET['page']) && $_GET['page'] == 'add') echo 'active'; ?>" href="test.php">Accuiel</a>
          </li>
           <li class="nav-item ">
        <a class="nav-link <?php if(isset($_GET['page']) && $_GET['page'] == 'list') echo 'active'; ?>" href="list.php">user</a>
          </li>
           
          <li class="nav-item">
            <a class="nav-link disabled" href='#' tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        
        
        <form class="d-flex" method="get" action="search.php">
          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <span>
   
          <a href="User.php" class="nav-link text-white">
            deconnexion
          </a></span>
          
           <a href="Panier.php" class="osh-btn -plain -cart -jewel" data-js-event="non" data-js-element="#cart">
 
       <i class="osh-font-cart"></i>

       <span class="label js-store" data-js-store="fullPageCache.pageData.common.cartOverlay.itemsCount"></span> <span class="sub-label ">Panier</span>   </a></div>

      </div>
    </div>
  </nav>
</header>


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />

    <style>
        #map {
            height: 660px;
            top: 25px;
            
        }
        .popup-content img {
        max-width: 150px; /* Changer la largeur maximale de l'image */
        max-height: 150px; /* Changer la hauteur maximale de l'image */
        height: auto;
    }
    </style>


<div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin="">
    
    </script>

<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
    <script>
       var map = L.map('map').setView([40.7493, -73.9880], 13); // Centrez la carte sur Paris, avec un zoom de 10

        
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // Récupérer la géolocalisation de l'utilisateur
    /*if ('geolocation' in navigator) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var userLat = position.coords.latitude;
            var userLng = position.coords.longitude;

            userPosition = L.latLng(userLat, userLng);

            map.setView([userLat, userLng], 13); // Définir la carte sur la position de l'utilisateur

            // Placez un marqueur pour la position de l'utilisateur
            var userMarker = L.marker([userPosition.lat, userPosition.lng]).addTo(map).bindPopup('ma position actuelle');*

            // Calcul de la distance entre le point de référence et le point actuel
          //marker.bindTooltip('Distance: ' + calculateDistance(userPosition.lat, userPosition.lng, data[i][0], data[i][1]) + ' km');





        });
    } else {
        alert('La géolocalisation n\'est pas disponible sur votre navigateur.');
    }*/
     var customIcon = L.icon({
    iconUrl: '6.png',
    iconSize: [30, 50],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41],
});
    var data = <?php echo json_encode($data); ?>;
    if ('geolocation' in navigator) {
    navigator.geolocation.getCurrentPosition(function(position) {
        var userLat = 40.7493;
        var userLng = -73.9880;

        // ... Votre code précédent ...

        // Tableau pour stocker les distances et les index des points
        var distances = [];

        // Calcul des distances entre votre position et chaque point
        for (var i = 0; i < data.length; i++) {
            var distance = calculateDistance(userLat, userLng, data[i][0], data[i][1]);
            distances.push({ index: i, distance: distance });
        }

        // Tri des distances pour obtenir les 10 points les plus proches
        distances.sort(function(a, b) {
            return a.distance - b.distance;
        });

        // Affichage des marqueurs pour les 10 points les plus proches avec une couleur différente
        for (var j = 0; j < Math.min(10, distances.length); j++) {
            var index = distances[j].index;
            var lat = data[index][0];
            var lon = data[index][1];
            var price = data[index][3];
            var sev = data[index][5];

            var marker = L.marker([lat, lon], { icon: customIcon }).bindPopup(data[index][0], data[index][1]).addTo(map);
            marker.bindPopup('<div class="popup-content"><h3>Infos sur le point</h3><p>Latitude: ' + lat + '</p><p>Longitude: ' + lon + '</p><p>Service: ' + sev+ '</p><p>Price: ' + price+ '</p><p>Resuarant: ' + res+ '</p><img src="image.jpg" alt="Image"/> <form method="post" action="panier.php"><input type="submit" value="reserver" class="btn btn-warning"></form></div>');
            // Utilisez une autre icône (customIcon) pour distinguer ces marqueurs
            // ...
           /* var customIcon = L.icon({
    iconUrl: '5.png', // Spécifiez le chemin de votre image pour l'icône
    iconSize: [38, 38], // Taille de l'icône
    iconAnchor: [22, 94], // Point d'ancrage de l'icône
    popupAnchor: [-3, -76] // Point d'ancrage du popup
});*/

            // Bind tooltip avec la distance
            marker.bindTooltip('Distance: ' + distances[j].distance + ' km');

            (function (lat, lon) {
            marker.on('click', function(e) {
                var clickedPoint = e.latlng;
                var route = L.Routing.control({
                    waypoints: [
                        L.latLng(40.7493, -73.9880),
                        clickedPoint
                    ],
                    routeWhileDragging: true
                }).addTo(map);
            });
        })(lat, lon);
        }
    });
} else {
    alert('La géolocalisation n\'est pas disponible sur votre navigateur.');
}

    // Vos données de latitude et longitude depuis PHP
    

    // Parcours des données pour placer des marqueurs sur la carte
    for (var i = 0; i < data.length; i++) {
       var lat = data[i][0]
       var lon = data[i][1]
       var res = data[i][2]
      
        var marker = L.marker([lat, lon]).bindPopup(data[i][0], data[i][1]).addTo(map);
        marker.bindPopup('<div class="popup-content"><h3>Infos sur le point</h3><p>Latitude: ' + lat + '</p><p>Longitude: ' + lon + '</p><p>Resuarant: ' + res+ '</p><img src="image.jpg" alt="Image"/></div>');
        //print(data[i][0])
        // Ajoutez une couche de tuiles OpenStreetMap à la carte
    


        // Calcul de la distance entre le point de référence et le point actuel
        marker.bindTooltip('Distance: ' + calculateDistance(40.7493, -73.9880, data[i][0], data[i][1]) + ' km');


        (function (lat, lon) {
            marker.on('click', function(e) {
                var clickedPoint = e.latlng;
                var route = L.Routing.control({
                    waypoints: [
                        L.latLng(40.7493, -73.9880),
                        clickedPoint
                    ],
                    routeWhileDragging: true
                }).addTo(map);
            });
        })(lat, lon);
    }
    var redIcon = L.icon({
    iconUrl: '5.png',
    iconSize: [40, 60],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41],
});

// Créez un marqueur avec l'icône rouge à la position spécifiée
var marker = L.marker([40.7493, -73.9880], { icon: redIcon }).addTo(map);

    var circle = L.circle([40.7493, -73.9880], {
    color: 'red',
    fillColor: '#ed42424b',
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