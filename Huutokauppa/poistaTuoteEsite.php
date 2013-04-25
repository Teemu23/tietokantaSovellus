<?php
$error = "";
include("/home/teemsilt/htdocs/Huutokauppa/mysql/yhteys.php");
include("/home/teemsilt/htdocs/Huutokauppa/funktiot.php");
if (isset($_POST['poista'])) {
    poistaTuoteEsite($yhteys);
}
?>
<?php include("ylaMeklari.php"); ?>
<h2> Tuote-esitteen poistaminen </h2>
<?php
$kysely = "Select id,nimi,kuvaus FROM Tuote_esite order by id";
$haku = mysql_query($kysely, $yhteys) or die(mysql_error());


echo "<table border>";
echo "<tr><td><b>Nimi</b></td><td><b>Kuvaus</b></td><td><b>ID</b></td></tr>";

while ($tulos = mysql_fetch_array($haku)) {
    echo "<tr><td>" . $tulos['nimi'] . "</td><td>" . $tulos['kuvaus'] . "</td><td>" . $tulos['id'] . "</td></tr>";
}
echo "</table>";
echo "</body></html>";
?>
<br />
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Poistettavan ID: <input type="int" name="id" />
    <input type="hidden" name="poista" />
    <input type="submit" value="Poista" />
    <hr />
    <div id="error"><?php echo $error; ?></div>
</form>

</body>

</html>

<?php
mysql_close($yhteys);
?>