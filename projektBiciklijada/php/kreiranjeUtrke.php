<?php
require_once "baza.class.php";

$veza = new Baza();
$veza->spojiDB();

$utrka = $_POST["utrka"];
$idLokacije = $_POST["idLokacija"];
$startnina = $_POST["startnina"];
$brojNatjecatelja = $_POST["brojNatjecatelja"];
$datumPocetak = $_POST["datumPocetak"];

$sql = "insert into utrka (naziv, lokacija_id, startnina, broj_natjecatelja, datum_vrijeme_pocetak) values('$utrka', $idLokacije, $startnina, $brojNatjecatelja, '$datumPocetak')";

$rezultat2 = $veza->updateDB($sql);

echo "1";

?>