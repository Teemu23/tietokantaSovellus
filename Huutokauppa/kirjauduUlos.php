<?php
session_start();
include("/home/teemsilt/htdocs/Huutokauppa/mysql/yhteys.php");
include("/home/teemsilt/htdocs/Huutokauppa/funktiot.php");

session_destroy();
header("Location: etusivu.php");

?>
