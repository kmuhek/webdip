
<?php
    require_once "baza.class.php";

    $veza = new Baza();
    $veza->spojiDB();

    $sql = "select korisnicko_ime, blokiran from korisnik";
    $rezultat = $veza->selectDB($sql);

    header("Content-Type: application/json; charset=UTF-8");

    class utrka
    {
        public $korime = "";
        public $blokiran = "";
    }
    $json = [];

    while (true) {
        $red = $rezultat->fetch_assoc();
        if (!$red) {
            break;
        }
        $utrka = new utrka();

        $utrka->korime = $red["korisnicko_ime"];
        $utrka->blokiran = $red["blokiran"];

        array_push($json, $utrka);
    }

    echo json_encode($json);
?>




