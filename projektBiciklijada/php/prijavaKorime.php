<?php
    require_once 'baza.class.php';
    require_once "sesija.class.php";

    if(isset($_GET["korime"])){
        $veza = new Baza();
        $veza->spojiDB();
        
        $korime = $_GET["korime"];
        $lozinka = $_GET["lozinka"];
        $upit = "select korisnicko_ime, lozinka, uloga_id from korisnik where korisnicko_ime = '$korime' and lozinka = '$lozinka'";

        $rezultat = $veza->selectDB($upit);
        $polje = $rezultat->fetch_assoc();

        if(($polje["korisnicko_ime"] && $polje["lozinka"]) == null){
            echo 0;
        }else{
            Sesija::kreirajKorisnika($korime, $polje["uloga_id"]);
            echo 1;
        }
    }
?>