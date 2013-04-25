<?php
session_start();
include("/home/teemsilt/htdocs/Huutokauppa/mysql/yhteys.php");
include("/home/teemsilt/htdocs/Huutokauppa/funktiot.php");
if (isset($_POST['kirjaudu'])) {
    kirjauduMeklari($yhteys);
}
?>

<!DOCTYPE HTML SYSTEM "about:legacy-compat">
<html>
<body bgcolor="rgb=#C0C0C0">
<form action="kirjauduMeklari.php" method="post" name="kirjautuminen">
    <input type="hidden" name="kirjaudu" value=1>
    Käyttäjätunnus: <input name="ktunnus" type="text" id="ktunnus"> <br />
    Salasana: <input name="salasana" type="password" id="salasana"> <br />
    <input type="submit" value="Kirjaudu sisään" />
    <a href="etusivu.php">Takaisin</a> 
</form>
<hr />
</body>
</html>


<?php
mysql_close($yhteys);
?>

