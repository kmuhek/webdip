<?php
require_once "baza.class.php";

$veza = new Baza();
$veza->spojiDB();

$sql = "select korisnicko_ime, korisnik_id from korisnik where uloga_id = 3";
$rezultat = $veza->selectDB($sql);

header("Content-Type: application/json; charset=UTF-8");

class lokacija{
    public $korime = "";
    public $idKorisnik = "";
}
$json = [];

while(true){
    $red = $rezultat->fetch_assoc();
    if(!$red){
        break;
    }
    $lokacija = new lokacija();

    $lokacija->korime = $red["korisnicko_ime"];
    $lokacija->idKorisnik = $red["korisnik_id"];

    array_push($json, $lokacija);

}

echo json_encode($json);
?>