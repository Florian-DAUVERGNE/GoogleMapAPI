<?php
$email = $_GET['email'];
echo json_encode($email);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="utf-8">
<!--Elément Google Maps indiquant que la carte doit être affiché en plein écran et qu'elle ne peut pas être redimensionnée par l'utilisateur-->
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>formulaire</title>


<!-- Une feuille de style éventuel -->

</head>

<body>

<div  class="text-danger visible" id="carte" style="width:800px; height:800px"></div>

<!--Inclusion de l'API Google MAPS-->

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7Y32T_PJHZxYcK3BJYJFNwSl6cuvLXpo"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script>
var e=1
if(e==1)
var oui="./assets/Json/markersJrostand2.json";
else
var oui="./assets/Json/markersJrostand.json";
		$.ajax({
					url: oui,
					method: "GET",
					dataType: "json",
					success: function(CDs){

					for(let i=0;i<=CDs.length;i++)
					{
					for(key in CDs[i])
					
					console.log(CDs[i].lat+"/"+CDs[i].lng);
					
					console.log("-----------");
					
					var coordonnées=CDs
					// Les coordonnées

var latlng = new google.maps.LatLng(coordonnées[1].lat,coordonnées[1].lng);
//
var coordonnées1=new google.maps.LatLng(coordonnées[0].lat,coordonnées[0].lng);
//
var coordonnées2=new google.maps.LatLng(coordonnées[1].lat,coordonnées[1].lng);
//
var coordonnées3=new google.maps.LatLng(coordonnées[2].lat,coordonnées[2].lng);


/*Objet contenant des propriétés avec des identificateurs prédéfinis dans Google Maps permettant de définir des options d'affichage de notre cart*/
var options = {
center: latlng,
zoom: 10,
mapTypeId: google.maps.MapTypeId.ROADMAP
};
/*Constructeur de la carte qui prend en paramêtre le conteneur HTML dans lequel la carte doit s'afficher et les options*/
var carte = new google.maps.Map(document.getElementById("carte"),options);

//marqueur 1
var marqueur1=new google.maps.Marker({
position: coordonnées1 ,map: carte
});
//marqueur 2
var marqueur2=new google.maps.Marker({
position: coordonnées2 ,map: carte
});

//marqueur 3
var marqueur3=new google.maps.Marker({
position: coordonnées3 ,map: carte
});


//création et placement des balises pour le trace
var trace = [ 

//marqueur 1
coordonnées1,

//marqueur 2
coordonnées2,

//marqueur 3
coordonnées3,
];

// creation de l'objet Polyline
var traceTdF = new google.maps.Polyline({
path: trace, // chemin du tracé
strokeColor: "#d35400", // couleur du tracé
strokeOpacity: 1.0, // opacité du tracé
strokeWeight: 2 // grosseur du tracé
});
traceTdF.setMap(carte);

	const titre ='<h1 id="firstHeading" class="firstHeading">TREVES</h1><img src="./assets/img/2021-02-13.jpg" height=300pxl width=300pxl />';
	const info = new google.maps.InfoWindow({
    content: titre,
	  });

	marqueur1.addListener('click', () => {
    info.open(carte,marqueur1);
	});


	const titre2 ='<h1 id="firstHeading" class="firstHeading">PARIS</h1>  <img src="./assets/img/2021-02-10.jpg" height=300pxl width=150pxl />';

	const info2 = new google.maps.InfoWindow({
    content: titre2,
	  });

	marqueur2.addListener('click', () => {
    info2.open(carte,marqueur2);
	});

	const titre3 ='<h1 id="firstHeading" class="firstHeading">TREDREZ-LOQUEMEAU</h1><img src="./assets/img/WP_20160731_16_22_16_Pro.jpg" height=300pxl width=300pxl />';

		 const info3 = new google.maps.InfoWindow({
    content: titre3,
  });

		marqueur3.addListener('click', () => {
    info3.open(carte,marqueur3);
	});
					}					
						}
				});
</script>
</body>
</html>