<?php
    include 'baza.class.php';
    
    if(isset($_GET["korime"])){
        $veza = new Baza();
        $veza->spojiDB();
        
        $korime = $_GET["korime"];
        $upit = "select korisnicko_ime from korisnik where korisnicko_ime = '$korime'";

        $rezultat = $veza->selectDB($upit);
        $polje = $rezultat->fetch_assoc();

        if($polje == null){
            echo 0;
        }else{
            echo 1;
        }

    }
?>