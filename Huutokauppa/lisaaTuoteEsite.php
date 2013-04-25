<?php
$error = "";
include("/home/teemsilt/htdocs/Huutokauppa/mysql/yhteys.php");
include("/home/teemsilt/htdocs/Huutokauppa/funktiot.php");
if (isset($_POST['lisaa'])) {
    lisaaTuoteEsite($yhteys);
    
}
?>
<?php include("ylaMeklari.php"); ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <h2> Tuote-esitteen lisäys </h2>
    Nimi: <input type="text" name="nimi" /> <br />
    Kuvaus: <br />
    <textarea name="kuvaus" rows="4" cols="30"></textarea> <br />
    <input type="hidden" name="lisaa" />
    <input type="submit" value="Lisää" />
    <input type="reset" value="Tyhjennä" />
    <hr />
    <div id="error"><?php echo $error; ?></div>
</form>

</body>

</html>

<?php
mysql_close($yhteys);
?>