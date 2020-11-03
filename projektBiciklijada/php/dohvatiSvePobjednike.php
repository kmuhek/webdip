<?php
require_once "baza.class.php";

$veza = new Baza();
$veza->spojiDB();

$idUtrke = $_POST["idUtrke"];
$idLokacija = $_POST["idLokacije"];

$sql = "select r.mjesto, k.korisnicko_ime from rezultat_utrka r join korisnik k on r.korisnik_id=k.korisnik_id join utrka u on u.utrka_id=r.utrka_id where mjesto is not null and u.utrka_id = $idUtrke and u.lokacija_id = $idLokacija order by r.mjesto asc";
$rezultat = $veza->selectDB($sql);

header("Content-Type: application/json; charset=UTF-8");

class lokacija{
    public $korime = "";
    public $mjesto = "";
}
$json = [];

while(true){
    $red = $rezultat->fetch_assoc();
    if(!$red){
        break;
    }
    $lokacija = new lokacija();

    $lokacija->korime = $red["korisnicko_ime"];
    $lokacija->mjesto = $red["mjesto"];

    array_push($json, $lokacija);

}

echo json_encode($json);
?>