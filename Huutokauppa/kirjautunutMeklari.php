<?
session_start();
if(!session_is_registered(ktunnus)){
header("location:kirjauduMeklari.php");
}
?>
<?php include("ylaMeklari.php"); ?>
<html>
<body>
Sisäänkirjautuminen onnistui. Tervetuloa!
</body>
</html>