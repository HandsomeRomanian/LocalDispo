<?php
require_once("../includes/mobilecheck.php");
require_once("../controller/functions.php");
$json_output = json_decode(file_get_contents("../json/local.json"));
include("../includes/head.php");
?>

<body class="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top " id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Info Horaires </a>
      <button class="navbar-toggler navbar-toggler-right bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <form autocomplete="off" action="/views/schedule.php">
              <div class="autocomplete">
                <input id="searchBar" type="text" name="local" placeholder="Local">
              </div>
              <input type="submit" value="Go">
            </form>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="">Connection</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main style="height: 100%">

  </main>

  <script src="../js/autocomplete.js"></script>
  <script>
    var list = [
      <?php
      $index = 0;
      foreach ($json_output->Locals as $tmp) {
        if ($index != 0) {
          echo " , ";
        }
        $index++;
        echo "\"" . $tmp->Emplacement . "\"";
      }
      ?>
    ];

    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("searchBar"), list);
  </script>
  <?php include("../includes/footer.php"); ?>

</body>

</html>