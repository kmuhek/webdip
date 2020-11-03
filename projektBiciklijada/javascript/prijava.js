$(document).ready(function () {

    var cookie = document.cookie.split(";");
    if(cookie.length > 1){
        var korIme = cookie[1].split("=")[1];
        $("#korime").val(korIme);
    }
    
    var brojac = 0;

    $("#gumbPrijava").click(function (e) {
        e.preventDefault();
        $.ajax({
            url: "../php/prijavaKorime.php",
            method: "GET",
            data: { korime: $("#korime").val(), lozinka: $("#lozinka").val() },
            success: function (e) {
                if (e === "1") {
                    if (document.getElementById("zapamti").checked) {
                        var korime = $("#korime").val();
                        document.cookie = "Korime=" + korime + ";path=/;";
                        window.location.href = "../html/index.html";
                    }
                }else{
                    $("#greska").html("Pogrešni podaci za prijavu");
                    brojac++;
                    if(brojac > 3){
                        blokirajKorisnika();
                    }
                }
            },
        });

    });
});

function blokirajKorisnika(){
    $.ajax({
        url: "../php/blokirajKorisnikaPrijava.php",
        method: "POST",
        data: {korime: $("#korime").val()},
    })
}

