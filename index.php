<?php
session_start();
$dispoRooms  = json_decode(file_get_contents('http://192.168.0.190:8080/free'));
require_once("includes/mobilecheck.php");
require_once("models/Classe.php");
require_once("models/Room.php");
$Jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"];

?>

<!doctype html>
<html lang="en" xml:lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/reset.css"> <!-- CSS reset -->
	<!-- Bootstrap core CSS -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" href="/css/style.css"> <!-- Resource style -->
	<link rel="stylesheet" href="/css/fonts.css">
	<link rel="stylesheet" href="/css/fontawsome.css">

	<title>Test dispso des locaux</title>
</head>

<body class="page-top">
	<?php include("includes/nav.php"); ?>

	<main>

		<header class="freeTitle">Curently Free</header><br>
		<div class="curentlyDispo">
			<?php
			foreach ($dispoRooms as $tmp) {
				
				if ($tmp->dispo) {
					$local = new Room($tmp->room->localID,$tmp->room->wing,$tmp->room->floor,$tmp->room->number,$tmp->room->places,$tmp->room->typeID); 
					echo '<div class="freeClass classCol1" onclick="window.location=\'/views/schedule.php?local=' . $local->localID . '\';">';
					echo '<p class="className"> ';
					echo $local->getFull();
					echo '</p>';
					if ($tmp->time->hour == '23') {
						$time = 'tomorrow.';
					} else {
						$time = $tmp->time->hour.":".$tmp->time->minute;
					}

					echo '<p class="classInfo">Until <span style="font-size: 1rem;">' . $time . ' </span></p>';
					echo '</div>';
				}
			}
			?>
		</div>
		<header class="freeTitle">Soon Free</header><br>
		<div class="soonDispo">
			<?php
			foreach ($dispoRooms as $tmp) {
				if (!$tmp->dispo) {
					$local = new Room($tmp->room->localID,$tmp->room->wing,$tmp->room->floor,$tmp->room->number,$tmp->room->places,$tmp->room->typeID); 
					echo '<div class="freeClass classCol1" onclick="window.location=\'/views/schedule.php?local=' . $local->getID() . '\';">';
					echo '<p class="className"> ';
					echo $local->getFull();
					echo '</p>';
					echo '<p class="classInfo">In <span style="font-size: 1rem;">' . $tmp->time->hour . ' </span> hours '. $tmp->time->minute .' minutes.</p>';
					echo '</div>';
				}
			}
			?>
		</div>

	</main>

	<?php include("includes/footer.php"); ?>

</body>

</html>