<?php
/* Connexion à une base ODBC avec l'invocation de pilote */
$dsn = 'mysql:host=51.210.151.13;dbname=map_personnality';
$user = 'eleve';
$password = 'eleve';
// compléter la fonction PDO avec les variables $dsn $user $password
try {
    $bdd = new PDO($dsn, $user, $password);
	//nécessaire pour rajouter la norme UTF-8(accents)
	$bdd->exec('SET NAMES utf8');
} catch (Exception $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

//Ecrire la requête SQL dans la fonction query 

$reponse = $bdd->query("select * from place join  coordonnee on coordonnee_id = coordonnee.id ");
$donnee=array();
$tab=array();
// afficher l'ensemble de la table en complétant la fonction echo
// sachant que fetch() récupére chaque ligne sous forme d' un tableau
// associatif dont les clés sont les champs de la table NASA"

while($contenu=$reponse->fetch()){
	foreach($contenu as $key=>$value)
	{
		$donnee[$key]=$value;
	}
	array_push($tab,$donnee);
}
echo json_encode($tab);
//cloture du curseur l'ensemble des données
$reponse->closeCursor();
?>

