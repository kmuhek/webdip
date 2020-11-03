$(document).ready(function () {
    var tablica = document.getElementById("bodyTablice");

    $.ajax({
        url: "../php/mojePrijave.php",
        method: "GET",
        dataType: "json",

        success: function (json) {
            var polje = json.map(function (utrka) {
                var tr = document.createElement("tr");
                var idUtrke = utrka.idUtrke;
                var lokacija = document.createElement("td");
                lokacija.innerHTML = utrka.lokacija;
                var nazivUtrke = document.createElement("td");
                nazivUtrke.innerHTML = utrka.nazivUtrke;
                var pocetakUtrke = document.createElement("td");
                pocetakUtrke.innerHTML = utrka.pocetakUtrke;
                var racun = document.createElement("td");
                racun.innerHTML = `<a href='../html/uplataRacuna.php?idPrijava=${utrka.idPrijava}'>Uplati</a>`;
                var razlogOdustajanja = document.createElement("td");
                razlogOdustajanja.innerHTML = `<a href="../html/razlogOdustajanja.php?idUtrke=${idUtrke}">Upiši razlog</a>`;
                var odustani = document.createElement("td");
                odustani.innerHTML = "<a href=''>odustani</a>";

                odustani.addEventListener("click", function(e){
                    e.preventDefault();
                    odustaniUtrka(idUtrke);
                })

                tr.append(lokacija);
                tr.append(nazivUtrke);
                tr.append(pocetakUtrke);
                tr.append(racun);
                tr.append(razlogOdustajanja);
                tr.append(odustani);
                return tr;
            });
            polje.forEach((tr) => {
                tablica.append(tr);
            });
        },
    });

    function odustaniUtrka(idUtrke){
        $.ajax({
            url: "../php/odustaniUtrka.php",
            method: "POST",
            data: {idUtrka: idUtrke},
        })
    }
});
