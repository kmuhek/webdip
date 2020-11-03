<?php
require_once 'baza.class.php';

$veza = new Baza();
$veza->spojiDB();

$greska = false;
$ime = "";
$prezime = "";
$lozinka = "";
$hashLozinka = "";
$korime = "";
$email = "";
$aktivacijskiKod = "ABCDEFGHIJKLMNOPRSTUVZabcdefghijklmnoprstuvz0123456789";
$token = "";


if (isset($_POST["ime"])) {
    $ime = $_POST["ime"];
    $imeRegex = '/^[A-Z]\w*$/';
    if (!preg_match($imeRegex, $ime)) {
        $greska = true;
    }
}

if (isset($_POST["prezime"])) {
    $prezime = $_POST["prezime"];
    $prezimeRegex = '/^[A-Z]\w*/';
    if (!preg_match($prezimeRegex, $prezime)) {
        $greska = true;
    }
}

if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $emailRegex = '/^[\w,.]*@\w*\.\w{2,6}$/';
    if (!preg_match($emailRegex, $email)) {
        $greska = true;
    }
}

if (isset($_POST["lozinka"]) && isset($_POST["potvrdaLozinke"])) {
    $lozinka = $_POST["lozinka"];
    $hashLozinka = hash('sha256', $lozinka);
    $potvrdaLozinka = $_POST["potvrdaLozinke"];

    if (strlen($lozinka) > 14 || $lozinka != $potvrdaLozinka) {
        $greska = true;
    }
}

if (isset($_POST["korime"])) {
    $korime = $_POST["korime"];
    $upit = "select `korisnicko_ime` from korisnik where $korime = `korisnicko_ime`";
    $rezultat = $veza->selectDB($upit);

    if ($rezultat != NULL) {
        $greska = true;
    }
}

for($i = 0; $i < 6; $i++){
    $token .= $aktivacijskiKod[rand(0, strlen($aktivacijskiKod)-1)];
}

$link = "http://barka.foi.hr/WebDiP/2019_projekti/WebDiP2019x087/php/emailAktivacija.php?korime=$korime&token=$token";
$tokenDo = date("Y-m-d H:i:s", strtotime("+7 hours"));
$poruka = "Vaš aktivacijski kod je: <a href='$link'>ovdje</a>";

if ($greska) {
    echo("a");
    echo "Podaci nisu dobro uneseni";
} else {
    $sql = "insert into korisnik (ime, prezime, email, lozinka, `potvrda_lozinke`, `korisnicko_ime`, uloga_id, tokenEmail, tokenDoEmail) values ('$ime', '$prezime', '$email', '$lozinka', '$hashLozinka', '$korime', 2, '$token', '$tokenDo')";
    $rezultat = $veza->updateDB($sql);
    mail($email, "Aktivacijski kod", $poruka);
    header("Location: ../html/uspjesnaRegistracija.php");
}
