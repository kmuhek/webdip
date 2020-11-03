$(document).ready(function () {
    var tablica = document.getElementById("bodyTablice");
    var odabirKategorije = document.getElementById("kategorije");
    var sveUtrke = [];
    var sveLokacije = [];
    $.ajax({
        url: "../php/popisUtrka.php",
        method: "GET",
        dataType: "json",

        success: function (json) {
            sveUtrke = json;
            sveLokacije = sveUtrke.map(utrka => utrka.lokacija);
            prikaziUtrke(sveUtrke);
            prikaziKategorije(sveLokacije);

        },
    });
    
    function prikaziUtrke(utrke){
        ocistiUtrke();
        var polje = utrke.map(function (utrka) {
            var tr = document.createElement("tr");
            var nazivUtrke = document.createElement("td");
            nazivUtrke.innerHTML = utrka.nazivUtrke;
            var lokacija = document.createElement("td");
            lokacija.innerHTML = utrka.lokacija;
            var PocetakUtrke = document.createElement("td");
            PocetakUtrke.innerHTML = utrka.PocetakUtrke;
            var brojNatjecatelja = document.createElement("td");
            brojNatjecatelja.innerHTML = utrka.broj_natjecatelja;
            tr.append(nazivUtrke);
            tr.append(lokacija);
            tr.append(PocetakUtrke);
            tr.append(brojNatjecatelja);
            return tr;
        });
        polje.forEach((tr) => {
            tablica.append(tr);
        });
    }
    
    function pretraziUtrke(datum){
        ocistiUtrke();
        var pretrazeneUtrke = sveUtrke.filter((utrka) => utrka.PocetakUtrke.indexOf(datum) > -1);
        prikaziUtrke(pretrazeneUtrke);
    }
    
    $('#pretraga').keyup(function(e){
        pretraziUtrke($('#pretraga').val());
    })
    
    function ocistiUtrke(){
        tablica.innerHTML = "";
    }
    
    function unikatne(value, index, self) {
        return self.indexOf(value) === index;
    }
    
    function prikaziKategorije(kategorije){
        var unikatneKategorije = kategorije.filter(unikatne);
        unikatneKategorije.forEach(kategorija => {
            var option = document.createElement('option');
            option.value = kategorija;
            option.innerHTML = kategorija;
            odabirKategorije.append(option);
        })
    }
    
    odabirKategorije.addEventListener('change', filtrirajPoKategoriji);
    
    function filtrirajPoKategoriji(){
        var lokacija = odabirKategorije.options[odabirKategorije.selectedIndex].text;
        var utrkeZaPrikaz = sveUtrke.filter(utrka => utrka.lokacija === lokacija);
        prikaziUtrke(utrkeZaPrikaz);
    }
    
    $("#sort").click(function(e){
        var sortirano = [...sveUtrke];
        sortirano.sort((a, b) => parseInt(a.broj_natjecatelja) - parseInt(b.broj_natjecatelja));
        prikaziUtrke(sortirano);
    })

});
