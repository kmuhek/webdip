<?php
        require_once "baza.class.php";
        require_once "sesija.class.php";
    
        $veza = new Baza();
        $veza->spojiDB();

        $korisnik = Sesija::dajKorisnika();
        $korime = $korisnik["korisnik"];
    
        $upit2 = "select korisnik_id from korisnik where korisnicko_ime = '$korime'";
        $rezultat2 = $veza->selectDB($upit2);
    
        $red = $rezultat2->fetch_assoc();
    
        $korisnikId = $red["korisnik_id"];
    
        $sql = "select p.prijava_id, p.utrka_id, concat(l.drzava, ', ' ,l.grad) as Lokacija, u.naziv, u.datum_vrijeme_pocetak, p.racun_id from utrka u join lokacija l on u.lokacija_id = l.lokacija_id join prijava p on p.utrka_id = u.utrka_id where p.korisnik_id = $korisnikId and odustao=0";
        $rezultat = $veza->selectDB($sql);

        header("Content-Type: application/json; charset=UTF-8");

        class utrka{
            public $idPrijava = "";
            public $lokacija = "";
            public $nazivUtrke = "";
            public $pocetakUtrke = "";
            public $racun = "";
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
            $utrka->nazivUtrke = $red["naziv"];
            $utrka->pocetakUtrke = $red["datum_vrijeme_pocetak"];
            $utrka->racun = $red["racun_id"];
            $utrka->idUtrke = $red["utrka_id"];
            $utrka->idPrijava = $red["prijava_id"];

            array_push($json, $utrka);

        }
        
        echo json_encode($json);
?>