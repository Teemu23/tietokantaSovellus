<?php
$error = "";
include("/home/teemsilt/htdocs/Huutokauppa/mysql/yhteys.php");
include("/home/teemsilt/htdocs/Huutokauppa/funktiot.php");
if (isset($_POST['lisaa'])) {
    lisaaTuote($yhteys);
}
?>
<?php include("ylaMeklari.php"); ?>
<h2> Tuote-esitteet: </h2>
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
<h3>Liitä uusi tuote tuote-esitteeseen:</h3>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">    
    Minimihinta: <input type="text" name="mhinta" /> <br />
    Kuva: <input type="text" name="kuva" /> <br />
    Alkamispäivä: <input type="date" name="a_pvm" /> <br />
    Loppumispäivä: <input type="date" name="l_pvm" /> <br />
    Tuote-esite ID: <input type="text" name="id" /> <br />
    <input type="hidden" name="lisaa" />
    <input type="submit" value="Lisää" />
    <input type="reset" value="Tyhjennä" />
    
    <div id="error"><?php echo $error; ?></div>
</form>

</body>
</html>

<?php
mysql_close($yhteys);
?>