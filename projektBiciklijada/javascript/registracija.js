var gumbRegistracija = document.getElementById("gumbReg");
gumbRegistracija.disabled = true;

var zastavicaCaptcha = false;
var zastavicaIme = false;
var zastavicaPrezime = false;
var zastavicaLozinka = false;
var zastavicaPotvrdeLozinke = true;
var zastavicaKorime = false;
var zastavicaEmail = false;

function provjeraGumba() {
  if (
    zastavicaCaptcha &&
    zastavicaIme &&
    zastavicaLozinka &&
    zastavicaPotvrdeLozinke &&
    zastavicaPrezime &&
    zastavicaKorime &&
    zastavicaEmail
  ) {
    gumbRegistracija.disabled = false;
  } else {
    gumbRegistracija.disabled = true;
  }
}

$("#korime").keyup(function (e) {
  $.ajax({
    url: "../php/provjeraKorime.php",
    method: "GET",
    data: { korime: $("#korime").val() },
    success: function (e) {
      if (e === "1") {
        $("#korimeGreska").html("Korisničko ime već postoji");
        zastavicaKorime = false;
      } else {
        $("#korimeGreska").html("");
        zastavicaKorime = true;
      }
      provjeraGumba();
    },
  });
});

function captchaVerifikacija(token) {
  var kljuc = "6Lf_p_4UAAAAANdU1HBXAAPEbZdJU7cJXeDkRpDE";

  $.ajax({
    url:
      "https://cors-anywhere.herokuapp.com/https://www.google.com/recaptcha/api/siteverify",
    method: "POST",
    data: { secret: kljuc, response: token },
    crossDomain: true,
    dataType: "json",

    success: function (response) {
      zastavicaCaptcha = response.success;
      provjeraGumba();
    },
  });
}

var ime = document.getElementById("ime");

ime.addEventListener("keyup", function (e) {
  var imeInput = $("#ime").val();
  var imeInputRegex = new RegExp(/^[A-Z]\w*/);
  var ok = imeInputRegex.test(imeInput);
  if (!ok) {
    $("#imeGreska").html("Ime mora početi s velikim slovom");
    zastavicaIme = false;
  } else {
    $("#imeGreska").html("");
    zastavicaIme = true;
  }
  provjeraGumba();
});

var prezime = document.getElementById("prezime");

prezime.addEventListener("keyup", function (e) {
  var prezimeInput = $("#prezime").val();
  var prezimeInputRegex = new RegExp(/^[A-Z]\w*/);
  var ok = prezimeInputRegex.test(prezimeInput);
  if (!ok) {
    $("#prezimeGreska").html("Prezime mora početi s velikim slovom");
    zastavicaPrezime = false;
  } else {
    $("#prezimeGreska").html("");
    zastavicaPrezime = true;
  }
  provjeraGumba();
});

var lozinka = document.getElementById("lozinka");

lozinka.addEventListener("keyup", function (e) {
  var lozinka = $("#lozinka").val();

  if (lozinka.length > 14) {
    $("#lozinkaGreska").html("Lozinka ne smije biti duža od 14 znakova");
    zastavicaLozinka = false;
  } else {
    $("#lozinkaGreska").html("");
    zastavicaLozinka = true;
  }
  provjeraGumba();
});

var potvrdaLozinke = document.getElementById("potvrdaLozinke");

potvrdaLozinke.addEventListener("keyup", function (e) {
  var ponovljenaLozinka = $("#potvrdaLozinke").val();
  var pravaLozinka = $("#lozinka").val();

  if (ponovljenaLozinka === pravaLozinka) {
    $("#potvrdaLozinkeGreska").html("");
    zastavicaPotvrdeLozinke = true;
  } else {
    $("#potvrdaLozinkeGreska").html("Ponovljena lozinka mora biti ista kao i lozinka");
    zastavicaPotvrdeLozinke = false;
  }
  provjeraGumba();
});

var email = document.getElementById("email");

email.addEventListener("keyup", function (e) {
  var emailInput = $("#email").val();
  var emailInputRegex = new RegExp(/^[\w,.]*@\w*\.\w{2,6}$/);
  var ok = emailInputRegex.test(emailInput);
  if (!ok) {
    $("#emailGreska").html("Email mora završiti sa .nešto i mora imati znak @ u sebi");
    zastavicaEmail = false;
  } else {
    $("#emailGreska").html("");
    zastavicaEmail = true;
  }
  provjeraGumba();
});
