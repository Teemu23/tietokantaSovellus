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

$kysely = "Select nimi,kuvaus,minimihinta,kuva, alk_pvm, lop_pvm,Tuote.tuoteID, maara FROM Tuote LEFT OUTER JOIN Huuto ON Tuote.tuoteID=Huuto.tuoteID,Tuote_esite where Tuote_esite.id=Tuote.Tuote_esite_id group by Tuote.tuoteID order by Tuote.tuoteID";
$haku = mysql_query($kysely, $yhteys) or die(mysql_error());

$tunnus = $_SESSION['ktunnus'];
$kysely2 = "Select asiakasnumero FROM Asiakas where kayttajatunnus='$tunnus'";
$haku2 = mysql_query($kysely2, $yhteys) or die(mysql_error());
$tulos2 = mysql_fetch_array($haku2);
echo "<table border>";
echo "<tr><td><b>Nimi</b></td><td><b>Kuvaus</b></td><td><b>Minimihinta</b></td><td><b>Kuva</b></td>
        <td><b>Aloituspäivämäärä</b></td><td><b>lopetuspäivämäärä</b></td><td><b>Tuote ID</b></td><td><b>Huudettu</b></td></tr>";

$tulos = array();


while ($tulos = mysql_fetch_array($haku)) {
    echo "<tr><td>".$tulos['nimi']."</td><td>".$tulos['kuvaus']."</td><td>".$tulos['minimihinta']."</td><td>".$tulos['kuva']."</td>
        <td>".$tulos['alk_pvm']."</td><td>".$tulos['lop_pvm']."</td><td>".$tulos['tuoteID']."</td><td>".$tulos['maara']."</td></tr>";
}
echo "</table>";
echo "</body></html>";
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