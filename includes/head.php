<?php
session_start();
$Jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"];
$numLocal = '0000';
foreach ($json_output->Locals as $tmp) {
	if ($tmp->Emplacement == $_GET["local"]) {
		$Local = $tmp;
		$numLocal = $Local->Emplacement;
		$numLocal = substr($numLocal, 1);
	}
	if ($Local->Emplacement == '') {
		$numLocal = 'Error';
	}
}
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