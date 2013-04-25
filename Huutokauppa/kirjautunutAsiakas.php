<?
session_start();

if (!isset($_SESSION['ktunnus'])) {
header('location:kirjauduAsiakas.php');
}
?>
<?php include("ylaAsiakas.php"); ?>
<html>
<body>
Sisäänkirjautuminen onnistui. Tervetuloa!
</body>
</html>