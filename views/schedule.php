<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/controller/API.php");
$API = new API();
$local = $API->getRoom((int)$_GET['room']);
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
	<?php include("../includes/nav.php"); ?>

	<main style="height: 100%">
		<header class="masthead">
			<h1 class="text-center text-uppercase "><?php echo $local->getFull() ?></h1>
			<h2 class="text-center font-weight-light mb-0"></h2>
		</header>

		<div class="grid-container">
			<div class="calendarSiderbar">
				<p>08:00</p>
				<p>09:00</p>
				<p>10:00</p>
				<p>11:00</p>
				<p>12:00</p>
				<p>13:00</p>
				<p>14:00</p>
				<p>15:00</p>
				<p>16:00</p>
				<p>17:00</p>
				<p>18:00</p>
			</div>
			<div class="gridDay">
				<!--This is the hour headder-->
			</div>
			<div class="gridDay">Lundi</div>
			<div class="gridDay">Mardi</div>
			<div class="gridDay">Mercredi</div>
			<div class="gridDay">Jeudi</div>
			<div class="gridDay">Vendredi</div>
			<?php
			foreach ($local->classes as $cours) {
				$cours->group = $API->getGroup($cours->groupID);
				?>
				<div class="gridClass 
						classDay<?php echo $cours->dayID; ?> 
						classCol1<?php //echo $cours->classID; ?>
						classStart<?php echo $cours->parseStart(); ?>
						" style=" 
  						grid-row-end: span <?php echo $cours->getDuration() ?>;
						">
					<p class="classTime"><?php echo $cours->startTime . " - " . $cours->endTime;?></p>
					<p class="className"><?php echo $cours->group->cours->coursName;  ?></p>
					<p class="classInfo"><?php echo $cours->teacher->getFullName();  ?></p>
					<p class="classTime"><?php echo "Groupe : ".$cours->group->groupNumber;  ?></p>
				</div>
			<?php
			}

			?>
		</div>

	</main>


	<?php include("../includes/footer.php"); ?>
</body>

</html>