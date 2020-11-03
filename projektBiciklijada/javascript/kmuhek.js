var gumb = document.getElementById("zatvoriIzbornik");
var gumb2 = document.getElementById("otvoriIzbornik");
var izbornik = document.getElementById("izbornik");

function otvoriIzbornik(e){
    izbornik.style.width = "300px";
}

function zatvoriIzbornik(e) {
    e.preventDefault();
    izbornik.style.width = 0;
}

gumb.addEventListener("click", zatvoriIzbornik);
gumb2.addEventListener("click", otvoriIzbornik);

