<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/controller/API.php");
$API = new API();
require_once("includes/mobilecheck.php");
$dispoRooms = $API->getDispo();

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
					$local = new Room($tmp->room->localID, $tmp->room->wing, $tmp->room->floor, $tmp->room->number, $tmp->room->places, $tmp->room->typeID);
					?>
					<div class="freeClass classCol1" onclick="window.location='/views/schedule.php?room=<?php echo $local->localID; ?>';">
						<p class="className">
							<?php echo $local->getFull(); ?>
						</p>
						<?php if ($tmp->isToday()) {
									$time = 'tomorrow.';
								} else {
									$time = $tmp->time;
								} ?>

						<p class="classInfo">Until <span style="font-size: 1rem;"> <?php echo $time ?></span></p>
					</div>
			<?php
				}
			}
			?>
		</div>
		<header class="freeTitle">Soon Free</header><br>
		<div class="soonDispo">
			<?php
			foreach ($dispoRooms as $tmp) {
				if (!$tmp->dispo) {
					$local = new Room($tmp->room->localID, $tmp->room->wing, $tmp->room->floor, $tmp->room->number, $tmp->room->places, $tmp->room->typeID);
					?>
					<div class="freeClass classCol1" onclick="window.location='/views/schedule.php?room=<?php echo $local->localID; ?>';">
						<p class="className">
							<?php echo $local->getFull(); ?>
						</p>
						<p class="classInfo">At <span style="font-size: 1rem;"><?php echo $tmp->time ?> </span></p>
					</div><?php
								}
							}
							?>
		</div>

	</main>

	<?php include("includes/footer.php"); ?>

</body>

</html>