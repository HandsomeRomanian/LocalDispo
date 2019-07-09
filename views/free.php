<?php
session_start();
require_once("../includes/mobilecheck.php");
require_once("../controller/functions.php");
$json_output = json_decode(file_get_contents("../json/local.json"));
$Jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"];
$numLocal = '0000';
foreach ($json_output->Locals as $tmp) {
	if ($tmp->Emplacement == $_GET["local"]){
		$Local = $tmp;
		$numLocal = $Local->Emplacement;
		$numLocal = substr($numLocal,1);
	}
	if ($Local->Emplacement == ''){
		$numLocal = 'Error';
	}
}
?>

<?php
session_start();
require_once("../includes/mobilecheck.php");
require_once("../controller/functions.php");
$json_output = json_decode(file_get_contents("../json/local.json"));
$Jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"];
$numLocal = '0000';
foreach ($json_output->Locals as $tmp) {
	if ($tmp->Emplacement == $_GET["local"]){
		$Local = $tmp;
		$numLocal = $Local->Emplacement;
		$numLocal = substr($numLocal,1);
	}
	if ($Local->Emplacement == ''){
		$numLocal = 'Error';
	}
}
?>
<!doctype html>
<html lang="fr" xml:lang="fr" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
	<!-- Bootstrap core CSS -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" href="../css/new.css"> <!-- Resource style -->
	<link rel="stylesheet" href="../css/fonts.css">
	<link rel="stylesheet" href="../css/fontawsome.css">

	<title>Test dispso des locaux</title>
</head>

<body class="page-top">
	<?php include("../includes/nav.php"); ?>

	<main>
		<header class="masthead">
			<h1 class="text-center text-uppercase "><?php echo $numLocal ?></h1>
			<h2 class="text-center font-weight-light mb-0"></h2>
		</header>

        <div class="curentlyDispo">
	
        </div>
        <div class="soonDispo">

        </div>

	</main>


	<?php include("../includes/footer.php"); ?>



	<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
	<div class="scroll-to-top d-lg-none position-fixed ">
		<a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
			<i class="fa fa-chevron-up"></i>
		</a>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>
</body>

</html>