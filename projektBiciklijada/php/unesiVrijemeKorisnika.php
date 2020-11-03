<?php  
    require_once 'baza.class.php';

    $veza = new Baza();
    $veza->spojiDB();

    $vrijemeKorisnik = $_POST["datumKor"];
    $korisnikId = $_POST["idKorisnik"];
    $idUtrke = $_POST["idUtrke"];

    $upit = "update rezultat_utrka set datum_vrijeme = '$vrijemeKorisnik' where korisnik_id = $korisnikId and utrka_id = $idUtrke";

    $rezultat = $veza->updateDB($upit);

    header("Location: ../html/evidencijaRezultata.php");
?>