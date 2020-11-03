<?php
    require_once "baza.class.php";
    require_once "sesija.class.php";
    
    if(isset($_POST["razlogOdustajanja"])){
        $veza = new Baza();
        $veza->spojiDB();
        
        $korisnik = Sesija::dajKorisnika();
        $korime = $korisnik["korisnik"];
        
        $upit2 = "select korisnik_id from korisnik where korisnicko_ime = '$korime'";
        $rezultat2 = $veza->selectDB($upit2);
        
        $red = $rezultat2->fetch_assoc();
        
        $korisnikId = $red["korisnik_id"];
        $idUtrke = $_POST["idUtrke"];
        $razlogOdustajanja = $_POST["razlogOdustajanja"];

        $upit = "update prijava set razlog_odustajanja = '$razlogOdustajanja' where korisnik_id = $korisnikId and utrka_id = $idUtrke";
        $rezultat = $veza->updateDB($upit);

        header("Location: ../html/profil.php");
    }