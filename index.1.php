<?php
session_start();
ob_start();
include("controller\\functions.php");
$json_output = json_decode(file_get_contents("json/local.json"));
$Local = 602;
$Jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"];
foreach ($json_output->Locals as $tmp) {
	if ($tmp->Emplacement == $_GET["local"])
		$Local = $tmp;
}


?>
<!doctype html>
<html lang="fr" xml:lang="fr" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->


	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


	<!-- Custom styles for this template -->
	<!-- <link href="css/freelancer.min.css" rel="stylesheet"> -->

	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<link rel="stylesheet" href="css/fonts.css">

	<title>Test dispso des locaux</title>
</head>

<body class="page-top">
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg fixed-top " id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger" href="#page-top">Start Bootstrap</a>
			<button class="navbar-toggler navbar-toggler-right bg-primary text-white rounded" type="button"
				data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
				aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item mx-0 mx-lg-1">
						<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Portfolio</a>
					</li>
					<li class="nav-item mx-0 mx-lg-1">
						<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a>
					</li>
					<li class="nav-item mx-0 mx-lg-1">
						<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contact</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<main>
		<header class="masthead">
			<h1 class="text-center text-uppercase ">D-<?php echo $Local->Emplacement ?></h1>
			<h2 class="text-center font-weight-light mb-0"></h2>
		</header>


		<div class="cd-schedule loading">
			<div class="timeline">
				<ul>
					<li><span>08:10</span></li>
					<li><span>08:40</span></li>
					<li><span>09:10</span></li>
					<li><span>09:40</span></li>
					<li><span>10:10</span></li>
					<li><span>10:40</span></li>
					<li><span>11:10</span></li>
					<li><span>11:40</span></li>
					<li><span>12:10</span></li>
					<li><span>12:40</span></li>
					<li><span>13:10</span></li>
					<li><span>13:40</span></li>
					<li><span>14:10</span></li>
					<li><span>14:40</span></li>
					<li><span>15:10</span></li>
					<li><span>15:40</span></li>
					<li><span>16:10</span></li>
					<li><span>16:40</span></li>
					<li><span>17:10</span></li>
					<li><span>17:40</span></li>
					<li><span>18:00</span></li>
				</ul>
			</div> <!-- .timeline -->

			<div class="events">
				<ul>

					<?php
                	for ($i=0; $i < 5; $i++) { ?>
					<li class="events-group">
						<div class="top-info"><span><?php echo $Jours[$i];?></span></div>
						<ul>
							<?php
						foreach ($Local->Jours[$i]->Cours as $cours){
								?>
							<li class="single-event" data-start="<?php echo $cours->Start ?>"
								data-end="<?php echo $cours->End ?>" data-content="prog2"
								data-event="class-<?php echo $cours->ID;?>">
								<a href="#0">
									<em class="class-name"><?php echo $cours->Nom ?></em>
								</a>
							</li>
							<?php
						}
						echo "</ul></li>";
				}
				?>
						</ul>
			</div>

			<div class="class-modal">
				<div class="header">
					<div class="content">
						<span class="class-date"></span>
						<h3 class="class-name"></h3>
					</div>

					<div class="header-bg"></div>
				</div>

				<div class="body">
					<div class="class-info">Error: content not found.</div>
					<div class="body-bg"></div>
				</div>

				<a href="#0" class="close"></a>
			</div>

			<div class="cover-layer"></div>

		</div> <!-- .cd-schedule -->
	</main>

	<!-- Footer -->
	<footer class="footer text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-4 mb-5 mb-lg-0">
					<h4 class="text-uppercase mb-4">Location</h4>
					<p class="lead mb-0">Montreal
						<br>Quebec, Canada</p>
				</div>
				<div class="col-md-4 mb-5 mb-lg-0">
					<h4 class="text-uppercase mb-4">Around the Web</h4>

					<a href="#" class="fab fa-facebook"></a>
					<a href="#" class="fab fa-twitter"></a>
					<a href="#" class="fab fa-github"></a>

				</div>
				<div class="col-md-4">
					<h4 class="text-uppercase mb-4">Open Classroom Schedule</h4>
					<p class="lead mb-0">WIP uncompleted design.</p>
				</div>
			</div>
		</div>

		<div class="copyright text-center text-white">
			<div class="container">
				<p>Copyright &copy; Matei Martin 2019</p>
			</div>
		</div>
	</footer>


	<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
	<div class="scroll-to-top d-lg-none position-fixed ">
		<a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
			<i class="fa fa-chevron-up"></i>
		</a>
	</div>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
	<script>
		if (!window.jQuery) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
	</script>
	<script src="js/schedule.js"></script> <!-- Resource jQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>
</body>

</html>