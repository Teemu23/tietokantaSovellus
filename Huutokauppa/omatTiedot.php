<?php
session_start();
include("/home/teemsilt/htdocs/Huutokauppa/mysql/yhteys.php");
include("/home/teemsilt/htdocs/Huutokauppa/funktiot.php");
?>

<?php include("ylaAsiakas.php"); ?>
<h2>Omat tiedot</h2>

</body>
</html>
<?php


$ktunnus = $_SESSION['ktunnus'];

    $kysely = "SELECT * FROM Asiakas where kayttajatunnus='$ktunnus'";

    $haku = mysql_query($kysely, $yhteys) or die("virhe kyselyssä!");
    
    
    echo "<table border>";
    echo "<tr><td><b>Asiakasnumero</b></td><td><b>Etunimi</b></td><td><b>Sukunimi</b></td><td><b>Kayttajatunnus</b></td>
        <td><b>Osoite</b></td><td><b>Puhelinnumero</b></td><td><b>Sahkoposti</b></td></tr>";
    
    for($i = 0; $i < mysql_num_rows($haku); $i++){
        $asiakasnumero = mysql_result($haku, $i, "asiakasnumero");
        $etunimi = mysql_result($haku, $i, "etunimi");
        $sukunimi = mysql_result($haku, $i, "sukunimi");
        $ktunnus = mysql_result($haku, $i, "kayttajatunnus");
        $osoite = mysql_result($haku, $i, "osoite");
        $puh_num = mysql_result($haku, $i, "puh_num");
        $sahkoposti = mysql_result($haku, $i, "sahkoposti");

        
        echo"<tr><td>$asiakasnumero</td><td>$etunimi</td><td>$sukunimi</td><td>$ktunnus</td><td>$osoite</td><td>$puh_num</td><td>$sahkoposti</td></tr>";
    }
    echo "</table>";
    echo "</body></html>";

?>