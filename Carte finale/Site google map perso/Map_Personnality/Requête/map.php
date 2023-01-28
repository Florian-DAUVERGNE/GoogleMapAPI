<?php

session_start();
if(isset($_GET['email']))
{
$_SESSION['email'] =$_GET['email'];
$email=$_SESSION['email'];
}
else
$email=$_SESSION['email'];

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
<a class="already" href="../Compte existant/login.html"><h5><U>Se déconnecter</U></h5></a>
<h1 id='p'>a</h1>
<div  class="text-danger visible" id="map" style="width:800px; height:800px"></div>
<!--Inclusion de l'API Google MAPS-->

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7Y32T_PJHZxYcK3BJYJFNwSl6cuvLXpo"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<a id='a' class="<?php echo($email); ?>"></a> 
<script>
$.ajax({
        url:        "http://localhost/Mes%20Projets/API/Compte%20existant/Q1nasa.php",
        method:     "GET",
        dataType: "json",
        success: function(personne) {


            //places = personne.markers;

            var options = {
                center:  new google.maps.LatLng(10, 10),
                zoom: 3,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            // Create Map
            var map = new google.maps.Map(document.getElementById("map"), options);
			
			var toto=document.getElementById('p');
			var formu=document.getElementById('a');

			//afficher l'email au dessus de la carte
			for(let i=0;i<personne.length;i++){
			if(personne[i].personne_email==formu.className)
			toto.innerText=personne[i].personne_email;
			}
            // set markers on  Map
            for (let i = 0; i < personne.length; i++) {
				if(personne[i].personne_email==formu.className)
                new google.maps.Marker({
                                                                position: {lat:parseInt(personne[i].lat),lng:parseInt(personne[i].lng)},
                                                                title:personne[i].namePlace,
																map: map,
                });
				}
		}
    });
</script>
</body>
</html>