<?php
session_start();
if (!isset($_SESSION['ktunnus'])) {
header('location:kirjauduMeklari.php');
}
header('Content-Type: text/html; charset=UTF-8');
header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Pragma: no-cache');
?>
<!DOCTYPE HTML SYSTEM "about:legacy-compat">
<html>
    <head>
        <title>Huutokauppa</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="cache-control" content="no-cache" />
        <meta name="description" content="Huutokauppa"/>
        <meta name="keywords" content="Huutokauppa"/>
        <meta name="author" content="Teemu Siltanen"/>
    </head>
    <body bgcolor="rgb=#C0C0C0">
        <h1>Huutokauppa(Meklari)</h1>
        <p>
            <a href="lisaaTuoteEsite.php">Lisää tuote-esite</a> |
            <a href="lisaaTuote.php">Lisää tuote</a> |
            <a href="poistaTuoteEsite.php">Poista tuote-esite</a> |
            <a href="poistaTuote.php">Poista tuote</a> |
            <a href="etusivu.php">Kirjaudu ulos</a> |
        </p>
        <hr />

