<?php
require_once "baza.class.php";

$veza = new Baza();
$veza->spojiDB();

$sql = "select lokacija_id, concat(drzava, ', ' ,grad) as Lokacija from lokacija";
$rezultat = $veza->selectDB($sql);

header("Content-Type: application/json; charset=UTF-8");

class lokacija{
    public $naziv = "";
    public $idLokacija = "";
}
$json = [];

while(true){
    $red = $rezultat->fetch_assoc();
    if(!$red){
        break;
    }
    $lokacija = new lokacija();

    $lokacija->naziv = $red["Lokacija"];
    $lokacija->idLokacija = $red["lokacija_id"];

    array_push($json, $lokacija);

}

echo json_encode($json);
?>