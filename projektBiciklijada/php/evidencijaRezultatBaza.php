<?php
        require_once "baza.class.php";
    
        $veza = new Baza();
        $veza->spojiDB();
    
        $sql = "select k.korisnik_id, u.utrka_id, k.ime, k.prezime, u.datum_vrijeme_pocetak, u.naziv, r.datum_vrijeme from korisnik k join prijava p on k.korisnik_id=p.korisnik_id join utrka u on u.utrka_id=p.utrka_id join rezultat_utrka r on r.utrka_id= u.utrka_id where p.odustao = 0";
        $rezultat = $veza->selectDB($sql);

        header("Content-Type: application/json; charset=UTF-8");

        class utrka{
            public $ime = "";
            public $prezime = "";
            public $pocetakUtrke = "";
            public $nazivUtrke = "";
            public $idUtrke = "";
            public $idKorisnik = "";
            public $vrijemeKorisnik = "";
        }
        $json = [];
        
        while(true){
            $red = $rezultat->fetch_assoc();
            if(!$red){
                break;
            }
            $utrka = new utrka();

            $utrka->ime = $red["ime"];
            $utrka->prezime = $red["prezime"];
            $utrka->pocetakUtrke = $red["datum_vrijeme_pocetak"];
            $utrka->idUtrke = $red["utrka_id"];
            $utrka->nazivUtrke = $red["naziv"];
            $utrka->idKorisnik = $red["korisnik_id"];
            $utrka->vrijemeKorisnik = $red["datum_vrijeme"];


            array_push($json, $utrka);

        }
        
        echo json_encode($json);
?>