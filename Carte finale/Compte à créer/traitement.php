<?php
$email = $_GET['email'];
$mdp = $_GET['password'];

$lng=rand(-179,179);
$lat=rand(-84.9,84.9);
$lng2=rand(-179,179);
$lat2=rand(-84.9,84.9);
$lng3=rand(-179,179);
$lat3=rand(-84.9,84.9);

// Ouvre un fichier pour lire un contenu existant
$data = file_get_contents('../Json/données.json');
// Ajoute une personne

$obj = json_decode($data);

$current = array(
    "nom" => "M.X",
	"email"=>$email,
	"mdp"=>$mdp,
	"gender"=> "Male",
	"markers"=>array(array("id"=>"1",
					"latLng"=>array("lat"=>$lat,"lng"=>$lng),
					"namePlace"=>"à rajouter",
					"commentaire"=> "à rajouter",
					"photo"=> "https://static.wixstatic.com/media/72c0b2_4aae2e7d40134e60bebec945b323bac5~mv2.png/v1/fill/w_715,h_409,al_c,lg_1,q_90/72c0b2_4aae2e7d40134e60bebec945b323bac5~mv2.webp"
					),array("id"=>"2",
					"latLng"=>array("lat"=>$lat2,"lng"=>$lng2),
					"namePlace"=>"à rajouter",
					"commentaire"=> "à rajouter",
					"photo"=> "https://static.wixstatic.com/media/72c0b2_4aae2e7d40134e60bebec945b323bac5~mv2.png/v1/fill/w_715,h_409,al_c,lg_1,q_90/72c0b2_4aae2e7d40134e60bebec945b323bac5~mv2.webp"
					),array("id"=>"3",
					"latLng"=>array("lat"=>$lat3,"lng"=>$lng3),
					"namePlace"=>"à rajouter",
					"commentaire"=> "à rajouter",
					"photo"=> "https://static.wixstatic.com/media/72c0b2_4aae2e7d40134e60bebec945b323bac5~mv2.png/v1/fill/w_715,h_409,al_c,lg_1,q_90/72c0b2_4aae2e7d40134e60bebec945b323bac5~mv2.webp"
					))
);


array_push($obj, $current);

$json=json_encode($obj);

file_put_contents("../Json/données.json", $json);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>formulaire</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="color: rgb(33,37,41);">
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="get" action="traitement.php" id="form">
				<a class="already"><h5>Merci de votre inscription !</h5></a><a class="already" href="../Compte existant/login.html"><h5><strong> <U>Cliquez ici pour accéder à votre map !</strong></U></h5></a>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/monscript.js"></script>
</body>

</html>