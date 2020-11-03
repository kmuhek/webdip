<?php
require_once "baza.class.php";

$lokacijaId = $_GET["lokacija"];
$veza = new Baza();
$veza->spojiDB();

$sql = "select r.slika from rezultat_utrka r join utrka u on u.utrka_id = r.utrka_id where r.mjesto = 1 and u.lokacija_id = $lokacijaId and r.dozvola_slike = 1";
$rezultat = $veza->selectDB($sql);

header("Content-Type: application/json; charset=UTF-8");

class slika{
    public $url = "";
}
$json = [];

while(true){
    $red = $rezultat->fetch_assoc();
    if(!$red){
        break;
    }
    $slika = new slika();

    $slika->url = $red["slika"];

    array_push($json, $slika);
}

echo json_encode($json);
?>