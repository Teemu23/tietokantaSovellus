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
tuoteEsitteet($yhteys);
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