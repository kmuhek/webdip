<?php
require_once "baza.class.php";

$veza = new Baza();
$veza->spojiDB();

$drzava = $_POST["drzava"];
$grad = $_POST["grad"];

$sql = "insert into lokacija (drzava, grad) value('$drzava', '$grad')";
$rezultat = $veza->updateDB($sql);

$idModerator = $_POST["idModerator"];

$sql2 = "insert into moderator_lokacija (korisnik_id, lokacija_id) values($idModerator, $rezultat)";

$rezultat2 = $veza->updateDB($sql2);

echo "1";

?>