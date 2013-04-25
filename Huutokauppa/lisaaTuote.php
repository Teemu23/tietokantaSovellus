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
tuoteEsitteet($yhteys);
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