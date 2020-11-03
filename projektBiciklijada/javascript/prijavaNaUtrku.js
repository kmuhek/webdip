$(document).ready(function () {
    var odabirKategorije = document.getElementById("utrkeDropdown");
    var sveUtrke = [];
    $.ajax({
        url: "../php/popisUtrka.php",
        method: "GET",
        dataType: "json",

        success: function (json) {
            sveUtrke = json;
            sveUtrkeZaPrikaz = sveUtrke.map(utrka => {return {naziv: utrka.nazivUtrke, id: utrka.idUtrke}});
            prikaziKategorije(sveUtrkeZaPrikaz);
        },
    });  
    
    function prikaziKategorije(kategorije){
        kategorije.forEach(kategorija => {
            var option = document.createElement('option');
            option.value = kategorija.id;
            option.innerHTML = kategorija.naziv;
            odabirKategorije.append(option);
        })
    }

    function dohvatiIdUtrke(){
        var idUtrke = odabirKategorije.options[odabirKategorije.selectedIndex].value;
        return idUtrke;
    }

    $("#gumbPosalji").click(function(e){
        e.preventDefault();
        $.ajax({
            url: "../php/posaljiPrijavuNaUtrku.php",
            method: "POST",
            data: {idUtrke: dohvatiIdUtrke(), ime: $("#ime").val(), prezime: $("#prezime").val(), godinaRod: $("#godRod").val(), email: $("#email").val()},

            success: function(e){
                window.location.href="profil.php"
            }
        })
    })
    
});
