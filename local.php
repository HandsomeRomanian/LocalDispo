<?php
session_start();
ob_start();
include("controller\\functions.php");
$json_output = json_decode(file_get_contents("json/local.json"));
$Local;
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
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">

	<!-- Plugin CSS -->
	<link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

	<!-- Custom styles for this template -->
	<link href="css/freelancer.min.css" rel="stylesheet">

	<!-- Resource style -->
	<link rel="stylesheet" href="css/style.css">

	<title>Test dispso des locaux</title>
</head>

<body class="page-top">
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger" href="#page-top">Start Bootstrap</a>
			<button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button"
			 data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
			 aria-label="Toggle navigation">
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

	<section>
		<header class="masthead">
				<h1 class="text-center text-uppercase ">Tire</h1>
				<h2 class="text-center font-weight-light mb-0">Web Developer - Graphic Artist - User Experience Designer</h2>
		</header>


		<div class="cd-schedule loading">
			<div class="timeline">
				<ul>
					<li><span>08:00</span></li>
					<li><span>08:30</span></li>
					<li><span>09:00</span></li>
					<li><span>09:30</span></li>
					<li><span>10:00</span></li>
					<li><span>10:30</span></li>
					<li><span>11:00</span></li>
					<li><span>11:30</span></li>
					<li><span>12:00</span></li>
					<li><span>12:30</span></li>
					<li><span>13:00</span></li>
					<li><span>13:30</span></li>
					<li><span>14:00</span></li>
					<li><span>14:30</span></li>
					<li><span>15:00</span></li>
					<li><span>15:30</span></li>
					<li><span>16:00</span></li>
					<li><span>16:30</span></li>
					<li><span>17:00</span></li>
					<li><span>17:30</span></li>
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
									<li class="single-event" data-start="<?php echo $cours->Start ?>" data-end="<?php echo $cours->End ?>" data-content="" data-event="class-<?php echo $cours->ID;?>">
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
				<header class="header">
					<div class="content">
						<span class="class-date"></span>
						<h3 class="class-name"></h3>
					</div>

					<div class="header-bg"></div>
				</header>

				<div class="body">
					<div class="class-info">Error: content not found.</div>
					<div class="body-bg"></div>
				</div>

				<a href="#0" class="close">Close</a>
			</div>

			<div class="cover-layer"></div>

		</div> <!-- .cd-schedule -->
	</section>

    <!-- Footer -->
    <footer class="footer text-center">
			<div class="container">
			  <div class="row">
				<div class="col-md-4 mb-5 mb-lg-0">
				  <h4 class="text-uppercase mb-4">Location</h4>
				  <p class="lead mb-0">2215 John Daniel Drive
					<br>Clark, MO 65243</p>
				</div>
				<div class="col-md-4 mb-5 mb-lg-0">
				  <h4 class="text-uppercase mb-4">Around the Web</h4>
				  <ul class="list-inline mb-0">
					<li class="list-inline-item">
					  <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
						<i class="fab fa-fw fa-facebook-f"></i>
					  </a>
					</li>
					<li class="list-inline-item">
					  <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
						<i class="fab fa-fw fa-google-plus-g"></i>
					  </a>
					</li>
					<li class="list-inline-item">
					  <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
						<i class="fab fa-fw fa-twitter"></i>
					  </a>
					</li>
					<li class="list-inline-item">
					  <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
						<i class="fab fa-fw fa-linkedin-in"></i>
					  </a>
					</li>
					<li class="list-inline-item">
					  <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
						<i class="fab fa-fw fa-dribbble"></i>
					  </a>
					</li>
				  </ul>
				</div>
				<div class="col-md-4">
				  <h4 class="text-uppercase mb-4">Open Classroom Schedule</h4>
				  <p class="lead mb-0">WIP un completed design.</p>
				</div>
			  </div>
			</div>
		  </footer>
	  
		  <div class="copyright py-4 text-center text-white">
			<div class="container">
			  <small>Copyright &copy; Matei Martin 2019</small>
			</div>
		  </div>
	  
		  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
		  <div class="scroll-to-top d-lg-none position-fixed ">
			<a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
			  <i class="fa fa-chevron-up"></i>
			</a>
		  </div>



	<script src="js/modernizr.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
	<script>
		if (!window.jQuery) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
	</script>
	<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>

</html>