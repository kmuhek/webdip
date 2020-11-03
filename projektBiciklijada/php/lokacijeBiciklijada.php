<?php
        require_once "baza.class.php";
    
        $veza = new Baza();
        $veza->spojiDB();
    
        $sql = "select l.lokacija_id as idLokacija, concat(l.drzava, ', ' ,l.grad) as Lokacija, count(u.utrka_id) as Utrke from utrka u join lokacija l on u.lokacija_id = l.lokacija_id group by l.grad";
        $rezultat = $veza->selectDB($sql);

        header("Content-Type: application/json; charset=UTF-8");

        class utrka{
            public $lokacija = "";
            public $brojUtrka = "";
            public $idLokacija = "";
        }
        $json = [];
        
        while(true){
            $red = $rezultat->fetch_assoc();
            if(!$red){
                break;
            }
            $utrka = new utrka();

            $utrka->lokacija = $red["Lokacija"];
            $utrka->brojUtrka = $red["Utrke"];
            $utrka->idLokacija = $red["idLokacija"];

            array_push($json, $utrka);

        }
        
        echo json_encode($json);
?>