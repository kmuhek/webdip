<?php 

require_once "baza.class.php";

$veza = new Baza();
$veza->spojiDB();

$idPrijava = $_POST["idPrijava"];
$datum = date("Y-m-d H:i:sa");

$sqlDatum = "select * from prijava p join utrka u on p.utrka_id = u.utrka_id where '$datum' < u.datum_vrijeme_pocetak and p.prijava_id = $idPrijava";
$rezultatDatum = $veza->selectDB($sqlDatum);

$redDatum = $rezultatDatum->fetch_assoc();
if($redDatum == null){
    echo "Utrka je već počela!";
    exit();
}

$putanja = "pdf/";
$target_file = $putanja . basename($_FILES["uplata"]["name"]);
$uplata = $_FILES["uplata"]["name"];
$tmp = "";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submitBtn"])) {
  $check = getimagesize($_FILES["uplata"]["tmp_name"]);
  $tmp = $_FILES["uplata"]["tmp_name"];
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
}

$putanja .= $uplata;

move_uploaded_file($tmp, $putanja);

$sql = "update prijava set pdf = '$uplata' where prijava_id = $idPrijava";

$rezultat = $veza->updateDB($sql);


header("Location: ../html/index.html");


