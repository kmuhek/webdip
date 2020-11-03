$(document).ready(function () {
    var odabirKategorije = document.getElementById("kategorije");   

    function dohvatiModeratore() {
        $.ajax({
            url: '../php/dohvatiSveModeratore.php',
            method: 'get',
            dataType: 'json',

            success: function(json) {
                prikaziKategorije(json);
            }
        })
    }

    dohvatiModeratore();
    
    function prikaziKategorije(kategorije){
        kategorije.forEach(lokacija => {
            var option = document.createElement('option');
            option.value = lokacija.idKorisnik;
            option.innerHTML = lokacija.korime;
            odabirKategorije.append(option);
        })
    }

    function dohvatiModeratoreBaza(){
        var moderator = odabirKategorije.options[odabirKategorije.selectedIndex].value;
        return moderator;
    }

    $("#spremiGumb").click(function(e){
        e.preventDefault();
        $.ajax({
            url: "../php/kreirajLokaciju.php",
            method: "POST",
            data: {idModerator: dohvatiModeratoreBaza(), drzava: $("#drzava").val(), grad: $("#grad").val()},

            success: function(e){
                location.href = "index.html";
            }
        })
    })
});