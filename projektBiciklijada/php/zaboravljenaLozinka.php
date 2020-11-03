<?php
    require_once "baza.class.php";

    if(isset($_POST["email"])){
        $veza = new Baza();
        $veza->spojiDB();
        $email = $_POST["email"];

        $upit = "select * from korisnik where email = '$email'";
        $rezultat = $veza->selectDB($upit);

        $znakoviLozinka = "ABCDEFGHIJKLMNOPRSTUVZabcdefghijklmnoprstuvz0123456789";
        $novaLozinka = "";
        $novaHashLozinka = hash('sha256', $novaLozinka);

        for($i = 0; $i < 6; $i++){
            $novaLozinka .= $znakoviLozinka[rand(0, strlen($znakoviLozinka)-1)];
        }

        $poruka = "Vaš aktivacijski kod je: $novaLozinka";

        if($rezultat != null){
            $red = $rezultat->fetch_assoc();

            $korime = $red["korisnicko_ime"];

            $upitLozinka = "update korisnik set lozinka='$novaLozinka', potvrda_lozinke='$novaHashLozinka' where korisnicko_ime = '$korime'";
            $rezultatLozinka = $veza->updateDB($upitLozinka);

            mail($email, "Nova lozinka", $poruka);
            header("Location: ../html/prijava.php");
        }
    }
