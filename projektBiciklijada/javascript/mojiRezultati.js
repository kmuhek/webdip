$(document).ready(function () {
    var tablica = document.getElementById("bodyTablice2");

    $.ajax({
        url: "../php/mojiRezultati.php",
        method: "GET",
        dataType: "json",

        success: function (json) {
            var polje = json.map(function (utrka) {
                var tr = document.createElement("tr");
                var lokacija = document.createElement("td");
                lokacija.innerHTML = utrka.lokacija;
                var nazivUtrke = document.createElement("td");
                nazivUtrke.innerHTML = utrka.nazivUtrke;
                var mjesto = document.createElement("td");
                mjesto.innerHTML = utrka.mjesto;
                var slika = document.createElement("td");
                var idUtrke = utrka.idUtrka;
                slika.innerHTML = `<a href='../html/uploadSlike.php?utrka=${idUtrke}'>Klik za sliku</a>`;
                var dozvola = document.createElement("td");
                dozvola.innerHTML = "<a href=''>Dozvoli</a>";
                tr.append(lokacija);
                tr.append(nazivUtrke);
                tr.append(mjesto);
                tr.append(slika);
                tr.append(dozvola);
                
                dozvola.addEventListener("click", function(e){
                    e.preventDefault();
                    dozvolaBaza(idUtrke);
                })
                return tr;
            });
            polje.forEach((tr) => {
                tablica.append(tr);
            });
        },
    });

    function dozvolaBaza(idUtrke){
        $.ajax({
            url: "../php/dozvolaSlike.php",
            method: "POST",
            data: {idUtrka: idUtrke},
        })
    }


});
