<?php

    require_once "baza.class.php";
    require_once "sesija.class.php";
    
    $veza = new Baza();
    $veza->spojiDB();

    $korisnik = Sesija::dajKorisnika();
    $korime = $korisnik["korisnik"];

    $upit2 = "select korisnik_id from korisnik where korisnicko_ime = '$korime'";
    $rezultat2 = $veza->selectDB($upit2);

    $red = $rezultat2->fetch_assoc();

    $korisnikId = $red["korisnik_id"];

    $idUtrke = $_POST["idUtrke"];
    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $godinaRod = $_POST["godinaRod"];
    $email = $_POST["email"];

    $upit = "insert into prijava (ime, prezime, godina_rodjenja, email, utrka_id, korisnik_id) values ('$ime', '$prezime', '$godinaRod', '$email', $idUtrke, $korisnikId)";

    $rezultat = $veza->updateDB($upit);