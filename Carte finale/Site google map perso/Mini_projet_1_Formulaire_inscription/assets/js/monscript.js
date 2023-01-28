/*
Variable
*/
var vérif=true;
var champ=document.getElementsByTagName('input');
var formu=document.getElementById('form');




//Vérifications des champs
formu.addEventListener('submit',function verifierFormulaire(e){

//Vérification email
if (champ[0].value == "")
																{
																	vérif=false;
																	e.preventDefault();
																	champ[0].style.borderColor = "red";
																}
	else{champ[0].style.borderColor = "green";}

//Vérification mot de passe
	if (champ[1].value == "")
																{
																	vérif=false;
																	e.preventDefault();
																	champ[1].style.borderColor = "red";
																}
	else{champ[1].style.borderColor = "green";}

//Empêcher de charger la page PHP
	//e.preventDefault();
});