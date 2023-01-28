<?php
$email = $_GET['email'];
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
<h1 id='p'>a</h1>
<div  class="text-danger visible" id="carte" style="width:800px; height:800px"></div>

<!--Inclusion de l'API Google MAPS-->

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7Y32T_PJHZxYcK3BJYJFNwSl6cuvLXpo"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<a id='a' href="<?php echo($email); ?>"></a> 

<script>
var toto=document.getElementById('p');
var formu=document.getElementById('a');
var taille=formu.href.split("/").length;
					console.log(taille);
		$.ajax({
					url:"../Json/données.json",
					method: "GET",
					dataType: "json",
					success: function(data){
					console.log(formu.href.split("/")[taille-1]);
					for(let i=0;i<data.length;i++)
					{
						if(formu.href.split("/")[taille-1]==data[i].email)
						{
							
							var x=i;
							toto.innerText=data[x].nom;
							break;
						}
					}

// Les coordonnées
var centre = new google.maps.LatLng(data[x].markers[0].latLng.lat,data[x].markers[0].latLng.lng);

var coordonnées1=new google.maps.LatLng(data[x].markers[0].latLng.lat,data[x].markers[0].latLng.lng);

var coordonnées2=new google.maps.LatLng(data[x].markers[1].latLng.lat,data[x].markers[1].latLng.lng);

var coordonnées3=new google.maps.LatLng(data[x].markers[2].latLng.lat,data[x].markers[2].latLng.lng);


//Objet contenant des propriétés avec des identificateurs prédéfinis dans Google Maps permettant de définir des options d'affichage de notre carte
var options = {
center: centre,
zoom: 1.5,
mapTypeId: google.maps.MapTypeId.ROADMAP
};

/*Constructeur de la carte qui prend en paramêtre le conteneur HTML dans lequel la carte doit s'afficher et les options*/
var carte = new google.maps.Map(document.getElementById("carte"),options);
					


//marqueur 1
var marqueur1=new google.maps.Marker({
position:coordonnées1 ,map: carte
});

//marqueur 2
var marqueur2=new google.maps.Marker({
position: coordonnées2 ,map: carte
});

//marqueur 3
var marqueur3=new google.maps.Marker({
position: coordonnées3 ,map: carte
});

	const titre ='<h1>'+data[x].markers[0].namePlace+'</h1><h2>'+data[x].markers[0].commentaire+'</h2><img src="'+data[x].markers[0].photo+'" +height=300pxl width=300pxl />';
	const info = new google.maps.InfoWindow({
    content: titre,
	  });

	marqueur1.addListener('click', () => {
    info.open(carte,marqueur1);
	});


	const titre2 ='<h1>'+data[x].markers[1].namePlace+'</h1><h2>'+data[x].markers[1].commentaire+'</h2><img src="'+data[x].markers[1].photo+'" +height=300pxl width=300pxl />';

	const info2 = new google.maps.InfoWindow({
    content: titre2,
	  });

	marqueur2.addListener('click', () => {
    info2.open(carte,marqueur2);
	});

	const titre3 ='<h1>'+data[x].markers[2].namePlace+'</h1><h2>'+data[x].markers[2].commentaire+'</h2><img src="'+data[x].markers[2].photo+'" +height=300pxl width=300pxl />';

		 const info3 = new google.maps.InfoWindow({
    content: titre3,
  });

		marqueur3.addListener('click', () => {
    info3.open(carte,marqueur3);
	});
	}

	})
</script>
</body>
</html>