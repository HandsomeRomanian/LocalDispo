<?php
require_once("../includes/mobilecheck.php");
require_once("../controller/functions.php");
$json_output = json_decode(file_get_contents("../json/local.json"));
include("../includes/head.php");
?>

<body class="page-top">
	<?php include("../includes/nav.php"); ?>

	<main style="height: 100%">
		<header class="masthead">
			<h1 class="text-center text-uppercase "><?php echo $numLocal ?></h1>
			<h2 class="text-center font-weight-light mb-0"></h2>
		</header>

		<div class="grid-container">
			<div class="calendarSiderbar">
				<p>08:00 </p>
				<p>09:00 </p>
				<p>10:00 </p>
				<p>11:00 </p>
				<p>12:00 </p>
				<p>01:00 </p>
				<p>02:00 </p>
				<p>03:00 </p>
				<p>04:00 </p>
				<p>05:00 </p>
				<p>06:00 </p>
			</div>
			<div class="gridDay">
				<!--TIME PLACEHOLDER THIS SHOULD REMAIN EMPTY-->
			</div>
			<div class="gridDay">Lundi</div>
			<div class="gridDay">Mardi</div>
			<div class="gridDay">Mercredi</div>
			<div class="gridDay">Jeudi</div>
			<div class="gridDay">Vendredi</div>
			<?php
				for ($i=0; $i < 6; $i++) { 
					
					foreach ($Local->Jours[$i]->Cours as $cours){
							?>
			<div class="gridClass 
						classDay<?php echo $i+1;?> 
						classCol<?php echo $cours->ID;?>
						classStart<?php echo $cours->Start-8;?>
						" style=" 
  						grid-row-end: span <?php echo getDuration($cours->Start,$cours->End); ?>;
						">
				<p class="classTime"><?php echo $cours->Start." - ".$cours->End; ?></p>
				<p class="className"><?php echo $cours->Nom;  ?></p>
				<p class="classInfo"><?php echo $cours->Prof;  ?></p>
				<!-- <p class="classInfo"><?php echo $cours->Nom;  ?></p> -->
			</div>
			<?php
					}
				}
			?>
		</div>

	</main>


	<?php include("../includes/footer.php"); ?>
</body>

</html>