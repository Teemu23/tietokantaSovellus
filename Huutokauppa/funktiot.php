<?php

function rekisteroi($yhteys) {
    global $error;

    $etunimi = mysql_real_escape_string(htmlentities(trim($_POST['enimi'])));
    $sukunimi = mysql_real_escape_string(htmlentities(trim($_POST['snimi'])));
    $ktunnus = mysql_real_escape_string(htmlentities(trim($_POST['ktunnus'])));
    $salasana = mysql_real_escape_string(htmlentities(trim($_POST['salasana'])));
    $vahsalasana = mysql_real_escape_string(htmlentities(trim($_POST['vah_salasana'])));
    $osoite = mysql_real_escape_string(htmlentities(trim($_POST['osoite'])));
    $puh_num = mysql_real_escape_string(htmlentities(trim($_POST['puh_num'])));
    $sahkoposti = mysql_real_escape_string(htmlentities(trim($_POST['email'])));


    if (empty($etunimi)) {
        $error .= "Et antanut etunimeä<br />";
    }
    if (empty($sukunimi)) {
        $error .= "Et antanut sukunimeä<br />";
    }
    if (empty($ktunnus)) {
        $error .= "Et antanut käyttäjätunnusta<br />";
    }
    if (empty($salasana)) {
        $error .= "Et antanut salasanaa<br />";
    }
    if (empty($vahsalasana)) {
        $error .= "Et vahvistanut salasanaa<br />";
    }
    if (empty($osoite)) {
        $error .= "Et antanut osoitettasi<br />";
    }
    if (empty($puh_num)) {
        $error .= "Et antanut puhelinnumeroasi<br />";
    }
    if (empty($sahkoposti)) {
        $error .= "Et antanut sähköpostiosoitettasi<br />";
    }
    if (strlen($salasana) < 6) {
        $error .= "Salasanan tulee olla vähintään kuusi merkkiä pitkä<br />";
    }
    if ($salasana != $vahsalasana) {
        $error .= "Salasanat eivät tästää<br />";
    }




    if (empty($error)) {
        mysql_query("INSERT INTO Asiakas(etunimi, sukunimi, kayttajatunnus, salasana, osoite, puh_num, sahkoposti)
            Values('$etunimi', '$sukunimi', '$ktunnus', '$salasana', '$osoite', '$puh_num', '$sahkoposti')") or die("Lisäys epäonnistui: " . mysql_error() . "</div></body></html>");
    }
}
?>

<?php

function kirjauduAsiakas($yhteys) {

    $ktunnus = mysql_real_escape_string(htmlentities(trim($_POST['ktunnus'])));
    $salasana = mysql_real_escape_string(htmlentities(trim($_POST['salasana'])));

    $sql = "SELECT * FROM Asiakas WHERE kayttajatunnus = '$ktunnus' and salasana = '$salasana'";

    $tulos = mysql_query($sql);

    $laske = mysql_num_rows($tulos);
    echo '$laske';
    echo "jotain";

    if ($laske == 1) {
        $_SESSION['ktunnus'] = $_POST['ktunnus'];
        header("location: kirjautunutAsiakas.php");
    } else {
        echo "Väärä käyttäjätunnus tai salasana";
    }
}
?>
<?php

function kirjauduMeklari($yhteys) {

    $ktunnus = mysql_real_escape_string(htmlentities(trim($_POST['ktunnus'])));
    $salasana = mysql_real_escape_string(htmlentities(trim($_POST['salasana'])));

    $sql = "SELECT * FROM Meklari WHERE meklaritunnus = '$ktunnus' and salasana = '$salasana'";

    $tulos = mysql_query($sql);

    $laske = mysql_num_rows($tulos);
    echo '$laske';
    echo "jotain";

    if ($laske == 1) {
        $_SESSION['ktunnus'] = $_POST['ktunnus'];
        header("location: kirjautunutMeklari.php");
    } else {
        echo "Väärä käyttäjätunnus tai salasana";
    }
}
?>

<?php

function lisaaTuoteEsite($yhteys) {
    global $error;

    $nimi = mysql_real_escape_string(htmlentities(trim($_POST['nimi'])));
    $kuvaus = mysql_real_escape_string(htmlentities(trim($_POST['kuvaus'])));

    if (empty($nimi)) {
        $error .= "Et antanut nimeä<br />";
    }
    if (empty($kuvaus)) {
        $error .= "Et antanut kuvausta<br />";
    }
    if (empty($error)) {
        mysql_query("INSERT INTO Tuote_esite(nimi, kuvaus)
            Values('$nimi', '$kuvaus')") or die("Lisäys epäonnistui: " . mysql_error() . "</div></body></html>");
    }
}
?>

<?php

function lisaaTuote($yhteys) {
    global $error;
    date_default_timezone_set("UTC");
    date_default_timezone_set("Europe/Helsinki");

    $minimihinta = mysql_real_escape_string(htmlentities(trim($_POST['mhinta'])));
    $kuva = mysql_real_escape_string(htmlentities(trim($_POST['kuva'])));
    $alk_pvm = mysql_real_escape_string(htmlentities(trim($_POST['a_pvm'])));
    $lop_pvm = mysql_real_escape_string(htmlentities(trim($_POST['l_pvm'])));
    $Tuote_esite_id = mysql_real_escape_string(htmlentities(trim($_POST['id'])));

    if (empty($minimihinta)) {
        $error .= "Et antanut minimihintaa<br />";
    }

    if (empty($lop_pvm)) {
        $error .= "Et antanut lopetus päivämäärää..<br />";
    }
    if (empty($Tuote_esite_id)) {
        $error .= "Et antanut Tuote-esitettä.<br />";
    }
    if (!empty($alk_pvm)) {
        if ($alk_pvm <= date("Y-m-d H:i:s")) {
            $error .= "Antamasi aloituspäivä on jo mennyt (päivämäärä tulee antaa muodossa YYYY.MM.DD HH:MM:SS).<br />";
        }
    }
    if ($lop_pvm < date("Y-m-d H:i:s")) {
        $error .= "Antamasi lopetuspäivä on jo mennyt (päivämäärä tulee antaa muodossa YYYY.MM.DD HH:MM:SS).<br />";
    }
    if ($lop_pvm < $alk_pvm) {
        $error .= "Lopetuspäivän tulee olla aloituspäivää myöhemmin (päivämäärä tulee antaa muodossa YYYY.MM.DD HH:MM:SS).<br />";
    }
    if (empty($error)) {
        if(empty($alk_pvm)){
            $alk_pvm = date("Y-m-d H:i:s");
        }
        mysql_query("INSERT INTO Tuote(minimihinta, kuva, alk_pvm, lop_pvm, Tuote_esite_id)
            Values('$minimihinta', '$kuva', '$alk_pvm', '$lop_pvm', '$Tuote_esite_id')") or die("Lisäys epäonnistui: " . mysql_error() . "</div></body></html>");
    }
}
?>
<?php

function poistaTuoteEsite($yhteys) {
    global $error;

    $id = mysql_real_escape_string(htmlentities(trim($_POST['id'])));

    if (empty($id)) {
        $error .= "Et antanut poistettavan id:tä<br />";
    }

    if (empty($error)) {
        mysql_query("DELETE FROM Tuote_esite where id='$id'") or die("Poisto epäonnistui: " . mysql_error() . "</div></body></html>");
    }
}
?>

<?php

function poistaTuote($yhteys) {
    global $error;

    $id = mysql_real_escape_string(htmlentities(trim($_POST['id'])));

    if (empty($id)) {
        $error .= "Et antanut poistettavan id:tä<br />";
    }

    if (empty($error)) {
        mysql_query("DELETE FROM Tuote where tuoteID='$id'") or die("Poisto epäonnistui: " . mysql_error() . "</div></body></html>");
    }
}
?>


<?php

function tuotteet($yhteys) {
    $nimi = mysql_real_escape_string(htmlentities(trim($_POST['nimi'])));
    $kuvaus = mysql_real_escape_string(htmlentities(trim($_POST['kuvaus'])));
    $minimihinta = mysql_real_escape_string(htmlentities(trim($_POST['mhinta'])));
    $kuva = mysql_real_escape_string(htmlentities(trim($_POST['kuva'])));
    $alk_pvm = mysql_real_escape_string(htmlentities(trim($_POST['apvm'])));
    $lop_pvm = mysql_real_escape_string(htmlentities(trim($_POST['lpvm'])));
    $tuote_esite_id = mysql_real_escape_string(htmlentities(trim($_POST['tuote_esite_id'])));

    $kysely = "SELECT * FROM Tuote, Tuote_esite";
    $haku = mysql_query($kysely, $yhteys) or die("virhe kyselyssä!");


    echo "<table border>";
    echo "<tr><td><b>nimi</b></td><td><b>kuvaus</b></td><td><b>minimihinta</b></td><td><b>kuva</b></td>
        <td><b>alk_pvm</b></td><td><b>lop_pvm</b></td><td><b>tuote_esite_id</b></td></tr>";

    for ($i = 0; $i < mysql_num_rows($haku); $i++) {
        $nimi = mysql_result($haku, $i, "Nimi");
        $kuvaus = mysql_result($haku, $i, "kuvaus");
        $minimihinta = mysql_result($haku, $i, "minimihinta");
        $kuva = mysql_result($haku, $i, "kuva");
        $alk_pvm = mysql_result($haku, $i, "alk_pvm");
        $lop_pvm = mysql_result($haku, $i, "lop_pvm");
        $tuote_esite_id = mysql_result($haku, $i, "Tuote_esite_id");

        echo"<tr><td>$nimi</td><td>$kuvaus</td><td>$minimihinta</td>td>$kuva</td>td>$alk_pvm</td>td>$lop_pvm</td>td>$tuote_esite_id</td></tr>";
    }
    echo "</table>";
    echo "</body></html>";
}
?>

<?php

function teeHuuto($yhteys) {
    global $error;

    date_default_timezone_set("UTC");
    date_default_timezone_set("Europe/Helsinki");

    $asiakasnro = mysql_real_escape_string(htmlentities(trim($_POST['asiakasnro'])));
    $uusiMaara = mysql_real_escape_string(htmlentities(trim($_POST['maara'])));
    $Tuote_id = mysql_real_escape_string(htmlentities(trim($_POST['id'])));


    $kysely = "Select maara FROM Huuto where tuoteID='$Tuote_id'";
    $kysely2 = "Select minimihinta FROM Tuote where tuoteID='$Tuote_id'";
    $kysely3 = "Select alk_pvm, lop_pvm From Tuote where tuoteID='$Tuote_id'";

    $haku = mysql_query($kysely, $yhteys) or die("virhe kyselyssä!");
    $haku2 = mysql_query($kysely2, $yhteys) or die("virhe kyselyssä!");
    $haku3 = mysql_query($kysely3, $yhteys) or die("virhe kyselyssä!");

    $tulos = mysql_fetch_array($haku);
    $tulos2 = mysql_fetch_array($haku2);
    $tulos3 = mysql_fetch_array($haku3);

    if (empty($asiakasnro)) {
        $error .= "Et antanut asiakasnumeroa<br />";
    }
    if (empty($uusiMaara)) {
        $error .= "Et antanut summaa<br />";
    }
    if (empty($Tuote_id)) {
        $error .= "Et antanut tuote id:ta<br />";
    }
    if ($tulos3['alk_pvm'] > date("Y-m-d H:i:s")) {
        $error .= "Tuotteen huutaminen ei ole vielä alkanut<br />";
    }
    if ($tulos3['lop_pvm'] < date("Y-m-d H:i:s")) {
        $error .= "Tuotteen huutaminen on päättynyt<br />";
    }

    if (empty($error)) {
        if ((empty($haku)) && ($uusiMaara >= $tulos2['minimihinta'])) {
            mysql_query("INSERT INTO Huuto(asiakasnumero, tuoteID, maara)
            Values('$asiakasnro', '$Tuote_id', '$uusiMaara')") or die("Lisäys epäonnistui: " . mysql_error() . "</div></body></html>");
        } else if (($tulos['maara'] < $uusiMaara)) {
            if (($uusiMaara >= $tulos2['minimihinta'])) {
                mysql_query("DELETE FROM Huuto Where tuoteID='$Tuote_id'");
                mysql_query("INSERT INTO Huuto(asiakasnumero, tuoteID, maara)
                Values('$asiakasnro', '$Tuote_id', '$uusiMaara')") or die("Lisäys epäonnistui: " . mysql_error() . "</div></body></html>");
            } else {
                echo ("Sinun tulee ylittää tuotteen minimihinta, joka on " . $tulos2['minimihinta'] . "</div></body></html>");
            }
        }
        else
            echo("Sinun tulee ylittää edellinen huuto, joka oli " . $tulos['maara'] . "</div></body></html>");
    }
}
?>
<?php

function tarkistaKirjautuminen($yhteys) {

    $ktunnus = mysql_real_escape_string(htmlentities(trim($_POST['ktunnus'])));
    $salasana = mysql_real_escape_string(htmlentities(trim($_POST['salasana'])));


    $sql = "SELECT * FROM Asiakas WHERE kayttajatunnus = '$ktunnus' and salasana = '$salasana'";

    $tulos = mysql_query($sql);

    $laske = mysql_num_rows($tulos);

    if ($laske == 1) {
        $_SESSION['ktunnus'] = $_POST['ktunnus'];
        header("location: kirjautunutAsiakas.php");
    } else {
        echo "Väärä käyttäjätunnus tai salasana";
    }
}
?>
