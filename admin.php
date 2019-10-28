<?php

require_once("models/Cours.php");
require_once("models/Group.php");
require_once("models/Room.php");
require_once("models/Classe.php");
require_once("models/Teacher.php");

$profsJSON =  json_decode(file_get_contents('http://192.168.0.190:8080/teachers'), true);
$classesJSON =  json_decode(file_get_contents('http://192.168.0.190:8080/classes'), true);
$roomsJSON =  json_decode(file_get_contents('http://192.168.0.190:8080/rooms'), true);

$profs = null;

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/css/admin.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
    <script src="js/moment.js"></script>
    <script>
        $('#time').bootstrapMaterialDatePicker({
            date: false
        });
    </script>

</head>

<body>
    <div class="container">
        <form id="contact" action="" method="post">
            <h3><?php echo $profsJSON[0]['teacherFirstName'];  ?></h3>
            <h4>Contact us for custom quote</h4>
            <input placeholder="Heure de début" name="" type="time" tabindex="1" required autofocus>
            <br>
            <input placeholder="Heure de fin" name="" type="time" tabindex="2" required autofocus>
            <br>
            <select name="dayID">
                <option value="1">Lundi</option>
                <option value="2">Mardi</option>
                <option value="3">Mercredi</option>
                <option value="4">Jeudi</option>
                <option value="5">Vendredi</option>
            </select>
            <br>
            <select name="localID">
                <?php
                    foreach ($roomsJSON as $room) {
                ?>
                <option value="<?php echo $room['localID'];?>"><?php echo $room['teacherFirstName'];?></option>
                <?php
            }
            ?>
            </select>
            <br>
            <select name="teacherID">
                <?php
                    foreach ($profsJSON as $prof) {
                ?>
                <option value="<?php echo $prof['teacherID'];?>"><?php echo $prof['teacherFirstName']." ".$prof['teacherFamName'];?></option>
                <?php
            }
            ?>
            </select>
            <br>
            <select name="coursID">
                <?php
                    foreach ($classesJSON as $class) {
                ?>
                <option value="<?php echo $class['coursID'];?>"><?php echo $class['name'];?></option>
                <?php
            }
            ?>
            </select>
            <input placeholder="Numero du groupe" name="groupNumber" type="number" tabindex="6" required autofocus>
            <br>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
        </form>
    </div>
</body>

</html>