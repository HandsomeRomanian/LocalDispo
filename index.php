<?php
$json_output = json_decode(file_get_contents("json/local.json"));
require_once("includes/mobilecheck.php");
require_once("controller/functions.php");
include("includes/head.php");
?>

<body class="page-top">
	<?php include("includes/nav.php"); ?>

	<main>

		<header class="freeTitle">Curently Free</header><br>
		<div class="curentlyDispo">
			<?php
			foreach ($json_output->Locals as $tmp) {
				if (checkFree($tmp)) {
					echo '<div class="freeClass classCol1" onclick="window.location=\'/views/schedule.php?local=' . $tmp->Emplacement . '\';">';
					echo '<p class="className"> ';
					echo formatLocal($tmp);
					echo '</p>';
					if (nextClassTime($tmp) == '00:00') {
						$temp = 'tomorrow.';
					} else {
						$temp = nextClassTime($tmp);
					}

					echo '<p class="classInfo">Until <span style="font-size: 1rem;">' . $temp . ' </span></p>';
					echo '</div>';
				}
			}
			?>
		</div>
		<header class="freeTitle">Soon Free</header><br>
		<div class="soonDispo">
			<?php
			foreach ($json_output->Locals as $tmp) {
				if (!checkFree($tmp)) {
					echo '<div class="freeClass classCol1" onclick="window.location=\'/views/schedule.php?local=' . $tmp->Emplacement . '\';">';
					echo '<p class="className"> ';
					echo formatLocal($tmp);
					echo '</p>';
					echo '<p class="classInfo">In <span style="font-size: 1rem;">' . checkFree($tmp->Emplacement) . ' </span> hours.</p>';
					echo '</div>';
				}
			}
			?>
		</div>

	</main>

	<?php include("includes/footer.php"); ?>

</body>

</html>