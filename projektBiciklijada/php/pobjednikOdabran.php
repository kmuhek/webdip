<?php
require_once "baza.class.php";

$veza = new Baza();
$veza->spojiDB();

$korime = $_POST["korime"];
$razlogBiranja = $_POST["razlogBiranja"];
$idUtrke = $_POST["idUtrke"];
$idLokacije = $_POST["idLokacije"];

$sql = "update utrka set pobjednik='$korime', opis_pobjednik = '$razlogBiranja' where utrka_id =$idUtrke and lokacija_id = $idLokacije";

$rezultat2 = $veza->updateDB($sql);

echo "1";

?>