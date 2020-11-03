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
    
        $sql = "select r.utrka_id, concat(l.drzava, ', ' ,l.grad) as Lokacija, u.naziv, r.mjesto from utrka u join lokacija l on u.lokacija_id = l.lokacija_id join rezultat_utrka r on r.utrka_id = u.utrka_id where r.korisnik_id = $korisnikId";
        $rezultat = $veza->selectDB($sql);

        header("Content-Type: application/json; charset=UTF-8");

        class utrka{
            public $lokacija = "";
            public $nazivUtrke = "";
            public $mjesto = "";
            public $idUtrka = "";
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
            $utrka->mjesto = $red["mjesto"];
            $utrka->idUtrka = $red["utrka_id"];

            array_push($json, $utrka);

        }
        
        echo json_encode($json);
?>