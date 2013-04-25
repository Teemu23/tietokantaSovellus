<?php
$error = "";
include("/home/teemsilt/htdocs/Huutokauppa/mysql/yhteys.php");
include("/home/teemsilt/htdocs/Huutokauppa/funktiot.php");
if (isset($_POST['laheta'])) {
    rekisteroi($yhteys);
}
?>



<?php include("yla.php"); ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <h2> Rekisteröityminen </h2>
    Etunimi: <input type="text" name="enimi" /> <br />
    Sukunimi: <input type="text" name="snimi" /> <br />
    Käyttäjätunnus: <input type="text" name="ktunnus" /> <br />
    Salasana: <input type="password" name="salasana" /> <br />
    Vahvista salasana: <input type="password" name="vah_salasana" /> <br />
    Osoite: <input type="text" name="osoite" /> <br />
    Puhelinnumero: <input type="text" name="puh_num" /> <br />
    Sähköposti: <input type="text" name="email" /> <br />
    Vahvistan ylläolevien tietojen olevan oikein <input type="checkbox" name="tiedot_oik" value="1" />
    <input type="hidden" name="laheta" />
    <input type="submit" value="Rekisteröidy" />
    <input type="reset" value="Tyhjennä" />
    <hr />
    <div id="error"><?php echo $error; ?></div>
</form>

</body>

</html>

<?php
mysql_close($yhteys);
?>

