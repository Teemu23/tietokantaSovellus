<?php
$error = "";
include("/home/teemsilt/htdocs/Huutokauppa/mysql/yhteys.php");
include("/home/teemsilt/htdocs/Huutokauppa/funktiot.php");
if (isset($_POST['huuda'])) {
    teeHuuto($yhteys);
}
?>

<?php include("ylaAsiakas.php"); ?>
<h2>Tuotteet</h2>


<?php

$tunnus = $_SESSION['ktunnus'];
$kysely = "Select asiakasnumero FROM Asiakas where kayttajatunnus='$tunnus'";
$haku = mysql_query($kysely, $yhteys) or die(mysql_error());
$tulos = mysql_fetch_array($haku);

tuotteet($yhteys);

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <h2> Tee huuto: </h2>
    <input type="hidden" name="asiakasnro" value=<?= $tulos['asiakasnumero'] ?> />
    Tuote ID: <input type="int" name="id" /> <br />
    Maara: <input type="decimal" name="maara" /> <br />
    <input type="hidden" name="huuda" />
    <input type="submit" value="Huuda" />
    <input type="reset" value="Tyhjennä" />
    <hr />
    <div id="error"><?php echo $error; ?></div>
</form>
</body>
</html>

<?php
mysql_close($yhteys);
?>