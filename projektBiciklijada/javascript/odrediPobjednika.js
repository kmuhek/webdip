$(document).ready(function () {
    var odabirKategorije = document.getElementById("kategorije");   

    function dohvatiPobjednika() {
        $.ajax({
            url: '../php/dohvatiSvePobjednike.php',
            method: 'POST',
            dataType: 'json',
            data: {idUtrke: $("#idUtrke").val(), idLokacije: $("#idLokacije").val()},

            success: function(json) {
                prikaziKategorije(json);
            }
        })
    }

    dohvatiPobjednika();
    
    function prikaziKategorije(kategorije){
        kategorije.forEach(lokacija => {
            var option = document.createElement('option');
            option.value = lokacija.mjesto;
            option.innerHTML = lokacija.korime;
            odabirKategorije.append(option);
        })
    }

    function dohvatiPobjednikaBaza(){
        var pobjednik = odabirKategorije.options[odabirKategorije.selectedIndex].text;
        return pobjednik;
    }

    $("#proglasiPobjednika").click(function(e){
        e.preventDefault();
        $.ajax({
            url: "../php/pobjednikOdabran.php",
            method: "POST",
            data: {korime: dohvatiPobjednikaBaza(), razlogBiranja: $("#razlogBiranja").val(), idUtrke: $("#idUtrke").val(), idLokacije: $("#idLokacije").val()},

            success: function(e){
                location.href = "index.html";
            }
        })
    })

});