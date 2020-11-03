<?php
    require_once "../php/sesija.class.php";

    Sesija::kreirajSesiju();

    $uloga = $_SESSION["uloga"];

    if(!isset($uloga) || $uloga < 2){
        header("Location: index.html");
    }
?>

<!DOCTYPE html>
<html lang="hr">
  <head>
    <title>Prijava utrka</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="naslov" content="PocetnaStranica" />
    <meta name="author" content="KMuhek" />
    <link
      href="https://fonts.googleapis.com/css2?family=Mali:wght@300&family=Walter+Turncoat&display=swap"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
    <link href="../css/kmuhek.css" rel="stylesheet" type="text/css" />
    <link
      href="../css/kmuhek_prilagodbe.css"
      rel="stylesheet"
      type="text/css"
    />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script defer src="../javascript/kmuhek.js"></script>
    <script defer src="../javascript/prijavaNaUtrku.js"></script>
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

      <h1 class="naslov">Prijava utrka</h1>

      <form action="../php/odjava.php">
        <input type="submit" class="gumbOdjava" name="gumbOdjava" value="odjava">
      </form>
    </header>
    <main class="formaUtrka">
      <form class="formaLokacija" method="POST" id="formaUtrke" name="formaUtrke" action="">
        <label for="Utrka">Utrka:</label><br>
        <select id="utrkeDropdown">
            <option value=""></option>
        </select><br>

        <label for="ime">Ime:</label><br>
        <input type="text" name="ime" id="ime"><br>

        <label for="prezime">Prezime:</label><br>
        <input type="text" name="prezime" id="prezime"><br>
        
        <label for="godRod">Godina rođenja:</label><br>
        <input type="number" name="godRod" id="godRod"><br>

        <label for="email">Email:</label><br>
        <input type="text" name="email" id="email"><br>

        <button class="gumbKreirajLok" id="gumbPosalji">Pošalji</button>
      </form>
    </main>
    <footer>
      <p>
        &copy Kristina Muhek<br />
        Kontakt: kmuhek@foi.hr
      </p>
    </footer>
  </body>
</html>
