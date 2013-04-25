<?php
include("/home/teemsilt/htdocs/Huutokauppa/mysql/yhteys.php");
include("/home/teemsilt/htdocs/Huutokauppa/funktiot.php");
?>
<?php include("yla.php"); ?>
<h2>Tuotteet</h2>
<?php
tuotteet($yhteys);
?>


