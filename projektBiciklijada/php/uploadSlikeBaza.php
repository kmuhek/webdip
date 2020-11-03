<?php 

require_once "baza.class.php";
require_once "sesija.class.php";

$veza = new Baza();
$veza->spojiDB();

$korisnik = Sesija::dajKorisnika();
$korime = $korisnik["korisnik"];

$utrkaId = $_POST["utrkaId"];
echo $utrkaId;

$upit2 = "select korisnik_id from korisnik where korisnicko_ime = '$korime'";
$rezultat2 = $veza->selectDB($upit2);

$red = $rezultat2->fetch_assoc();

$korisnikId = $red["korisnik_id"];

$putanja = "slike/";
$target_file = $putanja . basename($_FILES["slika"]["name"]);
$slika = $_FILES["slika"]["name"];
$tmp = "";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submitBtn"])) {
  $check = getimagesize($_FILES["slika"]["tmp_name"]);
  $tmp = $_FILES["slika"]["tmp_name"];
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
}

$putanja .= $slika;

move_uploaded_file($tmp, $putanja);

$sql = "update rezultat_utrka set slika = '$slika' where korisnik_id = $korisnikId and utrka_id = $utrkaId";

$rezultat = $veza->updateDB($sql);

header("Location: ../html/index.html");


