<?php
$error = "";
include("/home/teemsilt/htdocs/Huutokauppa/mysql/yhteys.php");
include("/home/teemsilt/htdocs/Huutokauppa/funktiot.php");
if (isset($_POST['poista'])) {
    poistaTuote($yhteys);
    
}
?>
<?php include("ylaMeklari.php"); ?>
<h2> Tuotteen poistaminen </h2>
<?php
$kysely = "Select nimi,kuvaus,minimihinta,kuva, alk_pvm, lop_pvm,Tuote.tuoteID, maara FROM Tuote LEFT OUTER JOIN Huuto ON Tuote.tuoteID=Huuto.tuoteID,Tuote_esite where Tuote_esite.id=Tuote.Tuote_esite_id group by Tuote.tuoteID order by Tuote.tuoteID";
$haku = mysql_query($kysely, $yhteys) or die(mysql_error());


echo "<table border>";
echo "<tr><td>Nimi</td><td>Kuvaus</td><td><b>Minimihinta</b></td><td><b>Kuva</b></td>
        <td><b>Aloituspäivämäärä</b></td><td><b>lopetuspäivämäärä</b></td><td><b>Tuote ID</td></b></tr>";

while ($tulos = mysql_fetch_array($haku)) {
    echo "<tr><td>" . $tulos['nimi'] . "</td><td>" . $tulos['kuvaus'] . "</td><td>" . $tulos['minimihinta'] . "</td><td>" . $tulos['kuva'] . "</td>
        <td>" . $tulos['alk_pvm'] . "</td><td>" . $tulos['lop_pvm'] . "</td><td>" . $tulos['tuoteID'] . "</td></tr>";
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