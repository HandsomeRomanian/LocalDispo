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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
    <div class="thing">
        <form id="contact" action="" method="post">

            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <div class="input-group timepicker">
                            <input type="text" class="form-control" default="08:00" readonly>
                            <span class="input-group-addon">
                                <span class="fa fa-clock-o"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <div class="input-group timepicker">
                            <input type="text" class="form-control" readonly>
                            <span class="input-group-addon">
                                <span class="fa fa-clock-o"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <select class="form-control" name="dayID" tabindex="3">
                <option value="1">Lundi</option>
                <option value="2">Mardi</option>
                <option value="3">Mercredi</option>
                <option value="4">Jeudi</option>
                <option value="5">Vendredi</option>
            </select>
            <br>
            <select class="form-control" name="localID" tabindex="4">
                <?php
                foreach ($roomsJSON as $room) {
                    $room = new Room($room['localID'], $room['wing'], $room['floor'], $room['number'], $room['places'], $room['typeID']);
                    ?>
                    <option value="<?php echo $room->localID; ?>"><?php echo $room->getFull(); ?></option>
                <?php
                }
                ?>
            </select>
            <br>
            <select class="form-control" name="teacherID" tabindex="5">
                <?php
                foreach ($profsJSON as $prof) {
                    ?>
                    <option value="<?php echo $prof['teacherID']; ?>"><?php echo $prof['teacherFirstName'] . " " . $prof['teacherFamName']; ?></option>
                <?php
                }
                ?>
            </select>
            <br>
            <select class="form-control" name="coursID" tabindex="6">
                <?php
                foreach ($classesJSON as $class) {
                    ?>
                    <option value="<?php echo $class['coursID']; ?>"><?php echo $class['name']; ?></option>
                <?php
                }
                ?>
            </select>
            <br>
            <input class="form-control" min="1000" max="1090" placeholder="Numero du groupe" name="groupNumber" type="number" tabindex="7" required autofocus>
            <br>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </div>
    </form>
    </div>



    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/locale/nl.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/js/admin.js"></script>
</body>

</html>