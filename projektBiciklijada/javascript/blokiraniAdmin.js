$(document).ready(function () {
    var tablica = document.getElementById("bodyTablice");
    
    function osvjeziPopis(json){
        tablica.innerHTML = "";

        $.ajax({
            url: "../php/blokiraniKorisnici.php",
            method: "GET",
            dataType: "json",
    
            success: function (json) {
                var polje = json.map(function (utrka) {
                    var tr = document.createElement("tr");
                    var korime = document.createElement("td");
                    korime.innerHTML = utrka.korime;
                    var blokiran = document.createElement("td");
                    blokiran.innerHTML = utrka.blokiran;
                    var blokiraj = document.createElement("td");
                    blokiraj.innerHTML = "<a href=''>blokiraj</a>";
                    var otkljucaj = document.createElement("td");
                    otkljucaj.innerHTML = "<a href=''>otključaj</a>";
                    tr.append(korime);
                    tr.append(blokiran);
                    tr.append(blokiraj);
                    tr.append(otkljucaj);
                    
                    blokiraj.addEventListener("click", function(e){
                        e.preventDefault();
                        blokirajKorisnika(korime.innerHTML);
                    });

                    otkljucaj.addEventListener("click", function(e){
                        e.preventDefault();
                        otkljucajKorisnika(korime.innerHTML);
                    });

                    return tr;
                });
                polje.forEach((tr) => {
                    tablica.append(tr);
                });
            },
        });
    }

    osvjeziPopis();

    function blokirajKorisnika(korime){
        $.ajax({
            url: "../php/blokirajKorisnikaAdmin.php",
            method: "GET",
            data: {korime: korime},
            
            success: osvjeziPopis,
        })
    }

    function otkljucajKorisnika(korime){
        $.ajax({
            url: "../php/otkljucajKorisnikaAdmin.php",
            method: "GET",
            data: {korime: korime},
            
            success: osvjeziPopis,
        })
    }
});