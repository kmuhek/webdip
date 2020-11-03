<?php
    require_once "baza.class.php";

    
    if(isset($_POST["korime"])){
        $veza = new Baza();
        $veza->spojiDB();
        $korime = $_POST["korime"];

        $upit = "update korisnik set blokiran=1 where korisnicko_ime = '$korime'";

        $rezultat = $veza->updateDB($upit);
    }
?>