<?php
        require_once "baza.class.php";
    
        $veza = new Baza();
        $veza->spojiDB();
        $datumSad = date("Y-m-d H:i:sa");
    
        $sql = "select u.utrka_id, u.naziv as nazivUtrke, concat(l.drzava, ', ' ,l.grad) as Lokacija, u.datum_vrijeme_pocetak as PocetakUtrke, u.broj_natjecatelja from utrka u join lokacija l on u.lokacija_id = l.lokacija_id where u.datum_vrijeme_pocetak > '$datumSad'";
        $rezultat = $veza->selectDB($sql);

        header("Content-Type: application/json; charset=UTF-8");

        class utrka{
            public $lokacija = "";
            public $PocetakUtrke = "";
            public $broj_natjecatelja = "";
            public $nazivUtrke = "";
            public $idUtrke = "";
        }
        $json = [];
        
        while(true){
            $red = $rezultat->fetch_assoc();
            if(!$red){
                break;
            }
            $utrka = new utrka();

            $utrka->lokacija = $red["Lokacija"];
            $utrka->PocetakUtrke = $red["PocetakUtrke"];
            $utrka->broj_natjecatelja = $red["broj_natjecatelja"];
            $utrka->nazivUtrke = $red["nazivUtrke"];
            $utrka->idUtrke = $red["utrka_id"];

            array_push($json, $utrka);

        }
        
        echo json_encode($json);
?>