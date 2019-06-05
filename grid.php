<?php
session_start();
include("controller/functions.php");
$json_output = json_decode(file_get_contents("json/local.json"));
$Jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"];
foreach ($json_output->Locals as $tmp) {
	if ($tmp->Emplacement == "0000")
		$Local = $tmp;
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
	<link href="node_modules\@fortawesome\fontawesome-free\css\all.min.css" rel="stylesheet" type="text/css">


	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400i,700i" rel="stylesheet" type="text/css"> -->



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

	<main style="height: 100%" >
		<header class="masthead">
			<h1 class="text-center text-uppercase ">D-6969</h1>
			<h2 class="text-center font-weight-light mb-0"></h2>
		</header>

        <div class="grid-container">
            <div class="calendarSiderbar">
					<p >08:00 </p>
					<p >09:00 </p>
					<p >10:00 </p>
					<p >11:00 </p>
					<p >12:00 </p>
					<p >01:00 </p>
					<p >02:00 </p>
					<p >03:00 </p>
					<p >04:00 </p>
					<p >05:00 </p>
					<p >06:00 </p>
			</div>
			<div class="gridDay"><!--TIME PLACEHOLDER THIS SHOULD REMAIN EMPTY--></div>
			<div class="gridDay">Lundi</div>
			<div class="gridDay">Mardi</div>
			<div class="gridDay">Mercredi</div>
			<div class="gridDay">Jeudi</div>
			<div class="gridDay">Vendredi</div>
			<?php
				for ($i=1; $i < 6; $i++) { 
					
					foreach ($Local->Jours[$i]->Cours as $cours){
							?>
						<div class="gridClass 
						classDay<?php echo $i;?> 
						classCol<?php echo $cours->ID;?>
						classStart<?php echo $cours->Start-7?>
						"
						style=" 
  						grid-row-end: span <?php echo getDuration($cours->Start,$cours->End); ?>;
						">
								<p class="class-name"><?php echo $cours->Nom;echo getDuration($cours->Start,$cours->End); ?></p>
						</div>
						<?php
					}
				}
			?>
            <!-- <div class="gridClass classDay1 classDur1 classCol1" >
                <a href="#0">
                    <em class="className">Test</em>
                </a>
			</div>
            <div class="gridClass classStart0 classDay2 classDur3 classCol1" >
                <a href="#0">
                    <em class="className">2</em>
                </a>
            </div>
            <div class="gridClass  classStart1 classDay3 classDur1 classCol1" >
                <a href="#0">
                    <em class="className">3</em>
                </a>
            </div>
            <div class="gridClass classStart2 classDay4 classDur1 classCol1" >
                <a href="#0">
                    <em class="className">4</em>
                </a>
            </div>
            <div class="gridClass classStart5 classDay5 classDur1 classCol1" >
                <a href="#0">
                    <em class="className">5</em>
                </a>
            </div> -->
        </div>

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