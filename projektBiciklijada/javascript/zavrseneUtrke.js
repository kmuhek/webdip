$(document).ready(function () {
    var tablica = document.getElementById("bodyTablice");

    $.ajax({
        url: "../php/zavrseneUtrke.php",
        method: "GET",
        dataType: "json",

        success: function (json) {
            var polje = json.map(function (utrka) {
                var tr = document.createElement("tr");
                var idUtrke = utrka.utrkaId;
                var idLokacija = utrka.lokacijaId;
                var lokacija = document.createElement("td");
                lokacija.innerHTML = utrka.lokacija;
                var nazivUtrke = document.createElement("td");
                nazivUtrke.innerHTML = utrka.nazivUtrke;
                var pobjednik = document.createElement("td");
                pobjednik.innerHTML = `<a href='odrediPobjednika.php?idUtrke=${idUtrke}&idLokacije=${idLokacija}'>Odredi pobjednika</a>`;

                tr.append(lokacija);
                tr.append(nazivUtrke);
                tr.append(pobjednik);
 
                return tr;
            });
            polje.forEach((tr) => {
                tablica.append(tr);
            });
        },
    });

});