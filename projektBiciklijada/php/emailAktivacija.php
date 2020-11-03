<?php 
    require_once "baza.class.php";

    if(isset($_GET["token"])){
        $veza = new Baza();
        $veza->spojiDB();

        $korime = $_GET["korime"];
        $token = $_GET["token"];
        $tokenDo = date("Y-m-d H:i:s");

        $upit = "select * from korisnik where korisnicko_ime = '$korime'";
        $rezultat = $veza->selectDB($upit);
        $red = $rezultat->fetch_assoc();

        if($token == $red["tokenEmail"] && $tokenDo <= $red["tokenDoEmail"]){
            $upit = "update korisnik set tokenEmail = null where korisnicko_ime = $korime";
            $rezultat = $veza->updateDB($upit);
            echo "<p>Vaš račun je uspješno aktiviran</p>";
        }else{
            echo "<p>Prošlo je vrijeme aktivacije. Niste aktivirali račun</p>";
        }
    }else{
        header("Location: ../html/index.html");
    }
?>