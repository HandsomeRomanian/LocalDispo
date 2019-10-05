<?php
require_once("controller/functions.php");
$json_output = json_decode(file_get_contents("json/local.json"));
include "./models/class.php";

$test = new User("yo",18);
?>

<h1><?php echo $test->name; ?></h1>

<select id="animal" name="animal">  
<?php 
$index = 0;
foreach ($json_output->Locals as $tmp) { ?>                   
    <option value="<?php echo $index;?>"><?php echo $tmp->Emplacement;?> </option>
<?php } ?>
</select>