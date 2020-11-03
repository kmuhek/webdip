<?php
    if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
      $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
      header('HTTP/1.1 301 Moved Permanently');
      header('Location: ' . $location);
      exit;
    }
?>

<!DOCTYPE html>
<html lang="hr">
  <head>
    <title>Prijava</title>
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
    <script defer src="../javascript/prijava.js"></script>
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

      <h1 class="naslov">Prijava</h1>

      <form action="../php/odjava.php">
        <input type="submit" class="gumbOdjava" name="gumbOdjava" value="odjava">
      </form>
    </header>
    <main class="formaPrijava">
      <form
        class="formaLokacija"
        method="POST"
        id="formaPrijava"
        name="formaPrijava"
        action="";
      >
        <label for="Korime">Korisničko ime:</label><br />
        <input type="text" name="korime" id="korime" /><br />

        <label for="Lozinka">Lozinka:</label><br />
        <input type="password" name="lozinka" id="lozinka" /><br />     

        <label for="Zapamti">Zapamti me</label><br />
        <input type="checkbox" id="zapamti" name="zapamti" value="Zapamti me"><br />

        <span class="greska" id="greska"></span>

        <button class="gumbKreirajLok" id="gumbPrijava" name="gumbPrijava">Prijavi se</button><br />
        <a href="upisEmail.php">Zaboravljena lozinka</a>
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
