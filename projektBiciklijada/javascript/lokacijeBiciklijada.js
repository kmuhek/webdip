$(document).ready(function () {
    var tablica = document.getElementById("bodyTablice");

    $.ajax({
        url: "../php/lokacijeBiciklijada.php",
        method: "GET",
        dataType: "json",

        success: function (json) {
            var polje = json.map(function (utrka) {
                var tr = document.createElement("tr");
                var lokacija = document.createElement("td");
                var idLokacije = utrka.idLokacija;
                var a = document.createElement("a");
                a.href = `../html/galerijaPobjednika.html`;
                a.innerHTML = utrka.lokacija;
                lokacija.append(a);
                var BrojUtrka = document.createElement("td");
                BrojUtrka.innerHTML = utrka.brojUtrka;
                tr.append(lokacija);
                tr.append(BrojUtrka);
                return tr;
            });
            polje.forEach((tr) => {
                tablica.append(tr);
            });
        },
    });
});
