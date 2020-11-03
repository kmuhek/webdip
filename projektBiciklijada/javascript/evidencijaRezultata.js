$(document).ready(function () {
    var tablica = document.getElementById("bodyTablice");

    $.ajax({
        url: "../php/evidencijaRezultatBaza.php",
        method: "GET",
        dataType: "json",

        success: function (json) {
            var polje = json.map(function (utrka) {


                    var tr = document.createElement("tr");
                    var idUtrke = utrka.idUtrke;
                    var idKorisnik = utrka.idKorisnik;
                    var ime = document.createElement("td");
                    ime.innerHTML= utrka.ime;
                    var prezime = document.createElement("td");
                    prezime.innerHTML = utrka.prezime;
                    var pocetakUtrke = document.createElement("td");
                    pocetakUtrke.innerHTML = utrka.pocetakUtrke;
                    var nazivUtrke = document.createElement("td");
                    nazivUtrke.innerHTML = utrka.nazivUtrke;
                    var vrijemeKorisnika = document.createElement("td");
                    vrijemeKorisnika.innerHTML = `<a href='../html/unesiVrijemeKor.php?idUtrke=${idUtrke}&idKorisnik=${idKorisnik}'>unesi</a>`;
                    tr.append(ime);
                    tr.append(prezime);
                    tr.append(pocetakUtrke);
                    tr.append(nazivUtrke);
                    tr.append(vrijemeKorisnika);
                    return tr;


            });
            polje.forEach((tr) => {
                if(tr){
                    tablica.append(tr);
                }
            });
        },
    });

});
