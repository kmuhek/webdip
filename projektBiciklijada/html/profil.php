<?php
    require_once "../php/sesija.class.php";

    Sesija::kreirajSesiju();

    $uloga = $_SESSION["uloga"];

    if (!isset($uloga) || $uloga < 2) {
        header("Location: index.html");
    }
?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <title>Moj profil</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="naslov" content="PocetnaStranica" />
    <meta name="author" content="KMuhek" />
    <link href="https://fonts.googleapis.com/css2?family=Mali:wght@300&family=Walter+Turncoat&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
    <link href="../css/kmuhek.css" rel="stylesheet" type="text/css" />
    <link href="../css/kmuhek_prilagodbe.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script defer src="../javascript/kmuhek.js"></script>
    <script defer src="../javascript/mojePrijave.js"></script>
    <script defer src="../javascript/mojiRezultati.js"></script>
</head>

<body>
<header class="headerGrid">
      <div id="izbornik" class="izbornik">
        <div class="zatvoriGumbPozicija">
          <a href="index.html"
            ><img class="logo" src="../multimedija/logo.png"
          /></a>
          <a href="" class="zatvoriGumb" id="zatvoriIzbornik">&times;</a>
        </div>
        <a href="dokumentacija.html">Dokumentacija</a>
        <a href="oAutoru.html">O autoru</a>
        <a href="prijava.php">Prijava</a>
        <a href="registracija.html">Registracija</a>
        <a href="profil.php">Moj profil</a>
        <a href="kreiranjeLokacije.php">Kreiranje lokacije</a>
        <a href="kreiranjeUtrke.php">Kreiranje utrke</a>
        <a href="otkljucavanjeBlokiranih.php">Blokirani korisnici</a>
        <a href="evidencijaRezultata.php">Evidencija rezultata</a>
        <a href="otkljucavanjeBlokiranih.php">Otključavanje/zaključavanje korisnika</a>
        <a href="popisZavrsenihUtrka.php">Popis završenih utrka</a>
      </div>

      <div class="gumbIzbornik" id="otvoriIzbornik">&#9776;</div>

      <h1 class="naslov">Moj profil</h1>

      <form action="../php/odjava.php">
        <input type="submit" class="gumbOdjava" name="gumbOdjava" value="odjava">
      </form>
    </header>
    <main class="gridProfil">
        <div class="informacije">
            <img class="mojProfilSlika" src="../multimedija/default.png" />
            <p>
                Vaši podaci
            </p>
        </div>
        <div class="tabliceProfila">
            <div class="overflowTablica">
                <table class="tablica" id="tablica">
                    <caption>
                        Moje prijave
                    </caption>

                    <thead class="zaglavljeTablice">
                        <tr>
                            <td>Lokacija</td>
                            <td>Utrka</td>
                            <td>Početak utrke</td>
                            <td>Račun</td>
                            <td>Razlog odustajanja</td>
                            <td>Odustajanje</td>
                        </tr>
                    </thead>
                    <tbody id="bodyTablice">

                    </tbody>
                </table>
                <a href="prijavaUtrka.php"><button class="gumbKreirajLok">Prijava na utrku</button></a>
            </div>
            <div class="tabliceProfila">
                <div class="overflowTablica">
                    <table class="tablica" id="tablica">
                        <caption>
                            Moji rezultati
                        </caption>
                        <thead class="zaglavljeTablice">
                            <tr>
                                <td>Lokacija</td>
                                <td>Utrka</td>
                                <td>Mjesto</td>
                                <td>Unos slike online</td>
                                <td>Dozvola za sliku</td>
                            </tr>
                        </thead>
                        <tbody id="bodyTablice2">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p>
            &copy Kristina Muhek<br />
            Kontakt: kmuhek@foi.hr
        </p>
    </footer>
</body>

</html>