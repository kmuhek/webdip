<?php
        require_once "baza.class.php";
    
        $veza = new Baza();
        $veza->spojiDB();
    
        $sql = "select u.utrka_id, l.lokacija_id, u.naziv, concat(l.drzava, ', ' ,l.grad) as lokacija from utrka u join lokacija l on u.lokacija_id = l.lokacija_id where datum_vrijeme_zavrsetak is not null";
        $rezultat = $veza->selectDB($sql);

        header("Content-Type: application/json; charset=UTF-8");

        class utrka{
            public $lokacija = "";
            public $nazivUtrke = "";
            public $utrkaId = "";
            public $lokacijaId = "";
        }
        $json = [];
        
        while(true){
            $red = $rezultat->fetch_assoc();
            if(!$red){
                break;
            }
            $utrka = new utrka();

            $utrka->lokacija = $red["lokacija"];
            $utrka->nazivUtrke = $red["naziv"];
            $utrka->utrkaId = $red["utrka_id"];
            $utrka->lokacijaId = $red["lokacija_id"];

            array_push($json, $utrka);

        }
        
        echo json_encode($json);
?>