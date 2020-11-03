$(document).ready(function () {
    var odabirKategorije = document.getElementById("kategorije");   

    function dohvatiLokacije() {
        $.ajax({
            url: '../php/dohvatiSveLokacije.php',
            method: 'get',
            dataType: 'json',

            success: function(json) {
                prikaziKategorije(json);
            }
        })
    }

    dohvatiLokacije();
    
    function prikaziKategorije(kategorije){
        kategorije.forEach(lokacija => {
            var option = document.createElement('option');
            option.value = lokacija.idLokacija;
            option.innerHTML = lokacija.naziv;
            odabirKategorije.append(option);
        })
    }

    function dohvatiLokacijeBaza(){
        var lokacija = odabirKategorije.options[odabirKategorije.selectedIndex].value;
        return lokacija;
    }

    $("#spremiGumb").click(function(e){
        e.preventDefault();
        var podaci = {idLokacija: dohvatiLokacijeBaza(), utrka: $("#utrka").val(), startnina: $("#startnina").val(), brojNatjecatelja: $("#BrNatjecatelja").val(), datumPocetak: $("#datumVrijemePocetka").val()};
        $.ajax({
            url: "../php/kreiranjeUtrke.php",
            method: "POST",
            data: podaci,

            success: function(e){
                window.location.href="../html/popisUtrka.html";
            }
        })
    })
});