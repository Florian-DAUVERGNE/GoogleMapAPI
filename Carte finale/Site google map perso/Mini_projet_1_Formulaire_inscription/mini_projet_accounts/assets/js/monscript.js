/*
vérifier le formulaire
*/


var mdp=document.getElementsByTagName('input');
var formu=document.getElementById('form');

formu.addEventListener('submit',function verifierFormulaire(e){

	
	if (mdp[0].value == "")
																{
																	
																	mdp[0].style.borderColor = "red";
																	e.preventDefault();
																}
	else{mdp[0].style.borderColor = "green";}
	
	if (mdp[1].value == "")
																{
																	e.preventDefault();
																	mdp[1].style.borderColor = "red";
																}
	else{mdp[1].style.borderColor = "green";}
	
	
	
	
		if (mdp[2].value == ""){
											e.preventDefault();
											mdp[2].style.borderColor = "red";
								}								
else{																
	if(mdp[1].value!=mdp[2].value)
		{
			e.preventDefault();
			mdp[2].style.borderColor = "red";
		}
	else{mdp[2].style.borderColor = "green";}
	}
	
	if(mdp[3].checked == false)
		{
			e.preventDefault();
			document.getElementsByTagName('label')[0].style.color="red";
		}
	
	
	}
);
