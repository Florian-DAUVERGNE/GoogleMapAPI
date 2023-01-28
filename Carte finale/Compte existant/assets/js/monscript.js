		$.ajax({
					url: "../Json/données.json",
					method: "GET",
					dataType: "json",
					success: function(data)
					{
						console.log("oui");

/*
Variable
*/
var champ=document.getElementsByTagName('input');
var formu=document.getElementById('form');
var invi=document.getElementsByTagName('p');
var no_mail=1;


//Vérifications des champs
formu.addEventListener('submit',function verifierFormulaire(e){

					for(let i=0;i<data.length;i++)
					{
						if(champ[0].value==data[i].email)
						{
							//Le mail existe
							invi[0].className="text-danger invisible";
							champ[0].style.borderColor = "green";
								
								if(champ[1].value==data[i].mdp)
								{
									//le mot de passe est bon
									no_mail=0;
								}
								else
								{
									//le mot de passe n'est pas bon
								invi[1].className="text-danger visible";
								champ[1].style.borderColor = "red";
								}
						break;
						}
						//Le mail n'existe pas
						else{invi[0].className="text-danger visible";champ[0].style.borderColor = "red";}
						
					
					}


//Empêcher de charger la page PHP
if(no_mail == 1)
{
	e.preventDefault();
}
																})
					}
				});