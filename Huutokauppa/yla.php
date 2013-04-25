<?php
session_start();
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
        <h1>Huutokauppa</h1>
        <p>
            <a href="etusivu.php">Etusivu</a> |
            <a href="kirjauduAsiakas.php">Kirjaudu sisään</a> |
            <a href="rekisterointi.php">Rekisteröidy</a> |
            <a href="tuote.php">Tuotteet</a> |
            <a href="kirjauduMeklari.php">Meklari</a> |
        </p>
        <hr />
