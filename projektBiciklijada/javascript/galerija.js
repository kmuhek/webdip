$(document).ready(function () {
    var odabirKategorije = document.getElementById("kategorije");
    var galerija = document.getElementById("galerija");    

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

    $(odabirKategorije).change(function(){
        var lokacija = odabirKategorije.options[odabirKategorije.selectedIndex].value;
        galerija.innerHTML = "";

        $.ajax({
            url: '../php/dohvatiSlikeLokacije.php',
            method: 'get',
            data: {lokacija},
            success: function(json){
                json.forEach(function (slika) {
                    var div = document.createElement("div");
                    var img = document.createElement("img");
                    img.src = "../php/slike/" + slika.url;
                    img.className = "slikaGalerije";
                    div.append(img);
                    galerija.append(div);

                })
            }
        })
    });

    dohvatiLokacije();
    
    function prikaziKategorije(kategorije){
        kategorije.forEach(lokacija => {
            var option = document.createElement('option');
            option.value = lokacija.idLokacija;
            option.innerHTML = lokacija.naziv;
            odabirKategorije.append(option);
        })
    }
});
