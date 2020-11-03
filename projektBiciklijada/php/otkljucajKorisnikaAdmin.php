<?php
    require_once 'baza.class.php';

    if(isset($_GET["korime"])){
        $veza = new Baza();
        $veza->spojiDB();

        $korime = $_GET["korime"];

        $upit = "update korisnik set blokiran = 0 where korisnicko_ime = '$korime'";

        $rezultat = $veza->updateDB($upit);
    }
?>